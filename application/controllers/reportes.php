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

    public function creacionreporte() {

        if (!empty($this->data['user'])) {

            $this->data['hijo'] = $this->input->post('menu');
            $this->data['nombrepadre'] = $this->input->post('nombrepadre');
            $this->data['idgeneral'] = $this->input->post('idgeneral');

//            echo $this->data['idgeneral'];

            if (empty($this->data['idgeneral']))
                $this->data['hijo'] = 0;

            $this->data['menu'] = $this->Reportes_model->consultahijos($this->data['idgeneral']);

//            var_dump($this->data['menu'] );

            if (!empty($this->data['idgeneral'])) {

                $this->data['menu'] = $this->Reportes_model->hijos($this->data['idgeneral']);
            }

//            $this->data['content'] = 'presentacion/menu';
            $this->layout->view('reportes/creacionreporte', $this->data);
//            $this->load->view('presentacion/menu', $this->data);
        } else {
            redirect('auth/login', 'refresh');
        }
    }

        function guardarmodulo() {


        if (!empty($this->data['user'])) {
            $modulo = $this->input->post('modulo');
            $padre = $this->input->post('padre');
            $general = $this->input->post('general');
            $actualizamodulo = $this->Reportes_model->actualizahijos($general);

            $guardamodulo = $this->Reportes_model->guardarmodulo($modulo, $padre, $general);
            $menu = $this->Reportes_model->cargamenu($general);


            $this->output->set_content_type('application/json')->set_output(json_encode($menu));
        } else {
            redirect('auth/login', 'refresh');
        }
    }
    function consultadatosmenu() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $datos = $this->ingreso_model->consultamenu($idgeneral);

            $this->output->set_content_type('application/json')->set_output(json_encode($datos[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }
    
    function totalreportes() {
        $this->data['reporte'] = $this->Reportes_model->totalreportes();
        $this->layout->view('reportes/reportes', $this->data);
    }

    function inforeport() {
        $id = $this->input->post('id');
        $informacion = $this->Reportes_model->inforeport($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($informacion[0]));
    }

    function editreport() {

        $id = $this->input->post('id');
        $nombre = $this->input->post('nombre');
        $estado = $this->input->post('estado');

        $editar = $this->Reportes_model->editreport($id, $nombre, $estado);
    }

    function allreport() {

        $id = $this->input->post('id');
        $reportes = $this->Reportes_model->inforeport($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($reportes[0]));
    }

    function guardartodoreporte() {

        $id = $this->input->post('idreporte');  

        $data = array(
            'rep_nombrepadre' => $this->input->post('reporte'),
            'rep_query' => $this->input->post('query'),
            'rep_host' => $this->input->post('host'),
            'rep_user' => $this->input->post('user'),
            'rep_password' => $this->input->post('password'),
        );

        $this->Reportes_model->guardartodoreporte($data, $id);
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

    function informacionreporte() {

        $id = 1;
        $informacion = $this->Reportes_model->inforeport($id);

        $this->layout->view('reportes/informacionreporte');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */