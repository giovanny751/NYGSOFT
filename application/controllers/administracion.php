<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administracion_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        validate_login($this->session->userdata('user_id'));
    }

    function index() {
        $this->data['titulo']="Administracion de Formilarios";
        $formulario=$this->administracion_model->formulario_general();
        $this->data['formularios']=  get_dropdown_select($formulario,'form_formulario','form_nombreForm','-1','Seleccionar...');
        $this->layout->view('administracion/list', $this->data);
    }
    function nuevo_formulario_envio() {
        $this->data['titulo']="Administracion de Formilarios";
        $formulario=$this->administracion_model->formulario_general();
        $this->data['formularios']=  get_dropdown_select($formulario,'form_formulario','form_nombreForm','-1','Seleccionar...');
        $this->load->view('administracion/list', $this->data);
    }

    function nuevo_formulario() {
        $this->data['url2']=$this->administracion_model->maxForm();
        $this->load->view('administracion/nuevo_formulario', $this->data);
    }
    function guardar_formulario() {
        $post=  $this->input->post();
        $this->administracion_model->guardar_formulario($post);
        echo $this->nuevo_formulario_envio();
    }
    function empleado(){
        
        $this->layout->view('administracion/empleado');
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */