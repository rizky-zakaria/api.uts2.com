<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Nilai extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function index_post()
    {
        $id = $this->post('id_user');
        $data = $this->db->query("SELECT * FROM  tb_nilai WHERE id_user = '$id'")->result_array();
        foreach ($data as $dt) {
            $dat = ($dt['laporan'] + $dt['video'] + $dt['blog'] + $dt['aplikasi']) / 4;
            $this->response([
                'status' => true,
                'messages' => "Data Anda",
                'data' => $dat,
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_get()
    {
        $get = $this->db->get('tb_nilai')->result_array();
        if ($get) {
            $this->response([
                'status' => true,
                'messages' => "data Anda",
                'data' => $get,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => true,
                'messages' => "data Not Found",
                'data' => $get,
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
