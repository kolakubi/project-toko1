<?php

    Class Home extends CI_Controller{

        public function __construct(){
            parent::__construct();

            // session here
        }

        // public function cekSession(){

        //     if(!empty($_SESSION['username'])){
        //         return true;
        //     }

        //     return false;

        // }

        public function cekArray($arr){

            echo '<pre>';
            print_r($arr);
            echo '</pre>';

        }

        public function index(){

            $hasil = $this->home_model->ambilProduk();
            $data['hasil'] = $hasil;

            // $this->cekArray($hasil);

            $this->load->view('front/header');
            $this->load->view('front/home', $data);
            $this->load->view('front/footer');

        } // => end of function index

        public function produkDetail($kodeProduk){

            $hasil = $this->home_model->ambilProdukDanStok($kodeProduk);
            $data['produk'] = $hasil;

            // $this->cekArray($hasil);

            $this->load->view('front/header');
            $this->load->view('front/produkdetail', $data);
            $this->load->view('front/footer');

        }

    } // => end of class