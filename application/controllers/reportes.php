<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $numero = "";

        $this->load->database();
        $this->load->model('Reportes_model');
        $this->data['menu_completo'] = $this->session->userdata('menu');
        $this->data['user'] = $this->ion_auth->user()->row();
    }

    function totalreportes() {
        $this->data['reporte'] = $this->Reportes_model->totalreportes();
        $this->load->view('reportes/reportes',$this->data);
        
    }

    function validarquery() {
        $query = $this->input->post('query');
        $id = 1;
        $this->Reportes_model->validarquery($id, $query);
    }

    function guardarreporte() {
        $reporte = $this->input->post('nuevoreporte');
        $this->Reportes_model->guardarreporte($reporte);

        $reportes = $this->Reportes_model->totalreportes();
        $this->output->set_content_type('application/json')->set_output(json_encode($reportes));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */