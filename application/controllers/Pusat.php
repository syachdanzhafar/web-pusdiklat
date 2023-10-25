<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pusat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('pdf');
		$this->load->model('Balasan_model');
		$this->load->model('Pelamar_model');
		if (!$this->session->userdata('logged_in') || $this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('msg', ['type' => 'danger', 'text' => 'Unauthenticated, harap login terlebih dahulu']);
			redirect('auth/index');
			die;
		}
	}

	// fungsi load template secara dinamis
	public function loadTemplate($menu)
	{
		$menu['title'] = 'Admin Pusat';
		$this->load->view('templates/administrator-templates/header', $menu);
		$this->load->view('templates/administrator-templates/nav_menu');
		$this->load->view('templates/administrator-templates/side_menu', $menu);
		$this->load->view('administrator-pusat/' . $menu['menu'], $menu);
		$this->load->view('templates/administrator-templates/footer_content');
		$this->load->view('templates/administrator-templates/footer');
	}


	public function index()
	{
		$data['menu'] = 'daftar_pelamar';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi',
		);

		//pagination
		$pagination['per_page'] = 2;
		$data['start'] = $this->uri->segment(3);

		// aksi untuk pencarian by nama
		if ($this->input->get('pelamar')) {
			$search = $this->input->get('pelamar');
			$searchArray = array(
				'nama_pelamar' => $search,
				'status' => $arrayData['status']
			);
			$data['permohonan'] = $this->Balasan_model->getPermohonanWithStatus($searchArray, $pagination['per_page'], $data['start']);

			//pagination
			$pagination['total_rows'] = $this->Balasan_model->countPermohonanWithStatus($searchArray);
			$pagination['base_url'] = 'http://localhost/web-pusdiklat/pusat/index';
			$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
			$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];
			//pagination

			// else if untuk pencarian berdasarkan bulan
		} else if ($this->input->get('tanggal_permohonan')) {
			$searchMonth = $this->input->get('tanggal_permohonan');
			$searchArray = array(
				'tanggal_permohonan' => $searchMonth,
				'status' => $arrayData['status']
			);
			$data["permohonan"] = $this->Balasan_model->searchByMothExceptPending($searchArray);
			//else untuk menampilkan semua data kecuali 'Menunggu Verifikasi'
		} else {
			$searchArray = array(
				'nama_pelamar' => '',
				'tanggal_permohonan' => '',
				'status' => $arrayData['status'],
			);
			$data['permohonan'] = $this->Balasan_model->getPermohonanWithStatus($searchArray, $pagination['per_page'], $data['start']);

			//pagination
			$pagination['total_rows'] = $this->Balasan_model->countPermohonanWithStatus($searchArray);
			$pagination['base_url'] = 'http://localhost/web-pusdiklat/pusat/index';
			$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
			$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];
			//pagination

		}
		$data['count'] = $this->Balasan_model->countBalasanSurat();

		//membuat pagination
		$this->pagination->initialize($pagination);

		$this->loadTemplate($data);
	}

	public function approval()
	{
		$data['menu'] = 'menu_approvement';
		$arrayData = array(
			'status' => 'Disetujui'
		);
		//pagination init
		$pagination['per_page'] = 2;
		$data['start'] = $this->uri->segment(3);


		// aksi untuk liat data yang telah disetujui
		// aksi untuk pencarian by nama
		if ($this->input->get('pelamar')) {
			$search = $this->input->get('pelamar');
			$searchArray = array(
				'nama_pelamar' => $search,
				'status' => $arrayData['status']
			);
			$data['approval'] = $this->Balasan_model->getDataWithStatus($searchArray, $pagination['per_page'], $data['start']);

			//pagination
			$pagination['total_rows'] = $this->Balasan_model->countDataWithStatus($searchArray);
			$pagination['base_url'] = 'http://localhost/web-pusdiklat/pusat/approval';
			$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
			$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];
			//pagination


			// else if untuk pencarian berdasarkan bulan

		} else if ($this->input->get('tanggal_permohonan')) {
			$searchMonth = $this->input->get('tanggal_permohonan');
			
			$searchArray = array(
				'tanggal_permohonan' => $searchMonth,
				'status' => $arrayData['status']
			);
			$data["approval"] = $this->Balasan_model->searchByMoth($searchArray);
			//else untuk menampilkan semua data dengan status = Disetujui
		} else {
			$searchArray = array(
				'nama_pelamar' => '',
				'tanggal_permohonan' => '',
				'status' => $arrayData['status'],
			);
			$data['approval'] = $this->Balasan_model->getDataWithStatus($searchArray, $pagination['per_page'], $data['start']);

			//pagination
			$pagination['total_rows'] = $this->Balasan_model->countDataWithStatus($searchArray);
			$pagination['base_url'] = 'http://localhost/web-pusdiklat/pusat/approval';
			$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
			$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];
			//pagination

		}
		$data['count'] = $this->Balasan_model->countBalasanSurat();

		//membuat pagination
		$this->pagination->initialize($pagination);

		$this->loadTemplate($data);
	}

	public function rejection()
	{
		$data['menu'] = 'menu_rejection';
		$arrayData = array(
			'status' => 'Ditolak'
		);

		//pagination initial
		$pagination['per_page'] = 2;
		$data['start'] = $this->uri->segment(3);

		// aksi untuk pencarian by nama
		if ($this->input->get('pelamar')) {
			$search = $this->input->get('pelamar');
			$searchArray = array(
				'nama_pelamar' => $search,
				'status' => $arrayData['status']
			);
			//$data["reject"] = $this->Balasan_model->searchAll($searchArray);
			$data['reject'] = $this->Balasan_model->getDataWithStatus($searchArray, $pagination['per_page'], $data['start']);

			//pagination
			$pagination['total_rows'] = $this->Balasan_model->countDataWithStatus($searchArray);
			$pagination['base_url'] = 'http://localhost/web-pusdiklat/pusat/rejection';
			$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
			$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];
			//pagination

			// else if untuk pencarian berdasarkan bulan
		} else if ($this->input->get('tanggal_permohonan')) {
			$searchMonth = $this->input->get('tanggal_permohonan');
			$searchArray = array(
				'tanggal_permohonan' => $searchMonth,
				'status' => $arrayData['status']
			);
			$data["reject"] = $this->Balasan_model->searchByMoth($searchArray);
			// else untuk menampilkan semua data dengan status = Disetujui
		} else {
			$searchArray = array(
				'nama_pelamar' => '',
				'tanggal_permohonan' => '',
				'status' => $arrayData['status'],
			);
			$data['reject'] = $this->Balasan_model->getDataWithStatus($searchArray, $pagination['per_page'], $data['start']);

			//pagination
			$pagination['total_rows'] = $this->Balasan_model->countDataWithStatus($searchArray);
			$pagination['base_url'] = 'http://localhost/web-pusdiklat/pusat/rejection';
			$pagination['suffix'] = '?' . http_build_query($_GET, '', "&");
			$pagination['first_url'] = $pagination['base_url'] . $pagination['suffix'];
			//pagination

		}
		$data['count'] = $this->Balasan_model->countBalasanSurat();

		//membuat pagination
		$this->pagination->initialize($pagination);

		$this->loadTemplate($data);
	}

	public function formsurat($id)
	{
		$data['menu'] = 'form_surat';
		$arrayData = array(
			'status' => 'Menunggu Verifikasi',
		);
		$data['detail'] = $this->Balasan_model->getDataById($id);
		$data['count'] = $this->Balasan_model->countBalasanSurat($arrayData);
		$this->loadTemplate($data);
	}

	public function simpanData()
	{
		$setData =  array(
			'id_surat_permohonan' => $this->input->post('id_surat_permohonan'),
			'tgl_surat' => date('Y-m-d'),
			'perihal' => $this->input->post('perihal'),
			'no_surat_balasan' => $this->input->post('no_surat_balasan'),
			'nama_surat_balasan' => null,
			'lampiran' => $this->input->post('lampiran'),
			'kepada' => $this->input->post('kepada'),
			'alasan' => $this->input->post('alasan'),
			'jangka_waktu' => $this->input->post('jangka_waktu'),
			'tembusan1' => $this->input->post('tembusan1'),
			'tembusan2' => $this->input->post('tembusan2'),
			'tembusan3' => $this->input->post('tembusan3'),
			'tembusan4' => $this->input->post('tembusan4'),
			'tembusan5' => $this->input->post('tembusan5'),
			'is_uploaded' => 'FALSE'
		);
		$this->Balasan_model->insertSuratBalasan($setData);
		redirect('pusat/index');
	}
	public function uploadSurat()
	{
		$id = $this->input->post('id_surat_balasan');
		$file_surat_balasan = $_FILES['nama_surat_balasan']['name'];
		if ($file_surat_balasan == "") {
			redirect('pusat/index');
		} else {
			// upload surat balasan
			$config['upload_path'] = './folder_Surat_Jawaban/';
			$config['allowed_types'] = 'pdf';
			$config['file_name'] = date('y-m-d') . '_' . $file_surat_balasan;
			$this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('nama_surat_balasan');
			$nama_file_surat_balasan = $this->upload->data('file_name');
			$arrayData = array(
				'nama_surat_balasan' => $nama_file_surat_balasan,
				'is_uploaded' => 'TRUE'
			);
			$whereId = array(
				'id_surat_balasan' => $id
			);


			$this->Balasan_model->updateFileIsUpload($whereId, $arrayData, 'surat_balasan');
			redirect('pusat/index');
		}
	}

	public function downloadKelengkapanBerkas($jenis, $id)
	{
		$this->load->helper('download');
		$data = $this->Balasan_model->getDataByIdForSurat($id);
		if ($jenis == 'khs') {
			force_download('folder_KHS/' . $data['nama_file_khs'], NULL);
		} else if ($jenis == 'cv') {
			force_download('folder_CV/' . $data['nama_file_cv'], NULL);
		} else if ($jenis == 'suratPermohonan') {
			force_download('folder_nama_surat_balasan/' . $data['nama_file_nama_surat_balasan'], NULL);
		}
	}

	public function downloadSuratDisetujui($id)
	{
		$pdf = new MYPDF('p', 'mm', 'A4', true, 'UTF-8', false);
		$data = $this->Balasan_model->downloadSurat($id);
		$pdf->AddPage();
		foreach ($data as $data_surat) {
			$image_file = K_PATH_IMAGES . 'logo_perpusnas.png';
			$pdf->Image($image_file, 87, 2, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			$pdf->Ln(37);
			$pdf->SetFont('times', '', 11);
			//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
			$pdf->Cell(155, 1, "Nomor     : " . $data_surat['no_surat_balasan'], 0, 0,);
			$pdf->Cell(34, 1, indo_date($data_surat['tgl_surat']), 0, 1,);
			$pdf->Cell(189, 1, "Lampiran : " . $data_surat['lampiran'], 0, 1,);
			$pdf->Cell(189, 1, "Hal           : " . $data_surat['perihal'], 0, 1,);

			$pdf->Ln(7);
			$pdf->Cell(189, 1, "Kepada", 0, 1,);
			$pdf->Cell(189, 1, "Yth.          : " . $data_surat['kepada'], 0, 1,);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "" . $data_surat['universitas'], 0, 1,);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "Di Tempat", 0, 1,);

			$pdf->Ln(7);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "Dengan Hormat,", 0, 1,);

			$pdf->Ln(5);
			// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
			$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(160, 1, "Menindaklanjuti Surat Saudara Nomor " . $data_surat['no_nama_surat_balasan'] . " tanggal " . indo_date($data_surat['tanggal_permohonan']) . " dengan ini disampaikan bahwa kami bersedia menerima mahasiswa Saudara yaitu:", 0, 'J', 0, 0, '', '', true, 0, true, true, 40);
			$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);

			$pdf->Ln(7);
			$pdf->SetFont('times', 'B', 10);
			$pdf->Cell(22, 10, "", 0, 0, 'C');
			$pdf->Cell(25, 10, "Nama", 1, 0, 'C');
			$pdf->Cell(25, 10, "NIM", 1, 0, 'C');
			$pdf->Cell(50, 10, "Program Studi", 1, 0, 'C');
			$pdf->Cell(25, 10, "Email", 1, 0, 'C');
			$pdf->Cell(25, 10, "No. HP", 1, 0, 'C');
			$pdf->Cell(17, 10, "", 0, 1, 'C');

			$pdf->SetFont('times', ' ', 9);
			$pdf->MultiCell(22, 10, "", 0, 'C', 0, 0, '', '', true, 0, false, true, 10);
			$pdf->MultiCell(25, 10, $data_surat['nama_pelamar'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['nim'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(50, 10, $data_surat['prodi'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['email'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['no_telpon'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(17, 10, "", 0, 'C', 0, 1, '', '', true, 0, false, true, 10);
		}

		$pdf->SetFont('times', ' ', 11);
		$pdf->Ln(3);
		$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
		$pdf->MultiCell(160, 1, "Untuk melakukan program magang di " . $data_surat['nama_unit'] . ", Perpustakaan Nasional RI selama " . $data_surat['jangka_waktu'] . "." . $data_surat['alasan'] . "", 0, 'J', 0, 0, '', '', true, 0, true, true, 40);
		$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);

		$pdf->Ln(20);
		$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
		$pdf->MultiCell(170, 1, "Demikian kami sampaikan, atas perhatian dan kerjasama yang baik kami ucapkan terimakasih.", 0, 'J', 0, 1, '', '', true, 0, true, true, 40);

		$pdf->Ln(7);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'Plt. Kepala Pusat Pendidikan dan Pelatiahan', 0, 1);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'Perpustakaan Nasional RI,', 0, 1);
		$pdf->Ln(20);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'Drs. Y. Yahyono, S.IP., M.Si', 0, 1);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'NIP. 19631110 199103 1 001', 0, 1);

		$pdf->Ln(7);
		$pdf->Cell(189, 1, 'Tembusan :', 0, 1);
		if (!empty($data_surat['tembusan1'])) {
			$pdf->Cell(189, 1, '1. ' . $data_surat['tembusan1'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && empty($data_surat['tembusan1'])) {
			$pdf->Cell(189, 1, '1. ' . $data_surat->tembusan5, 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan2'])) {
			$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan2'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan1']) && empty($data_surat['tembusan2'])) {
			$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan3'])) {
			$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan3'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan2']) && empty($data_surat['tembusan3'])) {
			$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan4'])) {
			$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan4'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan3']) && empty($data_surat['tembusan4'])) {
			$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan4']) && !empty($data_surat['tembusan5'])) {
			$pdf->Cell(189, 1, '5. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}


		$pdf->Output('Surat_Jawaban_Magang_' . $data_surat['nama_pelamar'] . '.pdf', 'I');
	}

	public function downloadSuratDitolak($id)
	{
		$pdf = new MYPDF('p', 'mm', 'A4', true, 'UTF-8', false);
		$data = $this->Balasan_model->downloadSurat($id);
		$pdf->AddPage();
		foreach ($data as $data_surat) {
			$image_file = K_PATH_IMAGES . 'logo_perpusnas.png';
			$pdf->Image($image_file, 87, 2, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			$pdf->Ln(37);
			$pdf->SetFont('times', '', 11);
			//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
			$pdf->Cell(155, 1, "Nomor     : " . $data_surat['no_surat_balasan'], 0, 0,);
			$pdf->Cell(34, 1, indo_date(date('Y-m-d')), 0, 1,);
			$pdf->Cell(189, 1, "Lampiran : " . $data_surat['lampiran'], 0, 1,);
			$pdf->Cell(189, 1, "Hal           : " . $data_surat['perihal'], 0, 1,);

			$pdf->Ln(7);
			$pdf->Cell(189, 1, "Kepada", 0, 1,);
			$pdf->Cell(189, 1, "Yth.          : " . $data_surat['kepada'], 0, 1,);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "" . $data_surat['universitas'], 0, 1,);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "Di Tempat", 0, 1,);

			$pdf->Ln(7);
			$pdf->Cell(19, 1, "", 0, 0,);
			$pdf->Cell(170, 1, "Dengan Hormat,", 0, 1,);

			$pdf->Ln(5);
			$pdf->SetFont('times', ' ', 11);
			// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
			$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
			$pdf->MultiCell(160, 1, "Menindaklanjuti Surat Saudara Nomor " . $data_surat['no_nama_surat_balasan'] . " tanggal " . indo_date($data_surat['tanggal_permohonan']) . " dengan ini disampaikan bahwa kami bersedia menerima mahasiswa Saudara yaitu:", 0, 'J', 0, 0, '', '', true, 0, true, true, 40);
			$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);

			$pdf->Ln(7);
			$pdf->SetFont('times', 'B', 10);
			$pdf->Cell(22, 10, "", 0, 0, 'C');
			$pdf->Cell(25, 10, "Nama", 1, 0, 'C');
			$pdf->Cell(25, 10, "NIM", 1, 0, 'C');
			$pdf->Cell(50, 10, "Program Studi", 1, 0, 'C');
			$pdf->Cell(25, 10, "Email", 1, 0, 'C');
			$pdf->Cell(25, 10, "No. HP", 1, 0, 'C');
			$pdf->Cell(17, 10, "", 0, 1, 'C');

			$pdf->SetFont('times', ' ', 9);
			$pdf->MultiCell(22, 10, "", 0, 'C', 0, 0, '', '', true, 0, false, true, 10);
			$pdf->MultiCell(25, 10, $data_surat['nama_pelamar'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['nim'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(50, 10, $data_surat['prodi'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['email'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(25, 10, $data_surat['no_telpon'], 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
			$pdf->MultiCell(17, 10, "", 0, 'C', 0, 1, '', '', true, 0, false, true, 10);
		}

		$pdf->SetFont('times', ' ', 11);
		$pdf->Ln(3);
		$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
		$pdf->MultiCell(160, 1, "Untuk melakukan Praktik Kerja Lapangan (PKL) di Perpustakaan Nasional RI. " . $data_surat['alasan'], 0, 'J', 0, 0, '', '', true, 0, true, true, 40);
		$pdf->MultiCell(10, 1, "", 0, 'J', 0, 1, '', '', true, 0, false, true, 40);

		$pdf->Ln(20);
		$pdf->MultiCell(170, 1, "", 0, 'L', 0, 1, '', '', true);
		$pdf->MultiCell(170, 1, "", 0, 'L', 0, 1, '', '', true);
		$pdf->MultiCell(170, 1, "", 0, 'L', 0, 1, '', '', true);
		$pdf->MultiCell(19, 1, "", 0, 'J', 0, 0, '', '', true, 0, false, true, 40);
		$pdf->MultiCell(170, 1, "Demikian kami sampaikan, atas perhatian dan kerjasama yang baik kami ucapkan terimakasih.", 0, 'J', 0, 1, '', '', true, 0, true, true, 40);

		$pdf->Ln(7);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'Plt. Kepala Pusat Pendidikan dan Pelatiahan', 0, 1);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'Perpustakaan Nasional RI,', 0, 1);
		$pdf->Ln(20);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'Drs. Y. Yahyono, S.IP., M.Si', 0, 1);
		$pdf->Cell(94, 1, '', 0, 0);
		$pdf->Cell(95, 1, 'NIP. 19631110 199103 1 001', 0, 1);

		$pdf->Ln(7);
		$pdf->Cell(189, 1, 'Tembusan :', 0, 1);
		if (!empty($data_surat['tembusan1'])) {
			$pdf->Cell(189, 1, '1. ' . $data_surat['tembusan1'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && empty($data_surat['tembusan1'])) {
			$pdf->Cell(189, 1, '1. ' . $data_surat->tembusan5, 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan2'])) {
			$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan2'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan1']) && empty($data_surat['tembusan2'])) {
			$pdf->Cell(189, 1, '2. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan3'])) {
			$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan3'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan2']) && empty($data_surat['tembusan3'])) {
			$pdf->Cell(189, 1, '3. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan4'])) {
			$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan4'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan5']) && !empty($data_surat['tembusan3']) && empty($data_surat['tembusan4'])) {
			$pdf->Cell(189, 1, '4. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}

		if (!empty($data_surat['tembusan4']) && !empty($data_surat['tembusan5'])) {
			$pdf->Cell(189, 1, '5. ' . $data_surat['tembusan5'], 0, 1);
		} else {
		}


		$pdf->Output('Surat_Jawaban_Magang_' . $data_surat['nama_pelamar'] . '.pdf', 'I');
	}
	
}
