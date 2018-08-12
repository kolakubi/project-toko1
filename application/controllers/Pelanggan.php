<?php

    class Pelanggan extends CI_Controller{

        public function __construct(){

            parent::__construct();

            // cek session
            // cek session pelanggan yaitu level 4
            if($_SESSION['level']){
                $sessionLevel = $_SESSION['level'];
                    if($sessionLevel != 4){
                    // jika level bukan 4, redirect ke login
                    redirect('login');
                }
            }
            else{
                redirect('login');
            }

            if(empty($_SESSION['keranjang'])){
                $_SESSION['keranjang'] = array();
            }

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

        } // => end of function keranjang

        public function hapusItemKeranjang($index){

            // hapus index dari array
            array_splice($_SESSION['keranjang'], $index, 1);

            redirect('pelanggan/keranjang');

        } // end of function hapusItemKeranjang

        public function pembelian($dataPembelian){

            // simpan data ke database
            $result = $this->pelanggan_model->tambahPembelian($dataPembelian);

            if($result){

                // bersihin keranjang
                unset($_SESSION['keranjang']);

                // redurect ke invoice
                redirect('pelanggan/pesanan');
            }

        } // end of function pembelian


        public function pesanan(){

            $username = $_SESSION['username'];

            $hasil = $this->pelanggan_model->ambilPembelian($username);
            $data['hasil'] = $hasil;

            // echo '<pre>';
            // print_r($hasil);
            // echo '</pre>';

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

        } // => end of function pesanan

        public function pesananDetail($kodePembelian){

            $hasil = $this->pelanggan_model->pembelianDetailAmbil($kodePembelian);
            $data['hasil'] = $hasil;

            // echo '<pre>';
            // print_r($hasil);
            // echo '</pre>';

            $this->load->view('pelanggan/header');
            $this->load->view('pelanggan/pesanandetail', $data);
            $this->load->view('front/footer');

        } // end of function pesananDetail

        public function uploadBuktiBayar($kodePembayaran){

            // passing kode pendaftaran
            $data['kodepembayaran'] = $kodePembayaran;

            // inisiasi variable
            $dataFileBuktiPembayaran = array();

            // rule biar harus diisi
            if(empty($_FILES['buktibayar']['name'])){
                $this->form_validation->set_rules('buktibayar', 'Document', 'required');
            }

            // ubah pesan error
            $this->form_validation->set_message('required', '%s tidak boleh kosong');

            // validasi kelengkapan form
            if(!$this->form_validation->run() 
            && empty($_FILES['buktibayar']['name'])){
                
                $this->load->view('pelanggan/header');
                $this->load->view('pelanggan/uploadbuktibayar', $data);
                $this->load->view('front/footer');
                
            }
            else{

                // atur config file
                $config['upload_path'] = './uploads/buktibayar';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 500;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // upload file
                // bukti bayar
                if(!$this->upload->do_upload('buktibayar')){

                    echo $this->upload->display_errors();
                }
                else{
                    $dataFileBuktiPembayaran = $this->upload->data();
                    $dataBerkas = array(
                        'nama_file' => $dataFileBuktiPembayaran['file_name'],
                        'kode_pembayaran' => $kodePembayaran
                    );

                    $this->pelanggan_model->uploadBuktiBayar($dataBerkas);
                }
                ////////////////////////////////////////////

                redirect('pelanggan/pembayaran');

            } // end of validasi form

        } // end of function uploadBuktiBayar

        public function pembayaran(){

            $username = $_SESSION['username'];

            $hasil = $this->pelanggan_model->ambilPembayaranUsername($username);
            $data['hasil'] = $hasil;

            $this->load->view('pelanggan/header');
            $this->load->view('pelanggan/pembayaran', $data);
            $this->load->view('front/footer');

        }

    } // end of class