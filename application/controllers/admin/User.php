<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
		
		$this->load->model(array('admin/User_model'));
		
		$ac_data['system'] 	= 'active';
		$ac_data['user'] 		= 'active';
		$this->data['header'] 	= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 	= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 	= $this->load->view('admin/home/footer',null,true);
	}

	public function index()
	{
		// $order_by = array('colname' => 'lastupdate', 'typesort' => 'desc');
  //       $join[0] = array(
  //           'table'=>'candidate',
  //           'match'=>'news.createdby = candidate.candidateid'
  //       );
  //       $news_data['news'] = $this->News_model->select_row_option('news.*, candidate.name',array('1'=>1),'news', $join,'',$order_by,'','');
  //       $news_data['news_c'] = $this->News_model->select_row_option('news.*, candidate.name',array('news.status'=> 'C'),'news', $join,'',$order_by,'','');
		$this->data['script'] = $this->load->view('admin/script/script_user',null, TRUE); 
		$this->data['temp'] = $this->load->view('admin/user/main',null,true);

		$this->load->view('admin/home/master',$this->data);
	}
	public function detail($value='')
	{
		$data['group'] = $value;
		if ($value == 0) {
			$data['title'] = '';
			$data['title_con'] = '';
		}
		else if ($value == 1) {
			$data['title'] = 'Quản trị hệ thống';
			$data['title_con'] = 'Quản trị viên';
		}
		else if ($value == 2) {
			$data['title'] = 'Đội ngũ tuyển dụng';
			$data['title_con'] = 'Tuyển dụng viên';
		}
		else if ($value == 3) {
			$data['title'] = 'Ứng viên';
			$data['title_con'] = 'Ứng viên';
		}
		else if ($value == 4) {
			$data['title'] = 'Đội ngũ tin tức';
			$data['title_con'] = 'Tuyển dụng viên';
		}
		$this->data['script'] = $this->load->view('admin/script/script_user',null, TRUE); 
		$this->data['temp'] = $this->load->view('admin/user/user_detail',$data,true);

		$this->load->view('admin/home/master',$this->data);
	}
	
	// public function form_news($id='')
	// {	
	// 	if ($id == '') {
	// 		$mdata['news'] = '';
	// 	}else{
	// 		$match = array('newsid'=>$id);
	// 		$mdata['news'] = $this->News_model->select('news',$match,'*');
	// 	}
	// 	$data['script'] = $this->load->view('admin/script/script_newsrecruit', NULL, TRUE); 
	// 	$data['temp'] = $this->load->view('admin/news/form_news',$mdata,true);
	// 	$this->load->view('admin/home/master',$data);
	// }
	// public function modify()
	// {
	// 	$data = array();
	// 	$frm = $this->input->post();
	// 	$date = $frm['publishdate'];
	// 	$timestamp = strtotime($date);
	// 	if ($timestamp === FALSE) {
	// 	  $timestamp = strtotime(str_replace('/', '-', $date));
	// 	}
	// 	$frm['publishdate'] =  date('Y-m-d H:i:s',$timestamp);
	// 	$frm['createdby'] = $this->session->userdata('user_admin')['candidateid'];
	// 	$id = $frm['newsid'];
	// 	$data['createdby'] = $this->session->userdata('user_admin')['operatorname'];
	// 	unset($frm['newsid']);
	// 	if ($id == '') {
	// 		$data['id'] = $this->News_model->insert('news',$frm);
	// 		$data['check'] = '1';
	// 	}else{
	// 		$match = array('newsid' => $id);
	// 		$this->News_model->update('news',$match,$frm);
	// 		$data['check'] = '2';
	// 	}
	// 	echo json_encode($data);
	// }
}