<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Candidate_model extends CI_Model{
	
	/* Gán tên bảng cần xử lý*/
	private $table = 'operator';
	// 
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->primaryKey = 'id';
    } 
    public function countTableById($table,$id)
    {
        $this->db->select()->where('candidateid', $id);
        $this->db->where('hidden', 1);
        $query = $this->db->get($table)->num_rows();
        if ($query >0) {
            return true;
        }else{ return false;}
    }
    
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
     public function selectall($table)
    {
        $this->db->select();
         $query = $this->db->get($table);
       return $query->result_array();
    }
    public function checkId($table,$where)
    {
        $this->db->select()->where($where);
        $query = $this->db->get($table)->num_rows();
        if ($query >0) {
            return true;
        }else{ return false;}
    }
    public function selectByWhere($table,$where)
    {
        $this->db->select()->where($where);
        $query = $this->db->get($table)->result_array();
            return $query;
    }
    public function selectFirstRows($table,$where)
    {
        $this->db->select()->where($where);
        $query = $this->db->get($table)->first_row('array');
            return $query;
    }
}