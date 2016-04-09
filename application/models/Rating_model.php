<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rating_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }


    /*  This function get ratings count number
    related to specfic item id.
     */
    function get_one($ne_id)
    {
        return $this->db->query("SELECT *
        FROM ci_news
          LEFT JOIN ci_news_rating ON ci_news.ne_id = ci_news_rating.nrt_item_id
        WHERE ne_id='$ne_id' GROUP BY ne_id")->row();
    }

    function get_rate_numbers($item_id,$user_id) {
        $rate_num = $this->db->query("select * from
 ci_news_rating LEFT JOIN ci_rating_counter ON ci_news_rating.nrt_id = ci_rating_counter.rtc_rate_id
 where nrt_item_id='$item_id' AND rtc_user_id = $user_id");
        if ($rate_num->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }



    /*
 * This function check if user
    has rated specfic item or not
*/
    function get_user_numrate($item_id,$userid) {
        $rate_num = $this->db->query("
        select * from ci_news_rating
         INNER JOIN ci_rating_counter ON rtc_rate_id = nrt_id
         where nrt_item_id ='$item_id'
         AND  rtc_user_id ='$userid' ");
        if ($rate_num->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    /*  This function get ratings
    related to specfic item id. */

    function get_item_rate($item_id) {
        $query = $this->db->query("select * from ci_news_rating where nrt_item_id='$item_id'");
        if ($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;

        }else{
            return false;
        }
    }


    /*  This function insert ratings
    with item id and user id. */

    function insert_rate($id,$rate,$user_id) {
        $this->db->query("insert into ci_news_rating values('','$id','1','$rate')");
        $last_id = $this->db->insert_id();
        $this->db->query("insert into ci_rating_counter values('',$last_id,$user_id,UNIX_TIMESTAMP())");
        return true;
    }



    function update_rate($id,$rate,$user_id) {

        $upadte_rate1=$this->db->query("select * from ci_news_rating where nrt_item_id='$id'")->row();

        $total_rates= $upadte_rate1->nrt_total_rates+1;
        $total_points= $upadte_rate1->nrt_total_points+$rate;
        $rate_id= $upadte_rate1->nrt_id;
        $this->db->query("update ci_news_rating set nrt_total_rates='$total_rates', nrt_total_points='$total_points' where nrt_id='$rate_id'");
        $this->db->query("insert into ci_rating_counter values('','$id',$user_id,UNIX_TIMESTAMP())");

        return true;
    }


    /* This function delete categor of new from database. */

    function delete_user_rating($news_id,$user_id) {
        $this->db->query("
                    DELETE ci_news_rating,ci_rating_counter
                    FROM ci_rating_counter
                      LEFT JOIN ci_news_rating ON ci_news_rating.nrt_id = ci_rating_counter.rtc_rate_id
                      WHERE nrt_item_id = $news_id
                      AND  rtc_user_id = $user_id
                     ");

        return TRUE;
    }






}
