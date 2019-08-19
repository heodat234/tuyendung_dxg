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
		// $this->load->helper('url');
		// $this->load->model('sllonlineadmin');
		$this->load->helper('form');

		// $this->load->library('excel');

		$this->load->library('session');
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		$this->load->model(array('Login_model','Candidate_model','admin/Mail_model','admin/Candidate_model','admin/Campaign_model','M_data'));
		$this->load->helper(array('url','my_helper','file'));
		$this->datamenu['address'] = $this->Candidate_model->countTableById('canaddress',$this->session->userdata('user')['candidateid']);
		$this->datamenu['candidate'] = $this->Candidate_model->selectTableById('candidate',$this->session->userdata('user')['candidateid']);
		$this->datamenu['family'] = $this->Candidate_model->countTableById('cansocial',$this->session->userdata('user')['candidateid']);
		$this->datamenu['experience'] = $this->Candidate_model->countTableById('canexperience',$this->session->userdata('user')['candidateid']);
		$this->datamenu['reference'] = $this->Candidate_model->countTableById('canreference',$this->session->userdata('user')['candidateid']);
		$this->datamenu['knowledge'] = $this->Candidate_model->countTableById('canknowledge',$this->session->userdata('user')['candidateid']);
		$this->datamenu['language'] = $this->Candidate_model->countTableById('canlanguage',$this->session->userdata('user')['candidateid']);
		$this->datamenu['software'] = $this->Candidate_model->countTableById('cansoftware',$this->session->userdata('user')['candidateid']);
		$this->datamenu['tags'] = $this->Candidate_model->select_tags_byId($this->session->userdata('user')['candidateid']);
		$this->data['header'] = $this->load->view('home/header',null,true);
	    $this->data['footer'] = $this->load->view('home/footer',null,true);
	    $a = array();
		$_jsoncity = $this->Candidate_model->select_sugg_tag('tagprofile.title',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
		foreach ($_jsoncity as $key) {
			array_push($a, $key['title']);
		}
		$this->data['tag'] = $a;
	}
	public function test()
	{
		$arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
		$city = $this->Candidate_model->selectall('district');
		$i=1;
		for ($i=292; $i < 810; $i++) {
			$_jsoncity = json_decode(file_get_contents('https://thongtindoanhnghiep.co/api/district/'.$city[$i]['id_district'].'/ward',false, stream_context_create($arrContextOptions)),true)  ;

		// foreach ($city as $row) {
		// 	$_jsoncity = json_decode(file_get_contents('https://thongtindoanhnghiep.co/api/district/'.$row['id_district'].'/ward',false, stream_context_create($arrContextOptions)),true)  ;
			$arr = array();
			foreach ($_jsoncity as $row1) {
				$arr['id'] = $i;
				$arr['id_ward'] = $row1['ID'];
				$arr['name'] = $row1['Title'];
				$arr['id_district'] = $city[$i]['id_district'];
				$arr['hidden'] = 0;

				if ($this->Candidate_model->checkId('ward',array('id_ward' => $row1['ID'], ))) {
					continue;
				}else{
					$this->Candidate_model->InsertData('ward',$arr);
				}
				$i++;

			}
		}
		// }

		// var_dump($_jsoncity);
	}
	public function index()
	{

		$this->datamenu['chinhsach'] = "active";

		$this->data['modal'] = $this->load->view('home/modal-master',null,true);
		$this->data['menu'] = $this->load->view('home/menu',$this->datamenu,true);
		$this->data['temp'] = $this->load->view('page/chinhsachnhansu',null,true);
		$this->load->view('home/master',$this->data);
	}
	public function cohoi_nghe_nghiep()
	{
		$this->datamenu['cohoi'] 	= "active";
		$day 						= date('Y-m-d H:i:s');

		$sql = "SELECT DISTINCT a.*
				from reccampaign a
				WHere a.expdate >= '$day' AND a.status = 'W' AND a.showtype = 'O'
				 order by a.expdate DESC";
		$data = $this->M_data->select_sql($sql);
        $array['campaigns'] = array_values($data);

		$this->data['modal'] 		= $this->load->view('home/modal-master',null,true);
		$this->data['menu'] 		= $this->load->view('home/menu',$this->datamenu,true);
		$this->data['temp'] 		= $this->load->view('page/cohoi_nghe_nghiep',$array,true);
		$this->load->view('home/master',$this->data);
	}

	public function co_hoi_nghe_nghiep_detail($id='')
	{
		$match 						= array('campaignid' => $id, );
		$data['recruite'] 			= $this->Candidate_model->selectByWhere('recartical',$match);
		$this->data['temp'] 		= $this->load->view('page/cohoi_nghe_nghiep_detail',$data,true);

		$this->datamenu['cohoi'] 	= "active";
        $this->data['modal']        = $this->load->view('home/modal-master',null,true);
		$this->data['menu'] 		= $this->load->view('home/menu',$this->datamenu,true);
		$this->load->view('home/master',$this->data);
	}
	public function applyCampaign()
	{
		$frm = $this->input->post();
		$frm['actiontype'] 	= 'Apply';
		$frm['actionnote'] 	= $frm['availabledate'];
		unset($frm['availabledate']);
		unset($frm['check_btn']);
		$frm['createdby'] 	= $this->session->userdata('user')['operatorid'];
		$this->Candidate_model->InsertData('profilehistory',$frm);

		//mail candidate

		$mail = array();
		$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 4));
		if(isset($mailtemplate[0])){
			$subject 			= $mailtemplate[0]['presubject'];
			$body 				= $mailtemplate[0]['prebody'];
			$mail["attachment"] = $mailtemplate[0]['preattach'];
			$presender 			= $mailtemplate[0]['presender'];
			$mail["cc"] 		= '';
			$mail["bcc"] 		= '';
		}else{
			$subject			= $body = $mail["attachment"] = $mail["cc"] = $mail["bcc"] = $presender = '';
		}

		if ($presender != 'usersession') {
			$arrayName1 = array('operatorname' => 'mailsystem' );
			$mailSystem = $this->Mail_model->select('operator',$arrayName1);

        	$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];

        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
        	$mail['mcport']	= $mailSystem[0]['mcport'];
		}else{
			echo json_encode(1);
		}

		$match 						= array('candidateid' => $frm['candidateid']);
		$candidate 					= $this->Candidate_model->selectByWhere('candidate',$match)[0];
		$lastname 					= $candidate['lastname'];
		$name 						= $candidate['name'];
		$match 						= array('campaignid' => $frm['campaignid']);
		$campaigns 					= $this->Candidate_model->selectByWhere('reccampaign',$match)[0];
		$position 					= $campaigns['position'];
		$temp						= trim($campaigns['managecampaign'],',');
		$manage 					= explode(',', $temp);
		foreach ($manage as $key) {
			$match 						= array('operatorid' => $key);
			$operator 					= $this->Candidate_model->selectByWhere('operator',$match)[0];
			$chuoi_tim 				= array('[Tên Ứng viên]','[Tên]','[Vị trí]','[Tuyển dụng viên]');
			$chuoi_thay_the 		= array($name,$lastname,$position,$operator['operatorname']);
			$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($subject));
			$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($body));
			$mail['toemail'] 		= $operator['email'];
			$this->Mail_model->sendMail($mail);

		}

		echo json_encode(1);
	}
	public function hoso_canhan($tab = 'one')
	{
		if($this->session->has_userdata('user')) {
	        if ( ! $data['city'] = $this->cache->get('city'))
    		 {
		           $data['city'] = $this->Candidate_model->selectall('city');
		     }
		    $data['document'] = $this->Candidate_model->selectFirstRowsOrderBy('document',array('referencekey'=>$this->session->userdata('user')['candidateid'],'tablename' => 'candidate'),"lastupdate");
		    $data['address'] = $this->Candidate_model->selectTableByIds('canaddress',$this->session->userdata('user')['candidateid']);

		    $data['candidate'] =  $this->Candidate_model->selectTableById('candidate',$this->session->userdata('user')['candidateid']);

		    $data['family']=  $this->Candidate_model->selectTableByIds('cansocial',$this->session->userdata('user')['candidateid']);

		    $data['experience']  =  $this->Candidate_model->selectTableByIds('canexperience',$this->session->userdata('user')['candidateid']);

		    $data['reference'] =  $this->Candidate_model->selectTableByIds('canreference',$this->session->userdata('user')['candidateid']);

		    $data['knowledge'] =  $this->Candidate_model->selectTableByIds('canknowledge',$this->session->userdata('user')['candidateid']);

		    $data['language'] =  $this->Candidate_model->selectTableByIds('canlanguage',$this->session->userdata('user')['candidateid']);

		    $data['software']=  $this->Candidate_model->selectTableByIds('cansoftware',$this->session->userdata('user')['candidateid']);
		    $data['tags'] = $this->Candidate_model->select_tags_byId($this->session->userdata('user')['candidateid']);
			$data[$tab] = "in active";

			$this->datamenu['hoso'] = "active";
			$this->data['menu'] = $this->load->view('home/menu',$this->datamenu,true);
			$this->data['temp'] = $this->load->view('page/hoso_canhan',$data,true);
			$this->load->view('home/master',$this->data);
		}else{redirect(base_url());}
	}
	public function lichsu_apply()
	{
		$this->datamenu['ls'] = "active";
		$candidateid = $this->session->userdata('user')['candidateid'];
		$sql = "SELECT a.*, b.position, b.expdate FROM profilehistory a LEFT JOIN reccampaign b ON a.campaignid = b.campaignid WHERE a.candidateid = $candidateid AND a.actiontype = 'Apply'";
		$m_data['history'] = $this->Candidate_model->select_sql($sql);

		$this->data['menu'] = $this->load->view('home/menu',$this->datamenu,true);
		$this->data['temp'] = $this->load->view('page/lichsu_ungtuyen',$m_data,true);
		$this->load->view('home/master',$this->data);
	}
	public function lichsu_detail($campaignid)
	{
		$this->datamenu['ls'] = "active";

        $candidateid = $this->session->userdata('user')['candidateid'];
		$sql = "SELECT a.*, b.position,b.expdate FROM profilehistory a LEFT JOIN reccampaign b ON a.campaignid = b.campaignid WHERE a.campaignid = $campaignid AND a.candidateid = $candidateid";
		$m_data['campaigns'] = $this->Candidate_model->select_sql($sql)[0];
        // echo "<pre>";
        // print_r($m_data['campaigns']);
        // echo "</pre>";
        // exit();
		$this->data['menu'] = $this->load->view('home/menu',$this->datamenu,true);
		$this->data['temp'] = $this->load->view('page/lichsu_detail',$m_data,true);
		$this->load->view('home/master',$this->data);
	}
	public function update_introduce()
	{
		$frm = $this->input->post();
		$data['introduction'] = $frm['introduction'];
		$data['currentbenefit'] = $this->toInt($frm['cur_benefit']);
		$data['desirebenefit'] = $this->toInt($frm['desirebenefit']);
		$data['snid'] = $frm['snid'];

		if (!empty($_FILES['profilesrc']['name'])) {
	        $config['upload_path'] = './public/document/';
	        $config['allowed_types'] = '*';
	        $filename = preg_replace('([\s_&#%]+)', '-', $_FILES['profilesrc']['name']);
	        $config['file_name'] = $filename;
	    	$config['overwrite'] = FALSE;
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);

        	if ($this->upload->do_upload('profilesrc')) {
          		$uploadData = $this->upload->data();
          		$data2["tablename"] = 'candidate';
          		$data2["referencekey"] = $this->session->userdata('user')['candidateid'];
          		$data2["filename"] = $filename;
        		$data2["category"] = $uploadData['file_ext'];
        		$data2["subject"] = 'File CV';
        		$data2["author"] = $this->session->userdata('user')['candidateid'];
        		$data2["url"] = base_url().'public/document/'.$filename;
        		$data2["createdby"] = $this->session->userdata('user')['operatorid'];
        		$data2["updatedby"] = $this->session->userdata('user')['operatorid'];
        		$this->Candidate_model->InsertData('document',$data2);
       		 }
       		 else
       		 {
       		 	$datas['errors'] = $this->upload->display_errors();
       		 	header('location:hoso_canhan');
       		 }
	     }
	     else
	     {
	     	$datas['errors'] = $this->upload->display_errors();
	     }
	     //var_dump($data['errors']);
	      $this->Login_model->updateCandidate($this->session->userdata('user')['candidateid'],$data);
	      $this->Candidate_model->delete_real('tagtransaction',array('tablename' => 'candidate', 'recordid' => $this->session->userdata('user')['candidateid']));
	      $tag['tags'] = $frm['tags'];
	      $arr_tags = explode(',', $tag['tags']);
	      foreach ($arr_tags as $key => $value) {
	      	$data2 = array();
      		$row['data'] = $this->Candidate_model->checktagsprofile(array('title' =>  trim($value)));
			if(!is_array($row['data']))
			{	if(trim($value) == "")
				{
					continue;
				}
				$data1['title'] = trim($value);
				$data2['tagid'] = $this->Login_model->InsertData("tagprofile",$data1);
				$data2['tablename'] = "candidate";
				$data2['recordid'] = $this->session->userdata('user')['candidateid'];
				$data2['categoryid'] = "position";
				$this->Login_model->InsertData("tagtransaction",$data2);
			}
			else
			{
				$data2['tagid'] = $row['data']['tagid'];
				$data2['tablename'] = "candidate";
				$data2['recordid'] = $this->session->userdata('user')['candidateid'];
				$data2['categoryid'] = "position";
				$this->Login_model->InsertData("tagtransaction",$data2);
			}
		}
	      $this->cache->delete('candidate');
	      header('location:hoso_canhan');
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

	      $this->Login_model->updateCandidate($this->session->userdata('user')['candidateid'],$data);
	      $this->cache->delete('candidate');
	      header('location:hoso_canhan');

	      // echo $_FILES['image']['name'];
 	}
 	public function update_profile()
 	{
 		$frm = $this->input->post();
		$data['lastname']         = trim($frm['ten']);
		$data['firstname']        = trim($frm['ho']);
        $data['name']             = $data['firstname'].' '.$data['lastname'];
		$data['dateofbirth']      =  date("Y-m-d", strtotime($frm['ngaysinh1']));
		$data['gender']           = $frm['gender'];
		$data['placeofbirth']     = $frm['noisinh'];
		$data['ethnic']           = $frm['ethnic'];
		$data['nationality']      = $frm['quoctich'];
		$data['nativeland']       = $frm['nativeland'];
		$data['religion']         = $frm['religion'];
        $data['maritalstatus']    = $frm['maritalstatus'];
		$data['height']           = $frm['chieucao'];
		$data['weight']           = $frm['cannang'];
		$data['idcard']           = $frm['cmnd'];
		$data['dateofissue']      =  date("Y-m-d", strtotime($frm['dateofissue']));
		$data['placeofissue']     = $frm['placeofissue'];

		$this->Login_model->updateCandidate($this->session->userdata('user')['candidateid'],$data);
	     // header('location:hoso_canhan');
		$this->cache->delete('candidate');
		redirect(base_url('hoso_canhan.html/two'));
 	}
 	public function ins_upd_e_phone()
 	{
 		$frm = $this->input->post();
		$data['email'] = $frm['email'];

        if (trim($frm['dt1']) == '' && trim($frm['dt2']) == '') {
            $data['telephone'] = '';
        }else if (trim($frm['dt1']) == '' && trim($frm['dt2']) != '') {
            $data['telephone'] = ','.trim($frm['dt2']).',';
        }else if (trim($frm['dt1']) != '' && trim($frm['dt2']) == ''){
            $data['telephone'] = ','.trim($frm['dt1']).',';
        }else{
             $data['telephone'] = ','.trim($frm['dt1']).','.trim($frm['dt2']).',';
        }
		// $data['telephone'] = ','.$frm['dt1'].",".$frm['dt2'].',';
		$data['emergencycontact'] = $frm['dtkhancap'];
		$this->Login_model->updateCandidate($this->session->userdata('user')['candidateid'],$data);
		$this->cache->delete('candidate');
		redirect(base_url('hoso_canhan.html/three'));
 	}
 	public function ins_upd_address()
 	{
 		$frm = $this->input->post();
 		$data1['country'] = $frm['quocgia'];
		$data1['city'] = $frm['thanhpho'];
		$data1['district'] = $frm['quanhuyen'];
		$data1['ward'] = $frm['phuongxa'];
		$data1['street'] = $frm['duong'];
		$data1['addressno'] = $frm['toanha'];

		$_jsoncity = $this->Candidate_model->selectall('city');
    	foreach ($_jsoncity as $key ) {
    		if($key['id_city'] == $frm['thanhpho'])
    		{
    			$namecity = $key['name']; break;
    		}
    	}

    	 // $qh = json_decode(file_get_contents('https://hungminhits.com/api/list_district/'.$frm['thanhpho'].'',false, stream_context_create($arrContextOptions)),true)  ;
    	$qh = $this->Candidate_model->selectByWhere('district',array('id_city'=>$frm['thanhpho']));
    	foreach ($qh as $key ) {
    		if($key['id_district'] == $frm['quanhuyen'])
    		{
    			$nameqh = $key['name']; break;
    		}
    	}

    	// $px = json_decode(file_get_contents('https://hungminhits.com/api/list_ward/'.$frm['quanhuyen'].'',false, stream_context_create($arrContextOptions)),true)  ;
    	$px = $this->Candidate_model->selectByWhere('ward',array('id_district'=>$frm['quanhuyen']));
    	foreach ($px as $key ) {
    		if($key['id_ward'] == $frm['phuongxa'])
    		{
    			$namepx = $key['name']; break;
    		}
    	}
		if($frm['toanha'] == "")
		{
			$data1['address'] = $frm['duong'].", ".$namepx.", ".$nameqh.", ".$namecity;
		}else
		{
			$data1['address'] = $frm['toanha'].", ".$frm['duong'].", ".$namepx.", ".$nameqh.", ".$namecity;
		}
 		if($frm['checkup'] == "PREMANENT")
		{
			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'addtype' => "PREMANENT");
			$this->Login_model->UpdateData("canaddress",$array,$data1);

		}
		if($frm['checkup'] == "1")
		{

			$data1['addtype'] = "PREMANENT";
			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("canaddress",$data1);
		}
		if($frm['checkup'] == "CONTACT")
		{

			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'addtype' => "CONTACT");
			$this->Login_model->UpdateData("canaddress",$array,$data1);

		}
		if($frm['checkup'] == "2")
		{
			$data1['addtype'] = "CONTACT";
			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("canaddress",$data1);
		}
		 $this->cache->delete('address');
		redirect(base_url('hoso_canhan.html/three'));
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
			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("cansocial",$array,$data1);
 		}
 		else
 		{
 			$data1['type'] = $frm['quanhe'];
 			$data1['name'] = $frm['hoten'];
 			$data1['yob'] = $frm['namsinh'];
 			$data1['career'] = $frm['nghenghiep'];
			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("cansocial",$data1);
 		}
 		$this->cache->delete('family');
 		redirect(base_url('hoso_canhan.html/four'));
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
			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("canexperience",$array,$data1);
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
			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("canexperience",$data1);
 		}

 		$candidateid = $this->session->userdata('user')['candidateid'];
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
 		$this->cache->delete('experience');
 		redirect(base_url('hoso_canhan.html/five'));
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

			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("canreference",$array,$data1);
 		}
 		else
 		{
 			$data1['name'] = $frm['hoten'];
 			$data1['position'] = $frm['chucvu'];
 			$data1['company'] = $frm['congty'];
 			$data1['contactno'] = $frm['lienhe'];
			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("canreference",$data1);
 		}
 		$this->cache->delete('reference');
 		redirect(base_url('hoso_canhan.html/five'));
	}
	public function ins_upd_knowledge()
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
 				$array2 = array('candidateid' => $this->session->userdata('user')['candidateid'], 'highestcer' => "Y");
 				$data2 = array('highestcer' => "N");
 				$this->Login_model->UpdateData("canknowledge",$array2,$data2);
 			}
			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("canknowledge",$array,$data1);
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
			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			if(isset($frm['caonhat']) == true)
 			{
 				$array2 = array('candidateid' => $this->session->userdata('user')['candidateid'], 'highestcer' => "Y");
 				$data2 = array('highestcer' => "N");
 				$this->Login_model->UpdateData("canknowledge",$array2,$data2);
 			}
			$this->Login_model->InsertData("canknowledge",$data1);

 		}
 		$this->cache->delete('knowledge');
 		redirect(base_url('hoso_canhan.html/six'));
	}
 	public function ins_upd_knowledge_v2()
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

			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("canknowledge",$array,$data1);
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

			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("canknowledge",$data1);
 		}
 		$this->cache->delete('knowledge');
 		redirect(base_url('hoso_canhan.html/six'));
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

			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("canlanguage",$array,$data1);
 		}
 		else
 		{
 			$data1['language'] = $frm['tentruong'];
 			$data1['rate1'] = $frm['nghe'];
 			$data1['rate2'] = $frm['noi'];
 			$data1['rate3'] = $frm['doc'];
 			$data1['rate4'] = $frm['viet'];

			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("canlanguage",$data1);
 		}
 		$this->cache->delete('language');
 		redirect(base_url('hoso_canhan.html/seven'));
	}
	public function ins_upd_software()
	{
		$frm = $this->input->post();
 		if($frm['checkup'] != "0")
 		{
 			$data1['software'] = $frm['phanmem'];
 			$data1['rate1'] = $frm['trinhdo'];


			$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
			$this->Login_model->UpdateData("cansoftware",$array,$data1);
 		}
 		else
 		{
 			$data1['software'] = $frm['phanmem'];
 			$data1['rate1'] = $frm['trinhdo'];


			$data1['candidateid'] = $this->session->userdata('user')['candidateid'];
			$this->Login_model->InsertData("cansoftware",$data1);
 		}
 		$this->cache->delete('software');
 		redirect(base_url('hoso_canhan.html/seven'));
	}
	public function del_relationship()
	{
		$frm = $this->input->post();
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
		$this->Login_model->DeleteData("cansocial",$array);
		$this->cache->delete('family');
		redirect(base_url('hoso_canhan.html/four'));
	}
	public function del_experience()
	{
		$frm = $this->input->post();
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
		$this->Login_model->DeleteData("canexperience",$array);
		$this->cache->delete('experience');
		redirect(base_url('hoso_canhan.html/five'));
	}
	public function del_reference()
	{
		$frm = $this->input->post();
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
		$this->Login_model->DeleteData("canreference",$array);
		$this->cache->delete('reference');
		redirect(base_url('hoso_canhan.html/five'));
	}
	public function del_knowledge()
	{
		$frm = $this->input->post();
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
		$this->Login_model->DeleteData("canknowledge",$array);
		$this->cache->delete('knowledge');
		redirect(base_url('hoso_canhan.html/six'));
	}
	public function del_language()
	{
		$frm = $this->input->post();
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
		$this->Login_model->DeleteData("canlanguage",$array);
		$this->cache->delete('language');
		redirect(base_url('hoso_canhan.html/seven'));
	}
	public function del_software()
	{
		$frm = $this->input->post();
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'recordid' => $frm['checkup']);
		$this->Login_model->DeleteData("cansoftware",$array);
		$this->cache->delete('software');
		redirect(base_url('hoso_canhan.html/seven'));
	}
	public function del_address()
	{
		$frm = $this->input->post();
		$data1['country'] = "";
		$data1['city'] = "";
		$data1['district'] = "";
		$data1['ward'] = "";
		$data1['street'] = "";
		$data1['addressno'] = "";
		$data1['address'] ="";
		$array =  array('candidateid' => $this->session->userdata('user')['candidateid'], 'addtype' => $frm['checkup']);
		$this->Login_model->UpdateData("canaddress",$array,$data1);
		$this->cache->delete('address');
		redirect(base_url('hoso_canhan.html/three'));
	}
	public function selectCity()
    {
        $id_city = $this->input->post('id_city');
        $_jsoncity = $this->Candidate_model->selectByWhere('district',array('id_city'=>$id_city));
        // 	 $arrContextOptions=array(
        //     "ssl"=>array(
        //         "verify_peer"=>false,
        //         "verify_peer_name"=>false,
        //     ),
        // );
        // $_jsoncity = json_decode(file_get_contents('https://hungminhits.com/api/list_district/'.$id_city.'',false, stream_context_create($arrContextOptions)))  ;

        echo json_encode($_jsoncity);
    }

    public function selectDistrict()
    {
        $id_district = $this->input->post('id_district');
        // $arrContextOptions=array(
        //     "ssl"=>array(
        //         "verify_peer"=>false,
        //         "verify_peer_name"=>false,
        //     ),
        // );
        // $_jsoncity = json_decode(file_get_contents('https://hungminhits.com/api/list_ward/'.$id_district.'',false, stream_context_create($arrContextOptions)))  ;
        // $city = $_jsoncity;
        $city = $this->Candidate_model->selectByWhere('ward',array('id_district'=>$id_district));
        echo json_encode($city);
    }
    function toInt($str)
	{
	    return (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $str));
	}
	public function suggestions_tag()
	{
		$a = array();
		$_jsoncity = $this->Candidate_model->select_sugg_tag('tagprofile.title',array('tagtransaction.tablename' => 'candidate' , 'tagtransaction.categoryid' => 'position'));
		foreach ($_jsoncity as $key) {
			array_push($a, $key['title']);
		}
		echo json_encode($a);
	}
}
?>