<?php
/**
 * Created by PhpStorm.
 * Time: 12:15
 */

class Security extends CI_Model
{

    /**
     * @param $ID String|int The id includeing email or user id
     * @param $pwd String password
     * @param string $ID_type String "email" or "uid"
     * @return string|null success if matched, fail if not matched,
     *          Error 0: The id_type doesn't exist
     *          Error 1: Cannot find user by the ID
     *          Error
     */
    public function user_pwd_verification($ID, $pwd, $ID_type = 'uid')
    {
        //todo: verify the password, return true if it is valid, others false
        $this->load->database();

        if ($ID_type === "uid") {
            $query = $this->db->get_where('users', array('user_id' => $ID));

        } else if ($ID_type === "email") {
            $query = $this->db->get_where('users', array('email_address' => $ID));
        } else {
            return "error 0";
        }


        if ($query->num_rows() == 0){
            return "error 1";
        };

        $correct_pwd = $query->row()->pwd;
        if (password_verify ( $pwd , $correct_pwd )) {
            return "success";
        } else {
            return "fail";
        }

    }

    /**
     * @param $ID string
     * @param $new_password string
     * @param string $ID_type string only support 'uid' now
     * @return string
     */
    public function edit_password($ID, $new_password, $ID_type = 'uid')
    {
        $this->load->database();
        $this->db->where("user_id", $ID);
        $result = $this->db->update('users', array('pwd'=>$new_password));
        if ($result == 1){
            return "success";
        } else {
            return "Error 0 in Security.edit_password";
        }
    }

    public function edit_username($ID, $new_username, $ID_type = 'uid')
    {
        //todo:
        return;
    }

    /**
     * @param $ID string str9jy
     * @param $new_email string
     * @param string $ID_type string
     * @return string
     */
    public function edit_email($ID, $new_email, $ID_type = 'email')
    {
        $this->load->database();
        $this->db->where("user_id", $ID);
        $result = $this->db->update('users', array('email_address'=>$new_email));
        if ($result == 1){
            return "success";
        } else {
            return "Error 0 in Security.edit_mail";
        }
    }

    /**
     * @param $ID sting
     * @param $new_date_of_birth string
     * @param string $ID_type string
     * @return string sting
     */
    public function edit_date_of_birth($ID, $new_date_of_birth, $ID_type = 'uid')
    {
        $this->load->database();
        $this->db->where("user_id", $ID);
        $result = $this->db->update('users', array('date_of_birth'=>$new_date_of_birth));
        if ($result == 1){
            return "success";
        } else {
            return "Error 0 in Security.edit_mail";
        }

    }




}