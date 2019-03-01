<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','my_helper','file'));
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','admin/Mail_model','M_auth','M_data'));
		$this->load->library('session');
		$this->load->library('upload');


		$ac_data['tuyendung'] 	= 'active';
		$ac_data['campaign'] 	= 'active';

		$o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0', 'status' => 'W'),'');
		$join[1] = array('table'=> 'document','match' =>'tb.operatorid = document.referencekey');
		$o_data['operator'] 	= $this->Data_model->select_row_option('tb.operatorname,tb.operatorid,tb.email, document.filename',array('status' => 'W','candidateid' => 0),'','operator tb',$join,'','','','');
		$o_data['asmt_pv'] 		= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
		$o_data['templateOffer'] 	= $this->Campaign_model->select("*",'templateform',array('status' => 'W','temptype' => '0'),'');

		$this->_data['modal_campaign'] 	= $this->load->view('admin/campaign/modal_campaign',$o_data,true);
		$this->_data['header'] 	= $this->load->view('admin/home/header',null,true);
	    $this->_data['menu']   	= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->_data['footer'] 	= $this->load->view('admin/home/footer',null,true);

	    $this->sess  = $this->session->userdata('user_admin');  
	    $this->seg = 4;
	}

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
            $_FILES['attach[]']['name']		= $files['name'][$key];
            $_FILES['attach[]']['type']		= $files['type'][$key];
            $_FILES['attach[]']['tmp_name']	= $files['tmp_name'][$key];
            $_FILES['attach[]']['error']	= $files['error'][$key];
            $_FILES['attach[]']['size']		= $files['size'][$key];

            $filename = preg_replace('([\s_&#%]+)', '-', $image);

            $images[] 						= base_url().$path.$filename;

            $config['file_name'] 			= $filename;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('attach[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }

	function loadNotifi()
	{
		$sql = "SELECT a.*, b.operatorname, c.filename,d.name, e.position FROM profilehistory a LEFT JOIN operator b ON a.createdby = b.operatorid LEFT JOIN document c ON a.createdby = c.referencekey AND c.tablename = 'operator' LEFT JOIN candidate d ON a.candidateid = d.candidateid LEFT JOIN reccampaign e ON a.campaignid = e.campaignid  where a.campaignid in (SELECT campaignid FROM reccampaign  WHERE managecampaign LIKE  '%".$this->session->userdata('user_admin')['operatorid']."%' ) ORDER BY createddate desc";
		$h_data['history'] = $this->Campaign_model->select_sql($sql);
		for ($j = 0; $j < count($h_data['history']); $j++) {
			$h_data['history'][$j]['date'] = date_format(date_create($h_data['history'][$j]['createddate']),"d/m/Y H:i:s");
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
		$from = '';
		$where = 'AND candidate.hidden = 1';
		$day = date('Y-m-d H:i:s');
		$operatorid = $this->sess['operatorid'];
		$sql = "SELECT DISTINCT a.*
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere a.expdate >= '$day' AND a.status = 'W'
				and (a.managecampaign like '%,$operatorid,%' or a.showtype = 'O' or a.showtype='I' or b.manageround like '%,$operatorid,%') order by a.lastupdate DESC";
		$data['campaigns_active'] = $this->M_data->select_sql($sql);
		
		for ($i=0; $i < count($data['campaigns_active']); $i++) { 
			$match = array('campaignid' => $data['campaigns_active'][$i]['campaignid'] );
			$data['campaigns_active'][$i]['round'] =	$this->Campaign_model->select("roundid,sorting,roundname,roundtype",'recflow',$match,'');

			$data['campaigns_active'][$i]['round'][0]['count_round'] = $this->Candidate_model->count_round_hs($from,$where,$data['campaigns_active'][$i]['campaignid'])[0]['count'];
			for ($j=1; $j < count($data['campaigns_active'][$i]['round']); $j++) { 
				$data['campaigns_active'][$i]['round'][$j]['count_round'] = $this->total_round($data['campaigns_active'][$i]['campaignid'],$data['campaigns_active'][$i]['round'][$j]['roundid'],'Transfer');
			}

			$data['campaigns_active'][$i]['manager'] = array();
			$mana = trim($data['campaigns_active'][$i]['managecampaign'],',');
			$mana = explode(',', $mana);
			$join[0]  = array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
			foreach ($mana as $key =>$value) {
				$match = array('operatorid' => $value );
				$temp = $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
				if (isset($temp[0])) {
					$data['campaigns_active'][$i]['manager'][$key] =$temp[0];
				}else{
					$data['campaigns_active'][$i]['manager'][$key] = '';
				}
			}
			$cmpid = $data['campaigns_active'][$i]['campaignid'];
			$sql = "SELECT b.roundid, b.sorting
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere a.expdate >= '$day' AND a.status = 'W'
				and b.campaignid = '$cmpid'
				and (a.managecampaign like '%,$operatorid,%' or b.manageround like '%,$operatorid,%')
				
				";
			$data['campaigns_active'][$i]['roundlist'] = $this->M_data->select_sql($sql);
		}
		//đã kết thúc
		
		// $data['campaigns_end'] 		=	$this->Data_model->selectTable('reccampaign',$match);
		$sql = "SELECT DISTINCT a.*
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere a.expdate < '$day' AND a.status = 'W'
				and (a.managecampaign like '%,$operatorid,%' or a.showtype = 'O' or a.showtype='I' or b.manageround like '%,$operatorid,%') order by a.lastupdate DESC";
		$data['campaigns_end'] = $this->M_data->select_sql($sql);

		for ($i=0; $i < count($data['campaigns_end']); $i++) { 
			$match = array('campaignid' => $data['campaigns_end'][$i]['campaignid'] );
			$data['campaigns_end'][$i]['round'] =	$this->Campaign_model->select("roundid,sorting,roundname,roundtype",'recflow',$match,'');

			$data['campaigns_end'][$i]['round'][0]['count_round'] = $this->Candidate_model->count_round_hs($from,$where,$data['campaigns_end'][$i]['campaignid'])[0]['count'];
			for ($j=1; $j < count($data['campaigns_end'][$i]['round']); $j++) { 
				$data['campaigns_end'][$i]['round'][$j]['count_round'] = $this->total_round($data['campaigns_end'][$i]['campaignid'],$data['campaigns_end'][$i]['round'][$j]['roundid'],'Transfer');
			}

			$data['campaigns_end'][$i]['manager'] = array();
			$mana = trim($data['campaigns_end'][$i]['managecampaign'],',');
			$mana = explode(',', $mana);
			$join[0]  = array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
			foreach ($mana as $key =>$value) {
				$match = array('operatorid' => $value );
				$temp = $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
				if (isset($temp[0])) {
					$data['campaigns_end'][$i]['manager'][$key] =$temp[0];
				}else{
					$data['campaigns_end'][$i]['manager'][$key] = '';
				}
				$cmpid = $data['campaigns_end'][$i]['campaignid'];
				$sql = "SELECT b.roundid, b.sorting
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere a.expdate < '$day' AND a.status = 'W'
				and b.campaignid = '$cmpid'
				and (a.managecampaign like '%,$operatorid,%' or b.manageround like '%,$operatorid,%')
				
				";
				$data['campaigns_end'][$i]['roundlist'] = $this->M_data->select_sql($sql);
			}
		}
		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$this->_data['temp'] 	= $this->load->view('admin/campaign/main',$data,true);
		}
		
		$this->load->view('admin/home/master',$this->_data);
	}
	
	public function round_1_1($roundid='',$campaignid=''){
		$match 					= array('campaignid' => $campaignid, );
		$data['campaigns'] 		=	$this->Data_model->selectTable('reccampaign',$match);
		$ql 					= trim($data['campaigns'][0]['managecampaign'],',');
		$ql 					= explode(',', $ql);
		$operatorid = $this->sess['operatorid'];
		if ($ql[0] == '') {
			$c_data['ql_tong'] 	= '';
		}else{
			$join[0]  			= array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
			foreach ($ql as $key =>$value) {
				$match 			= array('operatorid' => $value );
				$c_data['ql_tong'][$key] =($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join))[0];
			}
		}
		if ($roundid != 0) {
			$data['src'] 				= base_url().'admin/campaign/list_profile/'.$campaignid.'/'.$roundid.'/1/';

			$match = array('campaignid' => $campaignid, );
			$c_data['round_main'] 		=	$this->Data_model->selectTable('recflow',$match);
			$c_data['campaignid']		= $campaignid;
			$c_data['bien'] 			= $roundid;

			$from 			= '';
			$where 			= 'AND candidate.hidden = 1';
			$c_data['round_main'][0]['count_round'] 		= $this->Candidate_model->count_round_hs($from,$where,$campaignid)[0]['count'];
			for ($j=1; $j < count($c_data['round_main']); $j++) { 
				$c_data['round_main'][$j]['count_round'] 	= $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Transfer');
			}

			$mana 			= trim($c_data['round_main'][0]['manageround'],',');
			$mana 			= explode(',', $mana);
			if ($mana[0] == '') {
				$c_data['manager'] 	= '';
			}else{
				$join[0]  	= array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' ");
				foreach ($mana as $key =>$value) {
					$match 	= array('operatorid' => $value );
					$c_data['manager'][$key] 	=($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join))[0];
				}
			}
			
			$c_data['duedate'] 			= $c_data['round_main'][0]['duedate'];

			$sql = "SELECT b.roundid, b.sorting
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere b.campaignid = '$campaignid'
				and (a.managecampaign like '%,$operatorid,%' or b.manageround like '%,$operatorid,%')
				
				";
			$c_data['roundlist'] = $this->M_data->select_sql($sql);

			$a_data['campaignid']		= $campaignid;
			$a_data['roundid']			= $roundid;
			$c_data['campaign_info'] 	= $this->load->view('admin/campaign/content_iframe_info',$a_data,true);

			$data['main_round']     	= $this->load->view('admin/campaign/main_round',$c_data,true); 
		}else{
			$data['src'] 				= '';
			$data['main_round'] 		= '';
		}
		
		$this->_data['temp'] 			= $this->load->view('admin/campaign/round_1_1',$data,true);
		$this->load->view('admin/home/master',$this->_data);
	}

	public function round_1_2($roundid='',$campaignid=''){
		
		$type1 				= "Transfer";
		$type2 				= "Discard";

		$data['src_1'] 		= base_url().'admin/campaign/profile/0/0/'.$campaignid.'/'.$roundid.'/'.$type1.'/';
		$data['src_2'] 		= base_url().'admin/campaign/profile/0/0/'.$campaignid.'/'.$roundid.'/'.$type2.'/';

		$match 				= array('campaignid' => $campaignid, );
		$data['campaigns'] 	=	$this->Data_model->selectTable('reccampaign',$match);

		$ql 				= trim($data['campaigns'][0]['managecampaign'],',');
		$ql 				= explode(',', $ql);

		$operatorid = $this->sess['operatorid'];
		if ($ql[0] == '') {
			$c_data['ql_tong'] = '';
		}else{
			$join[0]  		= array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
			foreach ($ql as $key =>$value) {
				$match1 	= array('operatorid' => $value );
				$c_data['ql_tong'][$key] =($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match1,'operator',$join))[0];
			}
		}
		$c_data['bien'] 			= $roundid;
		$c_data['campaignid']		= $campaignid;
		$c_data['round_main'] 		=	$this->Data_model->selectTable('recflow',$match);

		$from 		= '';
		$where 		= 'AND candidate.hidden = 1';
		$c_data['round_main'][0]['count_round'] = $this->Candidate_model->count_round_hs($from,$where,$campaignid)[0]['count'];
		for ($j=1; $j < count($c_data['round_main']); $j++) { 
			$c_data['round_main'][$j]['count_round'] = $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Transfer');

			if ($c_data['round_main'][$j]['roundid'] == $roundid) {
				$mana 				= trim($c_data['round_main'][$j]['manageround'],',');
				$mana 				= explode(',', $mana);
				if ($mana[0] == '') {
					$c_data['manager'] = '';
				}else{
					$join[0]  		= array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
					foreach ($mana as $key =>$value) {
						$match 		= array('operatorid' => $value );
						$temp 		= $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
						if(isset($temp[0])){
							$c_data['manager'][$key] = $temp[0];
						}
						// $c_data['manager'][$key] =($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join))[0];
					}
				}
				$c_data['duedate'] 		= $c_data['round_main'][$j]['duedate'];
				$data['count_tranfer'] 	= $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Transfer');
				$data['count_discard'] 	= $this->total_round($campaignid,$c_data['round_main'][$j]['roundid'],'Discard');
			}
		}
		$a_data['campaignid']			= $campaignid;
		$a_data['roundid']				= $roundid;
		$c_data['campaign_info'] 		= $this->load->view('admin/campaign/content_iframe_info',$a_data,true);

		$sql = "SELECT b.roundid, b.sorting
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere b.campaignid = '$campaignid'
				and (a.managecampaign like '%,$operatorid,%' or b.manageround like '%,$operatorid,%')
				
				";
			$c_data['roundlist'] = $this->M_data->select_sql($sql);
		
		$data['main_round']     		= $this->load->view('admin/campaign/main_round',$c_data,true); 
		$this->_data['temp'] 			= $this->load->view('admin/campaign/round_1_2',$data,true);
		$this->load->view('admin/home/master',$this->_data);
	}
	

	public function list_profile($campaignid='',$roundid='',$type='')
	{
		$join 						= '';
		$temp         				= $this->session->userdata('filterRecruit');
        $where        				= isset($temp)? $temp : "AND candidate.hidden = 1";
		$this->session->set_userdata('filter', $where);

		$match 						= array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data1['recflow']				=	$this->Data_model->selectTable('recflow', $match)[0];
        $email 						= '';
        $mana 						= trim($this->data1['recflow']['manageround'],',');
		$mana 						= explode(',', $mana);
        foreach ($mana as $key =>$value) {
			$match 					= array('operatorid' => $value );
			$email 					.=($this->Data_model->select_join("email",$match,'operator',''))[0]['email'].',';
		}
        $checkRecruit          = $this->session->userdata('checkRecruit');


        $this->data2['checkRecruit']        = $checkRecruit;
        $this->data2['manageround'] 		= $email;
		$this->data2['total_candidate'] 	= $this->Candidate_model->count_filter($join,$where);
        $this->data2['profilesrc'] 			= $this->Campaign_model->select('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $this->data2['hocvan'] 				= $this->Campaign_model->select("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $this->data2['ngoaingu'] 			= $this->Campaign_model->select("language",'canlanguage',array('hidden' => 1),'language');
        $this->data2['tinhoc'] 				= $this->Campaign_model->select("software",'cansoftware',array('hidden' => 1),'software');
        $this->data2['filter'] 				= $this->Campaign_model->selectall('filterprofile');
		$this->data2['city'] 				= $this->Campaign_model->selectall('city');
		$this->data2['tag']                 = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        $this->data2['tagrandom']           = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'random'));
		$this->data1['campaignid'] 			= $this->data2['campaignid']	= $campaignid;
		$this->data1['roundid']				= $this->data2['roundid']	    = $roundid;
		$this->data1['type']				= $this->data2['type'] 			= $type;
		$this->data1['total_candidate'] 	= $this->data2['total_candidate'];
		$this->data1['nav'] 				= $this->load->view('admin/campaign/nav',$this->data2,true);

		$config['total_rows']           = $this->data2['total_candidate'];
        $config['base_url']             = base_url()."admin/campaign/list_profile/$campaignid/$roundid/$type/";
        $config['per_page']             = 100;
        $config['next_link']            = "Sau";
        $config['prev_link']            = "Trước";
        $config['first_link']           = "Đầu";
        $config['last_link']            = "Cuối";
        $config['num_links']            = 3;
        $config['use_page_numbers']     = TRUE;
        $start = ($this->uri->segment(7)) ? $this->uri->segment(7) : 1;
        $start = ($start-1)*$config['per_page'];
        $this->load->library('pagination', $config);
        $this->data1['phantrang']           =  $this->pagination->create_links();

        $order = 'candidate.lastupdate desc';
        $this->data1['candidate']           = $this->Candidate_model->list_filter_campaign($join,$where,$campaignid,$start,$config['per_page'],$order); 
        $this->data1['total_candidate']     = $this->data2['total_candidate'];
		
		$iframe_data['temp'] 				= $this->load->view('admin/campaign/search_candidate',$this->data1,true);
		$this->load->view('admin/home/master-iframe',$iframe_data);
	}

	public function profile($id ='',$hs = '0',$campaignid='',$roundid='',$type='')
	{	
		$order        = $this->session->userdata('order');
        if ($order == NULL) {
            $order        = "candidate.lastupdate desc";
        }
		if($hs == '0'){
			if ($type == '1') {
				$type = '';
			}
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
				$this->data2['candidate'] = $this->Candidate_model->list_filter($join,$where,0,100,$order ); 
			}else{
				$this->data2['candidate'] = '';
				$id = '-1';
			}
			
		}else{
			$where 		= $this->session->userdata('filter');
			$join 		= '';
	        $join 		= $this->session->userdata('join');
	        $this->data2['candidate'] = $this->Candidate_model->list_filter($join,$where,0,100,$order); 
		}
		
		$this->data1['campaignid'] 	= $this->data2['campaignid'] 	= $campaignid;
		$this->data1['roundid'] 	= $this->data2['roundid'] 		= $roundid;
        $this->data1['id'] 			= $this->data2['id_active'] 	= $id;
        
        $match 						= array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data2['recflow'] 	=	($this->Campaign_model->select("*",'recflow',$match,''))[0];

		$manageround				=	$this->Data_model->selectTable('recflow', $match)[0]['manageround'];
        $email 						= '';
        $mana 						= trim($manageround,',');
		$mana 						= explode(',', $mana);
        foreach ($mana as $key =>$value) {
			$match 					= array('operatorid' => $value );
			$temp 					= $this->Data_model->select_join("email",$match,'operator','');
			if (isset($temp[0])) {
				$email 				.= $temp[0]['email'].',';
			}
			// $email 					.=($this->Data_model->select_join("email",$match,'operator',''))[0]['email'].',';
		}
        $this->data2['manageround'] = $email;

		$this->data2['asmt_tn'] 	= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '2'),'');
		$this->data2['asmt_pv'] 	= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
		$this->data2['category'] = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W'),'');

		$this->data1['nav'] 		= $this->load->view('admin/campaign/nav_profile',$this->data2,true);
		
		$iframe_data['temp'] 		= $this->load->view('admin/campaign/profile_candidate',$this->data1,true);
		$this->load->view('admin/home/master-iframe',$iframe_data);
	}
	
	public function hosochitiet($id = '',$campaignid='',$roundid='', $tabActive='1')
	{
		$this->data2['campaignid'] 		= $campaignid;
		$this->data2['roundid'] 		= $roundid;
		$match 							= array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data2['campaignname'] 	=	($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid,),''))[0]['position'];
		$this->data2['recflow'] 		=	($this->Campaign_model->select("*",'recflow',$match,''))[0];
		

		if ($id != '-1') {
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
	       
	       //   echo "<pre>";
        	// print_r($history_profile3);
        	// echo "</pre>";exit;


	        $manageround				= $this->data2['recflow']['manageround'];
	        $email = '';
	        $mana 						= trim($manageround,',');
			$mana 						= explode(',', $mana);
	        foreach ($mana as $key =>$value) {
				$match 					= array('operatorid' => $value );
				$temp 					= $this->Data_model->select_join("email",$match,'operator','');
				if (isset($temp[0])) {
					$email 				.= $temp[0]['email'].',';
				}
				// $email 					.=($this->Data_model->select_join("email",$match,'operator',''))[0]['email'].',';
			}
	        $this->data2['manageround'] = $email;

	        if($profilesrc == 'Nội bộ' || $profilesrc == 'Web Admin'){
	            $this->data2['candidate_noibo']     = $this->Candidate_model->first_row('candidate',array('candidateid' => $id, ),'','');
	            $id                                 = -1;
	            $id_mergewith                       = $this->data2['candidate_noibo']['candidateid'];
	            $sql = "SELECT count(recordid) as count FROM profilehistory WHERE candidateid = $id_mergewith AND actiontype = 'Recruite'";
				$this->data2['recruite'] 	= $this->Campaign_model->select_sql($sql)[0]['count'];
	        }else{
	            $this->data2['candidate_noibo']     = $this->Candidate_model->first_row('candidate',array('mergewith' => $id, ),'','');
	            $id_mergewith                       = $this->data2['candidate_noibo']['candidateid'];
	            $sql = "SELECT count(recordid) as count FROM profilehistory WHERE candidateid = $id AND actiontype = 'Recruite'";
				$this->data2['recruite'] 	= $this->Campaign_model->select_sql($sql)[0]['count'];
	        }
	        $this->data2['city'] 		= $this->Campaign_model->selectall('city');
	        $this->data2['document'] 	= $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','lastupdate');
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
			$this->data2['tags']          = $this->Candidate_model->join_tag($id);
	        $a = array();
	        $_jsoncity = $this->Candidate_model->select_sugg_tag('tagprofile.title',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
	        foreach ($_jsoncity as $key) {
	            array_push($a, $key['title']);
	        }
	        $this->data2['ss_tags'] = $a;
	        $roww = $this->Candidate_model->query_sql("select COUNT(DISTINCT campaignid) as slchiendich from profilehistory where candidateid = '".$id."'");
        	$this->data2['count_campaign'] = $roww[0]['slchiendich'];
			//noibo
	        
            $this->data2['canaddress_noibo']    = $this->Candidate_model->selectTableByIds('canaddress',$id_mergewith);
            $this->data2['family_noibo']        = $this->Candidate_model->selectTableByIds('cansocial',$id_mergewith);
            $this->data2['experience_noibo']    = $this->Candidate_model->selectTableByIds('canexperience',$id_mergewith);
            $this->data2['reference_noibo']     = $this->Candidate_model->selectTableByIds('canreference',$id_mergewith);
            $this->data2['knowledge_noibo']     = $this->Candidate_model->selectTableByIds('canknowledge',$id_mergewith);
            $this->data2['language_noibo']      = $this->Candidate_model->selectTableByIds('canlanguage',$id_mergewith);
            $this->data2['software_noibo']      = $this->Candidate_model->selectTableByIds('cansoftware',$id_mergewith);
            $this->data2['document_noibo']      = $this->Candidate_model->first_row('document',array('referencekey'=>$id_mergewith,'tablename' => 'candidate'),'filename,url','lastupdate');
            $vt1                                = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id_mergewith,'dateto');
            $this->data2['vt_noibo']            = $vt1['position'].' - '.$vt1['company'];
            $this->data2['tags_noibo']          = $this->Candidate_model->join_tag($id_mergewith);
            $this->data2['tagstrandom_noibo']   = $this->Candidate_model->join_tag_random($id_mergewith);


            //hồ sơ con khác
	        if ($id == -1) {
	           $id = $id_mergewith;
	        }
	        $this->data2['candidate_con']     = $this->Campaign_model->select_sql("SELECT * FROM candidate WHERE mergewith = $id AND candidateid NOT IN ($id_mergewith)");
	        foreach ($this->data2['candidate_con'] as $key => $value) {
	            $id_con                             = $value['candidateid'];
	            $this->data2['canaddress_con'][$key]    = $this->Candidate_model->selectTableByIds('canaddress',$id_con);
	            $this->data2['family_con'][$key]        = $this->Candidate_model->selectTableByIds('cansocial',$id_con);
	            $this->data2['experience_con'][$key]    = $this->Candidate_model->selectTableByIds('canexperience',$id_con);
	            $this->data2['reference_con'][$key]     = $this->Candidate_model->selectTableByIds('canreference',$id_con);
	            $this->data2['knowledge_con'][$key]     = $this->Candidate_model->selectTableByIds('canknowledge',$id_con);
	            $this->data2['language_con'][$key]      = $this->Candidate_model->selectTableByIds('canlanguage',$id_con);
	            $this->data2['software_con'][$key]      = $this->Candidate_model->selectTableByIds('cansoftware',$id_con);
	            $this->data2['document_con'][$key]      = $this->Candidate_model->first_row('document',array('referencekey'=>$id_con,'tablename' => 'candidate'),'filename,url','lastupdate');
	            $vt1                                    = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id_con,'dateto');
	            $this->data2['tags_con'][$key]          = $this->Candidate_model->join_tag($id_con);
	            $this->data2['tagstrandom_con'][$key]   = $this->Candidate_model->join_tag_random($id_con);
	            $this->data2['vt_con'][$key]            = $vt1['position'].' - '.$vt1['company'];
	            
	        }
	        // var_dump($this->data2['canaddress_con']);exit;
		}else{
			$this->data2['id'] 			= '';
		}
		$this->data2['tabActive'] = $tabActive;
		$this->data2['operator'] = $this->Campaign_model->select("operatorid,operatorname,email",'operator',array('status' => 'W','candidateid' => 0),'');
		$this->data2['asmt_tn'] = $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '2'),'');
		$this->data2['asmt_pv'] = $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
		$this->data2['category'] = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W'),'');
		$data['temp'] 			= $this->load->view('admin/campaign/detail_profile',$this->data2,true);
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
		$frm['status'] 				= "C";
		$frm['expdate'] 			= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $frm['expdate'])));
		$frm['managecampaign'] 		= ','.$this->session->userdata('user_admin')['operatorid'].',';
		$frm['createdby'] 			= $this->session->userdata('user_admin')['operatorid'];
		$frm['updatedby'] 			= $this->session->userdata('user_admin')['operatorid'];
		$m_data['id'] 				= $this->Campaign_model->insert('reccampaign', $frm);
		$m_data['hocvan'] 			= $this->Campaign_model->select("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $m_data['ngoaingu'] 		= $this->Campaign_model->select("language",'canlanguage',array('hidden' => 1),'language');
        $m_data['tinhoc'] 			= $this->Campaign_model->select("software",'cansoftware',array('hidden' => 1),'software');
        $m_data['profilesrc'] 		= $this->Campaign_model->select('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $m_data['tag']                 = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        $m_data['tagrandom']           = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'random'));

		$this->_data['script'] 		= $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 		= $this->load->view('admin/campaign/new_campaign_2',$m_data,true);
		$this->load->view('admin/home/master',$this->_data);
	}

	public function new_campaign_3($id)
	{
		$m_data['campaignid'] 		= $id;
		$manager 					= $this->Campaign_model->select("managecampaign",'reccampaign',array('campaignid' => $id),'');
		$m_data['operator'] 		= $this->Campaign_model->select("operatorid,operatorname",'operator',array('candidateid' => 0,'status' => 'W'),'');
		if($manager[0]['managecampaign'] != ''){
			$m_data['manager'] 		= explode(',',trim($manager[0]['managecampaign'],','));
		}else{
			$m_data['manager'] 		= '';
		}

		$sql = "SELECT a.* FROM recflowpresetheader a ";
		$m_data['process'] 			= $this->Campaign_model->select_sql($sql);

		$m_data['mailtemplate'] 	= $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0','status' => 'W'),'');
		$m_data['asmt_tn'] 			= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '2'),'');
		$m_data['asmt_pv'] 			= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
		$this->_data['script'] 		= $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 		= $this->load->view('admin/campaign/new_campaign_3',$m_data,true);
		$this->load->view('admin/home/master',$this->_data);
	}

	public function saveRound()
	{
		$frm = $this->input->post();
		$data['campaignid'] = $frm['campaignid'];
		unset($frm['campaignid']);
		
		foreach ($frm as $row) {
			$data['transferemail'] 	= $data['discardemail'] = 'N';
			$data['transfmailtemp'] 	= $data['discmailtemp'] = $data['assessment'] = $data['asmtmailtemp'] = $data['letteroffermailtemp'] = $data['scorecard']  = $data['interviewmailtemp'] = $data['invitemailtemp'] = 0;
			$data['sorting'] 		= $row[0];
			$data['roundname'] 		= $row[1];
			$data['roundtype'] 		= $row[2];
			$data['duedate'] 		= $this->convert_date($row[3]);
			if($row[4] == ''){
				$data['manageround']	= ','.$this->session->userdata('user_admin')['operatorid'].',';
			}else{
				$data['manageround'] 	= $row[4];
			}
			if (isset($row[5]) && $row[5] == 'on' && isset($row[7]) && $row[7] == 'on'){
				$data['transferemail'] 		= 'Y';
				$data['transfmailtemp'] 	= $row[6];
				$data['discardemail'] 		= 'Y';
				$data['discmailtemp'] 		= $row[8];

				if (isset($row[9])) {
					if ($row[2] == 'Assessment') {
						$data['assessment'] 		= $row[9];
						$data['asmtmailtemp'] 		= $row[10];
					}else if ($row[2] == 'Offer') {
						$data['letteroffermailtemp'] 		= $row[9];
					}else if ($row[2] == 'Interview'){
						$data['scorecard'] 				= $row[9];
						$data['interviewmailtemp'] 		= $row[10];
						$data['invitemailtemp'] 		= $row[11];
					}
				}
			} 
			else if (isset($row[5]) && $row[5] == 'on') {
				$data['transferemail'] 		= 'Y';
				$data['transfmailtemp'] 	= $row[6];
				$data['discmailtemp'] 		= $row[7];
				if (isset($row[8])) {
					if ($row[2] == 'Assessment') {
						$data['assessment'] 		= $row[8];
						$data['asmtmailtemp'] 		= $row[9];
					}else if ($row[2] == 'Offer') {
						$data['letteroffermailtemp'] 		= $row[8];
					}else if ($row[2] == 'Interview'){
						$data['scorecard'] 				= $row[8];
						$data['interviewmailtemp'] 		= $row[9];
						$data['invitemailtemp'] 		= $row[10];
					}
				}
			}
			else if (isset($row[6]) && $row[6] == 'on') {
				$data['transfmailtemp'] 	= $row[5];
				$data['discardemail'] 		= 'Y';
				$data['discmailtemp'] 		= $row[7];
				if (isset($row[8])) {
					if ($row[2] == 'Assessment') {
						$data['assessment'] 		= $row[8];
						$data['asmtmailtemp'] 		= $row[9];
					}else if ($row[2] == 'Offer') {
						$data['letteroffermailtemp'] 		= $row[8];
					}else if ($row[2] == 'Interview'){
						$data['scorecard'] 				= $row[8];
						$data['interviewmailtemp'] 		= $row[9];
						$data['invitemailtemp'] 		= $row[10];
					}
				}
			}else if (isset($row[5]) && $row[5] != 'on' ) {
			 	$data['transfmailtemp'] 	= $row[5];
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
			$this->Data_model->insert('recflow',$data);
		}
		echo json_encode(1);
	}
	public function new_campaign_4($campaignid)
	{
		$data['campaignid'] 		= $campaignid;
		$match 						= array('campaignid' => $campaignid, );
		$data['campaigns'] 			=	$this->Data_model->selectTable('reccampaign',$match);
		$this->_data['script'] 		= $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->_data['temp'] 		= $this->load->view('admin/campaign/new_campaign_4',$data,true);
		$this->load->view('admin/home/master',$this->_data);
	}
	public function saveRound4()
	{
		$frm 			= $this->input->post();
		$frm['status'] 	= $data['status'] = "W";
		$frm['expdate'] = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $frm['expdate'])));
		
		$this->Data_model->update('reccampaign',array('campaignid'=>$frm['campaignid']),$data);
		$this->Data_model->insert('recartical',$frm);
		redirect(base_url('admin/campaign/main'));
	}
	public function selectCity()
    {
        $id_city 		= $this->input->post('id_city');
        $_jsoncity 		= $this->total_model->selectTableByIds('district',array('id_city'=>$id_city));
        echo json_encode($_jsoncity);
    }
     public function selectDistrict()
    {
        $id_district 	= $this->input->post('id_district');
        $city 			= $this->total_model->selectTableByIds('ward',array('id_district'=>$id_district));
        echo json_encode($city);
    }

    function loadfilter()
    {
        $campaignid 	= $this->input->post('campaignid');
        $match 			= array( 'campaignid' => $campaignid);
        $filter 		= $this->Campaign_model->select("filterid",'filterprofile',$match,'');
        $match1 		= array( 'filterid' => $filter[0]['filterid']);
        $data 			= $this->Data_model->selectTable('filterdetail',$match1);
        echo json_encode($data);
    }

    function filterApply()
    {
        $campaignid 	= $this->input->post('campaignid');
        $data1 			= $this->Candidate_model->list_filter_apply($campaignid);
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
    function filterRecruit($check,$campaignid,$roundid)
    {
        
        $where = "AND candidate.candidateid NOT IN (SELECT candidateid from profilehistory where actiontype = 'Recruite') ";
        
        $this->session->set_userdata('filterRecruit', $where);
        $this->session->set_userdata('checkRecruit', $check);
        $config['total_rows']           = $this->Candidate_model->count_filter('',$where);
        $config['base_url']             = base_url()."admin/campaign/list_profile/$campaignid/$roundid/1/";
        $config['per_page']             = 100;
        $config['next_link']            = "Sau";
        $config['prev_link']            = "Trước";
        $config['first_link']           = "Đầu";
        $config['last_link']            = "Cuối";
        $config['num_links']            = 3;
        $config['use_page_numbers']     = TRUE;
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $start = ($start-1)*$config['per_page'];
        $this->load->library('pagination', $config);
        $data1                          = $this->Candidate_model->list_filter_recruit($check,$start,$config['per_page']);
        for($i = 0 ; $i < count($data1); $i++)
        {
            $data1[$i]['dateofbirth2'] = getAge($data1[$i]['dateofbirth']);
            $data1[$i]['kinhnghiem'] = ""; 
            if($data1[$i]['yearexperirence'] != null){    
                                $data1[$i]['kinhnghiem'] = ($data1[$i]['yearexperirence'] == 0)? "kinh nghiệm dưới 1 năm, " : $data1[$i]['yearexperirence']." năm kinh nghiệm, ";
                            }
            $data1[$i]['thunhap'] =  ($data1[$i]['desirebenefit'] == 0)? "" : number_format($data1[$i]['desirebenefit'])." VND, ";
              
        }
        $data1['total_rows']        = $config['total_rows'];
        $data1['phantrang']         =  '<div id="jquery_link" align="center" style="height:50px">'.$this->pagination->create_links().'</div>';
        echo json_encode($data1);
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
        // if($frm['istalent'] != '')
        // {
        //     $where[] = "candidate.istalent != 0";
        // }
        if(($frm['talentfrom'] != '') || ($frm['talentto'] != ''))
        {
            if($frm['talentfrom'] != ''){ 
                $where[] = "candidate.istalent >= '".$frm['talentfrom']."'";
            }
            if($frm['talentto'] != ''){ 
                $where[] = "candidate.istalent <= '".$frm['talentto']."'";
            }

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
        $order        = "candidate.lastupdate desc";
        $this->session->set_userdata('order', $order);
        
        
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
        $name['filtername'] 	= 'Filter Chiến dịch '.$frm['campaignid'];
        $name['campaignid'] 	= $frm['campaignid'];
        $name['fromclause'] 	= '';
        $name['whereclause'] 	= '';
        $name['createdby'] 		= $this->session->userdata('user_admin')['operatorid'];
        $name['updatedby'] 		= $this->session->userdata('user_admin')['operatorid'];
        $id 					= $this->Campaign_model->insert('filterprofile',$name);
        $detail['filterid'] 	= $id;
        $campaignid				= $frm['campaignid'];
        unset($frm['campaignid']);
        foreach ($frm as $value) {
           if($value == '')
           {
                continue;
           }
           else
           {
                $data = explode ('/', $value);
                $detail['tablename'] 	= $data[0];
                $detail['fieldname']	= $data[1];
                $detail['datatype'] 	= $data[2];
                $detail['operator'] 	= $data[3];
                $detail['filterfrom'] 	= $data[4];
                $detail['filterto'] 	= $data[5];
                $abc1 = $this->Campaign_model->insert('filterdetail',$detail);

           }
        }
        
        echo json_encode($campaignid);       
    }

    function saveManager()
    {
    	$frm 				= $this->input->post();
    	$match 				= array('campaignid' => $frm['id']);
    	$managecampaign 	= implode(',', $frm['managecampaign']);
    	$manager 			= $this->Campaign_model->select("managecampaign",'reccampaign',array('campaignid' => $frm['id']),'');
    	if($manager[0]['managecampaign'] != ''){
			$data['managecampaign'] = $manager[0]['managecampaign'].$managecampaign.',';
		}else{
			$data['managecampaign'] = ','.$managecampaign.',';
		}
		$this->Campaign_model->update('reccampaign',$match,$data);
		echo json_encode($frm['managecampaign']);
    }
    function removeManager()
    {
    	$id 			= $this->input->post('id');
    	$campaignid 	= $this->input->post('campaignid');
    	$match 			= array('campaignid' => $campaignid);
    	$manager 		= $this->Campaign_model->select("managecampaign",'reccampaign',$match,'');
    	$data['managecampaign']  = str_replace( $id.',', '',$manager[0]['managecampaign'] );
		$this->Campaign_model->update('reccampaign',$match,$data);
		echo json_encode(1);
    }



    public function transfer($type)
    {
    	// var_dump($this->input->post());exit;
    	$id 			= $this->input->post('campaignid');
    	$roundid 		= $this->input->post('roundid');
    	$roundname		=	($this->Campaign_model->select("roundname",'recflow', array('roundid' => $roundid ),''))[0]['roundname'];
    	$data 			= array();
    	$frm 			= $this->input->post();
    	$isshare 		= $this->input->post('isshare');
    	$candidateid	= $frm['id'];
    	if ($type == '1') {
    		$roundid_old 	= $this->input->post('roundid_old');
    		$roundname_old	=	($this->Campaign_model->select("roundname",'recflow', array('roundid' => $roundid_old ),''))[0]['roundname'];
    	}else{
    		$roundname_old	= $roundname;
    	}
    	if (isset($isshare)) {
            $data["isshare"] = $isshare; 
        }
        foreach ($candidateid as $key ) {
            $data['candidateid'] 	= $key;
            $data['campaignid'] 	= $id;
            $data['roundid'] 		= $roundid;
            if ($type == '1') {
            	$body 				 = html_entity_decode($this->input->post('body5'));
                $data['actiontype']  = 'Transfer';
                $data['actionnote']  = 'Chuyển hồ sơ --> '.$roundname;
            }else{
            	$body 				 = html_entity_decode($this->input->post('body6'));
                $data['actiontype']  = 'Discard';
                $data['actionnote']  = 'Chuyển hồ sơ --> '.$roundname.'/ Không đạt';
            }
           $data['createdby']   = $this->session->userdata('user_admin')['operatorid'];
           $this->Data_model->insert('profilehistory',$data);
        }
        //mail interview
        $checkmail = 0;
        $checkmail 				= $this->input->post('checkmail');
        if (isset($checkmail)) {
        	$mail 				= array();
        	if($frm['presender'] == 'usersession'){
	        	if ($this->session->userdata('user_admin')['mcssl'] == '1') {
	        		$mail['mcsmtp']	= 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
	        	}else{
	        		$mail['mcsmtp']	= $this->session->userdata('user_admin')['mcsmtp'];
	        	}
	        	$mail['mcuser']	= $this->session->userdata('user_admin')['mcuser'];
	        	$mail['mcpass']	= base64_decode($this->session->userdata('user_admin')['mcpass']);
	        	$mail['mcport']	= $this->session->userdata('user_admin')['mcport'];
	        }else{
	        	$arrayName1 = array('operatorname' => 'mailsystem' );
				$mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
				if ($mailSystem[0]['mcssl'] == '1') {
	        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
	        	}else{
	        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
	        	}
	        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
	        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
	        	$mail['mcport']	= $mailSystem[0]['mcport'];
	        }
        	$list_to 			= explode(',',$frm['to']);
	    	$subject		 	= html_entity_decode($frm['subject']);
	    	$mail['cc'] 		= $frm['cc'];
	    	$mail['bcc'] 		= $frm['bcc'];
        	$fileattach 		= $this->upload_files('public/document/',$_FILES['attach']);
        	if($fileattach == false){
        		if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
        			$fileattach = array();
        			$temp = json_decode($frm['preattach'],true);
        			for ($f=0; $f < count($temp); $f++) { 
        				array_push($fileattach, base_url().'public/document/'.$temp[$f]); 
        			}
        		}
        	}
        	$mail["attachment"] = $fileattach;

	    	$position 			= ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $id),''))[0]['position'];
	    	$j = 0;
    		foreach ($list_to as $key) {
	    		$user = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidateid[$j]),'');
	    		if (isset($user[0])) {
	    			$lastname 			= $user[0]['lastname'];
	    			$name 				= $user[0]['name'];
	    		}else{
	    			$lastname 			= 'Bạn';
	    			$name 				= 'Bạn';
	    		}
	    		$chuoi_tim 				= array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Vị trí]');
	    		$chuoi_thay_the 		= array($name,$roundname_old,$lastname,$position);
	    		$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, $subject);
	    		$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, $body);
	    		// var_dump($mail['emailbody'] );exit;
	    		$mail['toemail'] 		= $key;
	    		$this->Mail_model->sendMail($mail);

	    		$mail1['fromemail'] 		= $mail['mcuser'];
	    		$mail1['toemail'] 			= $key;
				$mail1['cc'] 				= $mail['cc'];
				$mail1['bcc'] 				= $mail['bcc'];
				$mail1['emailbody'] 		= $mail['emailbody'];
				$mail1['emailsubject'] 		= $mail['emailsubject'];
				$mail1["attachment"] 		= json_encode($fileattach);
				$mail1['createdby'] 		= $this->session->userdata('user_admin')['operatorid'];
				$this->Mail_model->insert('mailtable',$mail1);
				$j++;
	        }
        }
        echo json_encode($checkmail);
    }

    public function selectRound()
    {
    	$campaignid 	= $this->input->post('campaignid');
    	$match 			= array('campaignid' => $campaignid, );
		$round			=	$this->Campaign_model->select('roundid, roundname','recflow',$match,'');
		echo json_encode($round);
    }

    public function recruite()
    {
    	$frm 					= $this->input->post();
    	$check 					= $frm['check'];
    	unset($frm['check']);
    	foreach ($check as $key) {
    		$data['candidateid'] 	= $key;
    		$data['campaignid'] 	= $frm['campaignid'];
    		$data['roundid'] 		= $frm['roundid'];
    		$data['actiontype']  	= 'Recruite';
            $data['actionnote']  	= 'Tuyển dụng hồ sơ này';
            $data['createdby']   	= $this->session->userdata('user_admin')['operatorid'];
            $this->Data_model->insert('profilehistory',$data);
    	}
    	echo json_encode(1);
    }


    //tool
    

    public function pageAssessment($asmtid, $check = '1')
	{
		if ($asmtid != 0) {
			$sql = "SELECT tt.*, candidate.name, candidate.email FROM assessment tt  LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  WHERE tt.asmtid = $asmtid ";
			$result = $this->Campaign_model->select_sql($sql);
			$data['assessment'] = $result[0];
		}else{
			$data['assessment']['status'] = '';
		}
		$data['check'] = $check;
		$this->_data['temp'] = $this->load->view('admin/multiplechoice/pageAssessment',$data,true);

		$this->load->view('admin/home/master-iframe',$this->_data);	
	}


    public function saveAssessment()
    {
    	$frm 			= $this->input->post();
    	$data 			= array();
    	$campaignid 	= $frm['campaignid'];
    	$roundid 		= $frm['roundid'];
    	if (isset($frm['private'])) {
    		$data['private'] = $private; 
    		unset($frm['private']);
    	}
    	unset($frm['campaignid']);
    	unset($frm['roundid']);
    	$list_to 			= explode(',',$frm['to']);
    	$mail 				= array();
    	$subject		 	= html_entity_decode($frm['subject']);
    	$mail['cc'] 		= $frm['cc'];
    	$mail['bcc'] 		= $frm['bcc'];
    	$body 				= html_entity_decode($frm['body1']);

    	$fileattach = $this->upload_files('public/document/',$_FILES['attach']);
    	if($fileattach == false){
    		if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
    			$fileattach = array();
    			$temp = json_decode($frm['preattach'],true);
    			for ($f=0; $f < count($temp); $f++) { 
    				array_push($fileattach, base_url().'public/document/'.$temp[$f]); 
    			}
    		}
    	}
    	$mail["attachment"] = $fileattach;

    	unset($frm['to']);
    	unset($frm['subject']);
    	unset($frm['cc']);
    	unset($frm['bcc']);
    	unset($frm['body']);
    	$i =0;
    	$notes = array();
    	$asmt = array();
    	$candiate = array();
        foreach ($frm as $key ) {

        	if(is_array($key)){
        		$data['candidateid'] 	= $key[0];
	            $data['campaignid'] 	= $campaignid;
	            $data['roundid'] 		= $roundid;
	            $data['duedate']		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $key[2])));
	            $data['asmttemp']		= $key[1];
	            $data['createdby']   	= $this->session->userdata('user_admin')['operatorid'];
	            $asmt[$i] 				= $this->Data_model->insert('assessment',$data);

	            $candidate[$i]  = $key[0];
	            $notes[$i] = $key[3];
	            $asmtname[$i] 			= ($this->Campaign_model->select("asmtname",'asmtheader',array('asmttemp' => $key[1]),''))[0]['asmtname'];
        		$i++;
        	}            
        }
        //mail
        if($frm['presender'] == 'usersession'){
        	if ($this->session->userdata('user_admin')['mcssl'] == '1') {
        		$mail['mcsmtp']	= 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
        	}else{
        		$mail['mcsmtp']	= $this->session->userdata('user_admin')['mcsmtp'];
        	}
        	$mail['mcuser']	= $this->session->userdata('user_admin')['mcuser'];
        	$mail['mcpass']	= base64_decode($this->session->userdata('user_admin')['mcpass']);
        	$mail['mcport']	= $this->session->userdata('user_admin')['mcport'];
        }else{
        	$arrayName1 = array('operatorname' => 'mailsystem' );
			$mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
			if ($mailSystem[0]['mcssl'] == '1') {
        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
        	}else{
        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
        	}
        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
        	$mail['mcport']	= $mailSystem[0]['mcport'];
        }
        $j = 0;
        foreach ($list_to as $key) {
        	$roundname 		= ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
    		$position 		= ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
    		$user 			= $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidate[$j]),'');
    		if (isset($user[0])) {
    			$lastname 	= $user[0]['lastname'];
    			$name 		= $user[0]['name'];
    			$link 		= '<a href="'.base_url().'admin/multiplechoice/pageAssessment/'.$asmt[$j].'" >'.$asmtname[$j].' - '.$name.'</a>';
    		}else{
    			$lastname 	= 'Bạn';
    			$name 		= 'Bạn';
    			$link 		= '<a href="'.base_url().'admin/multiplechoice/pageAssessment/0/" >'.$asmtname[$j].' - '.$name.'</a>';
    		}
    		$chuoi_tim 		= array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu trắc nghiệm]','[Ghi chú]','[Vị trí]','[Tuyển dụng viên]');
    		$chuoi_thay_the = array($name,$roundname,$lastname,$link,$notes[$j],$position,$this->session->userdata('user_admin')['operatorname']);
    		$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, $subject);
    		$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, $body);
    		$mail['toemail'] 		= $key;
    		$this->Mail_model->sendMail($mail);

    		$mail1['fromemail'] 		= $mail['mcuser'];
    		$mail1['toemail'] 			= $key;
			$mail1['cc'] 				= $mail['cc'];
			$mail1['bcc'] 				= $mail['bcc'];
			$mail1['emailbody'] 		= $mail['emailbody'];
			$mail1['emailsubject'] 		= $mail['emailsubject'];
			$mail1["attachment"] 		= json_encode($fileattach);
			$mail1['createdby'] 		= $this->session->userdata('user_admin')['operatorid'];
			$this->Mail_model->insert('mailtable',$mail1);
    		$j++;
        }
        echo json_encode(1);
    }

    public function cancelAssessment()
    {
    	$frm 					= $this->input->post();
    	$match 					= array('asmtid' => $frm['asmtid']);
    	$assessment['status'] 	= 'D';
    	if (isset($frm['isshare'])) {
    		$assessment['isshare'] 		= $frm['isshare'];
    	}
        $assessment['updatedby']   		= $this->session->userdata('user_admin')['operatorid'];
        $assessment['lastupdate']     	= date('Y-m-d H:i:s');
        $this->Data_model->update('assessment',$match,$assessment);
        echo json_encode(1);
    }

    public function sendMail()
    {
    	$frm = $this->input->post();
    	$mail = array();
    	if (isset($frm['isshare'])) {
    		$mail['isshare'] = $frm['isshare']; 
    	}
    	$campaignid 	= $frm['campaignid'];
    	$roundid 		= $frm['roundid'];
    	if($campaignid != ''){
    		$roundname 		= ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
			$position 		= ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
    	}else{
    		$roundname 	= $position = '';
    	}

    	if($frm['presender'] == 'usersession'){
        	if ($this->session->userdata('user_admin')['mcssl'] == '1') {
        		$mail['mcsmtp']	= 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
        	}else{
        		$mail['mcsmtp']	= $this->session->userdata('user_admin')['mcsmtp'];
        	}
        	$mail['mcuser']	= $this->session->userdata('user_admin')['mcuser'];
        	$mail['mcpass']	= base64_decode($this->session->userdata('user_admin')['mcpass']);
        	$mail['mcport']	= $this->session->userdata('user_admin')['mcport'];
        }else{
        	$arrayName1 = array('operatorname' => 'mailsystem' );
			$mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
			if ($mailSystem[0]['mcssl'] == '1') {
        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
        	}else{
        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
        	}
        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
        	$mail['mcport']	= $mailSystem[0]['mcport'];
        }

    	$list_to = explode(',',$frm['to']);
    	$subject		 	= html_entity_decode($frm['subject']);
    	$mail['cc'] 		= $frm['cc'];
    	$mail['bcc'] 		= $frm['bcc'];
    	$body 				= html_entity_decode($frm['body7']);

    	$fileattach 		= $this->upload_files('public/document/',$_FILES['attach']);
    	if($fileattach == false){
    		if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
    			$fileattach = array();
    			$temp = json_decode($frm['preattach'],true);
    			for ($f=0; $f < count($temp); $f++) { 
    				array_push($fileattach, base_url().'public/document/'.$temp[$f]); 
    			}
    		}
    	}
    	$mail["attachment"] = $fileattach;
    	$candidateid = explode(',',$frm['candidateid']);
    	$j= 0;
    	foreach ($list_to as $key) {
			$user 			= $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidateid[$j]),'');
			if (isset($user[0])) {
				$lastname 	= $user[0]['lastname'];
				$name 		= $user[0]['name'];
			}else{
				$lastname 	= 'Bạn';
				$name 		= 'Bạn';
			}
			$chuoi_tim 				= array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Vị trí]');
			$chuoi_thay_the 		= array($name,$roundname,$lastname,$position);
			$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, $subject);
			$mail['emailbody'] 		= (str_replace($chuoi_tim,$chuoi_thay_the, $body));
			$mail['toemail'] 		= $key;
			$this->Mail_model->sendMail($mail);

			$mail1['fromemail'] 		= $mail['mcuser'];
			$mail1['toemail'] 			= $key;
			$mail1['cc'] 				= $mail['cc'];
			$mail1['bcc'] 				= $mail['bcc'];
			$mail1['emailbody'] 		= $mail['emailbody'];
			$mail1['emailsubject'] 		= $mail['emailsubject'];
			$mail1["attachment"] 		= json_encode($fileattach);
			$mail1['createdby'] 		= $this->session->userdata('user_admin')['operatorid'];
			$this->Mail_model->insert('mailtable',$mail1);
			$j++;
	    }
	    echo json_encode(1);
    }

    public function campaign_info_1($campaignid)
	{
		$match 						= array('a.campaignid'=>$campaignid);
		$data['campaign'] 			= $this->Data_model->select_row_option('a.*,',$match,'','reccampaign a','','','','','')[0];
		$this->data['script'] 		= $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->data['temp'] 		= $this->load->view('admin/campaign/campaign_info_1',$data,true);
		$this->load->view('admin/home/master-iframe',$this->data);
	}
	public function campaign_info_2($campaignid)
	{
		// $m_data['id'] 				= $campaignid;
		$m_data['hocvan'] 			= $this->Campaign_model->select("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $m_data['ngoaingu'] 		= $this->Campaign_model->select("language",'canlanguage',array('hidden' => 1),'language');
        $m_data['tinhoc'] 			= $this->Campaign_model->select("software",'cansoftware',array('hidden' => 1),'software');
        $m_data['profilesrc'] 		= $this->Campaign_model->select('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $m_data['tag']                 = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        $m_data['tagrandom']           = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'random'));
        $result  		 			= $this->Campaign_model->select("filterid",'filterprofile',array('campaignid' => $campaignid),'');
        if (isset($result[0])) {
        	$m_data['filterid'] 	= $result[0]['filterid'];
        	$m_data['detail'] 		= $this->Data_model->selectTable('filterdetail',array('filterid'=>$m_data['filterid']));
        }
		$this->data['script'] 		= $this->load->view('admin/script/script_campaign', $m_data, TRUE); 
		$this->data['temp'] 		= $this->load->view('admin/campaign/campaign_info_2',null,true);
		$this->load->view('admin/home/master-iframe',$this->data);
	}
	public function campaign_info_3($campaignid)
	{
		$m_data['campaignid'] 		= $campaignid;
		$manager 					= $this->Campaign_model->select("managecampaign",'reccampaign',array('campaignid' => $campaignid),'');
		$m_data['operator'] 		= $this->Campaign_model->select("operatorid,operatorname",'operator',array('status' => 'W','candidateid' => 0),'');
		if($manager[0]['managecampaign'] != ''){
			$m_data['manager'] 		= explode(',',$manager[0]['managecampaign']);
		}else{
			$m_data['manager'] 		= '';
		}
		
		$round  		 			= $this->Campaign_model->select("*",'recflow',array('campaignid' => $campaignid),'');
		for ($i=0; $i < count($round); $i++) { 
			$mana 				= trim($round[$i]['manageround'],',');
			$mana 				= explode(',', $mana);
			if ($mana[0] == '') {
				$round[$i]['manage'] = '';
			}else{
				$join[0]  		= array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
				foreach ($mana as $key =>$value) {
					$match 		= array('operatorid' => $value );
					$temp 		= $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
					if(isset($temp[0])){
						$round[$i]['manage'][$key] = $temp[0];
					}
					// $round[$i]['manage'][$key] =($this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join))[0];
				}
			}
		}
		$m_data['round']			= $round;
		$m_data['mailtemplate'] 	= $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0','status' =>'W'),'');
		$m_data['asmt_tn'] 			= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '2'),'');
		$m_data['asmt_pv'] 			= $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
		$this->data['script'] 		= $this->load->view('admin/script/script_campaign', $m_data, TRUE); 
		$this->data['temp'] 		= $this->load->view('admin/campaign/campaign_info_3',null,true);
		$this->load->view('admin/home/master-iframe',$this->data);
	}
	public function campaign_info_4($campaignid)
	{	
		$data['campaignid'] 		= $campaignid;
		$match 						= array('a.campaignid'=>$campaignid);
		$data['campaign'] 			= $this->Data_model->select_row_option('a.*,',$match,'','recartical a','','','','','')[0];
		$this->data['script'] 		= $this->load->view('admin/script/script_campaign', NULL, TRUE); 
		$this->data['temp'] 		= $this->load->view('admin/campaign/campaign_info_4',$data,true);
		$this->load->view('admin/home/master-iframe',$this->data);
	}

	public function updateRound1()
	{
		$frm 					= $this->input->post();
		$match 					= array('campaignid' => $frm['campaignid']);
		unset($frm['campaignid']);
		$frm['expdate'] 		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $frm['expdate'])));
		$frm['lastupdate'] 		= date('Y-m-d H:i:s');
		$this->Data_model->update('reccampaign',$match,$frm);
		echo json_encode(1);
	}
	function updateRound2()
    {
        $frm = $this->input->post();
        // var_dump($frm);exit;
        $filterid 					= $frm['filterid'];
        $detail['filterid'] 		= $filterid;
        unset($frm['filterid']);
        $this->Campaign_model->delete_row('filterdetail',array('filterid' => $filterid));
        foreach ($frm as $value) {
           if($value == '')
           {
                continue;
           }
           else
           {
                $data = explode ('/', $value);
                $detail['tablename'] 	= $data[0];
                $detail['fieldname']	= $data[1];
                $detail['datatype'] 	= $data[2];
                $detail['operator'] 	= $data[3];
                $detail['filterfrom'] 	= $data[4];
                $detail['filterto'] 	= $data[5];
                $abc1 = $this->Campaign_model->insert('filterdetail',$detail);

           }
        }
        
        echo json_encode($filterid);       
    }
	public function updateRound4()
	{
		$frm 					= $this->input->post();
		$match 					= array('campaignid' => $frm['campaignid']);
		unset($frm['campaignid']);
		$frm['expdate'] 		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $frm['expdate'])));
		
		$this->Data_model->update('recartical',$match,$frm);
		echo json_encode(1);
	}

	public function searchNameCampaign()
	{
		$name 					= $this->input->post('name');
		$type 					= $this->input->post('type');

		$from = '';
		$where = 'AND candidate.hidden = 1';
		$day = date('Y-m-d H:i:s');
		$operatorid = $this->sess['operatorid'];

		if ($type == 2) {
			$sql = "SELECT DISTINCT a.*
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere a.expdate < '$day' AND a.status = 'W'
					and (a.managecampaign like '%,$operatorid,%' or a.showtype = 'O' or a.showtype='I' or b.manageround like '%,$operatorid,%')
					and lower(a.position) like lower(N'%$name%')
				order by a.createddate DESC";
			$data['campaigns_end'] = $this->M_data->select_sql($sql);

			for ($i=0; $i < count($data['campaigns_end']); $i++) { 
				$match = array('campaignid' => $data['campaigns_end'][$i]['campaignid'] );
				$data['campaigns_end'][$i]['round'] =	$this->Campaign_model->select("roundid,sorting,roundname,roundtype",'recflow',$match,'');

				$data['campaigns_end'][$i]['round'][0]['count_round'] = $this->Candidate_model->count_round_hs($from,$where,$data['campaigns_end'][$i]['campaignid'])[0]['count'];
				for ($j=1; $j < count($data['campaigns_end'][$i]['round']); $j++) { 
					$data['campaigns_end'][$i]['round'][$j]['count_round'] = $this->total_round($data['campaigns_end'][$i]['campaignid'],$data['campaigns_end'][$i]['round'][$j]['roundid'],'Transfer');
				}

				$data['campaigns_end'][$i]['manager'] = array();
				$mana = trim($data['campaigns_end'][$i]['managecampaign'],',');
				$mana = explode(',', $mana);
				$join[0]  = array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
				foreach ($mana as $key =>$value) {
					$match = array('operatorid' => $value );
					$temp = $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
					if (isset($temp[0])) {
						$data['campaigns_end'][$i]['manager'][$key] =$temp[0];
					}else{
						$data['campaigns_end'][$i]['manager'][$key] = '';
					}
					$cmpid = $data['campaigns_end'][$i]['campaignid'];
					$sql = "SELECT b.roundid, b.sorting
					from reccampaign a
					LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
					WHere a.expdate < '$day' 
					and b.campaignid = '$cmpid'
					and (a.managecampaign like '%,$operatorid,%' or b.manageround like '%,$operatorid,%')
					
					";
					$data['campaigns_end'][$i]['roundlist'] = $this->M_data->select_sql($sql);
				}
			}
			echo json_encode($data['campaigns_end']);
		}else{
			$sql = "SELECT DISTINCT a.*
				from reccampaign a
				LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
				WHere a.expdate >= '$day' AND a.status = 'W'
				and (a.managecampaign like '%,$operatorid,%' or a.showtype = 'O' or a.showtype='I' or b.manageround like '%,$operatorid,%') 
				and lower(a.position) like lower(N'%$name%')
				order by a.createddate DESC";
			$data['campaigns_active'] = $this->M_data->select_sql($sql);
			
			for ($i=0; $i < count($data['campaigns_active']); $i++) { 
				$match = array('campaignid' => $data['campaigns_active'][$i]['campaignid'] );
				$data['campaigns_active'][$i]['round'] =	$this->Campaign_model->select("roundid,sorting,roundname,roundtype",'recflow',$match,'');

				$data['campaigns_active'][$i]['round'][0]['count_round'] = $this->Candidate_model->count_round_hs($from,$where,$data['campaigns_active'][$i]['campaignid'])[0]['count'];
				for ($j=1; $j < count($data['campaigns_active'][$i]['round']); $j++) { 
					$data['campaigns_active'][$i]['round'][$j]['count_round'] = $this->total_round($data['campaigns_active'][$i]['campaignid'],$data['campaigns_active'][$i]['round'][$j]['roundid'],'Transfer');
				}

				$data['campaigns_active'][$i]['manager'] = array();
				$mana = trim($data['campaigns_active'][$i]['managecampaign'],',');
				$mana = explode(',', $mana);
				$join[0]  = array('table' => 'document', 'match' => "operator.operatorid = document.referencekey AND document.tablename = 'operator' " );
				foreach ($mana as $key =>$value) {
					$match = array('operatorid' => $value );
					$temp = $this->Data_model->select_join("operator.operatorid,operator.operatorname,document.filename",$match,'operator',$join);
					if (isset($temp[0])) {
						$data['campaigns_active'][$i]['manager'][$key] =$temp[0];
					}else{
						$data['campaigns_active'][$i]['manager'][$key] = '';
					}
				}
				$cmpid = $data['campaigns_active'][$i]['campaignid'];
				$sql = "SELECT b.roundid, b.sorting
					from reccampaign a
					LEFT OUTER JOIN recflow b ON a.campaignid = b.campaignid
					WHere a.expdate >= '$day' 
					and b.campaignid = '$cmpid'
					and (a.managecampaign like '%,$operatorid,%' or b.manageround like '%,$operatorid,%')
					
					";
				$data['campaigns_active'][$i]['roundlist'] = $this->M_data->select_sql($sql);
			}
			echo json_encode($data['campaigns_active']);
		}
		
	}
}
?>