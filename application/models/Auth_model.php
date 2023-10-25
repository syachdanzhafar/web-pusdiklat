<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function validateLogin($email, $password)
    {
        $result = $this->db->get_where('login', ['email' => $email])->row_array();
        if ($result != null) {
            if (password_verify($password, $result['password'])) {
                return 'berhasil';
            } else {
                return 'wrongPass';
            }
        } else {
            return 'emailInv';
        }
    }

    public function getDataLoginByEmail($email)
    {
        return $this->db->get_where('login', ['email' => $email])->row_array();
    }

    public function insertActivationData($data)
    {
        $this->db->insert('aktivasi', $data);
    }

    public function kirimEmail($type, $token, $email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ci3emailsender@gmail.com',
            'smtp_pass' => 'kljh89&Y(*bh89gh967gG5fytGOIuhguonu986rt58uYVGB&*(^G86g*&^G87tf6B(*VY^',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('ci3emailsender@gmail.com', 'CI3 Email Sender');
        $this->email->to($email);

        if ($type == 'aktivasi') {
            //send email
            $this->email->subject('Aktivasi Akun');
            $this->email->message('Klik tautan berikut untuk mengaktifkan akun anda: <a href="' . base_url('auth/verifikasi') . '?email=' . urlencode($email) . '&token=' . $token . '">Aktivasi Sekarang!</a>');
        } else if ($type == 'forgot_password') {
            //send email
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password: <a href="' . base_url('auth/resetpassword') . '?email=' . urlencode($email) . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function verifikasiAkun($email, $token)
    {
        $result = $this->db->get_where('aktivasi', ['email' => $email])->row_array();
        if ($result != null) {
            if ($result['token'] == $token) {
                $dataPelamar = [
                    "nama_pelamar" => $result['nama'],
                    "email" => $result['email'],
                    "universitas" => $result['universitas'],
                    "fakultas" => $result['fakultas'],
                    "foto_profil" => 'default.jpg'
                ];
                $this->db->insert('pelamar', $dataPelamar);

                $dataLogin = [
                    "email" => $result['email'],
                    "password" => $result['password'],
                    "role_id" => 3
                ];
                $this->db->insert('login', $dataLogin);

                $this->db->delete('aktivasi', ['email' => $email]);
                return 'berhasil';
            } else {
                return 'tokenInv';
            }
        } else {
            return 'emailInv';
        }
    }
}
