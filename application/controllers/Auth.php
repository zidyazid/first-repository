<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        // bug masih bisa masuk ke auth melalui url
        if ($this->session->userdata('nisn')) {
            # code...
            redirect('user');
        }
        // script di atas

        $this->form_validation->set_rules('nisn', 'Nisn', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            # code...
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {
        $nisn = $this->input->post('nisn');
        $password = $this->input->post('password');

        // select data dan simpan di variable $user
        $user = $this->db->get_where('user', ['nisn' => $nisn])->row_array();
        // pengecekan jika user ada
        if ($user) {
            # code...
            if ($user['is_active'] == 1) {
                # code...
                // cek password benar atau salah
                // cara dibawah tidak dianjurkan lbh baik menggunakan password_verify
                if (password_verify($password, $user['password'])) {
                    # code...
                    // menyimpan data didalam session
                    $data = [
                        'nisn' => $user['nisn'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // cek role id
                    if ($user['role_id'] == 1) {
                        # code...
                        redirect('admin');
                    } else {
                        # code...
                        redirect('user');
                    }
                } else {

                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    wrong password!
                  </div>');
                    redirect('auth');
                }
            } else {
                # code...
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                username is not active!
              </div>');
                redirect('auth');
            }
        } else {
            # code...
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            nisn undefined!
          </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        if ($this->session->userdata('nisn')) {
            # code...
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('nisn', 'Nisn', 'required|trim|is_unique[user.nisn]|integer', [
            'is_unique' => 'sorry your nisn has been registered!!',
            'integer' => 'Nisn is not valid!!'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'min_length' => 'password to short!!',
            'matches' => 'password doent match!!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            # code...
            $data['title'] = 'Registrasi Siswa';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'nisn' => htmlspecialchars($this->input->post('nisn', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            congratulation your account has been created!
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nisn');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            you have been logout!
          </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked';

        $this->load->view('auth/blocked', $data);
    }
}