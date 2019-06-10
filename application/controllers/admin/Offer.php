<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','my_helper','file'));
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','admin/Mail_model'));
		$this->load->library(array('session','upload'));
	}

    //tool
    function toInt($str)
    {
        return (int)preg_replace("/\..+$/i", "", preg_replace("/[^0-9\.]/i", "", $str));
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



    public function offer($offerid = '', $check = '')
    {
        if ($offerid == '') {
            exit;
        }else{
            $sql = "SELECT a.*, candidate.name,candidate.email, candidate.idcard, candidate.dateofissue, candidate.placeofissue,candidate.dateofbirth,candidate.placeofbirth,candidate.telephone, reccampaign.position as position_campaign, canaddress.address, b.operatorname, c.filename, d.status,e.optionid, e.anstext, f.filename as avatar, g.letteroffermailtemp
            FROM offer a
            LEFT JOIN candidate ON a.candidateid = candidate.candidateid
            LEFT JOIN reccampaign ON a.campaignid = reccampaign.campaignid
            LEFT JOIN canaddress ON a.candidateid = canaddress.candidateid
            LEFT JOIN operator b ON a.createdby = b.operatorid
            LEFT JOIN document c ON a.createdby = c.referencekey AND c.tablename = 'operator'
            LEFT JOIN assessment d ON a.off_asmtid = d.asmtid
            LEFT JOIN asmtanswer e ON a.off_asmtid = e.asmtid
            LEFT JOIN document f ON a.candidateid = f.referencekey AND f.tablename = 'candidate'
            LEFT JOIN recflow g ON a.campaignid = g.campaignid AND a.roundid = g.roundid
            WHERE a.offerid = $offerid ";
            $result         = $this->Campaign_model->select_sql($sql);
            $data['offer']  = $result[0];
        }
        $join[1] = array('table'=> 'document','match' =>'tb.operatorid = document.referencekey');
        $o_data['operator'] = $data['operator'] = $this->Data_model->select_row_option('tb.operatorname,tb.operatorid,tb.email, document.filename',array('tb.status' => 'W','tb.candidateid' => 0),'','operator tb',$join,'','','','');
        $o_data['mailtemplate'] = $this->Campaign_model->select("mailprofileid,profilename",'mailprofile',array('profiletype' => '0'),'');
        $o_data['asmt_pv']          = $this->Campaign_model->select("asmttemp,asmtname",'asmtheader',array('asmtstatus' => 'W','asmttype' => '1'),'');
        $o_data['templateOffer']    = $this->Campaign_model->select("*",'templateform',array('status' => 'W','temptype' => '0'),'');
        $o_data['category'] = $this->Campaign_model->select("category,code,description,ref1,ref2",'codedictionary',array('status' => 'W'),'');
        $data['check']      =  $check;
        $data['category']   = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W'),'');
        $this->_data['temp']                = $this->load->view('admin/multiplechoice/offer',$data,true);
        $this->_data['modal_campaign']      = $this->load->view('admin/campaign/modal_campaign',$o_data,true);
        $this->load->view('admin/home/master-iframe',$this->_data);
    }

    public function saveOffer()
    {
    	$frm = $this->input->post();
        // var_dump($frm);exit;
    	$campaignid 		= $frm['campaignid'];
    	$roundid 		    = $frm['roundid'];
    	$count 		        = $frm['count'];
        $body               = html_entity_decode($frm['body11']);
    	$position           = ($this->Campaign_model->select("position",'reccampaign',array('campaignid' => $campaignid),''))[0]['position'];
        $offer = array();

    	for ($j=1; $j <= $count; $j++) {
    		$key = $frm['profile_'.$j];
            $date           = $this->toInt($key[3]).' Tháng ('.$key[4].' - '.$key[5].')';

            $category       = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W'),'');
            $trainer = $reportto = $level = $grade = $ps = $department = '';
            foreach ($category as $row) {
                if ($row['code'] == $key[8] && $row['category'] == 'POSITION') {
                    $trainer = $row['description'];
                    break;
                }
            }
            foreach ($category as $row) {
                if ($row['code'] == $key[9] && $row['category'] == 'POSITION') {
                    $reportto = $row['description'];
                    break;
                }
            }
            foreach ($category as $row) {
                if ($row['code'] == $key[12] && $row['category'] == 'CAPBAC') {
                    $level = $row['description'];
                    break;
                }
            }
            foreach ($category as $row) {
                if ($row['code'] == $key[14] && $row['category'] == 'POSITION') {
                    $ps = $row['description'];
                    break;
                }
            }
            foreach ($category as $row) {
                if ($row['code'] == $key[15] && $row['category'] == 'DEPT') {
                    $department = $row['description'];
                    break;
                }
            }
            $chuoi_tim           = array('[Chức danh vị trí]','[Địa điểm làm việc]','[Chế độ làm việc]','[Ngày nhận việc]','[Thời gian thử việc]','[Người hướng dẫn]','[Báo cáo cho]','[Lương thử việc]','[Lương chính thức]','[Cấp]','[Bậc]','[Chức vụ]','[Phòng ban]','[Phụ cấp ăn trưa]','[Phụ cấp điện thoại]','[Hỗ trợ xăng xe]','[Phụ cấp tài xế]','[Phụ cấp khác]');
            $chuoi_thay_the      = array($ps,$key[6],$key[7],$key[2],$date,$trainer,$reportto,number_format($this->toInt($key[10])),number_format($this->toInt($key[11])),$level,$key[13],$ps,$department,number_format($this->toInt($key[16])),number_format($this->toInt($key[17])),number_format($this->toInt($key[18])),number_format($this->toInt($key[19])),number_format($this->toInt($key[20])));
            // var_dump(str_replace($chuoi_tim,$chuoi_thay_the, $body));exit;

            if ($frm['offerid'] == 0) {
                //lưu phiếu mời đề nghị ứng viên
                $a_data['asmttemp']             = '2';
                $a_data['candidateid']          = $key[0];
                $a_data['campaignid']           = $campaignid;
                $a_data['roundid']              = $roundid;
                $a_data['status']               = 'P';
                $a_data['sysform']              = 'N';
                $a_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
                $asmtid = $this->Data_model->insert('assessment',$a_data);

                //lưu genquest
                $g_data['asmtid']               = $asmtid;
                $g_data['questionid']           = '2';
                $g_data['createdby']            = $this->session->userdata('user_admin')['operatorid'];
                $this->Data_model->insert('genquest',$g_data);

                //lưu offer
                $data['candidateid']        = $key[0];
                $data['campaignid']         = $campaignid;
                $data['roundid']            = $roundid;
                $data['contracttype']       = $key[7];
                $data['startdate']          = date('Y-m-d',strtotime(str_replace('/', '-', $key[2])));
                $data['fromdate']           = date('Y-m-d',strtotime(str_replace('/', '-', $key[4])));
                $data['todate']             = date('Y-m-d',strtotime(str_replace('/', '-', $key[5])));
                $data['duration']           = $this->toInt($key[3]);
                $data['durationunit']       = 'Tháng';
                $data['location']           = $key[6];
                $data['workingtype']        = $key[7];
                $data['trainer']            = $key[8];
                $data['reportto']           = $key[9];
                $data['tempbenefit']        = $this->toInt($key[10]);
                $data['officialbenefit']    = $this->toInt($key[11]);
                $data['positionlevel']      = $key[12];
                $data['grade']              = $key[13];
                $data['position']           = $key[14];
                $data['department']         = $key[15];
                $data['avalue0']            = $this->toInt($key[16]);
                $data['avalue1']            = $this->toInt($key[17]);
                $data['avalue2']            = $this->toInt($key[18]);
                $data['avalue3']            = $this->toInt($key[19]);
                $data['avalue4']            = $this->toInt($key[20]);
                $data['subject']            = $frm['subject'];
                $data['body']               = str_replace($chuoi_tim,$chuoi_thay_the, $body);
                $data['note']               = $frm['tempid'];
                $data['off_asmtid']         = $asmtid;
                $data['createdby']          = $this->session->userdata('user_admin')['operatorid'];
                if (isset($frm['isshare'])) {
                    $data['isshare']        = $frm['isshare'];
                }
                $offer[$j]                  = $this->Data_model->insert('offer',$data);
            }else{
                $match = array('asmtid' => $frm['off_asmtid']);
                $a_data['status']               = '';
                $a_data['updatedby']            = $this->session->userdata('user_admin')['operatorid'];
                $asmtid = $this->Data_model->update('assessment',$match,$a_data);

                $match1 = array('offerid' => $frm['offerid']);
                $data['startdate']          = date('Y-m-d',strtotime(str_replace('/', '-', $key[2])));
                $data['fromdate']           = date('Y-m-d',strtotime(str_replace('/', '-', $key[4])));
                $data['todate']             = date('Y-m-d',strtotime(str_replace('/', '-', $key[5])));
                $data['duration']           = $this->toInt($key[3]);
                $data['durationunit']       = 'Tháng';
                $data['location']           = $key[6];
                $data['workingtype']        = $key[7];
                $data['trainer']            = $key[8];
                $data['reportto']           = $key[9];
                $data['tempbenefit']        = $this->toInt($key[10]);
                $data['officialbenefit']    = $this->toInt($key[11]);
                $data['positionlevel']      = $key[12];
                $data['grade']              = $key[13];
                $data['position']           = $key[14];
                $data['department']         = $key[15];
                $data['avalue0']            = $this->toInt($key[16]);
                $data['avalue1']            = $this->toInt($key[17]);
                $data['avalue2']            = $this->toInt($key[18]);
                $data['avalue3']            = $this->toInt($key[19]);
                $data['avalue4']            = $this->toInt($key[20]);
                if ($frm['subject'] != '') {
                    $data['subject']            = $frm['subject'];
                }
                if ($body != '') {
                    $data['body']           = str_replace($chuoi_tim,$chuoi_thay_the, $body);
                }
                $data['updatedby']          = $this->session->userdata('user_admin')['operatorid'];
                if (isset($frm['isshare'])) {
                    $data['isshare']        = $frm['isshare'];
                }
                $offer[$j]                  = $this->Data_model->update('offer',$match1, $data);
            }
    	}
        //mail
    	$checkmail                 = $this->input->post('checkmail');
        if (isset($checkmail)) {
            $mail = array();

            $toemail                = explode(',',$frm['to']);
            $subject                = html_entity_decode($frm['subject']);
            $mail['cc']             = $frm['cc'];
            $mail['bcc']            = $frm['bcc'];
            $body                   = html_entity_decode($frm['body4']);
            $fileattach             = $this->upload_files('public/document/',$_FILES['attach']);
            if($fileattach == false){
                if($frm['preattach'] != '' && $frm['preattach'] != 'false' ){
                    $fileattach = array();
                    $temp = json_decode($frm['preattach'],true);
                    for ($f=0; $f < count($temp); $f++) {
                        array_push($fileattach, base_url().'public/document/'.$temp[$f]);
                    }
                }
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
            $i = 1;
            foreach ($toemail as $key) {
                $can = $frm['profile_'.$i];
                $ngay_tam = date('Y-m-d H:i:s',strtotime(str_replace('/', '-', $can[2])));
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
                $startdate = $thu.' ngày '.$can[2];
                $candidateid_mail = $frm['profile_'.$i][0];
                $roundname      = ($this->Campaign_model->select("roundname",'recflow',array('campaignid' => $campaignid,'roundid' => $roundid),''))[0]['roundname'];
                $user           = $this->Campaign_model->select("candidateid,email,lastname,name",'candidate',array('candidateid' => $candidateid_mail),'');
                if (isset($user[0])) {
                    $lastname   = $user[0]['lastname'];
                    $name       = $user[0]['name'];
                    $link       = '<a href="'.base_url().'admin/offer/offer/'.$offer[$i].'" >Thư mời nhận việc</a>';
                }else{
                    $lastname   = 'Bạn';
                    $name       = 'Bạn';
                    $link       = '<a href="'.base_url().'admin/offer/offer/" >Thư mời nhận việc</a>';
                }
                $chuoi_tim              = array('[Tên Ứng viên]','[Vòng tuyển dụng]','[Tên]','[Link thư mời nhận việc]','[Vị trí]','[Ngày nhận việc]');
                $chuoi_thay_the         = array($name,$roundname,$lastname,$link,$ps,$startdate);
                $mail['emailsubject']   = str_replace($chuoi_tim,$chuoi_thay_the, $subject);
                $mail['emailbody']      = str_replace($chuoi_tim,$chuoi_thay_the, $body);
                $mail['toemail']        = $key;
                $mail["attachment"]     = $fileattach;
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
                $i++;
            }
        }
        echo json_encode(1);
    }
    public function offer_feedback()
    {
        $frm                    = $this->input->post();
        $asmtid                 = $frm['off_asmtid'];
        $offerid                = $frm['offerid'];
        $note                   = $frm['note'];
        //update assessment
        $a_data['status']       = 'C';
        $match                  = array('asmtid' => $asmtid);
        $this->Data_model->update('assessment',$match,$a_data);


        //inssert answer
        $data['asmtid']         = $asmtid;
        $data['questionid']     = '2';
        $data['optionid']       = $frm['check'];
        if ($frm['check'] == 2) {
            $data['ans_text']    = $note;
        }
        $this->Data_model->insert('asmtanswer',$data);
        echo json_encode(1);

    }

    public function cancelOffer()
    {
        $frm = $this->input->post();
        $match = array('asmtid' => $frm['asmtid']);
        $data['status']   = 'D';
        if (isset($frm['isshare'])) {
            $data['isshare']  = $frm['isshare'];
        }
        $data['updatedby']      = $this->session->userdata('user_admin')['operatorid'];
        $data['lastupdate']     = date('Y-m-d H:i:s');
        $this->Data_model->update('assessment',$match,$data);
        echo json_encode(1);
    }

    public function exportOffer($id)
    {
        include('docxtemplate.class.php');

        $docx = new DOCXTemplate('template.docx');

        $sql = "SELECT a.*, candidate.name,candidate.email, candidate.idcard, candidate.dateofissue, candidate.placeofissue,candidate.dateofbirth,candidate.placeofbirth,candidate.telephone, reccampaign.position as position_campaign, canaddress.address
            FROM offer a
            LEFT JOIN candidate ON a.candidateid = candidate.candidateid
            LEFT JOIN reccampaign ON a.campaignid = reccampaign.campaignid
            LEFT JOIN canaddress ON a.candidateid = canaddress.candidateid
            LEFT JOIN operator b ON a.createdby = b.operatorid
            WHERE a.offerid = $id ";
        $result         = $this->Campaign_model->select_sql($sql);
        if (count($result) > 1) {
            if ($result[0]['address'] == "") {
                $result = $result[1];
            }else{
                $result = $result[0];
            }
        }else{
            $result = $result[0];
        }

        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // exit;
        $category       = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W'),'');
        $trainer = $reportto = $level = $grade = $ps = $department = '';
        foreach ($category as $row) {
            if ($row['code'] == $result['trainer'] && $row['category'] == 'POSITION') {
                $trainer = $row['description'];
                break;
            }
        }
        foreach ($category as $row) {
            if ($row['code'] == $result['reportto'] && $row['category'] == 'POSITION') {
                $reportto = $row['description'];
                break;
            }
        }
        foreach ($category as $row) {
            if ($row['code'] == $result['positionlevel'] && $row['category'] == 'CAPBAC') {
                $level = $row['description'];
                break;
            }
        }
        foreach ($category as $row) {
            if ($row['code'] == $result['position'] && $row['category'] == 'POSITION') {
                $ps = $row['description'];
                break;
            }
        }
        foreach ($category as $row) {
            if ($row['code'] == $result['department'] && $row['category'] == 'DEPT') {
                $department = $row['description'];
                break;
            }
        }
        $ngay =  date_format(date_create($result['createddate']),"d");
        $thang =  date_format(date_create($result['createddate']),"m");
        $nam =  date_format(date_create($result['createddate']),"Y");
        if ($result['note'] == 1) {
            $docx->set('prefix', 'Chị' );
        }else{
            $docx->set('prefix', 'Anh' );
        }
        if ($result['address'] == '') {
            $docx->set('diachi', '');
        }else{
            $docx->set('diachi', $result['address']);
        }

        $docx->set('ngay', $ngay );
        $docx->set('thang', $thang );
        $docx->set('nam', $nam );
        $docx->set('ten', ($result['name'] == '')? '' : $result['name'] );

        $docx->set('ngaysinh', date_format(date_create($result['dateofbirth']),"d/m/Y"));
        $docx->set('noisinh', ($result['placeofbirth'] == '')? '' : $result['placeofbirth']);
        $docx->set('cmnd', ($result['idcard'] == '')? '' : $result['idcard']);
        $docx->set('ngaycap', date_format(date_create($result['dateofissue']),"d/m/Y"));
        $docx->set('noicap', ($result['placeofissue'] == '')? '' : $result['placeofissue']);
        $docx->set('dienthoai', trim($result['telephone'],','));
        $docx->set('vitri', $ps);
        // $docx->set('diachi', $result['location']);
        if ($result['contracttype'] == 'Toàn thời gian') {
            $docx->set('t', 'x');
            $docx->set('b', '');
        }else{
            $docx->set('t', '');
            $docx->set('b', 'x');
        }
        $docx->set('nhanviec', date_format(date_create($result['startdate']),"d/m/Y"));
        $docx->set('thuviec', (int)$result['duration'].' Tháng ('.date_format(date_create($result['fromdate']),"d/m/Y").' - '.date_format(date_create($result['todate']),"d/m/Y").')');
        $docx->set('nguoihd', $trainer);
        $docx->set('baocaocho', $reportto);
        $docx->set('luongthuviec', number_format((int)$result['tempbenefit']));
        $docx->set('luongchinhthuc', number_format((int)$result['officialbenefit']));
        $docx->set('cap', $level);
        $docx->set('bac', ($result['grade'] == '')? '' : $result['grade']);
        $docx->set('phucapantrua', number_format((int)$result['avalue0']));
        $docx->set('phucapdt', number_format((int)$result['avalue1']));



        $docx->downloadAs('offer.docx');
    }
    public function loadCategory()
    {
        $data['position']       = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W','category' =>'POSITION'),'');
        $data['capbac']       = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W','category' =>'CAPBAC'),'');
        $data['dept']       = $this->Campaign_model->select("category,code,description",'codedictionary',array('status' => 'W','category' =>'DEPT'),'');
        echo json_encode($data);
    }
}

?>