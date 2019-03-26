<?php

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

    }

    public function index()
    {

        $data['page_type'] = "upload_pics";

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('upload_pics');



    }


    public function do_upload()
    {
        if (!empty($_FILES['file']['name'])) {
            $this->load->model('User_pics');

            // Set preference
            $config['upload_path'] = 'public/img/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '10240'; // max_size in kb

            $max_id = $this->User_pics->get_max_image_id();

            $id = $max_id+1;
            $config['file_name'] = 'p'.$id;

            //Load upload library


            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // File upload
            if ($this->upload->do_upload('file')) {
                // Get data about the file
                $uploadData = $this->upload->data();
            }


            
        }

    }
}
