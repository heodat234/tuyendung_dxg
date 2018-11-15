<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail_model extends CI_Model{
	
	function __construct(){
        parent::__construct();
        $this->load->database();

        $config = array(
            'protocol'  =>  'smtp',
            'smtp_host' =>  'ssl://smtp.googlemail.com',
            'smtp_port' =>  465,
            'smtp_user' =>  'thanhhung23495@gmail.com',
            'smtp_pass' =>  'Heodat1323',
            'mailtype'  =>  'html', 
            'charset'   =>  'utf-8',
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
    } 
    public function insert_id()
    {
        $query = 'SELECT SCOPE_IDENTITY() AS last_id';
 
        $query = $this->db->query($query);
        $query = $query->row();
        return $query->last_id;
    }

    public function sendMail($data='')
    {
        //cau hinh email va ten nguoi gui
        $this->email->from('thanhhung23495@gmail.com', 'Đất xanh Group');
        //cau hinh nguoi nhan
        $this->email->to($data['toemail']);
        $this->email->cc(isset($data['cc'])? $data['cc'] : '');
        $this->email->bcc(isset($data['bcc'])? $data['bcc'] : '');
         
        $this->email->subject($data['emailsubject']);
        $this->email->message($data['emailbody']);
         
        //dinh kem file
        $this->email->attach($data['attachment']);
        //thuc hien gui
        if ( ! $this->email->send())
        {
            // Generate error
            return $this->email->print_debugger();
        }else{
            return 1;
        }
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
}
?>