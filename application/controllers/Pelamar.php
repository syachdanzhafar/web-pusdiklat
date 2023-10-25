<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar extends CI_Controller
{
    private $dataPelamar;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 3) {
            echo 'blocked';
            die;
        }
        $this->load->model('Pelamar_model', 'model');
        $GLOBALS['dataPelamar'] = $this->model->getDataPelamar();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $GLOBALS['dataPelamar'];
        $data['dataLengkap'] = !in_array(null, $data['user']);
        $data['unitTerdaftar'] = $this->model->getListUnitDilamar($data['user']['id']);
        $data['unit_kerja'] = $this->model->getAllUnitKerja();

        if ($data['dataLengkap'] == FALSE) {
            //$this->session->set_flashdata('flash', ['icon' => 'warning', 'title' => 'Data Belum Lengkap', 'text' => 'Dokumen anda belum lengkap.', 'url' => base_url('pelamar/profile')]);
            // $this->session->set_flashdata('docComp', ['icon' => 'error', 'title' => 'Data Belum Lengkap', 'text' => 'Dokumen anda belum lengkap.', 'url' => base_url('pelamar/profile')]);
        }

        $this->load->view('templates/pelamar_header', $data);
        $this->load->view('pelamar/index', $data);
        $this->load->view('templates/pelamar_footer');
    }

    public function daftar($id)
    {
        $data['title'] = 'Daftar';
        $data['user'] = $GLOBALS['dataPelamar'];
        $data['unit_kerja'] = $this->model->getUnitKerjaById($id);

        $this->form_validation->set_rules('no_surat', 'Nomor Surat Permohonan Magang', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('pernyataan', 'Pernyataan', 'required');

        //apakah user mengupload surat permohonan magang
        if (empty($_FILES['surat_permohonan']['name'])) {
            //user akan diberikan pesan eror dan dikembalikan ke page daftar
            $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Magang', 'required', [
                'required' => 'Upload Surat Permohonan Magang disini.'
            ]);
        } else if ($_FILES['surat_permohonan']['type'] != 'application/pdf') {
            $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Magang', 'required', [
                'required' => 'Berkas Surat Permohonan Magang harus bertipe PDF.'
            ]);
        } else if ($_FILES['surat_permohonan']['size'] > 2048000) {
            $this->form_validation->set_rules('surat_permohonan', 'Surat Permohonan Magang', 'required', [
                'required' => 'Ukuran berkas Surat Permohonan Magang harus kurang dari 2 MB.'
            ]);
        }

        if ($this->form_validation->run() == TRUE) {

            //me-load library upload
            $this->load->library('upload');

            //upload surat magang
            //konfigurasi library upload
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048;
            $config['upload_path'] = './folder_Surat_Permohonan/';
            $config['file_name'] = 'Pelamar_SuratPermohonan_' . time();
            $this->upload->initialize($config);
            $this->upload->do_upload('surat_permohonan');
            //mengambil nama file untuk disimpan ke database
            $nama_file_surat_permohonan = $this->upload->data('file_name');

            $this->model->inputSuratPermohonan($id, $GLOBALS['dataPelamar']['id'], $nama_file_surat_permohonan);

            $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Pendaftaran Magang', 'text' => 'Permintaan magang anda akan kami proses.']);

            //load ulang tampilan page pendaftaran
            redirect('pelamar/kegiatan');
        } else {

            if ($this->input->post('submitDaftar') == 'submit') {
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Pendaftaran Magang', 'text' => 'Pastikan anda memasukan data yang sesuai pada form pendaftaran.']);
            }

            $this->load->view('templates/pelamar_header', $data);
            $this->load->view('pelamar/daftar', $data);
            $this->load->view('templates/pelamar_footer');
        }
    }

    public function profile()
    {
        $data['title'] = "Profil Pengguna";
        $data['user'] = $GLOBALS['dataPelamar'];

        if ($this->input->post("submitInfoPribadi") == "submitInfoPribadi") {

            $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[70]');
            $this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required|trim|numeric|max_length[15]');

            if ($this->form_validation->run() == TRUE) {
                $arrInfoPribadi = [
                    'nama_pelamar' => htmlspecialchars($this->input->post('nama'), true),
                    'no_telpon' => htmlspecialchars($this->input->post('no_telp'), true)
                ];
                $this->model->updateDataPelamar($GLOBALS['dataPelamar']['email'], $arrInfoPribadi);
                $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Profil', 'text' => 'Informasi pribadi berhasil diperbarui.']);
                redirect('pelamar/profile');
            } else {
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Profil', 'text' => 'Pastikan anda memasukan data yang sesuai dengan ketentuan.']);
                $this->load->view('templates/pelamar_header', $data);
                $this->load->view('pelamar/profile', $data);
                $this->load->view('templates/pelamar_footer');
            }
        } else if ($this->input->post("submitInfoAkad") == "submitInfoAkad") {

            $this->form_validation->set_rules('universitas', 'Universitas', 'required|trim|max_length[70]');
            $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required|trim|max_length[30]');
            $this->form_validation->set_rules('semester', 'Semester', 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[14]');
            $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim|max_length[70]');
            $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim|max_length[70]');

            if ($this->form_validation->run() == TRUE) {
                $arrInfoAkad = [
                    "universitas" => htmlspecialchars($this->input->post('universitas', true)),
                    "nim" => htmlspecialchars($this->input->post('nim', true)),
                    "semester" => htmlspecialchars($this->input->post('semester', true)),
                    "fakultas" => htmlspecialchars($this->input->post('fakultas', true)),
                    "prodi" => htmlspecialchars($this->input->post('prodi', true)),
                ];
                $this->model->updateDataPelamar($GLOBALS['dataPelamar']['email'], $arrInfoAkad);
                $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Profil', 'text' => 'Informasi akademik berhasil diperbarui.']);
                redirect('pelamar/profile#tab-2');
            } else {
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Profil', 'text' => 'Pastikan anda memasukan data yang sesuai dengan ketentuan.']);
                // redirect('pelamar/profile#tab-2');
                $this->load->view('templates/pelamar_header', $data);
                $this->load->view('pelamar/profile', $data);
                $this->load->view('templates/pelamar_footer');
            }
        } else if ($this->input->post("submitFotoProfil") == "submitFotoProfil") {
            if ($_FILES['foto_profil']['name']) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './foto_profil/';
                $config['max_size'] = 1024;
                $config['min_width'] = 128;
                $config['min_height'] = 128;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profil')) {
                    $this->model->updateFotoProfil($data['user']['id'], $this->upload->data('file_name'));

                    if ($data['user']['foto_profil'] != 'default.jpg') {
                        unlink(FCPATH . 'foto_profil/' . $data['user']['foto_profil']);
                    }

                    $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Profil', 'text' => 'Foto profil berhasil diperbarui.']);
                    redirect('pelamar/profile#tab-4');
                } else {
                    $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Profil', 'text' => $this->upload->display_errors("", "")]);
                    redirect('pelamar/profile#tab-4');
                }
            } else {
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Profil', 'text' => 'Pastikan anda memasukan foto yang sesuai dengan ketentuan.']);
                redirect('pelamar/profile#tab-4');
            }
        } else {
            $this->load->view('templates/pelamar_header', $data);
            $this->load->view('pelamar/profile', $data);
            $this->load->view('templates/pelamar_footer');
        }
    }

    public function kegiatan()
    {
        $data['title'] = "Kegiatan Pengguna";
        $data['user'] = $GLOBALS['dataPelamar'];
        $data['status_pendaftaran'] = $this->model->getStatusPendaftaran($data['user']['id']);
        // var_dump($data['status_pendaftaran']);
        // die;

        $this->load->view('templates/pelamar_header', $data);
        $this->load->view('pelamar/kegiatan', $data);
        $this->load->view('templates/pelamar_footer');
    }

    public function download($jenis, $id)
    {
        $this->load->helper('download');
        $data = $this->model->getDataPelamarById($id);

        // if ($jenis == 'suratPermohonan') {
        //     force_download('folder_Surat_Permohonan/' . $data['nama_file_surat_permohonan'], NULL);
        // } else 
        if ($jenis == 'khs') {
            force_download('folder_KHS/' . $data['nama_file_khs'], NULL);
        } else if ($jenis == 'cv') {
            force_download('folder_CV/' . $data['nama_file_cv'], NULL);
        }
    }

    // public function delete($jenis, $id)
    // {
    //     $data = $this->model->getDataPelamarById($id);

    //     if ($jenis == 'suratPermohonan') {
    //         if ($data['nama_file_surat_permohonan'] != null) {
    //             unlink(FCPATH . 'folder_Surat_Permohonan/' . $data['nama_file_surat_permohonan']);
    //             $this->model->deleteFileNameById('suratPermohonan', $id);
    //             $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Berkas', 'text' => 'Berkas Surat Permohonan Magang berhasil dihapus.']);
    //             redirect('pelamar/profile#tab-3');
    //         } else {
    //             $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas', 'text' => 'Berkas Surat Permohonan Magang gagal dihapus.']);
    //             redirect('pelamar/profile#tab-3');
    //         }
    //     } else if ($jenis == 'khs') {
    //         if ($data['nama_file_khs'] != null) {
    //             unlink(FCPATH . 'folder_KHS/' . $data['nama_file_khs']);
    //             $this->model->deleteFileNameById('khs', $id);
    //             $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Berkas', 'text' => 'Berkas Kartu Hasil Studi berhasil dihapus.']);
    //             redirect('pelamar/profile#tab-3');
    //         } else {
    //             $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas', 'text' => 'Berkas Kartu Hasil Studi gagal dihapus.']);
    //             redirect('pelamar/profile#tab-3');
    //         }
    //     } else if ($jenis == 'cv') {
    //         if ($data['nama_file_cv'] != null) {
    //             unlink(FCPATH . 'folder_CV/' . $data['nama_file_cv']);
    //             $this->model->deleteFileNameById('cv', $id);
    //             $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Berkas', 'text' => 'Berkas Curriculum Vitae berhasil dihapus.']);
    //             redirect('pelamar/profile#tab-3');
    //         } else {
    //             $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas', 'text' => 'Berkas Curriculum Vitae gagal dihapus.']);
    //             redirect('pelamar/profile#tab-3');
    //         }
    //     }
    // }

    public function edit($jenis, $id)
    {
        //me-load library upload
        $this->load->library('upload');

        //konfigurasi library upload
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048;

        //mengambil data pelamar
        $data = $this->model->getDataPelamarById($id);

        // if ($jenis == 'suratPermohonan') {
        //     if (empty($_FILES['inputSurat']['name'])) {
        //         //ketika pelamar tidak mengupload file
        //         $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Surat Permohonan', 'text' => 'Pilih berkas terlebih dahulu sebelum melakukan unggahan.']);
        //         redirect('pelamar/profile#tab-3');
        //     } else if ($_FILES['inputSurat']['type'] != 'application/pdf') {
        //         //ketika pelamar mengupload file yang bukan pdf
        //         $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Surat Permohonan', 'text' => 'Berkas yang diunggah harus bertipe PDF.']);
        //         redirect('pelamar/profile#tab-3');
        //     } else if ($_FILES['inputSurat']['size'] > 2048000) {
        //         //ketika pelamar mengupload file dengan ukuran lebih dari 2 MB
        //         $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Surat Permohonan', 'text' => 'Berkas yang diunggah harus berukuran kurang dari 2 MB.']);
        //         redirect('pelamar/profile#tab-3');
        //     } else {
        //         //ketika pelamar mengupload file yang benar
        //         //upload surat magang
        //         $config['upload_path'] = './folder_Surat_Permohonan/';
        //         $config['file_name'] = 'Pelamar_SuratPermohonan_' . time();
        //         $this->upload->initialize($config);
        //         $this->upload->do_upload('inputSurat');
        //         //mengambil nama file untuk disimpan ke database
        //         $namaSuratPermohonan = $this->upload->data('file_name');
        //         //menghapus file khs lama
        //         if ($data['nama_file_surat_permohonan'] != null) {
        //             unlink(FCPATH . 'folder_Surat_Permohonan/' . $data['nama_file_surat_permohonan']);
        //         }

        //         $this->model->updateBerkas('suratPermohonan', $id, $namaSuratPermohonan);

        //         $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Berkas Surat Permohonan', 'text' => 'Berkas berhasil diunggah.']);
        //         redirect('pelamar/profile#tab-3');
        //     }
        // } else 
        if ($jenis == 'khs') {
            if (empty($_FILES['inputKhs']['name'])) {
                //ketika pelamar tidak mengupload file
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Kartu Hasil Studi', 'text' => 'Pilih berkas terlebih dahulu sebelum melakukan unggahan.']);
                redirect('pelamar/profile#tab-3');
            } else if ($_FILES['inputKhs']['type'] != 'application/pdf') {
                //ketika pelamar mengupload file yang bukan pdf
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Kartu Hasil Studi', 'text' => 'Berkas yang diunggah harus bertipe PDF.']);
                redirect('pelamar/profile#tab-3');
            } else if ($_FILES['inputKhs']['size'] > 2048000) {
                //ketika pelamar mengupload file dengan ukuran lebih dari 2 MB
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Kartu Hasil Studi', 'text' => 'Berkas yang diunggah harus berukuran kurang dari 2 MB.']);
                redirect('pelamar/profile#tab-3');
            } else {
                //ketika pelamar mengupload file yang benar
                //upload khs
                $config['upload_path'] = './folder_KHS/';
                $config['file_name'] = 'Pelamar_KHS_' . time();
                $this->upload->initialize($config);
                $this->upload->do_upload('inputKhs');
                //mengambil nama file untuk disimpan ke database
                $namaKhs = $this->upload->data('file_name');
                //menghapus file khs lama
                if ($data['nama_file_khs'] != null) {
                    unlink(FCPATH . 'folder_KHS/' . $data['nama_file_khs']);
                }

                $this->model->updateBerkas('khs', $id, $namaKhs);

                $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Berkas Kartu Hasil Studi', 'text' => 'Berkas berhasil diunggah.']);
                redirect('pelamar/profile#tab-3');
            }
        } else if ($jenis == 'cv') {
            if (empty($_FILES['inputCv']['name'])) {
                //ketika pelamar tidak mengupload file
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Curriculum Vitae', 'text' => 'Pilih berkas terlebih dahulu sebelum melakukan unggahan.']);
                redirect('pelamar/profile#tab-3');
            } else if ($_FILES['inputCv']['type'] != 'application/pdf') {
                //ketika pelamar mengupload file yang bukan pdf
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Curriculum Vitae', 'text' => 'Berkas yang diunggah harus bertipe PDF.']);
                redirect('pelamar/profile#tab-3');
            } else if ($_FILES['inputCv']['size'] > 2048000) {
                //ketika pelamar mengupload file dengan ukuran lebih dari 2 MB
                $this->session->set_flashdata('flash', ['icon' => 'error', 'title' => 'Berkas Curriculum Vitae', 'text' => 'Berkas yang diunggah harus berukuran kurang dari 2 MB.']);
                redirect('pelamar/profile#tab-3');
            } else {
                //ketika pelamar mengupload file yang benar
                //upload cv
                $config['upload_path'] = './folder_CV/';
                $config['file_name'] = 'Pelamar_CV_' . time();
                $this->upload->initialize($config);
                $this->upload->do_upload('inputCv');
                //mengambil nama file untuk disimpan ke database
                $namaCv = $this->upload->data('file_name');
                //menghapus file khs lama
                if ($data['nama_file_cv'] != null) {
                    unlink(FCPATH . 'folder_CV/' . $data['nama_file_cv']);
                }

                $this->model->updateBerkas('cv', $id, $namaCv);

                $this->session->set_flashdata('flash', ['icon' => 'success', 'title' => 'Berkas Curriculum Vitae', 'text' => 'Berkas berhasil diunggah.']);
                redirect('pelamar/profile#tab-3');
            }
        }
    }
}
