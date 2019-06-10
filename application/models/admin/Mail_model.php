<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail_model extends CI_Model{

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

    public function sendMail($data='')
    {
        $attach = '';
        // var_dump($data);exit;
        $config = array(
            'protocol'  =>  'smtp',
            'smtp_host' =>  $data['mcsmtp'],
            'smtp_port' =>  $data['mcport'],
            'smtp_user' =>  trim($data['mcuser']),
            'smtp_pass' =>  $data['mcpass'],
            'mailtype'  =>  'html',
            'charset'   =>  'utf-8',
            'smtp_crypto' => 'tls',
            // 'smtp_auto_tls' => true
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        //cau hinh email va ten nguoi gui
        $this->email->from($data['mcuser'], 'Đất xanh Group');
        //cau hinh nguoi nhan
        if ($data['toemail'] != '') {
            $this->email->to($data['toemail']);
        }
        $this->email->reply_to($data['mcuser'], 'Đất xanh Group');
        $this->email->cc(isset($data['cc'])? $data['cc'] : '');
        $this->email->bcc(isset($data['bcc'])? $data['bcc'] : '');

        $this->email->subject($data['emailsubject']);
        $body = $data['emailbody'];
        $data_body['content'] = $data['emailbody'];
        // var_dump($body);exit;
        $this->email->message($this->load->view('admin/email/view_file', $data_body, TRUE));

        //dinh kem file
        $attach = isset($data['attachment'])? $data['attachment']: '';
            if(is_array($attach) && !empty($attach)){
                foreach ($attach as $key) {
                    $this->email->attach($key);
                }
            }
        // $this->email->attach('https://tuyendung.datxanh.com.vn/public/document/HM-API.xlsx');
        // $this->email->attach('http://recruit.tavicosoft.com/public/document/DXG - Breakdown checklist.xlsx');
        //thuc hien gui
        if ( ! $this->email->send())
        {
            // Generate error
            return $this->email->print_debugger();
            exit;
        }else{
            $this->email->clear(TRUE);
            $mbox = imap_open("{".$data['mcsmtp'].":143}Sent Items", "".trim($data['mcuser'])."", "".$data['mcpass']."");

            $subject = mb_encode_mimeheader($data['emailsubject']);
            $new_body = $this->load->view('admin/email/view_file', $data_body, TRUE);


            $dmy = date("r", strtotime("now"));
            $boundary = "------=".md5(uniqid(rand()));

            // // $msgid = $this->generateMessageID();
            // $msg = "From: ".trim($data['mcuser'])."\r\n";
            // $msg .= "To: ".$data['toemail']."\r\n";
            // // $msg .= "Cc: ".isset($data['cc'])? $data['cc'] : ''."\r\n";
            // // $msg .= "Bcc: ".isset($data['bcc'])? $data['bcc'] : ''."\r\n";
            // $msg .= "Date: ".$dmy."\r\n";
            // $msg .= "Cc: ".isset($data['cc'])? $data['cc'] : ''."\r\n";
            // $msg .= "Subject: $subject\r\n";
            // $msg .= "MIME-Version: 1.0\r\n";
            // $msg .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
            // $msg .= "\r\n\r\n";
            // $msg .= "--$boundary\r\n";
            // $msg .= "Content-Type: text/html;\r\n\tcharset=\"utf-8\"\r\n";
            // $msg .= "Content-Transfer-Encoding: quoted-printable \r\n";
            // $msg .= "\r\n\r\n";
            // $msg .= "$new_body\r\n";
            $msg_file = "";
            if(!empty($attach)) {
                foreach ($attach as $filelink) {
                    $arr = explode('/', $filelink);
                    $filename = $arr[count($arr)-1];
                    $attachment = chunk_split(base64_encode(file_get_contents($filelink)));
                    $msg_file .= "Content-Transfer-Encoding: base64\r\n";
                    $msg_file .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
                    $msg_file .= "\r\n" . $attachment . "\r\n\r\n";
                }
            }
            // $msg .= "\r\n\r\n\r\n";
            // $msg .= "--$boundary--\r\n\r\n";

            // $dmy=date("d-m-Y H:i:s");

            $cc     = isset($data['cc'])? $data['cc'] : "";
            $bcc    = isset($data['bcc'])? $data['bcc'] : "";

            $msg = ("From: ".trim($data['mcuser'])."\r\n"
                . "To: ".$data['toemail']."\r\n"
                . "Cc: $cc\r\n"
                . "Bcc: $bcc\r\n"
                . "Date: $dmy\r\n"
                . "Subject: $subject\r\n"
                . "MIME-Version: 1.0\r\n"
                . "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n"
                . "\r\n\r\n"
                . "--$boundary\r\n"
                . "Content-Type: text/html;\r\n\tcharset=\"utf-8\"\r\n"
                . "Content-Transfer-Encoding: quoted-printable \r\n"
                . "\r\n\r\n"
                . "$new_body\r\n"
                . "\r\n\r\n"
                . "--$boundary\r\n"
                . "$msg_file\r\n"
                . "\r\n\r\n\r\n"
                . "--$boundary--\r\n\r\n");
            // var_dump($msg);exit;
            imap_append($mbox, "{".$data['mcsmtp'].":143}Sent Items",$msg);
                // close mail connection.
                imap_close($mbox);
            return 1;
        }
        //The first line connects to your inbox over port 143

        return 1;
    }

    public function select($table,$where)
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
}
?>