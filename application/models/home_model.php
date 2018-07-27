<?php

    Class Home_model extends CI_Model{

        public function __construct(){

            parent::__construct();

        }

        public function ambilProduk($keywords=null, $kategori=null){

            $this->db->select('*');
            $this->db->from('produk');

            if($keywords || $kategori){
                $this->db->like('nama_produk', $keywords);
                $this->db->like('kode_kategory', $kategori);
            }

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

        public function ambilKategori(){

            $this->db->select('*');
            $this->db->from('kategori');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        }

    } // end of class