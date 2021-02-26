<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('mst_user', array('username' => $username))->row_array();
            if ($user) {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'id' => $user['id'],
                            'username' => $user['username'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('admin');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">User Tidak aktif</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username dan Password tidak sama</div>');
                redirect('auth/index');
            }
        }
    }

    public function signup()
    {
        $data['title'] = 'Daftar Member';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('auth/signup', $data);
    }

    public function blocked()
    {
        $data['title'] = 'Access Forbidden';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Logout sukses..</div>');
        redirect('auth/index');
    }
}
