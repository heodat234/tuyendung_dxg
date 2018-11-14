<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model(array('admin/Login_model'));
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
			echo json_encode($a_UserChecking);
		}else{
			echo "1";
		}
	}

	
	
	//đăng xuất
	public function logout($value='')
	{
		$this->session->unset_userdata('user_admin');
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
