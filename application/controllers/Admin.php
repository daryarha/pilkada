<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


        public function __construct()
        {
                parent::__construct();
                $user_data = $this->session->userdata('logUser');
                if($user_data['log']!='in') {
                        redirect(base_url(),'refresh');
                }else{                        
                    if($user_data['tipeakun']==1){
                        redirect(base_url("user/"),'refresh');
                    }
                }                                
        }

        public function index(){
            $search=$this->input->get('search');
            if(isset($search)){
                $data['Gubs']=$this->admin_model->searchDataGub($search);
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('admin/data_pilkada',$data);
                $this->load->view('template/footer');
            }else{
                $data['Gubs']=$this->admin_model->getDataGub();
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('admin/data_pilkada',$data);
                $this->load->view('template/footer');
            }
        }

        public function tambah_calon(){
            $config['upload_path']          = './uploads/foto';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('no_hp', 'No. Handphone', 'required');
            $this->form_validation->set_rules('visi_misi', 'Visi Misi', 'required');
            if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('foto_calon'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('admin/isi_biodata',$error);
                $this->load->view('template/footer');

            }
            else
            {
                $filename = "uploads/foto/".$this->upload->data('file_name');
                $this->admin_model->registerCalon($filename);
            }
        }

        public function delete_calon($id){
            $this->admin_model->deleteCalon($id);
        }

        public function edit_calon($id){
            $config['upload_path']          = './uploads/foto';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('no_hp', 'No. Handphone', 'required');
            $this->form_validation->set_rules('visi_misi', 'Visi Misi', 'required');
            if ($this->form_validation->run() === FALSE)
            {
                $data['error'] = array('error' => $this->upload->display_errors());
                $data['bio']=$this->admin_model->getDataGub($id);
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('admin/edit_biodata',$data);
                $this->load->view('template/footer');

            }
            else if($this->upload->do_upload('foto_calon'))
            {
                $filename = "uploads/foto/".$this->upload->data('file_name');
                $this->admin_model->updateCalon($id,$filename);
                echo "<script type='text/javascript'>alert('Data dan foto berhasil diupdate');</script>";
                redirect(base_url('admin/'),'refresh');
            }else if($this->form_validation->run()===true){
                $this->admin_model->updateCalon($id);
                echo "<script type='text/javascript'>alert('Data berhasil diupdate');</script>";
                redirect(base_url('admin/'),'refresh');
            }
        }

        public function delete_admin($username){
            $this->admin_model->deleteAdmin($username);
        }

        public function data_admin(){
            $search=$this->input->get('search');
            if(isset($search)){                
                $data['Mins']=$this->admin_model->searchDataAdmin($search);
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('admin/data_admin',$data);
                $this->load->view('template/footer');
            }else{
                $data['Mins']=$this->admin_model->getDataAdmin();
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('admin/data_admin',$data);
                $this->load->view('template/footer');
            }
        }

        public function hasil(){                        
                $data['belumvote']=$this->user_model->getJumlahStatusBelumVote();
                $data['totaluser']=$this->user_model->getJumlahUser();
                $data['count']=$this->admin_model->getJumlahGub();
                $data['Gubs']=$this->admin_model->getDataGub();
                $this->load->view('template/header');
                $this->load->view('template/nav_admin');
                $this->load->view('user/hasilvote',$data);
                $this->load->view('template/footer');
        }

        public function confirm($username){
            $this->admin_model->setConfirm($username);
        }

        public function logout(){
                $this->session->sess_destroy();
                redirect(base_url(),'refresh');
        }
}
?>