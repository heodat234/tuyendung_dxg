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


	public function makingAppointment($interviewid, $interviewerid='')
	{
		$join[1] = array('table'=> 'document','match' =>'tb.operatorid = document.referencekey');
	    $o_data['operator'] = $this->Data_model->select_row_option('tb.operatorname,tb.operatorid,tb.email, document.filename',array('tb.hidden' => 1),'','operator tb',$join,'','','','');
        $o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename,datasource,presubject,prebody,preattach",'mailprofile',array('profiletype' => '0'),'');

		$sql = "SELECT tt.*, candidate.name, candidate.email, candidate.imagelink,reccampaign.position FROM interview tt  LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  LEFT JOIN reccampaign ON tt.campaignid = reccampaign.campaignid WHERE tt.interviewid = $interviewid";
		$result = $this->Campaign_model->select_sql($sql);
		$data['interview'] = $result[0];

		$join1[0] = array('table'=> 'operator','match' =>'tb.interviewer = operator.operatorid');
    	$join1[1] = array('table'=> 'document','match' =>'tb.interviewer = document.referencekey');
    	$data['interviewer'] = $this->Data_model->select_row_option('tb.interviewerid,tb.status, operator.operatorname,operator.email, document.filename',array('tb.interviewid'=>$interviewid),'','interviewer tb',$join1,'','','','');
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


		$this->_data['temp'] = $this->load->view('admin/interview/interview_question',$this->data2,true);
		$this->load->view('admin/home/master-iframe',$this->_data);	
	}


	public function invitationcard($interviewid, $interviewerid='')
	{
        if($interviewid != 0){
    		$sql = "SELECT tt.*, candidate.name,reccampaign.position FROM interview tt LEFT JOIN candidate ON tt.candidateid = candidate.candidateid  LEFT JOIN reccampaign ON tt.campaignid = reccampaign.campaignid WHERE tt.interviewid = $interviewid";
    		$result = $this->Campaign_model->select_sql($sql);
    		$data['interview'] = $result[0];
        }else{
            $data['interview'] = array();
            $data['interview']['name'] = 'Đỗ Phương Nam';
            $data['interview']['position'] = 'Giám đốc đầu tư';
            $data['interview']['intdate']   = '2018-11-20';
            $data['interview']['timefrom']   = '2018-11-20 09:00:00';
            $data['interview']['timeto']   = '2018-11-20 10:00:00';
            $data['interview']['location']   = 'Tòa nhà Đất xanh';
            $data['interview']['notes']   = 'Trao đổi về vị trí công việc';
        }
		if ($interviewerid !='') {
			$data['interviewerid'] = $interviewerid;
		}
		$data['interviewid'] = $interviewid;
		$this->_data['temp'] = $this->load->view('admin/interview/invitationcard',$data,true);

		$this->load->view('admin/home/master-iframe',$this->_data);	
	}


    public function saveAppointment()
    {
    	$frm = $this->input->post();
    	$data = array();
    	$mail = array();
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

    	$mail = array();
    	for ($k=1; $k <= 2 ; $k++) { 
            $a = $k+1;
    		$to[$k]                 = explode(',',$frm['to'.$k]);
    		$subject[$k]            = $frm['subject'.$k];
	    	$cc[$k] 		        = $frm['cc_'.$k];
	    	$bcc[$k] 		        = $frm['bcc_'.$k];
	    	$body[$k] 				= html_entity_decode($frm['body'.$a]);

    	}
        $mail['attachment']     =  '';
        $fileattach_1 = $this->upload_files('public/document/',$_FILES['attach1']);
        $fileattach_2 = $this->upload_files('public/document/',$_FILES['attach2']);

        $roundname = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
        $position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];

        $interviewid = array();
        $notes = array();
    	for ($j=1; $j <= $count; $j++) { 
    		$key = $frm['profile_'.$j];

    		//lưu phiếu mời phỏng vấn ứng viên
    		$a_data['asmttemp']				= '1';
    		$a_data['candidateid']			= $key[0];
    		$a_data['campaignid']			= $campaignid;
    		$a_data['roundid']				= $roundid;
            $a_data['sysform']              = 'N';
    		$asmtid = $this->Data_model->insert('assessment',$a_data);

    		//lưu phiếu đánh giá cho tuyển dụng viên
    		$a_data['asmttemp']				= $key[8];
    		$a_data['candidateid']			= $key[0];
    		$a_data['pic']					= $key[9];
    		$a_data['campaignid']			= $campaignid;
    		$a_data['roundid']				= $roundid;
            $a_data['sysform']              = 'N';
    		$scr_asmtid = $this->Data_model->insert('assessment',$a_data);

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
    		//interviewer
    		$link1 = '';
    		$interviewer = explode(',',$key[7]);

    		foreach ($interviewer as $row) {
    			if ($row == '') {
    				continue;
    			}
    			//lưu phiếu mời phỏng vấn tuyển dụng viên
	    		$a_data['asmttemp']				= '1';
	    		$a_data['candidateid']			= $key[0];
	    		$a_data['pic']					= $row;
	    		$a_data['campaignid']			= $campaignid;
	    		$a_data['roundid']				= $roundid;
                $a_data['sysform']              = 'N';
	    		$asmtid = $this->Data_model->insert('assessment',$a_data);

    			//save interviewer
    			$i_data['interviewid']	= $interviewid[$j];
        		$i_data['interviewer']	= $row;
        		$i_data['status']		= 'W';
        		$i_data['marked']		= '';
        		$i_data['inv_asmtid']	= $asmtid;
        		if ($key[9] == $row) {
        			$i_data['scr_asmtid']	= $scr_asmtid;
        			$link1 = '<a href="'.base_url().'admin/interview/interview_question/'.$interviewid[$j].'/'.$row.'" >Phiếu '.$roundname.' - '.$key[1].'</a>';
        		}
        		$i_data['createdby']	= $this->session->userdata('user_admin')['operatorid'];
        		$this->Data_model->insert('interviewer',$i_data);

        		// //mail interviewer
        		$operator = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $row),''))[0];
	            
                $user = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $key[0]),'');
                if (isset($user[0])) {
                    $lastname   = $user[0]['lastname'];
                    $name       = $user[0]['name'];
                    $link = '<a href="'.base_url().'admin/interview/invitationcard/'.$interviewid[$j].'/" >Lịch phỏng vấn V1 - '.$name.'</a>';
                }else{
                    $lastname   = 'Bạn';
                    $name       = 'Bạn';
                    $link = '<a href="'.base_url().'admin/interview/invitationcard/0/" >Lịch phỏng vấn V1 - '.$name.'</a>';
                }
                $chuoi_tim      = array('[Tuyển dụng viên]','[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu mời phỏng vấn]','[Ghi chú]','[Vị trí]','[Link phiếu đánh giá]');
                $chuoi_thay_the = array($operator['operatorname'],$name,$roundname,$lastname,$link,$key[6],$position,$link1);
                $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject[2]);
                $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body[2]);
                $mail['toemail']        = $operator['email'];
                $mail['cc']             = $cc[2];
                $mail['bcc']            = $bcc[2];
                $mail['attachment']     = $fileattach_2;
                $this->Mail_model->sendMail($mail);

                $mail["attachment"] = json_encode($fileattach_2);
                $mail['fromemail'] = $this->session->userdata('user_admin')['email'];
                $this->Mail_model->insert('mailtable',$mail);                
    		}

    	}

        //mail interview
        $c = 1;
        foreach ($to[1] as $key) {
            $user = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('email' => $key),'');
            if (isset($user[0])) {
                $lastname   = $user[0]['lastname'];
                $name       = $user[0]['name'];
                $link = '<a href="'.base_url().'admin/interview/invitationcard/'.$interviewid[$c].'/" >Lịch phỏng vấn V1 - '.$name.'</a>';
            }else{
                $lastname   = 'Bạn';
                $name       = 'Bạn';
                $link = '<a href="'.base_url().'admin/interview/invitationcard/0/" >Lịch phỏng vấn V1 - '.$name.'</a>';
            }
            $chuoi_tim      = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu mời tam dự phỏng vấn]','[Ghi chú]','[Vị trí]');
            $chuoi_thay_the = array($name,$roundname,$lastname,$link,$notes[$c],$position);
            $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject[1]);
            $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body[1]);
            $mail['toemail']        = '';
            $mail['cc']             = $cc[1];
            $mail['bcc']            = $bcc[1];
            $mail['attachment']     = $fileattach_1;
            $this->Mail_model->sendMail($mail);

            $mail["attachment"] = json_encode($fileattach_1);
            $mail['fromemail'] = $this->session->userdata('user_admin')['email'];
            $this->Mail_model->insert('mailtable',$mail);
            $c++;
        }
        
    	
        echo json_encode(1);
    }

    public function saveAddInterviewer()
    {
    	$frm = $this->input->post();
                var_dump($frm);exit;

    	$interviewer = explode(',',$frm['profile']);
    	$mail['emailsubject'] 	= $frm['subject'];
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
		foreach ($interviewer as $row) {
			if ($row == '') {
				continue;
			}
			$i_data['interviewid']	= $frm['interviewid'];
    		$i_data['interviewer']	= $row;
    		$i_data['status']		= 'W';
    		$i_data['marked']		= '';
    		$i_data['inv_asmtid']	= '';
    		$i_data['scr_asmtid']	= '';
    		$i_data['createdby']	= $this->session->userdata('user_admin')['operatorid'];
    		$this->Data_model->insert('interviewer',$i_data);

    		//mail interviewer
    		$roundname = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $frm['campaignid'],'roundid' => $frm['roundid']),''))[0]['roundname'];
    		$position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $frm['campaignid']),''))[0]['position'];
    		$user = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $row),''))[0];
            $link1 = '<a href="'.base_url().'admin/interview/invitationcard/'.$frm['candidateid'].'/'.$campaignid.'/'.$row.'/'.$frm['interviewid'].'" >Lịch '.$roundname.' - '.$frm['name'].'</a>';
            $link2 = '<a href="'.base_url().'admin/interview/interview_question/'.$frm['interviewid'].'/'.$row.'" >Phiếu '.$roundname.' - '.$frm['name'].'</a>';
    		$frm['body'] = str_replace('$name',$user['operatorname'], $frm['body']);
    		$frm['body'] = str_replace('$candidate',$frm['name'], $frm['body']);
    		$frm['body'] = str_replace('$position',$position, $frm['body']);
    		$frm['body'] = str_replace('$round',$roundname, $frm['body']);
    		$frm['body'] = str_replace('$link1',$link1, $frm['body']);
    		$frm['body'] = str_replace('$link2',$link2, $frm['body']);
    		$mail['emailbody'] = $frm['body'];
    		$mail['toemail'] = $user['email'];
    		$this->Mail_model->sendMail($mail);
    		$mail['fromemail'] = $this->session->userdata('user_admin')['email'];
    		$this->Mail_model->insert('mailtable',$mail);
		}
		redirect(base_url('admin/interview/makingAppointment/'.$frm['candidateid'].'/'.$frm['campaignid']));
    }

    public function removeInterviewer()
    {
    	$frm = $this->input->post();
        $note                       = $frm['note'];
        $fileattach                 = $this->upload_files('public/document/',$_FILES['attach1']);
		$mail["attachment"]         = $fileattach;

		$match                      = array('interviewid' => $frm['interviewid'],'interviewerid' => $frm['interviewer']);
		$i_data['status']		    = 'C';
		$i_data['updatedby']	    = $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interviewer',$match,$i_data);

		//mail interview
        if (isset($frm['checkmail'])) {
            $subject                 = $frm['subject'];
            $mail['cc']              = $frm['cc'];
            $mail['bcc']             = $frm['bcc'];
            $body                    = $frm['body2'];
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

            $mail["attachment"]     = json_encode($fileattach);
            $mail['fromemail']      = $this->session->userdata('user_admin')['email'];
            if (isset($frm['isshare'])) {
                $mail["isshare"]    = $frm['isshare']; 
            }
            $this->Mail_model->insert('mailtable',$mail);
        }
        
		redirect(base_url('admin/interview/makingAppointment/'.$frm['interviewid'].'/'.$i_data['updatedby']));

    }

    public function cancelAppointment()
    {
    	$frm = $this->input->post();
        $note                   = $frm['note'];
    	$subject            	= $frm['subject'];
        $mail['tomail']         = $frm['to'];
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
		$body                   = html_entity_decode($frm['body3']);
        $fileattach             = $this->upload_files('public/document/',$_FILES['attach1']);
        $mail["attachment"]     = $fileattach;
        //update status
		$match  = array('interviewid' => $frm['interviewid']);
        if (isset($frm['isshare'])) {
            $i_data["isshare"]  = $frm['isshare']; 
        }
		$i_data['status']		= 'D';
		$i_data['updatedby']	= $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interview',$i_data);

		//mail interview
        if (isset($frm['checkmail'])) {
    		$roundname            = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
            $position             = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
            $user                 = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $frm['candidateid']),'');
            if (isset($user[0])) {
                $lastname         = $user[0]['lastname'];
                $name             = $user[0]['name'];
            }else{
                $lastname         = 'Bạn';
                $name             = 'Bạn';
            }
            $chuoi_tim              = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Ghi chú]','[Vị trí]');
            $chuoi_thay_the         = array($name,$roundname,$lastname,$note,$position);
            $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
            $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
            $this->Mail_model->sendMail($mail);

            $mail["attachment"]     = json_encode($fileattach);
            $mail['fromemail']      = $this->session->userdata('user_admin')['email'];
            $this->Mail_model->insert('mailtable',$mail);
        }
    }

    public function changeAppointment()
    {
    	$frm = $this->input->post();
    	$mail['emailsubject'] 	= $frm['subject'];
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
		
		$match1  = array('interviewid' => $frm['interviewid']);
		$i_data['scr_asmtid']		= '';
		$this->Data_model->update('interviewer',$i_data);

		$match  = array('interviewerid' => $frm['interviewerid']);
		$i_data['scr_asmtid']		= $frm['scr_asmtid'];
		$i_data['updatedby']	= $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interviewer',$i_data);

		//mail interviewer
		$position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $frm['campaignid']),''))[0]['position'];
		$user = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $frm['interviewer']),''))[0];

		$frm['body'] = str_replace('$name',$user['operatorname'], $frm['body3']);
		$frm['body'] = str_replace('$candidate',$frm['name'], $frm['body']);
		$frm['body'] = str_replace('$datetime',$frm['datetime'], $frm['body']);
		$frm['body'] = str_replace('$note',$frm['note'], $frm['body']);
		$mail['emailbody'] = $frm['body'];
		$mail['toemail'] = $user['email'];
		$this->Mail_model->sendMail($mail);
		$mail['fromemail'] = $this->session->userdata('user_admin')['email'];
		$this->Mail_model->insert('mailtable',$mail);
		redirect(base_url('admin/interview/makingAppointment/'.$frm['candidateid'].'/'.$frm['campaignid']));

    }
    public function offer()
    {
        $this->_data['temp'] = $this->load->view('admin/multiplechoice/offer',null,true);

        $this->load->view('admin/home/master-iframe',$this->_data); 
    }

    public function saveOffer()
    {
    	$frm = $this->input->post();
    	$campaignid 		= $frm['campaignid'];
    	$roundid 		    = $frm['roundid'];
    	$count 		        = $frm['count'];
    	if (isset($frm['private'])) {
    		$data['private'] = $private; 
    		unset($frm['private']);
    	}
    	unset($frm['campaignid']);
    	unset($frm['roundid']);
    	unset($frm['count']);

    	$mail = array();
    	
		$toemail                = explode(',',$frm['to']);
		$subject 	            = $frm['subject'];
    	$mail['cc'] 		    = $frm['cc'];
    	$mail['bcc'] 		    = $frm['bcc'];
    	$body     				= html_entity_decode($frm['body']);
        $fileattach             = $this->upload_files('public/document/',$_FILES['attach']);
    	
    	unset($frm['to']);
    	unset($frm['subject']);
    	unset($frm['cc']);
    	unset($frm['bcc']);
    	unset($frm['body']);

        $offer = array();
    	for ($j=1; $j <= $count; $j++) { 
    		$key = $frm['profile_'.$j];

            //lưu phiếu mời đề nghị ứng viên
            $a_data['asmttemp']             = '2';
            $a_data['candidateid']          = $key[0];
            $a_data['campaignid']           = $campaignid;
            $a_data['roundid']              = $roundid;
            $a_data['sysform']              = 'N';
            $asmtid = $this->Data_model->insert('assessment',$a_data);

    		$data['candidateid'] 	    = $key[0];
            $data['campaignid'] 	    = $campaignid;
            $data['roundid'] 		    = $roundid;
            $data['startdate']		    = date('Y-m-d',strtotime(str_replace('/', '-', $key[2])));
            $data['duration']		    = $key[3];
            $data['drationunit']        = 'Tháng';
            $data['workingtype']        = $key[4];
            $data['location']           = $key[5];
            $data['trainer']		    = $key[6];
            $data['reportto']			= $key[7];
            $data['tempbenefit']   	    = $key[8];
            $data['officialbenefit']    = $key[9];
            $data['note']               = $key[10];
            $data['off_asmtid']         = $asmtid;
            $offer[$j]                  = $this->Data_model->insert('offer',$data);

    	}
    	
        //mail
        foreach ($toemail as $key) {
            $roundname = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
            $position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
            $user = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('email' => $key),'');
            if (isset($user[0])) {
                $lastname   = $user[0]['lastname'];
                $name       = $user[0]['name'];
                $link       = '<a href="'.base_url().'admin/Campaign/offer/'.$offer[$j].'" >Thư mời nhận việc</a>';
            }else{
                $lastname   = 'Bạn';
                $name       = 'Bạn';
                $link       = '<a href="'.base_url().'admin/Campaign/offer/" >Thư mời nhận việc</a>';
            }
            $chuoi_tim              = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link phiếu mời nhận việc]','[Ghi chú]','[Vị trí]');
            $chuoi_thay_the         = array($name,$roundname,$lastname,$link,$notes[$j],$position);
            $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
            $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
            $mail['toemail']        = $key;
            $mail["attachment"]     = $fileattach;
            $this->Mail_model->sendMail($mail);

            $mail["attachment"] = json_encode($fileattach);
            $mail['fromemail'] = $this->session->userdata('user_admin')['email'];
            $this->Mail_model->insert('mailtable',$mail);
        }
        echo json_encode(1);
    }



    public function sendMailTestAssessment()
    {
        $mail['emailsubject']   = 'Trắc nghiệm kiến thức tổng quát - Vị trí: Giám đốc đầu tư - Đất Xanh Group';
        $mail['cc']         = '';
        $mail['bcc']        = '';
        $mail['attachment']        = '';
        $body = 'Xin chào Đỗ Phương Nam, <br>

Hồ sơ của bạn đã đạt vòng Sơ loại của chúng tôi, <br>

Chúng tôi xin gửi đến Nam phiếu câu hỏi trắc nghiệm kiến thức tổng quát theo đường link dưới đây: <br>

→ $link <br>

Nam hãy thực hiện phiếu trắc nghiệm này theo hướng dẫn, kết quả của phiếu trắc nghiệm này là cơ sở để thực hiện các bước tiếp theo trong quy trình phỏng vấn/ <br>


Trân trọng, <br>





Dat Xanh Group Recruitment Specialist <br>
27 Dinh Bo Linh Str., Ward 24, Binh Thanh Dist., HCM  City, Viet Nam <br>
Tel: 08.62525252 Ext: 5083# | Fax: 08.62853896 | Mobile: 0914 191982 <br>
Email : recruiter.dxg02@dxg.com.vn | Website : www.datxanh.vn <br>
Fanpage: www.facebook.com/PhongnhansuDXG';
        $link = '<a href="'.base_url().'admin/campaign/pageAssessment/0/1" >Trắc nghiệm kiến thức tổng quát - Đỗ Phương Nam</a>';
        // $body = str_replace('$note',$key[4], $body);
        $mail['emailbody'] = str_replace('$link',$link, $body);
        $mail['toemail'] = 'namdophuong@gmail.com ';
        $this->Mail_model->sendMail($mail);
        echo "success";
    }

    public function sendMailTestAppointment()
    {
        $mail['emailsubject']   = 'Thư mời Phỏng vấn - Vị trí: Giám đốc đầu tư - Dat Xanh Group';
        $mail['cc']         = '';
        $mail['bcc']        = '';
        $mail['attachment']        = '';
        $body = 'Xin chào Đỗ Phương Nam, <br>

Hồ sơ của Nam đã đạt đến vòng Phỏng vấn V1 của chúng tôi, <br>

Chúng tôi rất hân hạnh được sắp xếp một buổi gặp gỡ với Nam để có thể trao đổi thêm về nội dung công việc, xin gửi đến Nam phiếu thông tin phỏng vấn, Nam hãy xác nhận khả năng có mặt theo ngày/ giờ/ địa điểm trong đường link dưới đây nhé: <br>

→ $link <br>

Hẹn gặp anh, <br>

Trân trọng,<br><br>





Dat Xanh Group Recruitment Specialist <br>
27 Dinh Bo Linh Str., Ward 24, Binh Thanh Dist., HCM  City, Viet Nam <br>
Tel: 08.62525252 Ext: 5083# | Fax: 08.62853896 | Mobile: 0914 191982 <br>
Email : recruiter.dxg02@dxg.com.vn | Website : www.datxanh.vn <br>
Fanpage: www.facebook.com/PhongnhansuDXG';


        $link = '<a href="'.base_url().'admin/interview/invitationcard/0" >Lịch phỏng vấn V1 - Đỗ Phương Nam</a>';
        $mail['emailbody'] = str_replace('$link',$link, $body);
        $mail['toemail'] = 'namdophuong@gmail.com ';
        $this->Mail_model->sendMail($mail);
        echo "success";
    }

    public function sendMailTestAppointment1()
    {
        $mail['emailsubject']   = 'Thư mời Phỏng vấn - Đỗ Phương Nam - Vị trí: Giám đốc đầu tư - Dat Xanh Group';
        $mail['cc']         = '';
        $mail['bcc']        = '';
        $mail['attachment']        = '';
        $body = 'Xin chào Đỗ Phương Nam, <br>

Bộ phận Tuyển dụng Dat Xanh Group xin gửi đến Đỗ Phương Nam lịch phỏng vấn ứng viên: Đỗ Phương Nam, vị trí ứng tuyển: Giám đốc đầu tư - Phỏng vấn V1 <br>
→ $link1 <br>

Anh vui lòng xác nhận ngày/ giờ/ địa điểm theo lịch trên và sử dụng phiếu đánh giá dưới đây để ghi nhận kết quả phỏng vấn <br>
→ $link2 <br>

Trân trọng,<br><br>





Dat Xanh Group Recruitment Specialist <br>
27 Dinh Bo Linh Str., Ward 24, Binh Thanh Dist., HCM  City, Viet Nam <br>
Tel: 08.62525252 Ext: 5083# | Fax: 08.62853896 | Mobile: 0914 191982 <br>
Email : recruiter.dxg02@dxg.com.vn | Website : www.datxanh.vn <br>
Fanpage: www.facebook.com/PhongnhansuDXG';


        $link1 = '<a href="'.base_url().'admin/interview/invitationcard/0" >Lịch phỏng vấn V1 - Đỗ Phương Nam</a>';
        $link2 = '<a href="'.base_url().'admin/interview/interview_question/0/0" >Phiếu phỏng vấn V1 - Đỗ Phương Nam</a>';
        $body = str_replace('$link1',$link1, $body);
        $mail['emailbody'] = str_replace('$link2',$link2, $body);
        $mail['toemail'] = 'namdophuong@gmail.com ';
        $this->Mail_model->sendMail($mail);
        echo "success";
    }

    public function sendMailTestOffer()
    {
        $mail['emailsubject']   = 'Thư mời Nhận việc - Vị trí: Giám đốc đầu tư - Dat Xanh Group';
        $mail['cc']         = '';
        $mail['bcc']        = '';
        $mail['attachment']        = '';
        $body = 'Xin chào Đỗ Phương Nam, <br>

Chúng tôi xin thông báo đến anh Nam đã đạt phỏng vấn, <br>
xin gửi đến Nam lời mời cộng tác cùng tập đoàn chúng tôi, Nam hãy xác nhận nội dung của thư mời nhận việc theo đường link dưới đây nhé:<br>

→ $link <br>

Mong sớm nhận được phản hồi từ anh, <br> 

Trân trọng. <br> <br>


Dat Xanh Group Recruitment Specialist <br>
27 Dinh Bo Linh Str., Ward 24, Binh Thanh Dist., HCM  City, Viet Nam <br>
Tel: 08.62525252 Ext: 5083# | Fax: 08.62853896 | Mobile: 0914 191982 <br>
Email : recruiter.dxg02@dxg.com.vn | Website : www.datxanh.vn <br>
Fanpage: www.facebook.com/PhongnhansuDXG';


        $link = '<a href="'.base_url().'admin/interview/offer" >Thư mời nhận việc</a>';
        $mail['emailbody'] = str_replace('$link',$link, $body);
        $mail['toemail'] = 'namdophuong@gmail.com ';
        $this->Mail_model->sendMail($mail);
        echo "success";
    }

}
?>