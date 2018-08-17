<?php

    class Pelanggan_model extends CI_Model{

        public function __construct(){

            parent::__construct();

        }

        public function ambilPembelian($username){

            $this->db->select('*');
            $this->db->from('pembelian');
            $this->db->join('pembayaran', 'pembayaran.kode_pembelian = pembelian.kode_pembelian');
            $this->db->where('pembelian.username', $username);
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // => end of function ambilPembelian

        public function pembelianDetailAmbil($kodePembelian){

            $this->db->select('*');
            $this->db->from('pembelian');
            $this->db->join('pembelian_detail', 'pembelian_detail.kode_pembelian = pembelian.kode_pembelian');
            $this->db->join('produk', 'produk.kode_produk = pembelian_detail.kode_produk');
            $this->db->where('pembelian_detail.kode_pembelian', $kodePembelian);
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function pembelanDetailAmbil

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

                // insert pembelian_detail 1 per 1
                $this->tambahPembelianDetail($kodePembelianBaruDiinput, $pembelianDetail['jumlah_produk'], $pembelianDetail['kode_produk']);

            }; // end of loop item
            /////////////////////////////////////////////////////

            // insert ke pembayaran
            // inisiasi variable
            $totalYangHarusDibayar = 0;
            foreach($dataPembelian['keranjang'] as $pembelianDetail){
                $totalYangHarusDibayar += $pembelianDetail['harga_produk_akumulasi'];
            };

            $dataPembayaran = array(
                'kode_pembelian' => $kodePembelianBaruDiinput,
                'status' => 0,
                'total_harga_pembayaran' => $totalYangHarusDibayar
            );

            // insert ke pembayaran
            $this->tambahPembayaran($dataPembayaran);

            /////////////////////////////////////////////////////

            return true;

        } // end of function tambahPembelian

        public function tambahPembelianDetail($kodePembelian, $jumlahItem, $kodeProduk){

            $this->db->insert('pembelian_detail', array(
                'kode_pembelian' => $kodePembelian,
                'kode_produk' => $kodeProduk,
                'jumlah_item_pembelian_detail' => $jumlahItem
            ));

        } // end of function tambahPembelianDetail

        public function tambahPembayaran($dataPembayaran){

            $this->db->insert('pembayaran', $dataPembayaran);

        } // end of function tambahPembayaran

        public function uploadBuktiBayar($dataBerkas){

            $this->db->set(
                array(
                    'file_bukti_pembayaran' => $dataBerkas['nama_file'],
                    'status' => 2
                )
            );
            $this->db->where('kode_pembayaran', $dataBerkas['kode_pembayaran']);
            $this->db->update('pembayaran');

            return true;

        } // end of function uploadBuktiBayar

        public function ambilPembayaran($kodePembayaran=null){

            $hasil = array();

            $this->db->select('*');
            $this->db->from('pembayaran');
            $this->db->join('pembelian', 'pembelian.kode_pembelian = pembayaran.kode_pembayaran');
            
            // jika ada kode Pembayaran
            if($kodePembayaran){
                $this->db->where('pembayaran.kode_pembayaran', $kodePembayaran);
                $hasil = $this->db->get()->row_array();
            }
            else{
                $hasil = $this->db->get()->result_array();
            }

            return $hasil;

        } // end of function ambilPembayaran

        public function ambilPembayaranUsername($username){

            $this->db->select('*');
            $this->db->from('pembelian');
            $this->db->join('pembayaran', 'pembelian.kode_pembelian = pembayaran.kode_pembelian');
            $this->db->where('pembelian.username', $username);
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilPembayaranUsername

    }