<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interview extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','my_helper','file'));
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','admin/Mail_model'));
		$this->load->library('session');
		$this->load->library('upload');
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

            $filename = preg_replace('([\s_&#%]+)', '-', $image);

            $images[] = $_SERVER["DOCUMENT_ROOT"].'\public\document\\'.$filename;

            $config['file_name'] = $filename;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('attach[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }


	public function makingAppointment($interviewid, $interviewerid='')
	{
		$join[1] = array('table'=> 'document','match' =>'tb.operatorid = document.referencekey');
	    $o_data['operator'] = $this->Data_model->select_row_option('tb.operatorname,tb.operatorid,tb.email, document.filename',array('status' => 'W','candidateid' => 0),'','operator tb',$join,'','','','');
        $o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0'),'');
        $o_data['asmt_pv']      = $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
        $o_data['category'] = $this->Campaign_model->select("category,code,description,ref1,ref2",'codedictionary',array('status' => 'W'),'');
		$sql = "SELECT a.*, b.name, b.email, b.imagelink,c.position, d.status as status_asmt, e.optionid, e.ansdatetime, e.ansdatetime2 FROM interview a  LEFT JOIN candidate b ON a.candidateid = b.candidateid  LEFT JOIN reccampaign c ON a.campaignid = c.campaignid LEFT JOIN assessment d ON a.inv_asmtid = d.asmtid LEFT JOIN asmtanswer e ON a.inv_asmtid = e.asmtid WHERE a.interviewid = $interviewid";
		$result = $this->Campaign_model->select_sql($sql);
		$data['interview'] = $result[0];

		$join1[0] = array('table' => 'operator b','match' =>'a.interviewer = b.operatorid');
    	$join1[1] = array('table' => 'document c','match' =>'a.interviewer = c.referencekey');
        $join1[2] = array('table' => 'assessment d','match' =>'a.inv_asmtid = d.asmtid');
        $join1[3] = array('table' => 'asmtanswer e','match' =>'a.inv_asmtid = e.asmtid');
    	$data['interviewer'] = $this->Data_model->select_row_option('a.interviewerid,a.inv_asmtid,a.scr_asmtid, b.operatorname,b.email, c.filename, d.status as status_asmt, e.optionid, e.ansdatetime, e.ansdatetime2 ',array('a.interviewid'=>$interviewid),'','interviewer a',$join1,'','','','');
    	$data['operator'] = $o_data['operator'];

    	$this->_data['modal_campaign'] 	= $this->load->view('admin/campaign/modal_campaign',$o_data,true);
		$this->_data['temp'] = $this->load->view('admin/interview/makingAppointment',$data,true);
		$this->load->view('admin/home/master-iframe',$this->_data);
	}

	public function interview_question($interviewid, $interviewerid='')
	{
        if ($interviewid != 0) {
            $sql = "SELECT tt.*, candidate.name, candidate.email, candidate.imagelink,reccampaign.position FROM interview tt  LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  LEFT JOIN reccampaign ON tt.campaignid = reccampaign.campaignid WHERE tt.interviewid = $interviewid";
            $result = $this->Campaign_model->select_sql($sql);
            $this->data2['interview'] = $result[0];
            $this->data2['interviewerid'] = $interviewerid;
            $id = $result[0]['candidateid'];
            $campaignid = $result[0]['campaignid'];
            $roundid = $result[0]['roundid'];
        }else{
            $this->data2['interview'] = array();
            $this->data2['interview']['name'] = 'Đỗ Phương Nam';
            $this->data2['interview']['position'] = 'Giám đốc đầu tư';
            $this->data2['interviewerid'] = $interviewerid;
            $id = 1;
            $campaignid = 2;
            $roundid = 3;
        }

		$this->data2['campaignid'] 	= $campaignid;
		$this->data2['roundid'] 	= $roundid;
		$match = array('campaignid' => $campaignid, 'roundid' => $roundid);
		$this->data2['campaignname'] 	=	($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid,),''))[0]['position'];
		$this->data2['roundtype'] 		=	($this->Campaign_model->select("roundtype",'recflow',$match,''))[0]['roundtype'];

		$this->data2['id'] = $id;
		$join[0] = array('table'=> 'operator','match' =>'tb.createdby = operator.operatorid');
        $join[1] = array('table'=> 'document','match' =>'tb.createdby = document.referencekey');
        $orderby = array('colname'=>'tb.createddate','typesort'=>'desc');
        $history_cmt = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id),'','cancomment tb',$join,'',$orderby,'','');

        $type = array('Talent','Nottalent','Trust','Block');
        $history_profile1       = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id, 'tb.campaignid' => 0),'','profilehistory tb',$join,'',$orderby,'','');
        $history_profile2       = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','profilehistory tb',$join,'',$orderby,'','');
        $join[2] = array('table'=> 'operator c','match' =>'tb.updatedby = c.operatorid');
        $history_profile3       = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','assessment tb',$join,'',$orderby,'','');
        $history_profile4       = $this->Data_model->select_row_option('tb.*, operator.operatorname, document.filename, c.operatorname as nameupdate',array('tb.candidateid'=>$id,'tb.campaignid' => $campaignid),'','interview tb',$join,'',$orderby,'','');
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

		$this->data2['city']        = $this->Campaign_model->selectall('city');
        $this->data2['document']    = $this->Candidate_model->first_row('document',array('referencekey'=>$id,'tablename' => 'candidate'),'filename,url','');
        $this->data2['comment']     = $this->Candidate_model->first_row('cancomment',array('candidateid' => $id, 'rate !=' => 0),'AVG(rate) AS scores','');
		$this->data2['address']     = $this->Candidate_model->selectTableByIds('canaddress',$id);
		$this->data2['candidate']   = $this->Candidate_model->selectTableById('candidate',$id);
		$this->data2['family']      = $this->Candidate_model->selectTableByIds('cansocial',$id);
		$this->data2['experience']  = $this->Candidate_model->selectTableByIds('canexperience',$id);
		$this->data2['vt']          = $this->Candidate_model->selectTableGroupBy('position,company','canexperience',$id,'dateto');
		$this->data2['reference']   = $this->Candidate_model->selectTableByIds('canreference',$id);
		$this->data2['knowledge']   = $this->Candidate_model->selectTableByIds('canknowledge',$id);
		$this->data2['language']    = $this->Candidate_model->selectTableByIds('canlanguage',$id);
		$this->data2['software']    = $this->Candidate_model->selectTableByIds('cansoftware',$id);
		$sql = "SELECT count(recordid) as count FROM profilehistory WHERE candidateid = '$id' AND actiontype = 'Recruite'";
		$this->data2['recruite']    = $this->Campaign_model->select_sql($sql)[0]['count'];


		$this->_data['temp'] = $this->load->view('admin/interview/interview_question',$this->data2,true);
		$this->load->view('admin/home/master-iframe',$this->_data);
	}


	public function invitationcard($interviewid, $interviewerid='')
	{
        if($interviewid != 0){
    		$sql = "SELECT tt.*, candidate.name,reccampaign.position FROM interview tt LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  LEFT JOIN reccampaign ON tt.campaignid = reccampaign.campaignid WHERE tt.interviewid = $interviewid";
    		$result = $this->Campaign_model->select_sql($sql);
    		$data['interview'] = $result[0];
            $data['inv_asmtid'] = $result[0]['inv_asmtid'];
        }else{
            $data['interview']              = array();
            $data['interview']['name']      = 'Đỗ Phương Nam';
            $data['interview']['position']  = 'Giám đốc đầu tư';
            $data['interview']['intdate']   = '2018-11-20';
            $data['interview']['timefrom']  = '2018-11-20 09:00:00';
            $data['interview']['timeto']    = '2018-11-20 10:00:00';
            $data['interview']['location']  = 'Tòa nhà Đất xanh';
            $data['interview']['notes']     = 'Trao đổi về vị trí công việc';
        }
		if ($interviewerid !='') {
			$data['interviewerid'] = $interviewerid;
            $sql = "SELECT inv_asmtid  FROM interviewer WHERE interviewer = $interviewerid AND interviewid = $interviewid";
            $result = $this->Campaign_model->select_sql($sql);
            $data['inv_asmtid'] = $result[0]['inv_asmtid'];
		}
        $inv_asmtid = $data['inv_asmtid'];
        $sql = "SELECT status  FROM assessment WHERE asmtid = $inv_asmtid";
        $result = $this->Campaign_model->select_sql($sql);
        $data['status'] = $result[0]['status'];
		$data['interviewid'] = $interviewid;
		$this->_data['temp'] = $this->load->view('admin/interview/invitationcard',$data,true);

		$this->load->view('admin/home/master-iframe',$this->_data);
	}

    public function interviewByDate()
    {
        $frm        = $this->input->post();
        $intdate    = date('Y-m-d',strtotime(str_replace('/', '-', $frm['intdate'])));
        $campaignid = $frm['campaignid'];
        $sql = "SELECT a.interviewid, a.timefrom, a.timeto, b.name
                FROM interview a
                LEFT JOIN candidate b ON a.candidateid = b.candidateid
                WHERE a.intdate = '$intdate' AND a.campaignid = $campaignid";
        $result = $this->Campaign_model->select_sql($sql);

        for ($i=0; $i < count($result); $i++) {
            $interviewid = $result[$i]['interviewid'];
            $sql1 = "SELECT  b.operatorname
                FROM interviewer a
                LEFT JOIN operator b ON a.interviewer = b.operatorid
                WHERE a.interviewid =  $interviewid";
            $result1 = $this->Campaign_model->select_sql($sql1);
            $interviewer = '';
            foreach ($result1 as $key) {
                if ($interviewer == '') {
                    $interviewer .= $key['operatorname'];
                }else{
                    $interviewer .= $key['operatorname'].'/ ';
                }
            }
            $result[$i]['interviewer']  = $interviewer;
            $result[$i]['timefrom']     = date_format(date_create($result[$i]['timefrom']),"H:i");
            $result[$i]['timeto']       = date_format(date_create($result[$i]['timeto']),"H:i");
        }

        echo json_encode($result);
    }

    public function saveAppointment()
    {
    	$frm               = $this->input->post();
    	$data              = array();
    	$intdate 			= $frm['intdate'];
    	$campaignid 		= $frm['campaignid'];
    	$roundid 		    = $frm['roundid'];
    	$count 		        = $frm['count'];
    	if (isset($frm['private'])) {
    		$data['private'] = $private;
    		unset($frm['private']);
    	}
    	unset($frm['intdate']);
    	unset($frm['campaignid']);
    	unset($frm['roundid']);
    	unset($frm['count']);

        $ngay_tam = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $intdate)));
        $thu = date_format(date_create($ngay_tam),"N");
        if ($thu != 7) {
            $temp = (int)$thu+1;
            if ($temp == 2) {
                $t = 'Hai';
            }else if ($temp == 3) {
                $t = 'Ba';
            }else if ($temp == 4) {
                $t = 'Tư';
            }else if ($temp == 5) {
                $t = 'Năm';
            }else if ($temp == 6) {
                $t = 'Sáu';
            }else if ($temp == 7) {
                $t = 'Bảy';
            }
            $thu = 'Thứ '.$t;
        }else{
            $thu = 'Chủ Nhật';
        }
        $ngaypv = $thu.' ngày '.$intdate;

    	$mail = array();
    	for ($k=1; $k <= 2 ; $k++) {
            $a = $k+1;
    		$to[$k]                 = $frm['to'.$k];
    		$subject[$k]            = html_entity_decode($frm['subject'.$k]);
	    	$cc[$k] 		        = $frm['cc_'.$k];
	    	$bcc[$k] 		        = $frm['bcc_'.$k];
	    	$body[$k] 				= html_entity_decode($frm['body'.$a]);
            $presender[$k]          = $frm['presender'.$a];

    	}
        // var_dump($cc);exit;
        $fileattach_1           = $this->upload_files('public/document/',$_FILES['attach1']);
        if($fileattach_1 == false){
            if($frm['preattach1'] != '' && $frm['preattach1'] != 'false'){
                $fileattach_1 = array();
                $temp = json_decode($frm['preattach1'],true);
                for ($f=0; $f < count($temp); $f++) {
                    array_push($fileattach_1, base_url().'public/document/'.$temp[$f]);
                }
            }else{
                $fileattach_1 = '';
            }
        }

        $fileattach_2           = $this->upload_files('public/document/',$_FILES['attach2']);
        if($fileattach_2 == false){
            if($frm['preattach2'] != '' && $frm['preattach2'] != 'false'){
                $fileattach_2 = array();
                $temp = json_decode($frm['preattach2'],true);
                for ($f=0; $f < count($temp); $f++) {
                    array_push($fileattach_2, base_url().'public/document/'.$temp[$f]);
                }
            }else{
                $fileattach_2 = '';
            }
        }
        // var_dump($fileattach_1);
        // var_dump($fileattach_2);
        // exit();
        $roundname              = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
        $position               = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];

        $interviewid            = array();
        $notes                  = array();
        $arr_ngaypv             = array();
    	for ($j=1; $j <= $count; $j++) {
    		$key = $frm['profile_'.$j];

    		//lưu phiếu mời phỏng vấn ứng viên
    		$a_data['asmttemp']				= '1';
    		$a_data['candidateid']			= $key[0];
    		$a_data['campaignid']			= $campaignid;
    		$a_data['roundid']				= $roundid;
            $a_data['sysform']              = 'N';
            $a_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
    		$asmtid = $this->Data_model->insert('assessment',$a_data);

            //lưu genquest
            $g_data['asmtid']               = $asmtid;
            $g_data['questionid']           = '1';
            $g_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
            $this->Data_model->insert('genquest',$g_data);

    		//save interview
    		$data['candidateid'] 	= $key[0];
            $data['campaignid'] 	= $campaignid;
            $data['roundid'] 		= $roundid;
            $data['intdate']		= date('Y-m-d',strtotime(str_replace('/', '-', $intdate)));
            $timefrom 				= $intdate.' '.$key[3];
            $timeto 				= $intdate.' '.$key[4];
            $data['inttype']		= $key[2];
            $data['timefrom']		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $timefrom)));
            $data['timeto']			= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $timeto)));
            $data['location']		= $key[5];
            $data['notes']			= $key[6];
            $data['inv_asmtid']		= $asmtid;
            $data['createdby']   	= $this->session->userdata('user_admin')['operatorid'];
            $interviewid[$j]        = $this->Data_model->insert('interview',$data);

            $notes[$j]              = $key[6];
            $arr_ngaypv[$j]         = $key[3].' → '.$key[4].' '.$ngaypv;
    		//interviewer
    		$link1 = '';
    		$interviewer            = explode(',',$key[7]);
            $asmt_pv                = $frm['pv'];

            $f = 0;
            $arr_to                 = explode(',',$to[2]);
    		foreach ($interviewer as $row) {
    			if ($row == '') {
    				continue;
    			}
    			//lưu phiếu mời phỏng vấn tuyển dụng viên
	    		$a_data['asmttemp']				= 1;
	    		$a_data['candidateid']			= (int)$key[0];
	    		$a_data['pic']					= (int)$row;
	    		$a_data['campaignid']			= (int)$campaignid;
	    		$a_data['roundid']				= (int)$roundid;
                $a_data['sysform']              = 'N';
                $a_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
	    		$asmtid = $this->Data_model->insert('assessment',$a_data);

                //lưu genquest
                $g_data['asmtid']               = $asmtid;
                $g_data['questionid']           = '1';
                $g_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
                $this->Data_model->insert('genquest',$g_data);

                //lưu phiếu đánh giá cho tuyển dụng viên
                $a_data['asmttemp']             = (int)$asmt_pv[$f];
                $a_data['candidateid']          = (int)$key[0];
                $a_data['pic']                  = (int)$row;
                $a_data['campaignid']           = (int)$campaignid;
                $a_data['roundid']              = (int)$roundid;
                $a_data['sysform']              = 'N';
                $a_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
                $scr_asmtid = $this->Data_model->insert('assessment',$a_data);

    			//save interviewer
    			$i_data['interviewid']	= $interviewid[$j];
        		$i_data['interviewer']	= (int)$row;
        		$i_data['status']		= 'W';
        		$i_data['marked']		= '';
        		$i_data['inv_asmtid']	= $asmtid;
    			$i_data['scr_asmtid']	= $scr_asmtid;
        		$i_data['createdby']	= $this->session->userdata('user_admin')['operatorid'];
        		$this->Data_model->insert('interviewer',$i_data);

        		// //mail interviewer
                if($presender[2] == 'usersession'){
                    if ($this->session->userdata('user_admin')['mcssl'] == '1') {
                        $mail['mcsmtp'] = 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
                    }else{
                        $mail['mcsmtp'] = $this->session->userdata('user_admin')['mcsmtp'];
                    }
                    $mail['mcuser'] = $this->session->userdata('user_admin')['mcuser'];
                    $mail['mcpass'] = base64_decode($this->session->userdata('user_admin')['mcpass']);
                    $mail['mcport'] = $this->session->userdata('user_admin')['mcport'];
                }else{
                    $arrayName1 = array('operatorname' => 'mailsystem' );
                    $mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
                    if ($mailSystem[0]['mcssl'] == '1') {
                        $mail['mcsmtp'] = 'ssl://'.$mailSystem[0]['mcsmtp'];
                    }else{
                        $mail['mcsmtp'] = $mailSystem[0]['mcsmtp'];
                    }
                    $mail['mcuser'] = $mailSystem[0]['mcuser'];
                    $mail['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
                    $mail['mcport'] = $mailSystem[0]['mcport'];
                }
        		$operator = ($this->Campaign_model->select("ref1,ref2",'codedictionary',array('code' => $row,'category'=>'ERP'),''))[0];

                $user = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $key[0]),'');
                if (isset($user[0])) {
                    $lastname   = $user[0]['lastname'];
                    $name       = $user[0]['name'];
                    $link       = '<a href="'.base_url().'admin/interview/invitationcard/'.$interviewid[$j].'/'.$row.'" >Lịch '.$roundname.' - '.$name.'</a>';
                }else{
                    $lastname   = 'Bạn';
                    $name       = 'Bạn';
                    $link       = '<a href="'.base_url().'admin/interview/invitationcard/0/" >Lịch '.$roundname.' - '.$name.'</a>';
                }
                $link1 = '<a href="'.base_url().'admin/multiplechoice/interview_question/'.$interviewid[$j].'/'.$row.'" >Phiếu '.$roundname.' - '.$key[1].'</a>';

                $chuoi_tim      = array('[Tuyển dụng viên]','[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu mời tham dự phỏng vấn]','[Ghi chú]','[Vị trí]','[Link phiếu đánh giá]','[Ngày giờ phỏng vấn]');
                $chuoi_thay_the         = array($operator['ref1'],$name,$roundname,$lastname,$link,$key[6],$position,$link1,$arr_ngaypv[$j]);
                $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject[2]);
                $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body[2]);
                $mail['toemail']        = $operator['ref2'];
                // $mail['toemail']        = 'heodat234@gmail.com';
                $mail['cc']             = $cc[2];
                $mail['bcc']            = $bcc[2];
                if ($fileattach_2 != '') {
                    $mail['attachment']     = $fileattach_2;
                }
                // var_dump($mail);exit;
                $this->Mail_model->sendMail($mail);

                $mail1['fromemail']         = $mail['mcuser'];
                $mail1['toemail']           = $mail['toemail'];
                $mail1['cc']                = $mail['cc'];
                $mail1['bcc']               = $mail['bcc'];
                $mail1['emailbody']         = $mail['emailbody'];
                $mail1['emailsubject']      = $mail['emailsubject'];
                $mail1["attachment"]        = json_encode($fileattach_2);
                $mail1['createdby']         = $this->session->userdata('user_admin')['operatorid'];
                $this->Mail_model->insert('mailtable',$mail1);

                $f++;
    		}

    	}
        $mail_in = array();
        //mail interview
        if($presender[1] == 'usersession'){
            if ($this->session->userdata('user_admin')['mcssl'] == '1') {
                $mail_in['mcsmtp'] = 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
            }else{
                $mail_in['mcsmtp'] = $this->session->userdata('user_admin')['mcsmtp'];
            }
            $mail_in['mcuser'] = $this->session->userdata('user_admin')['mcuser'];
            $mail_in['mcpass'] = base64_decode($this->session->userdata('user_admin')['mcpass']);
            $mail_in['mcport'] = $this->session->userdata('user_admin')['mcport'];
        }else{
            $arrayName1 = array('operatorname' => 'mailsystem' );
            $mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
            if ($mailSystem[0]['mcssl'] == '1') {
                $mail_in['mcsmtp'] = 'ssl://'.$mailSystem[0]['mcsmtp'];
            }else{
                $mail_in['mcsmtp'] = $mailSystem[0]['mcsmtp'];
            }
            $mail_in['mcuser'] = $mailSystem[0]['mcuser'];
            $mail_in['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
            $mail_in['mcport'] = $mailSystem[0]['mcport'];
        }
        $c = 1;
        $arr                 = explode(',',$bcc[1]);
        foreach ($arr as $key) {
            if (isset($frm['profile_'.$c][0])) {
                $candidateid_mail = $frm['profile_'.$c][0];
            }else{
                $candidateid_mail = '';
            }

            $user = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidateid_mail),'');
            if (isset($user[0])) {
                $lastname   = $user[0]['lastname'];
                $name       = $user[0]['name'];
                $link       = '<a href="'.base_url().'admin/interview/invitationcard/'.$interviewid[$c].'/" >Lịch '.$roundname.' - '.$name.'</a>';
            }else{
                $lastname   = 'Bạn';
                $name       = 'Bạn';
                $link       = '<a href="'.base_url().'admin/interview/invitationcard/0/" >Lịch '.$roundname.' - '.$name.'</a>';
            }
            $chuoi_tim      = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu mời tham dự phỏng vấn]','[Ghi chú]','[Vị trí]','[Ngày giờ phỏng vấn]');
            $chuoi_thay_the = array($name,$roundname,$lastname,$link,$notes[$c],$position,isset($arr_ngaypv[$c]) ? $arr_ngaypv[$c] : $arr_ngaypv[$c-1]);
            $mail_in['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject[1]);
            $mail_in['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body[1]);
            $mail_in['toemail']        = $key;
            $mail_in['cc']             = $cc[1];
            $mail_in['bcc']            = '';
            if ($fileattach_1 != '') {
                $mail_in['attachment']     = $fileattach_1;
            }

            $this->Mail_model->sendMail($mail_in);
            // var_dump($mail);exit;
            $mail1['fromemail']         = $mail_in['mcuser'];
            $mail1['toemail']           = $key;
            $mail1['cc']                = $mail_in['cc'];
            $mail1['bcc']               = $mail_in['bcc'];
            $mail1['emailbody']         = $mail_in['emailbody'];
            $mail1['emailsubject']      = $mail_in['emailsubject'];
            $mail1["attachment"]        = json_encode($fileattach_1);
            $mail1['createdby']         = $this->session->userdata('user_admin')['operatorid'];
            $this->Mail_model->insert('mailtable',$mail1);
            $c++;
        }
        echo json_encode(1);
    }

    public function saveAddInterviewer()
    {
    	$frm = $this->input->post();
        $candidateid            = $frm['candidateid'];
        $campaignid             = $frm['campaignid'];
        $roundid                = $frm['roundid'];
    	$interviewer            = explode(',',$frm['profile']);
        $to                     = explode(',',$frm['to']);
    	$subject            	= html_entity_decode($frm['subject']);
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
        $body                   = html_entity_decode($frm['body10']);

        $asmt_pv                = $frm['pv'];
        $f = 0;
		foreach ($interviewer as $row) {
			if ($row == '') {
				continue;
			}
            $a_data['asmttemp']             = '1';
            $a_data['candidateid']          = $frm['candidateid'];
            $a_data['pic']                  = $row;
            $a_data['campaignid']           = $campaignid;
            $a_data['roundid']              = $roundid;
            $a_data['sysform']              = 'N';
            $a_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
            $asmtid = $this->Data_model->insert('assessment',$a_data);

            //lưu genquest
            $g_data['asmtid']               = $asmtid;
            $g_data['questionid']           = '1';
            $g_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
            $this->Data_model->insert('genquest',$g_data);

            //lưu phiếu đánh giá cho tuyển dụng viên
            $a_data['asmttemp']             = $asmt_pv[$f];
            $a_data['candidateid']          = $frm['candidateid'];
            $a_data['pic']                  = $row;
            $a_data['campaignid']           = $campaignid;
            $a_data['roundid']              = $roundid;
            $a_data['sysform']              = 'N';
            $a_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
            $scr_asmtid = $this->Data_model->insert('assessment',$a_data);

			$i_data['interviewid']	= $frm['interviewid'];
    		$i_data['interviewer']	= $row;
    		$i_data['status']		= 'W';
    		$i_data['marked']		= '';
    		$i_data['inv_asmtid']	= $asmtid;
            $i_data['scr_asmtid']   = $scr_asmtid;
    		$i_data['createdby']	= $this->session->userdata('user_admin')['operatorid'];
    		$this->Data_model->insert('interviewer',$i_data);
            $f++;
		}
        //mail interview
        if (isset($frm['checkmail'])) {
            if($frm['presender'] == 'usersession'){
                if ($this->session->userdata('user_admin')['mcssl'] == '1') {
                    $mail['mcsmtp'] = 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
                }else{
                    $mail['mcsmtp'] = $this->session->userdata('user_admin')['mcsmtp'];
                }
                $mail['mcuser'] = $this->session->userdata('user_admin')['mcuser'];
                $mail['mcpass'] = base64_decode($this->session->userdata('user_admin')['mcpass']);
                $mail['mcport'] = $this->session->userdata('user_admin')['mcport'];
            }else{
                $arrayName1 = array('operatorname' => 'mailsystem' );
                $mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
                if ($mailSystem[0]['mcssl'] == '1') {
                    $mail['mcsmtp'] = 'ssl://'.$mailSystem[0]['mcsmtp'];
                }else{
                    $mail['mcsmtp'] = $mailSystem[0]['mcsmtp'];
                }
                $mail['mcuser'] = $mailSystem[0]['mcuser'];
                $mail['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
                $mail['mcport'] = $mailSystem[0]['mcport'];
            }

            $fileattach         = $this->upload_files('public/document/',$_FILES['attach']);
            if($fileattach == false){
                if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
                    $fileattach = array();
                    $temp = json_decode($frm['preattach'],true);
                    for ($f=0; $f < count($temp); $f++) {
                        array_push($fileattach, base_url().'public/document/'.$temp[$f]);
                    }
                }
            }
            $roundname          = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
            $position           = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];

            $j= 0;
            foreach ($to as $key) {
                if (isset($interviewer[$j])) {
                   $interviewerid = $interviewer[$j];
                }else{
                    $interviewerid = 0;
                }
                $operator       = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $interviewerid),''))[0];
                $user           = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $frm['candidateid']),'');
                if (isset($user[0])) {
                    $lastname   = $user[0]['lastname'];
                    $name       = $user[0]['name'];
                    $link       = '<a href="'.base_url().'admin/interview/invitationcard/'.$frm['interviewid'].'/" >Lịch '.$roundname.' - '.$name.'</a>';
                }else{
                    $lastname   = 'Bạn';
                    $name       = 'Bạn';
                    $link       = '<a href="'.base_url().'admin/interview/invitationcard/0/" >Lịch '.$roundname.' - '.$name.'</a>';
                }
                $link1 = '<a href="'.base_url().'admin/multiplechoice/interview_question/'.$frm['interviewid'].'/'.$interviewerid.'" >Phiếu '.$roundname.' - '.$name.'</a>';

                $chuoi_tim              = array('[Tuyển dụng viên]','[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu mời tham dự phỏng vấn]','[Link phiếu đánh giá]','[Vị trí]');
                $chuoi_thay_the         = array($operator['operatorname'],$name,$roundname,$lastname,$link,$link1,$position);
                $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
                $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
                $mail['toemail']        = $key;
                $mail['attachment']     = $fileattach;
                $this->Mail_model->sendMail($mail);

                $mail1['fromemail']         = $mail['mcuser'];
                $mail1['toemail']           = $key;
                $mail1['cc']                = $mail['cc'];
                $mail1['bcc']               = $mail['bcc'];
                $mail1['emailbody']         = $mail['emailbody'];
                $mail1['emailsubject']      = $mail['emailsubject'];
                $mail1["attachment"]        = json_encode($fileattach);
                $mail1['createdby']         = $this->session->userdata('user_admin')['operatorid'];
                $this->Mail_model->insert('mailtable',$mail1);
                $j++;
            }
        }
		redirect(base_url('admin/interview/makingAppointment/'.$frm['interviewid'].'/'.$i_data['createdby']));
    }

    public function removeInterviewer()
    {
    	$frm = $this->input->post();
        $candidateid            = $frm['candidateid'];
        $campaignid             = $frm['campaignid'];
        $roundid                = $frm['roundid'];
        $note                       = $frm['note'];
        $fileattach                 = $this->upload_files('public/document/',$_FILES['attach1']);
        if($fileattach == false){
            if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
                $fileattach = array();
                $temp = json_decode($frm['preattach'],true);
                for ($f=0; $f < count($temp); $f++) {
                    array_push($fileattach, base_url().'public/document/'.$temp[$f]);
                }
            }
        }else{
            $fileattach = '';
        }
		$mail["attachment"]         = $fileattach;

		$match                      = array('interviewid' => $frm['interviewid'],'interviewerid' => $frm['interviewer']);
		$i_data['status']		    = 'C';
		$i_data['updatedby']	    = $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interviewer',$match,$i_data);

		//mail interview
        if (isset($frm['checkmail'])) {
            if($frm['presender'] == 'usersession'){
                if ($this->session->userdata('user_admin')['mcssl'] == '1') {
                    $mail['mcsmtp'] = 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
                }else{
                    $mail['mcsmtp'] = $this->session->userdata('user_admin')['mcsmtp'];
                }
                $mail['mcuser'] = $this->session->userdata('user_admin')['mcuser'];
                $mail['mcpass'] = base64_decode($this->session->userdata('user_admin')['mcpass']);
                $mail['mcport'] = $this->session->userdata('user_admin')['mcport'];
            }else{
                $arrayName1 = array('operatorname' => 'mailsystem' );
                $mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
                if ($mailSystem[0]['mcssl'] == '1') {
                    $mail['mcsmtp'] = 'ssl://'.$mailSystem[0]['mcsmtp'];
                }else{
                    $mail['mcsmtp'] = $mailSystem[0]['mcsmtp'];
                }
                $mail['mcuser'] = $mailSystem[0]['mcuser'];
                $mail['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
                $mail['mcport'] = $mailSystem[0]['mcport'];
            }

            $subject                 = html_entity_decode($frm['subject']);
            $mail['toemail']         = $frm['to'];
            $mail['cc']              = $frm['cc'];
            $mail['bcc']             = $frm['bcc'];
            $body                    = html_entity_decode($frm['body17']);
            $roundname               = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
            $position                = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
            $user                    = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $frm['candidateid']),'');
            if (isset($user[0])) {
                $lastname   = $user[0]['lastname'];
                $name       = $user[0]['name'];
            }else{
                $lastname   = 'Bạn';
                $name       = 'Bạn';
            }
            $chuoi_tim              = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Ghi chú]','[Vị trí]');
            $chuoi_thay_the         = array($name,$roundname,$lastname,$note,$position);
            $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
            $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
            $this->Mail_model->sendMail($mail);

            $mail1['fromemail']         = $mail['mcuser'];
            $mail1['toemail']           = $mail['toemail'];
            $mail1['cc']                = $mail['cc'];
            $mail1['bcc']               = $mail['bcc'];
            $mail1['emailbody']         = $mail['emailbody'];
            $mail1['emailsubject']      = $mail['emailsubject'];
            $mail1["attachment"]        = json_encode($fileattach);
            $mail1['createdby']         = $this->session->userdata('user_admin')['operatorid'];
            $this->Mail_model->insert('mailtable',$mail1);
        }

		redirect(base_url('admin/interview/makingAppointment/'.$frm['interviewid'].'/'.$i_data['updatedby']));

    }

    public function cancelAppointment()
    {
    	$frm = $this->input->post();
        $candidateid            = $frm['candidateid'];
        $campaignid             = $frm['campaignid'];
        $roundid                = $frm['roundid'];
        $note                   = $frm['note'];
    	$subject            	= html_entity_decode($frm['subject']);
        $mail['toemail']        = $frm['to'];
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
		$body                   = html_entity_decode($frm['body15']);
        $fileattach             = $this->upload_files('public/document/',$_FILES['attach1']);
        if($fileattach == false){
            if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
                $fileattach = array();
                $temp = json_decode($frm['preattach'],true);
                for ($f=0; $f < count($temp); $f++) {
                    array_push($fileattach, base_url().'public/document/'.$temp[$f]);
                }
            }
        }else{
            $fileattach = '';
        }
        $mail["attachment"]     = $fileattach;
        //update status
		$match  = array('interviewid' => $frm['interviewid']);
        if (isset($frm['isshare'])) {
            $i_data["isshare"]  = $frm['isshare'];
        }
		$i_data['status']		= 'D';
		$i_data['updatedby']	= $this->session->userdata('user_admin')['operatorid'];
        $i_data['lastupdate']   = date('Y-m-d H:i:s');
		$this->Data_model->update('interview',$match,$i_data);

        $i_data          = ($this->Campaign_model->select("intdate,timefrom,timeto",'interview',$match,''))[0];
        $thu = date_format(date_create($i_data['intdate']),"N");

        if ($thu != 7) {
            $temp = (int)$thu+1;
            if ($temp == 2) {
                $t = 'Hai';
            }else if ($temp == 3) {
                $t = 'Ba';
            }else if ($temp == 4) {
                $t = 'Tư';
            }else if ($temp == 5) {
                $t = 'Năm';
            }else if ($temp == 6) {
                $t = 'Sáu';
            }else if ($temp == 7) {
                $t = 'Bảy';
            }
            $thu = 'Thứ '.$t;
        }else{
            $thu = 'Chủ Nhật';
        }
        $ngay =  date_format(date_create($i_data['intdate']),"d");
        $thang =  date_format(date_create($i_data['intdate']),"m");
        $nam =  date_format(date_create($i_data['intdate']),"Y");
        $from =  date_format(date_create($i_data['timefrom']),"H:i");
        $to =  date_format(date_create($i_data['timeto']),"H:i");
        $intdate = $from.' → '.$to.' '.$thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam;
		//mail interview
        if (isset($frm['checkmail'])) {
            if($frm['presender'] == 'usersession'){
                if ($this->session->userdata('user_admin')['mcssl'] == '1') {
                    $mail['mcsmtp'] = 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
                }else{
                    $mail['mcsmtp'] = $this->session->userdata('user_admin')['mcsmtp'];
                }
                $mail['mcuser'] = $this->session->userdata('user_admin')['mcuser'];
                $mail['mcpass'] = base64_decode($this->session->userdata('user_admin')['mcpass']);
                $mail['mcport'] = $this->session->userdata('user_admin')['mcport'];
            }else{
                $arrayName1 = array('operatorname' => 'mailsystem' );
                $mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
                if ($mailSystem[0]['mcssl'] == '1') {
                    $mail['mcsmtp'] = 'ssl://'.$mailSystem[0]['mcsmtp'];
                }else{
                    $mail['mcsmtp'] = $mailSystem[0]['mcsmtp'];
                }
                $mail['mcuser'] = $mailSystem[0]['mcuser'];
                $mail['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
                $mail['mcport'] = $mailSystem[0]['mcport'];
            }

    		$roundname            = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
            $position             = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
            $user                 = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidateid),'');
            if (isset($user[0])) {
                $lastname         = $user[0]['lastname'];
                $name             = $user[0]['name'];
            }else{
                $lastname         = 'Bạn';
                $name             = 'Bạn';
            }
            $chuoi_tim              = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Ghi chú]','[Vị trí]','[Ngày giờ phỏng vấn]');
            $chuoi_thay_the         = array($name,$roundname,$lastname,$note,$position,$intdate);
            $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
            $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
            $this->Mail_model->sendMail($mail);

            $mail1['fromemail']         = $mail['mcuser'];
            $mail1['toemail']           = $mail['toemail'];
            $mail1['cc']                = $mail['cc'];
            $mail1['bcc']               = $mail['bcc'];
            $mail1['emailbody']         = $mail['emailbody'];
            $mail1['emailsubject']      = $mail['emailsubject'];
            $mail1["attachment"]        = json_encode($fileattach);
            $mail1['createdby']         = $this->session->userdata('user_admin')['operatorid'];
            $this->Mail_model->insert('mailtable',$mail1);
        }
        redirect(base_url('admin/interview/makingAppointment/'.$frm['interviewid'].'/'.$i_data['updatedby']));
    }

    public function changeAppointment()
    {
    	$frm = $this->input->post();
        $candidateid            = $frm['candidateid'];
        $campaignid             = $frm['campaignid'];
        $roundid                = $frm['roundid'];
    	$subject                = html_entity_decode($frm['subject']);
        $mail['toemail']        = $frm['to'];
        $mail['cc']             = $frm['cc'];
        $mail['bcc']            = $frm['bcc'];
        $body                   = html_entity_decode($frm['body16']);
        $fileattach             = $this->upload_files('public/document/',$_FILES['attach1']);
        if($fileattach == false){
            if($frm['preattach'] != '' && $frm['preattach'] != 'false'){
                $fileattach = array();
                $temp = json_decode($frm['preattach'],true);
                for ($f=0; $f < count($temp); $f++) {
                    array_push($fileattach, base_url().'public/document/'.$temp[$f]);
                }
            }
        }else{
            $fileattach = '';
        }

        if($frm['presender'] == 'usersession'){
            if ($this->session->userdata('user_admin')['mcssl'] == '1') {
                $mail['mcsmtp'] = 'ssl://'.$this->session->userdata('user_admin')['mcsmtp'];
            }else{
                $mail['mcsmtp'] = $this->session->userdata('user_admin')['mcsmtp'];
            }
            $mail['mcuser'] = $this->session->userdata('user_admin')['mcuser'];
            $mail['mcpass'] = base64_decode($this->session->userdata('user_admin')['mcpass']);
            $mail['mcport'] = $this->session->userdata('user_admin')['mcport'];
        }else{
            $arrayName1 = array('operatorname' => 'mailsystem' );
            $mailSystem = $this->Data_model->selectTable('operator',$arrayName1);
            if ($mailSystem[0]['mcssl'] == '1') {
                $mail['mcsmtp'] = 'ssl://'.$mailSystem[0]['mcsmtp'];
            }else{
                $mail['mcsmtp'] = $mailSystem[0]['mcsmtp'];
            }
            $mail['mcuser'] = $mailSystem[0]['mcuser'];
            $mail['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
            $mail['mcport'] = $mailSystem[0]['mcport'];
        }


		$match1                   = array('interviewid' => $frm['interviewid']);
		$i_data['scr_asmtid']     = '';
		$this->Data_model->update('interviewer',$match,$i_data);

		$match                    = array('interviewerid' => $frm['interviewerid']);
		$i_data['scr_asmtid']	  = $frm['scr_asmtid'];
		$i_data['updatedby']	  = $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interviewer',$match, $i_data);

		//mail interviewer
        $operator             = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $frm['interviewerid']),''))[0];
	    $roundname            = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
        $position             = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
        $user                 = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidateid),'');
        if (isset($user[0])) {
            $lastname         = $user[0]['lastname'];
            $name             = $user[0]['name'];
        }else{
            $lastname         = 'Bạn';
            $name             = 'Bạn';
        }
        $link                   = '<a href="'.base_url().'admin/multiplechoice/interview_question/'.$frm['interviewid'].'/'.$frm['interviewerid'].'" >Phiếu '.$roundname.' - '.$frm['name'].'</a>';
        $chuoi_tim              = array('[Tuyển dụng viên]','[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Vị trí]','[Link phiếu đánh giá]');
        $chuoi_thay_the         = array($operator['operatorname'],$name,$roundname,$lastname,$position,$link);
        $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
        $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
        $this->Mail_model->sendMail($mail);

        $mail1['fromemail']         = $mail['mcuser'];
        $mail1['toemail']           = $mail['toemail'];
        $mail1['cc']                = $mail['cc'];
        $mail1['bcc']               = $mail['bcc'];
        $mail1['emailbody']         = $mail['emailbody'];
        $mail1['emailsubject']      = $mail['emailsubject'];
        $mail1["attachment"]        = json_encode($fileattach);
        $mail1['createdby']         = $this->session->userdata('user_admin')['operatorid'];
        $this->Mail_model->insert('mailtable',$mail1);

		redirect(base_url('admin/interview/makingAppointment/'.$frm['interviewid'].'/'.$i_data['updatedby']));

    }

    public function interview_feedback()
    {
        $frm = $this->input->post();
        $asmtid = $frm['inv_asmtid'];
        $timefrom               = $frm['intdate'].' '.$frm['timefrom'];
        $timeto                 = $frm['intdate'].' '.$frm['timeto'];
        //update assessment
        $a_data['status'] = 'C';
        $match = array('asmtid' => $asmtid);
        $this->Data_model->update('assessment',$match,$a_data);

        //inssert answer
        $data['asmtid']         = $asmtid;
        $data['questionid']     = '1';
        $data['optionid']       = $frm['check'];
        if ($frm['check'] == 2) {
            $data['ansdatetime']    = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $timefrom)));
            $data['ansdatetime2']   = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $timeto)));
        }
        $this->Data_model->insert('asmtanswer',$data);

        $interviewerid = $frm['interviewerid'];
        $new_date       = '';
        if ($interviewerid == '') {
            if($frm['check'] == 1){
                $mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 8));
            }else if($frm['check'] == 2){
                $mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 21));
                $date       =  date_format(date_create($data['ansdatetime']),"d/m/Y");
                $from       =  date_format(date_create($data['ansdatetime']),"H:i");
                $to         =  date_format(date_create($data['ansdatetime2']),"H:i");
                $new_date   = $from.' → '.$to.' '.$date;
            }else{
                $mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 22));
            }
        }else{
            $mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 9));
        }

        // mail manage
        $mail = array();
        if(isset($mailtemplate[0])){
            $subject            = $mailtemplate[0]['presubject'];
            $body               = $mailtemplate[0]['prebody'];
            $mail["attachment"] = $mailtemplate[0]['preattach'];
            $presender          = $mailtemplate[0]['presender'];
            $mail["cc"]         = '';
            $mail["bcc"]        = '';
        }else{
            $subject            = $body = $mail["attachment"] = $mail["cc"] = $mail["bcc"] = $presender = '';
        }
        if ($presender != 'usersession') {
            $arrayName1 = array('operatorname' => 'mailsystem' );
            $mailSystem = $this->Mail_model->select('operator',$arrayName1);
            $mail['mcsmtp'] = $mailSystem[0]['mcsmtp'];
            $mail['mcuser'] = $mailSystem[0]['mcuser'];
            $mail['mcpass'] = base64_decode($mailSystem[0]['mcpass']);
            $mail['mcport'] = $mailSystem[0]['mcport'];
        }else{
            echo json_encode(1);
        }
        $match                      = array('candidateid' => $frm['candidateid']);
        $candidate                  = $this->Candidate_model->selectBySelect('*','candidate',$match)[0];
        $lastname                   = $candidate['lastname'];
        $name                       = $candidate['name'];
        $match                      = array('campaignid' => $frm['campaignid']);
        $campaigns                  = $this->Candidate_model->selectBySelect('*','reccampaign',$match)[0];
        $position                   = $campaigns['position'];
        $temp                       = trim($campaigns['managecampaign'],',');
        $manage                     = explode(',', $temp);
        foreach ($manage as $key) {
            $match                      = array('operatorid' => $key);
            $operator                   = $this->Candidate_model->selectBySelect('*','operator',$match)[0];
            if($frm['check'] == 2 && $interviewerid == ''){
                $chuoi_tim              = array('[Tên Ứng viên]','[Tên]','[Vị trí]','[Ngày giờ phỏng vấn]');
                $chuoi_thay_the         = array($name,$lastname,$position,$new_date);
            }else{
                $chuoi_tim              = array('[Tên Ứng viên]','[Tên]','[Vị trí]');
                $chuoi_thay_the         = array($name,$lastname,$position);
            }

            $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($subject));
            $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($body));
            $mail['toemail']        = $operator['email'];
            $this->Mail_model->sendMail($mail);

        }

        echo json_encode(1);

    }


}
?>