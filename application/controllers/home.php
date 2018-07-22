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

            $this->load->view('front/header');
            $this->load->view('front/home');
            $this->load->view('front/footer');

        }

    } // => end of class