<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {



        public function __construct()
        {
                parent::__construct();
                $user_data = $this->session->userdata('logUser');
                if($user_data['log']!='in') {
                        redirect(base_url(),'refresh');
                }else{                        
                    if($user_data['tipeakun']==2){
                        redirect(base_url("admin/"),'refresh');
                    }
                }                                
        }

        public function index(){
            $this->load->view('template/header');
            $this->load->view('template/nav_user');
            $this->load->view('user/about');
            $this->load->view('template/footer');
        }

        public function visimisi(){
            $data['Gubs']=$this->admin_model->getDataGub();
            $this->load->view('template/header');
            $this->load->view('template/nav_user');
            $this->load->view('user/visimisi',$data);
            $this->load->view('template/footer');
        }


        public function hasil(){            
                $data['belumvote']=$this->user_model->getJumlahStatusBelumVote();
                $data['totaluser']=$this->user_model->getJumlahUser();
                $data['count']=$this->admin_model->getJumlahGub();
                $data['Gubs']=$this->admin_model->getDataGub();
                $this->load->view('template/header');
                $this->load->view('template/nav_user');
                $this->load->view('user/hasilvote',$data);
                $this->load->view('template/footer');
        }

        public function vote(){
            $this->user_model->checkstatus();
            $data['Gubs']=$this->admin_model->getDataGub();
            $this->load->view('template/custom');
            $this->load->view('template/nav_user');
            $this->load->view('user/vote',$data);
            $this->load->view('template/footer');
        }

        public function pilih($id){
            $this->user_model->checkstatus();
            $this->user_model->pilihGub($id);
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url(),'refresh');
        }
}
?>