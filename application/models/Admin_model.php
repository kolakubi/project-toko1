<?php

    class Admin_model extends CI_Model{

        public function __contruct(){

            parent::__construct();

        }

        public function ambilDataPembayaran(){

            $this->db->select('*');
            $this->db->from('pembayaran');
            $hasil = $this->db->get()->result_array();
            return $hasil;

        } // end of function ambilDataPembayaran

    }