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

            // ambil list kategori
            $listKategori = $this->home_model->ambilKategori();

            // ambil value
            $keywords = $this->input->post('keywords');
            $kategori = $this->input->post('kategori');
            $hasil = array();

            // jika ada keywords
            if($keywords || $kategori){
                $hasil = $this->home_model->ambilProduk($keywords, $kategori);
            }
            else{
                $hasil = $this->home_model->ambilProduk();
            }
            
            $data['hasil'] = $hasil;
            $data['listKategori'] = $listKategori;

            //$this->cekArray($data);

            $this->load->view('front/header');
            $this->load->view('front/home', $data);
            $this->load->view('front/footer');

        } // => end of function index

        public function produkDetail($kodeProduk){

            $hasil = $this->home_model->ambilProdukDanStok($kodeProduk);
            $data['produk'] = $hasil;
            $data['jumlah_tidak_valid'] = false;
            $data['stok_kurang'] = false;

            // $this->cekArray($hasil);

            $this->load->view('front/header');
            $this->load->view('front/produkdetail', $data);
            $this->load->view('front/footer');

        }

        public function tambahKeranjang($kodeProduk){

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
                    $data['jumlah_tidak_valid'] = false;
                    $data['stok_kurang'] = false;

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
                        'harga_satuan' => $hasil['harga_produk'],
                        'harga_produk_akumulasi' => $hasil['harga_produk']*$banyakItem
                    );

                    // jika jumlah produk 0
                    if($banyakItem == 0){
                        $data['produk'] = $hasil;
                        $data['jumlah_tidak_valid'] = true;
                        $data['stok_kurang'] = false;

                        //$this->cekArray($hasil);

                        $this->load->view('front/header');
                        $this->load->view('front/produkdetail', $data);
                        $this->load->view('front/footer');
                    }
                    else{

                        // cek jika jumlah tidak melebihi stok yg ada
                        if(($hasil['jumlah_stok']-$banyakItem) < 0){
                            $data['produk'] = $hasil;
                            $data['jumlah_tidak_valid'] = false;
                            $data['stok_kurang'] = true;

                            //$this->cekArray($hasil);

                            $this->load->view('front/header');
                            $this->load->view('front/produkdetail', $data);
                            $this->load->view('front/footer');
                        }
                        else{

                            // simpan data di session
                            // jika keranjang belum ada
                            // buat session keranjang
                            if(empty($_SESSION['keranjang'])){
                                $_SESSION['keranjang'] = array();
                            }
                            array_push($_SESSION['keranjang'], $itemYangDibeli);

                            redirect('pelanggan/keranjang');

                        } // end of cek ketersedian stok

                    } // enf of jika produk 0

                } // end of validasi form

            } // end of cek session

            // belum login, redirect ke login
            else{
                redirect('login');
            }

        } // end of function beli
       

        public function konfirmasiPemesanan(){

            $this->load->view('front/header');
            $this->load->view('pelanggan/pembayaran');
            $this->load->view('front/footer');

        }

    } // => end of class

////////////////////////////////////////////
// array session
//     Array
// (
//     [__ci_last_regenerate] => 1532365813
//     [username] => mal
//     [password] => mal
//     [email] => mal@mal.com
//     [level] => 4
//     [keranjang] => Array
//         (
//             [0] => Array
//                 (
//                     [kode_produk] => 1
//                     [nama_produk] => Beras 20Kg Pandan Wangi
//                     [jumlah_produk] => 10
//                     [harga_produk_akumulasi] => 2400000
//                 )
//             [1] => Array
//                 (
//                     [kode_produk] => 4
//                     [nama_produk] => Kuaci Saset Rebo
//                     [jumlah_produk] => 10
//                     [harga_produk_akumulasi] => 780000
//                 )
//         )
// )