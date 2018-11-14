<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$config['upload_path'] = './uploads/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['remove_spaces'] = true;
	    $config['file_ext_tolower'] = true;    
	    $this->load->library('upload', $config);
		$this->load->helper(array('url','my_helper','file'));
		$this->load->library('session');
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model'));

		$ac_data['system'] 	= 'active';
		$ac_data['email'] 		= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);
	}
	public function index()
	{
		$arrayName = array('1' => 1 );
		$data['dataEmail'] = $this->Data_model->selectTable('mailprofile',$arrayName);
		$this->data['temp'] = $this->load->view('admin/email/index',$data,true);
		$this->load->view('admin/home/master',$this->data);
	}
	public function detail($value='')
	{
		$arrayName = array('mailprofileid' => $value );
		$data['dataEmail'] = $this->Data_model->selectTable('mailprofile',$arrayName);
		$data['group'] = $value;
		$data['emailsession']   = $this->session->userdata('user_admin')['email'];
		
		$this->data['temp'] = $this->load->view('admin/email/detail',$data,true);

		$this->load->view('admin/home/master',$this->data);
	}
	public function insertEmail()
	{
		$data = $this->input->post();
		$profiletype = $data['profiletype'];
		// $data['presender'] 	= $this->session->userdata('user_admin')['email'];
		if($profiletype == 0)
		{
			$data['presender'] 	= 'usersession';
		}
		else{
			$data['presender'] 	= 'tavicosoft@gmail.com';
		}
		$data['createdby'] 	= $this->session->userdata('user_admin')['operatorname'];
		$id = $this->Data_model->insert('mailprofile',$data);
		if($id != null)
		{
			echo json_encode($id);
			redirect(base_url('admin/email/detail/'.$id));
		}
		else
		{
			echo '<script>alert("Thêm bị lỗi!!")</script>';
		}
	}
	public function updateEmail($value)
	{
		$data = $this->input->post();
		$profiletype = $data['profiletype'];
		if($profiletype == 0)
		{
			$data['presender'] 	= 'usersession';
		}
		else{
			$data['presender'] 	= 'tavicosoft@gmail.com';
		}
		$arrayName = array('mailprofileid' => $value );
		$data['createdby'] 	= $this->session->userdata('user_admin')['operatorname'];
		$id = $this->Data_model->update('mailprofile',$arrayName,$data);
		redirect(base_url('admin/email/detail/'.$value));
	}
}

/* End of file Email.php */
/* Location: ./application/controllers/admin/Email.php */
?>