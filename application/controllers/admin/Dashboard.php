<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('url','my_helper','file'));
		$this->load->library('session');
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','M_auth'));

		$ac_data['dashboard'] 		= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 2;
	    $this->sess  = $this->session->userdata('user_admin');  
	}
	public function index()
	{
		$sql0 = "exec sp_report ";
		$data['report'] = $this->Campaign_model->select_sql($sql0)[0];

		$sql = "SELECT a.operatorid, a.operatorname FROM operator a WHERE a.groupid = '1'";
		$result = $this->Campaign_model->select_sql($sql);
		if (is_array($result)) {
			for ($i=0; $i < count($result); $i++) {
				$operatorid = $result[$i]['operatorid']; 

				$sql1 = "SELECT count(DISTINCT a.campaignid) as count FROM reccampaign a LEFT JOIN recflow b ON a.campaignid = b.campaignid WHERE a.managecampaign LIKE '%,$operatorid,%' OR b.manageround LIKE '%,$operatorid,%' ";
				$result[$i]['count_campaign'] = $this->Campaign_model->select_sql($sql1)[0]['count'];

				$sql2 = "SELECT count(*) as count FROM cancomment a  WHERE a.createdby = '$operatorid' AND (a.type = 'comment' OR a.rate > 0) ";
				$result[$i]['count_comment'] = $this->Campaign_model->select_sql($sql2)[0]['count'];

				$sql3 = "SELECT count(*) as count FROM cancomment a  WHERE a.createdby = '$operatorid' AND (a.type = 'call') ";
				$result[$i]['count_call'] = $this->Campaign_model->select_sql($sql3)[0]['count'];

				$sql4 = "SELECT count(*) as count FROM mailtable a  WHERE a.createdby = '$operatorid' ";
				$result[$i]['count_email'] = $this->Campaign_model->select_sql($sql4)[0]['count'];

				$sql5 = "SELECT count(*) as count FROM profilehistory a  WHERE a.createdby = '$operatorid' AND a.actiontype = 'Transfer' ";
				$result[$i]['count_transfer'] = $this->Campaign_model->select_sql($sql5)[0]['count'];

				$sql6 = "SELECT count(*) as count FROM profilehistory a  WHERE a.createdby = '$operatorid' AND a.actiontype = 'Discard' ";
				$result[$i]['count_discard'] = $this->Campaign_model->select_sql($sql6)[0]['count'];

				$sql7 = "SELECT COUNT(DISTINCT a.interviewid) as count FROM interviewer a  WHERE a.interviewer = '$operatorid' ";
				$result[$i]['count_interview'] = $this->Campaign_model->select_sql($sql7)[0]['count'];

				$sql8 = "SELECT count(*) as count FROM offer a  WHERE a.createdby = '$operatorid' ";
				$result[$i]['count_offer'] = $this->Campaign_model->select_sql($sql8)[0]['count'];

				$sql9 = "SELECT count(*) as count FROM profilehistory a  WHERE a.createdby = '$operatorid' AND a.actiontype = 'Recruite' ";
				$result[$i]['count_recruite'] = $this->Campaign_model->select_sql($sql9)[0]['count'];
			}
		}

		$data['operator'] = $result;

		

		

		// if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
		// 	$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		// }else{
			$this->data['temp'] = $this->load->view('admin/dashboard/index',$data,true);
		// }
		
		$this->load->view('admin/home/master',$this->data);
	}

	public function getData()
	{
		$sql = "SELECT count(profilesrc) as n, profilesrc FROM candidate GROUP BY profilesrc ";
		$data['profilesrc'] = $this->Campaign_model->select_sql($sql);
		$data['dou'] = [];
		$data['dou']['label'] = [];
		$data['dou']['data'] = [];
		foreach ($data['profilesrc'] as $key => $value) {
			$data['dou']['label'][] = $value['profilesrc'];
			$data['dou']['data'][] = $value['n'];
		}


		$sql0 = "exec sp_report";
		$data['report'] = $this->Campaign_model->select_sql($sql0)[0];
		$data['bar'] = [];
		$data['bar'][] = $data['report']['filter']; 
		$data['bar'][] = $data['report']['assessment'];
		$data['bar'][] = $data['report']['interview'];
		$data['bar'][] = $data['report']['offer'];
		$data['bar'][] = $data['report']['recruite']; 

		echo json_encode($data);
	}
	
}

/* End of file Config.php */
/* Location: ./application/controllers/admin/Config.php */
?>