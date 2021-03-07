<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tglindo');
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'get_laporan');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['data_harian'] = $this->get_laporan->countLapHarian();
        $data['data_bulanan'] = $this->get_laporan->countLapBulanan();
        $data['data_tahunan'] = $this->get_laporan->countLapTahunan();
        $data['data_lain'] = $this->get_laporan->countLapLain();
        $data['dok_kerja'] = $this->get_laporan->countDokKerja();
        $data['dok_pribadi'] = $this->get_laporan->countDokPribadi();
        $data['scan_utama'] = $this->get_laporan->countScanUtama();
        $data['scan_pendukung'] = $this->get_laporan->countScanPendukung();

        $data['lap_harian_saya'] = $this->get_laporan->getLapHarianLimit();
        $data['lap_bulanan_saya'] = $this->get_laporan->getLapBulananLimit();
        $data['lap_tahunan_saya'] = $this->get_laporan->getLapTahunanLimit();
        $data['lap_lain_saya'] = $this->get_laporan->getLapLainLimit();
        $data['dok_kerja_saya'] = $this->get_laporan->getDokKerjaLimit();
        $data['dok_pribadi_saya'] = $this->get_laporan->getDokPribadiLimit();
        $data['scan_utama_saya'] = $this->get_laporan->getScanUtamaLimit();
        $data['scan_pendukung_saya'] = $this->get_laporan->getScanPendukungLimit();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['lap_harian_saya'] = $this->get_laporan->getLapHarianLimit();
        $data['lap_bulanan_saya'] = $this->get_laporan->getLapBulananLimit();
        $data['lap_tahunan_saya'] = $this->get_laporan->getLapTahunanLimit();
        $data['lap_lain_saya'] = $this->get_laporan->getLapLainLimit();
        $data['dok_kerja_saya'] = $this->get_laporan->getDokKerjaLimit();
        $data['dok_pribadi_saya'] = $this->get_laporan->getDokPribadiLimit();
        $data['scan_utama_saya'] = $this->get_laporan->getScanUtamaLimit();
        $data['scan_pendukung_saya'] = $this->get_laporan->getScanPendukungLimit();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['id']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Gagal</div>');
                    redirect('user/edit_profile');
                }
            }
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $this->db->set('nama', $nama);
            $this->db->where('id', $id);
            $this->db->update('mst_user');
            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_profile');
        }
    }

    public function changePassword()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">GAGAL..... Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/edit_profile');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('mst_user');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('user/edit_profile');
            }
        }
    }

    public function lap_harian()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Laporan Harian';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_harian_saya'] = $this->get_laporan->getLapHarian();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/lap_harian', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_harian/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_harian/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'unid' => $this->input->post('unid'),
                        'keterangan' => $this->input->post('keterangan'),
                        'nomor_akta' => $this->input->post('nomor_akta'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('lap_harian', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/lap_harian');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/lap_harian');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/lap_harian');
            }
        }
    }

    public function edit_lap_harian($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Laporan Harian';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_harian'] = $this->db->get_where('lap_harian', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_lap_harian', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_harian/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['lap_harian']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_harian/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_lap_harian/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');
            $keterangan = $this->input->post('keterangan');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->set('keterangan', $keterangan);
            $this->db->where('id', $id);
            $this->db->update('lap_harian');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_lap_harian/' . $id);
        }
    }

    public function file_download_harian($id)
    {
        $data = $this->db->get_where('lap_harian', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/lap_harian/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/lap_harian/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_lap_harian($id)
    {
        $_id = $this->db->get_where('lap_harian', ['id' => $id])->row();
        $query = $this->db->delete('lap_harian', ['id' => $id]);
        if ($query) {
            unlink("assets/files/lap_harian/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/lap_harian');
    }

    public function lap_bulanan()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Laporan Bulanan';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_bulanan_saya'] = $this->get_laporan->getLapBulanan();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/lap_bulanan', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_bulanan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_bulanan/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
						'unid' => $this->input->post('unid'),
						'keterangan' => $this->input->post('keterangan'),
                        'nama_file' => $this->input->post('nama_file'),
                        'nomor_akta' => $this->input->post('nomor_akta'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('lap_bulanan', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/lap_bulanan');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/lap_bulanan');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/lap_bulanan');
            }
        }
    }

    public function edit_lap_bulanan($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Laporan Bulanan';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_bulanan'] = $this->db->get_where('lap_bulanan', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_lap_bulanan', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_bulanan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['lap_bulanan']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_bulanan/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_lap_bulanan/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');
			$keterangan = $this->input->post('keterangan');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
			$this->db->set('keterangan', $keterangan);
            $this->db->where('id', $id);
            $this->db->update('lap_bulanan');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_lap_bulanan/' . $id);
        }
    }

    public function file_download_bulanan($id)
    {
        $data = $this->db->get_where('lap_bulanan', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/lap_bulanan/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/lap_bulanan/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_lap_bulanan($id)
    {
        $_id = $this->db->get_where('lap_bulanan', ['id' => $id])->row();
        $query = $this->db->delete('lap_bulanan', ['id' => $id]);
        if ($query) {
            unlink("assets/files/lap_bulanan/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/lap_bulanan');
    }


    public function lap_tahunan()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Laporan Tahunan';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_tahunan_saya'] = $this->get_laporan->getLapTahunan();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/lap_tahunan', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_tahunan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_tahunan/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
						'unid' => $this->input->post('unid'),
						'keterangan' => $this->input->post('keterangan'),
                        'nama_file' => $this->input->post('nama_file'),
                        'nomor_akta' => $this->input->post('nomor_akta'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('lap_tahunan', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/lap_tahunan');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/lap_tahunan');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/lap_tahunan');
            }
        }
    }

    public function edit_lap_tahunan($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Laporan Tahunan';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_tahunan'] = $this->db->get_where('lap_tahunan', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_lap_tahunan', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_tahunan/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['lap_tahunan']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_tahunan/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_lap_tahunan/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');
			$keterangan = $this->input->post('keterangan');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
			$this->db->set('keterangan', $keterangan);
            $this->db->where('id', $id);
            $this->db->update('lap_tahunan');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_lap_tahunan/' . $id);
        }
    }

    public function file_download_tahunan($id)
    {
        $data = $this->db->get_where('lap_tahunan', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/lap_tahunan/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/lap_tahunan/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_lap_tahunan($id)
    {
        $_id = $this->db->get_where('lap_tahunan', ['id' => $id])->row();
        $query = $this->db->delete('lap_tahunan', ['id' => $id]);
        if ($query) {
            unlink("assets/files/lap_tahunan/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/lap_tahunan');
    }

    public function lap_lain()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Laporan Lain';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_lain_saya'] = $this->get_laporan->getLaplain();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/lap_lain', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_lain/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_lain/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
						'unid' => $this->input->post('unid'),
						'keterangan' => $this->input->post('keterangan'),
                        'nama_file' => $this->input->post('nama_file'),
                        'nomor_akta' => $this->input->post('nomor_akta'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('lap_lain', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/lap_lain');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/lap_lain');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/lap_lain');
            }
        }
    }

    public function edit_lap_lain($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Laporan Lain';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['lap_lain'] = $this->db->get_where('lap_lain', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_lap_lain', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/lap_lain/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['lap_lain']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/lap_lain/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_lap_lain/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');
			$keterangan = $this->input->post('keterangan');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
			$this->db->set('keterangan', $keterangan);
            $this->db->where('id', $id);
            $this->db->update('lap_lain');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_lap_lain/' . $id);
        }
    }

    public function file_download_lain($id)
    {
        $data = $this->db->get_where('lap_lain', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/lap_lain/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/lap_lain/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_lap_lain($id)
    {
        $_id = $this->db->get_where('lap_lain', ['id' => $id])->row();
        $query = $this->db->delete('lap_lain', ['id' => $id]);
        if ($query) {
            unlink("assets/files/lap_lain/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/lap_lain');
    }

    public function dok_kerja()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Dokumen Kerja';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_kerja_saya'] = $this->get_laporan->getDokKerja();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/dok_kerja', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_kerja/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_kerja/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('dok_kerja', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/dok_kerja');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/dok_kerja');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/dok_kerja');
            }
        }
    }

    public function edit_dok_kerja($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Dokumen Kerja';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_kerja'] = $this->db->get_where('dok_kerja', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_dok_kerja', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_kerja/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['dok_kerja']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_kerja/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_dok_kerja/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('dok_kerja');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_dok_kerja/' . $id);
        }
    }

    public function file_download_dok_kerja($id)
    {
        $data = $this->db->get_where('dok_kerja', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/dok_kerja/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/dok_kerja/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_dok_kerja($id)
    {
        $_id = $this->db->get_where('dok_kerja', ['id' => $id])->row();
        $query = $this->db->delete('dok_kerja', ['id' => $id]);
        if ($query) {
            unlink("assets/files/dok_kerja/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/dok_kerja');
    }

    public function dok_pribadi()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Dokumen Pribadi';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_pribadi_saya'] = $this->get_laporan->getDokPribadi();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/dok_pribadi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar|txt';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_pribadi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_pribadi/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
						'unid' => $this->input->post('unid'),
						'keterangan' => $this->input->post('keterangan'),
                        'nama_file' => $this->input->post('nama_file'),
                        'nomor_akta' => $this->input->post('nomor_akta'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('dok_pribadi', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/dok_pribadi');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/dok_pribadi');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/dok_pribadi');
            }
        }
    }

    public function edit_dok_pribadi($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Dokumen Pribadi';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['dok_pribadi'] = $this->db->get_where('dok_pribadi', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_dok_pribadi', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'xls|xlsx|doc|docx|ppt|pptx|pdf|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/dok_pribadi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['dok_pribadi']['file_upload'];
                    if ($old_file != 'default.docx') {
                        unlink(FCPATH . 'assets/files/dok_pribadi/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_dok_pribadi/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');
			$keterangan = $this->input->post('keterangan');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
			$this->db->set('keterangan', $keterangan);
            $this->db->where('id', $id);
            $this->db->update('dok_pribadi');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_dok_pribadi/' . $id);
        }
    }

    public function file_download_dok_pribadi($id)
    {
        $data = $this->db->get_where('dok_pribadi', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/dok_pribadi/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/dok_pribadi/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_dok_pribadi($id)
    {
        $_id = $this->db->get_where('dok_pribadi', ['id' => $id])->row();
        $query = $this->db->delete('dok_pribadi', ['id' => $id]);
        if ($query) {
            unlink("assets/files/dok_pribadi/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/dok_pribadi');
    }

    public function scan_berkas_utama()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Scan Berkas Utama';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['scan_utama_saya'] = $this->get_laporan->getScanUtama();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/scan_berkas_utama', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'png|jpg|jpeg|pdf|bmp|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/scan_utama/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/files/scan_utama/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('scan_utama', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/scan_berkas_utama');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/scan_berkas_utama');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/scan_berkas_utama');
            }
        }
    }

    public function edit_scan_utama($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Scan Berkas Utama';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['scan_utama'] = $this->db->get_where('scan_utama', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_scan_utama', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'png|jpg|jpeg|pdf|bmp|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/scan_utama/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['scan_utama']['file_upload'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/files/scan_utama/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_scan_utama/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('scan_utama');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_scan_utama/' . $id);
        }
    }

    public function file_download_scan_utama($id)
    {
        $data = $this->db->get_where('scan_utama', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/scan_utama/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/scan_utama/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_scan_utama($id)
    {
        $_id = $this->db->get_where('scan_utama', ['id' => $id])->row();
        $query = $this->db->delete('scan_utama', ['id' => $id]);
        if ($query) {
            unlink("assets/files/scan_utama/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/scan_berkas_utama');
    }

    public function scan_berkas_pendukung()
    {
        $this->form_validation->set_rules('id_user', 'ID', 'required|trim');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Scan Berkas Pendukung';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['scan_pendukung_saya'] = $this->get_laporan->getScanPendukung();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/scan_berkas_pendukung', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'jpg|png|jpeg|pdf|bmp|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/scan_pendukung/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['id']['file_upload'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/files/scan_pendukung/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $data = array(
                        'id_user' => $this->input->post('id_user'),
                        'nama_file' => $this->input->post('nama_file'),
                        'date_upload' => $this->input->post('date_upload'),
                        'jam_upload' => $this->input->post('jam_upload'),
                        'file_upload' => $new_file
                    );
                    $this->db->insert('scan_pendukung', $data);
                    $this->session->set_flashdata('message', 'Upload data');
                    redirect('user/scan_berkas_pendukung');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/scan_berkas_pendukung');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !..  File Upload harus disertakan </div>');
                redirect('user/scan_berkas_pendukung');
            }
        }
    }

    public function edit_scan_pendukung($id)
    {
        $this->form_validation->set_rules('id', 'ID', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Scan Berkas Pendukung';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['scan_pendukung'] = $this->db->get_where('scan_pendukung', ['id' => $id])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('user/edit_scan_pendukung', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_file = $_FILES['file']['name'];
            if ($upload_file) {
                $config['allowed_types'] = 'png|jpg|jpeg|pdf|bmp|zip|rar';
                $config['max_size']     = '51200';
                $config['upload_path'] = './assets/files/scan_pendukung/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file')) {
                    $old_file = $data['scan_pendukung']['file_upload'];
                    if ($old_file != 'default.jpg') {
                        unlink(FCPATH . 'assets/files/scan_pendukung/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_upload', $new_file);
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger font-weight-bolder" role="alert">UPLOAD GAGAL !! Ekstensi File Salah / Ukuran file tidak boleh dari 10 mb</div>');
                    redirect('user/edit_scan_pendukung/' . $id);
                }
            }
            $id = $this->input->post('id');
            $date_edit = $this->input->post('date_edit');
            $jam_edit = $this->input->post('jam_edit');
            $nama_file = $this->input->post('nama_file');

            $this->db->set('date_edit', $date_edit);
            $this->db->set('jam_edit', $jam_edit);
            $this->db->set('nama_file', $nama_file);
            $this->db->where('id', $id);
            $this->db->update('scan_pendukung');

            $this->session->set_flashdata('message', 'Update data');
            redirect('user/edit_scan_pendukung/' . $id);
        }
    }

    public function file_download_scan_pendukung($id)
    {
        $data = $this->db->get_where('scan_pendukung', ['id' => $id])->row_array();
        header("Content-Disposition: attachment; filename=" . $data['file_upload']);
        $fp = fopen("assets/files/scan_pendukung/" . $data['file_upload'], 'r');
        $content = fread($fp, filesize('assets/files/scan_pendukung/' . $data['file_upload']));
        fclose($fp);
        echo $content;
        exit;
    }

    public function del_scan_pendukung($id)
    {
        $_id = $this->db->get_where('scan_pendukung', ['id' => $id])->row();
        $query = $this->db->delete('scan_pendukung', ['id' => $id]);
        if ($query) {
            unlink("assets/files/scan_pendukung/" . $_id->file_upload);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/scan_berkas_pendukung');
    }
}
