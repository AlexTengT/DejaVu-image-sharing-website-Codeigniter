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
class Email_manage extends CI_Model
{


    public function send_email($to, $message="test" ,$from_email='noreply.dejavu@gmail.com', $from='Dejavu', $subject="Dejavu Message | No Reply", $mail_type="html"){


        //echo $message;
        //Load email library
        $this->load->library('email');
        //$this->config->load('email');

        $this->email->set_mailtype($mail_type);
        $this->email->set_newline("\r\n"); // why do i need to keep you?


        $this->email->to($to);
        $this->email->from($from_email, $from);
        $this->email->subject($subject);
        $this->email->message($message);

        //Send email
        if($this->email->send()){
            echo 'Email sent.';
            return "sent";
        }
        else
        {
            return "Error in Email_manage.send_email";
            show_error($this->email->print_debugger());
        }


    }




}