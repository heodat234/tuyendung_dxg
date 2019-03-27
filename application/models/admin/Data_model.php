<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_model extends CI_Model{

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
    public function countTableById($table,$id)
    {
        $this->db->select()->where('candidateid', $id);
        $this->db->where('hidden', 1);
        $query = $this->db->get($table)->num_rows();
        if ($query >0) {
            return true;
        }else{ return false;}
    }

    public function selectTable($table,$where)
    {
        $this->db->select()->where( $where);
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
    function select_row_option($select,$where,$wherein,$table,$join,$limit,$order_by,$like,$or_like){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join)){

            foreach ($join as $key => $value) {
                // var_dump($value['table']);
                $this->db->join($value['table'],$value['match'], 'LEFT');
            }
        }
        $this->db->where($where);
        if(!empty($wherein))$this->db->where_in($wherein);
        if(!empty($like))$this->db->like($like);
        if(!empty($or_like))$this->db->or_like($or_like);
        if(!empty($order_by))$this->db->order_by($order_by['colname'],$order_by['typesort']);
        if(!empty($limit))$this->db->limit($limit['numrow'],$limit['start']);
        $query = $this->db->get();
        if (!$query) {
            return $this->db->error();
        }else{
            return $query->result_array();
        }
    }
    function count_row($table,$where)
    {
        $result = $this->db->select('COUNT(*) as count')->from($table)->where($where)->get()->result_array();
        return $result[0]['count'];
    }

    function select_join($select,$where,$table,$join){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join)){
            foreach ($join as $key => $value) {
                $this->db->join($value['table'],$value['match'], 'LEFT');
            }
        }
        $this->db->where($where);
        $query = $this->db->get();
        if (!$query) {
            return $this->db->error();
        }else{
            return $query->result_array();
        }
    }

    function select_wherein($select,$wherein,$table,$join,$limit,$order_by,$like){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join)){

            foreach ($join as $key => $value) {
                // var_dump($value['table']);
                $this->db->join($value['table'],$value['match'], 'LEFT');
            }
        }
        if(!empty($wherein))$this->db->where_in($wherein);
        if(!empty($like))$this->db->like($like);
        if(!empty($order_by))$this->db->order_by($order_by['colname'],$order_by['typesort']);
        if(!empty($limit))$this->db->limit($limit['numrow'],$limit['start']);
        $query = $this->db->get();
        if (!$query) {
            return $this->db->error();
        }else{
            return $query->result_array();
        }
    }

    public function merge_data($match,$data,$table)
    {
        $category = $match['category'];
        $code = $match['code'];
        $query = "SELECT COUNT(*) AS count from codedictionary WHERE category = '$category' AND code ='$code' ";
        $result = $this->db->query($query)->result_array();
        if (isset($result[0]) && $result[0]['count'] >0) {
            $this->db->where($match)->update($table,$data);
            return 'true';
        }else{
            $this->db->insert($table,$data);
            return $this->insert_id();
        }
    }

    public function sync_data($match,$data,$table)
    {
        $result = $this->count_row($table,$match);
        if ($result >0) {
            $this->db->where($match)->update($table,$data);
            return 'true';
        }else{
            $this->db->insert($table,$data);
            return $this->insert_id();
        }
    }
}
?>