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
		$this->load->model(array('admin/Candidate_model','admin/total_model','admin/Data_model','admin/Campaign_model'));
		$ac_data['hoso'] = 'active';
		$this->data['header'] = $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] = $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] = $this->load->view('admin/home/footer',null,true);
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
			$where = 'AND candidate.hidden = 1';
			$this->session->set_userdata('filter', $where);
		}
		$where = $this->session->userdata('filter');
		$join = '';
		$join = $this->session->userdata('join');
		$frm = array();
		$frm = $this->session->userdata('frm');
		$this->data2['checknemu'] = $frm;
        $this->data2['total_candidate'] = $this->Candidate_model->count_row('candidate',array('1'=>1));
        $this->data1['total_candidate'] = $this->data2['total_candidate'];
        $this->data2['profilesrc'] = $this->total_model->select_rows('profilesrc, count(profilesrc) as sl','candidate',array('hidden' => 1),'profilesrc');
        $this->data2['hocvan'] = $this->total_model->select_rows("certificate",'canknowledge',array('hidden' => 1),'certificate');
        $this->data2['ngoaingu'] = $this->total_model->select_rows("language",'canlanguage',array('hidden' => 1),'language');
        $this->data2['tinhoc'] = $this->total_model->select_rows("software",'cansoftware',array('hidden' => 1),'software');
        $this->data2['filter'] = $this->total_model->selectall('filterprofile');
		$this->data1['candidate'] = $this->Candidate_model->list_filter($join,$where);   
		$this->data2['city'] = $this->total_model->selectall('city');
		$this->data1['nav'] = $this->load->view('admin/page/nav',$this->data2,true);
		$this->data['temp'] = $this->load->view('admin/page/content',$this->data1,true);
        // $this->data['script'] = $this->load->view('admin/script/script_nav', NULL, TRUE); 
		$this->load->view('admin/home/master',$this->data);
	}
	public function profile($id = '')
	{
		$where = $this->session->userdata('filter');
		$join = '';
        $join = $this->session->userdata('join');
		
        $this->data2['id_active'] = $id;
		$this->data2['candidate'] = $this->Candidate_model->list_filter($join,$where);   
		$this->data1['nav'] = $this->load->view('admin/page/nav-profile',$this->data2,true);
		$this->data1['id'] = $id;
		$this->data['temp'] = $this->load->view('admin/page/profile',$this->data1,true);

		$this->load->view('admin/home/master',$this->data);
	}

	public function hosochitiet($id = '')
	{
        $join[0] = array('table'=> 'operator','match' =>'tb.createdby = operator.operatorid');
        $join[1] = array('table'=> 'document','match' =>'tb.createdby = document.referencekey');
        $orderby = array('colname'=>'tb.createddate','typesort'=>'desc');
        $history_cmt = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id),'','cancomment tb',$join,'',$orderby,'','');
        $history_profile = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id),'','profilehistory tb',$join,'',$orderby,'','');
        $this->data2['history'] = array_merge($history_cmt, $history_profile);

        function cmp($a, $b) {
            if ($a['createddate'] == $b['createddate']) {
                return 0;
            }
            return ($a['createddate'] < $b['createddate']) ? 1 : -1;
        }
        uasort($this->data2['history'], 'cmp');
        // echo "<pre>";
        // print_r($this->data2['history']);
        // echo "</pre>";exit;

        $this->data2['city'] = $this->total_model->selectall('city');
        $this->data2['document'] = $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','');
        $this->data2['comment'] = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
		$this->data2['address'] = $this->Candidate_model->selectTableByIds('canaddress',$id);
		$this->data2['candidate'] = $this->Candidate_model->selectTableById('candidate',$id);
		$this->data2['family'] = $this->Candidate_model->selectTableByIds('cansocial',$id);
		$this->data2['experience'] = $this->Candidate_model->selectTableByIds('canexperience',$id);
        $this->data2['vt'] = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id,'dateto');
        // var_dump($this->data2['position_company']);exit;
		$this->data2['reference'] = $this->Candidate_model->selectTableByIds('canreference',$id);
		$this->data2['knowledge'] = $this->Candidate_model->selectTableByIds('canknowledge',$id);
		$this->data2['language'] = $this->Candidate_model->selectTableByIds('canlanguage',$id);
		$this->data2['software'] = $this->Candidate_model->selectTableByIds('cansoftware',$id);
        $sql = "SELECT count(recordid) as count FROM profilehistory WHERE candidateid = '$id' AND actiontype = 'Recruite'";
        $this->data2['recruite'] = $this->Campaign_model->select_sql($sql)[0]['count'];
        // noi bo
            $this->data2['candidate_noibo'] = $this->Candidate_model->first_row('candidate',array('mergewith' => $id, ),'','');
        //
		$data['temp'] = $this->load->view('admin/page/detail-profile',$this->data2,true);
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
        $where = array();
        $join = '';  
        $where = "AND (LOWER(candidate.name) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(candidate.firstname) LIKE LOWER(N'%".$frm['name']."%') OR LOWER(candidate.lastname) LIKE LOWER(N'%".$frm['name']."%'))";
        $this->session->set_userdata('filter', $where);
        $this->session->set_userdata('join', $join);
    
        $data1 = $this->Candidate_model->list_filter($join,$where);    
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
        isset($frm['sharecmt'])? $data['share'] = 'Y' : $data['share'] = 'N' ;
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


    function new_profile($id='')
    {
        $this->data2['city'] = $this->total_model->selectall('city');
        if ($id != '') {
            $this->data2['document'] = $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','');
            $this->data2['comment'] = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
            $this->data2['address'] = $this->Candidate_model->selectTableByIds('canaddress',$id);
            $this->data2['candidate'] = $this->Candidate_model->selectTableById('candidate',$id);
            $this->data2['family'] = $this->Candidate_model->selectTableByIds('cansocial',$id);
            $this->data2['experience'] = $this->Candidate_model->selectTableByIds('canexperience',$id);
            $this->data2['reference'] = $this->Candidate_model->selectTableByIds('canreference',$id);
            $this->data2['knowledge'] = $this->Candidate_model->selectTableByIds('canknowledge',$id);
            $this->data2['language'] = $this->Candidate_model->selectTableByIds('canlanguage',$id);
            $this->data2['software'] = $this->Candidate_model->selectTableByIds('cansoftware',$id);
        }
        // $data['temp'] = $this->load->view('admin/page/detail-profile',$this->data2,true);
        $data['temp'] = $this->load->view('admin/page/new_profile',$this->data2,true);
        $this->load->view('admin/home/master-profile',$data);
    }
    function insertCandidate()
    {
        $frm = $this->input->post();
        $frm['name'] = $frm['lastname'].' '.$frm['firstname'];    
        // $data['currentbenefit'] = $this->toInt($frm['cur_benefit']);
        // $data['desirebenefit'] = $this->toInt($frm['desirebenefit']);
            $id = $this->Data_model->insert('candidate',$frm);
        if (!empty($_FILES['fileCV']['name'])) {
            $config['upload_path'] = './public/document/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $_FILES['fileCV']['name'];
            $config['overwrite'] = FALSE;  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('fileCV')) {
                $uploadData = $this->upload->data();
                $data2["tablename"] = 'candidate';
                $data2["referencekey"] = $id;
                $data2["filename"] = $uploadData['file_name'];
                $data2["category"] = $uploadData['file_ext'];
                $data2["subject"] = 'File CV';
                $data2["author"] = $id;
                $data2["url"] = base_url().'public/document/'.$uploadData['file_name'];
                $data2["createdby"] = $this->session->userdata('user_admin')['operatorid'];
                $data2["updatedby"] = $this->session->userdata('user_admin')['operatorid'];
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
        
        $this->new_profile($id);
    }
    public function upload_image()
    {
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
        $this->new_profile($id);
    }
    function insetAddress()
    {
        $frm = $this->input->post();
        $data0['country']   = $frm['country'][0];
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

        $data2['telephone'] = $frm['phone1'].' '.$frm['phone2'];
        $data2['emergencycontact'] = $frm['emergencycontact'];
        $match2 =  array('candidateid' => $frm['candidateid']);
        $this->Data_model->update("candidate",$match2,$data2);
        
        $_jsoncity = $this->total_model->selectall('city');
        foreach ($_jsoncity as $key ) {
            if($key['id_city'] == $frm['city'][0])
            {
                $namecity0 = $key['name']; break;
            }
        }
        foreach ($_jsoncity as $key ) {
            if($key['id_city'] == $frm['city'][1])
            {
                $namecity1 = $key['name']; break;
            }
        }
        $qh = $this->Data_model->selectTable('district',array('id_city'=>$frm['city'][0]));
        foreach ($qh as $key ) {
            if($key['id_district'] == $frm['district'][0])
            {
                $nameqh0 = $key['name']; break;
            }
        }
        $qh = $this->Data_model->selectTable('district',array('id_city'=>$frm['city'][1]));
        foreach ($qh as $key ) {
            if($key['id_district'] == $frm['district'][1])
            {
                $nameqh1 = $key['name']; break;
            }
        }
        $px = $this->Data_model->selectTable('ward',array('id_district'=>$frm['district'][0]));
        foreach ($px as $key ) {
            if($key['id_ward'] == $frm['ward'][0])
            {
                $namepx0 = $key['name']; break;
            }
        }
        $px = $this->Data_model->selectTable('ward',array('id_district'=>$frm['district'][1]));
        foreach ($px as $key ) {
            if($key['id_ward'] == $frm['ward'][1])
            {
                $namepx1 = $key['name']; break;
            }
        }

        if($frm['addressno'][0] == "")
        {
            $data0['address'] = $frm['street'][0].", ".$namepx0.", ".$nameqh0.", ".$namecity0;
        }else
        {
            $data0['address'] = $frm['addressno'][0].", ".$frm['street'][0].", ".$namepx0.", ".$nameqh0.", ".$namecity0;
        }
        if($frm['addressno'][1] == "")
        {
            $data1['address'] = $frm['street'][1].", ".$namepx1.", ".$nameqh1.", ".$namecity1;
        }else
        {
            $data1['address'] = $frm['addressno'][1].", ".$frm['street'][1].", ".$namepx1.", ".$nameqh1.", ".$namecity1;
        }

        if ($frm['add'][0] == 'PREMANENT' || $frm['add'][1] == 'PREMANENT') {
            $match =  array('candidateid' => $frm['candidateid'], 'addtype' => "PREMANENT");
            $this->Data_model->update("canaddress",$match,$data0);
        }else{
            $data0['addtype'] = "PREMANENT";
            $data0['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canaddress",$data0);
        }

        if ($frm['add'][0] == 'CONTACT' || $frm['add'][1] == 'CONTACT') {
            $match =  array('candidateid' => $frm['candidateid'], 'addtype' => "PREMANENT");
            $this->Data_model->update("canaddress",$match,$data1);
        }else{
            $data1['addtype'] = "CONTACT";
            $data1['candidateid'] = $frm['candidateid'];
            $this->Data_model->insert("canaddress",$data1);
        }
        $this->new_profile($frm['candidateid']);
        
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
        $this->new_profile($frm['candidateid']);
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
        $this->new_profile($frm['candidateid']);
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
            $this->Data_model->update("canreference",$data1);
        }
        $this->new_profile($frm['candidateid']);
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
        $this->new_profile($frm['candidateid']);
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
        $this->new_profile($frm['candidateid']);
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
        $this->new_profile($frm['candidateid']);
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
        $this->new_profile($frm['candidateid']);
    }

    public function del_relationship()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("cansocial",$array);
        $this->new_profile($frm['candidateid']);
    }
    public function del_experience()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canexperience",$array);
        $this->new_profile($frm['candidateid']);
    }
    public function del_reference()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canreference",$array);
        $this->new_profile($frm['candidateid']);
    }
    public function del_knowledge()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canknowledge",$array);
        $this->new_profile($frm['candidateid']);
    }
    public function del_language()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("canlanguage",$array);
        $this->new_profile($frm['candidateid']);
    }
    public function del_software()
    {
        $frm = $this->input->post();
        $array =  array('candidateid' => $frm['candidateid'], 'recordid' => $frm['checkup']);
        $this->Data_model->delete("cansoftware",$array);
        $this->new_profile($frm['candidateid']);
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
            $data['email'] = $frm['email'];
            $data['idcard'] = $frm['idcard'];
            $data['mergewith'] = $frm['candidateid'];
            $data['lastname'] = $frm['lastname'];
            $data['firstname'] = $frm['firstname'];
            $data['name'] = $frm['lastname']." ".$frm['firstname'];
            $data['profilesrc'] = $frm['profilesrc'];
            if ($this->Candidate_model->checkMail( $frm['email'] )) {    
                echo '<script type="text/javascript">alert("Email đãng tồn tại!");</script>';
            }
            else if($this->Candidate_model->checkID( $frm['idcard'] ))
            {
                echo '<script type="text/javascript">alert("CMND đãng tồn tại!");</script>';
            }
            else
            {
                $this->Candidate_model->InsertData('candidate',$data);
                echo '<script type="text/javascript">alert("Lưu thành công!");</script>';
            }
            redirect(base_url('admin/handling/hosochitiet/'.$frm['candidateid']));
        }
        else //sua
        {
            $data['email'] = $frm['email'];
            $data['idcard'] = $frm['idcard'];
            
            $data['lastname'] = $frm['lastname'];
            $data['firstname'] = $frm['firstname'];
            $data['name'] = $frm['lastname']." ".$frm['firstname'];
            $data['profilesrc'] = $frm['profilesrc'];
            if ($this->Candidate_model->checkMail_internal( $frm['email'], $this->toInt($id) )) {    
                echo '<script type="text/javascript">alert("Email đãng tồn tại!");</script>';
            }
            else if($this->Candidate_model->checkID_internal( $frm['idcard'], $this->toInt($id) ))
            {
                echo '<script type="text/javascript">alert("CMND đãng tồn tại!");</script>';
            }
            else
            {
                $this->Candidate_model->UpdateData('candidate',array('candidateid' => $id),$data);
                echo '<script type="text/javascript">alert("Lưu thành công!");</script>';
            }
            redirect(base_url('admin/handling/hosochitiet/'.$frm['candidateid']));
        }
    }
    function update_canhan($id)
    {
        $frm = $this->input->post();
        $data['dateofbirth'] = $frm['dateofbirth'];
        $data['gender'] = $frm['gender'];
        $data['ethnic'] = $frm['ethnic'];
        $data['nationality'] = $frm['nationality'];
        $data['height'] = $frm['height'];
        $data['weight'] = $frm['weight'];
        $data['dateofissue'] = $frm['dateofissue'];
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
            $config['file_name'] = $_FILES['fileCV']['name'];
            $config['overwrite'] = FALSE;  
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('fileCV')) {
                $uploadData = $this->upload->data();
                $data2["tablename"]         = 'candidate';
                $data2["referencekey"]      = $id;
                $data2["filename"]          = $uploadData['file_name'];
                $data2["category"]          = $uploadData['file_ext'];
                $data2["subject"]           = 'File CV';
                $data2["author"]            = $id;
                $data2["url"]               = base_url().'public/document/'.$uploadData['file_name'];
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
}
?>