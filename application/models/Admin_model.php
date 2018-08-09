<?php

    class Admin_model extends CI_Model{

        public function __contruct(){

            parent::__construct();

        }

        public function ambilDataPembayaran($kodePembayaran=null){

            $hasil = array();

            $this->db->select('*');
            $this->db->from('pembayaran');
            // jika ada kode pembayaran
            if($kodePembayaran){
                $this->db->where('kode_pembayaran', $kodePembayaran);
                $hasil = $this->db->get()->row_array();
            }
            // jika tidak ada kode pembayaran
            else{
                $hasil = $this->db->get()->result_array();
            }

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

        public function pembayaranValid($kodePembayaran){

            // update pembayaran
            $this->db->set(
                array('status' => 1)
            );
            $this->db->where('kode_pembayaran', $kodePembayaran);
            $this->db->update('pembayaran');

            // update pebelian
            // ambil kode pembelian
            $kodePembelian = $this->ambilDataPembayaran($kodePembayaran);
            $kodePembelian = $kodePembelian['kode_pembelian'];

            $this->db->set(
                array('status' => 1)
            );
            $this->db->where('kode_pembelian', $kodePembelian);
            $this->db->update('pembelian');

            return true;

        } // end of function pembayaranValid

        public function pembayaranTidakValid($kodePembayaran){

            $this->db->set(
                array('status' => 3)
            );
            $this->db->where('kode_pembayaran', $kodePembayaran);
            $this->db->update('pembayaran');

            return true;

        } // end of function pembayaranValid

        public function ambilKategori(){

            $this->db->select('*');
            $this->db->from('kategori');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilKategori

        public function produkTambah($dataProduk){

            $this->db->insert('produk', $dataProduk);

            // ambil kode_produk baru diinput
            $kodeProduk = $this->db->insert_id();

            // input stok
            $this->db->insert('stok', array(
                'kode_produk' => $kodeProduk,
                'jumlah_stok' => 0 
            ));

            return true;

        } // end of function produkTambah

    }