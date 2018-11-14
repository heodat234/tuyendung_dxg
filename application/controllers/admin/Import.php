<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','my_helper'));
        $this->load->library(array('session','excel'));
        $this->load->model(array('admin/Data_model'));

        $this->data['header']   = $this->load->view('admin/home/header',null,true);
        $this->data['menu']     = $this->load->view('admin/home/menu',null,true);
        $this->data['footer']   = $this->load->view('admin/home/footer',null,true);
        
    }
    public function index()
    {   
        $this->data['temp'] = $this->load->view('admin/import/index',null,true);
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
            $data = $this->readExcel($filename);
            // var_dump($filename);
            redirect(base_url('hosoadmin'));
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

            $data['email']              = $objWorksheet->getCellByColumnAndRow(13,$row)->getValue();
            $data['idcard']     = $objWorksheet->getCellByColumnAndRow(9,$row)->getValue();
            
            $data['firstname']  = $objWorksheet->getCellByColumnAndRow(1,$row)->getValue();
            $data['lastname']   = $objWorksheet->getCellByColumnAndRow(2,$row)->getValue();
            $data['name']   = $data['firstname'].' '.$data['lastname'];
            $gender     = $objWorksheet->getCellByColumnAndRow(3,$row)->getValue();
            if ($gender == 'Nữ') {
                $data['gender'] = 'F';
            }else{
                $data['gender'] = 'M';
            }

            $date = $objWorksheet->getCellByColumnAndRow(4,$row);
            if(!strtotime($date)) {
                if(PHPExcel_Shared_Date::isDateTime($date)) {
                    $cellValue = $objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $dateValue = PHPExcel_Shared_Date::ExcelToPHP($cellValue); 
                    $data['dateofbirth']     = date('Y-m-d',$dateValue);                          
                } else {                        
                    $data['dateofbirth']   = "";                                                   
                } 
            }else {
                    $st = strtotime($date);
                    $data['dateofbirth']  = date('Y-m-d',$st);                         
            }    
            $data['placeofbirth']    = $objWorksheet->getCellByColumnAndRow(5,$row)->getValue();
            $maritalstatus           = $objWorksheet->getCellByColumnAndRow(6,$row)->getValue();
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

            $data['weight']     = $objWorksheet->getCellByColumnAndRow(7,$row)->getValue();
            $data['height']     = $objWorksheet->getCellByColumnAndRow(8,$row)->getValue();
            
            $date = $objWorksheet->getCellByColumnAndRow(10,$row);
            if(!strtotime($date)) {
                if(PHPExcel_Shared_Date::isDateTime($date)) {
                    $cellValue = $objWorksheet->getCellByColumnAndRow(10, $row)->getValue();
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

            $data['placeofissue']       = $objWorksheet->getCellByColumnAndRow(11,$row)->getValue();
            $data['telephone']          = $objWorksheet->getCellByColumnAndRow(12,$row)->getValue();
            
            $data['desirebenefit']      = $objWorksheet->getCellByColumnAndRow(14,$row)->getValue();
            $istalent           = $objWorksheet->getCellByColumnAndRow(15,$row)->getValue();
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

            $data['religion']           = $objWorksheet->getCellByColumnAndRow(17,$row)->getValue();
            // $data['ethnic']             = $objWorksheet->getCellByColumnAndRow(18,$row)->getValue();
            $data['nativeland']         = $objWorksheet->getCellByColumnAndRow(18,$row)->getValue();
            $data['nationality']        = $objWorksheet->getCellByColumnAndRow(19,$row)->getValue();    
            // $data['taxid']              = $objWorksheet->getCellByColumnAndRow(23,$row)->getValue();
            // $data['notes']              = $objWorksheet->getCellByColumnAndRow(25,$row)->getValue();
            $data['profilesrc']         =  'Nội bộ';
            foreach ($data as $key => $value) {
                if ($value == NULL) {
                    unset($data[$key]);
                }
            }

            $id = $this->Data_model->insert('candidate',$data);

            $data1 = array();
            $data1['address']        = $objWorksheet->getCellByColumnAndRow(20,$row)->getValue(); 
            if ($data1['address']  != NULL) {
                $data1['addtype']        = 'PREMANENT';
                $data1['candidateid']    = $id;
                $this->Data_model->insert('canaddress',$data1);
            }
            $data2 = array();
            $data2['address']        = $objWorksheet->getCellByColumnAndRow(21,$row)->getValue();
            if ($data2['address']  != NULL) {
                $data2['addtype']        = 'CONTACT';
                $data2['candidateid']    = $id;
                $this->Data_model->insert('canaddress',$data2);
            } 
            $array[$candidateid] = $id;

            


            
        }

        foreach ($array as $key => $value) {
            // //sheet 2
            $objReader2 = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel2 = $objReader2->load('public/document/'.$filename);
            $objWorksheet2  = $objPHPExcel2->setActiveSheetIndex(1);
            $highestRow2    = $objWorksheet2->getHighestRow();
            $highestColumn2 = $objWorksheet2->getHighestColumn();
            $highestColumnIndex2 = PHPExcel_Cell::columnIndexFromString($highestColumn2);
            for ($row = 3; $row <= $highestRow2;$row++)
            {
                $data1 = array();
                $candidateid1     = $objWorksheet2->getCellByColumnAndRow(0,$row)->getValue();
                if ($candidateid1 == NULL) {
                    break;
                }
                if ($candidateid1 == $key) {
                    $date = $objWorksheet2->getCellByColumnAndRow(1,$row);
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

                    $date = $objWorksheet2->getCellByColumnAndRow(2,$row);
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
                    $data1['company']       = $objWorksheet2->getCellByColumnAndRow(3,$row)->getValue();
                    $data1['position']      = $objWorksheet2->getCellByColumnAndRow(4,$row)->getValue();
                    $data1['candidateid']   =  $value;
                    foreach ($data1 as $key1 => $value1) {
                        if ($value1 == NULL) {
                            unset($data1[$key1]);
                        }
                    }
                    $this->Data_model->insert('canexperience',$data1);
                }
            }
            $objPHPExcel2->disconnectWorksheets();
            unset($objPHPExcel2);


            // //sheet 3
            $objReader3 = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel3 = $objReader3->load('public/document/'.$filename);
            $objWorksheet3  = $objPHPExcel3->setActiveSheetIndex(2);
            $highestRow3    = $objWorksheet3->getHighestRow();
            $highestColumn3 = $objWorksheet3->getHighestColumn();
            $highestColumnIndex3 = PHPExcel_Cell::columnIndexFromString($highestColumn3);
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

                    $date = $objWorksheet3->getCellByColumnAndRow(2,$row);
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
            $objPHPExcel3->disconnectWorksheets();
            unset($objPHPExcel3);

            // //sheet 4
            $objReader4 = PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel4 = $objReader4->load('public/document/'.$filename);
            $objWorksheet4  = $objPHPExcel4->setActiveSheetIndex(3);
            $highestRow4    = $objWorksheet4->getHighestRow();
            $highestColumn4 = $objWorksheet4->getHighestColumn();
            $highestColumnIndex4 = PHPExcel_Cell::columnIndexFromString($highestColumn4);
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

    

}
