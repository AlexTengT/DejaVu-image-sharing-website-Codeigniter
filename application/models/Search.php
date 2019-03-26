<?php

class Search extends CI_Model
{

    public function __construct() {
        parent::__construct();

    }


    /**
     * @param $keywords array keywords
     * @return array result
     */
    public function search($keywords){

        // print_r($keywords);
        $result = array();
        foreach($keywords as $key){


            $this->db->select('*');
            $this->db->from('images');

            if(!empty($key)) {
                $this->db->group_start();
                $this->db->like('description', $key);
                // $this->db->or_like('description', $keyword);
                $this->db->group_end();
            }
            $query = $this->db->get();
            $result = array_merge($result, $query->result_array());
        }



//        echo '<pre>';
//        print_r(array_unique($result, SORT_REGULAR));
//        echo '</pre>';

        return array_unique($result, SORT_REGULAR);

    }




    public function search_on_user($user, $keywords = null){
        return;
    }



}