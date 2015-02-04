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
        $this->data['titulo'] = "Registro Empresa";
        $this->layout->view('ingresoform/empresa', $this->data);
    }

    function guardar_emp() {
        $post = $this->input->post();
        $this->Ingresoform_model->guardar_emp($post);
    }

    function lisEmpresa() {
        $this->data['titulo'] = "Empresas";
        $this->layout->view('ingresoform/lisEmpresa', $this->data);
    }

    function get_datatable() {
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_table();
            echo $data;
        } else {
            echo 'Acceso no utorizado';
        }
    }

    function ingresarempresa() {

        $this->layout->view('ingresoform/ingresarempresa');
    }

    function enviocorreoempresa() {

        $empresa = $this->input->post('empresa');
        $correo = $this->input->post('correo');
        $nit = $this->input->post('nit');
        $log = array();

        $log[] = array('corEnv_nit' => $nit, 'corEnv_empresa' => $empresa, 'corEnv_correo' => $correo);

        $this->Ingresoform_model->guardarlogenviocorreo($log);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */