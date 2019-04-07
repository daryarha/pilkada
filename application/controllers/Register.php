<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
        
		public function __construct(){
			parent::__construct();
		}

        public function index(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                $data['title']="Daftar";
                $this->load->view('template/header');
                $this->load->view('register',$data);
                $this->load->view('template/footer');

            }
            else
            {
                $this->user_model->checkUsername();
                $this->user_model->registering();
            }
        }
}
?>