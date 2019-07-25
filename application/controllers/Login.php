<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $fb;
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','string','security','cookie'));
		$this->load->model(array('Login_model','admin/Mail_model'));
		$this->load->library(array('form_validation','session'));
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	}
	public function index($value='')
	{
		phpinfo();
	}

	//đăng nhập thường
	public function loginUser()
	{
		$frm = $this->input->post();
		$this->cache->clean();
		$username = $frm['email'];
		$password = md5($frm['password']);
		$a_UserChecking = $this->Login_model->a_fCheckUser( $username, $password );
		$autologin =	($this->input->post('luumatkhau') == '1') ? 1 : 0;
		if($a_UserChecking){
			if($autologin == 1){
				$cookie = array(
                    'name'   => 'email',
                    'value'  => $a_UserChecking[0]['email'],
                    'expire' =>  3600*24*30,
                    'secure' => false
                );
                $this->input->set_cookie($cookie);
                $cookie1 = array(
                    'name'   => 'password',
                    'value'  => $frm['password'],
                    'expire' =>  3600*24*30,
                    'secure' => false
                );
                $this->input->set_cookie($cookie1);

			}
			$this->session->set_userdata('user', $a_UserChecking[0]);
			echo json_encode($a_UserChecking);
		}else{
			echo "1";
		}
	}



	//đăng xuất
	public function logout($value='')
	{
		$this->session->unset_userdata('user');
		$this->cache->clean();
		redirect(base_url(''));
	}

	//lấy lại password, gửi qua mail
	public function forgotPassword()
	{
		$mail = $this->input->post('email');
		if($this->Login_model->checkMail( $mail ) == false)
		{
			echo json_encode(-1);
		}
		$new_pass = random_string('alnum',8);
		$data['password'] = md5($new_pass);
		$this->Login_model->UpdateData('operator', array('email' => $mail),$data);
		//cau hinh email va ten nguoi guioperator

		$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 2));
		if(isset($mailtemplate[0])){
			$subject 			= html_entity_decode($mailtemplate[0]['presubject']);
			$body 				= html_entity_decode($mailtemplate[0]['prebody']);
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
		$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, $subject);
		$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, $body);
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
		$data['name'] = trim($frm['firstname'])." ".trim($frm['lastname']);
		$data['gender'] = $frm['gender'];
		$data['dateofbirth'] =  date("Y-m-d", strtotime($frm['birthday'] ));
		$data['profilesrc'] = "Web portal";
		$tag['tags'] = $frm['tags'];
		if ($this->Login_model->checkMail( $a_UserInfo['email'] )) {
			echo json_encode('-1');
		}
		else if($this->Login_model->checkID( $a_UserInfo['idcard'] ))
		{
			echo json_encode('-2');
		}
		else{
			$this->Login_model->InsertData("candidate",$data);
			$a_UserInfo['candidateid'] 	= $this->Login_model->Set_idcandite()['candidateid'];
			$a_UserInfo['operatorid'] 	= $this->Login_model->insertUser( $a_UserInfo );
			$this->session->set_userdata('user', $a_UserInfo);
			$arr_tags = explode(',', $tag['tags']);
			$this->Addtags($arr_tags,$a_UserInfo['candidateid']);

			$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 1));
			if(isset($mailtemplate[0])){
				$subject 			= html_entity_decode($mailtemplate[0]['presubject']);
				$body 				= html_entity_decode($mailtemplate[0]['prebody']);
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

            $gioitinh = ($data['gender'] == 'M')? 'Anh' : 'Chị';
			$chuoi_tim 				= array('[Tên Ứng viên]','[Tên]','[Giới tính]');
			$chuoi_thay_the 		= array($data['name'],$data['firstname'],$gioitinh);
			$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, $subject);
			$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, $body);
			$mail['toemail'] 		= $a_UserInfo['email'];

			$this->Mail_model->sendMail($mail);

			echo json_encode($a_UserInfo);
		}
	}
	public function Addtags($tags,$candidateid)
	{
		foreach ($tags as $key => $value) {
			$row['data'] = $this->Login_model->checktagsprofile(array('title' =>  $value));
			if(!is_array($row['data']))
			{
				$data1['title'] = trim($value);
				$data2['tagid'] = $this->Login_model->InsertData("tagprofile",$data1);
				$data2['tablename'] = "candidate";
				$data2['recordid'] = $this->session->userdata('user')['candidateid'];
				$data2['categoryid'] = "candidateid";
				$this->Login_model->InsertData("tagtransaction",$data2);
			}
			else
			{
				$data2['tagid'] = $row['data']['tagid'];
				$data2['tablename'] = "candidate";
				$data2['recordid'] = $this->session->userdata('user')['candidateid'];
				$data2['categoryid'] = "candidateid";
				$this->Login_model->InsertData("tagtransaction",$data2);
			}
		}
	}

}