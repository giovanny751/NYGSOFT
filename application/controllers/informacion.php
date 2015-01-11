<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$padre = "prueba";

class Informacion extends My_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->model('Informacion_model');
    }

    function url() {


        $this->data['url'] = $this->Informacion_model->informacion_personal();
        $this->layout->view('informacion/url', $this->data);
    }

    function guardarinformacion() {

        $data[] = array(
            'infPer_nombre' => $this->input->post('nombre'),
            'infPer_url' => $this->input->post('url')
        );

        $this->Informacion_model->guardarinformacion($data);
        $url = $this->Informacion_model->informacion_personal();

        $this->output->set_content_type('application/json')->set_output(json_encode($url));
    }

    function editarinformacion() {

        $id = $this->input->post('id');

        $data = array(
            'infPer_nombre' => $this->input->post('nombre'),
            'infPer_url' => $this->input->post('url')
        );

        $this->Informacion_model->editarinformacion($data, $id);
        $url = $this->Informacion_model->informacion_personal();

        $this->output->set_content_type('application/json')->set_output(json_encode($url));
    }

    function eliminarurl() {
    
        $id = $this->input->post('id');
         $this->Informacion_model->eliminarurl($id);
    }

    function consultarusuario() {

        $this->layout->view('informacion/consultarusuario');
    }
    function consultaurlusuario(){
        $datos=$this->Informacion_model->consultaurlusuario();
        $this->output->set_content_type('application/json')->set_output(json_encode($datos));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */