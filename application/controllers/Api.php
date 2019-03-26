<?php
/**
 * Created by PhpStorm.
 * Date: 2019-05-01
 * Time: 19:18
 */

class Api extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * This api will get the data by POST info,
     * The format of the POST info should contains email address and password
     * start a session if login success
     *
     *
     * Login function, call the function to verify the password
     * if the password is correct, it will echo {"login_result": "match"}
     * if the email doesn't exist, the echo is "emailfail"
     * if the password is incorrect, the echo is "pwdfail"
     * if the input is invalid, the echo is "Invalid Input"
     */
    public function login_verify()
    {


        header("Content-Type: application/json");


        //get the POST data and decode it.
        $data = json_decode(file_get_contents('php://input'), true);
        $this->load->model('User_manage');


        if (isset($data["email"]) && isset($data["password"])) {
            $result = $this->User_manage->login($data["email"], $data["password"], 'email');
            // echo $result;
            if ($result == '0') {
                //echo "cannot find the user";
                $result = array('login_result' => 'emailfail');
            } else if ($result == 'success') {
                $result = array('login_result' => 'match');


                $user_info = $this->User_manage->get_user_info($data['email'], 'email');
                //print_r($user_info);


                $user_session_data = array("email" => $user_info["email_address"],
                    "user_id" => $user_info["user_id"],
                    "first_name" => $user_info["first_name"],
                    "last_name" => $user_info["last_name"],
                    "date_of_birth" => $user_info["date_of_birth"],
                    "avatar" => $user_info["avatar"],
                    "created_timestamp" => $user_info["created_timestamp"],
                    "is_activated" => $user_info["is_actived"]);
                $this->session->set_userdata($user_session_data);


            } else if ($result == 'fail') {

                $result = array('login_result' => 'pwdfail');
            }
            //print_r($result);


            //construct the response JSON
            //only return the state, others will be saved in the session
            //$result_return_arr = array('login_result' => $result['state']);
            $result_json = json_encode($result);
            echo $result_json;

        } else {
            echo json_encode(array("login_result" => "Invalid Input"));
        };
    }


    /**
     * The method will verify the signup is commit or not
     * echo format : {'signup_state': x}
     * x = 'emailfail', email doesn't exist
     * x = 'success', sign up success
     * x = 'unknownerror', An unknown error happened
     */
    public
    function signup()
    {
        header("Content-Type: application/json");

        //get the POST data and decode it.
        $data = json_decode(file_get_contents('php://input'), true);
        $this->load->model('User_manage');


        if (isset($data["email"]) && isset($data["password"]) && isset($data['first_name']) && isset($data['last_name']) && isset($data['date_of_birth'])) {
            $result_str = $this->User_manage->signup($data["email"], $data["password"], $data["first_name"], $data["last_name"], $data["date_of_birth"]);


            //construct the response JSON
            $result_arr = array('signup_result' => $result_str);
            $result_json = json_encode($result_arr);
            echo $result_json;

        } else {
            echo json_encode(array("signup_result" => "Invalid Input"));
        };
    }

    /**
     * logout and the page will redirect to home page
     * end the session
     */
    public
    function logout()
    {
        //session_start();

        $this->session->sess_destroy();

//        unset($_SESSION['email']);
//        echo base_url();
        header("Location:" . base_url());
    }

// $num number of comment
    public function get_pic_detailed_info()
    {
        //todo: get the comments
        $start_num = 0;
        $num = 2;
        $this->load->model('User_pics');
        $result = $this->User_pics->get_pic_comments(1, $start_num, $num);

        $result_json = json_encode($result);
        echo $result_json;


    }


    public
    function favourite()
    {
        //todo: favourite pic !important
    }


    /**
     * echo {state: 1} success
     * echo {state: 0} fail
     * echo {state: null} error
     */
    public
    function write_comment()
    {
        header("Content-Type: application/json");

        $data = json_decode(file_get_contents('php://input'), true);
//        echo $data['comment'];
//        echo $_SESSION['user_id'];

        $this->load->model('User_pics');
        $result = $this->User_pics->write_comment($_SESSION['user_id'], $data['image_id'], $data['comment']);

        $result_json = json_encode(array("state" => "$result"));
        echo $result_json;

    }


    // data  type: email, name, date_of_birth, new data: ..
    public
    function profile_update()
    {

        $this->load->model('User_manage');
        //update the profile !impotant

        header("Content-Type: application/json");

        //get the POST data and decode it.
        $data = json_decode(file_get_contents('php://input'), true);


        if ($data['type'] === "email") {
            $this->load->database();
            $this->db->where("user_id", $_SESSION['user_id']);
            $this->db->update('users', array('is_actived' => 0, 'email_address' => $data['email']));
            $result_json = json_encode(array("result" => "1")); // return 1 if success


            echo $result_json;
        } else if ($data['type'] === "name") {


            $this->load->database();
            $this->db->where("email_address", $_SESSION['email']);
            $this->db->update('users', array('first_name' => $data['first_name'], 'last_name' => $data['last_name']));
            $result_json = json_encode(array("result" => "1")); // return 1 if success
            echo $result_json;

        } else if ($data['type'] === "pwd") {

            $this->load->database();
            $this->load->model('User_manage');

            $email_existence = $this->User_manage->is_existed($data['email'], 'email');


            if ($email_existence === 1) {
                $user_info = $this->User_manage->get_user_info($data['email'], 'email');



                if ($user_info['first_name'] === $data['first_name'] && $user_info["last_name"] = $data["last_name"]) {

                    $encrypt_new_password = password_hash($data["new_password"], PASSWORD_DEFAULT);
                    $this->db->where("email_address", $data['email']);
                    $this->db->update('users', array('pwd' => $encrypt_new_password));
                    $result_json = json_encode(array("result" => "1"));
                    echo $result_json;


                } else {
                    $result_json = json_encode(array("result" => "0", "error" => "name_error"));
                    echo $result_json;

                }


            } else {
                $result_json = json_encode(array("result" => "0", "error" => "email_error")); // return 1 if success
                echo $result_json;
            }



        }


    }


}