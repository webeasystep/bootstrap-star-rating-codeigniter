<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* @property rating_model $rating_model */

class Rating extends Front_end
{
    // default user and news id ,you can change
    public $user_id = 1 ;
    public $news_id = 38;

    function __construct()
    {
        parent::__construct();

        $this->lang->load('rating');
        $this->load->model('rating_model');
        $this->load->library('form_validation');
    }

    /**
     *  display all ratings in specfic item.
     */
    function index()
    {
        $data['rated'] = $this->rating_model->get_rate_numbers($this->news_id,$this->user_id);
        $data['news'] = $this->rating_model->get_one($this->news_id);
        $this->view('content/ratings',$data);
    }



    // create new rate
    function create_rate()
    {
        $news_id = $this->input->post("pid");
        $rate =  $this->input->post("score");

        $data['rated'] = $this->rating_model->get_rate_numbers($this->news_id,$this->user_id);
            //check the item is rated already
           if($data['rated'] == FALSE ) {
                // if no send new rate record
               $this->rating_model->insert_rate($news_id,$rate,$this->user_id);
               $this->session->set_userdata('uid',$this->user_id);
            }else {
                // else get news rate id and update value
                $rate_id = $this->rating_model->get_item_rate($news_id);
                $this->rating_model->update_rate($rate_id->nrt_id,$rate,$this->user_id);
               $this->session->set_userdata('uid',$this->user_id);

            }

    }

    function login(){

    }

    function clear_user_rating(){
        $this->rating_model->delete_user_rating($this->news_id,$this->user_id);
        $this->session->sess_destroy();
        redirect('rating');

    }



}

/* End of file dashboard.php */
/* Location: ./system/application/modules/matchbox/controllers/dashboard.php */