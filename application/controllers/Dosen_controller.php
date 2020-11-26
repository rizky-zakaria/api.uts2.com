<?php

class Dosen_controller extends CI_Controller
{
    public function index()
    {
        $data['mahasiswa'] =  $this->db->get_where('tb_user', ['role' => 2])->result_array();
        // var_dump($data);
        // die;
        $this->load->view('dosen/index', $data);
    }

    public function Nilai()
    {
        $id = $_GET['id'];
        $data['nilai'] = $this->db->query("SELECT * FROM `tb_user` JOIN tb_nilai WHERE tb_user.id_user=$id AND tb_nilai.id_user=$id AND tb_user.id_user=tb_nilai.id_user")->result_array();
        $data['id'] = $id;
        // var_dump($data);
        $this->load->view('dosen/nilai', $data);
    }

    public function addNilai()
    {
        $id['id'] = $_GET['id'];
        $this->load->view('dosen/add', $id);
    }

    public function save()
    {
        $id = $this->input->post('id');
        $get = $this->db->get_where('tb_nilai', ['id_user' => $id])->row_array();

        $laporan = $this->input->post('laporan') + $get['laporan'];
        $blog = $this->input->post('blog') + $get['blog'];
        $video =  $this->input->post('video') + $get['video'];
        $aplikasi = $this->input->post('aplikasi') + $get['aplikasi'];

        // $kalkulasi = ($laporan + $blog + $video + $aplikasi) / 4;
        // echo $kalkulasi;
        // die;
        if ($get) {
            $update = $this->db->query("UPDATE `tb_nilai` SET `laporan` = '$laporan', `video` = '$video', `blog` = '$blog', `aplikasi` = '$aplikasi' WHERE `tb_nilai`.`id_user` = $id; ");
            if ($update) {
                redirect(base_url("Dosen_controller/Nilai?id=" . $id));
            } else {
                echo "gagal menambahkan Data";
            }
        } else {
            $insert = $this->db->query("INSERT INTO tb_nilai VALUES('', '$laporan', '$video', '$blog', '$aplikasi', '$id' ) ");
            if ($insert) {
                redirect(base_url("Dosen_controller/Nilai?id=" . $id));
            } else {
                echo "gagal menambahkan Data";
            }
        }

        // echo $laporan . $blog . $video . $aplikasi . $id;
    }
}
