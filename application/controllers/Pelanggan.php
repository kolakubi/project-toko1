<?php

    class Pelanggan extends CI_Controller{

        public function __construct(){

            parent::__construct();

        }

        public function index(){

            $this->load->view('pelanggan/header');
            $this->load->view('pelanggan/keranjang');
            $this->load->view('front/footer');

        }

        public function keranjang(){

            // cek jika ada session keranjang
            if(empty($_SESSION['keranjang'])){
                $_SESSION['keranjang'] = array();
            }

            // set form rule
            $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'pengiriman',
                        'label' => 'Pengiriman',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'packing',
                        'label' => 'Packing',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'namalengkap',
                        'label' => 'Nama Lengkap',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'telepon',
                        'label' => 'Telepon',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'alamat',
                        'label' => 'Alamat',
                        'rules' => 'required'
                    )
                )
            );

             // ubah pesan error
            $this->form_validation->set_message('required', '%s Wajib diisi');

            // jika submit gagal
            if(!$this->form_validation->run()){

                $this->load->view('pelanggan/header');
                $this->load->view('pelanggan/keranjang');
                $this->load->view('front/footer');

            }
            // jika berhasil
            else{

                // ambil semua variable
                $pengiriman = $this->input->post('pengiriman');
                $packing = $this->input->post('packing');
                $namalengkap = $this->input->post('namalengkap');
                $telepon = $this->input->post('telepon');
                $alamat = $this->input->post('alamat');
                $keranjang = $_SESSION['keranjang'];
                $username = $_SESSION['username'];
                $dataPembelian = array(
                    'username' => $username,
                    'pengiriman' => $pengiriman,
                    'packing' => $packing,
                    'keranjang' => $keranjang,
                    'namalengkap' => $namalengkap,
                    'telepon' => $telepon,
                    'alamat' => $alamat
                );

                // echo '<pre>';
                // print_r($dataPembelian);
                // echo '</pre>';
                
                // passing data ke funciton pembelian
                $this->pembelian($dataPembelian);

            }

        }

        public function hapusItemKeranjang($index){

            // hapus index dari array
            array_splice($_SESSION['keranjang'], $index, 1);

            redirect('pelanggan/keranjang');

        } // end of function hapusItemKeranjang


        public function pesanan(){

            $username = $_SESSION['username'];

            $hasil = $this->pelanggan_model->ambilPembelian($username);
            $data['hasil'] = $hasil;

            // [0] => Array
            //     (
            //         [kode_pembelian] => 3
            //         [username] => mal
            //         [metode_packing] => Kardus
            //         [metode_pengiriman] => Diantar
            //         [catatan_pembelian] => 
            //         [status] => 
            //         [tanggal_pembelian] => 2018-07-24 01:11:11
            //         [namalengkap] => mal
            //         [telepon] => +622187704765
            //         [alamat] => JALAN KELAPA DUA WETAN III NO 29
            //     )

            // [1] => Array
            //     (
            //         [kode_pembelian] => 4
            //         [username] => mal
            //         [metode_packing] => semen
            //         [metode_pengiriman] => Go Send
            //         [catatan_pembelian] => 
            //         [status] => 
            //         [tanggal_pembelian] => 2018-07-24 01:13:51
            //         [namalengkap] => Mal
            //         [telepon] => +622187704765
            //         [alamat] => JALAN KELAPA DUA WETAN III NO 29
            //     )

            $this->load->view('pelanggan/header');
            $this->load->view('pelanggan/pesanan', $data);
            $this->load->view('front/footer');

        }



    }