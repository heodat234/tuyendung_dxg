<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiplechoice extends CI_Controller {
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

		$ac_data['tuyendung'] 		= 'active';
		$ac_data['multiplechoice'] 	= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);
	}
	public function index()
	{
		// $this->data1['nav'] = $this->load->view('admin/page/nav-newsrecruit',null,true);
		$this->data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 
		$this->data['temp'] = $this->load->view('admin/multiplechoice/index',null,true);

		$this->load->view('admin/home/master',$this->data);
	}

	public function assessmentlist()
	{
		$this->data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 
		$this->data['temp'] = $this->load->view('admin/multiplechoice/assessmentlist',null,true);

		$this->load->view('admin/home/master',$this->data);	
	}

	public function pageAssessment($asmtid, $check = '0')
	{
		if ($asmtid != 0) {
			$sql = "SELECT tt.*, candidate.name, candidate.email FROM assessment tt  LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  LEFT JOIN reccampaign ON tt.campaignid = reccampaign.campaignid WHERE tt.asmtid = $asmtid";
			$result = $this->Campaign_model->select_sql($sql);
			$data['assessment'] = $result[0];
		}else{
			$data['assessment']['status'] = '';
		}
		$data['check'] = $check;
		$this->_data['temp'] = $this->load->view('admin/multiplechoice/pageAssessment',$data,true);

		$this->load->view('admin/home/master-iframe',$this->_data);	
	}

	
	public function offer()
	{
		$this->_data['temp'] = $this->load->view('admin/multiplechoice/offer',null,true);

		$this->load->view('admin/home/master-iframe',$this->_data);	
	}
	public function detail($value='')
	{
		$data['group'] = $value;
		if ($value == 0) {
			$data['title'] = '';
			$data['title_con'] = '';
		}
		else if ($value == 1) {
			$data['title'] = 'Phiếu phỏng vấn BM004/005';
			$data['title_con'] = 'Phỏng vấn/ Đánh giá';
		}
		else if ($value == 2) {
			$data['title'] = 'Trắc nghiệm kiến thức';
			$data['title_con'] = 'Trắc nghiệm';
		}
		else if ($value == 3) {
			$data['title'] = 'Phỏng vấn quản lý';
			$data['title_con'] = 'Phỏng vấn/ Đánh giá';
		}
		// $this->data['script'] = $this->load->view('admin/script/script_user',null, TRUE); 
		$this->data['temp'] = $this->load->view('admin/multiplechoice/detail',$data,true);

		$this->load->view('admin/home/master',$this->data);
	}
}

/* End of file Multiplechoice.php */
/* Location: ./application/controllers/admin/Multiplechoice.php */
?>