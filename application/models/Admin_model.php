<?php

    class Admin_model extends CI_Model{

        public function __contruct(){

            parent::__construct();

        }

        public function ambilDataPembayaran(){

            $this->db->select('*');
            $this->db->from('pembayaran');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilDataPembayaran

        public function ambilDataProduk(){

            $this->db->select('*');
            $this->db->from('produk');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilDataProduk

        public function ambilDataStok(){

            $this->db->select('*');
            $this->db->from('stok');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilDataStok

    }