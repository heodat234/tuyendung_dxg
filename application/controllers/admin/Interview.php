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
            $campaignid = 1;
            $roundid = 1;
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
    	$round 		= $frm['roundid'];
    	$count 		= $frm['count'];
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
    		$to[$k] = explode(',',$frm['to'.$k]);
    		$mail[$k]['emailsubject'] 	= $frm['subject'.$k];
	    	$mail[$k]['cc'] 		= $frm['cc'.$k];
	    	$mail[$k]['bcc'] 		= $frm['bcc'.$k];
	    	$body[$k] 				= $frm['body'.$a];

	    	// $fileattach = $this->upload_files('public/document/',$_FILES['attach'.$k]);
            // $mail$k]["attachment"] = $fileattach;
	    	unset($frm['to'.$k]);
	    	unset($frm['subject'.$k]);
	    	unset($frm['cc'.$k]);
	    	unset($frm['bcc'.$k]);
	    	unset($frm['body'.$a]);
    	}
    	for ($j=1; $j <= $count; $j++) { 
    		$i =0;
    		$key = $frm['profile_'.$j];

    		//lưu phiếu mời phỏng vấn ứng viên
    		$a_data['asmttemp']				= '1';
    		$a_data['candidateid']			= $key[0];
    		$a_data['campaignid']			= $campaignid;
    		$a_data['roundid']				= $round;
            $a_data['status']               = 'N';
    		$asmtid = $this->Data_model->insert('assessment',$a_data);

    		//lưu phiếu đánh giá cho tuyển dụng viên
    		$a_data['asmttemp']				= $key[8];
    		$a_data['candidateid']			= $key[0];
    		$a_data['pic']					= $key[9];
    		$a_data['campaignid']			= $campaignid;
    		$a_data['roundid']				= $round;
            $a_data['status']               = 'N';
    		$scr_asmtid = $this->Data_model->insert('assessment',$a_data);

    		//save interview
    		$data['candidateid'] 	= $key[0];
            $data['campaignid'] 	= $campaignid;
            $data['roundid'] 		= $round;
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
            $interviewid = $this->Data_model->insert('interview',$data);

            //mail interview

      //       array_push($mail, $key[10]);

      //       $roundname = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $round),''))[0]['roundname'];
      //       $email_candidate = ($this->Campaign_model->select("email",'candidate',array('candidateid' => $key[0]),''))[0]['email'];
      //       $link = '<a href="'.base_url().'admin/Multiplechoice/invitationcard/'.$interviewid.'/" >Lịch '.$roundname.' - '.$key[1].'</a>';
    		// $body[1] = str_replace('$name',$key[1], $body[1]);
    		// $body[1] = str_replace('$note',$key[6], $body[1]);
    		// $body[1] = str_replace('$round',$roundname, $body[1]);
    		// $mail[1]['emailbody'] = str_replace('$link',$link, $body[1]);
    		// $mail[1]['toemail'] = $email_candidate;
    		// $this->Mail_model->sendMail($mail[1]);
    		// $mail[1]['fromemail'] = $this->session->userdata('user_admin')['email'];
    		// $this->Mail_model->insert('mailtable',$mail[1]);


    		//interviewer
    		$link2 = '';
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
	    		$a_data['roundid']				= $round;
                $a_data['status']               = 'N';
	    		$asmtid = $this->Data_model->insert('assessment',$a_data);

    			//save interviewer
    			$i_data['interviewid']	= $interviewid;
        		$i_data['interviewer']	= $row;
        		$i_data['status']		= 'W';
        		$i_data['marked']		= '';
        		$i_data['inv_asmtid']	= $asmtid;
        		if ($key[9] == $row) {
        			$i_data['scr_asmtid']	= $scr_asmtid;
        			// $link2 = '<a href="'.base_url().'admin/interview/interview_question/'.$interviewid.'/'.$row.'" >Phiếu '.$roundname.' - '.$key[1].'</a>';
        		}
        		$i_data['createdby']	= $this->session->userdata('user_admin')['operatorid'];
        		$this->Data_model->insert('interviewer',$i_data);

        		// //mail interviewer
        		// $position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
        		// $user = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $row),''))[0];
	         //    $link1 = '<a href="'.base_url().'admin/interview/invitationcard/'.$interviewid.'/'.$row.'" >Lịch '.$roundname.' - '.$key[1].'</a>';
	            
        		// $body[2] = str_replace('$name',$user['operatorname'], $body[2]);
        		// $body[2] = str_replace('$candidate',$key[1], $body[2]);
        		// $body[2] = str_replace('$position',$position, $body[2]);
        		// $body[2] = str_replace('$round',$roundname, $body[2]);
        		// $body[2] = str_replace('$link1',$link1, $body[2]);
        		// $body[2] = str_replace('$link2',$link2, $body[2]);
        		// $mail[2]['emailbody'] = $body[2];
        		// $mail[2]['toemail'] = $user['email'];
        		// $this->Mail_model->sendMail($mail[2]);
        		// $mail[2]['fromemail'] = $this->session->userdata('user_admin')['email'];
        		// $this->Mail_model->insert('mailtable',$mail[2]);
    		}

    		$i++;
    	}
    	
        echo json_encode(1);
    }

    public function saveAddInterviewer()
    {
    	$frm = $this->input->post();
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
    	$mail['emailsubject'] 	= $frm['subject'];
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
		
		$match  = array('interviewid' => $frm['interviewid'],'interviewerid' => $frm['interviewer']);
		$i_data['status']		= 'D';
		$i_data['updatedby']	= $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interviewer',$i_data);

		//mail interviewer
		$position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $frm['campaignid']),''))[0]['position'];
		$user = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $frm['interviewer']),''))[0];

		$frm['body'] = str_replace('$name',$user['operatorname'], $frm['body2']);
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

    public function cancleAppointment()
    {
    	$frm = $this->input->post();
    	$mail['emailsubject'] 	= $frm['subject'];
    	$mail['cc'] 			= $frm['cc'];
    	$mail['bcc'] 			= $frm['bcc'];
		
		$match  = array('interviewid' => $frm['interviewid']);
		$i_data['status']		= 'D';
		$i_data['updatedby']	= $this->session->userdata('user_admin')['operatorid'];
		$this->Data_model->update('interview',$i_data);

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


    public function saveOffer()
    {
    	$frm = $this->input->post();
      	$intdate 			= $frm['intdate'];
    	$campaignid 		= $frm['campaignid'];
    	$round 		= $frm['roundid'];
    	$count 		= $frm['count'];
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
    		$to[$k] = explode(',',$frm['to'.$k]);
    		$mail[$k]['emailsubject'] 	= $frm['subject'.$k];
	    	$mail[$k]['cc'] 		= $frm['cc'.$k];
	    	$mail[$k]['bcc'] 		= $frm['bcc'.$k];
	    	$body[$k] 				= $frm['body'.$k];
	    	if (!empty($_FILES['attach'.$k]['name'])) {
	            $config['upload_path'] = './public/document/';
	            $config['allowed_types'] = '*';
	            $config['file_name'] = $_FILES['attach'.$k]['name'];
	            $config['overwrite'] = FALSE;  
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if ($this->upload->do_upload('attach'.$k)) {
	                $uploadData = $this->upload->data();
	                $mail[$k]["attachment"] = base_url().'public/document/'.$uploadData['file_name'];    
	             }
	             else
	             {
	             	$mail[$k]["attachment"] ='';
	                $datas['errors'] = $this->upload->display_errors();
	             } 
	        }
	        else
	        {
	        	$mail[$k]["attachment"] ='';
	            $datas['errors'] = $this->upload->display_errors();
	        }
	    	unset($frm['to'.$k]);
	    	unset($frm['subject'.$k]);
	    	unset($frm['cc'.$k]);
	    	unset($frm['bcc'.$k]);
	    	unset($frm['body'.$k]);
	    	unset($frm['attach'.$k]);

    	}
    	for ($j=1; $j <= $count; $j++) { 
    		$i =0;
    		$key = $frm['profile_'.$j];
    		$data['candidateid'] 	= $key[0];
            $data['campaignid'] 	= $campaignid;
            $data['roundid'] 		= $round;
            $data['intdate']		= date('Y-m-d',strtotime(str_replace('/', '-', $intdate)));
            $timefrom 				= $intdate.' '.$key[2];
            $timeto 				= $intdate.' '.$key[3];
            $data['inttype']		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $timefrom)));
            $data['timefrom']		= date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $timeto)));
            $data['timeto']			= $key[4];
            $data['location']		= $key[5];
            $data['notes']			= $key[6];
            $data['createdby']   	= $this->session->userdata('user_admin')['operatorid'];
            $interviewid = $this->Data_model->insert('interview',$data);

            //mail interview
            $roundname = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $round),''))[0]['roundname'];
            $email_candidate = ($this->Campaign_model->select("email",'candidate',array('candidateid' => $key[0]),''))[0]['email'];
            $link = '<a href="'.base_url().'admin/Multiplechoice/invitationcard/'.$key[0].'/'.$campaignid.'" >Lịch '.$roundname.' - '.$key[1].'</a>';
    		$body[1] = str_replace('$name',$key[1], $body[1]);
    		$body[1] = str_replace('$note',$key[6], $body[1]);
    		$body[1] = str_replace('$round',$roundname, $body[1]);
    		$mail[1]['emailbody'] = str_replace('$link',$link, $body[1]);
    		$mail[1]['toemail'] = $email_candidate;
    		$this->Mail_model->sendMail($mail[1]);
    		$mail[1]['fromemail'] = $this->session->userdata('user_admin')['email'];
    		$this->Mail_model->insert('mailtable',$mail[1]);

    		//interviewer
    		$interviewer = explode(',',$key[7]);
    		foreach ($interviewer as $row) {
    			if ($row == '') {
    				continue;
    			}
    			$i_data['interviewid']	= $interviewid;
        		$i_data['interviewer']	= $row;
        		$i_data['status']		= 'W';
        		$i_data['marked']		= '';
        		$i_data['inv_asmtid']	= '';
        		$i_data['scr_asmtid']	= '';
        		$i_data['createdby']	= $this->session->userdata('user_admin')['operatorid'];
        		$this->Data_model->insert('interviewer',$i_data);

        		//mail interviewer
        		$position = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
        		$user = ($this->Campaign_model->select("operatorid,operatorname,email",'operator',array('operatorid' => $row),''))[0];
	            $link1 = '<a href="'.base_url().'admin/interview/invitationcard/'.$key[0].'/'.$campaignid.'/'.$row.'/'.$interviewid.'" >Lịch '.$roundname.' - '.$key[1].'</a>';
	            $link2 = '<a href="'.base_url().'admin/interview/interview_question/'.$interviewid.'/'.$row.'" >Phiếu '.$roundname.' - '.$key[1].'</a>';
        		$body[2] = str_replace('$name',$user['operatorname'], $body[2]);
        		$body[2] = str_replace('$candidate',$key[1], $body[2]);
        		$body[2] = str_replace('$position',$position, $body[2]);
        		$body[2] = str_replace('$round',$roundname, $body[2]);
        		$body[2] = str_replace('$link1',$link1, $body[2]);
        		$body[2] = str_replace('$link2',$link2, $body[2]);
        		$mail[2]['emailbody'] = $body[2];
        		$mail[2]['toemail'] = $user['email'];
        		$this->Mail_model->sendMail($mail[2]);
        		$mail[2]['fromemail'] = $this->session->userdata('user_admin')['email'];
        		$this->Mail_model->insert('mailtable',$mail[2]);
    		}

    		$i++;
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
        $link = '<a href="'.base_url().'admin/Multiplechoice/pageAssessment/0/1" >Trắc nghiệm kiến thức tổng quát - Đỗ Phương Nam</a>';
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


        $link = '<a href="'.base_url().'admin/multiplechoice/offer" >Thư mời nhận việc</a>';
        $mail['emailbody'] = str_replace('$link',$link, $body);
        $mail['toemail'] = 'namdophuong@gmail.com ';
        $this->Mail_model->sendMail($mail);
        echo "success";
    }

}
?>