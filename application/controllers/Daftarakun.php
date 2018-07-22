<?php

    Class Daftarakun extends CI_Controller{

        public function __construct(){

            parent::__construct();

        }

        public function index(){

            $data['gagal'] = false;
			$this->load->view('login/daftarakun', $data);

        }

        public function daftar(){

            // set form rule
			$this->form_validation->set_rules(array(
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
                ),
                array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required'
				)
            ));
            
            // ubah pesan error
            $this->form_validation->set_message('required', '%s Wajib diisi');

            // jika submit gagal
            if(!$this->form_validation->run()){
                $data['gagal'] = false;
				$this->load->view('login/daftarakun', $data);
			}
            // jika submit berhasil
            else{
				// ambil value dr field
				$username = $this->input->post('username');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $dataDaftarAkun = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'level' => 4
                );

                // simpan input ke database
                $result = $this->daftarakun_model->simpan($dataDaftarAkun);
                
                // jika sukses
                // brati username blum dipakai
                if($result){
                    redirect('login');
                }
                // jika gagal
                else{
                    $data['gagal'] = true;
				    $this->load->view('login/daftarakun', $data);
                } // => end of input sukses

            } // end of validasi form
            
        } // => end of function daftar

    } // => end of Class