<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $fb;
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','string','security','cookie'));
		$this->load->model(array('Login_model'));
		$this->load->library(array('form_validation','session'));
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$config = array(
		    'protocol'  =>  'smtp',
		    'smtp_host' =>  'ssl://smtp.googlemail.com',
		    'smtp_port' =>  465,
		    'smtp_user' =>  'thanhhung23495@gmail.com',
		    'smtp_pass' =>  'Heodat1323',
		    'mailtype'  =>  'html', 
		    'charset'   =>  'utf-8',
		);
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		
		

		// $this->_data['html_header'] = $this->load->view('home/header', NULL, TRUE);  
		
        
        
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
				// $cookie_name	=	'siteAuth';
				// $cookie_time	=	3600*24*30; // 30 days.
				// setcookie('ci-session', 'user='."", time() - 3600);	// Unset cookie of user
				// setcookie($cookie_name, 'user='.$a_UserChecking[0]['email'].'&password='.$a_UserChecking[0]['password'], time() + $cookie_time);
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
		// $cookiename	=	"siteAuth";
		// setcookie($cookiename, 'user='."", time() - 3600);	// Unset cookie of user	// Unset session of user
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
        $this->email->from('thanhhung23495@gmail.com', 'Tuyển dụng Đất Xanh');
		//cau hinh nguoi nhan
		$this->email->to($mail);
		$this->email->subject('Lấy lại mật khẩu');
		$this->email->message('Bấm vào <a href="'.base_url().'">đây</a> để đăng nhập bằng mật khẩu bên dưới và đổi mật khẩu mới cho tài khoản của bạn.<br>
			Mật khẩu mới: <b>'.$new_pass.'</b><br>');
		if ( $this->email->send())
		{
			echo json_encode(1);		
		}else{
			var_dump('thất bại');
			var_dump($this->email->print_debugger());
		}
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
		$a_UserInfo['operatorname'] = $frm['firstname'];
		$data['email'] = $frm['email'];
		$data['idcard'] = $frm['cmnd'];
		$data['firstname'] = $frm['firstname'];
		$data['lastname'] = $frm['lastname'];
		$data['name'] = $frm['lastname']." ".$frm['firstname'];
		$data['gender'] = $frm['gender'];
		$data['dateofbirth'] =  date("Y-m-d", strtotime($frm['birthday'] ));
		$data['profilesrc'] = "Web portal";

		if ($this->Login_model->checkMail( $a_UserInfo['email'] )) {	
			echo json_encode('-1');
		}
		else if($this->Login_model->checkID( $a_UserInfo['idcard'] ))
		{
			echo json_encode('-2');
		}
		else{
			$this->Login_model->InsertData("candidate",$data);
			$a_UserInfo['candidateid'] = $this->Login_model->Set_idcandite()['candidateid'];
			$this->Login_model->insertUser( $a_UserInfo );
			$this->session->set_userdata('user', $a_UserInfo);

			$this->email->from('thanhhung23495@gmail.com', 'Tuyển dụng Đất Xanh');
			//cau hinh nguoi nhan
			$this->email->to($frm['email']);
			$this->email->subject('Đăng kí tài khoản thành công');
			$this->email->message('Cảm ơn bạn đã đăng ký tài khoản tại Đất Xanh.<br>');
			
			if ( $this->email->send())
			{
				echo json_encode($a_UserInfo);		
			}else{
				var_dump('thất bại');
				var_dump($this->email->print_debugger());
			}
			
			
		}
		
	}

	



	
}