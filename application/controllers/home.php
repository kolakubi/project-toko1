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

                    redirect('pelanggan/keranjang');

                } // end of validasi form

            } // end of cek session

            // belum login, redirect ke login
            else{
                redirect('login');
            }

        } // end of function beli

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

                $this->load->view('front/header');
                $this->load->view('front/keranjang');
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

            redirect('home/keranjang');

        } // end of function hapusItemKeranjang

        public function pembelian($dataPembelian){

            // simpan data ke database
            $result = $this->home_model->tambahPembelian($dataPembelian);

            if($result){

                // bersihin keranjang
                unset($_SESSION['keranjang']);

                // redurect ke invoice
                redirect('home/konfirmasipemesanan');
            }

        } // end of function pembelian

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