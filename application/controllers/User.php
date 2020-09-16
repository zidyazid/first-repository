<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged_in();
    }
    public function index()
    {

        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['nisn' => $this->session->userdata('nisn')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            # code...
            $name = $this->input->post('name');
            $nisn = $this->input->post('nisn');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        # code...
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    # code...
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('image', $new_image);
            $this->db->set('name', $name);
            $this->db->where('nisn', $nisn);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    your profile has been changed!
                    </div>');
            redirect('user');
        }
    }

    public function changepassword()
    {

        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['nisn' =>
        $this->session->userdata('nisn')])->row_array();

        $this->form_validation->set_rules('curent_password', 'Curent_Password', 'required|trim');
        $this->form_validation->set_rules(
            'new_password1',
            'New_Password1',
            'required|trim|min_length[3]|matches[new_password2]'
        );
        $this->form_validation->set_rules(
            'new_password2',
            'New_Password1',
            'required|trim|min_length[3]|matches[new_password1]'
        );


        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            # code...
            $curentpassword = $this->input->post('curent_password');
            $new = $this->input->post('new_password1');
            if (!password_verify($curentpassword, $data['user']['password'])) {
                # code...
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
            Wrong Password!
            </div>');
                redirect('user/changepassword');
            } else {
                if ($curentpassword == $new) {
                    # code...
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    this password have ever used!
                    </div>');
                    redirect('user/changepassword');
                } else {
                    # code...
                    $password_hash = password_hash($new, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('nisn', $this->session->userdata('nisn'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    password changed!
                    </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function cek_kelulusan()
    {
        # code...

        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['nisn' => $this->session->userdata('nisn')])->row_array();
        $data['keterangan'] = $this->db->get_where('keterangan', ['nisn' => $this->session->userdata('nisn')])->row_array();

        echo 'anda ' . $data['keterangan']['keterangan'];
        redirect('user');
    }
}