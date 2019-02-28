<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_auth extends CI_Model{
	
	function __construct(){
        parent::__construct();
        $this->load->database();
    } 

    public function checkPermission($groupid,$segment){
    	$rights=$this->db->query("SELECT operator FROM oprgroup WHERE groupid='$groupid' AND status='W'")->first_row('array');
    	if($rights&&!empty($rights)&&isset($rights['operator'])){
    		if (substr(trim($rights['operator']), $segment,1)=='Y')return true;
    	}
    	return false;
    }

    public function checkCampaignManager($campaignid,$operatorid){
        $sql = "SELECT campaignid FROM reccampaign WHERE managecampaign LIKE '$operatorid' AND campaignid='$campaignid'";
        $rights=$this->db->query($sql)->first_row('array');
        if($rights&&!empty($rights))return true;
        return false;
    }
}