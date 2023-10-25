<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UnitKerja extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// load model persetujuan
		$this->load->model('Persetujuan_model');
		if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 2) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Unauthenticated, harap login terlebih dahulu']);
			redirect('auth/index');
			die;
		}
	}

	// fungsi load template secara dinamis
	public function loadTemplate($menu)
	{
		$menu['title'] = 'Admin Unit Kerja';
		$this->load->view('templates/administrator-templates/header', $menu);
		$this->load->view('templates/administrator-templates/nav_menu');
		$this->load->view('templates/administrator-templates/side_menu', $menu);
		$this->load->view('administrator/' . $menu['menu'], $menu);
		$this->load->view('templates/administrator-templates/footer_content');
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'index';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Menunggu Verifikasi'
		);

		//pagination
		$pagination['per_page'] = 2;
		$data['start'] = $this->uri->segment(3);

		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		// aksi untuk liat data yang masih menunggu verifikasi
		// aksi untuk pencarian by nama
		if ($this->input->get('pelamar')) {
			$arrayData['nama_pelamar'] = $this->input->get('pelamar');
			$data['verifikasi'] = $this->Persetujuan_model->getDataWithStatus($arrayData, $pagination['per_page'], $data['start']);
		} else {
			$arrayData['nama_pelamar'] = '';
			$data['verifikasi'] = $this->Persetujuan_model->getDataWithStatus($arrayData, $pagination['per_page'], $data['start']);
		}

		//pagination
		$pagination['total_rows'] = $this->Persetujuan_model->countDataWithStatus($arrayData);
		$pagination['base_url'] = 'http://localhost/web-pusdiklat/unitkerja/index';
		$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
		$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];

		$this->pagination->initialize($pagination);
		//pagination

		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Disetujui'
		);

		//pagination
		$pagination['per_page'] = 2;
		$data['start'] = $this->uri->segment(3);

		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		$data['countApprovement'] = $this->Persetujuan_model->getCountData($arrayData);
		// aksi untuk liat data yang telah disetujui
		// aksi untuk pencarian by nama
		if ($this->input->get('pelamar')) {
			$arrayData['nama_pelamar'] = $this->input->get('pelamar');
			$data['approval'] = $this->Persetujuan_model->getDataWithStatus($arrayData, $pagination['per_page'], $data['start']);
		} else {
			$arrayData['nama_pelamar'] = '';
			$data['approval'] = $this->Persetujuan_model->getDataWithStatus($arrayData, $pagination['per_page'], $data['start']);
		}

		//pagination
		$pagination['total_rows'] = $this->Persetujuan_model->countDataWithStatus($arrayData);
		$pagination['base_url'] = 'http://localhost/web-pusdiklat/unitkerja/approval';
		$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
		$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];

		$this->pagination->initialize($pagination);
		//pagination

		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Ditolak'
		);

		//pagination
		$pagination['per_page'] = 2;
		$data['start'] = $this->uri->segment(3);

		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		$data['countRejection'] = $this->Persetujuan_model->getCountData($arrayData);
		// aksi untuk liat data yang telah ditolak
		// aksi untuk pencarian by nama
		if ($this->input->get('pelamar')) {
			$arrayData['nama_pelamar'] = $this->input->get('pelamar');
			$data['reject'] = $this->Persetujuan_model->getDataWithStatus($arrayData, $pagination['per_page'], $data['start']);
		} else {
			$arrayData['nama_pelamar'] = '';
			$data['reject'] = $this->Persetujuan_model->getDataWithStatus($arrayData, $pagination['per_page'], $data['start']);
		}

		//pagination
		$pagination['total_rows'] = $this->Persetujuan_model->countDataWithStatus($arrayData);
		$pagination['base_url'] = 'http://localhost/web-pusdiklat/unitkerja/rejection';
		$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
		$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];

		$this->pagination->initialize($pagination);
		//pagination

		$this->loadTemplate($data);
	}

	public function verifikasiBerkas($id)
	{
		$data['menu'] = 'verifikasi_berkas';
		$arrayData = array(
			'id_unit' => $this->session->userdata('id_unit_kerja'),
			'status' => 'Menunggu Verifikasi'
		);
		// Get Count Notifikasi Data yang perlu di verifikasi
		$data['count'] = $this->Persetujuan_model->getCountDataPending($arrayData);
		// aksi untuk liat data untuk diverifikasi
		$data['detail'] = $this->Persetujuan_model->getDataById($id);
		$this->loadTemplate($data);
	}

	public function updateStatus()
	{
		$setUpdate =  array(
			'status' => $this->input->post('status'),
			'tanggal_persetujuan' => date('Y-m-d'),
			'ket' => $this->input->post('ket')
		);
		$whereId = array(
			'id_permohonan' => $this->input->post('id_permohonan')
		);
		$this->Persetujuan_model->updateVerifikasi($whereId, $setUpdate, 'surat_permohonan');
		redirect('unitkerja/index');
	}
}
