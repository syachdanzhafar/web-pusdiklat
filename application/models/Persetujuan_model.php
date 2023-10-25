<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_model extends CI_Model
{
	// fungsi untuk melihat data lamaran dengan status (Menunggu Verifikasi, Disetujui, Ditolak)
	public function getDataWithStatus($data, $limit, $start)
	{
		// Joining table surat_permohonan, pelamar, unit_kerja
		if ($data['nama_pelamar']) {
			$this->db->select('*');
			$this->db->from('surat_permohonan');
			$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
			$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
			$this->db->where('id_unit', $data['id_unit']);
			$this->db->where('status', $data['status']);
			$this->db->like('nama_pelamar', $data['nama_pelamar']);
			$this->db->limit($limit, $start);
			$this->db->order_by('tanggal_permohonan', 'DESC');


			return $this->db->get()->result_array();
		} else {
			$this->db->select('*');
			$this->db->from('surat_permohonan');
			$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
			$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
			$this->db->where('id_unit', $data['id_unit']);
			$this->db->where('status', $data['status']);
			$this->db->limit($limit, $start);
			$this->db->order_by('tanggal_permohonan', 'DESC');

			return $this->db->get()->result_array();
		}
	}
	public function getDataWithStatusSearch($data, $keyword)
	{
		// Joining table surat_permohonan, pelamar, unit_kerja
		$this->db->select('*');
		$this->db->from('surat_permohonan');
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('id_unit', $data['id_unit']);
		$this->db->where('status', $data['status']);
		$this->db->like('nama_pelamar', $keyword);
		return $this->db->get()->result_array();
	}
	public function countDataWithStatus($data)
	{
		if ($data['nama_pelamar']) {
			$this->db->select('*');
			$this->db->from('surat_permohonan');
			$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
			$this->db->where('id_unit', $data['id_unit']);
			$this->db->where('status', $data['status']);
			$this->db->like('nama_pelamar', $data['nama_pelamar']);
			$this->db->order_by('tanggal_permohonan', 'DESC');

			return $this->db->count_all_results();
		} else {
			$this->db->where('id_unit', $data['id_unit']);
			$this->db->where('status', $data['status']);
			$this->db->order_by('tanggal_permohonan', 'DESC');
			return $this->db->count_all_results('surat_permohonan');
		}
	}
	// fungsi untuk melihat jumlah data yang masih menunggu verifikasi
	public function getCountDataPending($data)
	{
		$this->db->where('id_unit', $data['id_unit']);
		$this->db->where('status', 'Menunggu Verifikasi');
		return $this->db->count_all_results('surat_permohonan');
	}

	public function getDataById($id)
	{
		$this->db->select("*");
		$this->db->from("surat_permohonan");
		$this->db->join('pelamar', 'surat_permohonan.id_pelamar = pelamar.id', 'LEFT');
		$this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'LEFT');
		$this->db->where('id_permohonan', $id);
		return $this->db->get()->result_array();
	}
	// fungsi untuk mengubah status data lamaran
	public function updateVerifikasi($id, $data, $table)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	}
	public function getCountData($data)
	{
		$this->db->where('id_unit', $data['id_unit']);
		$this->db->where('status', $data['status']);
		return $this->db->count_all_results('surat_permohonan');
	}
}
