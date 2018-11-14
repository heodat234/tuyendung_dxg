<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class total_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function insert_id()
    {
        $query = 'SELECT SCOPE_IDENTITY() AS last_id';
 
        $query = $this->db->query($query);
        $query = $query->row();
        return $query->last_id;
    }
    public function InsertData($table,$data)
    {
        $a_User =   $this->db->insert($table,$data);
        if (!$a_User) {
        return $this->db->error();
        }else{
            $data['code'] = 0;
            $data['message'] = $this->insert_id();
            return $data;
        }
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
    public function DeleteReal($table,$match)
    {
        $a_User =   $this->db->where($match)
                            ->delete($table);
    }
    public function selectTableByIds($table,$match)
    {
        $this->db->select();
        $this->db->where($match);
        $query = $this->db->get($table);
       return $query->result_array();
    }
    public function Set_idfilter()
    {
        $this->db->select('filterid');
        $this->db->order_by("filterid", "desc");
        $this->db->limit(1);
        $this->db->from('filterprofile');
        return $this->db->get()->row_array(); 
    }
    public function selectall($table)
    {
        $this->db->select();
         $query = $this->db->get($table);
       return $query->result_array();
    }
    function select_rows( $select='', $table = '' , $where = '', $group = '')
    {
        $this->db->select($select);
        $this->db->where($where);
        if($group != '') $this->db->group_by($group);
        return $this->db->get($table)->result_array();
    }
    public function search_sql($sql='')
    {
        $query = $this->db->query($sql);
        
        if (!$query) {
            return $this->db->error();
        }else{
            return $query->result_array();
        }
    }

}