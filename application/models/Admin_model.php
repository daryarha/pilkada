<?php
class Admin_model extends CI_Model {

        //GET PESERTA, AND PHOTO

        public function setConfirm($uname=FALSE){
                $data= array(
                        'konfirmasi'=>1,
                );
                $this->db->where('username',$uname);
                $this->db->update('akun', $data);
                echo "<script type='text/javascript'>alert('Admin berhasil dikonfirmasi.');</script>";
                redirect(base_url('admin/data_admin'));
        }

        public function getDataGub($id=FALSE){
            if ($id === FALSE)
            {
                    $query = $this->db->get('calon');
                    return $query->result_array();
            }

            $query = $this->db->get_where('calon', array('id' => $id));
            return $query->row_array();
        }

        public function searchDataGub($search){
            if ($search === FALSE)
            {
                    $query = $this->db->get('calon');
                    return $query->result_array();
            }

                    $this->db->like('nama', $search);
                    $this->db->or_like('email', $search);
                    $this->db->or_like('no_hp', $search);
                    $this->db->or_like('visi_misi', $search);
                    $query = $this->db->get('calon');
                    return $query->result_array();
        }

        public function getDataAdmin($username=false){
            if ($username === FALSE)
            {
            $this->db->where('username',$username);
            $this->db->where('tipeakun',2);
            $query = $this->db->get('akun');
                    return $query->result_array();
            }
            $this->db->where('username',$username);
            $this->db->where('tipeakun',2);
            $query = $this->db->get('akun');
            return $query->row_array();            
        }

        public function getJumlahGub(){
            $this->db->select('count(*) as jumlah');
            $this->db->from('calon');
            $this->db->group_by('id');
            $query=$this->db->get();
            return $query->row_array();
        }

        public function searchDataAdmin($search=false){
            if ($search === FALSE)
            {
                    $query = $this->db->get('akun');
                    return $query->result_array();
            }
                    $this->db->like('username', $search);
                    $this->db->where('tipeakun',2);
                    $query = $this->db->get('akun');
            return $query->result_array();              
        }

        
        
        public function registerCalon($filename){
                $data = array(
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'no_hp' => $this->input->post('no_hp'),
                        'visi_misi' => $this->input->post('visi_misi'),
                        'url_foto' => $filename
                );
                $this->db->insert('calon', $data);
                        echo "<script type='text/javascript'>alert('Tambah calon berhasil.');</script> ";
                        redirect(base_url('/admin'),'refresh');
        }

        public function deleteCalon($id){
            $this->db->where('id',$id);
            $this->db->delete('calon');
            echo "<script type='text/javascript'>alert('Hapus calon berhasil.');</script>";
            redirect(base_url('/admin'),'refresh');
        }

        public function deleteAdmin($username){
            $this->db->where('username',$username);
            $this->db->delete('akun');
            echo "<script type='text/javascript'>alert('Hapus admin berhasil.');</script>";
            redirect(base_url('/admin/data_admin'),'refresh');
        }

        public function updateCalon($id=false,$filename=false){
            if(!$filename){                
                $data = array(
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'no_hp' => $this->input->post('no_hp'),
                        'visi_misi' => $this->input->post('visi_misi')
                );
            }else{                                
                $data = array(
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'no_hp' => $this->input->post('no_hp'),
                        'visi_misi' => $this->input->post('visi_misi'),
                        'url_foto' => $filename
                );
            }            
                $this->db->where('id', $id);
                $this->db->update('calon', $data);
            echo "<script type='text/javascript'>alert('Edit data calon berhasil.');</script>";
            redirect(base_url('/admin'),'refresh');

        }

}