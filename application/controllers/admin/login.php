<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model(array('admin/Login_model','admin/Mail_model'));
	}
	public function index()
	{
		$this->load->view('admin/home/login');
	}


	public function loginUser()
	{
		$frm = $this->input->post();

		$username = $frm['email'];
		$password = md5($frm['password']);
		$a_UserChecking = $this->Login_model->a_fCheckUser( $username, $password );
		$autologin =	($this->input->post('luumatkhau') == '1') ? 1 : 0;
		if($a_UserChecking){
			if($autologin == 1){
				$cookie = array(
                    'name'   => 'email_admin',
                    'value'  => $a_UserChecking[0]['email'],
                    'expire' =>  3600*24*30,
                    'secure' => false
                );
                $this->input->set_cookie($cookie);
                $cookie1 = array(
                    'name'   => 'password_admin',
                    'value'  => $frm['password'],
                    'expire' =>  3600*24*30,
                    'secure' => false
                );
                $this->input->set_cookie($cookie1);

			}
			$this->session->set_userdata('user_admin', $a_UserChecking[0]);

			// // api tavico
			// $curl = curl_init();

			// curl_setopt_array($curl, array(
			//   CURLOPT_URL => "https://demo.tavicosoft.com/DirectRouter/Index",
			//   CURLOPT_RETURNTRANSFER => true,
			//   CURLOPT_ENCODING => "",
			//   CURLOPT_MAXREDIRS => 10,
			//   CURLOPT_TIMEOUT => 30,
			//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			//   CURLOPT_CUSTOMREQUEST => "POST",
			//   CURLOPT_POSTFIELDS => "{\n\t\"action\": \"ConnectDB\",\n\t\"method\": \"loginToken\",\n\t\"type\": \"rpc\",\n\t\"tid\": 1,\n\t\"data\":[\n\t\t\t{\n\t\t\t\t\"loginid\":\"CRM01\"\n\t\t\t}\n\t\t\t]\n}",
			//   CURLOPT_HTTPHEADER => array(
			//     "ClientId: ",
			//     "Content-Type: application/json;charset=uft-8",
			//     "SecurityKey: ",
			//     "TvcToken: ",
			//     "cache-control: no-cache"
			//   ),
			// ));

			// $response = curl_exec($curl);
			// $err = curl_error($curl);

			// curl_close($curl);

			// if ($err) {
			//   echo "cURL Error #:" . $err;
			// } else {
			//   echo $response;
			// }


			echo json_encode($a_UserChecking);
		}else{
			echo "1";
		}
	}



	//đăng xuất
	public function logout($value='')
	{
		$this->session->unset_userdata('user_admin');
				session_destroy();

		// $cookiename	=	"siteAuth";
		// setcookie($cookiename, 'user='."", time() - 3600);	// Unset cookie of user	// Unset session of user
		redirect(base_url('login.html'));
	}

	//lấy lại password, gửi qua mail
	public function forgotPassword()
	{
		$mail = $this->input->post('email');
		$new_pass = random_string('alnum',8);
		$data['password'] = md5($new_pass);
		$this->Login_model->UpdateData('operator', array('email' => $mail),$data);


		$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 3));
		if(isset($mailtemplate[0])){
			$subject 			= $mailtemplate[0]['presubject'];
			$body 				= $mailtemplate[0]['prebody'];
			$mail["attachment"] = $mailtemplate[0]['preattach'];
			$presender 			= $mailtemplate[0]['presender'];
			$mail["cc"] 		= '';
			$mail["bcc"] 		= '';
		}else{
			$subject			= $body = $mail["attachment"] = $mail["cc"] = $mail["bcc"] = $presender = '';
		}
		if ($presender != 'usersession') {
			$arrayName1 = array('operatorname' => 'mailsystem' );
			$mailSystem = $this->Mail_model->select('operator',$arrayName1);
			if ($mailSystem[0]['mcssl'] == '1') {
        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
        	}else{
        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
        	}
        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
        	$mail['mcport']	= $mailSystem[0]['mcport'];
		}

		$chuoi_tim 				= array('[Mật khẩu mới]');
		$chuoi_thay_the 		= array($data['password']);
		$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($subject));
		$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($body));
		$mail['toemail'] 		= $a_UserInfo['email'];
		$this->Mail_model->sendMail($mail);

		echo json_encode(1);

	}

	public function checkPassword()
	{
		$password 	= $this->input->post('pass');
		$id 		= $this->input->post('id');
		$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
		);
		$this->a_Data['csrf'] = $csrf;
		$this->a_Data['data'] = $this->Login_model->checkPassword($id, $password);
		print_r(json_encode($this->a_Data));
	}

	public function editPassword()
	{
		// var_dump($this->input->post());
		$data['password'] = md5($this->input->post('new_pass'));
		$data['id'] = $this->input->post('id');
		$this->Login_model->editPassword($data);
		$this->session->unset_userdata('user');
		redirect(base_url('pageLogin'));
	}
	public function change_pass()
	{
		$frm = $this->input->post();
		$username = $this->session->userdata('user')['email'];
		$password = md5($frm['passold']);
		$a_UserChecking = $this->Login_model->a_fCheckUser( $username, $password );
		if($a_UserChecking){
			$data['password'] = md5($frm['passnew']);
			$array = array('operatorid' => $this->session->userdata('user')['operatorid']);
			$this->Login_model->UpdateData("operator",$array,$data);
			echo "0";
		}else{
			echo "1";
		}
	}
	public function insertUser()
	{
		$frm = $this->input->post();
		$a_UserInfo['email'] 		= $frm['email'];
		$a_UserInfo['roleid'] 		= 1;
		$a_UserInfo['idcard'] 		= $frm['cmnd'];
		$a_UserInfo['password']		= md5($frm['pass']);
		$a_UserInfo['operatorname'] = $frm['lastname'];
		$data['email'] = $frm['email'];
		$data['idcard'] = $frm['cmnd'];
		$data['firstname'] = $frm['firstname'];
		$data['lastname'] = $frm['lastname'];
		$data['name'] = $frm['firstname']." ".$frm['lastname'];
		$data['gender'] = $frm['gender'];
		$data['dateofbirth'] =  date("Y-m-d", strtotime($frm['birthday'] ));

		if ($this->Login_model->checkMail( $a_UserInfo['email'] )) {
			echo "-1";
		}
		else if($this->Login_model->checkID( $a_UserInfo['idcard'] ))
		{
			echo "-2";
		}
		else{
			$this->Login_model->InsertData("candidate",$data);
			$a_UserInfo['candidateid'] = $this->Login_model->Set_idcandite()['candidateid'];
			$this->Login_model->insertUser( $a_UserInfo );
			$this->session->set_userdata('user', $a_UserInfo);

			$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 3));
			if(isset($mailtemplate[0])){
				$subject 			= $mailtemplate[0]['presubject'];
				$body 				= $mailtemplate[0]['prebody'];
				$mail["attachment"] = $mailtemplate[0]['preattach'];
				$presender 			= $mailtemplate[0]['presender'];
				$mail["cc"] 		= '';
				$mail["bcc"] 		= '';
			}else{
				$subject			= $body = $mail["attachment"] = $mail["cc"] = $mail["bcc"] = $presender = '';
			}
			if ($presender != 'usersession') {
				$arrayName1 = array('operatorname' => 'mailsystem' );
				$mailSystem = $this->Mail_model->select('operator',$arrayName1);
				if ($mailSystem[0]['mcssl'] == '1') {
	        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
	        	}else{
	        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
	        	}
	        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
	        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
	        	$mail['mcport']	= $mailSystem[0]['mcport'];
			}

			$chuoi_tim 				= array('[Tên Ứng viên]','[Tên]');
			$chuoi_thay_the 		= array($data['name'],$data['lastname']);
			$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($subject));
			$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($body));
			$mail['toemail'] 		= $a_UserInfo['email'];
			$this->Mail_model->sendMail($mail);


			echo json_encode($a_UserInfo);


		}

	}



}
