
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
		
		$this->load->model(array('M_data','admin/User_model','M_auth'));

		$this->sess  = $this->session->userdata('user_admin');
		$this->table = 'oprgroup';
		
		$ac_data['system'] 	= 'active';
		$ac_data['user'] 		= 'active';
		$this->data['header'] 	= $this->load->view('admin/home/header',null,true);
	    $this->data['menu'] 	= $this->load->view('admin/home/menu',$ac_data,true);
	    $this->data['footer'] 	= $this->load->view('admin/home/footer',null,true);

	    $this->seg = 0;
	}

	public function index()
	{
		$_data = [];

		$sql = "SELECT
					a.groupid,
					a.groupname,
					a.status, 
					a.operator, 
					a.createddate, 
					a.lastupdate,
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name,
					count(d.operatorid) as counter 
				FROM oprgroup a
				LEFT OUTER JOIN operator b ON a.createdby = b.operatorid
				LEFT OUTER JOIN operator c ON a.updatedby = c.operatorid
				LEFT OUTER JOIN operator d ON a.groupid = d.groupid
				GROUP BY 
					a.groupid, 
					a.groupname, 
					a.status, 
					a.operator, 
					a.createddate, 
					a.lastupdate, 
					b.operatorname, 
					c.operatorname
				ORDER BY a.lastupdate";

		$_data['records'] = $this->M_data->select_sql($sql);

		$this->data['script']   = $this->load->view('admin/user/default/script',null, TRUE); 
		if(!$this->M_auth->checkPermission($this->sess['groupid'],$this->seg)){
			$this->data['temp'] 	= $this->load->view('admin/error/404',null,true);
		}else{
			$this->data['temp'] = $this->load->view('admin/user/default/page',$_data,true);
		}
		// $this->data['temp'] 	= $this->load->view('admin/user/default/page',$_data,true);

		$this->load->view('admin/home/master',$this->data);
	}

	public function create(){

		$_data = [];
		$this->data['script']   = $this->load->view('admin/user/create/script', $_data, TRUE); 
		$this->data['temp'] 	= $this->load->view('admin/user/create/page', $_data, true);

		$this->load->view('admin/home/master',$this->data);
	}

	public function add(){
		$post = $this->input->post();

		$oper = isset($post['operator'])?$post['operator']:'';
		$operator = '';

		if($oper!=''&&!empty($oper))for($i=1;$i<=10;$i++) {
			$operator.=isset($oper[$i])?'Y':'N';
		}

		$push = array(
			'groupname'  	=> isset($post['groupname'])?$post['groupname']:'',
			'status'  		=> isset($post['status'])?$post['status']:'',
			'operator'		=> $operator,
			'createdby'		=> $this->sess['operatorid']
		);

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		$rslt = $this->M_data->insert('oprgroup',$push);

		if ($rslt) {
			$resp['success'] = true;
			$resp['message'] = "success";
			$resp['data']    = array('id'=>$rslt);
		}

		echo json_encode($resp);
	}

	public function detail($groupid='')
	{
		$_data = [];

		$sql = "SELECT 
					a.*, 
					b.operatorname as createdby_name, 
					c.operatorname as updatedby_name 
				FROM oprgroup a
				LEFT JOIN operator b ON a.createdby = b.operatorid
				LEFT JOIN operator c ON a.updatedby = c.operatorid
				WHERE a.groupid = '$groupid'
				ORDER BY a.lastupdate";

		$_data['records'] = $this->M_data->select_sql($sql);

		$sql = "SELECT * FROM operator WHERE groupid='$groupid' AND status='W'";
		$_data['users_w'] = $this->M_data->select_sql($sql);

		$sql = "SELECT * FROM operator WHERE groupid='$groupid' AND status='C'";
		$_data['users_c'] = $this->M_data->select_sql($sql);

		$sql = "SELECT * FROM oprgroup WHERE status='W'";
		$_data['groups'] = $this->M_data->select_sql($sql);
		
		$this->data['script'] = $this->load->view('admin/user/edit/script',null, TRUE); 
		$this->data['temp']   = $this->load->view('admin/user/edit/page',$_data,true);

		$this->load->view('admin/home/master',$this->data);
	}

	public function get_user($operatorid){
		$sql = "SELECT a.*, b.name as can_name, b.imagelink as can_image, c.url as avatar
				FROM operator a 
				LEFT OUTER JOIN candidate b ON a.candidateid = b.candidateid
				LEFT OUTER JOIN document c ON a.operatorid = c.referencekey
				WHERE a.operatorid='$operatorid'";
		$_data['data'] = $this->M_data->select_sql($sql);
		echo json_encode($_data);
	}

	public function change_password(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed"
		);

		if (!isset($post['operatorid'])&&!$post['operatorid']) {
			$resp['message'] = "ID không đúng.";
			echo json_encode($resp);
			exit;
		}

		$operatorid = $post['operatorid'];
		$password = md5($post['oldpass']);
		$newpass = md5($post['newpass']);

		$sql = "SELECT * FROM operator WHERE operatorid='$operatorid' AND password='$password'";

		$row = $this->M_data->select_sql($sql);
		
		if ($row&&!empty($row)) {
			// echo (1);
			$resp['data'] = $this->M_data->update('operator',array('operatorid'=>$operatorid),array('password'=>$newpass));
		}

		echo json_encode($resp);
	}

	public function edit(){
		$post = $this->input->post();

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		if (!isset($post['groupid'])&&!$post['groupid']) {
			$resp['message'] = "ID không đúng.";
			echo json_encode($resp);
			exit;
		}

		$oper = isset($post['operator'])?$post['operator']:'';
		$operator = '';

		if($oper!=''&&!empty($oper))for($i=1;$i<=10;$i++) {
			$operator.=isset($oper[$i])?'Y':'N';
		}

		$push = array(
			'groupname'  	=> isset($post['groupname'])?$post['groupname']:'',
			'status'  		=> isset($post['status'])?$post['status']:'',
			'operator'		=> $operator,
			'updatedby'		=> $this->sess['operatorid']
		);

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		$rslt = $this->M_data->update('oprgroup',array('groupid'=>$post['groupid']),$push);

		if ($rslt) {
			$resp['success'] = true;
			$resp['message'] = "success";
			$resp['data']    = array('result'=>$rslt);
		}

		echo json_encode($resp);
	}

	public function add_user(){
		$post = $this->input->post();
		$files = $_FILES;
		$f     = [];

		if (!empty($files)) {
            foreach ($files as $key => $value) {
                $f[$key] = $this->M_data->uploadfile2($key,$value);
            }
        }

		$push = array(
			'groupid'  	    => isset($post['groupid'])?$post['groupid']:'',
			'roleid'		=> isset($post['groupid'])?$post['groupid']:'',
			'status'  		=> isset($post['status'])?$post['status']:'',
			'operatorname'  => isset($post['operatorname'])?$post['operatorname']:'',
			'displayname'   => isset($post['displayname'])?$post['displayname']:'',
			'email'  		=> isset($post['email'])?$post['email']:'',
			'mcsmtp'  	    => isset($post['mcsmtp'])?$post['mcsmtp']:'',
			'mcuser'  		=> isset($post['mcuser'])?$post['mcuser']:'',
			'password'    	=> isset($post['password'])?md5($post['password']):'',
			'mcpass'	    => isset($post['mcpass'])?base64_encode($post['mcpass']):'',
			'mcdomain'  	=> isset($post['mcdomain'])?$post['mcdomain']:'',
			'mcport'  		=> isset($post['mcport'])?$post['mcport']:'',
			'telephone'  	=> isset($post['telephone'])?$post['telephone']:'',
			'idcard'  		=> isset($post['idcard'])?$post['idcard']:'',
			'notes'  		=> isset($post['notes'])?$post['notes']:'',
			'authorizeid'   => isset($post['authorizeid'])?$post['authorizeid']:'',
			'mcssl'  		=> isset($post['mcssl'])?1:0,
			//'avatar'		=> isset($f['avatar'])?$f['avatar']:'',
			'createdby'		=> $this->sess['operatorid']
		);

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		$rslt = $this->M_data->insert('operator',$push);

		if (isset($f['avatar'])&&!empty($f['avatar'])&&$rslt) {
			$_p['tablename'] 		= 'operator';
			$_p['referencekey']		= $rslt;
			$_p['filename']			= isset($f['avatar']['filename'])?$f['avatar']['filename']:'';
			$_p['url']				= isset($f['avatar']['link'])?$f['avatar']['link']:'';
			$_p['createdby']		= $this->sess['operatorid'];
			$this->M_data->merge_data(array('referencekey'=>$rslt),$_p,'document');
		}

		if ($rslt) {
			$resp['success'] = true;
			$resp['message'] = "success";
			$resp['data']    = array('id'=>$rslt);
		}

		echo json_encode($resp);
	}

	public function edit_user($check=""){
		$post = $this->input->post();
		$files = $_FILES;
		$f     = [];

		if (!empty($files)) {
            foreach ($files as $key => $value) {
                $f[$key] = $this->M_data->uploadfile2($key,$value);
            }
        }

        $resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

        if (!isset($post['operatorid'])&&!$post['operatorid']) {
			$resp['message'] = "ID không đúng.";
			echo json_encode($resp);
			exit;
		}

		$push = array(
			'groupid'  	    => isset($post['groupid'])?$post['groupid']:'',
			'roleid'		=> isset($post['groupid'])?$post['groupid']:'',
			'status'  		=> isset($post['status'])?$post['status']:'',
			'operatorname'  => isset($post['operatorname'])?$post['operatorname']:'',
			'displayname'   => isset($post['displayname'])?$post['displayname']:'',
			'email'  		=> isset($post['email'])?$post['email']:'',
			'mcsmtp'  	    => isset($post['mcsmtp'])?$post['mcsmtp']:'',
			'mcuser'  		=> isset($post['mcuser'])?$post['mcuser']:'',
			'mcdomain'  	=> isset($post['mcdomain'])?$post['mcdomain']:'',
			'mcport'  		=> isset($post['mcport'])?$post['mcport']:'',
			'telephone'  	=> isset($post['telephone'])?$post['telephone']:'',
			'idcard'  		=> isset($post['idcard'])?$post['idcard']:'',
			'notes'  		=> isset($post['notes'])?$post['notes']:'',
			'authorizeid'   => isset($post['authorizeid'])?$post['authorizeid']:'',
			'mcssl'  		=> isset($post['mcssl'])?1:0,
			//'avatar'		=> isset($f['avatar'])?$f['avatar']:'',
			'updatedby'		=> $this->sess['operatorid']
		);
		if (isset($post['password'])&&$post['password']!='******') {
			$push['password'] = md5($post['password']);
		}
		if (isset($post['mcpass'])&&$post['mcpass']!='******') {
			$push['mcpass'] = base64_encode($post['mcpass']);
		}
		// if($push['password']=='')unset($push['password']);

		// if($push['mcpass']=='')unset($push['mcpass']);

		$resp = array(
			"success" => false,
			"message" => "Failed",
			"data"    => []
		);

		$rslt = $this->M_data->update('operator',array('operatorid'=>$post['operatorid']),$push);

		if (isset($f['avatar'])&&!empty($f['avatar'])&&$rslt) {
			$_p['tablename'] 		= 'operator';
			$_p['referencekey']		= $post['operatorid'];
			$_p['filename']			= isset($f['avatar']['filename'])?$f['avatar']['filename']:'';
			$_p['url']				= isset($f['avatar']['link'])?$f['avatar']['link']:'';
			$_p['updatedby']		= $this->sess['operatorid'];
			$this->M_data->merge_data(array('referencekey'=>$post['operatorid']),$_p,'document');
		}

		if ($rslt) {
			$resp['success'] = true;
			$resp['message'] = "success";
			$resp['data']    = array('result'=>$rslt);
		}
		if ($check==1) {
			$this->session->unset_userdata('user_admin');
		}
		echo json_encode($resp);
	}
	
}