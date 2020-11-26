<?php
class Auth_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/index');
    }

    public function cek()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        // $submit =  $this->input->post('submit');

        // $cek = $this->db->get_where('tb_user', ['username' => $username, 'password' => $password])->row_array();
        $cek = $this->db->query("SELECT * FROM `tb_user` JOIN tb_nilai WHERE tb_user.id = tb_nilai.id_user AND tb_user.id = 3 AND tb_nilai.id_user=3 AND tb_nilai.id_user=tb_user.id");
        // var_dump($cek);
        // die;
        if ($cek != null) {
            redirect(base_url("Dosen_controller"));
        } else {
            redirect(base_url("Auth_controller"));
        }
    }
}
