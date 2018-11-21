<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiplechoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->library('session');
		$this->load->model(array('M_data'));

		$this->table = 'asmtheader';
		$this->sess  = $this->session->userdata('user_admin'); 

		$_page['assess']				= true;
		$this->data['header'] 		= $this->load->view('admin/multiplechoice/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/multiplechoice/menu',$_page,true);
	    $this->data['footer'] 		= $this->load->view('admin/multiplechoice/footer',null,true);
	}
	
	public function index(){

		$_data = [];

		$sql = "SELECT 
					a.*, 
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name 
				FROM $this->table a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				ORDER BY a.lastupdate";

		$_data['records'] = $this->M_data->select_sql($sql);
		
		$this->data['script']   = $this->load->view('admin/multiplechoice/default/script', NULL, TRUE); 
		$this->data['temp'] 	= $this->load->view('admin/multiplechoice/default/page',$_data,true);

		$this->load->view('admin/multiplechoice/master',$this->data);
	}

	public function create(){

		$_data = [];
		$this->data['script']   = $this->load->view('admin/multiplechoice/create/script', $_data, TRUE); 
		$this->data['temp'] 	= $this->load->view('admin/multiplechoice/create/page', $_data, true);

		$this->load->view('admin/multiplechoice/master',$this->data);
	}

	public function add(){
		$post = $this->input->post();

		$h = isset($post['timelimit_h'])?$post['timelimit_h']:0;
		$m = isset($post['timelimit_m'])?$post['timelimit_m']:0;

		$timelimit = ((int)$h)*60+(int)$m;

		$push = array(
			'asmtname'  	=> isset($post['asmtname'])?$post['asmtname']:'',
			'asmttype'  	=> isset($post['asmttype'])?$post['asmttype']:'',
			'asmtstatus'  	=> isset($post['asmtstatus'])?$post['asmtstatus']:'',
			'shuffle'  		=> isset($post['shuffle'])?$post['shuffle']:'',
			'shuffleqty'  	=> isset($post['shuffleqty'])?$post['shuffleqty']:'',
			'targetscore'   => isset($post['targetscore'])?$post['targetscore']:'',
			'timelimit'  	=> $timelimit,
			'note'  		=> isset($post['note'])?$post['note']:'',
			'createdby'		=> $this->sess['operatorid']
		);

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		$rslt = $this->M_data->insert($this->table,$push);

		if ($rslt) {
			$resp['success'] = true;
			$resp['message'] = "success";
			$resp['data']    = array('id'=>$rslt);
		}

		echo json_encode($resp);
	}

	public function edit(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['asmttemp'])&&!$post['asmttemp']) {
			$resp['message'] = "ID phiếu không đúng.";
			echo json_encode($resp);
			exit;
		}

		$h = isset($post['timelimit_h'])?$post['timelimit_h']:0;
		$m = isset($post['timelimit_m'])?$post['timelimit_m']:0;

		$timelimit = ((int)$h)*60+(int)$m;

		$push = array(
			'asmtname'  	=> isset($post['asmtname'])?$post['asmtname']:'',
			'asmttype'  	=> isset($post['asmttype'])?$post['asmttype']:'',
			'asmtstatus'  	=> isset($post['asmtstatus'])?$post['asmtstatus']:'',
			'shuffle'  		=> isset($post['shuffle'])?$post['shuffle']:'',
			'shuffleqty'  	=> isset($post['shuffleqty'])?$post['shuffleqty']:'',
			'targetscore'   => isset($post['targetscore'])?$post['targetscore']:'',
			'timelimit'  	=> $timelimit,
			'note'  		=> isset($post['note'])?$post['note']:'',
			'updatedby'		=> $this->sess['operatorid']
		);

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		$rslt = $this->M_data->update($this->table,array('asmttemp'=>$post['asmttemp']),$push);

		if ($rslt) {
			$resp['success'] = true;
			$resp['message'] = "success";
			$resp['data']    = array('result'=>$rslt);
		}

		echo json_encode($resp);
	}

	public function detail($asmttemp='')
	{
		
		$_data = [];

		$sql = "SELECT 
					a.*, 
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name 
				FROM $this->table a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				WHERE a.asmttemp = '$asmttemp' 
				ORDER BY a.lastupdate";

		$_data['asmt'] = $this->M_data->select_sql($sql);

		if (empty($_data['asmt'])) {
			echo "Phiếu không tồn tại.";
			exit;
		}

		$sql = "SELECT 
					a.*, 
					b.operatorname as createdby_name,  
					c.operatorname as updatedby_name,
					d.operatorname as candidate_name
				FROM assessment a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				LEFT JOIN operator d ON a.candidateid = d.operatorid
				WHERE a.asmttemp = '$asmttemp' AND a.status = 'W'
				ORDER BY a.lastupdate";

		$_data['asmt_w'] = $this->M_data->select_sql($sql);

		$sql = "SELECT 
					a.*, 
					b.operatorname as createdby_name,  
					c.operatorname as updatedby_name,
					d.operatorname as candidate_name
				FROM assessment a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				LEFT JOIN operator d ON a.candidateid = d.operatorid
				WHERE a.asmttemp = '$asmttemp' AND a.status = 'C'
				ORDER BY a.lastupdate";

		$_data['asmt_c'] = $this->M_data->select_sql($sql);

		$sql = "SELECT 
				a.questionid,
				a.asmttemp,
				a.section,
				a.questiontype,
				a.question,
				a.questioncontent,
				a.comment,
				a.requirement,
				a.imageid,
				a.othersallow,
				a.addanswerallow,
				a.scorefrom,
				a.scoreto,
				a.used,
				b.operatorname as createdby_name_q, 
				c.operatorname as updatedby_name_q
			FROM asmtquestion a
			LEFT JOIN operator b ON a.createdby = b.operatorid
			LEFT JOIN operator c ON a.updatedby = c.operatorid
			WHERE a.asmttemp = '$asmttemp' 
			ORDER BY a.section";
		
		$ques = $this->M_data->select_sql($sql);
		$section = [];

		if(!empty($ques)){
			$_sec = $ques[0]['section'];
			$count = 0;
			foreach ($ques as $key => $value) {
				if ($_sec!=$value['section']){$_sec = $value['section']; $count = 0;}
				$section[$_sec]['question'][$count] = $value;
				$questionid = $value['questionid'];
				$sql = "SELECT
					a.questionid,
					a.optionid,
					a.answercontent,
					a.imageid,
					a.score,
					a.isright,
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name
				FROM asmtoption a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				WHERE a.questionid = '$questionid' 
				ORDER BY a.lastupdate";
				$section[$_sec]['question'][$count]['answer'] = $this->M_data->select_sql($sql);
				$count++;
			}
		}

		// // var_dump($ques);
		// foreach ($section as $key => $value) {
		// 	var_dump($value);
		// 	echo "<br><br>";
		// }
		$_data['section'] = $section;
		
		$this->data['script']   = $this->load->view('admin/multiplechoice/edit/script', NULL, TRUE); 
		$this->data['temp'] 	= $this->load->view('admin/multiplechoice/edit/page',$_data,true);

		$this->load->view('admin/multiplechoice/master',$this->data);
	}

	public function edit_question(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['asmttemp'])&&!$post['asmttemp']) {
			$resp['message'] = "ID phiếu không đúng.";
			echo json_encode($resp);
			exit;
		}

		if (!isset($post['section'])&&empty($post['section'])) {
			$resp['message'] = "Không tìm thấy dữ liệu yêu cầu.";
			echo json_encode($resp);
			exit;
		}

		$s = $post['section'];
		$ques['asmttemp'] = (int)$post['asmttemp'];
		// var_dump($s);
		for ($i=0; $i < count($s); $i++) { 
			$ques['section'] = $i;
			$q 				 = isset($s[$i]['question'])?$s[$i]['question']:[];
			if(!empty($q))for ($j=0; $j < count($q); $j++) { 
				$ques['sorting']        = $j+1;
				$ques['question'] 		= isset($q[$j]['question'])?$q[$j]['question']:'';
				$ques['questiontype'] 	= isset($q[$j]['questiontype'])?$q[$j]['questiontype']:'';
				$ques['requirement'] 	= isset($q[$j]['requirement'])?1:0;
				$ques['scorefrom'] 		= isset($q[$j]['scorefrom'])?(int)$q[$j]['scorefrom']:0;
				$ques['scoreto'] 		= isset($q[$j]['scoreto'])?(int)$q[$j]['scoreto']:0;
				$ques['othersallow'] 	= isset($q[$j]['othersallow'])?1:0;
				$ques['addanswerallow'] = isset($q[$j]['addanswerallow'])?1:0;
				$ques['createdby']		= $this->sess['operatorid'];

				$q_id = isset($q[$j]['questionid'])?$q[$j]['questionid']:'';
				if ($q_id!='') {
					$resp['data']['section'.$i]['question'.$j]['action'] = "update";
					$resp['data']['section'.$i]['question'.$j]['result'] = $this->M_data->update('asmtquestion',array('questionid'=>$q_id),$ques);
				}else{
					$q_id = $this->M_data->insert('asmtquestion',$ques);
					$resp['data']['section'.$i]['question'.$j]['action'] = "insert";
					$resp['data']['section'.$i]['question'.$j]['id'] 	 = $q_id;
				}
				//answer
				$a = isset($q[$j]['answer'])?$q[$j]['answer']:[];
				// var_dump($a);
				$ans['questionid'] = $q_id;
				if(!empty($a)&&$q_id!='')for ($k=0; $k < count($a); $k++) { 
					$ans['answercontent'] 	= $a[$k]['answercontent'];
					$ans['score'] 			= (int)$a[$k]['score'];
					$ans['isright'] 		= isset($a[$k]['isright'])?1:0;
					$ans['createdby']		= $this->sess['operatorid'];

					$a_id = isset($a[$k]['optionid'])?$a[$k]['optionid']:'';
					if ($a_id!='') {
						$resp['data']['section'.$i]['question'.$j]['answer'.$k]['action'] = "update";
						$resp['data']['section'.$i]['question'.$j]['answer'.$k]['result'] = $this->M_data->update('asmtoption',array('optionid'=>$a_id),$ans);
					}else{
						$a_id = $this->M_data->insert('asmtoption',$ans);
						$resp['data']['section'.$i]['question'.$j]['answer'.$k]['action'] = "insert";
						$resp['data']['section'.$i]['question'.$j]['answer'.$k]['id'] 	 = $a_id;
					}
				}
			}
		}
		$resp['success'] = true;
		$resp['message'] = "success.";

		echo json_encode($resp);
		// var_dump($post);
	}
	
	public function assessmentlist()
	{
		$this->data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 
		$this->data['temp'] = $this->load->view('admin/multiplechoice/assessmentlist',null,true);

		$this->load->view('admin/home/master',$this->data);	
	}

	public function pageAssessment($candidateid, $campaignid, $check = '0')
	{
		if ($candidateid != 0) {
			$sql = "SELECT tt.*, candidate.name, candidate.email FROM assessment tt INNER JOIN (SELECT candidateid, MAX(createddate) AS MaxDateTime FROM assessment WHERE candidateid = '$candidateid' AND campaignid = '$campaignid'  GROUP BY candidateid) groupedtt ON tt.candidateid = groupedtt.candidateid AND tt.createddate = groupedtt.MaxDateTime LEFT JOIN candidate ON tt.candidateid = candidate.candidateid   ";
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
}