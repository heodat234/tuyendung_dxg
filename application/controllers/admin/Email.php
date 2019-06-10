<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
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
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','M_auth','admin/Mail_model'));

		$ac_data['system'] 	= 'active';
		$ac_data['email'] 		= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 1;
	    $this->sess  = $this->session->userdata('user_admin');

	}
	public function index()
	{
	    $arrayName1 = array('operatorname' => 'mailsystem' );
		$data['mailSystem'] = $this->Data_model->selectTable('operator',$arrayName1);
		$arrayName = array('1' => 1 );
		$data['dataEmail'] = $this->Data_model->selectTable('mailprofile',$arrayName);
		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$this->data['temp'] = $this->load->view('admin/email/index',$data,true);
		}

		$this->load->view('admin/home/master',$this->data);
	}
	public function detail($value='')
	{
		// $temp_file = tempnam(sys_get_temp_dir(), 'tmp');
		// chmod('C:\Windows\TEMP', 0777);
		// echo sys_get_temp_dir();exit;
// 		$filename = 'D:\Site\hmrecruit\tmp';
// if (is_writable($filename)) {
//     echo $filename . ' is writable';
// } else {
//     echo $filename . ' is not writable';
// }
// exit;
		$arrayName1 = array('operatorname' => 'mailsystem' );
		$data['mailSystem'] = $this->Data_model->selectTable('operator',$arrayName1);
		$arrayName = array('mailprofileid' => $value );
		$data['dataEmail'] = $this->Data_model->selectTable('mailprofile',$arrayName);
		$data['group'] = $value;
		$data['emailsession']   = $this->session->userdata('user_admin')['email'];

		$this->data['temp'] = $this->load->view('admin/email/detail',$data,true);

		$this->load->view('admin/home/master',$this->data);
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

            $images[] 						= $filename;

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

	public function insertEmail()
	{
		$data 				= $this->input->post();
		$profiletype 		= $data['profiletype'];
	 //    $arrayName1 		= array('operatorname' => 'mailsystem' );
		// $data1['mailSystem'] = $this->Data_model->selectTable('operator',$arrayName1);
		if($profiletype == 0)
		{
			$data['presender'] 	= 'usersession';
		}
		else{
			$data['presender'] 	= 'mailsystem';
		}
		$data['createdby'] 		= $this->session->userdata('user_admin')['operatorname'];

		$fileattach = $this->upload_files('public/document/',$_FILES['attach']);
		if ($fileattach == false) {
			$data["preattach"] 		= '';
		}else{
			$data["preattach"] 		= json_encode($fileattach);
		}

		$id = $this->Data_model->insert('mailprofile',$data);
		if($id != null)
		{
			redirect(base_url('admin/email/detail/'.$id));
		}
		else
		{
			echo '<script>alert("Thêm bị lỗi!!")</script>';
		}
	}
	public function updateEmail($value)
	{
		$data = $this->input->post();
	 //    $arrayName1 = array('operatorname' => 'mailsystem' );
		// $data1['mailSystem'] = $this->Data_model->selectTable('operator',$arrayName1);
		$profiletype = $data['profiletype'];
		if($profiletype == 0)
		{
			$data['presender'] 	= 'usersession';
		}
		else{
			$data['presender'] 	= 'mailsystem';
		}
		$arrayName = array('mailprofileid' => $value );
		$data['createdby'] 	= $this->session->userdata('user_admin')['operatorname'];

		$fileattach = $this->upload_files('public/document/',$_FILES['attach']);
		if ($fileattach != false) {
			$data["preattach"] 		= json_encode($fileattach);
		}
		$id = $this->Data_model->update('mailprofile',$arrayName,$data);
		redirect(base_url('admin/email/detail/'.$value));
	}

	//mail chúc mừng sinh nhật
	public function sendMail()
	{
		$user = 'tuyendung';
		$pass = 'tuyendung@123';
		$post = $this->input->post();
		if ($user == $post['user'] && $pass == $post['password']) {
			$day 		= date('Y-m-d');
			$ngay 		= date('d');
			$thang		= date('m');
			$sql = "SELECT * from candidate where DAY(dateofbirth) = '$ngay' AND MONTH(dateofbirth) = '$thang'";
			$candidate 			= $this->Campaign_model->select_sql($sql);
			// var_dump($candidate);exit;

			$mail = array();
			$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 3));
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
				if ($mailSystem[0]['mcssl'] == '1') {
	        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
	        	}else{
	        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
	        	}
	        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
	        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
	        	$mail['mcport']	= $mailSystem[0]['mcport'];
			}else{
				echo 'Error';
				exit;
			}

			if(isset($candidate[0])){
				foreach ($candidate as $key) {
					$lastname 	= $key['lastname'];
					$name 		= $key['name'];

					$chuoi_tim 				= array('[Tên Ứng viên]','[Tên]');
					$chuoi_thay_the 		= array($name,$lastname);
					$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($subject));
					$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($body));
					$mail['toemail'] 		= $key['email'];
					$this->Mail_model->sendMail($mail);

					$mail1['fromemail'] 		= $mail['mcuser'];
					$mail1['toemail'] 			= $key['email'];
					$mail1['emailbody'] 		= $mail['emailbody'];
					$mail1['emailsubject'] 		= $mail['emailsubject'];
					$mail1["attachment"] 		= json_encode($mail["attachment"]);
					$this->Mail_model->insert('mailtable',$mail1);
			    }
			}

			$cenvertedTime 		= date('Y-m-d H:i:s',strtotime('-1 day',strtotime($day)));
			// $match 				= array('intdate' => $cenvertedTime);
			$sql = "SELECT a.interviewid,c.name,b.position from interview a LEFT join reccampaign b on a.campaignid = b.campaignid LEFT join candidate c on a.candidateid = c.candidateid where a.intdate = '$cenvertedTime'";
			$interview 			= $this->Campaign_model->select_sql($sql);
			// var_dump($interview);exit;
			foreach ($interview as $int) {
				$interviewid 	= $int['interviewid'];
				$position 		= $int['position'];
				$candidate 		= $int['name'];
				$sql1 = "select b.operatorname,b.email from interviewer a LEFT join operator b on a.interviewer = b.operatorid where a.interviewid = '$interviewid'";
				$interviewer 			= $this->Campaign_model->select_sql($sql1);

				$mail = array();
				$mailtemplate = $this->Mail_model->select('mailprofile',array('mailprofileid' => 5));
				// var_dump($interviewer);exit;
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
					if ($mailSystem[0]['mcssl'] == '1') {
		        		$mail['mcsmtp']	= 'ssl://'.$mailSystem[0]['mcsmtp'];
		        	}else{
		        		$mail['mcsmtp']	= $mailSystem[0]['mcsmtp'];
		        	}
		        	$mail['mcuser']	= $mailSystem[0]['mcuser'];
		        	$mail['mcpass']	= base64_decode($mailSystem[0]['mcpass']);
		        	$mail['mcport']	= $mailSystem[0]['mcport'];
				}else{
					echo 'Error';
					exit;
				}

				if(isset($interviewer[0])){
					foreach ($interviewer as $key) {
						$name 		= $key['operatorname'];

						$chuoi_tim 				= array('[Tuyển dụng viên]','[Tên Ứng viên]','[Vị trí]');
						$chuoi_thay_the 		= array($name,$candidate,$position);
						$mail['emailsubject'] 	= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($subject));
						$mail['emailbody'] 		= str_replace($chuoi_tim,$chuoi_thay_the, html_entity_decode($body));
						$mail['toemail'] 		= $key['email'];
						$this->Mail_model->sendMail($mail);

						$mail1['fromemail'] 		= $mail['mcuser'];
						$mail1['toemail'] 			= $key['email'];
						$mail1['emailbody'] 		= $mail['emailbody'];
						$mail1['emailsubject'] 		= $mail['emailsubject'];
						$mail1["attachment"] 		= json_encode($mail["attachment"]);
						$this->Mail_model->insert('mailtable',$mail1);
				    }
				}
			}
		}else{
			echo 'Sai user hoặc password';
		}

	}
	public function get_mail()
    {
    	$this->readingEmail();
    	$operatorid = $this->session->userdata('user_admin')['operatorid'];
    	$sql ="SELECT a.mailid, a.emailsubject, a.createddate, b.operatorname from mailtable a LEFT OUTER JOIN operator b ON a.createdby = b.operatorid  WHere (a.isunread = 'Y' AND a.createdby = '$operatorid') ORDER BY a.createddate DESC";
    	$result['email'] = $this->Campaign_model->select_sql($sql);
    	$result['count'] = count($result['email']);
    	for ($j = 0; $j < count($result['email']); $j++) {
			$result['email'][$j]['date'] = date_format(date_create($result['email'][$j]['createddate']),"d/m/Y H:i:s");
		}
    	echo json_encode($result);
     }

     public function get_mail_byId()
    {
    	$mailid = $this->input->post('mailid');
    	$data['isunread'] = 'N';
    	$this->Campaign_model->update('mailtable',array('mailid' => $mailid),$data);

    	$sql ="SELECT a.*, b.operatorname from mailtable a LEFT OUTER JOIN operator b ON a.createdby = b.operatorid  WHere (a.mailid = '$mailid')";
    	$result = $this->Campaign_model->select_sql($sql);
		$result[0]['date'] = date_format(date_create($result[0]['createddate']),"d/m/Y H:i:s");
		$result[0]['emailbody'] = $result[0]['emailbody'];
		echo json_encode($result);
     }

     public function mailById()
    {
    	$mailid = $this->input->post('mailid');
        if($mailid != 0){
    	   $sql ="SELECT a.* from mailprofile a  WHere (a.mailprofileid = '$mailid')";
           $result = $this->Campaign_model->select_sql($sql);
            echo json_encode($result);
        }else{
            echo json_encode(1);
        }

     }


     public function readingEmail()
     {
     	set_time_limit(40000);

		// Connect to gmail
		$imapPath = '{mail.datxanh.com.vn:143}Inbox';
		$username = $this->session->userdata('user_admin')['mcuser'];
		$password = base64_decode($this->session->userdata('user_admin')['mcpass']);

		// try to connect
		$inbox = imap_open($imapPath,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

		   /* ALL - return all messages matching the rest of the criteria
		    ANSWERED - match messages with the \\ANSWERED flag set
		    BCC "string" - match messages with "string" in the Bcc: field
		    BEFORE "date" - match messages with Date: before "date"
		    BODY "string" - match messages with "string" in the body of the message
		    CC "string" - match messages with "string" in the Cc: field
		    DELETED - match deleted messages
		    FLAGGED - match messages with the \\FLAGGED (sometimes referred to as Important or Urgent) flag set
		    FROM "string" - match messages with "string" in the From: field
		    KEYWORD "string" - match messages with "string" as a keyword
		    NEW - match new messages
		    OLD - match old messages
		    ON "date" - match messages with Date: matching "date"
		    RECENT - match messages with the \\RECENT flag set
		    SEEN - match messages that have been read (the \\SEEN flag is set)
		    SINCE "date" - match messages with Date: after "date"
		    SUBJECT "string" - match messages with "string" in the Subject:
		    TEXT "string" - match messages with text "string"
		    TO "string" - match messages with "string" in the To:
		    UNANSWERED - match messages that have not been answered
		    UNDELETED - match messages that are not deleted
		    UNFLAGGED - match messages that are not flagged
		    UNKEYWORD "string" - match messages that do not have the keyword "string"
		    UNSEEN - match messages which have not been read yet*/

		// search and get unseen emails, function will return email ids
		// $emails 	= imap_search($inbox,'UNSEEN FROM "heodat234@gmail.com"');
		// var_dump($emails);exit;
		$operatorid = $this->session->userdata('user_admin')['operatorid'];
		$sql 		= "SELECT DISTINCT toemail from mailtable where createdby = '$operatorid'";
		$result	= $this->Campaign_model->select_sql($sql);
		if (!empty($result)) {
			foreach ($result as $row) {
				$toemail = trim($row['toemail']);
				if ($toemail == "") {
					continue;
				}
				$emails 	= imap_search($inbox,'UNSEEN FROM "'.$toemail.'"');
				if (!$emails) {
					continue;
				}
				foreach($emails as $mail) {
					$data 	= array();
				    $headerInfo = imap_headerinfo($inbox,$mail);
				    if (isset($headerInfo->subject)) {
				    	// $subject = $headerInfo->subject;
					    // if (strstr($subject,"#1544770598")) {
					    	// echo "<pre>";
					    	// print_r($headerInfo);
					    	// echo "</pre>";
							$data['emailsubject'] 	= iconv_mime_decode($headerInfo->subject);
							$to 					= $headerInfo->to[0];
						    $data['toemail'] 		= $to->mailbox.'@'.$to->host;
						    $data['createddate'] 	= date('Y-m-d H:i:s',strtotime($headerInfo->date));
						    $from 					= $headerInfo->from[0];
						    $data['fromemail'] 		= $from->mailbox.'@'.$from->host;

						    $data_cc = '';
						    if (isset($headerInfo->cc)) {
						    	$cc = $headerInfo->cc;
						    	foreach ($cc as $key) {
						    		$data_cc = $key->mailbox.'@'.$key->host.',';
						    	}
						    }
						    $data['cc'] 			= $data_cc;
						    // $message 		= iconv_mime_decode(imap_fetchbody($inbox, $mail, 1.1));
				      //       if ($message == "") {
				      //           $message 	= iconv_mime_decode(imap_fetchbody($inbox, $mail, 1));
				      //       }
						    $structure = imap_fetchstructure($inbox, $mail);

					        if(isset($structure->parts) && is_array($structure->parts) && isset($structure->parts[1])) {
					            $part = $structure->parts[1];
					            $message = imap_fetchbody($inbox,$mail,2);

					            if($part->encoding == 3) {
					                $message = imap_base64($message);
					            } else if($part->encoding == 1) {
					                $message = imap_8bit($message);
					            } else {
					                $message = imap_qprint($message);
					            }
					        }
				            $data['emailbody'] 		= $message;
				            $data['isunread'] 		= 'Y';
				            $data['createdby'] 		= $operatorid;
				            // var_dump($data); exit;
				            $mailid = $this->Campaign_model->insert('mailtable',$data);
					    // }
				    }
				}
			}
		}
		// colse the connection
		imap_expunge($inbox);
		imap_close($inbox);
		// return 1;
     }
}

/* End of file Email.php */
/* Location: ./application/controllers/admin/Email.php */
?>