<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function __construct(){
			parent::__construct();
            $user_data = $this->session->userdata('logUser');
            if($user_data['log']=='in') {
            	if($user_data['tipeakun']==1){
                    redirect(base_url("user/"),'refresh');
            	}else{
                    redirect(base_url("admin/"),'refresh');
            	}
            }
		}

        public function index(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                $data['title']="Login";
                $this->load->view('template/header');
                $this->load->view('login',$data);
                $this->load->view('template/footer');

            }
            else
            {
                $this->user_model->checklog();
            }
        }
}
?>