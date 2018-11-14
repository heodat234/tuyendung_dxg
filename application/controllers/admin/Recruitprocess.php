<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecruitProcess extends CI_Controller {
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
		$this->load->model(array('admin/Candidate_model'));

		$ac_data['tuyendung'] 		= 'active';
		$ac_data['recruitprocess'] 	= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);
	}
	public function index()
	{
		$this->data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 
		$this->data['temp'] = $this->load->view('admin/process/index',null,true);
		$this->load->view('admin/home/master',$this->data);
	}

	public function detail($value='')
	{
		$data['group'] = $value;
		if ($value == 0) {
			$data['title'] = 'Phiếu phỏng vấn BM004/005';
			$data['createdby'] = 'Mai Phương';
			$data['createdday'] = '30/08/2018';
		}
		else if ($value == 1) {
			$data['title'] = 'Phiếu phỏng vấn BM004/005';
			$data['createdby'] = 'Mai Phương';
			$data['createdday'] = '30/08/2018';
		}
		else if ($value == 2) {
			$data['title'] = 'Phỏng vấn chuyên viên';
			$data['createdby'] = 'Mai Phương';
			$data['createdday'] = '30/08/2018';
		}
		else if ($value == 3) {
			$data['title'] = 'Phỏng vấn chuyên viên';
			$data['createdby'] = 'Mai Phương';
			$data['createdday'] = '30/08/2018';
		}
		$this->data['temp'] = $this->load->view('admin/process/detail',$data,true);
		$this->load->view('admin/home/master',$this->data);
	}

}

/* End of file RecruitProcess.php */
/* Location: ./application/controllers/admin/RecruitProcess.php */
?>