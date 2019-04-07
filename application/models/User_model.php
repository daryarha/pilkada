<?php
class User_model extends CI_Model {



        public function checkUsername(){

                $username=$this->input->post('username');
                $data = array(
                        'username' =>$username
                );
                $cek= $this->db->get_where('akun', $data)->num_rows();
                if($cek>0){
                        echo "<script type='text/javascript'>alert('Username sudah ada.');</script>";
                        redirect(base_url('/register'),'refresh');
                }
        }

        //REGISTER//
        public function registering()
        {    
                $data = array(
                        'username' => $this->input->post('username'),
                        'password' => md5($this->input->post('password')),
                        'tipeakun' => $this->input->post('tipeakun'),
                );

                $this->db->insert('akun', $data);
                        echo "<script type='text/javascript'>alert('Daftar berhasil.');</script>";
                        redirect(base_url('/login'),'refresh');
        }

        //END OF REGISTER=

        //CHECK LOGIN

        public function checklog(){
                $password=md5($this->input->post('password'));
                $username=$this->input->post('username');
                $data = array(
                        'username' =>$username,
                        'password' => $password,
                );
                $cek= $this->db->get_where('akun', $data)->num_rows();
                print_r($cek);
                $iduser= $this->db->get_where('akun', array('username' => $username))->result_array();
                if($cek>0){
                    //tipeakun 1 = user
                    //tipeakun 2 = admin
                    if($iduser[0]['tipeakun']==1){
                        $data_session=array(
                            'username' => $iduser[0]['username'],
                            'tipeakun'=>$iduser[0]['tipeakun'],
                            'log'=>'in',
                        );
                        $this->session->set_userdata('logUser',$data_session);
                        echo "<script type='text/javascript'>alert('Login berhasil');</script>";
                        redirect(base_url('user/'),'refresh');
                    }else{
                        //cek admin sudah dikonfirmasi belum, sudah = 1, belum = 0
                        if($iduser[0]['konfirmasi']==1){
                            $data_session=array(
                                'username' => $iduser[0]['username'],
                                'tipeakun'=>$iduser[0]['tipeakun'],
                                'log'=>'in',
                            );
                            $this->session->set_userdata('logUser',$data_session);
                            echo "<script type='text/javascript'>alert('Login berhasil');</script>";
                            redirect(base_url('admin/'),'refresh');
                        }else{
                            echo "<script type='text/javascript'>alert('Username adminmu belum dikonfirmasi.');</script>";
                            redirect(base_url(),'refresh');
                        }
                    }

                }else{
                echo "<script type='text/javascript'>alert('Username atau password salah.');</script>";
                redirect(base_url(),'refresh');
                }

        }

        //END OF CHECK LOGIN

        public function pilihGub($id){
            $this->ubahStatus();
                $gub=$this->admin_model->getDataGub($id);
                $tambah=$gub['hasilvote']+1;
                $data = array(
                        'hasilvote' => $tambah
                );
                $this->db->where('id',$id);
                $this->db->update('calon', $data);
                echo "<script type='text/javascript'>alert('Berhasil memilih.');</script>";
                redirect(base_url('user/hasil'),'refresh');
        }

        public function ubahStatus(){            
                $user_data = $this->session->userdata('logUser');
                $data = array(
                        'statusvote' => 1
                );
                $this->db->where('username',$user_data['username']);
                $this->db->update('akun', $data);
        }

        public function getStatus($username=FALSE){
            if($username===FALSE){
            $query = $this->db->get_where('akun', array('tipeakun' => 1));
            return $query->result_array(); 
            }
            $query = $this->db->get_where('akun', array('username' => $username));
            return $query->row_array(); 
        }

        public function getJumlahStatusBelumVote(){
            $this->db->select('count(*) as jumlah');
            $this->db->where('tipeakun',1);
            $this->db->where('statusvote',0);
            $query = $this->db->get('akun');
            return $query->row_array();
        }

        public function getJumlahUser(){
            $this->db->select('count(*) as jumlah');
            $query = $this->db->get_where('akun',array('tipeakun' => 1));
            return $query->row_array();
        }

        public function checkstatus(){
                $user_data = $this->session->userdata('logUser');
                $stats=$this->getStatus($user_data['username']);
                if($stats['statusvote']==1){
                echo "<script type='text/javascript'>alert('Mohon maaf Anda sudah memilih.');</script>";
                redirect(base_url('user'),'refresh');
                }
        }
}