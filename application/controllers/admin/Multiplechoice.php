<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiplechoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','my_helper'));
		$this->load->library('session');
		$this->load->model(array('M_data','M_auth','admin/Campaign_model','admin/Data_model','admin/Candidate_model'));

		$this->table = 'asmtheader';
		$this->sess  = $this->session->userdata('user_admin');  
		$this->seg   = 6;

		$_page['tuyendung']	        = 'active menu-open';
		$_page['multiplechoice']	= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$_page,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);

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
		
		if($this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['script']   = $this->load->view('admin/multiplechoice/default/script', NULL, TRUE); 
			$this->data['temp'] 	= $this->load->view('admin/multiplechoice/default/page',$_data,true);
		}else{
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}

		$this->load->view('admin/home/master',$this->data);
	}

	public function create(){

		$_data = [];
		$this->data['script']   = $this->load->view('admin/multiplechoice/create/script', $_data, TRUE); 
		$this->data['temp'] 	= $this->load->view('admin/multiplechoice/create/page', $_data, true);

		$this->load->view('admin/home/master',$this->data);
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

	public function detail($asmttemp='',$active='2')
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
				a.sectionname,
				a.questiontype,
				a.question,
				a.questioncontent,
				a.comment,
				a.requirement,
				a.othersallow,
				a.addanswerallow,
				a.scorefrom,
				a.scoreto,
				a.used,
				b.operatorname as createdby_name_q, 
				c.operatorname as updatedby_name_q,
				d.url as image,
				d.recordid as imageid
			FROM asmtquestion a
			LEFT JOIN operator b ON a.createdby = b.operatorid
			LEFT JOIN operator c ON a.updatedby = c.operatorid
			LEFT JOIN document d ON a.imageid = d.recordid 
			WHERE a.asmttemp = '$asmttemp' 
			ORDER BY a.section";
		
		$ques = $this->M_data->select_sql($sql);
		$section = [];

		if(!empty($ques)){
			$_sec     = $ques[0]['section'];
			$count = 0;
			foreach ($ques as $key => $value) {
				if ($_sec!=$value['section']){
					$_sec = $value['section']; 
					$count = 0;
				}
				$section[$_sec]['sectionname'] = $value['sectionname'];
				$section[$_sec]['question'][$count] = $value;
				$questionid = $value['questionid'];
				$sql = "SELECT
					a.questionid,
					a.optionid,
					a.answercontent,
					a.score,
					a.isright,
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name,
					d.url as image,
					d.recordid as imageid
				FROM asmtoption a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				LEFT JOIN document d ON a.imageid = d.recordid
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
		// var_dump($section);
		$_data['section'] = $section;

		if ($active == '2') {
			$_data['active2'] = 'active';
		}else if ($active == '3') {
			$_data['active3'] = 'active';
		}
		
		$this->data['script']   = $this->load->view('admin/multiplechoice/edit/script', NULL, TRUE); 
		$this->data['temp'] 	= $this->load->view('admin/multiplechoice/edit/page',$_data,true);

		$this->load->view('admin/home/master',$this->data);
	}

	public function edit_question(){
		$post  = $this->input->post();
		$files = $_FILES;
		$f     = [];

		if (!empty($files)) {
            foreach ($files as $key => $value) {
                $f[$key] = $this->M_data->uploadfile($key,$value);
            }
        }

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
			$ques['section'] 			= $i;
			$ques['sectionname'] 		= isset($s[$i]['sectionname'])?$s[$i]['sectionname']:'';
			$q 				 			= isset($s[$i]['question'])?$s[$i]['question']:[];
			if(!empty($q))for ($j=0; $j < count($q); $j++) { 
				$ques['sorting']        = $j+1;
				$ques['questioncontent']= isset($q[$j]['question'])?$q[$j]['question']:'';
				$ques['questiontype'] 	= isset($q[$j]['questiontype'])?$q[$j]['questiontype']:'';
				$ques['requirement'] 	= isset($q[$j]['requirement'])?1:0;
				$ques['scorefrom'] 		= isset($q[$j]['scorefrom'])?(int)$q[$j]['scorefrom']:0;
				$ques['scoreto'] 		= isset($q[$j]['scoreto'])?(int)$q[$j]['scoreto']:0;
				$ques['othersallow'] 	= isset($q[$j]['othersallow'])?1:0;
				$ques['addanswerallow'] = isset($q[$j]['addanswerallow'])?1:0;
				$ques['createdby']		= $this->sess['operatorid'];

				if(isset($f['s'.$i.'q'.$j])){
					$ques['imageid'] = $this->M_data->insert('document',array('url'=>$f['s'.$i.'q'.$j]));
				}else{
					$ques['imageid'] = 0;
				}
				$q_id = isset($q[$j]['questionid'])?$q[$j]['questionid']:'';
				if ($q_id!='') {
					if($ques['imageid']==0)unset($ques['imageid']);
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

					if(isset($f['s'.$i.'q'.$j.'a'.$k])){
						$ans['imageid'] = $this->M_data->insert('document',array('url'=>$f['s'.$i.'q'.$j.'a'.$k]));
					}else{
						$ans['imageid'] = 0;
					}

					$a_id = isset($a[$k]['optionid'])?$a[$k]['optionid']:'';
					if ($a_id!='') {
						if($ans['imageid']==0)unset($ans['imageid']);
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

	public function del_image(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['id'])) {
			$resp['message'] = "ID không tồn tại.";
			echo json_encode($resp);
			exit;
		}

		$resp['data'] = array('result'=>$this->M_data->delete('document',array('recordid'=>$post['id'])));

		echo json_encode($resp);
	}

	public function del_answer(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['id'])) {
			$resp['message'] = "ID không tồn tại.";
			echo json_encode($resp);
			exit;
		}

		$resp['data'] = array('result'=>$this->M_data->delete('asmtoption',array('optionid'=>$post['id'])));

		echo json_encode($resp);
	}

	public function del_question(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['id'])) {
			$resp['message'] = "ID không tồn tại.";
			echo json_encode($resp);
			exit;
		}

		$resp['data'] = array('result'=>$this->M_data->delete('asmtquestion',array('questionid'=>$post['id'])));

		echo json_encode($resp);
	}

	public function pageAssessment($asmtid = 0, $check = 1){
		if ($asmtid != 0) {
			$sql = "
				SELECT 
					a.asmtid,
					a.asmttemp,
					a.duedate,
					a.status, 
					b.name as can_name, 
					b.email as can_email,
					c.timelimit,
					c.note,
					c.asmtname

				FROM assessment a  
				LEFT OUTER JOIN candidate b ON a.candidateid = b.candidateid  
				LEFT OUTER JOIN asmtheader c ON a.asmttemp = c.asmttemp 
				WHERE a.asmtid = '$asmtid'";

			$result = $this->M_data->select_sql($sql);
			$data['assessment'] = $result[0];
		}else{
			$data['assessment']['status'] = '';
		}

		$data['check'] = $check;

		$asmttemp = $result[0]['asmttemp'];
		$data['genq'] = $this->generated_quest($asmtid,$asmttemp);
		for ($i=0; $i < count($data['genq']); $i++) { 
			if (isset($data['genq'][$i]['question']) && count($data['genq'][$i]['question']) > 0 ) {
				for ($j=0; $j < count($data['genq'][$i]['question']); $j++) { 
					$data['genq'][$i]['question'][$j]['questioncontent'] = nl2br($data['genq'][$i]['question'][$j]['questioncontent']);
				}
			}
		}
		// echo '<pre>';
		// print_r($data['genq']);
		// echo '</pre>';

		$this->_data['temp'] = $this->load->view('admin/multiplechoice/pageAssessment',$data,true);

		$this->load->view('admin/home/master-iframe',$this->_data);	
	}

	public function gen_quest(){
		$post = $this->input->post();
		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['asmttemp'])) {
			$resp['message'] = "Mẫu phiếu không tồn tại.";
			echo json_encode($resp);
			exit;
		}

		$asmttemp = $post['asmttemp'];
		$asmtid = $post['asmtid'];
		$time = date('Y-m-d H:i:s');

		if($asmttemp!=''&&$asmtid!=''){
			$genq = $this->generated_quest($asmtid,$asmttemp);
			$asmt = $this->M_data->select_sql("SELECT * FROM asmtheader WHERE asmttemp='$asmttemp'");

			$shuffle = isset($asmt[0]['shuffle'])?$asmt[0]['shuffle']:'';
			$shuffleqty = isset($asmt[0]['shuffleqty'])?$asmt[0]['shuffleqty']:'';

			// var_dump($genq);
			if(!empty($genq)){
				$result = $genq;
				$time = $genq[0]['question'][0]['createddate'];
			}else{
				$result = $this->get_asmt_question($asmtid,$asmttemp);
			}

			$sec = $result;
			$section = [];
			$i = 0;
			if ($shuffle=='1'&&!empty($sec)&&empty($genq)) {
				foreach ($sec as $key => $value) {
					$ques = isset($value['question'])?$value['question']:'';
					if(!empty($ques)){
						shuffle($ques);
						$section[$i]['question'] = $ques;
						$i++;
					}
				}
			}else{
				$section = $sec;
			}
			// var_dump($section);
			// exit;
			$thieu = 0;
			if ($shuffleqty!=''&&$shuffleqty!='0'&&empty($genq)) {
				$c = count($section);
				$p = number_format((int)$shuffleqty/$c);
				$m = (int)$shuffleqty%$c;
				$i = 0;
				foreach ($section as $key => $value) {
					$section1[$i]['sectionname'] = $value['question'][0]['sectionname'];
					$q = count($value['question']);
					if ($q >= $p+$m) {
						$section1[$i]['question'] = array_slice($value['question'],0,$p+$m);
						$m = 0;
					}else if ($q <= $p) {
						$section1[$i]['question'] = array_slice($value['question'],0,$q);
						$thieu += $p-$q;
						$m = 0;
					}else{
						$m+= $p-$q;
					}
					$i++;
				}
				if ($thieu >0) {
					$m = (int)$shuffleqty%$c;
					$i = 0;
					foreach ($section as $key => $value) {
						$q = count($value['question']);
						if ($q >= $p+$m+$thieu) {
							$section1[$i]['question'] = array_slice($value['question'],0,$p+$m+$thieu);
							$i++;
						}
					}
				}
				$this->save_genquest($asmtid,$section1);
			}else{
				$section1 = $section;
			}

			// var_dump($section1);
			// exit;
			$resp['data'] = $section1;
			$resp['success'] = true;
			
			$resp['message'] = "success.";

			$timelimit = isset($asmt[0]['timelimit'])?$asmt[0]['timelimit']: 0;
			$hour = (int)($timelimit/60);
			$minu = (int)($timelimit-$hour*60);
			$cenvertedTime = date('M d,Y H:i:s',strtotime('+'.$hour.' hour +'.$minu.' minutes',strtotime($time)));
			$resp['time'] = $cenvertedTime;

			$this->M_data->update('assessment',array('asmtid'=>$asmtid),array('status'=>'W'));
		}

		echo json_encode($resp);
	}

	public function interview_question($interviewid, $interviewerid='')
	{
        if ($interviewid != 0) {
            $sql = "SELECT tt.*, 
            			candidate.name, 
            			candidate.email, 
            			candidate.imagelink,
            			reccampaign.position 
            		FROM interview tt  
            		LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  
            		LEFT JOIN reccampaign ON tt.campaignid = reccampaign.campaignid 
            		WHERE tt.interviewid = $interviewid";

            $result = $this->Campaign_model->select_sql($sql);
            $this->data2['interview'] = $result[0];
            $this->data2['interviewerid'] = $interviewerid;
            $this->data2['interviewid'] = $interviewid;
            $id = $result[0]['candidateid'];
            $campaignid = $result[0]['campaignid'];
            $roundid = $result[0]['roundid'];
        }else{
            $this->data2['interview'] = array();
            $this->data2['interview']['name'] = 'Đỗ Phương Nam';
            $this->data2['interview']['position'] = 'Giám đốc đầu tư';
            $this->data2['interviewerid'] = $interviewerid;
            $this->data2['interviewid'] = $interviewid;
            $id = 1;
            $campaignid = 2;
            $roundid = 3;
        }

		$this->data2['campaignid'] 	= $campaignid;
		$this->data2['roundid'] 	= $roundid;
		$match = array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data2['campaignname'] 	=	($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid,),''))[0]['position'];
		$this->data2['roundtype'] 		=	($this->Campaign_model->select("roundtype",'recflow',$match,''))[0]['roundtype'];

		$sql                = "SELECT email,profilesrc FROM candidate WHERE candidateid = $id";
        $result             = ($this->Campaign_model->select_sql($sql))[0];
        $mail               = $result['email'];
        $profilesrc         = $result['profilesrc'];

		$this->data2['id'] 	= $id;
		$join[0] 			= array('table'=> 'operator','match' =>'tb.createdby = operator.operatorid');
        $join[1] 			= array('table'=> 'document','match' =>"tb.createdby = document.referencekey AND document.tablename = 'operator' ");
        $orderby 			= array('colname'=>'tb.createddate','typesort'=>'desc');
        $history_cmt 		= $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id),'','cancomment tb',$join,'',$orderby,'','');

        $type 				= array('Talent','Nottalent','Trust','Block');
        $history_profile1 	= $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id, 'tb.campaignid' => 0),'','profilehistory tb',$join,'',$orderby,'','');
        $history_profile2 	= $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','profilehistory tb',$join,'',$orderby,'','');

        //mail
        $history_profile6 	= $this->Data_model->select_row_option('tb.emailsubject,tb.mailid, tb.createddate, tb.isshare, operator.operatorname, document.filename',array('tb.toemail'=>$mail),'','mailtable tb',$join,'',$orderby,'','');

        //history assessment
        $join[2] 			= array('table'=> 'operator c','match' =>'tb.updatedby = c.operatorid');
        $join[3] 			= array('table'=> 'asmtheader d','match' =>'tb.asmttemp = d.asmttemp');
        $orderby1 			= array('colname'=>'tb.lastupdate','typesort'=>'desc');
        $history_profile3 	= $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate, d.asmtname, d.shuffleqty, d.targetscore',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid,'sysform !=' => 'N'),'','assessment tb',$join,'',$orderby1,'','');
        for ($j=0; $j < count($history_profile3) ; $j++) { 
        	$asmttemp = $history_profile3[$j]['asmttemp'];
        	$asmtid = $history_profile3[$j]['asmtid'];
        	$sql = "SELECT COUNT(DISTINCT section) as count_section, count(questionid) as count_question FROM asmtquestion WHERE asmttemp = '$asmttemp'";
			$result 		= $this->Campaign_model->select_sql($sql);
			$history_profile3[$j]['count_section'] 		= ($result)[0]['count_section'];
			$history_profile3[$j]['count_question'] 	= ($result)[0]['count_question'];
			//answer
			$sql = "SELECT COUNT(DISTINCT answerid) as count_answer FROM asmtanswer WHERE asmtid = '$asmtid'";
			$result 		= $this->Campaign_model->select_sql($sql);
			$history_profile3[$j]['count_answer'] 		= ($result)[0]['count_answer'];

			//tính điểm trả lời
			$sql = "SELECT SUM(b.score) as total  FROM asmtanswer a LEFT JOIN asmtoption b ON a.questionid = b.questionid AND a.optionid = b.optionid WHERE a.asmtid =  '$asmtid' AND b.isright = '1'";
			$history_profile3[$j]['score_answer'] 		= (int)$this->Campaign_model->select_sql($sql)[0]['total'];

			//tính tổng điểm phiếu
			$asmtid = $history_profile3[$j]['asmtid'];
			$sql = "SELECT SUM(b.score) as total FROM genquest a LEFT JOIN asmtoption b ON a.questionid = b.questionid WHERE a.asmtid =  '$asmtid' AND b.isright = '1'";
			$history_profile3[$j]['score_genquest'] 		= (int)$this->Campaign_model->select_sql($sql)[0]['total'];
        }
        unset($join[3]);

        // history interview
        $history_profile4 	= $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','interview tb',$join,'',$orderby1,'','');
        $orderby1 			= array('colname'=>'a.createddate','typesort'=>'desc');
        for ($i=0; $i < count($history_profile4); $i++) { 
        	$join1[0] 		= array('table'=> 'operator b','match' =>'a.interviewer = b.operatorid');
        	$join1[1] 		= array('table'=> 'document c','match' =>"a.interviewer = c.referencekey AND c.tablename = 'operator' ");
        	$join1[2] 		= array('table'=> 'assessment d','match' =>'a.inv_asmtid = d.asmtid');
        	$join1[3] 		= array('table'=> 'asmtanswer e','match' =>'a.inv_asmtid = e.asmtid');
        	$history_profile4[$i]['interviewer'] = $this->Data_model->select_row_option('a.interviewer, a.inv_asmtid, a.scr_asmtid, d.status, b.operatorname, c.filename, e.optionid, e.ansdatetime, e.ansdatetime2',array('a.interviewid'=>$history_profile4[$i]['interviewid']),'','interviewer a',$join1,'',$orderby1,'','');
        }

        // history offer
        $join[3] 			= array('table'=> 'assessment d','match' =>'tb.off_asmtid = d.asmtid');
        $join[4] 			= array('table'=> 'asmtanswer e','match' =>'tb.off_asmtid = e.asmtid');
        $history_profile5 	= $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate,d.status, e.optionid, e.anstext',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','offer tb',$join,'',$orderby,'','');


        $this->data2['history'] = array_merge($history_cmt, $history_profile1, $history_profile2,$history_profile3,$history_profile4,$history_profile5, $history_profile6);
        function cmp($a, $b) {
            if ($a['createddate'] == $b['createddate']) {
                return 0;
            }
            return ($a['createddate'] < $b['createddate']) ? 1 : -1;
        }
        uasort($this->data2['history'], 'cmp');

        if($profilesrc == 'Nội bộ' || $profilesrc == 'Web Admin'){
            $this->data2['candidate_noibo']     = $this->Candidate_model->first_row('candidate',array('candidateid' => $id, ),'','');
            $id                                 = -1;
            $id_mergewith                       = $this->data2['candidate_noibo']['candidateid'];
        }else{
            $this->data2['candidate_noibo']     = $this->Candidate_model->first_row('candidate',array('mergewith' => $id, ),'','');
            $id_mergewith                       = $this->data2['candidate_noibo']['candidateid'];
        }
        $this->data2['city'] 		= $this->Campaign_model->selectall('city');
        $this->data2['document'] 	= $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','');
        $this->data2['comment'] 	= $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
		$this->data2['address'] 	= $this->Candidate_model->selectTableByIds('canaddress',$id);
		$this->data2['candidate'] 	= $this->Candidate_model->selectTableById('candidate',$id);
		$this->data2['family'] 		= $this->Candidate_model->selectTableByIds('cansocial',$id);
		$this->data2['experience'] 	= $this->Candidate_model->selectTableByIds('canexperience',$id);
		$vt                         = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id,'dateto');
    	$this->data2['vt']          = $vt['position'].' - '.$vt['company'];
		$this->data2['reference'] 	= $this->Candidate_model->selectTableByIds('canreference',$id);
		$this->data2['knowledge'] 	= $this->Candidate_model->selectTableByIds('canknowledge',$id);
		$this->data2['language'] 	= $this->Candidate_model->selectTableByIds('canlanguage',$id);
		$this->data2['software'] 	= $this->Candidate_model->selectTableByIds('cansoftware',$id);

		//noibo
        
        $this->data2['address_noibo']    = $this->Candidate_model->selectTableByIds('canaddress',$id_mergewith);
        $this->data2['family_noibo']        = $this->Candidate_model->selectTableByIds('cansocial',$id_mergewith);
        $this->data2['experience_noibo']    = $this->Candidate_model->selectTableByIds('canexperience',$id_mergewith);
        $this->data2['reference_noibo']     = $this->Candidate_model->selectTableByIds('canreference',$id_mergewith);
        $this->data2['knowledge_noibo']     = $this->Candidate_model->selectTableByIds('canknowledge',$id_mergewith);
        $this->data2['language_noibo']      = $this->Candidate_model->selectTableByIds('canlanguage',$id_mergewith);
        $this->data2['software_noibo']      = $this->Candidate_model->selectTableByIds('cansoftware',$id_mergewith);
        $this->data2['document_noibo']      = $this->Candidate_model->first_row('document',array('referencekey'=>$id_mergewith,'tablename' => 'candidate'),'filename,url','');

		//for interview question
		$sql = "SELECT a.scr_asmtid as asmtid, b.asmttemp
				FROM interviewer a
				LEFT OUTER JOIN assessment b ON a.scr_asmtid = b.asmtid
				WHERE a.interviewer = '$interviewerid' and a.interviewid = '$interviewid'";

		$asmt = $this->M_data->select_sql($sql);
		// var_dump($asmt);

		$asmttemp = isset($asmt[0]['asmttemp'])?$asmt[0]['asmttemp']:'';
		$asmtid = isset($asmt[0]['asmtid'])?$asmt[0]['asmtid']:'';
		if ($asmttemp!=''&&$asmtid!='') {
			$section = $this->get_asmt_question($asmtid,$asmttemp);
			$this->data2['section'] = !empty($section)?$section:[];
			$this->data2['asmtid'] = $asmt[0]['asmtid'];
			$this->save_genquest($asmt[0]['asmtid'],$section);
			// var_dump($this->data2['section']);	
		}

		$this->_data['temp'] = $this->load->view('admin/multiplechoice/interview_question',$this->data2,true);
		$this->load->view('admin/home/master-iframe',$this->_data);	
	}

	public function makingAppointment($interviewid)
	{
		$join[1] = array('table'=> 'document','match' =>'tb.operatorid = document.referencekey');
	    $o_data['operator'] = $this->Data_model->select_row_option('tb.operatorname,tb.operatorid,tb.email, document.filename',array('tb.hidden' => 1),'','operator tb',$join,'','','','');
        $o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0'),'');
        $o_data['asmt_pv'] = $data['asmt_pv']     = $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');

		$sql = "SELECT a.*, 
					b.name, 
					b.email, 
					b.imagelink,
					c.position, 
					d.status as status_asmt, 
					e.optionid, e.ansdatetime, 
					e.ansdatetime2 
				FROM interview a  
				LEFT JOIN candidate b ON a.candidateid = b.candidateid  
				LEFT JOIN reccampaign c ON a.campaignid = c.campaignid 
				LEFT JOIN assessment d ON a.inv_asmtid = d.asmtid 
				LEFT JOIN asmtanswer e ON a.inv_asmtid = e.asmtid 
				WHERE a.interviewid = $interviewid";

		$result = $this->Campaign_model->select_sql($sql);
		$data['interview'] = $result[0];

		$join1[0] = array('table' => 'operator b','match' =>'a.interviewer = b.operatorid');
    	$join1[1] = array('table' => 'document c','match' =>'a.interviewer = c.referencekey');
        $join1[2] = array('table' => 'assessment d','match' =>'a.inv_asmtid = d.asmtid');
        $join1[3] = array('table' => 'asmtanswer e','match' =>'a.inv_asmtid = e.asmtid');

    	$data['interviewer'] = $this->Data_model->select_row_option('a.interviewerid,a.inv_asmtid,a.scr_asmtid, b.operatorname,b.email, c.filename, d.status as status_asmt, e.optionid, e.ansdatetime, e.ansdatetime2 ',array('a.interviewid'=>$interviewid),'','interviewer a',$join1,'','','','');

    	for ($i=0; $i < count($data['interviewer']); $i++) { 
    		$interviewerid = $data['interviewer'][$i]['interviewerid'];
    		// echo $interviewerid;
    		//for interview question
			$sql = "SELECT a.scr_asmtid as asmtid, b.asmttemp, c.filename, d.operatorname
					FROM interviewer a
					LEFT OUTER JOIN assessment b ON a.scr_asmtid = b.asmtid
					LEFT OUTER JOIN document c ON a.interviewer = c.referencekey AND c.tablename='operator'
					LEFT OUTER JOIN operator d ON a.interviewer = d.operatorid
					WHERE a.interviewerid = '$interviewerid'";

			$asmt = $this->M_data->select_sql($sql);
			$data['interviewer_current'][$i]['current'] = $asmt;

			$asmttemp = isset($asmt[0]['asmttemp'])?$asmt[0]['asmttemp']:'';
			$asmtid = isset($asmt[0]['asmtid'])?$asmt[0]['asmtid']:'';
			if ($asmttemp!=''&&$asmtid!='') {
				$section = $this->get_asmt_question($asmtid,$asmttemp);
				$data['interviewer_current'][$i]['section'] = !empty($section)?$section:[];
				$data['interviewer_current'][$i]['asmtid'] = $asmt[0]['asmtid'];
				$this->save_genquest($asmt[0]['asmtid'],$section);
				// var_dump($this->data2['section']);	
			}
    	}
    	$data['operator'] = $o_data['operator'];
    	$data['interviewid'] = $interviewid;
		$data['interviewerid'] = $interviewerid;

    	$this->_data['modal_campaign'] 	= $this->load->view('admin/campaign/modal_campaign',$o_data,true);
		$this->_data['temp'] = $this->load->view('admin/multiplechoice/makingAppointment',$data,true);
		$this->load->view('admin/home/master-iframe',$this->_data);	
	}

	private function get_asmt_question($asmtid,$asmttemp){
		$sql = "SELECT 
				a.questionid,
				a.asmttemp,
				a.section,
				a.sectionname,
				a.questiontype,
				a.question,
				a.questioncontent,
				a.comment,
				a.requirement,
				a.othersallow,
				a.addanswerallow,
				a.scorefrom,
				a.scoreto,
				a.used,
				f.createddate,
				b.operatorname as createdby_name_q, 
				c.operatorname as updatedby_name_q,
				d.url as image,
				d.recordid as imageid,
				e.ansnumeric,
				e.anstext
			FROM asmtquestion a
			LEFT JOIN assessment f ON a.asmttemp = f.asmttemp and f.asmtid = '$asmtid'
			LEFT JOIN operator b ON a.createdby = b.operatorid
			LEFT JOIN operator c ON a.updatedby = c.operatorid
			LEFT JOIN document d ON a.imageid = d.recordid 
			LEFT OUTER JOIN asmtanswer e ON a.questionid = e.questionid and f.asmtid = e.asmtid
			WHERE a.asmttemp = '$asmttemp' 
			ORDER BY a.section";
		
		$ques = $this->M_data->select_sql($sql);
		// echo "<pre>";
		// 	print_r($ques);
		// 	echo "</pre>";
		// 	exit;
		$section = [];

		if(!empty($ques)){
			$_sec = $ques[0]['section'];
			$count = 0;
			foreach ($ques as $key => $value) {
				if ($_sec!=$value['section']){$_sec = $value['section']; $count = 0;}
				$section[$_sec]['question'][$count] = $value;
				$section[$_sec]['sectionname'] = $value['sectionname'];
				$questionid = $value['questionid'];
				$sql = "SELECT
					a.questionid,
					a.optionid,
					a.answercontent,
					a.score,
					a.isright,
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name,
					d.url as image,
					d.recordid as imageid
				FROM asmtoption a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				LEFT JOIN document d ON a.imageid = d.recordid
				WHERE a.questionid = '$questionid' 
				ORDER BY a.lastupdate";
				$section[$_sec]['question'][$count]['answer'] = $this->M_data->select_sql($sql);
				$count++;
			}
		}

		return $section;
	}

	public function generated_quest($asmtid,$asmttemp){
		$sql = "SELECT
				a.questionid,
				a.asmttemp,
				a.section,
				a.sectionname,
				a.questiontype,
				a.question,
				a.questioncontent,
				a.comment,
				a.requirement,
				a.othersallow,
				a.addanswerallow,
				a.scorefrom,
				a.scoreto,
				a.used,
				f.createddate,
				b.operatorname as createdby_name_q, 
				c.operatorname as updatedby_name_q,
				d.url as image,
				d.recordid as imageid,
				e.optionid,
				e.ansnumeric,
				e.anstext
			FROM asmtquestion a
			JOIN genquest f ON a.questionid = f.questionid AND f.asmtid='$asmtid'
			LEFT JOIN operator b ON a.createdby = b.operatorid
			LEFT JOIN operator c ON a.updatedby = c.operatorid
			LEFT JOIN document d ON a.imageid = d.recordid 
			LEFT OUTER JOIN asmtanswer e ON a.questionid = e.questionid and f.asmtid = e.asmtid
			WHERE a.asmttemp = '$asmttemp' 
			ORDER BY f.genid";
		
		$ques = $this->M_data->select_sql($sql);
		// var_dump($ques);
		$section = [];

		if(!empty($ques)){
			$_sec = $ques[0]['section'];
			$count = 0;
			foreach ($ques as $key => $value) {
				if ($_sec!=$value['section']){$_sec = $value['section']; $count = 0;}
				$section[$_sec]['question'][$count] = $value;
				$section[$_sec]['sectionname'] = $value['sectionname'];
				$questionid = $value['questionid'];
				$sql = "SELECT
					a.questionid,
					a.optionid,
					a.answercontent,
					a.score,
					a.isright,
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name,
					d.url as image,
					d.recordid as imageid
				FROM asmtoption a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				LEFT JOIN document d ON a.imageid = d.recordid
				WHERE a.questionid = '$questionid' 
				ORDER BY a.lastupdate";
				$section[$_sec]['question'][$count]['answer'] = $this->M_data->select_sql($sql);
				$count++;
			}
		}

		return $section;
	}
	
	private function save_genquest($asmtid,$section){
		if (!$asmtid) {
			return false;
		}
		$rs = [];
		$data['asmtid']   = $asmtid;
		foreach ($section as $k => $v) {
			$ques = isset($v['question'])?$v['question']:[];
			if(!empty($ques))foreach ($ques as $key => $value) {
				$data['questionid'] = $value['questionid'];
				// $data['updatedby']  = $this->sess['operatorid'];
				$rs[] = array('id'=>$data['questionid'],'result'=>$this->M_data->merge_data(array('asmtid'=>$asmtid,'questionid'=>$data['questionid']),$data,'genquest'));
				continue;	
			}
		}
		return $rs;
	}

	public function save_answer(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['asmtid'])&&!$post['asmtid']) {
			$resp['message'] = "Mã phiếu không đúng.";
			echo json_encode($resp);
			exit;
		}

		if (!isset($post['question'])&&empty($post['question'])) {
			$resp['message'] = "Không tìm thấy dữ liệu yêu cầu.";
			echo json_encode($resp);
			exit;
		}

		$push 			= [];
		$push['asmtid'] = $post['asmtid'];
		$question       = $post['question'];

		foreach ($question as $key => $value) {
			$push['questionid'] = $key;
			$push['optionid']   = isset($value['optionid'])?$value['optionid']:'';
			$push['ansnumeric'] = isset($value['ansnumeric'])?$value['ansnumeric']:'';
			$push['anstext']    = isset($value['anstext'])?$value['anstext']:'';
			$push['updatedby']  = $this->sess['operatorid'];

			foreach ($push as $key => $value) {
				if ($value=='') {
					unset($push[$key]);
				}
			}
			$resp['data'][] = $this->M_data->merge_data(array('asmtid'=>$post['asmtid'],'questionid'=>$push['questionid']),$push,'asmtanswer');
		}

		if ($post['asmtid']!=''&&!isset($post['interviewid'])) {
			$this->M_data->update('assessment',array('asmtid'=>$post['asmtid']),array('status'=>'C'));
		}

		if (isset($post['interviewid'])&&$post['interviewid']!='') {
			$this->M_data->update('interview',array('interviewid'=>$post['interviewid']),array('status'=>'C'));
		}

		$resp['success'] = true;
		$resp['message'] = "success";

		echo json_encode($resp);
	}
	public function searchQuestion()
	{
		$name 					= $this->input->post('name');
		$asmttemp 				= $this->input->post('asmttemp');
		$sql = "SELECT 
				a.questionid,
				a.asmttemp,
				a.section,
				a.sectionname,
				a.questiontype,
				a.question,
				a.questioncontent,
				a.comment,
				a.requirement,
				a.othersallow,
				a.addanswerallow,
				a.scorefrom,
				a.scoreto,
				a.used,
				b.operatorname as createdby_name_q, 
				c.operatorname as updatedby_name_q,
				d.url as image,
				d.recordid as imageid
			FROM asmtquestion a
			LEFT JOIN operator b ON a.createdby = b.operatorid
			LEFT JOIN operator c ON a.updatedby = c.operatorid
			LEFT JOIN document d ON a.imageid = d.recordid 
			WHERE a.asmttemp = '$asmttemp' AND lower(a.questioncontent) LIKE lower(N'%$name%')
			ORDER BY a.section";
		
		$ques = $this->M_data->select_sql($sql);
		$section = [];

		if(!empty($ques)){
			$_sec     = $ques[0]['section'];
			$count = 0;
			foreach ($ques as $key => $value) {
				if ($_sec!=$value['section']){
					$_sec = $value['section']; 
					$count = 0;
				}
				$section[$_sec]['sectionname'] = $value['sectionname'];
				$section[$_sec]['question'][$count] = $value;
				$questionid = $value['questionid'];
				$sql = "SELECT
					a.questionid,
					a.optionid,
					a.answercontent,
					a.score,
					a.isright,
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name,
					d.url as image,
					d.recordid as imageid
				FROM asmtoption a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				LEFT JOIN document d ON a.imageid = d.recordid
				WHERE a.questionid = '$questionid' 
				ORDER BY a.lastupdate";
				$section[$_sec]['question'][$count]['answer'] = $this->M_data->select_sql($sql);
				$count++;
			}
		}
		echo json_encode($section);
	}
	
	public function searchNameAssessment()
	{
		$name = $this->input->post('name');
		$sql = "SELECT 
					a.*, 
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name 
				FROM $this->table a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				WHERE lower(a.asmtname) LIKE lower(N'%$name%')
				ORDER BY a.lastupdate";

		$result = $this->M_data->select_sql($sql);
		echo json_encode($result);
	}
}