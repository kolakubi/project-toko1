<?php

class Pemilik extends CI_Controller{

    public function __construct(){

        parent::__construct();

        // cek session
        // cek session pemilik yaitu level 2
        if($_SESSION['level']){
            $sessionLevel = $_SESSION['level'];
                if($sessionLevel != 2){
                // jika level bukan 2, redirect ke login
                redirect('login');
            }
        }
        else{
            redirect('login');
        }

    } // end of construct

    public function index(){

        $this->form_validation->set_rules(
            array(
                array(
                'field' => 'tanggaldari',
                'label' => 'Tanggal Dari',
                'rules' => 'required'
                ),
                array(
                'field' => 'tanggalsampai',
                'label' => 'Tanggal Sampai',
                'rules' => 'required'
                )
            )
        );
        if(!$this->form_validation->run()){
            // $hasil = $this->pemilik_model->ambilDataPembayaran();
            // $data['hasil'] = $hasil;
            $data['hasil'] = array();

            $this->load->view('pemilik/header');
            $this->load->view('pemilik/index', $data);
            $this->load->view('front/footer');
          }
          else{
            $tanggaldari = $this->input->post('tanggaldari').' 00:00:00';
            $tanggalsampai = $this->input->post('tanggalsampai').' 23:59:59';
            $dataambil = array(
              'dari' => $tanggaldari,
              'sampai' => $tanggalsampai
            );
    
            // ambil semua data pendaftaran
            $dataPembayaran = $this->pemilik_model->ambilDataPembayaran($dataambil);
            $data['hasil'] = $dataPembayaran;
            $data['tanggal'] = array(
              'dari' => $this->input->post('tanggaldari'),
              'sampai' => $this->input->post('tanggalsampai')
            );
    
            $this->load->view('pemilik/header');
            $this->load->view('pemilik/index', $data);
            $this->load->view('front/footer');
          }

    } // end of function index

    public function stok(){

        $hasil = $this->pemilik_model->ambilDataStok();
        $data['hasil'] = $hasil;

        $this->load->view('pemilik/header');
        $this->load->view('pemilik/stok', $data);
        $this->load->view('front/footer');

    }

} // end of controller