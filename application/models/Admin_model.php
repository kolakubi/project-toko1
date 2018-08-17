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

        public function ambilDataProduk($kodeProduk=null){

            $hasil = array();

            $this->db->select('*');
            $this->db->from('produk');
            // jika ada kode produk
            if($kodeProduk){
                $this->db->where('kode_produk', $kodeProduk);
                $hasil = $this->db->get()->row_array();
            }
            // jika tdk ada
            else{
                $hasil = $this->db->get()->result_array();
            }
            return $hasil;

        } // end of function ambilDataProduk

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

        public function stokUbah($kodeStok, $stok){

            $this->db->set(array('jumlah_stok' => $stok));
            $this->db->where('kode_stok', $kodeStok);
            $this->db->update('stok');

            return true;

        } // end of stokUbah

        public function pembayaranValid($kodePembayaran){

            // ambil kode pembelian
            $kodePembelian = $this->ambilDataPembayaran($kodePembayaran);
            $kodePembelian = $kodePembelian['kode_pembelian'];
            
            // ambil produk dari pembelian_detail
            $produk = $this->ambilPembelianDetailJoinStok($kodePembelian);  

            // loop produk, cek apakah jumlah melebihi stok
            foreach($produk as $pro){
                if($pro['jumlah_item_pembelian_detail']> $pro['jumlah_stok']){
                    return false;
                }
                else{
                    // update stok
                    $this->stokUbah($pro['kode_stok'], $pro['jumlah_stok']-$pro['jumlah_item_pembelian_detail']);
                }
            }

            // update pembayaran
            $this->db->set(
                array('status' => 1)
            );
            $this->db->where('kode_pembayaran', $kodePembayaran);
            $this->db->update('pembayaran');

            // update pembelian
            $this->db->set(
                array('status' => 1)
            );
            $this->db->where('kode_pembelian', $kodePembelian);
            $this->db->update('pembelian');

            return true;

        } // end of function pembayaranValid

        public function ambilPembelianDetailJoinStok($kodePembelian){

            $this->db->select('*');
            $this->db->from('pembelian_detail');
            $this->db->join('stok', 'pembelian_detail.kode_produk = stok.kode_produk');
            $this->db->where('pembelian_detail.kode_pembelian', $kodePembelian);
            $hasil = $this->db->get()->result_array();

            return $hasil;

        } // end of ambilPembelianDetailJoinStok

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

        public function produkUbah($kodeProduk, $dataProduk){

            $this->db->set($dataProduk);
            $this->db->where('kode_produk', $kodeProduk);
            $this->db->update('produk');

            return true;

        } // end of function produkUbah

    }