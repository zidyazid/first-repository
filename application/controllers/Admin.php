<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
    }

    public function index()
    {

        $data['Siswa'] = $this->db->get('keterangan')->result_array();
        $data['user'] = $this->db->get_where('user', ['nisn' => $this->session->userdata('nisn')])->row_array();
        $data['title'] = 'Dashboard';
        $data['User'] = $this->db->get('user')->result_array();
        $this->load->model('Siswa_model', 'siswa');
        $data['SiswaKet'] = $this->siswa->getSiswa();
        $data['tidaklulus'] = $this->siswa->tidakLulus();
        $data['terdaftar'] = $this->siswa->SiswaTerdaftar();



        $this->form_validation->set_rules('nisn', 'Nisn', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            # code...m

            $nisn = $this->input->post('nisn');
            $name = $this->input->post('name');

            $user = $this->db->get_where('user', ['nisn' => $nisn])->row_array();

            if ($user) {
                # code...
                if ($name == $user['name']) {
                    # code...
                    $data = [
                        'nisn' => $this->input->post('nisn'),
                        'name' => $this->input->post('name'),
                        'keterangan' => $this->input->post('keterangan')
                    ];
                    $this->db->insert('keterangan', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                    data berhasil ditambahkan!
                  </div>');
                    redirect('admin');
                } else {
                    # code...
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    maaf siswa dengan nama tersebut tidak ditemukan silahkan periksa kembali!
                  </div>');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    maaf siswa dengan nisn tersebut tidak ditemukan silahkan periksa kembali!
                  </div>');
                redirect('admin');
            }
        }
    }


    public function role()
    {
        // lanjut disini

        $data['user'] = $this->db->get_where('user', [
            'nisn' => $this->session->userdata('nisn')
        ])->row_array();

        $data['title'] = 'Role';

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        // lanjut disini

        $data['user'] = $this->db->get_where('user', [
            'nisn' => $this->session->userdata('nisn')
        ])->row_array();

        $data['title'] = 'Role Access';

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id != ', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role_Access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menuId = $this->input->post('menuId');
        $roleId = $this->input->post('roleId');

        $data = [
            'menu_id' => $menuId,
            'role_id' => $roleId
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        access changed!
      </div>');
        } else {
            $this->db->delete('user_access_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        access changed!
      </div>');
        }
    }


    public function student()
    {
        # code...
        $data['Siswa'] = $this->db->get('keterangan')->result_array();
        $data['user'] = $this->db->get_where('user', ['nisn' => $this->session->userdata('nisn')])->row_array();
        $data['title'] = 'Dashboard';
        $data['User'] = $this->db->get('user')->result_array();
        $this->load->model('Siswa_model', 'siswa');
        $data['SiswaKet'] = $this->siswa->getSiswa();
        $data['tidaklulus'] = $this->siswa->tidakLulus();
        $data['terdaftar'] = $this->siswa->SiswaTerdaftar();

        $data['user'] = $this->db->get_where('user', [
            'nisn' => $this->session->userdata('nisn')
        ])->row_array();

        $data['title'] = 'Student Report';

        $this->db->where('id != ', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/student', $data);
        $this->load->view('templates/footer');
    }

    public function preview()
    {
        $this->load->model('Siswa_model', 'siswa');
        $data['SiswaKet'] = $this->siswa->getSiswa();
        $data['tidaklulus'] = $this->siswa->tidakLulus();
        $data['siswa'] = $this->db->get('keterangan')->result_array();
        $this->load->view('document/preview', $data);
    }

    public function cetak()
    {
        ob_start();
        $this->load->model('Siswa_model', 'siswa');
        $data['SiswaKet'] = $this->siswa->getSiswa();
        $data['tidaklulus'] = $this->siswa->tidakLulus();
        $data['siswa'] = $this->db->get('keterangan')->result_array();
        $this->load->view('document/print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->writeHTML($html);
        $pdf->Output('kelulusan.pdf', 'D');
    }
}