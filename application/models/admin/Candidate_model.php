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
            $data[$i]['tags'] = "";
            $data[$i]['tagsrandom'] = "";
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

            $row = $this->join_tag($candidate[$i]['candidateid']);
            $a = array();
            foreach ($row as $key) {
                array_push($a, $key['title']);
            }
            $data[$i]['tags'] = implode(", ",$a);

            $row2 = $this->join_tag_random($candidate[$i]['candidateid']);
            $a2 = array();
            foreach ($row2 as $key) {
                array_push($a2, "#".$key['title']);
            }
            if(count($a2) == 0)
            {
                $noibo['nb'] = $this->first_row('candidate',array('mergewith' => $candidate[$i]['candidateid']),'','');
                $row2 = $this->join_tag_random($noibo['nb']['candidateid']);
                 $a2 = array();
                foreach ($row2 as $key) {
                    array_push($a2, "#".$key['title']);
                }
                 $data[$i]['tagsrandom'] = implode(", ",$a2);
            }
            else
            {
                $data[$i]['tagsrandom'] = implode(", ",$a2);
            }

            $roww = $this->db->query("select COUNT(DISTINCT campaignid) as slchiendich from profilehistory where candidateid = '".$candidate[$i]['candidateid']."'")->result_array();
            $data[$i]['count_campaign'] = $roww[0]['slchiendich'];

            $id = $candidate[$i]['candidateid'];
            $sql0 = "SELECT DISTINCT a.lastupdate as a, b.lastupdate as b, c.lastupdate as c, d.lastupdate as d, f.lastupdate as f, g.lastupdate as g, h.lastupdate as h, j.lastupdate as j,e.lastupdate as e
                FROM candidate a
                Left JOIN (SELECT top 1 * FROM canaddress WHERE candidateid = $id ORDER BY lastupdate DESC) b ON a.candidateid = b.candidateid
                Left JOIN (SELECT top 1 * FROM canexperience WHERE candidateid = $id ORDER BY lastupdate DESC) c ON a.candidateid = c.candidateid
                Left JOIN (SELECT top 1 * FROM canknowledge WHERE candidateid = $id ORDER BY lastupdate DESC) d ON a.candidateid = d.candidateid
                Left JOIN cansocial e ON a.candidateid = e.candidateid
                Left JOIN (SELECT top 1 * FROM canlanguage WHERE candidateid = $id ORDER BY lastupdate DESC) f ON a.candidateid = f.candidateid
                Left JOIN (SELECT top 1 * FROM cansoftware WHERE candidateid = $id ORDER BY lastupdate DESC) g ON a.candidateid = g.candidateid
                Left JOIN (SELECT top 1 * FROM canreference WHERE candidateid = $id ORDER BY lastupdate DESC) h ON a.candidateid = h.candidateid
                Left JOIN (SELECT top 1 * FROM document WHERE referencekey = $id ORDER BY lastupdate DESC) j ON a.candidateid = j.referencekey AND j.tablename = 'candidate'
                WHERE a.candidateid = $id ORDER BY j.lastupdate DESC";
            $query = $this->db->query($sql0)->result_array();
            rsort($query[0]);
            $data[$i]['update'] = $query[0][0];
            // var_dump($data);exit;
        }
        function cmp($a, $b) {
            if ($a['update'] == $b['update']) {
                return 0;
            }
            return ($a['update'] < $b['update']) ? 1 : -1;
        }
        uasort($data, 'cmp');
        $array = array_values($data); // sorted by original key order
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";exit;
        return $array;
    }

    public function list_candidate_trung($candidate)
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
            $data[$i]['tags'] = "";
            $data[$i]['tagsrandom'] = "";
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

            $row = $this->join_tag($candidate[$i]['candidateid']);
            $a = array();
            foreach ($row as $key) {
                array_push($a, $key['title']);
            }
            $data[$i]['tags'] = implode(", ",$a);

            $row2 = $this->join_tag_random($candidate[$i]['candidateid']);
            $a2 = array();
            foreach ($row2 as $key) {
                array_push($a2, "#".$key['title']);
            }
            if(count($a2) == 0)
            {
                $noibo['nb'] = $this->first_row('candidate',array('mergewith' => $candidate[$i]['candidateid']),'','');
                $row2 = $this->join_tag_random($noibo['nb']['candidateid']);
                 $a2 = array();
                foreach ($row2 as $key) {
                    array_push($a2, "#".$key['title']);
                }
                 $data[$i]['tagsrandom'] = implode(", ",$a2);
            }
            else
            {
                $data[$i]['tagsrandom'] = implode(", ",$a2);
            }

            $roww = $this->db->query("select COUNT(DISTINCT campaignid) as slchiendich from profilehistory where candidateid = '".$candidate[$i]['candidateid']."'")->result_array();
            $data[$i]['count_campaign'] = $roww[0]['slchiendich'];

            $id = $candidate[$i]['candidateid'];
            $sql0 = "SELECT DISTINCT a.lastupdate as a, b.lastupdate as b, c.lastupdate as c, d.lastupdate as d, f.lastupdate as f, g.lastupdate as g, h.lastupdate as h, j.lastupdate as j,e.lastupdate as e
                FROM candidate a
                Left JOIN (SELECT top 1 * FROM canaddress WHERE candidateid = $id ORDER BY lastupdate DESC) b ON a.candidateid = b.candidateid
                Left JOIN (SELECT top 1 * FROM canexperience WHERE candidateid = $id ORDER BY lastupdate DESC) c ON a.candidateid = c.candidateid
                Left JOIN (SELECT top 1 * FROM canknowledge WHERE candidateid = $id ORDER BY lastupdate DESC) d ON a.candidateid = d.candidateid
                Left JOIN cansocial e ON a.candidateid = e.candidateid
                Left JOIN (SELECT top 1 * FROM canlanguage WHERE candidateid = $id ORDER BY lastupdate DESC) f ON a.candidateid = f.candidateid
                Left JOIN (SELECT top 1 * FROM cansoftware WHERE candidateid = $id ORDER BY lastupdate DESC) g ON a.candidateid = g.candidateid
                Left JOIN (SELECT top 1 * FROM canreference WHERE candidateid = $id ORDER BY lastupdate DESC) h ON a.candidateid = h.candidateid
                Left JOIN (SELECT top 1 * FROM document WHERE referencekey = $id ORDER BY lastupdate DESC) j ON a.candidateid = j.referencekey AND j.tablename = 'candidate'
                WHERE a.candidateid = $id ORDER BY j.lastupdate DESC";
            $query = $this->db->query($sql0)->result_array();
            rsort($query[0]);
            $data[$i]['update'] = $query[0][0];
            // var_dump($data);exit;
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
    public function filter_table($from='', $where='', $start = '0', $limit ='100', $order = 'candidate.lastupdate desc')
    {
        $sql = "SELECT candidate.candidateid, candidate.email, candidate.idcard, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith FROM candidate ".$from." WHERE candidate.mergewith = '0' AND candidate.status='A' ".$where." GROUP BY candidate.candidateid, candidate.email, candidate.idcard, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe,candidate.mergewith, candidate.lastupdate ORDER BY ".$order." OFFSET ".$start." ROWS FETCH NEXT ".$limit." ROWS ONLY";
        // var_dump($sql);exit;
        $query = $this->db->query($sql);

            if (!$query) {
                return $this->db->error();
            }else{
                return $query->result_array();
            }
    }
    public function filter_table_campaign($from='', $where='', $campaignid= '', $start = '', $limit ='' , $order = 'candidate.lastupdate desc')
    {
        $sql = "SELECT candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith FROM candidate ".$from." WHERE candidate.candidateid NOT IN (SELECT tt.candidateid FROM profilehistory tt INNER JOIN (SELECT ph.candidateid, MAX(ph.createddate) AS MaxDateTime FROM profilehistory ph WHERE ph.campaignid = ".$campaignid." AND ph.actiontype != 'Recruite'  GROUP BY ph.candidateid) groupedtt ON tt.candidateid = groupedtt.candidateid AND tt.createddate = groupedtt.MaxDateTime) AND candidate.mergewith = '0' AND candidate.status='A' ".$where." GROUP BY candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith, candidate.lastupdate ORDER BY ".$order." OFFSET ".$start." ROWS FETCH NEXT ".$limit." ROWS ONLY";
        $query = $this->db->query($sql);

            if (!$query) {
                return $this->db->error();
            }else{
                return $query->result_array();
            }
    }
    public function filter_campaign_apply($campaignid= '')
    {
        $sql = "SELECT TOP 500 candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith FROM candidate  WHERE candidate.candidateid NOT IN (SELECT tt.candidateid FROM profilehistory tt INNER JOIN (SELECT ph.candidateid, MAX(ph.createddate) AS MaxDateTime FROM profilehistory ph WHERE ph.campaignid = ".$campaignid." AND ph.actiontype != 'Recruite' AND ph.actiontype != 'Apply' GROUP BY ph.candidateid) groupedtt ON tt.candidateid = groupedtt.candidateid AND tt.createddate = groupedtt.MaxDateTime) AND candidate.candidateid IN (SELECT candidateid from profilehistory where campaignid = ".$campaignid." and actiontype = 'Apply') AND candidate.mergewith = '0' AND candidate.status='A'  GROUP BY candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith, candidate.lastupdate ORDER BY candidate.lastupdate desc";
        $query = $this->db->query($sql);

            if (!$query) {
                return $this->db->error();
            }else{
                return $query->result_array();
            }
    }
    public function filter_campaign_recruit($check,$start,$limit)
    {
        if ($check == 0) {
            $sql = "SELECT candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith FROM candidate  WHERE candidate.candidateid IN (SELECT candidateid from profilehistory where actiontype = 'Recruite') AND candidate.mergewith = '0' AND candidate.status='A'  GROUP BY candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith, candidate.lastupdate ORDER BY candidate.lastupdate desc OFFSET ".$start." ROWS FETCH NEXT ".$limit." ROWS ONLY";
        }else{
            $sql = "SELECT candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith FROM candidate  WHERE candidate.candidateid NOT IN (SELECT candidateid from profilehistory where actiontype = 'Recruite') AND candidate.mergewith = '0' AND candidate.status='A'  GROUP BY candidate.candidateid, candidate.email, candidate.name, candidate.gender, candidate.dateofbirth, candidate.height, candidate.weight, candidate.currentbenefit, candidate.desirebenefit, candidate.istalent, candidate.imagelink, candidate.profilesrc, candidate.blocked, candidate.unsubcribe, candidate.mergewith, candidate.lastupdate ORDER BY candidate.lastupdate desc OFFSET ".$start." ROWS FETCH NEXT ".$limit." ROWS ONLY";
        }

        $query = $this->db->query($sql);

        if (!$query) {
            return $this->db->error();
        }else{
            return $query->result_array();
        }
    }

    public function list_filter($from='', $where='', $start = 0, $limit = 100, $order )
    {
        return $this->list_candidate($this->filter_table($from, $where, $start, $limit , $order));
    }
    public function list_filter_campaign($from='', $where='',$campaignid='', $start = '', $limit ='', $order)
    {
        return $this->list_candidate($this->filter_table_campaign($from, $where, $campaignid, $start, $limit, $order));
    }
    public function list_filter_apply($campaignid='')
    {
        return $this->list_candidate($this->filter_campaign_apply($campaignid));
    }
    public function list_filter_recruit($check, $start = '', $limit ='')
    {
        return $this->list_candidate($this->filter_campaign_recruit($check,$start,$limit));
    }
    public function list_trung($from='', $where='', $start = 0, $limit = 100, $order )
    {
        return $this->list_candidate_trung($this->filter_table($from, $where, $start, $limit , $order));
    }
    // public function selectAllCan()
    // {
    //     return $this->list_candidate($this->filter_table());
    // }
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
        $result = $this->db->select('COUNT(*) as count')->from($table)->where($where)->get()->result_array();
        return $result[0]['count'];
    }

    public function count_filter($from='', $where='')
    {
        $sql = "SELECT count(DISTINCT candidate.candidateid) as count from candidate $from WHERE candidate.mergewith = 0 AND candidate.status = 'A' $where ";
        $query = $this->db->query($sql);

            if (!$query) {
                return $this->db->error();
            }else{
                $count = $query->result_array();
                return $count[0]['count'];
            }
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
    public function count_round_hs($from='', $where='', $campaignid= '')
    {
        $sql = "SELECT count(*) as count FROM candidate ".$from." WHERE candidate.candidateid NOT IN (SELECT tt.candidateid FROM profilehistory tt INNER JOIN (SELECT ph.candidateid, MAX(ph.createddate) AS MaxDateTime FROM profilehistory ph WHERE ph.campaignid = ".$campaignid." AND ph.actiontype != 'Recruite'  GROUP BY ph.candidateid) groupedtt ON tt.candidateid = groupedtt.candidateid AND tt.createddate = groupedtt.MaxDateTime) AND candidate.status='A' ".$where." ";
        $query = $this->db->query($sql);

            if (!$query) {
                return $this->db->error();
            }else{
                return $query->result_array();
            }
    }
    public function join_tag($candidateid)
    {
        $this->db->select('tagprofile.title');
        $this->db->from('tagprofile');
        $this->db->join('tagtransaction','tagtransaction.tagid = tagprofile.tagid','LEFT');
        $this->db->where('tagtransaction.tablename','candidate');
        $this->db->where('tagtransaction.categoryid','position');
        $this->db->where('tagtransaction.recordid',$candidateid);
        $this->db->group_by('tagprofile.title');
        return $this->db->get()->result_array();
    }
    public function join_tag_random($candidateid)
    {
        $this->db->select('tagprofile.title');
        $this->db->from('tagprofile');
        $this->db->join('tagtransaction','tagtransaction.tagid = tagprofile.tagid','LEFT');
        $this->db->where('tagtransaction.tablename','candidate');
        $this->db->where('tagtransaction.categoryid','random');
        $this->db->where('tagtransaction.recordid',$candidateid);
        $this->db->group_by('tagprofile.title');
        return $this->db->get()->result_array();
    }
    public function selectBySelect($select,$table,$where)
    {
        $this->db->select($select)->where($where);
        $query = $this->db->get($table)->result_array();
            return $query;
    }
    public function checktagsprofile($match)
    {
        $this->db->select('tagid');
        $this->db->from('tagprofile');
        $this->db->where($match);
        return $this->db->get()->row_array();
    }
    public function delete_real($table, $where)
    {
        $this->db->where($where)->delete($table);
    }
    public function query_sql($sql)
    {
        return $this->db->query($sql)->result_array();
    }
    public function select_tags_byId($id)
    {
        $this->db->select();
        $this->db->from('tagtransaction');
        $this->db->join('tagprofile','tagprofile.tagid = tagtransaction.tagid', 'LEFT');
        $this->db->where('tagtransaction.tablename','candidate');
        $this->db->where('tagtransaction.categoryid','position');
        $this->db->where('tagtransaction.recordid',$id);
        return $this->db->get()->result_array();
    }
    public function select_sugg_tag($select,$where)
    {
        $this->db->select($select);
        $this->db->from('tagtransaction');
        $this->db->join('tagprofile','tagprofile.tagid = tagtransaction.tagid', 'LEFT');
        $this->db->where($where);
        $this->db->group_by($select);
        return $this->db->get()->result_array();
    }

    public function yearexperirence($candidateid)
    {
        $kinhnghiem = $this->first_row('canexperience',array('candidateid' => $candidateid),'DATEDIFF (year, min(canexperience.datefrom), GETDATE()) as namkm','');
        if($kinhnghiem != null)
        {
            return $kinhnghiem['namkm'];
        }else{
            return false;
        }
    }

}
?>