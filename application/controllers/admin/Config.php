<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
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
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','M_auth'));
		$ac_data['system'] 		= 'active';
		$ac_data['config'] 	= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 2;
	    $this->sess  = $this->session->userdata('user_admin');  
	}
	public function index()
	{
		$arrayName = array('operatorname' => 'mailsystem' );
		$data['mailSystem'] = $this->Data_model->selectTable('operator',$arrayName);
		$data['group'] = 1;
		$data['title'] = 'Cấu hình chung';
		$data['title_con'] = '';

		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$this->data['temp'] = $this->load->view('admin/config/index',$data,true);
		}
		
		$this->load->view('admin/home/master',$this->data);
	}
	public function updateMailSystem()
	{
		$data = $this->input->post();
		if ($data['mcpass'] != '*****') {
			$data['mcpass'] = base64_encode($data['mcpass']);
		}else{
			unset($data['mcpass']);
		}
		$data['status'] = 'C';
		if (!isset($data['mcssl'])) {
			$data['mcssl'] = '0';
		}
		// var_dump($data);exit;
		$arrayName = array('operatorname' => 'mailsystem' );
		$id = $this->Data_model->update('operator',$arrayName,$data);
		redirect(base_url('admin/config/'));
	}
}

/* End of file Config.php */
/* Location: ./application/controllers/admin/Config.php */
?>