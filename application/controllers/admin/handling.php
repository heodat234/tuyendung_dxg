<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {

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
		$this->load->model(array('admin/Candidate_model','admin/total_model','admin/Data_model','admin/Campaign_model','M_auth'));
		$ac_data['hoso'] = 'active';

        $o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0','status' => 'W'),'');
        $o_data['operator']     = $this->Campaign_model->select("operatorid,operatorname,email",'operator',array('hidden' => 1),'');
        $o_data['asmt_pv']      = $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
        // echo "<pre>";
        // print_r($o_data);
        // echo "</pre>"; exit;
        $this->data['modal_campaign']      = $this->load->view('admin/campaign/modal_campaign',$o_data,true);
		$this->data['header']              = $this->load->view('admin/home/header',null,true);
	    $this->data['menu']                = $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer']              = $this->load->view('admin/home/footer',null,true);

        $this->seg = 7;
        $this->sess  = $this->session->userdata('user_admin');  
        $this->day       = date('Y-m-d H:i:s');
	}
    public function refresh()
    {
        session_destroy();
        redirect(base_url('login.html'));
    }
    
	public function index($quaylai = '')
	{
		
		if($quaylai == '')
		{
			$where = 'AND candidate.hidden = 1 AND candidate.mergewith = 0';
			$this->session->set_userdata('filter', $where);
		}
		$where        = $this->session->userdata('filter');

        $temp0         = $this->session->userdata('filterRecruit');
        $where        = isset($temp0)? $where.' '.$temp0 : $where;
		$join         = '';
		$join         = $this->session->userdata('join');
		$frm          = array();
		$frm          = $this->session->userdata('frm');
        $temp         = $this->session->userdata('order');
        $order        = isset($temp)? $temp : "candidate.lastupdate desc";
        $checkTrung        = $this->session->userdata('checkTrung');
        $this->data2['checkTrung']            = isset($checkTrung)? $checkTrung : 0;

        $checkRecruit = -1;
        $checkRecruit          = $this->session->userdata('checkRecruit');


        $this->data2['checkRecruit']        = $checkRecruit;
		$this->data2['checknemu']           = $frm;
        $this->data2['total_candidate']     = $this->Candidate_model->count_filter($join,$where);
        $this->data2['profilesrc']          = $this->total_model->select_rows('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $this->data2['hocvan']              = $this->total_model->select_rows("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $this->data2['ngoaingu']            = $this->total_model->select_rows("language",'canlanguage',array('hidden' => 1),'language');
        $this->data2['tinhoc']              = $this->total_model->select_rows("software",'cansoftware',array('hidden' => 1),'software');
        $this->data2['filter']              = $this->Data_model->selectTable('filterprofile', array('campaignid' => 0));  
		$this->data2['city']                = $this->total_model->selectall('city');
		$this->data2['tag']                 = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        $this->data2['tagrandom']           = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'random'));

        $config['total_rows']           = $this->Candidate_model->count_filter($join,$where);
        $config['base_url']             = base_url()."admin/handling/index/";
        $config['per_page']             = 100;
        $config['next_link']            = "Sau";
        $config['prev_link']            = "Trước";
        $config['first_link']           = "Đầu";
        $config['last_link']            = "Cuối";
        $config['num_links']            = 3;
        $config['use_page_numbers']     = TRUE;
        $start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $data1['pages']                 = $start;
        $start = ($start-1)*$config['per_page'];
        $this->load->library('pagination', $config);
        $data1['phantrang']             =  $this->pagination->create_links();

        if (isset($checkTrung) && $checkTrung == '1'){
            $data1['candidate']             = $this->Candidate_model->list_trung($join,$where,$start,$config['per_page'],$order); 
        }else{
            $data1['candidate']             = $this->Candidate_model->list_filter($join,$where,$start,$config['per_page'],$order); 
        }
        $data1['total_candidate']       = $config['total_rows'];
        $data1['nav']                   = $this->load->view('admin/page/nav',$this->data2,true);
        // echo "<pre>";
        // print_r($this->data2);
        // echo "</pre>"; exit;
        if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
            $this->data['temp']     = $this->load->view('admin/error/404',null,true);
        }else{
            $this->data['temp'] = $this->load->view('admin/page/content',$data1,true);
        }
		// $this->data['temp'] = $this->load->view('admin/page/test',null,true);
		$this->load->view('admin/home/master',$this->data);
	}
	public function profile($id = '',$start = '1',$tabActive = '1')
	{

		$where = $this->session->userdata('filter');
        $temp0         = $this->session->userdata('filterRecruit');
        $where        = isset($temp0)? $where.' '.$temp0 : $where;
		$join = '';
        $join = $this->session->userdata('join');
        $order        = $this->session->userdata('order');
        $checkTrung        = $this->session->userdata('checkTrung');
        if ($order == NULL) {
            $order        = "candidate.lastupdate desc";
        }
        $config['total_rows']           = $this->Candidate_model->count_filter($join,$where);
        $config['base_url']             = base_url()."admin/handling/profile/$id/";
        $config['per_page']             = 100;
        $config['next_link']            = "Sau";
        $config['prev_link']            = "Trước";
        $config['first_link']           = "Đầu";
        $config['last_link']            = "Cuối";
        $config['num_links']            = 3;
        $config['use_page_numbers']     = TRUE;
        // $start = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        $start = ($start-1)*$config['per_page'];
        $this->load->library('pagination', $config);
        $data2['phantrang']             =  $this->pagination->create_links();
		
        $data2['id_active']             = $id;

        $data2['checkTrung']            = $checkTrung;
        if ($checkTrung == '1') {
            $data2['candidate']             = $this->Candidate_model->list_trung($join,$where,$start,$config['per_page'],$order);  
        }else{
            $data2['candidate']             = $this->Candidate_model->list_filter($join,$where,$start,$config['per_page'],$order);
        }
        $data2['total_rows']            = $config['total_rows'];
		$this->data1['nav']               = $this->load->view('admin/page/nav-profile',$data2,true);
		$this->data1['id']                = $id;
        $this->data1['tabActive']         = $tabActive;

		$this->data['temp']       = $this->load->view('admin/page/profile',$this->data1,true);
		$this->load->view('admin/home/master',$this->data);
	}

	public function hosochitiet($id = '', $tabActive = '1')
	{
        $sql                = "SELECT email,profilesrc FROM candidate WHERE candidateid = $id";
        $result             = ($this->Campaign_model->select_sql($sql))[0];
        $mail               = $result['email'];
        $profilesrc         = $result['profilesrc'];
        
        $join[0]    = array('table'=> 'operator','match' =>'tb.createdby = operator.operatorid');
        $join[1]    = array('table'=> 'document','match' =>'tb.createdby = document.referencekey');
        $orderby    = array('colname'=>'tb.createddate','typesort'=>'desc');
        $sql                = "SELECT tb.*, operator.operatorname, document.filename FROM cancomment tb LEFT JOIN operator ON tb.createdby = operator.operatorid LEFT JOIN document ON tb.createdby = document.referencekey AND document.tablename = 'operator'  WHERE tb.candidateid = $id ORDER BY tb.createddate DESC";
        $history_cmt        = $this->Campaign_model->select_sql($sql);
        $sql                = "SELECT tb.*, operator.operatorname, document.filename FROM profilehistory tb LEFT JOIN operator ON tb.createdby = operator.operatorid LEFT JOIN document ON tb.createdby = document.referencekey AND document.tablename = 'operator'  WHERE tb.candidateid = $id ORDER BY tb.createddate DESC";
        $history_profile        = $this->Campaign_model->select_sql($sql);
        //mail
        if ($mail != '') {
            $history_profile1   = $this->Data_model->select_row_option('tb.emailsubject,tb.mailid, tb.createddate, tb.isshare, operator.operatorname, document.filename,document.subject',array('tb.toemail'=>$mail),'','mailtable tb',$join,'',$orderby,'','');

            $this->data2['history'] = array_merge($history_cmt, $history_profile, $history_profile1);
        }else{
            $this->data2['history'] = array_merge($history_cmt, $history_profile);
        }
        // var_dump($history_profile1);exit;
        function cmp($a, $b) {
            if ($a['createddate'] == $b['createddate']) {
                return 0;
            }
            return ($a['createddate'] < $b['createddate']) ? 1 : -1;
        }
        uasort($this->data2['history'], 'cmp');
        
        if($profilesrc == 'Nội bộ'|| $profilesrc == 'Web Admin'){
            $this->data2['candidate_noibo']     = $this->Candidate_model->first_row('candidate',array('candidateid' => $id, ),'','');
            $id                                 = -1;
        }else{
            $this->data2['candidate_noibo']     = $this->Candidate_model->first_row('candidate',array('mergewith' => $id, ),'','');
        }
        $this->data2['city']        = $this->total_model->selectall('city');
        $this->data2['document']    = $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','lastupdate');
		$this->data2['address']       = $this->Candidate_model->selectTableByIds('canaddress',$id);
		$this->data2['candidate']     = $this->Candidate_model->selectTableById('candidate',$id);
		$this->data2['family']        = $this->Candidate_model->selectTableByIds('cansocial',$id);
		$this->data2['experience']    = $this->Candidate_model->selectTableByIds('canexperience',$id);
        $vt                           = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id,'dateto');
        $this->data2['vt']            = $vt['position'].' - '.$vt['company'];
		$this->data2['reference']     = $this->Candidate_model->selectTableByIds('canreference',$id);
		$this->data2['knowledge']     = $this->Candidate_model->selectTableByIds('canknowledge',$id);
		$this->data2['language']      = $this->Candidate_model->selectTableByIds('canlanguage',$id);
		$this->data2['software']      = $this->Candidate_model->selectTableByIds('cansoftware',$id);
        $this->data2['tags']          = $this->Candidate_model->join_tag($id);
        $a = array();
        $_jsoncity = $this->Candidate_model->select_sugg_tag('tagprofile.title',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        foreach ($_jsoncity as $key) {
            array_push($a, $key['title']);
        }
        $this->data2['ss_tags'] = $a;
        $roww = $this->Candidate_model->query_sql("select COUNT(DISTINCT campaignid) as slchiendich from profilehistory where candidateid = '".$id."'");
        $this->data2['count_campaign'] = $roww[0]['slchiendich'];
        $sql = "SELECT count(recordid) as count FROM profilehistory WHERE candidateid = '$id' AND actiontype = 'Recruite'";
        $this->data2['recruite']      = $this->Campaign_model->select_sql($sql)[0]['count'];
        //ngay cap nhat
        $sql0 = "SELECT DISTINCT a.lastupdate as a, b.lastupdate as b, c.lastupdate as c, d.lastupdate as d, f.lastupdate as f, g.lastupdate as g, h.lastupdate as h, j.lastupdate as j,e.lastupdate as e 
                FROM candidate a 
                Left JOIN (SELECT top 1 * FROM canaddress WHERE candidateid = $id ORDER BY lastupdate DESC) b ON a.candidateid = b.candidateid 
                Left JOIN (SELECT top 1 * FROM canexperience WHERE candidateid = $id ORDER BY lastupdate DESC) c ON a.candidateid = c.candidateid 
                Left JOIN (SELECT top 1 * FROM canknowledge WHERE candidateid = $id ORDER BY lastupdate DESC) d ON a.candidateid = d.candidateid 
                Left JOIN cansocial e ON a.candidateid = e.candidateid 
                Left JOIN (SELECT top 1 * FROM canlanguage WHERE candidateid = $id ORDER BY lastupdate DESC) f ON a.candidateid = f.candidateid 
                Left JOIN (SELECT top 1 * FROM cansoftware WHERE candidateid = $id ORDER BY lastupdate DESC) g ON a.candidateid = g.candidateid 
                Left JOIN (SELECT top 1 * FROM canreference WHERE candidateid = $id ORDER BY lastupdate DESC) h ON a.candidateid = h.candidateid 
                Left JOIN (SELECT top 1 * FROM document WHERE referencekey = $id ORDER BY lastupdate DESC) j ON a.candidateid = j.referencekey AND j.tablename = 'candidate'  
                WHERE a.candidateid = $id ORDER BY j.lastupdate DESC";
        $this->data2['lastupdate']      = $this->Campaign_model->select_sql($sql0);
        if (isset($this->data2['lastupdate'][0])) {
            rsort($this->data2['lastupdate'][0]);
        }else{
            $this->data2['lastupdate'][0][0]      = '';
        }
        // noi bo
            $id_mergewith                       = $this->data2['candidate_noibo']['candidateid'];
            $this->data2['canaddress_noibo']    = $this->Candidate_model->selectTableByIds('canaddress',$id_mergewith);
            $this->data2['family_noibo']        = $this->Candidate_model->selectTableByIds('cansocial',$id_mergewith);
            $this->data2['experience_noibo']    = $this->Candidate_model->selectTableByIds('canexperience',$id_mergewith);
            $this->data2['reference_noibo']     = $this->Candidate_model->selectTableByIds('canreference',$id_mergewith);
            $this->data2['knowledge_noibo']     = $this->Candidate_model->selectTableByIds('canknowledge',$id_mergewith);
            $this->data2['language_noibo']      = $this->Candidate_model->selectTableByIds('canlanguage',$id_mergewith);
            $this->data2['software_noibo']      = $this->Candidate_model->selectTableByIds('cansoftware',$id_mergewith);
            $this->data2['document_noibo']      = $this->Candidate_model->first_row('document',array('referencekey'=>$id_mergewith,'tablename' => 'candidate','subject' => 'File CV'),'filename,url','lastupdate');
            $vt1                                = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id_mergewith,'dateto');
            $this->data2['tags_noibo']          = $this->Candidate_model->join_tag($id_mergewith);
            $this->data2['tagstrandom_noibo']   = $this->Candidate_model->join_tag_random($id_mergewith);
            $this->data2['vt_noibo']            = $vt1['position'].' - '.$vt1['company'];
            // var_dump($this->data2['document_noibo']);exit;
            if ($id_mergewith != Null) {
                $sql0 = "SELECT DISTINCT a.lastupdate as a, b.lastupdate as b, c.lastupdate as c, d.lastupdate as d, f.lastupdate as f, g.lastupdate as g, h.lastupdate as h, j.lastupdate as j,e.lastupdate as e 
                FROM candidate a 
                Left JOIN (SELECT top 1 * FROM canaddress WHERE candidateid = $id_mergewith ORDER BY lastupdate DESC) b ON a.candidateid = b.candidateid 
                Left JOIN (SELECT top 1 * FROM canexperience WHERE candidateid = $id_mergewith ORDER BY lastupdate DESC) c ON a.candidateid = c.candidateid 
                Left JOIN (SELECT top 1 * FROM canknowledge WHERE candidateid = $id_mergewith ORDER BY lastupdate DESC) d ON a.candidateid = d.candidateid 
                Left JOIN cansocial e ON a.candidateid = e.candidateid 
                Left JOIN (SELECT top 1 * FROM canlanguage WHERE candidateid = $id_mergewith ORDER BY lastupdate DESC) f ON a.candidateid = f.candidateid 
                Left JOIN (SELECT top 1 * FROM cansoftware WHERE candidateid = $id_mergewith ORDER BY lastupdate DESC) g ON a.candidateid = g.candidateid 
                Left JOIN (SELECT top 1 * FROM canreference WHERE candidateid = $id_mergewith ORDER BY lastupdate DESC) h ON a.candidateid = h.candidateid 
                Left JOIN (SELECT top 1 * FROM document WHERE referencekey = $id_mergewith ORDER BY lastupdate DESC) j ON a.candidateid = j.referencekey AND j.tablename = 'candidate'  
                WHERE a.candidateid = $id_mergewith ORDER BY j.lastupdate DESC";
                $this->data2['lastupdate_noibo']      = $this->Campaign_model->select_sql($sql0);
                rsort($this->data2['lastupdate_noibo'][0]);
                // var_dump($this->data2['lastupdate_noibo']);exit;
                
            }else{
                $this->data2['lastupdate_noibo'][0][0]      = '';
            }

        //hồ sơ con khác
        if ($id == -1) {
           $id = $id_mergewith;
        }
        $this->data2['candidate_con']     = $this->Campaign_model->select_sql("SELECT * FROM candidate WHERE mergewith = $id AND candidateid NOT IN ($id)");
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

            if ($id_con != Null) {
                $sql0 = "SELECT DISTINCT a.lastupdate as a, b.lastupdate as b, c.lastupdate as c, d.lastupdate as d, f.lastupdate as f, g.lastupdate as g, h.lastupdate as h, j.lastupdate as j,e.lastupdate as e 
                FROM candidate a 
                Left JOIN (SELECT top 1 * FROM canaddress WHERE candidateid = $id_con ORDER BY lastupdate DESC) b ON a.candidateid = b.candidateid 
                Left JOIN (SELECT top 1 * FROM canexperience WHERE candidateid = $id_con ORDER BY lastupdate DESC) c ON a.candidateid = c.candidateid 
                Left JOIN (SELECT top 1 * FROM canknowledge WHERE candidateid = $id_con ORDER BY lastupdate DESC) d ON a.candidateid = d.candidateid 
                Left JOIN cansocial e ON a.candidateid = e.candidateid 
                Left JOIN (SELECT top 1 * FROM canlanguage WHERE candidateid = $id_con ORDER BY lastupdate DESC) f ON a.candidateid = f.candidateid 
                Left JOIN (SELECT top 1 * FROM cansoftware WHERE candidateid = $id_con ORDER BY lastupdate DESC) g ON a.candidateid = g.candidateid 
                Left JOIN (SELECT top 1 * FROM canreference WHERE candidateid = $id_con ORDER BY lastupdate DESC) h ON a.candidateid = h.candidateid 
                Left JOIN (SELECT top 1 * FROM document WHERE referencekey = $id_con ORDER BY lastupdate DESC) j ON a.candidateid = j.referencekey AND j.tablename = 'candidate'  
                WHERE a.candidateid = $id_mergewith ORDER BY j.lastupdate DESC";
                $this->data2['lastupdate_con'][$key]      = $this->Campaign_model->select_sql($sql0);
                rsort($this->data2['lastupdate_con'][$key][0]);
                
            }else{
                $this->data2['lastupdate_con'][$key][0][0]      = '';
            }
        }
        // var_dump($this->data2['canaddress_con']);exit;


        $data4['comment1']       = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
        $data4['comment2']       = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id_mergewith, 'rate !=' => 0),'AVG(rate) AS scores','');
        if(($data4['comment1']['scores'] != NULL) && ($data4['comment2']['scores'] == NULL))
        {
            $this->data2['comment'] = $data4['comment1'];
        }
        else if(($data4['comment1']['scores'] == NULL) && ($data4['comment2']['scores'] != NULL))
        {
            $this->data2['comment'] = $data4['comment2'];
        }
        else if(($data4['comment1']['scores'] != NULL) && ($data4['comment2']['scores'] != NULL))
        {
            $this->data2['comment']['scores'] = ($data4['comment2']['scores'] + $data4['comment1']['scores'])/2;
        }
        else
        {
            $this->data2['comment']['scores'] = 0;
        }
        
        $this->data2['tabActive'] = $tabActive;
		$data['temp'] = $this->load->view('admin/page/detail_profile',$this->data2,true);
		$this->load->view('admin/home/master-profile',$data);
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
    public function filter_candidate()
    {
    	$frm = $this->input->post('value');
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
        if($frm['tag'] != '')
        {
            $arr = explode('/', $frm['tag']);
            $st = "(";
            for ($i = 0; $i < count($arr)-1; $i++) {
                $st .= " tag_a.tagid = '".$arr[$i]."'";
                if($i != count($arr) -2)
                {
                    $st .= " OR";
                }  
            }
            $where[] = $st.")";
            $where[] = "tag_a.tablename = 'candidate' AND tag_a.categoryid = 'position'";
            $join[] = 'LEFT JOIN tagtransaction tag_a ON candidate.candidateid = tag_a.recordid';
        }
        if($frm['tagrandom'] != '')
        {
            $arr = explode('/', $frm['tagrandom']);
            $st = "(";
            for ($i = 0; $i < count($arr)-1; $i++) {
                $st .= " tag_b.tagid = '".$arr[$i]."'";
                if($i != count($arr) -2)
                {
                    $st .= " OR";
                }  
            }
            $where[] = $st.")";
            $where[] = "tag_b.tablename = 'candidate' AND tag_b.categoryid = 'random'";
            // if($frm['tag'] == '')
            // {
                $join[] = 'LEFT JOIN tagtransaction tag_b ON candidate.candidateid = tag_b.recordid';
            // }
        }

        if(($frm['talentfrom'] != '') || ($frm['talentto'] != ''))
        {
            if($frm['talentfrom'] != '' ){ 
                $where[] = "candidate.istalent >= '".$frm['talentfrom']."'";
            }
            if($frm['talentto'] != ''){ 
                $where[] = "candidate.istalent <= '".$frm['talentto']."'";
            }

        }
        if(($frm['updatefrom'] != '') || ($frm['updateto'] != ''))
        {
            $frm['updatefrom'] = date('Y-m-d',strtotime($frm['updatefrom']));
            $frm['updateto'] = date('Y-m-d',strtotime($frm['updateto']));
            $join[] = "Left JOIN canaddress b ON candidate.candidateid = b.candidateid 
                        Left JOIN canexperience c ON candidate.candidateid = c.candidateid 
                        Left JOIN canknowledge d ON candidate.candidateid = d.candidateid 
                        Left JOIN cansocial e ON candidate.candidateid = e.candidateid 
                        Left JOIN canlanguage f ON candidate.candidateid = f.candidateid 
                        Left JOIN cansoftware g ON candidate.candidateid = g.candidateid 
                        Left JOIN canreference h ON candidate.candidateid = h.candidateid 
                        Left JOIN document j ON candidate.candidateid = j.referencekey AND j.tablename = 'candidate' ";
            if($frm['updatefrom'] != '' && $frm['updateto'] != ''){ 
                $where[] = "((candidate.lastupdate >= '".$frm['updatefrom']."' AND candidate.lastupdate <= '".$frm['updateto']."') 
                    OR (b.lastupdate >= '".$frm['updatefrom']."' AND b.lastupdate <= '".$frm['updateto']."')
                    OR (c.lastupdate >= '".$frm['updatefrom']."' AND c.lastupdate <= '".$frm['updateto']."')
                    OR (d.lastupdate >= '".$frm['updatefrom']."' AND d.lastupdate <= '".$frm['updateto']."')
                    OR (e.lastupdate >= '".$frm['updatefrom']."' AND e.lastupdate <= '".$frm['updateto']."')
                    OR (f.lastupdate >= '".$frm['updatefrom']."' AND f.lastupdate <= '".$frm['updateto']."')
                    OR (g.lastupdate >= '".$frm['updatefrom']."' AND g.lastupdate <= '".$frm['updateto']."')
                    OR (h.lastupdate >= '".$frm['updatefrom']."' AND h.lastupdate <= '".$frm['updateto']."')
                    OR (j.lastupdate >= '".$frm['updatefrom']."' AND j.lastupdate <= '".$frm['updateto']."'))";
            }
            else if($frm['updatefrom'] != '' && $frm['updateto'] == ''){ 
                $where[] = "((candidate.lastupdate >= '".$frm['updatefrom']."') 
                    OR (b.lastupdate >= '".$frm['updatefrom']."')
                    OR (c.lastupdate >= '".$frm['updatefrom']."' )
                    OR (d.lastupdate >= '".$frm['updatefrom']."' )
                    OR (e.lastupdate >= '".$frm['updatefrom']."' )
                    OR (f.lastupdate >= '".$frm['updatefrom']."' )
                    OR (g.lastupdate >= '".$frm['updatefrom']."' )
                    OR (h.lastupdate >= '".$frm['updatefrom']."' )
                    OR (j.lastupdate >= '".$frm['updatefrom']."' ))";
            }
            else if($frm['updatefrom'] == '' && $frm['updateto'] != ''){ 
                $where[] = "((candidate.lastupdate <= '".$frm['updateto']."') 
                    OR (b.lastupdate <= '".$frm['updateto']."')
                    OR (c.lastupdate <= '".$frm['updateto']."' )
                    OR (d.lastupdate <= '".$frm['updateto']."' )
                    OR (e.lastupdate <= '".$frm['updateto']."' )
                    OR (f.lastupdate <= '".$frm['updateto']."' )
                    OR (g.lastupdate <= '".$frm['updateto']."' )
                    OR (h.lastupdate <= '".$frm['updateto']."' )
                    OR (j.lastupdate <= '".$frm['updateto']."' ))";
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
        $order = "candidate.lastupdate desc";
        switch(trim($frm['sort']))
        {
          case "Tiềm năng": {
              $order = "candidate.istalent desc";
              break; }
          // case "Kinh nghiệm": {
          //     $('#chonsx').html('Kinh nghiệm <span class="glyphicon glyphicon-chevron-down"></span>');
          //     break; }
          // case "Điểm": {
          //     $order = "cancomment.rate desc";
          //     break; }
          case "Tuổi": {
              $order = "candidate.dateofbirth desc";
              break; }
          // case "Bằng cấp": {
          //     $('#chonsx').html('Bằng cấp <span class="glyphicon glyphicon-chevron-down"></span>');
          //     break; }
          case "Ngày cập nhật": {
              $order = "candidate.lastupdate desc";
              break; }
        }

        $check_all = $this->input->post('check_all');
        if ($check_all != 'on') {
            
            $where_before        = $this->session->userdata('filterRecruit');
        }else if($check_all == 'on'){
            $where_before        = ' ';
        }
        
        if(count($where) > 0)
        {
            $condition = 'AND '.implode('AND ', $where);
            $condition = $condition.' '.$where_before;
        } else { $condition = $where_before;}
        if(count($join) > 0)
        {
            $jointable = implode(' ', $join);
        } else { $jointable = '';}

        $this->session->set_userdata('filter', $condition);
        $this->session->set_userdata('join', $jointable);
        $this->session->set_userdata('order', $order);
        $this->session->set_userdata('frm', $frm);
        $this->session->set_userdata('checkRecruit', -1);
        
        $config['total_rows']           = $this->Candidate_model->count_filter($jointable,$condition);
        $config['base_url']             = base_url()."admin/handling/index/";
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

        $data1 = $this->Candidate_model->list_filter($jointable,$condition,$start,$config['per_page'],$order); 
		for($i = 0 ; $i < count($data1); $i++)
		{
			$data1[$i]['dateofbirth2'] = getAge($data1[$i]['dateofbirth']);
			$data1[$i]['kinhnghiem'] = ""; 
			if($data1[$i]['yearexperirence'] != null){    
                                $data1[$i]['kinhnghiem'] = ($data1[$i]['yearexperirence'] == 0)? "kinh nghiệm dưới 1 năm, " : $data1[$i]['yearexperirence']." năm kinh nghiệm, ";
                            }
            $data1[$i]['thunhap']   =  ($data1[$i]['desirebenefit'] == 0)? "" : number_format($data1[$i]['desirebenefit'])." VND, ";
              
		}
        $data1['total_rows']        = $config['total_rows'];
        $data1['phantrang']         =  '<div id="jquery_link" align="center" style="height:50px">'.$this->pagination->create_links().'</div>';
		echo json_encode($data1);
    }
    
     function toInt($str)
    {
        return (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $str));
    }
    function savefilter()
    {
        $frm = $this->input->post();
        $name['filtername'] = $frm['filter'];
        $name['share'] = $frm['share'];
        $name['fromclause'] = $this->session->userdata('join');
        $name['whereclause'] = $this->session->userdata('filter');
        $name['createdby'] = $this->session->userdata('user_admin')['operatorid'];
        $name['updatedby'] = $this->session->userdata('user_admin')['operatorid'];
        $abc = $this->total_model->InsertData('filterprofile',$name);
        if($abc['code'] == 0) $detail['filterid'] = $abc['message'];
        else var_dump($abc);
        unset($frm['share']);
        unset($frm['filter']);
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
                $abc1 = $this->total_model->InsertData('filterdetail',$detail);
                if($abc1['code'] == 0) $id = $abc1['message'];
                else var_dump($abc1);

           }
        }
        $dreturn[0]['filterid'] = $detail['filterid'];
        $dreturn[0]['filtername'] = $name['filtername'];
        echo json_encode($dreturn);       
    }
    function loadfilter()
    {
        $frm = $this->input->post();
        $match = array( 'filterid' => $frm['filterid']);
        $data = $this->total_model->selectTableByIds('filterdetail',$match);
        echo json_encode($data);
    }
    function talent($talent = '')
    {   
        $frm = $this->input->post('check');
        foreach ($frm as $key ) {
           $this->Candidate_model->UpdateData('candidate',array('candidateid' => $key),array('istalent' => $talent));
           $data = array();
            $data['candidateid'] = $key;
            if ($talent == 0) {
                $data['actiontype']  = 'NotTalent';
                $data['actionnote']  = 'Đánh dấu hồ sơ không tiềm năng';
            }else{
                $data['actiontype']  = 'Talent';
                $data['actionnote']  = 'Đánh dấu hồ sơ tiềm năng '.$talent;
            }
           $data['createdby']   = $this->session->userdata('user_admin')['operatorid'];
           $this->Data_model->insert('profilehistory',$data);
        }
        echo json_encode($frm);
    }

    function block($block = '')
    {   
        $frm = $this->input->post('check');
        foreach ($frm as $key ) {
            $this->Candidate_model->UpdateData('candidate',array('candidateid' => $key),array('blocked' => $block));
            $data = array();
            $data['candidateid'] = $key;
            if ($block == 'Y') {
                $data['actiontype']  = 'Block';
                $data['actionnote']  = 'Đánh dấu chặn hồ sơ';
            }else{
                $data['actiontype']  = 'Trust';
                $data['actionnote']  = 'Đánh dấu hồ sơ tin cậy';
            }
           $data['createdby']   = $this->session->userdata('user_admin')['operatorid'];
           $this->Data_model->insert('profilehistory',$data);
        }
        echo json_encode($frm);
    }
    function searchname()
    {
        $frm = $this->input->post();
        $filter = $this->session->userdata('filter');
        $temp0         = $this->session->userdata('filterRecruit');
        $filter        = isset($temp0)? $filter.' '.$temp0 : $filter;
        
        $join = 'LEFT JOIN canknowledge a ON candidate.candidateid = a.candidateid 
                    LEFT JOIN cansoftware b ON candidate.candidateid = b.candidateid
                    LEFT JOIN canexperience c ON candidate.candidateid = c.candidateid
                    LEFT JOIN canreference d ON candidate.candidateid = d.candidateid
                    LEFT JOIN canlanguage e ON candidate.candidateid = e.candidateid ';  
        $where = "AND ((LOWER(candidate.name) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(candidate.email) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(a.certificate) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(b.software) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(c.company) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(c.position) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(d.name) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(d.position) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(d.company) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(e.language) LIKE LOWER(N'%".$frm['name']."%'))) $filter";
            // $this->session->set_userdata('filter', $where);
            // $this->session->set_userdata('join', $join);
        
        $config['total_rows']           = $this->Candidate_model->count_filter($join,$where);
        $config['base_url']             = base_url()."admin/handling/index/";
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

        $data1 = $this->Candidate_model->list_filter($join,$where,$start,$config['per_page'],"candidate.lastupdate desc");    
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

    function loc_hs_trung()
    {
        $check = $this->input->post('check');
        // $filter = $this->session->userdata('filter');
        // $temp0         = $this->session->userdata('filterRecruit');
        // $filter        = isset($temp0)? $filter.' '.$temp0 : $filter;
        $join = '';  

        $where = ($check == 'on')? "AND ((idcard IN (SELECT idcard FROM candidate WHERE mergewith = 0 GROUP BY idcard HAVING COUNT(idcard) > 1) AND idcard != '') OR (email IN (SELECT email FROM candidate WHERE mergewith = 0 GROUP BY email HAVING COUNT(email) > 1) AND email != '') )" : '';
        $this->session->set_userdata('filter', $where);
        if ($check == 'on') {
            $this->session->set_userdata('order', 'idcard desc, email desc');
            $this->session->set_userdata('checkTrung', '1');
        }else{
            $this->session->set_userdata('order', 'candidate.lastupdate desc');
            $this->session->set_userdata('checkTrung', '0');
        }
        
        $config['total_rows']           = $this->Candidate_model->count_filter($join,$where);
        $config['base_url']             = base_url()."admin/handling/index/";
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
        if ($check == 'on') {
            $data1 = $this->Candidate_model->list_trung($join,$where,$start,$config['per_page'],"idcard desc, email desc");  
        }else{
            $data1 = $this->Candidate_model->list_filter($join,'',$start,$config['per_page'],"candidate.lastupdate desc"); 
        }
        // $data1 = $this->Candidate_model->list_trung($join,$where,$start,$config['per_page'],"email desc");    
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

    function postcomment()
    {
        $frm = $this->input->post();
        $data['candidateid'] = $frm['idcan'];
        $data['type'] = $frm['typecmt'];
        $data['comments'] = $frm['contentcmt'];
        $data['createdby'] = $this->session->userdata('user_admin')['operatorid'];
        if($frm['scorescmt'] == '')
        $data['rate'] = 0;
        else $data['rate'] = $frm['scorescmt'];
        isset($frm['sharecmt'])? $data['isshare'] = 'Y' : $data['isshare'] = 'N' ;
        $data['hidden'] = 1;
        $this->Data_model->insert('cancomment',$data);
        redirect(base_url('admin/Handling/hosochitiet/'.$frm['idcan']));
    }
    function searchFilter()
    {
        $name = $this->input->post('name');
        $sql = "SELECT * FROM dbo.filterprofile WHERE filtername LIKE N'%".$name."%';";
        $value = $this->total_model->search_sql($sql);
        echo json_encode($value);
    }
    function filterRecruit($check=0)
    {
        if ($check == 0) {
            $where = "AND candidate.candidateid IN (SELECT candidateid from profilehistory where actiontype = 'Recruite') ";
        }else{
            $where = "AND candidate.candidateid NOT IN (SELECT candidateid from profilehistory where actiontype = 'Recruite') ";
        }
        $this->session->set_userdata('filterRecruit', $where);
        $this->session->set_userdata('checkRecruit', $check);
        $config['total_rows']           = $this->Candidate_model->count_filter('',$where);
        $config['base_url']             = base_url()."admin/handling/index/";
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
        $data1['phantrang']             =  '<div id="jquery_link" align="center" style="height:50px">'.$this->pagination->create_links().'</div>';
        echo json_encode($data1);
    }

    function new_profile($id='', $tabActive='1')
    {
        $this->data2['city'] = $this->total_model->selectall('city');
        if ($id != '') {
            $this->data2['document']    = $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','');
            $this->data2['comment']     = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
            $this->data2['address']     = $this->Candidate_model->selectTableByIds('canaddress',$id);
            $this->data2['candidate']   = $this->Candidate_model->list_filter('','AND candidate.candidateid = '.$id,0,1,'candidate.lastupdate desc')[0];
            $this->data2['can_detail']  = $this->Candidate_model->selectTableByIds('candidate',$id)[0];
            $this->data2['family']      = $this->Candidate_model->selectTableByIds('cansocial',$id);
            $this->data2['experience']  = $this->Candidate_model->selectTableByIds('canexperience',$id);
            $this->data2['reference']   = $this->Candidate_model->selectTableByIds('canreference',$id);
            $this->data2['knowledge']   = $this->Candidate_model->selectTableByIds('canknowledge',$id);
            $this->data2['language']    = $this->Candidate_model->selectTableByIds('canlanguage',$id);
            $this->data2['software']    = $this->Candidate_model->selectTableByIds('cansoftware',$id);
            $this->data2['tags']        = $this->Candidate_model->join_tag($id);
            $this->data2['tagstrandom'] = $this->Candidate_model->join_tag_random($id);
            // $this->data2['comment']       = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id_mergewith, 'rate !=' => 0),'AVG(rate) AS scores','');
            // $roww = $this->Candidate_model->query_sql("select COUNT(DISTINCT campaignid) as slchiendich from profilehistory where candidateid = '".$id."'");
            // $this->data2['count_campaign'] = $roww[0]['slchiendich'];
        }
        // $data['temp'] = $this->load->view('admin/page/detail-profile',$this->data2,true);
        $a = array();
        $_jsoncity = $this->Candidate_model->select_sugg_tag('tagprofile.title',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        foreach ($_jsoncity as $key) {
            array_push($a, $key['title']);
        }
        $this->data2['ss_tags'] = $a;
        $this->data2['tabActive'] = $tabActive;
        $data['temp'] = $this->load->view('admin/page/new_profile',$this->data2,true);
        $this->load->view('admin/home/master-profile',$data);
    }
    function insertCandidate()
    {
        $frm                = $this->input->post();
        $tag['tags']        = $frm['tags'];
        unset($frm['tags']);
        $tag['tagsrandom']  = $frm['tagsrandom'];
        unset($frm['tagsrandom']);
        $frm['name']        = $frm['firstname'].' '.$frm['lastname'];
        $frm['telephone']   = $frm['phone1'].','.$frm['phone2'];
        unset($frm['phone1']);
        unset($frm['phone2']);
        if ($frm['candidateid'] == '0') {
            unset($frm['candidateid']);
            $id = $this->Data_model->insert('candidate',$frm);
        }else{
            $id     = $frm['candidateid'];
            unset($frm['candidateid']);
            $match  = array('candidateid' => $id);
            $this->Data_model->update('candidate',$match,$frm);
        }
        $this->Candidate_model->delete_real('tagtransaction',array('tablename' => 'candidate', 'recordid' => $id));
        
        $arr_tags = explode(',', $tag['tags']);
        foreach ($arr_tags as $key => $value) {
            $row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
            if(!is_array($row['data']))
            {   
                if(trim($value) == "")
                {
                    continue;
                }
                $data1['title'] = trim($value);
                $data2['tagid'] = $this->Candidate_model->InsertData("tagprofile",$data1);
                $data2['tablename'] = "candidate";
                $data2['recordid'] = $id;
                $data2['categoryid'] = "position"; 
                $this->Candidate_model->InsertData("tagtransaction",$data2);
            }
            else
            {
                $data2['tagid'] = $row['data']['tagid'];
                $data2['tablename'] = "candidate";
                $data2['recordid'] = $id;
                $data2['categoryid'] = "position"; 
                $this->Candidate_model->InsertData("tagtransaction",$data2);
            }   
        }
        $arr_tags2 = explode(',', $tag['tagsrandom']);
        foreach ($arr_tags2 as $key => $value) {
            if(trim($value) == "")
            {
                continue;
            }
            $row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
            if(!is_array($row['data']))
            {   
                $data1['title'] = trim($value);
                $data2['tagid'] = $this->Candidate_model->InsertData("tagprofile",$data1);
                $data2['tablename'] = "candidate";
                $data2['recordid'] = $id;
                $data2['categoryid'] = "random"; 
                $this->Candidate_model->InsertData("tagtransaction",$data2);
            }
            else
            {
                $data2['tagid'] = $row['data']['tagid'];
                $data2['tablename'] = "candidate";
                $data2['recordid'] = $id;
                $data2['categoryid'] = "random"; 
                $this->Candidate_model->InsertData("tagtransaction",$data2);
            }   
        }
        if (!empty($_FILES['fileCV']['name'])) {
            $config['upload_path'] = './public/document/';
            $config['allowed_types'] = '*';
            $filename = preg_replace('([\s_&#%]+)', '-', $_FILES['fileCV']['name']);
            $config['file_name'] = $filename;
            $config['overwrite'] = FALSE;  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $data2 = array();
            if ($this->upload->do_upload('fileCV')) {
                $uploadData = $this->upload->data();
                $data3["tablename"] = 'candidate';
                $data3["referencekey"] = $id;
                $data3["filename"] = $filename;
                $data3["category"] = $uploadData['file_ext'];
                $data3["subject"] = 'File CV';
                $data3["author"] = $id;
                $data3["url"] = base_url().'public/document/'.$filename;
                $data3["createdby"] = $this->session->userdata('user_admin')['operatorid'];
                $data3["updatedby"] = $this->session->userdata('user_admin')['operatorid'];
                $this->Candidate_model->InsertData('document',$data3);
             }
             else
             {
                $datas['errors'] = $this->upload->display_errors();
             } 
        }
        else
        {
            $datas['errors'] = $this->upload->display_errors();
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($id,'1');
    }
    public function upload_image()
    {
        $frm = $this->input->post();
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './public/image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['image']['name'];
            $config['overwrite'] = FALSE;  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
          $uploadData = $this->upload->data();
          $data["imagelink"] = $uploadData['file_name'];
         } else{
            $datas['errors'] = $this->upload->display_errors();
            $data["imagelink"] = 'unknow.jpg';
            }
          }else{
            $datas['errors'] = $this->upload->display_errors();
            $data["imagelink"] = 'unknow.jpg';
          }

          $this->Data_model->update('candidate', array('candidateid' => $frm['candidateid']),$data);
          $this->new_profile($frm['candidateid']);
    }
    function insertCandidate_detail()
    {
        $frm = $this->input->post();

        $frm['dateofbirth'] =  $this->convert_date($frm['dateofbirth']);
        $frm['dateofissue'] =  $this->convert_date($frm['dateofissue']);

        $id = $frm['candidateid'];
        unset($frm['candidateid']);
        $this->Data_model->update('candidate',array('candidateid' => $id),$frm);  
        echo "<script>alert('Lưu thành công');</script>";   
        $this->new_profile($id,'2');
    }
    function insetAddress()
    {
        $frm = $this->input->post();
        $data0['city']      = $frm['city'][0];
        $data0['district']  = $frm['district'][0];
        $data0['ward']      = $frm['ward'][0];
        $data0['street']    = $frm['street'][0];
        $data0['addressno'] = $frm['addressno'][0];

        $data1['country']   = $frm['country'][1];
        $data1['city']      = $frm['city'][1];
        $data1['district']  = $frm['district'][1];
        $data1['ward']      = $frm['ward'][1];
        $data1['street']    = $frm['street'][1];
        $data1['addressno'] = $frm['addressno'][1];
        // var_dump($data0);exit;

        $data2['emergencycontact'] = $frm['emergencycontact'];
        $match2 =  array('candidateid' => $frm['candidateid']);
        $this->Data_model->update("candidate",$match2,$data2);
        
        $_jsoncity = $this->total_model->selectall('city');
        foreach ($_jsoncity as $key ) {
            if($key['id_city'] == $frm['city'][0])
            {
                $namecity0 = $key['name']; break;
            }else{
                $namecity0 = '';
            }
        }
        foreach ($_jsoncity as $key ) {
            if($key['id_city'] == $frm['city'][1])
            {
                $namecity1 = $key['name']; break;
            }else{
                $namecity1 = '';
            }
        }
        if($frm['city'][0] != 0 && $frm['district'][0] != 0){
            $qh = $this->Data_model->selectTable('district',array('id_city'=>$frm['city'][0]));
            foreach ($qh as $key ) {
                if($key['id_district'] == $frm['district'][0])
                {
                    $nameqh0 = $key['name']; break;
                }
            }
        }else{
            $nameqh0 = '';
        }
        if($frm['city'][1] != 0 && $frm['district'][1] != 0){
            $qh = $this->Data_model->selectTable('district',array('id_city'=>$frm['city'][1]));
            foreach ($qh as $key ) {
                if($key['id_district'] == $frm['district'][1])
                {
                    $nameqh1 = $key['name']; break;
                }
            }
        }else{
            $nameqh1 = '';
        }
        if($frm['district'][0] != 0 && $frm['ward'][0] != 0){
            $px = $this->Data_model->selectTable('ward',array('id_district'=>$frm['district'][0]));
            foreach ($px as $key ) {
                if($key['id_ward'] == $frm['ward'][0])
                {
                    $namepx0 = $key['name']; break;
                }
            }
        }else{
            $namepx0 = '';
        }
        if($frm['district'][1] != 0 && $frm['ward'][1] != 0){
            $px = $this->Data_model->selectTable('ward',array('id_district'=>$frm['district'][1]));
            foreach ($px as $key ) {
                if($key['id_ward'] == $frm['ward'][1])
                {
                    $namepx1 = $key['name']; break;
                }
            }
        }else{
            $namepx1 = '';
        }

        
        $data0['address'] = $frm['addressno'][0].", ".$frm['street'][0].", ".$namepx0.", ".$nameqh0.", ".$namecity0;
        $temp0 = explode(',', $data0['address']);
        $arr0 = array();
        for ($i=0; $i < count($temp0); $i++) { 
            // $temp0[$i] = preg_replace('/\s+/', '', $temp0[$i]);
            if ($temp0[$i] != "") {
                array_push($arr0, trim($temp0[$i]));
            }
        }
        $data0['address'] = implode(', ', $arr0);
        
        $data1['address'] = $frm['addressno'][1].", ".$frm['street'][1].", ".$namepx1.", ".$nameqh1.", ".$namecity1;
        $temp1 = explode(',', $data1['address']);
        $arr1 = array();
        for ($i=0; $i < count($temp1); $i++) { 
            // $temp1[$i] = preg_replace('/\s+/', '', $temp1[$i]);
            if ($temp1[$i] != "") {
                array_push($arr1, trim($temp1[$i]));
            }
        }
        $data1['address'] = implode(', ', $arr1);
        if ($frm['add'][0] == 'PREMANENT' || $frm['add'][1] == 'PREMANENT') {
            $match =  array('candidateid' => $frm['candidateid'], 'addtype' => "PREMANENT");
            $data0['lastupdate'] = $this->day;
            $this->Data_model->update("canaddress",$match,$data0);
        }else{
            $data0['addtype'] = "PREMANENT";
            $data0['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canaddress",$data0);
        }

        if ($frm['add'][0] == 'CONTACT' || $frm['add'][1] == 'CONTACT') {
            $match =  array('candidateid' => $frm['candidateid'], 'addtype' => "CONTACT");
            $this->Data_model->update("canaddress",$match,$data1);
        }else{
            $data1['addtype'] = "CONTACT";
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canaddress",$data1);
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'3');
        
    }

    function insert_relationship()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['type'] = $frm['quanhe'];
            $data1['name'] = $frm['hoten'];
            $data1['yob'] = $frm['namsinh'];
            $data1['career'] = $frm['nghenghiep'];
            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("cansocial",$array,$data1);
        }
        else
        {
            $data1['type'] = $frm['quanhe'];
            $data1['name'] = $frm['hoten'];
            $data1['yob'] = $frm['namsinh'];
            $data1['career'] = $frm['nghenghiep'];
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("cansocial",$data1);
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'4');
    }

    public function insert_experience()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['company'] = $frm['tencty'];
            $data1['position'] = $frm['chucvukhinghi'];
            $data1['responsibility'] = $frm['nhiemvu'];
            $data1['quitreason'] = $frm['lydonghi'];
            $data1['address'] = $frm['diachi'];
            $data1['phone'] = $frm['sdt'];
            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("canexperience",$array,$data1);
        }
        else
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['company'] = $frm['tencty'];
            $data1['position'] = $frm['chucvukhinghi'];
            $data1['responsibility'] = $frm['nhiemvu'];
            $data1['quitreason'] = $frm['lydonghi'];
            $data1['address'] = $frm['diachi'];
            $data1['phone'] = $frm['sdt'];
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canexperience",$data1);
        }

        $candidateid = $frm['candidateid'];
        $sql = "select count(*) as count from profilehistory where candidateid = $candidateid AND actiontype = 'Talent'";
        $checkAuto = $this->Campaign_model->select_sql($sql)[0]['count'];
        if($checkAuto <= 0){
            $namkn = $this->Candidate_model->yearexperirence($candidateid);
            if ($namkn >=1 && $namkn < 5) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 1));
            }else if ($namkn >=5 && $namkn < 10) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 2));
            }else{
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 3));
            }
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'5');
    }
    public function insert_reference()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['name'] = $frm['hoten'];
            $data1['position'] = $frm['chucvu'];
            $data1['company'] = $frm['congty'];
            $data1['contactno'] = $frm['lienhe'];
            
            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("canreference",$array,$data1);
        }
        else
        {
            $data1['name'] = $frm['hoten'];
            $data1['position'] = $frm['chucvu'];
            $data1['company'] = $frm['congty'];
            $data1['contactno'] = $frm['lienhe'];
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canreference",$data1);
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'5');
    }
    public function insert_knowledge()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter'] = $frm['tentruong'];
            $data1['trainingplace'] = $frm['noihoc'];
            $data1['trainingcourse'] = $frm['nganhhoc'];
            $data1['certificate'] = $frm['trinhdo'];
            $data1['highestcer'] = isset($frm['caonhat'])?$frm['caonhat']:"N";
            if(isset($frm['caonhat']) == true)
            {
                $array2 = array('candidateid' => $frm['candidateid'], 'highestcer' => "Y");
                $data2 = array('highestcer' => "N");
                $this->Data_model->update("canknowledge",$array2,$data2);
            }
            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("canknowledge",$array,$data1);
        }
        else
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter'] = $frm['tentruong'];
            $data1['trainingplace'] = $frm['noihoc'];
            $data1['trainingcourse'] = $frm['nganhhoc'];
            $data1['certificate'] = $frm['trinhdo'];
            $data1['highestcer'] = isset($frm['caonhat'])?$frm['caonhat']:"N";
            $data1['candidateid'] = $frm['candidateid'];
            if(isset($frm['caonhat']) == true)
            {
                $array2 = array('candidateid' => $frm['candidateid'], 'highestcer' => "Y");
                $data2 = array('highestcer' => "N");
                $this->Data_model->update("canknowledge",$array2,$data2);
            }
            $this->Data_model->insert("canknowledge",$data1);

        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'6');
    }
    public function insert_knowledge_v2()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter'] = $frm['cs_daotao'];
            $data1['traintime'] = $frm['tghoc'];
            $data1['traintimetype'] = $frm['donvi'];
            $data1['trainingcourse'] = $frm['nganhhoc'];
            $data1['certificate'] = $frm['bangcap'];
            
            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("canknowledge",$array,$data1);
        }
        else
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter'] = $frm['cs_daotao'];
            $data1['traintime'] = $frm['tghoc'];
            $data1['traintimetype'] = $frm['donvi'];
            $data1['trainingcourse'] = $frm['nganhhoc'];
            $data1['certificate'] = $frm['bangcap'];
            
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canknowledge",$data1);
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'6');
    }
    public function insert_language()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['language'] = $frm['tentruong'];
            $data1['rate1'] = $frm['nghe'];
            $data1['rate2'] = $frm['noi'];
            $data1['rate3'] = $frm['doc'];
            $data1['rate4'] = $frm['viet'];

            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("canlanguage",$array,$data1);
        }
        else
        {
            $data1['language'] = $frm['tentruong'];
            $data1['rate1'] = $frm['nghe'];
            $data1['rate2'] = $frm['noi'];
            $data1['rate3'] = $frm['doc'];
            $data1['rate4'] = $frm['viet'];
            
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canlanguage",$data1);
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'7');
    }
    public function insert_software()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['software'] = $frm['phanmem'];
            $data1['rate1'] = $frm['trinhdo'];
            
            $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
            $this->Data_model->update("cansoftware",$array,$data1);
        }
        else
        {
            $data1['software'] = $frm['phanmem'];
            $data1['rate1'] = $frm['trinhdo'];
            
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("cansoftware",$data1);
        }
        echo "<script>alert('Lưu thành công');</script>";
        $this->new_profile($frm['candidateid'],'8');
    }

    public function del_relationship()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("cansocial",$array);
        echo "<script>alert('Xóa thành công');</script>";
        $this->new_profile($frm['candidateid'],'4');
    }
    public function del_experience()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canexperience",$array);

        $candidateid = $frm['candidateid'];
        $sql = "select count(*) as count from profilehistory where candidateid = $candidateid AND actiontype = 'Talent'";
        $checkAuto = $this->Campaign_model->select_sql($sql)[0]['count'];
        if($checkAuto <= 0){
            $namkn = $this->Candidate_model->yearexperirence($candidateid);
            if ($namkn >=1 && $namkn < 5) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 1));
            }else if ($namkn >=5 && $namkn < 10) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 2));
            }else{
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 3));
            }
        }
        echo "<script>alert('Xóa thành công');</script>";
        $this->new_profile($frm['candidateid'],'5');
    }
    public function del_reference()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canreference",$array);
        echo "<script>alert('Xóa thành công');</script>";
        $this->new_profile($frm['candidateid'],'5');
    }
    public function del_knowledge()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canknowledge",$array);
        echo "<script>alert('Xóa thành công');</script>";
        $this->new_profile($frm['candidateid'],'6');
    }
    public function del_language()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canlanguage",$array);
        echo "<script>alert('Xóa thành công');</script>";
        $this->new_profile($frm['candidateid'],'7');
    }
    public function del_software()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("cansoftware",$array);
        echo "<script>alert('Xóa thành công');</script>";
        $this->new_profile($frm['candidateid'],'8');
    }


    public function convert_date($date='')
    {
        $timestamp = strtotime($date);
        if ($timestamp === FALSE) {
          $timestamp = strtotime(str_replace('/', '-', $date));
        }
        return date('Y-m-d H:i:s',$timestamp);
    }


    public function editFilter($id='')
    {
        $m_data['city'] = $this->total_model->selectall('city');
        $m_data['hocvan'] = $this->total_model->select_rows("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $m_data['ngoaingu'] = $this->total_model->select_rows("language",'canlanguage',array('hidden' => 1),'language');
        $m_data['tinhoc'] = $this->total_model->select_rows("software",'cansoftware',array('hidden' => 1),'software');
        $m_data['profilesrc'] = $this->total_model->select_rows('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $m_data['filter'] = $this->Data_model->selectTable('filterprofile',array('filterid'=>$id));
        $m_data['detail'] = $this->Data_model->selectTable('filterdetail',array('filterid'=>$id));
        $m_data['tag']                 = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
        $m_data['tagrandom']           = $this->Candidate_model->select_sugg_tag('tagprofile.title, tagprofile.tagid',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'random'));
        $data['temp'] = $this->load->view('admin/page/editFilter',$m_data,true);
        $this->load->view('admin/home/master-profile',$data);
    }
    function save_edit_filter($id='')
    {
        $frm = $this->input->post();
        $name['filtername'] = $frm['filter'];
        $name['share'] = $frm['share'];
        $name['fromclause'] = $this->session->userdata('join');
        $name['whereclause'] = $this->session->userdata('filter');
        $name['updatedby'] = $this->session->userdata('user_admin')['operatorid'];
        $abc = $this->total_model->UpdateData('filterprofile',array('filterid' => $id),$name);
        if($abc['code'] == 0) $detail['filterid'] = $id;
        else var_dump($abc);
        $this->total_model->DeleteReal('filterdetail',array('filterid' => $id));
        unset($frm['share']);
        unset($frm['filter']);
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
                $abc1 = $this->total_model->InsertData('filterdetail',$detail);
                if($abc1['code'] == 0) $id = $abc1['message'];
                else var_dump($abc1);

           }
        }
        $dreturn[0]['filterid'] = $detail['filterid'];
        $dreturn[0]['filtername'] = $name['filtername'];
        echo json_encode($dreturn);       
    }
    function insertCandidate_internal($id)
    {
        $frm = $this->input->post();
     
        if($id == 0) // them
        {
            $data['email']          = $frm['email'];
            $data['idcard']         = $frm['idcard'];
            $data['mergewith']      = $frm['candidateid'];
            $data['lastname']       = $frm['lastname'];
            $data['firstname']      = $frm['firstname'];
            $data['name']           = $frm['firstname']." ".$frm['lastname'];
            $data['profilesrc']     = $frm['profilesrc'];
            $data['snid']           = $frm['snid'];
           
                
                $candidateid = $this->Data_model->insert('candidate',$data);
                $this->Candidate_model->delete_real('tagtransaction',array('tablename' => 'candidate', 'recordid' => $candidateid));
                $tag['tags'] = $frm['tags'];
                $arr_tags = explode(',', $tag['tags']);
                foreach ($arr_tags as $key => $value) {
                    if(trim($value) == "")
                    {
                        continue;
                    }
                    $row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
                    if(!is_array($row['data']))
                    {   
                        
                        $data1['title'] = trim($value);
                        $data2['tagid'] = $this->Candidate_model->InsertData("tagprofile",$data1);
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $candidateid;
                        $data2['categoryid'] = "position"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }
                    else
                    {
                        $data2['tagid'] = $row['data']['tagid'];
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $candidateid;
                        $data2['categoryid'] = "position"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }   
                }
                // tag random
                $tags_rd['rd'] = $frm['tagsrandom'];
                $arr_tags2 = explode(',', $tags_rd['rd']);
                foreach ($arr_tags2 as $key => $value) {
                    if(trim($value) == "")
                        {
                            continue;
                        }
                    $row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
                    if(!is_array($row['data']))
                    {   
                        
                        $data1['title'] = trim($value);
                        $data2['tagid'] = $this->Candidate_model->InsertData("tagprofile",$data1);
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $candidateid;
                        $data2['categoryid'] = "random"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }
                    else
                    {
                        $data2['tagid'] = $row['data']['tagid'];
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $candidateid;
                        $data2['categoryid'] = "random"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }   
                }
                if (!empty($_FILES['fileCV1']['name'])) {
                    $config['upload_path'] = './public/document/';
                    $config['allowed_types'] = '*';
                    $filename = preg_replace('([\s_&#%]+)', '-', $_FILES['fileCV1']['name']);
                    $config['file_name'] = $filename;
                    $config['overwrite'] = FALSE;  
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileCV1')) {
                        $uploadData = $this->upload->data();
                        $data3["tablename"]         = 'candidate';
                        $data3["referencekey"]      = $candidateid;
                        $data3["filename"]          = $filename;
                        $data3["category"]          = $uploadData['file_ext'];
                        $data3["subject"]           = 'File CV';
                        $data3["author"]            = $candidateid;
                        $data3["url"]               = base_url().'public/document/'.$fieldname;
                        $data3["createdby"]         = $this->session->userdata('user_admin')['operatorid'];
                        $data3["updatedby"]         = $this->session->userdata('user_admin')['operatorid'];
                        $this->Candidate_model->InsertData('document',$data3);
                     }
                     else
                     {
                        $datas['errors'] = $this->upload->display_errors();
                     } 
                }
                else
                {
                    $datas['errors'] = $this->upload->display_errors();
                }
                echo '<script type="text/javascript">alert("Lưu thành công!");</script>';
            // }
            redirect(base_url('admin/handling/hosochitiet/'.$frm['candidateid'].'/2'));
        }
        else //sua
        {
            $data['email']      = $frm['email'];
            $data['idcard']     = $frm['idcard'];
            
            $data['lastname']   = $frm['lastname'];
            $data['firstname']  = $frm['firstname'];
            $data['name']       = $frm['firstname']." ".$frm['lastname'];
            $data['profilesrc'] = $frm['profilesrc'];
            $data['snid']       = $frm['snid'];
            // if ($this->Candidate_model->checkMail_internal( $frm['email'], $this->toInt($id) )) {    
            //     echo '<script type="text/javascript">alert("Email đãng tồn tại!");</script>';
            // }
            // else if($this->Candidate_model->checkID_internal( $frm['idcard'], $this->toInt($id) ))
            // {
            //     echo '<script type="text/javascript">alert("CMND đãng tồn tại!");</script>';
            // }
            // else
            // {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $id),$data);
                $this->Candidate_model->delete_real('tagtransaction',array('tablename' => 'candidate', 'recordid' => $id));
                $tag['tags'] = $frm['tags'];
                $arr_tags = explode(',', $tag['tags']);
                foreach ($arr_tags as $key => $value) {
                    $row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
                    if(!is_array($row['data']))
                    {   
                        if(trim($value) == "")
                        {
                            continue;
                        }
                        $data1['title'] = trim($value);
                        $data2['tagid'] = $this->Candidate_model->InsertData("tagprofile",$data1);
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $id;
                        $data2['categoryid'] = "position"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }
                    else
                    {
                        $data2['tagid'] = $row['data']['tagid'];
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $id;
                        $data2['categoryid'] = "position"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }   
                }
                $tags_rd['rd'] = $frm['tagsrandom'];
                $arr_tags2 = explode(',', $tags_rd['rd']);

                foreach ($arr_tags2 as $key => $value) {
                    $row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
                    if(!is_array($row['data']))
                    {   
                        if(trim($value) == "")
                        {
                            continue;
                        }
                        $data1['title'] = trim($value);
                        $data2['tagid'] = $this->Candidate_model->InsertData("tagprofile",$data1);
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $id;
                        $data2['categoryid'] = "random"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }
                    else
                    {
                        $data2['tagid'] = $row['data']['tagid'];
                        $data2['tablename'] = "candidate";
                        $data2['recordid'] = $id;
                        $data2['categoryid'] = "random"; 
                        $this->Candidate_model->InsertData("tagtransaction",$data2);
                    }   
                }
                if (!empty($_FILES['fileCV1']['name'])) {
                    $config['upload_path'] = './public/document/';
                    $config['allowed_types'] = '*';
                    $filename = preg_replace('([\s_&#%]+)', '-', $_FILES['fileCV1']['name']);
                    $config['file_name'] = $filename;
                    $config['overwrite'] = FALSE;  
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('fileCV1')) {
                        $uploadData = $this->upload->data();
                        $data3["tablename"]         = 'candidate';
                        $data3["referencekey"]      = $id;
                        $data3["filename"]          = $filename;
                        $data3["category"]          = $uploadData['file_ext'];
                        $data3["subject"]           = 'File CV';
                        $data3["author"]            = $id;
                        $data3["url"]               = base_url().'public/document/'.$filename;
                        $data3["createdby"]         = $this->session->userdata('user_admin')['operatorid'];
                        $data3["updatedby"]         = $this->session->userdata('user_admin')['operatorid'];
                        $this->Candidate_model->InsertData('document',$data3);
                     }
                     else
                     {
                        $datas['errors'] = $this->upload->display_errors();
                     } 
                }
                else
                {
                    $datas['errors'] = $this->upload->display_errors();
                }
                echo '<script type="text/javascript">alert("Lưu thành công!");</script>';
            // }
            redirect(base_url('admin/handling/hosochitiet/'.$frm['candidateid'].'/2'));
        }
    }
    function update_canhan($id)
    {
        $frm = $this->input->post();
        $data['dateofbirth'] = date("Y-m-d", strtotime($frm['dateofbirth']));
        $data['gender'] = $frm['gender'];
        $data['placeofbirth'] = $frm['placeofbirth'];
        $data['ethnic'] = $frm['ethnic'];
        $data['nationality'] = $frm['nationality'];
        $data['nativeland'] = $frm['nativeland'];
        $data['religion']   = $frm['religion'];
        $data['height'] = $frm['height'];
        $data['weight'] = $frm['weight'];
        $data['dateofissue'] = date("Y-m-d", strtotime($frm['dateofissue']));
        $data['placeofissue'] = $frm['placeofissue'];
        $this->Candidate_model->UpdateData('candidate',array('candidateid' => $id),$data);
        echo json_encode("1");
              
    }

    public function updateCV()
    {
        $id = $this->input->post('candidateid');
        if (!empty($_FILES['fileCV']['name'])) {
            $config['upload_path'] = './public/document/';
            $config['allowed_types'] = '*';
            $filename = preg_replace('([\s_&#%]+)', '-', $_FILES['fileCV']['name']);
            $config['file_name'] = $filename;
            $config['overwrite'] = FALSE;  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('fileCV')) {
                $uploadData = $this->upload->data();
                $data2["tablename"]         = 'candidate';
                $data2["referencekey"]      = $id;
                $data2["filename"]          = $filename;
                $data2["category"]          = $uploadData['file_ext'];
                $data2["subject"]           = 'File CV';
                $data2["author"]            = $id;
                $data2["url"]               = base_url().'public/document/'.$filename;
                $data2["createdby"]         = $this->session->userdata('user_admin')['operatorid'];
                $data2["updatedby"]         = $this->session->userdata('user_admin')['operatorid'];
                $this->Candidate_model->InsertData('document',$data2);
             }
             else
             {
                $datas['errors'] = $this->upload->display_errors();
             } 
        }
        else
        {
            $datas['errors'] = $this->upload->display_errors();
        }
        echo json_encode("1");
    }
    function update_diachi($id)
    {
       $frm = $this->input->post();
        $data0['country']   = $frm['country1'];
        $data0['city']      = $frm['city1'];
        $data0['district']  = $frm['district1'];
        $data0['ward']      = $frm['ward1'];
        $data0['street']    = $frm['street1'];
        $data0['addressno'] = $frm['addressno1'];

        $data1['country']   = $frm['country2'];
        $data1['city']      = $frm['city2'];
        $data1['district']  = $frm['district2'];
        $data1['ward']      = $frm['ward2'];
        $data1['street']    = $frm['street2'];
        $data1['addressno'] = $frm['addressno2'];
        // var_dump($data0);exit;

        $data2['telephone'] = $frm['phone1'].','.$frm['phone2'];
        $data2['emergencycontact'] = $frm['emergencycontact'];

        $match2 =  array('candidateid' => $id);
        $this->Data_model->update("candidate",$match2,$data2);
        $namecity0 = '';
        $namecity1 = '';
        $_jsoncity = $this->total_model->selectall('city');

        foreach ($_jsoncity as $key ) {
            if($key['id_city'] == $frm['city1'])
            {
                $namecity0 = $key['name']; break;
            }
        }
        foreach ($_jsoncity as $key ) {
            if($key['id_city'] == $frm['city2'])
            {
                $namecity1 = $key['name']; break;
            }
        }
        $qh = $this->Data_model->selectTable('district',array('id_city'=>$frm['city1']));
        $nameqh0 = '';
        $nameqh1 = '';
        foreach ($qh as $key ) {
            if($key['id_district'] == $frm['district1'])
            {
                $nameqh0 = $key['name']; break;
            }
        }
        $qh = $this->Data_model->selectTable('district',array('id_city'=>$frm['city2']));
        foreach ($qh as $key ) {
            if($key['id_district'] == $frm['district2'])
            {
                $nameqh1 = $key['name']; break;
            }
        }
        $px = $this->Data_model->selectTable('ward',array('id_district'=>$frm['district1']));
        $namepx0 = '';
        $namepx1 = '';
        foreach ($px as $key ) {
            if($key['id_ward'] == $frm['ward1'])
            {
                $namepx0 = $key['name']; break;
            }
        }
        $px = $this->Data_model->selectTable('ward',array('id_district'=>$frm['district2']));
        foreach ($px as $key ) {
            if($key['id_ward'] == $frm['ward2'])
            {
                $namepx1 = $key['name']; break;
            }
        }

        
        $data0['address'] = $frm['addressno1'].", ".$frm['street1'].", ".$namepx0.", ".$nameqh0.", ".$namecity0;
        $temp0 = explode(',', $data0['address']);
        $arr0 = array();
        for ($i=0; $i < count($temp0); $i++) { 
            // $temp0[$i] = preg_replace('/\s+/', '', $temp0[$i]);
            if ($temp0[$i] != "") {
                array_push($arr0, trim($temp0[$i]));
            }
        }
        $data0['address'] = implode(', ', $arr0);
        
        $data1['address'] = $frm['addressno2'].", ".$frm['street2'].", ".$namepx1.", ".$nameqh1.", ".$namecity1;
        $temp1 = explode(',', $data1['address']);
        $arr1 = array();
        for ($i=0; $i < count($temp1); $i++) { 
            // $temp1[$i] = preg_replace('/\s+/', '', $temp1[$i]);
            if ($temp1[$i] != "") {
                array_push($arr1, trim($temp1[$i]));
            }
        }
        $data1['address'] = implode(', ', $arr1);

        if ($this->Candidate_model->count_row('canaddress',array('candidateid' => $id , 'addtype' => "PREMANENT")) > 0 ){
            $match =  array('candidateid' => $id, 'addtype' => "PREMANENT");
            $this->Data_model->update("canaddress",$match,$data0);
        }else{
            $data0['addtype'] = "PREMANENT";
            $data0['candidateid'] = $id;
            $this->Data_model->insert("canaddress",$data0);
        }
        if ($this->Candidate_model->count_row('canaddress',array('candidateid' => $id , 'addtype' => "CONTACT")) > 0 ) {
            $match =  array('candidateid' => $id, 'addtype' => "CONTACT");
            $this->Data_model->update("canaddress",$match,$data1);
        }else{
            $data1['addtype'] = "CONTACT";
            $data1['candidateid'] = $id;
            $this->Data_model->insert("canaddress",$data1);
        }
        echo json_encode("1");
    }
    public function ins_upd_relationship()
    {

        $frm = $this->input->post();   
        if($frm['checkup'] != "0")
        {
            $data1['type'] = $frm['quanhe'];
            $data1['name'] = $frm['hoten'];
            $data1['yob'] = $frm['namsinh'];
            $data1['career'] = $frm['nghenghiep'];
            $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("cansocial",$array,$data1);
        }
        else
        {
            $data1['type'] = $frm['quanhe'];
            $data1['name'] = $frm['hoten'];
            $data1['yob'] = $frm['namsinh'];
            $data1['career'] = $frm['nghenghiep'];
            $data1['candidateid'] = $frm['candidate_sub'];
            $this->Candidate_model->InsertData("cansocial",$data1);
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/4'));
    }
    public function ins_upd_experience()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['company'] = $frm['tencty'];
            $data1['position'] = $frm['chucvukhinghi'];
            $data1['responsibility'] = $frm['nhiemvu'];
            $data1['quitreason'] = $frm['lydonghi'];
            $data1['address'] = $frm['diachi'];
            $data1['phone'] = $frm['sdt'];
            $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("canexperience",$array,$data1);
        }
        else
        {
            $data1['datefrom'] = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto'] = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['company'] = $frm['tencty'];
            $data1['position'] = $frm['chucvukhinghi'];
            $data1['responsibility'] = $frm['nhiemvu'];
            $data1['quitreason'] = $frm['lydonghi'];
            $data1['address'] = $frm['diachi'];
            $data1['phone'] = $frm['sdt'];
            $data1['candidateid'] = $frm['candidate_sub'];
            $this->Candidate_model->InsertData("canexperience",$data1);
        }

        $candidateid = $frm['candidate_sub'];
        $sql = "select count(*) as count from profilehistory where candidateid = $candidateid AND actiontype = 'Talent'";
        $checkAuto = $this->Campaign_model->select_sql($sql)[0]['count'];
        if($checkAuto <= 0){
            $namkn = $this->Candidate_model->yearexperirence($candidateid);
            if ($namkn >=1 && $namkn < 5) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 1));
            }else if ($namkn >=5 && $namkn < 10) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 2));
            }else{
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 3));
            }
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/5'));
    }
    public function ins_upd_reference()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['name'] = $frm['hoten'];
            $data1['position'] = $frm['chucvu'];
            $data1['company'] = $frm['congty'];
            $data1['contactno'] = $frm['lienhe'];
            
            $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("canreference",$array,$data1);
        }
        else
        {
            $data1['name'] = $frm['hoten'];
            $data1['position'] = $frm['chucvu'];
            $data1['company'] = $frm['congty'];
            $data1['contactno'] = $frm['lienhe'];
            $data1['candidateid'] = $frm['candidate_sub'];
            $this->Candidate_model->InsertData("canreference",$data1);
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/5'));
        
    }
    public function ins_upd_knowledge()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['datefrom']          = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto']            = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter']    = $frm['tentruong'];
            $data1['trainingplace']     = $frm['noihoc'];
            $data1['trainingcourse']    = $frm['nganhhoc'];
            $data1['certificate']       = $frm['trinhdo'];
            $data1['highestcer']        = isset($frm['caonhat'])?$frm['caonhat']:"N";
            $data1['lastupdate']        = date('Y-m-d H:i:s');
            if(isset($frm['caonhat']) == true)
            {
                $array2 = array('candidateid' => $frm['candidate_sub'], 'highestcer' => "Y");
                $data2 = array('highestcer' => "N");
                $this->Candidate_model->UpdateData("canknowledge",$array2,$data2);
            }
            $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("canknowledge",$array,$data1);
        }
        else
        {
            $data1['datefrom']          = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto']            = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter']    = $frm['tentruong'];
            $data1['trainingplace']     = $frm['noihoc'];
            $data1['trainingcourse']    = $frm['nganhhoc'];
            $data1['certificate']       = $frm['trinhdo'];
            $data1['highestcer']        = isset($frm['caonhat'])?$frm['caonhat']:"N";
            $data1['candidateid']       = $frm['candidate_sub'];
            $data1['lastupdate']        = date('Y-m-d H:i:s');
            if(isset($frm['caonhat']) == true)
            {
                $array2 = array('candidateid' => $frm['candidate_sub'], 'highestcer' => "Y");
                $data2 = array('highestcer' => "N");
                $this->Candidate_model->UpdateData("canknowledge",$array2,$data2);
            }
            $this->Candidate_model->InsertData("canknowledge",$data1);

        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/6'));
    }
    public function ins_upd_knowledge_v2()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['datefrom']          = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto']            = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter']    = $frm['cs_daotao'];
            $data1['traintime']         = ($frm['tghoc'] != '')? $frm['tghoc'] : 0;
            $data1['traintimetype']     = $frm['donvi'];
            $data1['trainingcourse']    = $frm['nganhhoc'];
            $data1['certificate']       = $frm['bangcap'];
            $data1['lastupdate']        = date('Y-m-d H:i:s');
            $array                      =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("canknowledge",$array,$data1);
        }
        else
        {
            $data1['datefrom']          = date("Y-m-d", strtotime($frm['tu'])); 
            $data1['dateto']            = date("Y-m-d", strtotime($frm['den'])) ;
            $data1['trainingcenter']    = $frm['cs_daotao'];
            $data1['traintime']         = ($frm['tghoc'] != '')? $frm['tghoc'] : 0;
            $data1['traintimetype']     = $frm['donvi'];
            $data1['trainingcourse']    = $frm['nganhhoc'];
            $data1['certificate']       = $frm['bangcap'];
            $data1['lastupdate']        = date('Y-m-d H:i:s');
            $data1['candidateid']       = $frm['candidate_sub'];
            $this->Candidate_model->InsertData("canknowledge",$data1);
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/6'));
    }
    public function ins_upd_language()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['language'] = $frm['tentruong'];
            $data1['rate1'] = $frm['nghe'];
            $data1['rate2'] = $frm['noi'];
            $data1['rate3'] = $frm['doc'];
            $data1['rate4'] = $frm['viet'];

            $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("canlanguage",$array,$data1);
        }
        else
        {
            $data1['language'] = $frm['tentruong'];
            $data1['rate1'] = $frm['nghe'];
            $data1['rate2'] = $frm['noi'];
            $data1['rate3'] = $frm['doc'];
            $data1['rate4'] = $frm['viet'];
            
            $data1['candidateid'] = $frm['candidate_sub'];
            $this->Candidate_model->InsertData("canlanguage",$data1);
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/7'));
    }
    public function ins_upd_software()
    {
        $frm = $this->input->post();    
        if($frm['checkup'] != "0")
        {
            $data1['software'] = $frm['phanmem'];
            $data1['rate1'] = $frm['trinhdo'];
            

            $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
            $this->Candidate_model->UpdateData("cansoftware",$array,$data1);
        }
        else
        {
            $data1['software'] = $frm['phanmem'];
            $data1['rate1'] = $frm['trinhdo'];
            
            
            $data1['candidateid'] = $frm['candidate_sub'];
            $this->Candidate_model->InsertData("cansoftware",$data1);
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/8'));
    }
    public function del_relationship2()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
        $this->Candidate_model->DeleteData("cansocial",$array);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/4'));
    }
    public function del_experience2()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
        $this->Candidate_model->DeleteData("canexperience",$array);

        $candidateid = $frm['candidate_sub'];
        $sql = "select count(*) as count from profilehistory where candidateid = $candidateid AND actiontype = 'Talent'";
        $checkAuto = $this->Campaign_model->select_sql($sql)[0]['count'];
        if($checkAuto <= 0){
            $namkn = $this->Candidate_model->yearexperirence($candidateid);
            if ($namkn >=1 && $namkn < 5) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 1));
            }else if ($namkn >=5 && $namkn < 10) {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 2));
            }else{
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 3));
            }
        }
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/5'));
    }
    public function del_reference2()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
        $this->Candidate_model->DeleteData("canreference",$array);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/5'));
    }
    public function del_knowledge2()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
        $this->Candidate_model->DeleteData("canknowledge",$array);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/6'));
    }
    public function del_language2()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
        $this->Candidate_model->DeleteData("canlanguage",$array);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/7'));
    }
    public function del_software2()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidate_sub'], 'recordid' => $frm['checkup']);
        $this->Candidate_model->DeleteData("cansoftware",$array);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 1;
        redirect(base_url('admin/handling/profile/'.$frm['candidate_main'].'/'.$page.'/8'));
    }

    public function mergeCandidate()
    {
        $post = $this->input->post();
        foreach ($post['id'] as $key) {
            if ($key == $post['checkMerge'][0]) {
                continue;
            }
            $match = array('candidateid' => $key );
            $data  = array('mergewith' => $post['checkMerge'][0] );
            $this->Candidate_model->UpdateData("candidate", $match,$data);
        }
        echo json_encode(1);
    }
}
?>