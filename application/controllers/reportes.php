<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reportes extends My_Controller {

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
        $this->layout->view('reportes/reportes',$this->data);
        
    }
    
    function inforeport(){
        $id = $this->input->post('id');
        $informacion = $this->Reportes_model->inforeport($id); 
        $this->output->set_content_type('application/json')->set_output(json_encode($informacion[0]));
    }
    function editreport(){
        
        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $estado = $this->input->post('estado');
        
        $editar = $this->Reportes_model->editreport($id,$nombre,$estado);
        
    }
    
    function allreport(){
        
        $id = $this->input->post('id');
        $editar = $this->Reportes_model->allreport($id);
    }
    
    function guardartodoreporte(){
        
        $id = $this->input->post('idreporte');
        
        $data = array(
            'rep_nombre'=>$this->input->post('reporte'),
            'rep_query'=>$this->input->post('query'),
            'rep_host'=>$this->input->post('host'),
            'rep_user'=>$this->input->post('user'),
            'rep_password'=>$this->input->post('password'),
        );
        
        $this->Reportes_model->guardartodoreporte($data,$id);
    }

    function validarquery() {
        $query = $this->input->post('query');
        $id = 1;
        $validar = $this->Reportes_model->validarquery($id, $query);
        
//        var_dump($validar);die;
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