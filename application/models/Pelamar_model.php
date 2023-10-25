<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelamar_model extends CI_Model
{
    public function getDataPelamar()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('pelamar', ['email' => $email])->row_array();
    }

    public function getDataPelamarById($id)
    {
        return $this->db->get_where('pelamar', ['id' => $id])->row_array();
    }

    public function getDataPelamarByNama($nama)
    {
        // return $this->db->get_where('pelamar', ['nama_pelamar' => $nama])->row_array();
        $this->db->select('*');
        $this->db->from('pelamar');
        $this->db->like('nama_pelamar', $nama);
        return $this->db->get()->result_array();
    }

    public function getAllUnitKerja()
    {
        return $this->db->get('unit_kerja')->result_array();
    }

    public function getUnitKerjaById($id)
    {
        return $this->db->get_where('unit_kerja', ['id' => $id])->row_array();
    }

    public function updateDataPelamar($email, $data)
    {
        $this->db->where('email', $email);
        $this->db->update('pelamar', $data);
    }

    public function inputSuratPermohonan($idUnitKerja, $idPelamar, $nama_file_surat_permohonan)
    {
        $data = [
            "id_unit" => $idUnitKerja,
            "id_pelamar" => $idPelamar,
            "no_surat_permohonan" => htmlspecialchars($this->input->post('no_surat', true)),
            "nama_file_surat_permohonan" => $nama_file_surat_permohonan,
            "tanggal_permohonan" => date('Y-m-d H:i:s'),
            "status" => "Menunggu verifikasi"
        ];
        $this->db->insert('surat_permohonan', $data);

        $idSuratPermohonan = $this->db->get_where('surat_permohonan', ['id_pelamar' => $idPelamar, 'id_unit' => $idUnitKerja])->row_array()['id_permohonan'];

        $this->db->insert('surat_balasan', ['id_surat_permohonan' => $idSuratPermohonan]);
    }

    public function getListUnitDilamar($idPelamar)
    {
        $this->db->select('id_unit');
        $this->db->where('id_pelamar', $idPelamar);
        $result = $this->db->get('surat_permohonan')->result_array();

        $listUnitTerdaftar = [];
        foreach ($result as $r) {
            $listUnitTerdaftar[] = $r['id_unit'];
        }
        return $listUnitTerdaftar;
    }

    public function getStatusPendaftaran($idPelamar)
    {
        $this->db->select("*");
        $this->db->from("surat_permohonan");
        $this->db->join('unit_kerja', 'surat_permohonan.id_unit = unit_kerja.id', 'FULL');
        $this->db->where('id_pelamar', $idPelamar);
        return $this->db->get()->result_array();
    }

    // public function deleteFileNameById($jenis, $id)
    // {
    //     if ($jenis == 'suratPermohonan') {
    //         $this->db->where('id', $id);
    //         $this->db->update('pelamar', ['nama_file_surat_permohonan' => null]);
    //     } else 
    //     if ($jenis == 'khs') {
    //         $this->db->where('id', $id);
    //         $this->db->update('pelamar', ['nama_file_khs' => null]);
    //     } else if ($jenis == 'cv') {
    //         $this->db->where('id', $id);
    //         $this->db->update('pelamar', ['nama_file_cv' => null]);
    //     }
    // }

    public function updateBerkas($jenis, $id, $namaBerkas)
    {
        // if ($jenis == 'suratPermohonan') {
        //     $this->db->where('id', $id);
        //     $this->db->update('pelamar', ['nama_file_surat_permohonan' => $namaBerkas]);
        // } else 
        if ($jenis == 'khs') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_khs' => $namaBerkas]);
        } else if ($jenis == 'cv') {
            $this->db->where('id', $id);
            $this->db->update('pelamar', ['nama_file_cv' => $namaBerkas]);
        }
    }

    public function updateFotoProfil($id, $namaFoto)
    {
        $this->db->where('id', $id);
        $this->db->update('pelamar', ['foto_profil' => $namaFoto]);
    }

}
