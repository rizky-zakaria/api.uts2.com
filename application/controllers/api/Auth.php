<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index_post()
    {
        $username = $this->post('username');
        $password = md5($this->post('password'));
        $data = $this->db->query("SELECT * FROM tb_user JOIN tb_nilai WHERE tb_user.username='$username' AND tb_user.password='$password' AND tb_user.id_user=tb_nilai.id_user")->row_array();
        $data['akumulasi'] = ($data['laporan'] + $data['blog'] + $data['video'] + $data['aplikasi']) / 4;
        // var_dump($data['laporan']);
        // die;
        if ($data != null) {
            $this->response([
                'status' => true,
                'messages' => "Data Anda",
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'messages' => "Data Not Found",
                'data' => $data,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
