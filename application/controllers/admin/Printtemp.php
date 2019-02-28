<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printtemp extends CI_Controller {
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
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','M_auth'));

		$ac_data['system'] 			= 'active';
		$ac_data['printtemp'] 		= 'active';
		$this->data['header'] 		= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 		= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 		= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 1;
	    $this->sess  = $this->session->userdata('user_admin');  
	}
	public function index()
	{
		$sql ="SELECT a.*, b.operatorname from templateform a LEFT OUTER JOIN operator b ON a.createdby = b.operatorid";
    	$data['templates'] = $this->Campaign_model->select_sql($sql);

		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$this->data['temp'] = $this->load->view('admin/printtemp/index',$data,true);
		}
		
		$this->load->view('admin/home/master',$this->data);
	}
	public function detail($value='')
	{
		if ($value != 0) {
			$sql ="SELECT a.*, b.operatorname from templateform a LEFT OUTER JOIN operator b ON a.createdby = b.operatorid WHERE a.tempid = '$value' ";
    		$data['template'] = $this->Campaign_model->select_sql($sql);
		}
		$data['group'] = $value;
		
		$this->data['temp'] = $this->load->view('admin/printtemp/detail',$data,true);

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

	public function insert()
	{
		$data 				= $this->input->post();
		
		$data['createdby'] 		= $this->session->userdata('user_admin')['operatorid'];

		$id = $this->Data_model->insert('templateform',$data);
		if($id != null)
		{
			redirect(base_url('admin/printtemp/detail/'.$id));
		}
		else
		{
			echo '<script>alert("Thêm bị lỗi!!")</script>';
		}
	}
	public function update($value)
	{
		$data = $this->input->post();

		$arrayName = array('tempid' => $value );
		$data['createdby'] 	= $this->session->userdata('user_admin')['operatorid'];

		$id = $this->Data_model->update('templateform',$arrayName,$data);
		redirect(base_url('admin/printtemp/detail/'.$value));
	}


	public function getTemplate()
    {
    	$tempid	 	= $this->input->post('tempid');
    	$sql 		= "SELECT a.subject,a.body from templateform a  WHERE a.tempid = '$tempid' ";
    	$data 		= $this->Campaign_model->select_sql($sql)[0];
    	echo json_encode($data);
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

}

/* End of file Email.php */
/* Location: ./application/controllers/admin/Email.php */
?>