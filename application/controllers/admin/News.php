<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
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
		
		
		$this->load->model(array('admin/News_model','M_auth'));
		
		$ac_data['tuyendung'] 	= 'active';
		$ac_data['tintuc'] 		= 'active';
		$this->data['header'] 	= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 	= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 	= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 3;
	    $this->sess  = $this->session->userdata('user_admin');  
	}

	public function index()
	{
		$order_by = array('colname' => 'lastupdate', 'typesort' => 'desc');
        $join[0] = array(
            'table'=>'candidate',
            'match'=>'news.createdby = candidate.candidateid'
        );
        $news_data['news'] = $this->News_model->select_row_option('news.*, candidate.name',array('1'=>1),'news', $join,'',$order_by,'','');
        $news_data['news_c'] = $this->News_model->select_row_option('news.*, candidate.name',array('news.status'=> 'C'),'news', $join,'',$order_by,'','');
		$data['nav'] = $this->load->view('admin/news/nav-newsrecruit',$news_data,true);
		$this->data['script'] = $this->load->view('admin/script/script_newsrecruit', $data, TRUE); 
		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$this->data['temp'] = $this->load->view('admin/news/infoPostRecruit',null,true);
		}
		// $this->data['temp'] = $this->load->view('admin/news/infoPostRecruit',null,true);

		$this->load->view('admin/home/master',$this->data);
	}
	// public function menu_news()
	// {	
	// 	$order_by = array('colname' => 'lastupdate', 'typesort' => 'desc');
 //        $join[0] = array(
 //            'table'=>'candidate',
 //            'match'=>'news.createdby = candidate.candidateid'
 //        );
 //        $news_data['news'] = $this->News_model->select_row_option('news.*, candidate.name',array('1'=>1),'news', $join,'',$order_by,'','');
 //        $news_data['news_c'] = $this->News_model->select_row_option('news.*, candidate.name',array('news.status'=> 'C'),'news', $join,'',$order_by,'','');
	// 	$data['temp'] = $this->load->view('admin/news/nav-newsrecruit',$news_data,true);
	// 	$data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 

	// 	$this->load->view('admin/home/master',$data);
	// }
	public function form_news($id='')
	{	
		if ($id == '') {
			$mdata['news'] = '';
		}else{
			$match = array('newsid'=>$id);
			$mdata['news'] = $this->News_model->select('news',$match,'*');
		}
		$data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 
		$data['temp'] = $this->load->view('admin/news/form_news',$mdata,true);
		$this->load->view('admin/home/master',$data);
	}
	public function modify()
	{
		$data = array();
		$frm = $this->input->post();
		$date = $frm['publishdate'];
		$timestamp = strtotime($date);
		if ($timestamp === FALSE) {
		  $timestamp = strtotime(str_replace('/', '-', $date));
		}
		$frm['publishdate'] =  date('Y-m-d H:i:s',$timestamp);
		$frm['createdby'] = $this->session->userdata('user_admin')['candidateid'];
		$id = $frm['newsid'];
		$data['createdby'] = $this->session->userdata('user_admin')['operatorname'];
		unset($frm['newsid']);
		if ($id == '') {
			$data['id'] = $this->News_model->insert('news',$frm);
			$data['check'] = '1';
		}else{
			$match = array('newsid' => $id);
			$this->News_model->update('news',$match,$frm);
			$data['check'] = '2';
		}
		echo json_encode($data);
	}
}

/* End of file Tintuc.php */
/* Location: ./application/controllers/admin/Tintuc.php */