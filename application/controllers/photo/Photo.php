<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
    }
    public function  index(){

        $data = array();
        $data['page_title'] = 'Photo Album';
        $data['tabActive'] = 'Private';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('album');
        $this->load->view('header', $data);
        $this->load->view('photo/photo_view',$data);
        $this->load->view('footer');
    }

    public function  viewall(){

        $data = array();
        $data['page_title'] = 'Photo Album';
        $data['tabActive'] = 'Private';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('album');
        $this->load->view('header', $data);
        $this->load->view('photo/viewall',$data);
        $this->load->view('footer');
    }



    public function add_album(){
            $data=array();
            $data['profession']=$this->input->post('profession_post');
            $data['user_id']=$this->input->post('user_id_post');
            $data['album_name']=$this->input->post('album_name_post');
            $test=$this->db->where('album_name',$data['album_name'])->count_all_results('album');
             if($test>0){
                echo '<script>alert("This Album Name Already Exists");</script>';
                $data = array();
                $data['page_title'] = 'Photo Album';
                $data['tabActive'] = 'Private';
                $data['error'] = '';
                $loginId = $this->session->userdata('login_id');
                $data['user_id']=$loginId;
                $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
                $this->load->view('header', $data);
                $this->load->view('photo/photo_view',$data);
                $this->load->view('footer');

            }else{
                 echo '<script>alert("Album Create Successfully");</script>';
                $this->global_model->insert('album', $data);
                $this->index();
            }


    }

    public function add_photo(){
        $data['page_title'] = 'Photo Album';
        $data['tabActive'] = 'Private';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $album_id=$this->uri->segment(4);
        $data['album'] = $this->db->select("*")->where("album_id",$album_id)->get('album');
        $data['photos'] =$this->db->select("*")->where("album_id",$album_id)->get('photos');
        $this->load->view('header', $data);
        $this->load->view('photo/add_album_photo',$data);
        $this->load->view('footer');
    }

    public function multiple_photo_upload(){
        $files = $_FILES;
        $cpt = count($_FILES['userFiles']['name']);

            $number_of_files = sizeof($_FILES['userFiles']['tmp_name']);
            $files = $_FILES['userFiles'];
            $errors = array();

            for($i=0;$i<$number_of_files;$i++)
            {
                if($_FILES['userFiles']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['userFiles']['name'][$i];
            }
            if(sizeof($errors)==0)
            {
                $this->load->library('upload');
                $config['upload_path'] = FCPATH . './assets/file/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                for ($i = 0; $i < $number_of_files; $i++) {
                    //$_FILES['uploadedimage']['ext'] = $this->get_extension($files['name'][$i]);
                    //echo $_FILES['uploadedimage']['ext'];

                    $_FILES['uploadedimage']['name'] = time().$i.$files['name'][$i];
                    $_FILES['uploadedimage']['type'] = $files['type'][$i];
                    $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['uploadedimage']['error'] = $files['error'][$i];
                    $_FILES['uploadedimage']['size'] = $files['size'][$i];
                    $fileName[] = $_FILES['uploadedimage']['name'];

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('uploadedimage'))
                    {
                        $fileInfo = $this->upload->data();
                        $audo_data['ref_id'] = $this->input->post('user_id');
                        $audo_data['ref_name'] = 'image_album';
                        $audo_data['name'] = $fileInfo['file_name'];
                        $audo_data['from'] = 'image';
                        $audo_data['album_id'] = $this->input->post('album_id');
                        $this->global_model->insert('photos', $audo_data);
}
                    else
                    {
                        $data['upload_errors'][$i] = $this->upload->display_errors();
                    }
                }
            }
            $fname=implode(",",$fileName);
        redirect("photo/photo/add_photo/".$audo_data['album_id']);
        }
    public function  delete_album(){
        $album_id=$this->uri->segment(4);
        $photos=$this->db->select('*')->where('album_id',$album_id)->get('photos');
        if($photos->num_rows()>0){
            foreach ($photos->result()as $row){
                $image_name=$row->name;
                unlink(FCPATH . './assets/file/'. $image_name);
               // delete_files(site_url() . '/assets/file/'. $image_name);
            }
            $tables = array('album', 'photos');
            $this->db->where('album_id', $album_id);
            $query=$this->db->delete($tables);
    }else{
            $tables = array('album', 'photos');
            $this->db->where('album_id', $album_id);
            $query=$this->db->delete($tables);
        }
        redirect('photo/photo/index');
        //$tables = array('album', '', 'table3');
        //$this->db->where('id', '5');
        //$query=$this->db->delete($tables);
    }


public function update(){
    $data = array();
    $data['page_title'] = 'Photo Album';
    $data['tabActive'] = 'Private';
    $data['error'] = '';
    $loginId = $this->session->userdata('login_id');
    $data['user_id']=$loginId;
    $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
    $album_id=$this->uri->segment(4);
    $data['album_details']=$this->db->select('*')->where('album_id',$album_id)->get('album');
    $this->load->view('photo/update_album',$data);
  }
public function  update_album_name(){
    $album_id=$this->input->post('album_id');
    $data['profession']=$this->input->post('profession_post');
    $data['user_id']=$this->input->post('user_id_post');
    $data['album_name']=$this->input->post('album_name_post');
    $this->global_model->update('album', $data,array('album_id'=>$album_id));
    $this->index();

}
    public function delete_photo(){
        $album_id=$this->uri->segment(5);

        $photo_id=$this->uri->segment(4);
        $photo_details=$this->db->select('*')->where('id',$photo_id)->get('photos');
        if($photo_details){
            foreach ($photo_details->result()as $row){
                $photo_name=$row->name;
                unlink(FCPATH . './assets/file/'. $photo_name);
            }
            $tables = array('photos');
            $this->db->where('id', $photo_id);
            $query=$this->db->delete($tables);

                redirect("Photo/photo/add_photo/".$album_id);
        

        }

    }



}