<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','my_helper','file'));
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','admin/Mail_model'));
		$this->load->library(array('session','upload','excel'));
	}

    
    public function index()
    {
        include('docxtemplate.class.php');

        $docx = new DOCXTemplate('demo.docx');
        $docx->set('ten', 'hung' );
        $docx->set('ngay', date('m.d.Y'));

        $docx->downloadAs('test.docx'); // or $docx->downloadAs('test.docx');
    }

    public function importQuestion()
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

        $asmttemp = $this->input->post('asmttemp');
        $data = $this->readExcel($asmttemp,$filename);
        // echo json_encode(1);
            // var_dump($filename);
            redirect(base_url('admin/multiplechoice/detail/'.$asmttemp));
    }
    public function readExcel($asmttemp,$filename)
    {   
        // $filename   = 'demo.xlsx';
        // $asmttemp   = 20;
        $object         = new PHPExcel();
        $objReader      = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel    = $objReader->load('./public/document/'.$filename);

        $objWorksheet       = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow         = $objWorksheet->getHighestRow();
        $highestColumn      = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $questionid = 0;
        $data = array();
        $data['asmttemp']   = $asmttemp;
        $i = $j = 1;
        for ($row = 2; $row <= $highestRow;$row++)
        {
            $data_a         = array();
            $type           = $objWorksheet->getCellByColumnAndRow(0,$row)->getValue();
            if ($type == null) {
                break;
            }
            if ($type == 'SA' || $type == 'SB') {
                $data['section']            = $i;
                $data['sectionname']        = $objWorksheet->getCellByColumnAndRow(1,$row)->getValue();
                $i++;
            }
            if ($type == 'SA') {
                $data['questiontype']       = 'sights';
            }else if ($type == 'SB') {
                $data['questiontype']       = 'text';
            }
            if ($type == 'Q') {
                $data['sorting']            = $j;
                $data['questioncontent']    = $objWorksheet->getCellByColumnAndRow(1,$row)->getValue();
                $data['createdby']          = $this->session->userdata('user_admin')['operatorid'];

                $questionid                 = $this->Data_model->insert('asmtquestion',$data);
                $j++;
            }
            if ($type == 'A') {
                $data_a['questionid']                 = $questionid;
                $data_a['answercontent']              = $objWorksheet->getCellByColumnAndRow(1,$row)->getValue();
                $data_a['createdby']                  = $this->session->userdata('user_admin')['operatorid'];
                $isright = $objWorksheet->getCellByColumnAndRow(2,$row)->getValue();
                if ($isright == 'x') {
                    $data_a['isright']                = 1;
                }else{
                    $data_a['isright']                = 0;
                }
                $score = $objWorksheet->getCellByColumnAndRow(3,$row)->getValue();
                if ($score != NULL) {
                    $data_a['score']                  = $score;
                }

                $this->Data_model->insert('asmtoption',$data_a);
            }
            
            
        }
        
    }

    public function uploadCK()
    {

        $url = '../public/image/'.$_FILES['upload']['name'];

     //extensive suitability check before doing anything with the file…
        if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
        {
           $message = "No file uploaded.";
        }
        else if ($_FILES['upload']["size"] == 0)
        {
           $message = "The file is of zero length.";
        }
        else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
        {
           $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
        }
        else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
        {
           $message = "You may be attempting to hack our server. We’re on to you; expect a knock on the door sometime soon.";
        }
        else {
          $message = "";
          $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
          if(!$move)
          {
             $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
          }
          $url = "../" . $url;
        }
    $funcNum = $this->input->get('CKEditorFuncNum') ;
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }

}
 
?>