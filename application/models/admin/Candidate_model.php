<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Candidate_model extends CI_Model{
	
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
    public function selectTableGroupBy($select,$table,$id,$colname)
    {
        $this->db->select($select);
        $this->db->where('candidateid', $id);
        $this->db->where('hidden', 1);
        $this->db->order_by($colname,'desc');
        $query = $this->db->get($table);
       return $query->row_array();
    }
    public function list_candidate($candidate)
    {
        $data = array();
        for($i = 0 ; $i < count($candidate) ; $i++)
        {
            $data[$i]['candidateid'] = $candidate[$i]['candidateid'];
            $data[$i]['email'] = $candidate[$i]['email'];
            $data[$i]['gender'] = $candidate[$i]['gender'];
            $data[$i]['dateofbirth'] = $candidate[$i]['dateofbirth'];
            $data[$i]['weight'] = $candidate[$i]['weight'];
            $data[$i]['height'] = $candidate[$i]['height'];
            $data[$i]['name'] = $candidate[$i]['name'];
            $data[$i]['imagelink'] = $candidate[$i]['imagelink'];
            $data[$i]['desirebenefit'] = $candidate[$i]['desirebenefit'];
            $data[$i]['profilesrc'] = $candidate[$i]['profilesrc'];
            $data[$i]['istalent'] = $candidate[$i]['istalent'];
            $data[$i]['blocked'] = $candidate[$i]['blocked'];
            $data[$i]['unsubcribe'] = $candidate[$i]['unsubcribe'];
            $data[$i]['certificate'] = "";
            $data[$i]['yearexperirence'] = null;
            $data[$i]['position'] = '';
            $data[$i]['dateto'] = null;
            $data[$i]['language'] = "";
            $data[$i]['countlanguage'] = 0;
            $data[$i]['software'] = "";
            $data[$i]['countsoftware'] = 0;
            $data[$i]['rate'] = 0;
            $diem = $this->first_row('cancomment',array('candidateid' => $candidate[$i]['candidateid'], 'rate !=' => 0),'AVG(rate) AS scores','');
            if($diem != null)
            {
                $data[$i]['rate'] = $diem['scores'];
            }
            $hocvan = $this->first_row('canknowledge',array('candidateid' => $candidate[$i]['candidateid'], 'highestcer' => 'Y'),'certificate','candidateid');
            if($hocvan != null)
            {
                $data[$i]['certificate'] = $hocvan['certificate'];
            }
            $kinhnghiem = $this->first_row('canexperience',array('candidateid' => $candidate[$i]['candidateid']),'DATEDIFF (year, min(canexperience.datefrom), GETDATE()) as namkm','');
            if($kinhnghiem != null)
            {
                $data[$i]['yearexperirence'] = $kinhnghiem['namkm'];
            }
            $vitri = $this->first_row('canexperience',array('candidateid' => $candidate[$i]['candidateid']),'canexperience.position,canexperience.company','dateto');
            if($vitri != null)
            {
                $data[$i]['position'] = $vitri['position'].' - '.$vitri['company'];
            }
            $subsql1 = 'select count(*) from canlanguage where candidateid = '.$candidate[$i]['candidateid'].' group by candidateid';
            $ngonngu = $this->first_row('canlanguage',array('candidateid' => $candidate[$i]['candidateid']),'language, ('.$subsql1.') as slnn','lastupdate');
            if($ngonngu != null)
            {
                $data[$i]['language'] = $ngonngu['language'];
                $data[$i]['countlanguage'] = $ngonngu['slnn'];
            }
            $subsql2 = 'select count(*) from cansoftware where candidateid = '.$candidate[$i]['candidateid'].' group by candidateid';
            $tinhoc = $this->first_row('cansoftware',array('candidateid' => $candidate[$i]['candidateid']),'software, ('.$subsql2.') as slth','lastupdate');
            if($tinhoc != null)
            {
                $data[$i]['software'] = $tinhoc['software'];
                $data[$i]['countsoftware'] = $tinhoc['slth'];
            }
            $recruite = $this->first_row('profilehistory',array('candidateid' => $candidate[$i]['candidateid'],'actiontype' => 'Recruite'),'count(recordid) as count','');
            if($recruite != null)
            {
                $data[$i]['recruite'] = $recruite['count'];
            }
        }
        return $data; 
    }

    function first_row($table = '' , $where = '', $select='', $order = '')
    {
        $this->db->select($select);
        $this->db->where($where);
        if($order != '') $this->db->order_by($order,'desc');
        return $this->db->get($table)->first_row('array');
    }
    public function filter_table($from='', $where='')
    {
        $sql = "SELECT TOP 700 candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe FROM candidate ".$from." WHERE candidate.status='A' ".$where." GROUP BY candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.lastupdate ORDER BY candidate.lastupdate desc";
        $query = $this->db->query($sql);
        
            if (!$query) {
                return $this->db->error();
            }else{
                return $query->result_array();
            }
    }
    public function list_filter($from='', $where='')
    {
        return $this->list_candidate($this->filter_table($from, $where)); 
    }
    public function selectAllCan()
    {   
        return $this->list_candidate($this->filter_table()); 
    }
    public function InsertData($table,$data)
    {
        $a_User =   $this->db->insert($table,$data);
        return $this->insert_id();
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
        return $this->db->from($table)->where($where)->get()->num_rows();
    }
    public function checkMail( $mail ){
        $a_User =   $this->db->select()
                            ->where('email', $mail)
                            ->get('candidate')
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
                            ->get('candidate')
                            ->row_array();
        if($a_User != null){
            return true;
        } else {
            return false;
        }
    }
    public function checkMail_internal( $mail, $id ){
        $a_User =   $this->db->select()
                            ->where('email', $mail)
                            ->get('candidate')
                            ->row_array();
        if($a_User != null) 
        {
            if( $a_User['candidateid'] == $id)
            {
                return false;    
            } 
            else 
            {
             return true;
            }
        } else {
            return false;
        }
    }
    // kiem tra cmnd đa ton tai chua
     public function checkID_internal( $cmnd, $id ){
        $a_User =   $this->db->select()
                            ->where('idcard', $cmnd)
                            ->get('candidate')
                            ->row_array();
        if($a_User != null){
             if( $a_User['candidateid'] == $id)
            {
                return false;
            }
            else
            {
                return true;
            }
        } else {
            return false;
        }
    }
}
?>