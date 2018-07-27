<?php

    class Admin extends CI_Controller{

        public function __construct(){

            parent::__construct();

            // cek session
            // cek session admin yaitu level 1
            if($_SESSION['level']){
                $sessionLevel = $_SESSION['level'];
                    if($sessionLevel != 1){
                    // jika level bukan 1, redirect ke login
                    redirect('login');
                }
            }
            else{
                redirect('login');
            }

        }

        public function index(){

            $hasil = $this->admin_model->ambilDataPembayaran();
            $data['hasil'] = $hasil;

            $this->load->view('admin/header');
            $this->load->view('admin/pembayaran', $data);
            $this->load->view('front/footer');

        } // end of function index

        public function stok(){

            $hasil = $this->admin_model->ambilDataStok();
            $data['hasil'] = $hasil;

            $this->load->view('admin/header');
            $this->load->view('admin/stok', $data);
            $this->load->view('front/footer');

        } // end of function stok

        public function produk(){

            $hasil = $this->admin_model->ambilDataProduk();
            $data['hasil'] = $hasil;

            $this->load->view('admin/header');
            $this->load->view('admin/produk', $data);
            $this->load->view('front/footer');

        } // end of function produk

    } // => end of class