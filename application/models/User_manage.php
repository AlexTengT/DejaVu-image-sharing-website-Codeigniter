<?php
/**
 * Created by PhpStorm.
 * Date: 2019-05-01
 * Time: 12:26
 */


/**
 * Class User_manage
 * id type has teww types, uid stand for User ID, email stands for email address
 */
class User_manage extends CI_Model
{
    /**
     * @param $ID String
     * @param string $ID_type
     * @return int|string|null
     *              0 : if user doesn't exists
     *              1 : if user exists
     *              Error 0 : if error happened
     *              Error 1 : if error happened
     */
    public function is_existed($ID, $ID_type = 'uid')
    {
        $this->load->database();
        if ($ID_type === "uid") {
            $query = $this->db->get_where('users', array('user_id' => $ID));
        } else if ($ID_type === "email") {
            $query = $this->db->get_where('users', array('email_address' => $ID));
        } else {
            return "Error 0 in User_manage.is_existed";
        }

        if ($query->num_rows() == 0) {
            return 0;
        } else if ($query->num_rows() == 1) {
            return 1;
        } else {
            return "Error 1 in User_manage.is_existed";
        }

    }

    /**
     * @param $ID string
     * @param string $ID_type
     * @return int|string
     *          Error 0: An error
     *          0 : not activated
     *          1 : activated
     */
    public function is_activated($ID, $ID_type = 'uid')
    {
        $this->load->database();

        if ($ID_type === "uid") {
            $query = $this->db->get_where('users', array('user_id' => $ID));
        } else if ($ID_type === "email") {
            $query = $this->db->get_where('users', array('email_address' => $ID));
        } else {

            return "Error 0 in User_manage_is_activated";
        }

        $activated_state = $query->row()->is_actived;
        return (int)$activated_state;

    }

    /**
     * @param $ID
     * @param $pwd
     * @param $ID_type
     * @return int
     */
    public function login($ID, $pwd, $ID_type)
    {

        $existence = $this->is_existed($ID, $ID_type, $ID_type);

        if ($existence == 0) {
            return 0;
        } else if ($existence == 1) {
            $this->load->model('Security');
            $result = $this->Security->user_pwd_verification($ID, $pwd, $ID_type);
            return $result;

        }
    }

    /**
     * @param $ID
     * @param string $ID_type
     * @return mixed
     */
    public function get_user_info($ID, $ID_type='uid'){
        if ($ID_type == 'uid'){
            return "";

        } else if ($ID_type == 'email'){

            $this->load->database();
            $query = $this->db->get_where('users', array('email_address' => $ID));

            return (array)$query->row();
        }
}

    /**
     * @param $email_address string
     * @param $pwd string
     * @param $first_name string
     * @param $last_name string
     * @param $date_of_birth string
     * @param $avatar string
     * @return string
     *  return "success" if signup "success"
     *  return "email_existed" : email already existed
     */
    public
    function signup($email_address, $pwd, $first_name, $last_name, $date_of_birth, $avatar=null)
    {
        $existed_state = $this->is_existed($email_address, "email");
        $timestamp = time();

        $encrypt_pwd = password_hash($pwd, PASSWORD_DEFAULT);


        if ($existed_state == 1) {
            return "email_existed";

        } else if ($existed_state == 0) {
            $this->load->database();
            $data = array(
                "email_address" => $email_address,
                "pwd" => $encrypt_pwd,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "date_of_birth" => $date_of_birth,
                "created_timestamp"=>$timestamp,
                "avatar"=>$avatar,
            );
            $this->db->insert("users", $data);
            return 'success';
        }

    }


    /**
     * Only support uid:
     * @param $ID String
     * @param string $ID_type string
     * @return string
     *          already_activated : user already activated
     *          success : success
     *          Error 0 : a database error may happen
     *          Error 1 : error type should by 'uid'
     */
    public
    function activate_account($ID, $ID_type = 'uid')
    {

        if ($ID_type != 'uid') {
            return "Error 1";
        }
        $activated_state = $this->is_activated($ID, $ID_type);


        if ($activated_state == 1) {
            return "already_activated";

        } else if ($activated_state == 0) {

            $this->load->database();
            $this->db->where("user_id", $ID);
            $this->db->update('users', array('is_actived'=>1));
            return 'success';
        }
    }



    // only support emai
    // return 1 if success
    public function profile_update($ID, $ID_type='email', $new_data_type ,$new_data)
    {




    }

    public function generate_activate_link($last_name, $email){
        return base_url().'email_verification?email='.urlencode($email).'&code='.urlencode($this->generate_activate_code($last_name));
    }

    public function generate_activate_code($plain_test){
        return md5($plain_test);
    }




}
