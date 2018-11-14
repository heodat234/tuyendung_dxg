<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model{
	
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
    function select($table = '' , $where = '', $select='')
    {
        $this->db->select($select);
        $this->db->where($where);
        return $this->db->get($table)->result_array();
    }
    function select_row_option($select,$where,$table,$join,$limit,$order_by,$like,$or_like){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join)){

            foreach ($join as $key => $value) {
                // var_dump($value['table']);
                $this->db->join($value['table'],$value['match'], 'LEFT');       
            }
        }
        $this->db->where($where);
        if(!empty($like))$this->db->like($like);
        if(!empty($or_like))$this->db->or_like($or_like);
        if(!empty($order_by))$this->db->order_by($order_by['colname'],$order_by['typesort']);
        if(!empty($limit))$this->db->limit($limit['numrow'],$limit['start']);
        $query = $this->db->get();
        if (!$query) {
            return $this->db->error();
        }else{
            
            return $query->result_array();;
        }
        // return $query->result_array();
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
    
   
}
?>