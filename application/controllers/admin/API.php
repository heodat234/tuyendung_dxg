<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','my_helper','file'));
		$this->load->model(array('admin/Campaign_model','admin/Candidate_model','admin/Data_model','admin/Mail_model'));
		$this->load->library(array('session','upload','excel'));
	}

    
    public function index()
    {
        $frm = $this->input->post();
        if (isset($frm['category']) && $frm['category'] != '') {
            $data['category'] = $frm['category'];
        }else{
            echo "Bạn chưa nhập category";
            exit;
        }
        if (isset($frm['code']) && $frm['code'] != '') {
            $data['code'] = $frm['code'];
        }else{
            echo "Bạn chưa nhập code";
            exit;
        }
        if (isset($frm['description']) && $frm['description'] != '') {
            $data['description'] = $frm['description'];
        }else{
            echo "Bạn chưa nhập description";
            exit;
        }

        $this->Data_model->insert('codedictionary',$data);
        echo json_encode('success');
    }

    // public function offer(){

    //     set_time_limit(60*60*24);

    //     $colm = ["category",
    //             "code",
    //             "description",
    //             ];

    //     $post = json_decode(file_get_contents('php://input'), true);

    //     $resp = array(
    //         'action'=>'undefined',
    //         'method'=>'undefined',
    //         'result'=>array('success'=>false,'data'=>null,'message'=>'Failed')
    //     );

    //     $a_flg = false;
    //     $m_flg = false;
    //     $d_flg = false;

    //     if (!empty($post)) {
    //         if (isset($post['action'])) {
    //             $arg = $post['action'];
    //             if ($arg=='insOf') {
    //                 $a_flg = true;
    //                 $resp['action'] = $post['action'];
    //             }else{
    //                 $resp['action'] = "Invalid argument.";
    //             }
    //         }else{
    //             $resp['action'] = "Missing this argument.";
    //         }

    //         if (isset($post['method'])) {
    //             $arg = $post['method'];
    //             if ($arg=='insert') {
    //                 $m_flg = true;
    //                 $resp['method'] = $post['method'];
    //             }else{
    //                 $resp['method'] = "Invalid argument.";
    //             }
    //         }else{
    //             $resp['method'] = "Missing this argument.";
    //         }

    //         if (isset($post['data'])) {
    //             $arg = $post['data'];
    //             if (!empty($arg)) {
    //                 $d_flg = true;
    //             }else{
    //                 $resp['result'] = array('error'=>'Empty array data pushing.');
    //             }
    //         }else{
    //             $resp['result'] = array('error'=>'Missing argument data pushing.');
    //         }

    //         if ($a_flg==true&&$m_flg==true&&$d_flg==true) {
    //             for ($i=0; $i < count($post['data']); $i++) { 
    //                 $push = [];
    //                 // for ($j=0; $j < count($colm); $j++) { 
    //                 //  $push[$colm[$j]] = isset($post['data'][$i][$j])?$post['data'][$i][$j]:'';
    //                 // }
    //                 foreach ($colm as $key => $value) {
    //                     $push[$value] = isset($post['data'][$i][$value])?$post['data'][$i][$value]:'';
    //                 }
    //                 $match = array('category'=>$push['category'],'code'=>$push['code']);
    //                 $resp['result']['data'][$i] = $this->Data_model->merge_data($match,$push,'codedictionary');
    //             }
    //             if (!empty($resp['result']['data'])) {
    //                 $resp['result']['success'] = true;
    //                 $resp['result']['message'] = count($resp['result']['data']).' rows affected.';
    //             }
    //         }
    //     }

    //     echo json_encode($resp);
    // }

    public function offer(){

        set_time_limit(60*60*24);

        $colm = ["category",
                "code",
                "status",
                "description",
                ];

        $post = json_decode(file_get_contents('php://input'), true);

        $resp = array(
            'action'=>'undefined',
            'method'=>'undefined',
            'result'=>array('success'=>false,'data'=>null,'message'=>'Failed')
        );

        $a_flg = false;
        $m_flg = false;
        $d_flg = false;

        if (!empty($post)) {
            if (isset($post['action'])) {
                $arg = $post['action'];
                if ($arg=='insOf') {
                    $a_flg = true;
                    $resp['action'] = $post['action'];
                }else{
                    $resp['action'] = "Invalid argument.";
                }
            }else{
                $resp['action'] = "Missing this argument.";
            }

            if (isset($post['method'])) {
                $arg = $post['method'];
                if ($arg=='insert') {
                    $m_flg = true;
                    $resp['method'] = $post['method'];
                }else{
                    $resp['method'] = "Invalid argument.";
                }
            }else{
                $resp['method'] = "Missing this argument.";
            }

            if (isset($post['data'])) {
                $arg = $post['data'];
                if (!empty($arg)) {
                    $d_flg = true;
                }else{
                    $resp['result'] = array('error'=>'Empty array data pushing.');
                }
            }else{
                $resp['result'] = array('error'=>'Missing argument data pushing.');
            }

            if ($a_flg==true&&$m_flg==true&&$d_flg==true) {
                for ($i=0; $i < count($post['data']); $i++) { 
                    $push = [];
                    // for ($j=0; $j < count($colm); $j++) { 
                    //  $push[$colm[$j]] = isset($post['data'][$i][$j])?$post['data'][$i][$j]:'';
                    // }
                    foreach ($colm as $key => $value) {
                        $push[$value] = isset($post['data'][$i][$value])?$post['data'][$i][$value]:'';
                    }
                    $match = array('category'=>$push['category'],'code'=>$push['code']);
                    $resp['result']['data'][$i] = $this->Data_model->merge_data($match,$push,'codedictionary');
                }
                if (!empty($resp['result']['data'])) {
                    $resp['result']['success'] = true;
                    $resp['result']['message'] = count($resp['result']['data']).' rows affected.';
                }
            }
        }

        echo json_encode($resp);
    }



}
 
?>