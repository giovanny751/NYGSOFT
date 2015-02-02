<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ingresoform extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingresoform_model');
    }

    function empresa() {
        $this->layout->view('ingresoform/empresa', $this->data);
    }

    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */