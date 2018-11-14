<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','my_helper','file'));
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','admin/Mail_model'));
		$this->load->library('session');
		$this->load->library('upload');


		$ac_data['tuyendung'] 	= 'active';
		$ac_data['campaign'] 		= 'active';

		$o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename,datasource,presubject,prebody,preattach",'mailprofile',array('profiletype' => '0'),'');
		$o_data['operator'] = $this->Campaign_model->select("operatorid,operatorname,email",'operator',array('hidden' => 1),'');
		$this->_data['modal_campaign'] 	= $this->load->view('admin/campaign/modal_campaign',$o_data,true);
		$this->_data['header'] 	= $this->load->view('admin/home/header',null,true);
	    $this->_data['menu']   	= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->_data['footer'] 	= $this->load->view('admin/home/footer',null,true);
	}

	function loadNotifi()
	{
		$sql = "SELECT a.*, b.operatorname, c.filename,d.name, e.position FROM profilehistory a LEFT JOIN operator b ON a.createdby = b.operatorid LEFT JOIN document c ON a.createdby = c.referencekey LEFT JOIN candidate d ON a.candidateid = d.candidateid LEFT JOIN reccampaign e ON a.campaignid = e.campaignid  where a.campaignid in (SELECT campaignid FROM reccampaign  WHERE managecampaign LIKE  '%".$this->session->userdata('user_admin')['operatorid']."%' ) ORDER BY createddate desc";
		$h_data['history'] = $this->Campaign_model->select_sql($sql);
		for ($j = 0; $j < count($h_data['history']); $j++) {
			$h_data['history'][$j]['date'] = date_format(date_create($h_data['history'][$j]['createddate']),"d/m/Y h:i:s");
		}
		$h_data['count'] = count($h_data['history']);
		echo json_encode($h_data);
	}
	public function convert_date($date='')
    {
        $timestamp = strtotime($date);
        if ($timestamp === FALSE) {
          $timestamp = strtotime(str_replace('/', '-', $date));
        }
        return date('Y-m-d H:i:s',$timestamp);
    }

	public function index(){
		$this->load->view('admin/master',$this->_data);
	}
	
	public function total_round($campaignid='',$roundid='',$type ='')
	{
		$sql = "SELECT COUNT(tt.candidateid) as count FROM profilehistory tt INNER JOIN (SELECT candidateid, MAX(createddate) AS MaxDateTime FROM profilehistory WHERE campaignid = '$campaignid' AND actiontype != 'Recruite'  GROUP BY candidateid) groupedtt ON tt.candidateid = groupedtt.candidateid AND tt.createddate = groupedtt.MaxDateTime WHERE tt.roundid = '$roundid' AND tt.actiontype = '$type'  ";
			$result = $this->Campaign_model->select_sql($sql);
			return $result[0]['count'];
	}


	public function main(){
		$match = array('1' => 1, );
		$data['campaigns'] 		=	$this->Data_model->selectTable('reccampaign',$match);
		for ($i=0; $i < count($data['campaigns']); $i++) { 
			$match = array('campaignid' => $data['campaigns'][$i]['campaignid'] );
			$data['campaigns'][$i]['round'] =	$this->Campaign_model->select("roundid,sorting,roundname,roundtype",'recflow',$match,'');
			$data['campaigns'][$i]['round'][0]['count_round'] = $this->Candidate_model->count_row('candidate',array('1'=>1));
			for ($j=1; $j < count($data['campaigns'][$i]['round']); $j++) { 
				$data['campaigns'][$i]['round'][$j]['count_round'] = $this->total_round($data['campaigns'][$i]['campaignid'],$data['campaigns'][$i]['round'][$j]['roundid'],'Transfer');
			}

			$data['campaigns'][$i]['manager'] = array();
			$mana = trim($data['campaigns'][$i]['managecampaign'],',');
			$mana = explode(',', $mana);
			$join[0]  = array('table' => 'document', 'match' => 'operator.operatorid = document.referencekey' );
			foreach ($mana as $key =>$value) {
				$match = array('operatorid' => $value );
				$temp = $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
				if (isset($temp[0])) {
					$data['campaigns'][$i]['manager'][$key] =$temp[0];
				}else{
					$data['campaigns'][$i]['manager'][$key] = '';
				}
			}
		}
		
		$this->_data['temp'] 	= $this->load->view('admin/campaign/main',$data,true);
		$this->load->view('admin/home/master',$this->_data);
	}
	
	public function round_1_1($roundid='',$campaignid=''){
		$match = array('campaignid' => $campaignid, );
		$data['campaigns'] 		=	$this->Data_model->selectTable('reccampaign',$match);
		if ($roundid != 0) {
			$data['src'] = base_url().'admin/campaign/list_profile/'.$campaignid.'/'.$roundid.'/';

			$match = array('campaignid' => $campaignid, );
			$c_data['round_main'] 		=	$this->Data_model->selectTable('recflow',$match);
			$c_data['campaignid']		= $campaignid;
			$c_data['bien'] 			= $roundid;

			$c_data['round_main'][0]['count_round'] = $this->Candidate_model->count_row('candidate',array('1'=>1));
			for ($j=1; $j < count($c_data['round_main']); $j++) { 
				$c_data['round_main'][$j]['count_round'] = $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Transfer');
			}

			$mana = trim($c_data['round_main'][0]['manageround'],',');
			$mana = explode(',', $mana);
			if ($mana[0] == '') {
				$c_data['manager'] = '';
			}else{
				$join[0]  = array('table' => 'document', 'match' => 'operator.operatorid = document.referencekey' );
				foreach ($mana as $key =>$value) {
					$match = array('operatorid' => $value );
					$c_data['manager'][$key] =($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join))[0];
				}
			}
			
			$c_data['duedate'] = $c_data['round_main'][0]['duedate'];
			$data['main_round']     = $this->load->view('admin/campaign/main_round',$c_data,true); 
		}else{
			$data['src'] = '';
			$data['main_round'] = '';
		}
		
		$this->_data['temp'] 	= $this->load->view('admin/campaign/round_1_1',$data,true);

		$this->load->view('admin/home/master',$this->_data);
	}
	public function round_1_2($roundid='',$campaignid=''){
		
		$type1 = "Transfer";
		$type2 = "Discard";

		$data['src_1'] = base_url().'admin/campaign/profile/0/0/'.$campaignid.'/'.$roundid.'/'.$type1;
		$data['src_2'] = base_url().'admin/campaign/profile/0/0/'.$campaignid.'/'.$roundid.'/'.$type2;

		$match = array('campaignid' => $campaignid, );
		$data['campaigns'] 		=	$this->Data_model->selectTable('reccampaign',$match);

		$c_data['bien'] 			= $roundid;
		$c_data['campaignid']		= $campaignid;
		$match = array('campaignid' => $campaignid, );
		$c_data['round_main'] 		=	$this->Data_model->selectTable('recflow',$match);
		$c_data['round_main'][0]['count_round'] = $this->Candidate_model->count_row('candidate',array('1'=>1));
		for ($j=1; $j < count($c_data['round_main']); $j++) { 
			$c_data['round_main'][$j]['count_round'] = $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Transfer');

			if ($c_data['round_main'][$j]['roundid'] == $roundid) {
				$mana = trim($c_data['round_main'][$j]['manageround'],',');
				$mana = explode(',', $mana);
				if ($mana[0] == '') {
					$c_data['manager'] = '';
				}else{
					$join[0]  = array('table' => 'document', 'match' => 'operator.operatorid = document.referencekey' );
					foreach ($mana as $key =>$value) {
						$match = array('operatorid' => $value );
						$c_data['manager'][$key] =($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join))[0];
					}
				}
				$c_data['duedate'] = $c_data['round_main'][$j]['duedate'];
				$data['count_tranfer'] = $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Transfer');
				$data['count_discard'] = $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Discard');
			}
		}

		$data['main_round']     = $this->load->view('admin/campaign/main_round',$c_data,true); 
		$this->_data['temp'] 	= $this->load->view('admin/campaign/round_1_2',$data,true);

		$this->load->view('admin/home/master',$this->_data);
	}
	

	public function list_profile($campaignid='',$roundid='',$type=''){

		$this->data1['campaignid'] = $this->data2['campaignid']	= $campaignid;
		$this->data1['roundid']		= $roundid;
		$this->data1['type']		= $type;

		$join = '';
		$where = 'AND candidate.hidden = 1';
		$this->session->set_userdata('filter', $where);
		$this->data1['candidate'] = $this->Candidate_model->list_filter($join,$where); 
		// $this->data1['candidate'] = $this->Candidate_model->selectAllCan();

		$this->data2['total_candidate'] = $this->Candidate_model->count_row('candidate',array('1'=>1));
        $this->data1['total_candidate'] = $this->data2['total_candidate'];
        $this->data2['profilesrc'] = $this->Campaign_model->select('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $this->data2['hocvan'] = $this->Campaign_model->select("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $this->data2['ngoaingu'] = $this->Campaign_model->select("language",'canlanguage',array('hidden' => 1),'language');
        $this->data2['tinhoc'] = $this->Campaign_model->select("software",'cansoftware',array('hidden' => 1),'software');
        $this->data2['filter'] = $this->Campaign_model->selectall('filterprofile');
		$this->data2['city'] = $this->Campaign_model->selectall('city');

		$this->data1['nav'] = $this->load->view('admin/campaign/nav',$this->data2,true);
		$iframe_data['temp'] 	= $this->load->view('admin/campaign/search_candidate',$this->data1,true);
		$this->load->view('admin/home/master-iframe',$iframe_data);
	}

	public function profile($id ='',$hs = '0',$campaignid='',$roundid='',$type='')
	{	
		if($hs == '0'){
			$sql = "SELECT tt.candidateid FROM profilehistory tt INNER JOIN (SELECT candidateid, MAX(createddate) AS MaxDateTime FROM profilehistory WHERE campaignid = '$campaignid' AND actiontype != 'Recruite'  GROUP BY candidateid) groupedtt ON tt.candidateid = groupedtt.candidateid AND tt.createddate = groupedtt.MaxDateTime WHERE tt.roundid = '$roundid' AND tt.actiontype = '$type' ";
			$candidate = $this->Campaign_model->select_sql($sql);
			// var_dump($candidate);exit;
			
			$join = '';
			if (!empty($candidate)) {
				$id = $candidate[0]['candidateid'];
				$where = 'AND candidate.candidateid IN ( ';
				for ($i=0; $i < count($candidate); $i++) { 
					if ($i == count($candidate)-1) {
						$where .= $candidate[$i]['candidateid']; 
					}else{
						$where .= $candidate[$i]['candidateid']. ','; 
					}
				}
				$where .= ')';
				$this->data2['candidate'] = $this->Candidate_model->list_filter($join,$where); 
			}else{
				$this->data2['candidate'] = '';
				$id = '-1';
			}
			
		}else{
			$where = $this->session->userdata('filter');
			$join = '';
	        $join = $this->session->userdata('join');
	        $this->data2['candidate'] = $this->Candidate_model->list_filter($join,$where); 
		}
		$this->data2['campaignid'] 	= $campaignid;
		$this->data2['roundid'] 	= $roundid;
		$this->data1['campaignid'] 	= $campaignid;
		$this->data1['roundid'] 	= $roundid;
        $this->data2['id_active'] = $id;
        
        $match = array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data2['roundtype'] 		=	($this->Campaign_model->select("roundtype",'recflow',$match,''))[0]['roundtype'];
		
		$this->data1['nav'] = $this->load->view('admin/campaign/nav_profile',$this->data2,true);
		$this->data1['id'] = $id;
		$iframe_data['temp'] = $this->load->view('admin/campaign/profile_candidate',$this->data1,true);

		$this->load->view('admin/home/master-iframe',$iframe_data);
	}
	public function profile_pv($id='')
	{
		$where = $this->session->userdata('filter');
		
		$this->data1['candidate'] =  $this->Campaign_model->select_row_option('*',$where,'','candidate','','','','','');
		$this->data1['nav'] = $this->load->view('admin/campaign/nav_profile_pv',$this->data1,true);
		$this->data1['id'] = $id;
		$iframe_data['temp'] = $this->load->view('admin/campaign/profile_candidate',$this->data1,true);

		$this->load->view('admin/home/master-iframe',$iframe_data);
	}
	public function hosochitiet($id = '',$campaignid='',$roundid='')
	{
		$this->data2['campaignid'] 	= $campaignid;
		$this->data2['roundid'] 	= $roundid;
		$match = array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data2['campaignname'] 	=	($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid,),''))[0]['position'];
		$this->data2['roundtype'] 		=	($this->Campaign_model->select("roundtype",'recflow',$match,''))[0]['roundtype'];
		if ($id != '-1') {
			$this->data2['id'] = $id;
			$join[0] = array('table'=> 'operator','match' =>'tb.createdby = operator.operatorid');
	        $join[1] = array('table'=> 'document','match' =>'tb.createdby = document.referencekey');
	        $orderby = array('colname'=>'tb.createddate','typesort'=>'desc');
	        $history_cmt = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id),'','cancomment tb',$join,'',$orderby,'','');

	        $type = array('Talent','Nottalent','Trust','Block');
	        $history_profile1 = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id, 'tb.campaignid' => 0),'','profilehistory tb',$join,'',$orderby,'','');
	        $history_profile2 = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','profilehistory tb',$join,'',$orderby,'','');
	        $join[2] = array('table'=> 'operator c','match' =>'tb.updatedby = c.operatorid');
	        $history_profile3 = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','assessment tb',$join,'',$orderby,'','');
	        $history_profile4 = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','interview tb',$join,'',$orderby,'','');
	        for ($i=0; $i < count($history_profile4); $i++) { 
	        	$join1[0] = array('table'=> 'operator','match' =>'tb.interviewer = operator.operatorid');
	        	$join1[1] = array('table'=> 'document','match' =>'tb.interviewer = document.referencekey');
	        	$history_profile4[$i]['interviewer'] = $this->Data_model->select_row_option('tb.interviewer,tb.status, operator.operatorname, document.filename',array('tb.interviewid'=>$history_profile4[$i]['interviewid']),'','interviewer tb',$join1,'',$orderby,'','');
	        }

	        $this->data2['history'] = array_merge($history_cmt, $history_profile1, $history_profile2,$history_profile3,$history_profile4);

	        function cmp($a, $b) {
	            if ($a['createddate'] == $b['createddate']) {
	                return 0;
	            }
	            return ($a['createddate'] < $b['createddate']) ? 1 : -1;
	        }
	       //  uasort($this->data2['history'], 'cmp');
	       //  echo "<pre>";
        // print_r($this->data2['history']);
        // echo "</pre>";exit;

	        $this->data2['city'] = $this->Campaign_model->selectall('city');
	        $this->data2['document'] = $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','');
	        $this->data2['comment'] = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
			$this->data2['address'] = $this->Candidate_model->selectTableByIds('canaddress',$id);
			$this->data2['candidate'] = $this->Candidate_model->selectTableById('candidate',$id);
			$this->data2['family'] = $this->Candidate_model->selectTableByIds('cansocial',$id);
			$this->data2['experience'] = $this->Candidate_model->selectTableByIds('canexperience',$id);
			$this->data2['vt'] = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id,'dateto');
			$this->data2['reference'] = $this->Candidate_model->selectTableByIds('canreference',$id);
			$this->data2['knowledge'] = $this->Candidate_model->selectTableByIds('canknowledge',$id);
			$this->data2['language'] = $this->Candidate_model->selectTableByIds('canlanguage',$id);
			$this->data2['software'] = $this->Candidate_model->selectTableByIds('cansoftware',$id);
			$sql = "SELECT count(recordid) as count FROM profilehistory WHERE candidateid = '$id' AND actiontype = 'Recruite'";
			$this->data2['recruite'] = $this->Campaign_model->select_sql($sql)[0]['count'];
		}else{
			$this->data2['id'] = '';
		}
		
		$data['temp'] = $this->load->view('admin/campaign/detail_profile',$this->data2,true);
		$this->load->view('admin/home/master-iframe',$data);
	}


	public function new_campaign()
	{
		$this->_data['script'] = $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 	= $this->load->view('admin/campaign/new_campaign_1',null,true);
		$this->load->view('admin/home/master',$this->_data);
	}
	public function new_campaign_2()
	{
		$frm = $this->input->post();
		// $frm['expdate'] 	= $this->convert_date($frm['expdate']);
		$frm['expdate'] = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $frm['expdate'])));
		$frm['managecampaign'] 	= $this->session->userdata('user_admin')['operatorid'];
		$frm['createdby'] 	= $this->session->userdata('user_admin')['operatorid'];
		$frm['updatedby'] 	= $this->session->userdata('user_admin')['operatorid'];
		$m_data['id'] = $this->Campaign_model->insert('reccampaign', $frm);
		// $m_data['id'] = '3';
		$m_data['hocvan'] = $this->Campaign_model->select("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $m_data['ngoaingu'] = $this->Campaign_model->select("language",'canlanguage',array('hidden' => 1),'language');
        $m_data['tinhoc'] = $this->Campaign_model->select("software",'cansoftware',array('hidden' => 1),'software');
        $m_data['profilesrc'] = $this->Campaign_model->select('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');

		$this->_data['script'] = $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 	= $this->load->view('admin/campaign/new_campaign_2',$m_data,true);
		$this->load->view('admin/home/master',$this->_data);
	}

	public function new_campaign_3($id)
	{
		$m_data['campaignid'] = $id;
		$manager = $this->Campaign_model->select("managecampaign",'reccampaign',array('campaignid' => $id),'');
		$m_data['operator'] = $this->Campaign_model->select("operatorid,operatorname",'operator',array('hidden' => 1),'');
		if($manager[0]['managecampaign'] != ''){
			$m_data['manager'] = explode(',',$manager[0]['managecampaign']);
		}else{
			$m_data['manager'] = '';
		}
		$this->_data['script'] = $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 	= $this->load->view('admin/campaign/new_campaign_3',$m_data,true);
		$this->load->view('admin/home/master',$this->_data);
	}

	public function saveRound()
	{
		$frm = $this->input->post();
		$data['campaignid'] = $frm['campaignid'];
		unset($frm['campaignid']);
		
		foreach ($frm as $row) {
			$data['sorting'] = $row[0];
			$data['roundname'] = $row[1];
			$data['roundtype'] = $row[2];
			$data['duedate'] = $this->convert_date($row[3]);
			$data['manageround'] = $row[4];
			// $data['sorting'] = $row[0];
			// $data['sorting'] = $row[0];
			// var_dump($row[0]);
			// exit;
			$this->Data_model->insert('recflow',$data);
		}
		echo json_encode(1);
	}
	public function new_campaign_4($campaignid)
	{
		$data['campaignid'] = $campaignid;
		$match = array('campaignid' => $campaignid, );
		$data['campaigns'] 		=	$this->Data_model->selectTable('reccampaign',$match);
		$this->_data['script'] = $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 	= $this->load->view('admin/campaign/new_campaign_4',$data,true);
		$this->load->view('admin/home/master',$this->_data);
	}
	public function saveRound4()
	{
		$frm = $this->input->post();
		$frm['expdate'] = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $frm['expdate'])));
		
		$this->Data_model->insert('recartical',$frm);
		redirect(base_url('admin/campaign/main'));
	}
	public function selectCity()
    {
        $id_city = $this->input->post('id_city');
        $_jsoncity = $this->total_model->selectTableByIds('district',array('id_city'=>$id_city));
        echo json_encode($_jsoncity);
    }
     public function selectDistrict()
    {
        $id_district = $this->input->post('id_district');
        $city = $this->total_model->selectTableByIds('ward',array('id_district'=>$id_district));
        echo json_encode($city);
    }

    function loadfilter()
    {
        $campaignid = $this->input->post('campaignid');
        $match = array( 'campaignid' => $campaignid);
        $filter = $this->Campaign_model->select("filterid",'filterprofile',$match,'');
        $match1 = array( 'filterid' => $filter[0]['filterid']);
        $data = $this->Data_model->selectTable('filterdetail',$match1);
        echo json_encode($data);
    }

    public function filter_candidate()
    {
    	$frm = $this->input->post();
    	$where = array();
    	$join = array();
    	if($frm['gender'] != '')
    	{
            $where[] = "candidate.gender = '".$frm['gender']."'";
    	}
        if($frm['maritalstatus'] != '')
        {
            $where[] = "candidate.maritalstatus = '".$frm['maritalstatus']."'";
        }
    	if($frm['placeofbirth'] != '')
    	{
            $where[] = "candidate.placeofbirth = '".$frm['placeofbirth']."'";
    	}
    	if(($frm['agefrom'] != '') || ($frm['ageto'] != ''))
    	{
    		if($frm['agefrom'] != ''){ 
    			$tru = '-'.$frm['agefrom'].' years';
    			$ngay = date('Y-m-d', strtotime($tru));
    		    $where[] = "candidate.dateofbirth <= '".$ngay."'";  
    		}
    		if($frm['ageto'] != ''){ 
    			$tru = '-'.$frm['ageto'].' years';
    			$ngay = date('Y-m-d', strtotime($tru));
                $where[] = "candidate.dateofbirth >= '".$ngay."'";  
    		}

    	}
    	if(($frm['heightfrom'] != '') || ($frm['heightto'] != ''))
    	{
    		if($frm['heightfrom'] != ''){ 
                $where[] = "candidate.height >= '".$frm['heightfrom']."'";
    		}
    		if($frm['heightto'] != ''){ 
                $where[] = "candidate.height <= '".$frm['heightto']."'";
    		}

    	}
    	if(($frm['weightfrom'] != '') || ($frm['weightto'] != ''))
    	{
    		if($frm['weightfrom'] != ''){
            $where[] = "candidate.weight >= '".$frm['weightfrom']."'"; 
    		}
    		if($frm['weightto'] != ''){ 
                $where[] = "candidate.weight <= '".$frm['weightto']."'"; 
    		}
    	}
    	if($frm['ethnic'] != '')
    	{
            $where[] = "candidate.ethnic = '".$frm['ethnic']."'"; 
    	}
    	if($frm['nationality'] != '')
    	{
            $where[] = "candidate.nationality = '".$frm['nationality']."'"; 
    	}
        if(($frm['cityori'] != '')||($frm['citycurr'] != ''))
        {
            $join[] = 'LEFT JOIN canaddress ON candidate.candidateid = canaddress.candidateid';
        }
    	if($frm['cityori'] != '')
    	{
            $where[] = "(canaddress.city = '".$frm['cityori']."' AND canaddress.addtype = 'PREMANENT')";
    	}
    	if($frm['citycurr'] != '')
    	{
            $where[] = "(canaddress.city = '".$frm['citycurr']."' AND canaddress.addtype = 'CONTACT')";
    	}
    	if(($frm['district'] != '') && ($frm['citycurr'] != ''))
    	{
            $where[] = "(canaddress.district = '".$frm['district']."' AND canaddress.addtype = 'CONTACT')";
    	}
    	if(($frm['currbenefitfrom'] != '') || ($frm['currbenefitto'] != ''))
    	{
    		if($frm['currbenefitfrom'] != ''){ 
                $where[] = "candidate.currentbenefit >='".$this->toInt($frm['currbenefitfrom'])."'";
    		}
    		if($frm['currbenefitto'] != ''){ 
                $where[] = "candidate.currentbenefit <='".$this->toInt($frm['currbenefitto'])."'";
    		}
    	}
    	if(($frm['desbenefitfrom'] != '') || ($frm['desbenefitto'] != ''))
    	{
    		if($frm['desbenefitfrom'] != ''){ 
                $where[] = "candidate.desirebenefit >='".$this->toInt($frm['desbenefitfrom'])."'";
    		}
    		if($frm['desbenefitto'] != ''){ 
                $where[] = "candidate.desirebenefit <='".$this->toInt($frm['desbenefitto'])."'";
    		}
    	}
        if(($frm['experfrom'] != '') || ($frm['experto'] != ''))
        {
            if($frm['experfrom'] == 'C')
        	    $where[] = 'candidate.candidateid not in (select distinct canexperience.candidateid  from canexperience where canexperience.hidden = 1)';
            else
            {
                if($frm['experfrom'] != '' && $frm['experto'] != '')
                {
                     $dk = 'DATEDIFF (year, min(canexperience.datefrom), GETDATE()) >= '.$frm['experfrom'].' AND  DATEDIFF (year, min(canexperience.datefrom), GETDATE()) <= '.$frm['experto'];
                }
                else if($frm['experfrom'] != '')
                {
                     $dk = 'DATEDIFF (year, min(canexperience.datefrom), GETDATE()) >= '.$frm['experfrom'];
                }
                else $dk = 'DATEDIFF (year, min(canexperience.datefrom), GETDATE()) <= '.$frm['experto'];
                $where[] = 'candidate.candidateid in (select canexperience.candidateid from canexperience GROUP BY canexperience.candidateid HAVING '.$dk.')';
            }
        }
        if($frm['knowledge'] != '')
        {
            if($frm['knowledge'] == '1')
            {
                $where[] = 'candidate.candidateid in (select distinct canknowledge.candidateid from canknowledge where canknowledge.hidden = 1)';
            } else {
                $arr_hv = explode('/', $frm['knowledge']);
                $st_hv = "(";
                for ($i = 0; $i < count($arr_hv)-1; $i++) {
                    $st_hv .= " canknowledge.certificate = N'".$arr_hv[$i]."'";
                    if($i != count($arr_hv) -2)
                    {
                        $st_hv .= " OR";
                    }  
                }
                $where[] = $st_hv.")";
                $join[] = 'LEFT JOIN canknowledge ON candidate.candidateid = canknowledge.candidateid';
            }
        }
        if($frm['language'] != '')
        {
            if($frm['language'] == '1')
            {
                $where[] = 'candidate.candidateid in (select distinct canlanguage.candidateid from canlanguage where canlanguage.hidden = 1)';
            } else {
                $arr_nn = explode('/', $frm['language']);
                $st_nn = "(";
                for ($i = 0; $i < count($arr_nn)-1; $i++) {
                    $st_nn .= " canlanguage.language = N'".$arr_nn[$i]."'";
                    if($i != count($arr_nn) -2)
                    {
                        $st_nn .= " OR";
                    }  
                }
                $where[] = $st_nn.")";
                $join[] = 'LEFT JOIN canlanguage ON candidate.candidateid = canlanguage.candidateid';
            }
        }

        if($frm['software'] != '')
        {
            if($frm['software'] == '1')
            {
                $where[] = 'candidate.candidateid in (select distinct cansoftware.candidateid from cansoftware where cansoftware.hidden = 1)';
            } else {

                $arr_th = explode('/', $frm['software']);
                $st_th = "(";
                for ($i = 0; $i < count($arr_th)-1; $i++) {
                    $st_th .= " cansoftware.software = N'".$arr_th[$i]."'";
                    if($i != count($arr_th) -2)
                    {
                        $st_th .= " OR";
                    }  
                }
                $where[] = $st_th.")";
                $join[] = 'LEFT JOIN cansoftware ON candidate.candidateid = cansoftware.candidateid';
            }
        }
        if($frm['profilesrc'] != '')
        {
            $arr = explode('/', $frm['profilesrc']);
            $st = "(";
            for ($i = 0; $i < count($arr)-1; $i++) {
                $st .= " candidate.profilesrc = '".$arr[$i]."'";
                if($i != count($arr) -2)
                {
                    $st .= " OR";
                }  
            }
            $where[] = $st.")";
        }
        if($frm['istalent'] != '')
        {
            $where[] = "candidate.istalent != 0";
        }
        if($frm['blocked'] != '')
        {
            $where[] = "candidate.blocked = 'Y'";
        }
        if(($frm['rateto'] != '') || ($frm['ratefrom'] != ''))
        {
            if($frm['ratefrom'] != '' && $frm['rateto'] != '')
            {
                 $dk = 'AVG(cancomment.rate) >= '.$frm['ratefrom'].' AND AVG(cancomment.rate) <= '.$frm['rateto'] ;
            }
            else if($frm['ratefrom'] != '')
            {
                 $dk = 'AVG(cancomment.rate) >= '.$frm['ratefrom'];
            }
            else $dk = 'AVG(cancomment.rate) <= '.$frm['rateto'];

            $where[] = 'candidate.candidateid in (select cancomment.candidateid from cancomment where cancomment.rate != 0 GROUP BY cancomment.candidateid HAVING '.$dk.')';
        }
        if(count($where) > 0)
        {
            $condition = 'AND '.implode('AND ', $where);
        } else { $condition = '';}
        if(count($join) > 0)
        {
            $jointable = implode(' ', $join);
        } else { $jointable = '';}

        $this->session->set_userdata('filter', $condition);
        $this->session->set_userdata('join', $jointable);
        $this->session->set_userdata('frm', $frm);
        
        $data1 = $this->Candidate_model->list_filter($jointable,$condition);	
		for($i = 0 ; $i < count($data1); $i++)
		{
			$data1[$i]['dateofbirth2'] = getAge($data1[$i]['dateofbirth']);
			$data1[$i]['kinhnghiem'] = ""; 
			if($data1[$i]['yearexperirence'] != null){    
                                $data1[$i]['kinhnghiem'] = ($data1[$i]['yearexperirence'] == 0)? "kinh nghiệm dưới 1 năm, " : $data1[$i]['yearexperirence']." năm kinh nghiệm, ";
                            }
            $data1[$i]['thunhap'] =  ($data1[$i]['desirebenefit'] == 0)? "" : number_format($data1[$i]['desirebenefit'])." VND, ";
              
		}
		echo json_encode($data1);
    }
    
     function toInt($str)
    {
        return (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $str));
    }

	function savefilter()
    {
        $frm = $this->input->post();
        // var_dump($frm);exit;
        $name['filtername'] = 'Filter Chiến dịch '.$frm['campaignid'];
        $name['campaignid'] = $frm['campaignid'];
        $name['fromclause'] = '';
        $name['whereclause'] = '';
        $name['createdby'] = $this->session->userdata('user_admin')['operatorid'];
        $name['updatedby'] = $this->session->userdata('user_admin')['operatorid'];
        $id = $this->Campaign_model->insert('filterprofile',$name);
        $detail['filterid'] = $id;
        $campaignid= $frm['campaignid'];
        unset($frm['campaignid']);
        foreach ($frm as $value) {
           if($value == '')
           {
                continue;
           }
           else
           {
                $data = explode ('/', $value);
                $detail['tablename'] = $data[0];
                $detail['fieldname'] = $data[1];
                $detail['datatype'] = $data[2];
                $detail['operator'] = $data[3];
                $detail['filterfrom'] = $data[4];
                $detail['filterto'] = $data[5];
                $abc1 = $this->Campaign_model->insert('filterdetail',$detail);

           }
        }
        
        echo json_encode($campaignid);       
    }

    function saveManager()
    {
    	$frm = $this->input->post();
    	$match = array('campaignid' => $frm['id']);
    	$managecampaign = implode(',', $frm['managecampaign']);
    	$manager = $this->Campaign_model->select("managecampaign",'reccampaign',array('campaignid' => $frm['id']),'');
    	if($manager[0]['managecampaign'] != ''){
			$data['managecampaign'] = $manager[0]['managecampaign'].','.$managecampaign;
		}else{
			$data['managecampaign'] = $managecampaign;
		}
		$this->Campaign_model->update('reccampaign',$match,$data);
		echo json_encode($frm['managecampaign']);
    }
    function removeManager()
    {
    	$id = $this->input->post('id');
    	$campaignid = $this->input->post('campaignid');
    	$match = array('campaignid' => $campaignid);
    	$manager = $this->Campaign_model->select("managecampaign",'reccampaign',$match,'');
    	$data['managecampaign']  = str_replace( $id.',', '',$manager[0]['managecampaign'] );
		$this->Campaign_model->update('reccampaign',$match,$data);
		echo json_encode(1);
    }



    public function transfer($type)
    {
    	$id = $this->input->post('campaignid');
    	$round = $this->input->post('roundid');
    	$roundname		=	($this->Campaign_model->select("roundname",'recflow', array('roundid' => $round ),''))[0]['roundname'];
    	$frm = $this->input->post('id');
        foreach ($frm as $key ) {
            $data = array();
            $data['candidateid'] 	= $key;
            $data['campaignid'] 	= $id;
            $data['roundid'] 		= $round;
            if ($type == '1') {
                $data['actiontype']  = 'Transfer';
                $data['actionnote']  = 'Chuyển hồ sơ --> '.$roundname;
            }else{
                $data['actiontype']  = 'Discard';
                $data['actionnote']  = 'Chuyển hồ sơ --> '.$roundname.'/ Không đạt';
            }
           $data['createdby']   = $this->session->userdata('user_admin')['operatorid'];
           $this->Data_model->insert('profilehistory',$data);
        }
        echo json_encode(1);
    }

    public function selectRound()
    {
    	$campaignid = $this->input->post('campaignid');
    	$match = array('campaignid' => $campaignid, );
		$round		=	$this->Campaign_model->select('roundid, roundname','recflow',$match,'');
		echo json_encode($round);
    }

    public function recruite()
    {
    	$frm = $this->input->post();
    	$check = $frm['check'];
    	unset($frm['check']);
    	foreach ($check as $key) {
    		$frm['candidateid'] = $key;
    		$frm['actiontype']  = 'Recruite';
            $frm['actionnote']  = 'Tuyển dụng hồ sơ này';
            $frm['createdby']   = $this->session->userdata('user_admin')['operatorid'];
            $this->Data_model->insert('profilehistory',$frm);
    	}
    	echo json_encode(1);
    }


    //tool
    private function upload_files($path, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => FALSE,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['attach[]']['name']= $files['name'][$key];
            $_FILES['attach[]']['type']= $files['type'][$key];
            $_FILES['attach[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['attach[]']['error']= $files['error'][$key];
            $_FILES['attach[]']['size']= $files['size'][$key];

            $fileName =  $image;

            $images[] = base_url().$path.$fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('attach[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }

    public function saveAssessment()
    {
    	$frm = $this->input->post();
    	
    	$data = array();
    	$id 		= $frm['campaignid'];
    	$round 		= $frm['roundid'];
    	if (isset($frm['private'])) {
    		$data['private'] = $private; 
    		unset($frm['private']);
    	}
    	unset($frm['campaignid']);
    	unset($frm['roundid']);
    	$list_to = explode(',',$frm['to']);
    	$mail = array();
    	$mail['emailsubject'] 	= $frm['subject'];
    	$mail['cc'] 		= $frm['cc'];
    	$mail['bcc'] 		= $frm['bcc'];
    	$body 				= $frm['body'];

    	$fileattach = $this->upload_files('public/document/',$_FILES['attach']);
    	$mail["attachment"] = $fileattach;
    	
    	unset($frm['to']);
    	unset($frm['subject']);
    	unset($frm['cc']);
    	unset($frm['bcc']);
    	unset($frm['body']);
    	unset($frm['attach']);
    	$i =0;
        foreach ($frm as $key ) {

        	if(is_array($key)){
        		$data['candidateid'] 	= $key[0];
	            $data['campaignid'] 	= $id;
	            $data['roundid'] 		= $round;
	            $data['duedate']		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $key[3])));
	            $data['asmttemp']		= $key[2];
	            $data['createdby']   = $this->session->userdata('user_admin')['operatorid'];
	            $this->Data_model->insert('assessment',$data);

	            //mail
	            $link = '<a href="'.base_url().'admin/Multiplechoice/pageAssessment/'.$key[0].'/'.$id.'/1" >Trắc nghiệm kiến thức tổng quát - '.$key[1].'</a>';
        		$body = str_replace('$name',$key[1], $body);
        		$body = str_replace('$note',$key[4], $body);
        		$mail['emailbody'] = str_replace('$link',$link, $body);
        		$mail['toemail'] = $list_to[$i];
        		$this->Mail_model->sendMail($mail);

        		$mail["attachment"] = json_encode($fileattach);
        		$mail['fromemail'] = $this->session->userdata('user_admin')['email'];
        		$this->Mail_model->insert('mailtable',$mail);
        		$i++;
        	}            
        }
        echo json_encode(1);
    }

    public function cancleAssessment()
    {
    	$frm = $this->input->post();
    	$assessment = ($this->Campaign_model->select("asmttemp,candidateid,campaignid,roundid,duedate,createdby,createddate",'assessment',array('asmtid' => $frm['asmtid']),''))[0];
    	$assessment['status'] 	= 'D';
    	if (isset($frm['isshare'])) {
    		$assessment['isshare'] 	= $frm['isshare'];
    	}
        $assessment['updatedby']   = $this->session->userdata('user_admin')['operatorid'];
        $this->Data_model->insert('assessment',$assessment);
        echo json_encode(1);
    }

    
}
?>