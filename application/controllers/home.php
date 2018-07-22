<?php

    Class Home extends CI_Controller{

        public function __construct(){
            parent::__construct();

            // session here
        }

        public function cekSession(){

            if(!empty($_SESSION['username'])){
                return true;
            }

            return false;

        }

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

        public function beli($kodeProduk){

            $hasil = $this->home_model->ambilProdukDanStok($kodeProduk);

            // jika sudah login
            if($this->cekSession()){

                // set form rule
                $this->form_validation->set_rules(
                    array(
                        array(
                            'field' => 'jumlahpembelian',
                            'label' => 'Jumlah Pesanan',
                            'rules' => 'required'
                        )
                    )
                );

                 // ubah pesan error
                $this->form_validation->set_message('required', '%s Wajib diisi');

                 // jika submit gagal
                if(!$this->form_validation->run()){

                    $data['produk'] = $hasil;

                    //$this->cekArray($hasil);

                    $this->load->view('front/header');
                    $this->load->view('front/produkdetail', $data);
                    $this->load->view('front/footer');

                }
                // jika submit berhasil
                else{
                    // ambil value dr field
                    $banyakItem = $this->input->post('jumlahpembelian');

                    $itemYangDibeli = array(
                        'kode_produk' => $kodeProduk,
                        'nama_produk' => $hasil['nama_produk'],
                        'jumlah_produk' => $banyakItem,
                        'harga_produk_akumulasi' => $hasil['harga_produk']*$banyakItem
                    );

                    // simpan data di session
                    // jika keranjang belum ada
                    // buat session keranjang
                    if(empty($_SESSION['keranjang'])){
                        $_SESSION['keranjang'] = array();
                    }
                    array_push($_SESSION['keranjang'], $itemYangDibeli);

                    redirect('home/keranjang');

                } // end of validasi form

            } // end of cek session

            // belum login, redirect ke login
            else{
                redirect('login');
            }

        } // end of function beli

        public function keranjang(){

            $this->load->view('front/header');
            $this->load->view('front/keranjang');
            $this->load->view('front/footer');

        }

        public function hapusItemKeranjang($index){

            // hapus index dari array
            array_splice($_SESSION['keranjang'], $index, 1);

            redirect('home/keranjang');

        }

    } // => end of class