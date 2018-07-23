<?php

    class Pelanggan_model extends CI_Model{

        public function __construct(){

            parent::__construct();

        }

        public function ambilPembelian($username){

            $this->db->select('*');
            $this->db->from('pembelian');
            $this->db->where('username', $username);
            $hasil = $this->db->get()->result_array();
            return $hasil;

        }

    }