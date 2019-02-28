<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data extends CI_Model{
	
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

    public function select($select,$table,$where)
    {
        $this->db->select($select)->where($where);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    
    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->insert_id();
    }
    public function update($table,$match,$data)
    {
        return $this->db->where($match)->update($table,$data);
    }

    public function delete($table,$match){
        return $this->db->where($match)->delete($table);
    }

    public function select_row_option($select,$table,$where,$orwhere=[],$join=[],$limit=[],$order_by=[],$like=[],$or_like=[]){
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join)){
            foreach ($join as $key => $value) {
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
            return $query->result_array();
        }
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

    public function uploadfile($name,$file){
        $config['upload_path'] = './public/image/';
        $config['allowed_types'] = '*';
        $config['file_name'] = $file['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($name)) {
           $uploadData = $this->upload->data();
           return $this->config->item('file_upload_url').$uploadData['file_name'];
        } else{
           return $this->upload->display_errors();
        }
    }

    public function uploadfile2($name,$file){
        $config['upload_path'] = './public/image/';
        $config['allowed_types'] = '*';
        $config['file_name'] = $file['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($name)) {
            $uploadData = $this->upload->data();
            return array(
                'link'=>$this->config->item('file_upload_url').$uploadData['file_name'],
                'filename'=>$uploadData['file_name']
            );
        } else{
           return array('error'=>$this->upload->display_errors());
        }
    }

    public function select_option($match, $table)
    {
        $this->db->where($match);
        return $this->db->get($table)->result_array();
    }

    public function insert_push($data, $table)
    {   
        $this->db->db_set_charset('latin1', 'Latin1_General_BIN');

        $insert = $this->db->insert($table, $data);
        if (!$insert) {
            return array('error'=>$this->db->error());
        }else{
            return array('action'=>'insert','data'=>$this->insert_id());
        }
        
    }
    public function update_push($match,$data,$table){
        $result = $this->db->where($match)->update($table,$data);
        if (!$result) {
            return array('error'=>$this->db->error());
        }else{;
            return array('action'=>'update','data'=>$result);
        }
    }

    public function merge_data($match, $data, $table)
    {
        $exist = $this->select_option($match, $table);
        if(empty($exist)){
            return $this->insert_push($data, $table);
        }else{
            return $this->update_push($match, $data, $table);
        }
    }
}