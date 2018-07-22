<?php

    Class Daftarakun_model extends CI_Model{

        public function __construct(){
        
            parent::__construct();
        
        }

        public function cekUsername($username){

            // cek jika username ada
            $this->db->select('*');
            $this->db->from('login');
            $this->db->where('username', $username);
            $hasil = $this->db->get()->row_array();

            // jika ada
            if($hasil){
                return true;
            }

            // jika tdk ada
            return false;

        }

        public function simpan($dataDaftarAkun){

            // cek ketersediaan username
            // jika ada
            if(!$this->cekUsername($dataDaftarAkun['username'])){

                // input data ke db
                $this->db->insert('login', $dataDaftarAkun);
                return true;
            }

            return false;

        }

        


    } // => end of Class