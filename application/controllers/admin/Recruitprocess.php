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
		$this->load->model(array('admin/Candidate_model','admin/Campaign_model','M_auth'));

		$ac_data['tuyendung'] 		= 'active';
		$ac_data['recruitprocess'] 	= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 5;
	    $this->sess  = $this->session->userdata('user_admin');  
	}
	public function index()
	{	
		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$sql = "SELECT a.*, b.operatorname as name FROM recflowpresetheader a LEFT JOIN operator b ON a.createdby = b.operatorid ";
			$data['process'] = $this->Campaign_model->select_sql($sql);
			for ($i=0; $i < count($data['process']); $i++) { 
				$flowpresetid 	= $data['process'][$i]['flowpresetid'];
				$sql 			= "SELECT a.roundname FROM recflowpreset a WHERE a.flowpresetid = '$flowpresetid'";
				$round 			= $this->Campaign_model->select_sql($sql);

				$roundname 		= '';
				foreach ($round as $key) {
					$roundname .= $key['roundname'].', ';
				}
				$data['process'][$i]['countRound'] 	= count($round);
				$data['process'][$i]['round'] 		= $roundname;
			}

			$this->data['temp'] = $this->load->view('admin/process/index',$data,true);
		}
		// $this->data['temp'] = $this->load->view('admin/process/index',null,true);
		$this->load->view('admin/home/master',$this->data);
	}

	public function detail($value='')
	{
		$data['flowpresetid'] = $value;
		if($value != 0){
			$sql = "SELECT a.*, b.operatorname as name FROM recflowpresetheader a LEFT JOIN operator b ON a.createdby = b.operatorid WHERE a.flowpresetid = '$value' ";
			$data['process'] = $this->Campaign_model->select_sql($sql);

			$sql1 = "SELECT a.* FROM recflowpreset a WHERE a.flowpresetid = '$value' ";
			$data['round'] = $this->Campaign_model->select_sql($sql1);
		}
		

		$data['operator'] 			= $this->Campaign_model->select("operatorid,operatorname",'operator',array('candidateid' => 0,'operatorname !=' => 'mailsystem'),'');
		$data['mailtemplate'] 		= $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0'),'');
		$data['asmt_tn'] 			= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '2'),'');
		$data['asmt_pv'] 			= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');

		$this->data['script'] 		= $this->load->view('admin/script/script_campaign', NULL, TRUE);
		$this->data['temp'] 		= $this->load->view('admin/process/detail',$data,true);
		$this->load->view('admin/home/master',$this->data);
	}

	public function saveRound()
	{
		$frm = $this->input->post();
		if ($frm['flowpresetid'] == 0) {
			$rdata['flowpresetname'] 		= $frm['flowpresetname'];
			$rdata['createdby'] 			= $this->session->userdata('user_admin')['operatorid'];
			$data['flowpresetid'] 			= $this->Campaign_model->insert('recflowpresetheader',$rdata);
			unset($frm['flowpresetid']);
			unset($frm['flowpresetname']);
			unset($frm['count_round_form']);
			foreach ($frm as $row) {
				$data['transferemail'] 		= $data['discardemail'] = 'N';
				$data['transfmailtemp'] 	= $data['discmailtemp'] = $data['assessment'] = $data['asmtmailtemp'] = $data['letteroffermailtemp'] = $data['scorecard']  	= $data['interviewmailtemp'] = $data['invitemailtemp'] = 0;
				$data['sorting'] 		= $row[0];
				$data['roundname'] 		= $row[1];
				$data['roundtype'] 		= $row[2];
				if (isset($row[3]) && $row[3] == 'on' && isset($row[5]) && $row[5] == 'on'){
					$data['transferemail'] 		= 'Y';
					$data['transfmailtemp'] 	= $row[4];
					$data['discardemail'] 		= 'Y';
					$data['discmailtemp'] 		= $row[6];

					if (isset($row[7])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[7];
							$data['asmtmailtemp'] 		= $row[8];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[7];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[7];
							$data['interviewmailtemp'] 		= $row[8];
							$data['invitemailtemp'] 		= $row[9];
						}
					}
				} 
				else if (isset($row[3]) && $row[3] == 'on') {
					$data['transferemail'] 		= 'Y';
					$data['transfmailtemp'] 	= $row[4];
					$data['discmailtemp'] 		= $row[5];
					if (isset($row[6])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[6];
							$data['asmtmailtemp'] 		= $row[7];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[6];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[6];
							$data['interviewmailtemp'] 		= $row[7];
							$data['invitemailtemp'] 		= $row[8];
						}
					}
				}
				else if (isset($row[4]) && $row[4] == 'on') {
					$data['transfmailtemp'] 	= $row[3];
					$data['discardemail'] 		= 'Y';
					$data['discmailtemp'] 		= $row[5];
					if (isset($row[6])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[6];
							$data['asmtmailtemp'] 		= $row[7];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[6];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[6];
							$data['interviewmailtemp'] 		= $row[7];
							$data['invitemailtemp'] 		= $row[8];
						}
					}
				}else if (isset($row[3]) && $row[3] != 'on' ) {
				 	$data['transfmailtemp'] 	= $row[3];
					$data['discmailtemp'] 		= $row[4];
					if (isset($row[5])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[5];
							$data['asmtmailtemp'] 		= $row[6];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[5];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[5];
							$data['interviewmailtemp'] 		= $row[6];
							$data['invitemailtemp'] 		= $row[7];
						}
					}
				
				}
				$this->Campaign_model->insert('recflowpreset',$data);
			}
		}
		else{
			$data['flowpresetid'] 			= $frm['flowpresetid'];

			$match = array('flowpresetid' => $frm['flowpresetid']);
			$rdata['flowpresetname'] 		= $frm['flowpresetname'];
			$rdata['updatedby'] 			= $this->session->userdata('user_admin')['operatorid'];
			$this->Campaign_model->update('recflowpresetheader',$match, $rdata);

			$this->Campaign_model->delete_row('recflowpreset',$match);

			unset($frm['flowpresetid']);
			unset($frm['flowpresetname']);
			unset($frm['count_round_form']);
			foreach ($frm as $row) {
				$data['transferemail'] 		= $data['discardemail'] = 'N';
				$data['transfmailtemp'] 	= $data['discmailtemp'] = $data['assessment'] = $data['asmtmailtemp'] = $data['letteroffermailtemp'] = $data['scorecard']  	= $data['interviewmailtemp'] = $data['invitemailtemp'] = 0;
				$data['sorting'] 		= $row[0];
				$data['roundname'] 		= $row[1];
				$data['roundtype'] 		= $row[2];
				if (isset($row[3]) && $row[3] == 'on' && isset($row[5]) && $row[5] == 'on'){
					$data['transferemail'] 		= 'Y';
					$data['transfmailtemp'] 	= $row[4];
					$data['discardemail'] 		= 'Y';
					$data['discmailtemp'] 		= $row[6];

					if (isset($row[7])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[7];
							$data['asmtmailtemp'] 		= $row[8];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[7];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[7];
							$data['interviewmailtemp'] 		= $row[8];
							$data['invitemailtemp'] 		= $row[9];
						}
					}
				} 
				else if (isset($row[3]) && $row[3] == 'on') {
					$data['transferemail'] 		= 'Y';
					$data['transfmailtemp'] 	= $row[4];
					$data['discmailtemp'] 		= $row[5];
					if (isset($row[6])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[6];
							$data['asmtmailtemp'] 		= $row[7];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[6];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[6];
							$data['interviewmailtemp'] 		= $row[7];
							$data['invitemailtemp'] 		= $row[8];
						}
					}
				}
				else if (isset($row[4]) && $row[4] == 'on') {
					$data['transfmailtemp'] 	= $row[3];
					$data['discardemail'] 		= 'Y';
					$data['discmailtemp'] 		= $row[5];
					if (isset($row[6])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[6];
							$data['asmtmailtemp'] 		= $row[7];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[6];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[6];
							$data['interviewmailtemp'] 		= $row[7];
							$data['invitemailtemp'] 		= $row[8];
						}
					}
				}else if (isset($row[3]) && $row[3] != 'on' ) {
				 	$data['transfmailtemp'] 	= $row[3];
					$data['discmailtemp'] 		= $row[4];
					if (isset($row[5])) {
						if ($row[2] == 'Assessment') {
							$data['assessment'] 		= $row[5];
							$data['asmtmailtemp'] 		= $row[6];
						}else if ($row[2] == 'Offer') {
							$data['letteroffermailtemp'] 		= $row[5];
						}else if ($row[2] == 'Interview'){
							$data['scorecard'] 				= $row[5];
							$data['interviewmailtemp'] 		= $row[6];
							$data['invitemailtemp'] 		= $row[7];
						}
					}
				
				}
				$this->Campaign_model->insert('recflowpreset',$data);
			}
		}
		echo json_encode($data['flowpresetid']);
	}

	public function changeProcess($flowpresetid='')
	{
		$sql1 = "SELECT a.* FROM recflowpreset a WHERE a.flowpresetid = '$flowpresetid' ";
		$data = $this->Campaign_model->select_sql($sql1);
		echo json_encode($data);
	}
}

/* End of file RecruitProcess.php */
/* Location: ./application/controllers/admin/RecruitProcess.php */
?>