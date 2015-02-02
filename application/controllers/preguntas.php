<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preguntas extends My_Controller {

    function __construct() {
        parent::__construct();
//        $numero = "";
//        $this->load->js('js/jquery.min.js');
        $this->load->database();
        $this->load->model('ingreso_model');
        $this->load->model('Roles_model');
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->data['menu_completo'] = $this->session->userdata('menu');
    }

    function preguntasseleccion(){
        
        
    }

}