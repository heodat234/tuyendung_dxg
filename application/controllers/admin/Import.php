<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','my_helper'));
        $this->load->library(array('session','excel'));
        $this->load->model(array('admin/Data_model','M_auth','admin/Candidate_model','admin/Campaign_model'));

        $ac_data['system']      = 'active';
        $ac_data['import']      = 'active';
        $this->data['header']   = $this->load->view('admin/home/header',null,true);
        $this->data['menu']     = $this->load->view('admin/home/menu',$ac_data,true);
        $this->data['footer']   = $this->load->view('admin/home/footer',null,true);

        $this->seg = 9;
        $this->sess  = $this->session->userdata('user_admin');  
    }
    public function index()
    {   
        if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
            $this->data['temp']     = $this->load->view('admin/error/404',null,true);
        }else{
            $this->data['temp'] = $this->load->view('admin/import/index',null,true);
        }
  
        $this->load->view('admin/home/master',$this->data);
    }
    
    public function importCandidate()
    {

        if (!empty($_FILES['files']['name'])) {
            $config['upload_path'] = './public/document';
            $config['allowed_types'] = 'xlsx';
            $config['file_name'] = $_FILES['files']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('files')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            } else{
                $error = $this->upload->display_errors();
                echo $error;exit;
                // $a_data["file"] = '';
            }
        }else{
            $filename = '';
        }
        $m_data['mapcode']  = '0';
        $match = array('createddate >' => date('2018-11-28 10:12:02') );
        $this->Data_model->update('candidate',$match,$m_data);
        $data = $this->readExcel($filename);
        echo json_encode(1);
            // var_dump($filename);
            // redirect(base_url('hosoadmin'));
    }
    public function readExcel($filename)
    {   
        $object = new PHPExcel();
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load('public/document/'.$filename);

        $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $array = array();
        $data = array();
        for ($row = 3; $row <= $highestRow;$row++)
        {
            $data = array();
            $candidateid      = $objWorksheet->getCellByColumnAndRow(0,$row)->getValue();
            if ($candidateid == null) {
                break;
            }

            $data['email']          = $objWorksheet->getCellByColumnAndRow(12,$row)->getValue();
            $data['idcard']         = $objWorksheet->getCellByColumnAndRow(8,$row)->getValue();
            
            $data['name']           = $objWorksheet->getCellByColumnAndRow(1,$row)->getValue();
            $name                   = explode(' ', $data['name']);
            $length                 = count($name);
            $data['lastname']       = $name[$length-1];
            $data['firstname']      = trim(str_replace($data['lastname'],'', $data['name']));
            $gender                 = $objWorksheet->getCellByColumnAndRow(2,$row)->getValue();
            if ($gender == 'Nữ') {
                $data['gender'] = 'F';
            }else{
                $data['gender'] = 'M';
            }

            $date                   = $objWorksheet->getCellByColumnAndRow(3,$row);
            if ($date != '') {
                if(!strtotime($date)) {
                    if(PHPExcel_Shared_Date::isDateTime($date)) {
                        $cellValue = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue); 
                        $data['dateofbirth']        = date('Y-m-d',$dateValue);                          
                    } else {                        
                        $data['dateofbirth']        = "";                                                   
                    } 
                }else {
                        $st                         = strtotime($date);
                        $data['dateofbirth']        = date('Y-m-d',$st);                         
                } 
            }
               
            $data['placeofbirth']    = $objWorksheet->getCellByColumnAndRow(4,$row)->getValue();
            if ($data['placeofbirth'] == 'HCM' || $data['placeofbirth'] == 'TPHCM') {
                $data['placeofbirth'] = 'TP Hồ Chí Minh';
            }
            $maritalstatus           = $objWorksheet->getCellByColumnAndRow(5,$row)->getValue();
            if ($maritalstatus == 'Độc thân') {
                $data['maritalstatus']  = 'S';
            }
            else if ($maritalstatus == 'Đã kết hôn'){
                $data['maritalstatus']  = 'M';
            }
            else if ($maritalstatus == 'Goá'){
                $data['maritalstatus']  = 'W';
            }
            else if ($maritalstatus == 'Ly dị'){
                $data['maritalstatus']  = 'D';
            }

            $data['weight']     = $objWorksheet->getCellByColumnAndRow(6,$row)->getValue();
            $data['height']     = $objWorksheet->getCellByColumnAndRow(7,$row)->getValue();
            
            $date = $objWorksheet->getCellByColumnAndRow(9,$row);
            if ($date != '') {
                if(!strtotime($date)) {
                    if(PHPExcel_Shared_Date::isDateTime($date)) {
                        $cellValue = $objWorksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue);  
                        // var_dump($dateValue);exit;               
                        $data['dateofissue']     = date('Y-m-d',$dateValue);                          
                    } else {                        
                        $data['dateofissue']  = "";                                                   
                    } 
                }else {
                        $st = strtotime($date);
                        $data['dateofissue'] = date('Y-m-d',$st);                         
                } 
            }
             

            $data['placeofissue']       = $objWorksheet->getCellByColumnAndRow(10,$row)->getValue();
            if ($data['placeofissue'] == 'HCM' || $data['placeofissue'] == 'TPHCM') {
                $data['placeofissue'] = 'TP Hồ Chí Minh';
            }
            $data['telephone']          = $objWorksheet->getCellByColumnAndRow(11,$row)->getValue();
            
            $data['desirebenefit']      = $objWorksheet->getCellByColumnAndRow(13,$row)->getValue();
            $istalent           = $objWorksheet->getCellByColumnAndRow(14,$row)->getValue();
            if ($istalent == 'Không tiềm năng') {
                $data['istalent']  = '';
            }
            else if ($istalent == 'Cần quan tâm'){
                $data['istalent']  = '1';
            }
            else if ($istalent == 'Tiềm năng'){
                $data['istalent']  = '2';
            }
            else if ($istalent == 'Rất tiềm năng'){
                $data['istalent']  = '3';
            }

            $data['ethnic']           = $objWorksheet->getCellByColumnAndRow(16,$row)->getValue();
            // $data['ethnic']             = $objWorksheet->getCellByColumnAndRow(18,$row)->getValue();
            $data['nativeland']         = $objWorksheet->getCellByColumnAndRow(17,$row)->getValue();
            $data['nationality']        = $objWorksheet->getCellByColumnAndRow(18,$row)->getValue();    
            $data['mapcode']            = $objWorksheet->getCellByColumnAndRow(21,$row)->getValue();
            // $data['notes']              = $objWorksheet->getCellByColumnAndRow(25,$row)->getValue();
            $data['profilesrc']         =  'Nội bộ';
            foreach ($data as $key => $value) {
                if ($value == NULL) {
                    unset($data[$key]);
                }
            }

            $id = $this->Data_model->insert('candidate',$data);

            $data1 = array();
            $data1['address']        = $objWorksheet->getCellByColumnAndRow(19,$row)->getValue(); 
            if ($data1['address']  != NULL) {
                $data1['addtype']        = 'PREMANENT';
                $data1['candidateid']    = $id;
                $this->Data_model->insert('canaddress',$data1);
            }
            $data2 = array();
            $data2['address']        = $objWorksheet->getCellByColumnAndRow(20,$row)->getValue();
            if ($data2['address']  != NULL) {
                $data2['addtype']        = 'CONTACT';
                $data2['candidateid']    = $id;
                $this->Data_model->insert('canaddress',$data2);
            } 
            $array[$candidateid] = $id;
            $data['tags']           = $objWorksheet->getCellByColumnAndRow(15,$row)->getValue();
            $arr_tags = explode(',', $data['tags']);
            foreach ($arr_tags as $key => $value) {
                $result = array();
                $result['title']  =  trim($value);
                $row1 = array();
                $row1 = $this->Candidate_model->checktagsprofile($result);

                if(!is_array($row1))
                {   
                    if(trim($value) == "")
                    {
                        continue;
                    }
                    $data1t['title'] = trim($value);
                    $data2t['tagid'] = $this->Data_model->insert("tagprofile",$data1t);
                    $data2t['tablename'] = "candidate";
                    $data2t['recordid'] = $id;
                    $data2t['categoryid'] = "position"; 
                    $this->Data_model->insert("tagtransaction",$data2t);
                }
                else
                {
                    $data2t['tagid'] = $row1['tagid'];
                    $data2t['tablename'] = "candidate";
                    $data2t['recordid'] = $id;
                    $data2t['categoryid'] = "position"; 
                    $this->Data_model->insert("tagtransaction",$data2t);
                }   
            }
            
        }

        foreach ($array as $key => $value) {
            // //sheet 2
            // $objReader2 = PHPExcel_IOFactory::createReader('Excel2007');
            // $objPHPExcel2 = $objReader2->load('public/document/'.$filename);
            $objWorksheet2          = $objPHPExcel->setActiveSheetIndex(1);
            $highestRow2            = $objWorksheet2->getHighestRow();
            $highestColumn2         = $objWorksheet2->getHighestColumn();
            $highestColumnIndex2    = PHPExcel_Cell::columnIndexFromString($highestColumn2);
            for ($row = 3; $row <= $highestRow2;$row++)
            {
                $data1 = array();
                $candidateid1     = $objWorksheet2->getCellByColumnAndRow(0,$row)->getValue();
                if ($candidateid1 == NULL) {
                    break;
                }
                if ($candidateid1 == $key) {
                    $date = $objWorksheet2->getCellByColumnAndRow(1,$row);
                    if ($date != '') {
                        if(!strtotime($date)) {
                            if(PHPExcel_Shared_Date::isDateTime($date)) {
                                $cellValue = $objWorksheet2->getCellByColumnAndRow(1, $row)->getValue();
                                $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue);    
                                $data1['datefrom']     = date('Y-m-d',$dateValue);   
                            } else {                        
                                $data1['datefrom']  = "";                                                   
                            } 
                        }else {
                                $st = strtotime($date);
                                $data1['datefrom'] = date('Y-m-d',$st);                         
                        } 
                    }
                    $date = $objWorksheet2->getCellByColumnAndRow(2,$row);
                    if ($date != '') {
                        if(!strtotime($date)) {
                            if(PHPExcel_Shared_Date::isDateTime($date)) {
                                $cellValue = $objWorksheet2->getCellByColumnAndRow(2, $row)->getValue();
                                $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue);                  
                                $data1['dateto']     = date('Y-m-d',$dateValue);                          
                            } else {                        
                                $data1['dateto']  = "";                                                   
                            } 
                        }else {
                                $st = strtotime($date);
                                $data1['dateto'] = date('Y-m-d',$st);                         
                        } 
                    }
                    $data1['company']       = $objWorksheet2->getCellByColumnAndRow(3,$row)->getValue();
                    $data1['position']      = $objWorksheet2->getCellByColumnAndRow(4,$row)->getValue();
                    $data1['responsibility']      = nl2br($objWorksheet2->getCellByColumnAndRow(5,$row)->getValue());
                    $data1['candidateid']   =  $value;
                    foreach ($data1 as $key1 => $value1) {
                        if ($value1 == NULL) {
                            unset($data1[$key1]);
                        }
                    }
                    $this->Data_model->insert('canexperience',$data1);

                    // $candidateid = $value;
                    // $sql = "select count(*) as count from profilehistory where candidateid = $candidateid AND actiontype = 'Talent'";
                    // $checkAuto = $this->Campaign_model->select_sql($sql)[0]['count'];
                    // if($checkAuto <= 0){
                    //     $namkn = $this->Candidate_model->yearexperirence($candidateid);
                    //     if ($namkn >=1 && $namkn < 5) {
                    //         $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 1));
                    //     }else if ($namkn >=5 && $namkn < 10) {
                    //         $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 2));
                    //     }else{
                    //         $this->Candidate_model->UpdateData('candidate',array('candidateid' => $candidateid),array('istalent' => 3));
                    //     }
                    // }
                }
            }


            // //sheet 3
            
            $objWorksheet3          = $objPHPExcel->setActiveSheetIndex(2);
            $highestRow3            = $objWorksheet3->getHighestRow();
            $highestColumn3         = $objWorksheet3->getHighestColumn();
            $highestColumnIndex3    = PHPExcel_Cell::columnIndexFromString($highestColumn3);
            $array = array();
            $data = array();
            $k=1;
            for ($row = 3; $row <= $highestRow3;$row++)
            {
                $data1 = array();
                $candidateid1     = $objWorksheet3->getCellByColumnAndRow(0,$row)->getValue();
                if ($candidateid1 == NULL) {
                    break;
                }
                if ($candidateid1 == $key) {
                    $date = $objWorksheet3->getCellByColumnAndRow(1,$row);
                    if ($date != '') {
                        if(!strtotime($date)) {
                            if(PHPExcel_Shared_Date::isDateTime($date)) {
                                $cellValue = $objWorksheet3->getCellByColumnAndRow(1, $row)->getValue();
                                $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue);                
                                $data1['datefrom']     = date('Y-m-d',$dateValue);                          
                            } else {                        
                                $data1['datefrom']  = "";                                                   
                            } 
                        }else {
                                $st = strtotime($date);
                                $data1['datefrom'] = date('Y-m-d',$st);                         
                        } 
                    }
                    $date = $objWorksheet3->getCellByColumnAndRow(2,$row);
                    if ($date != '') {
                        if(!strtotime($date)) {
                            if(PHPExcel_Shared_Date::isDateTime($date)) {
                                $cellValue = $objWorksheet3->getCellByColumnAndRow(2, $row)->getValue();
                                $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue);                  
                                $data1['dateto']     = date('Y-m-d',$dateValue);                          
                            } else {                        
                                $data1['dateto']  = "";                                                   
                            } 
                        }else {
                                $st = strtotime($date);
                                $data1['dateto'] = date('Y-m-d',$st);                         
                        }
                    } 
                    $data1['trainingcenter']  = $objWorksheet3->getCellByColumnAndRow(3,$row)->getValue();
                    $data1['trainingplace']   = $objWorksheet3->getCellByColumnAndRow(4,$row)->getValue();
                    $data1['trainingcourse']  = $objWorksheet3->getCellByColumnAndRow(5,$row)->getValue();
                    $data1['certificate']     = $objWorksheet3->getCellByColumnAndRow(6,$row)->getValue();
                    $data1['candidateid'] =  $value;

                    foreach ($data1 as $key1 => $value1) {
                        if ($value1 == NULL) {
                            unset($data1[$key1]);
                        }
                    }
                    $this->Data_model->insert('canknowledge',$data1);
                }
            }

            // //sheet 4
            
            $objWorksheet4          = $objPHPExcel->setActiveSheetIndex(3);
            $highestRow4            = $objWorksheet4->getHighestRow();
            $highestColumn4         = $objWorksheet4->getHighestColumn();
            $highestColumnIndex4    = PHPExcel_Cell::columnIndexFromString($highestColumn4);
            for ($row = 3; $row <= $highestRow4;$row++)
            {
                $data1 = array();
                $candidateid4     = $objWorksheet4->getCellByColumnAndRow(0,$row)->getValue();
                // if ($candidateid1 == NULL) {
                //     break;
                // }
                if ($key == $candidateid4) {

                    $data1['name']          = $objWorksheet4->getCellByColumnAndRow(1,$row)->getValue();
                    $data1['position']      = $objWorksheet4->getCellByColumnAndRow(2,$row)->getValue();
                    $data1['company']       = $objWorksheet4->getCellByColumnAndRow(3,$row)->getValue();
                    $data1['contactno']     = $objWorksheet4->getCellByColumnAndRow(4,$row)->getValue();
                    $data1['candidateid']   =  $value;

                    foreach ($data1 as $key1 => $value1) {
                        if ($value1 == NULL) {
                            unset($data1[$key1]);
                        }
                    }

                    $this->Data_model->insert('canreference',$data1);
                }
            }
            // $objPHPExcel4->disconnectWorksheets();
            // unset($objPHPExcel4);
        }
        

    }

    public function importCV()
    {
        $files          = $this->upload_files('public/document/',$_FILES['fileCV']);
        for ($i=0; $i < count($files); $i++) { 
            $vt= strpos($files[$i],'-');
            $mapcode = substr($files[$i],0,$vt);
            if ($mapcode == '01') {
                $mapcode = 1;
            }else if ($mapcode == '02') {
                $mapcode = 2;
            }
            else if ($mapcode == '03') {
                $mapcode = 3;
            }
            else if ($mapcode == '04') {
                $mapcode = 4;
            }
            else if ($mapcode == '05') {
                $mapcode = 5;
            }
            else if ($mapcode == '06') {
                $mapcode = 6;
            }
            else if ($mapcode == '07') {
                $mapcode = 7;
            }
            else if ($mapcode == '08') {
                $mapcode = 8;
            }
            else if ($mapcode == '09') {
                $mapcode = 9;
            }
            $match = array('mapcode' => $mapcode);
            $result = $this->Data_model->select_row_option('candidateid',$match,'','candidate','','','','','');
            if (isset($result[0])) {
                
                $data2["tablename"]         = 'candidate';
                $data2["referencekey"]      = $result[0]['candidateid'];
                $data2["filename"]          = $files[$i];
                $data2["subject"]           = 'File CV';
                $data2["author"]            = $result[0]['candidateid'];
                $data2["url"]               = base_url().'public/document/'.$files[$i];
                $data2["createdby"]         = $this->session->userdata('user_admin')['operatorid'];
                $data2["updatedby"]         = $this->session->userdata('user_admin')['operatorid'];
                $this->Data_model->insert('document',$data2);
            }
            
        }
        echo json_encode(1);
    }


    private function upload_files($path, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => FALSE,                       
        );

        $this->load->library('upload', $config);

        $fileCV = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['attach[]']['name']     = $files['name'][$key];
            $_FILES['attach[]']['type']     = $files['type'][$key];
            $_FILES['attach[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['attach[]']['error']    = $files['error'][$key];
            $_FILES['attach[]']['size']     = $files['size'][$key];

            $filename = preg_replace('([\s_&#%]+)', '-', $image);
            $fileCV[]                       = $filename;

            $config['file_name']            = $filename;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('attach[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $fileCV;
    }

}
