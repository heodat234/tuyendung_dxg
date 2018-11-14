<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Campaign_model extends CI_Model{
	
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
    public function select($select,$table,$where,$group)
    {
        $this->db->select($select)->where($where);
        if($group != '') $this->db->group_by($group);
        $query = $this->db->get($table);
       return $query->result_array();
    }
    
    public function insert($table,$data)
    {
        $a_User =   $this->db->insert($table,$data);
        return $this->insert_id();
    }
    public function update($table,$match,$data)
    {
        $a_User =   $this->db->where($match)
                            ->update($table,$data);
    }
    public function delete($table,$match)
    {
        $data = array('hidden' => 0 );
        $a_User =   $this->db->where($match)
                            ->update($table,$data);
    }
    function select_row_option($select,$where,$orwhere,$table,$join,$limit,$order_by,$like,$or_like){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join)){

            foreach ($join as $key => $value) {
                // var_dump($value['table']);
                $this->db->join($value['table'],$value['match'], 'LEFT');       
            }
        }
        $this->db->where($where);
        if(!empty($orwhere))$this->db->or_where($orwhere);
        if(!empty($like))$this->db->like($like);
        if(!empty($or_like))$this->db->or_like($or_like);
        if(!empty($order_by))$this->db->order_by($order_by['colname'],$order_by['typesort']);
        if(!empty($limit))$this->db->limit($limit['numrow'],$limit['start']);
        $query = $this->db->get();
        if (!$query) {
            return $this->db->error();
        }else{
            return $this->list_candidate($query->result_array());
        }
    }
    function count_row($table,$where)
    {
        $result = $this->db->select('COUNT(*) as count')->from($table)->where($where)->get()->result_array();
        return $result[0]['count'];
    }
    public function selectall($table)
    {
        $this->db->select();
         $query = $this->db->get($table);
       return $query->result_array();
    }

    public function select_sql($sql='')
    {
        $query = $this->db->query($sql);
        
            if (!$query) {
                return $this->db->error();
            }else{
                return $query->result_array();
            }
    }
   
}
?>