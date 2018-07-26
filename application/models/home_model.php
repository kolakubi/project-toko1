<?php

    Class Home_model extends CI_Model{

        public function __construct(){

            parent::__construct();

        }

        public function ambilProduk(){

            $this->db->select('*');
            $this->db->from('produk');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilProduk

        public function ambilProdukDanStok($kodeProduk){

            $this->db->select('*');
            $this->db->from('produk');
            $this->db->join('stok', 'stok.kode_produk = produk.kode_produk');
            $this->db->where('produk.kode_produk', $kodeProduk);
            $hasil = $this->db->get()->row_array();
            return $hasil;

        } // end of function ambilProdukDanStok

    } // end of class