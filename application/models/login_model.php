<?php

    Class Login_model extends CI_Model{

        public function __construct(){

            parent::__construct();

        }

        public function cekDataLogin($dataLogin){

            $this->db->select('*');
            $this->db->from('login');
            $this->db->where('username', $dataLogin['username']);
            $this->db->where('password', $dataLogin['password']);
            $hasil = $this->db->get()->row_array();
            // jika valid
            if(!empty($hasil)){
                return true;
            }
            // jika tidak valid
            return false;

        } // => end of function cekDataLogin
        /////////////////////////////////////////////

        public function simpanLog($dataLogin){

            // hapus index password
            // karna tidak diperlukan
            unset($dataLogin['password']);
            $this->db->insert('log', $dataLogin);
            return true;

        } // => end of function simpanLog
        ////////////////////////////////////////////

        public function ambilDataLogin($dataLogin){

            $this->db->select('*');
            $this->db->from('login');
            $this->db->where('username', $dataLogin['username']);
            $hasil = $this->db->get()->row_array();
            return $hasil;

        } // => end of functon ambilDataLogin
        ////////////////////////////////////////////

        public function login($dataLogin){

            // validasi data
            // jika valid
            if($this->cekDataLogin($dataLogin)){

                // input log ke db
                $dataLogin['status'] = 'berhasil';
                $this->simpanLog($dataLogin);
                
                // ambil data login buat session
                $hasil = $this->ambilDataLogin($dataLogin);
                return $hasil;
            }

            // jika tidak valid
            $dataLogin['status'] = 'gagal';
            $this->simpanLog($dataLogin);
            return false;

        } // => function login
        ///////////////////////////////////////////

    } // => end of class 