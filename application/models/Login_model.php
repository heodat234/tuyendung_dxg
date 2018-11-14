<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $table = 'operator';
	// 
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    public function insert_id()
    {
        $query = 'SELECT SCOPE_IDENTITY() AS last_id';
 
        $query = $this->db->query($query);
        $query = $query->row();
        return $query->last_id;
    }
    //kiểm tra thông tin đăng nhập thường
    function a_fCheckUser( $username, $pass ){
    	$sql = "SELECT * FROM operator where (( email = '$username' OR operatorname = '$username') and password ='$pass')";
            $query = $this->db->query($sql)->result_array();
    	if(count($query) >0){
    		return $query;
    	} else {
    		return false;
    	}
    }
    //kiểm tra mail đã tồn tại hay chưa
    public function checkMail( $mail ){
        $a_User =   $this->db->select()
                            ->where('email', $mail)
                            ->get($this->table)
                            ->row_array();
        if($a_User != null){
            return true;
        } else {
            return false;
        }
    }
    // kiem tra cmnd đa ton tai chua
     public function checkID( $id ){
        $a_User =   $this->db->select()
                            ->where('idcard', $id)
                            ->get($this->table)
                            ->row_array();
        if($a_User != null){
            return true;
        } else {
            return false;
        }
    }
    // kiem tra co dung password khong
    public function checkPassword($id, $pass ){
        $a_User =   $this->db->select()
                            ->where('id', $id)
                            ->where('password', md5($pass))
                            ->get($this->table)
                            ->row_array();
        if(count($a_User) >0){
            return 1;
        } else {
            return 0;
        }
    }

    public function selectUser()
    {
        $this->db->select() ;
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function selectUserById($id)
    {
        $this->db->select()->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    //thêm tài khoản mới
    public function insertUser($data)
    {
        $a_User =   $this->db->insert($this->table,$data);
        return $this->insert_id();
    }
    //sửa tài khoản 
    public function editUser($data)
    {
        $a_User =   $this->db->where('id', $data['id'])
                            ->update($this->table,$data);
    }
    public function editPassword($data)
    {
        $a_User =   $this->db->where('id', $data['id'])
                            ->update($this->table,$data);
    }
    //xóa tài khoản
    public function deleteUser($data)
    {
        $a_User =   $this->db->where('email', $data)
                            ->delete($this->table);
    }
    //kiểm tra thông tin đăng nhập bằng facebook hoặc google
    public function checkUser($data){
         $prevCheck = $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']))
                ->get($this->table)
                ->row_array();
                // var_dump($data);
        if($prevCheck > 0){
            // $update = $this->db->update($this->table,$data,array('id'=>$prevCheck['id']));
            $userID = $prevCheck['id'];
        }else{
            if ($this->checkMail($data['email'])) {
                $update = $this->db->where('email', $data['email'])
                               ->update($this->table,$data);
                $userID = 1;
            }else{
                $insert = $this->db->insert($this->table,$data);
                $userID = $this->db->insert_id();
            }
        }

        return $userID?$userID:FALSE;
    }

    // function activeUser($email)
    // {
    //     $data['active'] = 1;
    //     $a_User =   $this->db->where('email', $email)
    //                         ->update($this->table,$data);
    // }
        public function selectTableById($table,$id)
        {
            $this->db->select()->where('candidateid', $id);
            $this->db->where('hidden', 1);
            $query = $this->db->get($table);
           return $query->row_array();
        }
        public function selectTableByIds($table,$id)
        {
            $this->db->select();
            $this->db->where('candidateid', $id);
            $this->db->where('hidden', 1);
            $query = $this->db->get($table);
           return $query->result_array();
        }
        public function updateCandidate($id,$data)
        {
            $a_User =   $this->db->where('candidateid', $id)
                                ->update('candidate',$data);
        }
        public function InsertData($table,$data)
        {
            $a_User =   $this->db->insert($table,$data);
        }
        public function UpdateData($table,$match,$data)
        {
            $a_User =   $this->db->where($match)
                                ->update($table,$data);
        }
        public function DeleteData($table,$match)
        {
            $data = array('hidden' => 0 );
            $a_User =   $this->db->where($match)
                                ->update($table,$data);
        }
        public function Set_idcandite()
        {
            $this->db->select('candidateid');
            $this->db->order_by("candidateid", "desc");
            $this->db->limit(1);
            $this->db->from('candidate');
            return $this->db->get()->row_array(); 
        }
}