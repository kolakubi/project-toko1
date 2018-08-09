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

            // echo '<pre>';
            // print_r($hasil);
            // echo '</pre>';

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

        public function pembayaranValid($kodePembayaran){

            $this->admin_model->pembayaranValid($kodePembayaran);

            redirect('admin');

        } // end of function pembayaranValid

        public function pembayaranTidakValid($kodePembayaran){

            $this->admin_model->pembayaranTidakValid($kodePembayaran);

            redirect('admin');

        } // end of function pembayaranValid

        public function produkTambah(){

            // set form rule
			$this->form_validation->set_rules(array(
				array(
					'field' => 'namaproduk',
					'label' => 'Nama Produk',
					'rules' => 'required'
				),
				array(
					'field' => 'kategori',
					'label' => 'Kategori',
					'rules' => 'required'
                ),
                array(
					'field' => 'harga',
					'label' => 'Harga',
					'rules' => 'required'
                ),
                array(
					'field' => 'deskripsi',
					'label' => 'Deskripsi',
					'rules' => 'required'
                ),
                array(
					'field' => 'satuan',
					'label' => 'Satuan',
					'rules' => 'required'
                ),
            ));

            if(empty($_FILES['gambar']['name'])){
                $this->form_validation->set_rules('gambar', 'Document', 'required');
            }
            
            // ubah pesan error
            $this->form_validation->set_message('required', '%s Wajib diisi');

            // jika submit gagal
            if(!$this->form_validation->run() && empty($_FILES['gambar']['name'])){
                $hasil = $this->admin_model->ambilKategori();
                $data['kategori'] = $hasil;

                $this->load->view('admin/header');
                $this->load->view('admin/produktambah', $data);
                $this->load->view('front/footer');
            }
            else{

                // atur config file
                $config['upload_path'] = './asset/image/produk';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 500;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // upload file
                // bukti bayar
                if(!$this->upload->do_upload('gambar')){

                    echo $this->upload->display_errors();
                }
                else{
                    $dataFileGambar = $this->upload->data();
                    $namaProduk = $this->input->post('namaproduk');
                    $kategori = $this->input->post('kategori');
                    $harga = $this->input->post('harga');
                    $deskripsi = $this->input->post('deskripsi');
                    $satuan = $this->input->post('satuan');

                    $dataProduk = array(
                        'nama_produk' => $namaProduk,
                        'kode_kategory' => $kategori,
                        'harga_produk' => $harga,
                        'deskripsi_produk' => $deskripsi,
                        'satuan_produk' => $satuan,
                        'gambar_produk' => $dataFileGambar['file_name']
                    );

                    $hasil = $this->admin_model->produkTambah($dataProduk);

                    if($hasil){
                        redirect('admin/produk');
                    }
                
                } // end of jika upload berhasil
                
            } // end of validasi form

        } // end of funcion tambahProduk 

    } // => end of class