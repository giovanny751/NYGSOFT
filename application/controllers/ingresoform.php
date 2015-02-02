<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ingresoform extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingresoform_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        validate_login($this->session->userdata('user_id'));
    }

    function empresa() {
        $this->layout->view('ingresoform/empresa', $this->data);
    }
    function guardar_emp() {
        $post=$this->input->post();
        $this->ingresoform_model->guardar_emp($post);
//        print_y($post);
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */