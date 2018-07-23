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

        public function tambahPembelian($dataPembelian){

            $this->db->insert('pembelian', array(
                'username' => $dataPembelian['username'],
                'metode_packing' => $dataPembelian['packing'],
                'metode_pengiriman' => $dataPembelian['pengiriman'],
                'namalengkap' => $dataPembelian['namalengkap'],
                'telepon' => $dataPembelian['telepon'],
                'alamat' => $dataPembelian['alamat']
            ));

            // ambil kode pembelian yang bru diinput
            $kodePembelianBaruDiinput = $this->db->insert_id();

            // insert pembelian detail
            // loop ke banyak item
            foreach($dataPembelian['keranjang'] as $pembelianDetail){

                $this->tambahPembelianDetail($kodePembelianBaruDiinput, $pembelianDetail['jumlah_produk'], $pembelianDetail['kode_produk']);

            } // end of loop item

            return true;

        } // end of function tambahPembelian

        public function tambahPembelianDetail($kodePembelian, $jumlahItem, $kodeProduk){

            $this->db->insert('pembelian_detail', array(
                'kode_pembelian' => $kodePembelian,
                'kode_produk' => $kodeProduk,
                'jumlah_item_pembelian_detail' => $jumlahItem
            ));

        } // end of function tambahPembelianDetail

    } // end of class