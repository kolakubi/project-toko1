<?php

    Class Pemilik_model extends CI_Model{

        public function __contruct(){

            parent::__construct();

        } // end of contruct

        public function ambilDataPembayaran($dataAmbil){

            $this->db->select('*');
            $this->db->from('pembelian');
            $this->db->join('pembayaran', 'pembayaran.kode_pembelian = pembelian.kode_pembelian');
            $this->db->where('pembelian.tanggal_pembelian >=', $dataAmbil['dari']);
            $this->db->where('pembelian.tanggal_pembelian <=', $dataAmbil['sampai']);
            $hasil = $this->db->get()->result_array();

            return $hasil;

        } // end of function ambilDataPembayaran

        public function ambilDataStok($kodeStok=null){

            $hasil = array();

            $this->db->select('*');
            $this->db->from('stok');
            $this->db->join('produk', 'produk.kode_produk = stok.kode_produk');
            // jika ada kodeStok
            if($kodeStok){
                $this->db->where('kode_stok', $kodeStok);
                $hasil = $this->db->get()->row_array();
            }
            else{
                $hasil = $this->db->get()->result_array();
            }
            
            return $hasil;

        } // end of function ambilDataStok

    } // end of CI_Model