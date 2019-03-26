<?php

class Main extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');

    }

    public function homepage()
    {



        if (!file_exists(APPPATH . 'views/homepage.php')) {
            show_404();
        }
        $data['page_type'] = "homepage";
        $data['title'] = "Dejavu | find what inspired you";

        $this->load->helper('url');
        $this->load->model('User_pics');

        $data['title'] = ucfirst('hello');

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('homepage.php', $data);

        $img_pics = $this->User_pics->generate_random_pics(100);
        $data['img_pics'] = $img_pics;


        echo "<pre>";
        //print_r($img_pics);
        echo '</pre>';


        $this->load->view('templates/waterfall_cards', $data);
        //TODO: generate pictures in pages
        //TODO: load card view
        $this->load->view('templates/footer', $data);

    }


    public function login()
    {
        if (!file_exists(APPPATH . 'views/login.php')) {
            show_404();
        }

        $data['page_type'] = "login";
        $data['title'] = "Log in";

        $this->load->helper('url');

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('login', $data);

    }

    public function signup()
    {
        if (!file_exists(APPPATH . 'views/signup.php')) {
            show_404();
        }

        $data['page_type'] = "signup";
        $data['title'] = "Sign Up";

        $this->load->helper('url');

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('signup', $data);

    }

    public function profile()
    {
        if (!file_exists(APPPATH . 'views/profile.php')) {
            show_404();
        }

        $data['page_type'] = "profile";
        $data['title'] = "Profile";

        $this->load->helper('url');

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('profile', $data);
        $this->load->view('templates/footer', $data);
    }


    public function email_verify()
    {

        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        //echo $last_name;

        $this->load->model('User_manage');

        $link = $this->User_manage->generate_activate_link($last_name, $email);
        //echo $link;

        $this->load->model('Email_manage');

        $html_content = "<h2>Email form Dejavu</h2>";
        $html_content .= "<p>Please click the <a href='.$link.'>link</a> to active your account </p>";
        $html_content .= "<br><a href='.$link.'>$link</a>";

        //echo $html_content;


        $result = $this->Email_manage->send_email($email, $html_content);

        $data['page_type'] = "email_sent";
        $data['title'] = "Email Sent | Dejavu";

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('email_sent', $data);

    }


    public function email_verification()
    {
        //todo:
        $email = $this->input->get('email');
        $code = $this->input->get('code');


        $this->load->model('User_manage');
        $user_info = $this->User_manage->get_user_info($email, 'email');
        $correct_code = $this->User_manage->generate_activate_code($user_info['last_name']);

        if ($code == $correct_code) {
            $result = $this->User_manage->activate_account($user_info['user_id']);


            if ($result == 'success') {
                echo "Success in activate account, will redirect to login page";

                header("refresh:3 ;url=" . base_url() . 'login');

            } else if ($result == 'already_activated') {

                echo "Already activated";
            }
        } else {
            echo "Wrong Code, cannot activate the account, login and try to send an email again";
        }


    }


    public function search()
    {

        $this->load->model('Search');
        $this->load->model('User_pics');

        //http://localhost/search?keyword[]=1&keyword[]=2&keyword[]=3
        // echo $this->input->get('user');
        $result = null;

        if ($this->input->get('user') !== null) {
            //todo: user search


        } else {

            //keyword search on tag, description
            $keywords = $this->input->get('keyword');
            // print_r($keywords);
            $result = $this->Search->search($keywords);



        }


        //the cards

        if ($result == null) {
            //todo:
            echo "no result";
        } else {

            $img_paths = $this->User_pics->generate_paths_by_array($result);
            $data['img_pics'] = $result;


        }


        $this->load->model('User_pics');

        $data['page_type'] = "search";
        $data['title'] = "Search Result | Dejavu";
        $data['result'] = $result;
        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('search', $data);
        if ($result == null) {
            return;
        } else {

            $this->load->view('templates/waterfall_cards', $data);
        }
    }

    public function pic_detail()
    {
        $pic_id = $this->input->get('pic_id');

        $data['page_type'] = "pic_detail";
        $data['title'] = "pic_detail | Dejavu";
        $data['pic_id'] = $pic_id;
        $this->load->model('User_pics');

        $result = $this->User_pics->get_pic_comments($pic_id, 0, 100);

        $data['comments'] = $result;



        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('pic_detail', $data);
    }


    public function change_password()
    {
        $data['page_type'] = "change_password";
        $data['title'] = "Change/Forget Password | Dejavu";

        $this->load->view('templates/head', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('change_password', $data);


    }
}