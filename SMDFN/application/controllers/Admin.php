<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_admin();
        $this->load->helper('tglindo');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['user_perbulan'] = $this->admin->countUserPerbulan();
        $data['count_user'] = $this->admin->countJmlUser();
        $data['user_aktif'] = $this->admin->countUserAktif();
        $data['user_tak_aktif'] = $this->admin->countUserTakAktif();
        $data['list_user'] = $this->admin->getAllUserLimit();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/profile', $data);
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
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Update Gagal</div>');
                    redirect('user/edit_profile');
                }
            }
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');

            $this->db->set('nama', $nama);
            $this->db->where('id', $id);
            $this->db->update('mst_user');

            $this->session->set_flashdata('message', 'Update data');
            redirect('admin/profile');
        }
    }

    public function changePassword()
    {

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password1', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">GAGAL..... Password baru tidak boleh sama dengan password lama</div>');
                redirect('admin/profile');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('mst_user');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('admin/profile');
            }
        }
    }

    public function man_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[mst_user.username]', array(
            'is_unique' => 'Username sudah ada'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
            'matches' => 'Password tidak sama',
            'min_length' => 'password min 3 karakter'
        ));
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Management User';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_user'] = $this->db->get('mst_user')->result_array();

            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/man_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'username' => $this->input->post('username', true),
                'role_id' => $this->input->post('role_id', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => date('Y/m/d'),
                'image' => 'default.jpg',
                'is_active' => 1
            );
            $this->db->insert('mst_user', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/man_user');
        }
    }

    public function get_edit()
    {
        echo json_encode($this->admin->getUserEdit($_POST['id']));
    }

    public function edit_user()
    {
        $id = $this->input->post('id');
        $is_active = $this->input->post('is_active');
        $role_id = $this->input->post('role_id');

        $this->db->set('is_active', $is_active);
        $this->db->set('role_id', $role_id);
        $this->db->where('id', $id);
        $this->db->update('mst_user');
        $this->session->set_flashdata('message', 'Update user');
        redirect('admin/man_user');
    }

    public function del_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mst_user');
        $this->session->set_flashdata('message', 'Hapus user');
        redirect('admin/man_user');
    }

    public function user_aktif()
    {
        $data['title'] = 'User Aktif';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_user_aktif'] = $this->admin->getUserAktif();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/user_aktif', $data);
        $this->load->view('templates/footer');
    }

    public function user_tidak_aktif()
    {
        $data['title'] = 'User Non Aktif';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['list_user_nonaktif'] = $this->admin->getUserNonAktif();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('admin/user_tidak_aktif', $data);
        $this->load->view('templates/footer');
    }
}
