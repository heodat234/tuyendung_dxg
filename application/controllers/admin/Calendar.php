<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{

     public function __construct() {
        Parent::__construct();
        $this->load->model(array('admin/Campaign_model'));
		$this->load->library('session');
    }

     public function index()
     {
          $data = $this->load->view("calendar/index.php", null,true);
          $this->load->view('admin/master',$data);
     }

    public function get_calendar()
    {
    	$operatorid  = $this->session->userdata('user_admin')['operatorid'];  

    	$sql ="SELECT a.*,b.position from interview a LEFT OUTER JOIN reccampaign b ON a.campaignid = b.campaignid  LEFT OUTER JOIN recflow c ON a.campaignid = c.campaignid and a.roundid = c.roundid WHere (b.managecampaign like '%,$operatorid,%' or c.manageround like '%,$operatorid,%' or '$operatorid' in (select interviewer FRom interviewer where interviewid = a.interviewid))";
    	$result = $this->Campaign_model->select_sql($sql);
    	$data = array();
    	$i = 0;
    	foreach ($result as $key => $value) {
    		$data[] = array(
	             "id" 				=> $value['interviewid'],
	             "title" 			=> 'Phỏng vấn vị trí '.$value['position'],
	             "description" 		=>  date_format(date_create($value['timefrom']),"H:i").' - '. date_format(date_create($value['timeto']),"H:i"),
	             "start" 			=> $value['intdate']
	        );
    	}
    	echo json_encode($data);
     }

}

?>