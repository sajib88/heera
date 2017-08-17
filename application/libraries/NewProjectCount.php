<?php
defined('BASEPATH') OR exit('No direct script access allowed.');

class NewProjectCount
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance(); //read manual: create libraries

        $dataX = array(); // set here all your vars to views

        $this->CI->load->model('Global_model');
       // $dataX['count'] = $CI->global_model->count_row_where('project', array('statusID' => NULL));

        $dataX['count'] = $this->CI->Global_model->count_row_where('project', array('statusID' => NULL));


        $this->CI->load->vars($dataX);
    }
}


?>