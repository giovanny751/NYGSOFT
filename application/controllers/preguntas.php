<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Preguntas extends My_Controller {

    function __construct() {
        parent::__construct();
//        $numero = "";
//        $this->load->js('js/jquery.min.js');
        $this->load->database();
        $this->load->model('preguntas_model');
        $this->data['usuario'] = 1; 
    }

    function administracionpreguntas() {

        $this->data['tipo'] = $this->preguntas_model->tipopregunta();
        $this->layout->view('preguntas/administracionpreguntas', $this->data);
    }

    function guardartipopregunta() {

        $tipopregunta = $this->input->post('tipo');

        $this->preguntas_model->guardartipopregunta($tipopregunta);
        $tipo = $this->preguntas_model->tipopregunta();
        $this->output->set_content_type('application/json')->set_output(json_encode($tipo));
    }

    function guardaropcionpregunta() {

        $tipopregunta = $this->input->post('tipo');
        $opcion = $this->input->post('opcion');

        $this->preguntas_model->guardaropcionpregunta($tipopregunta, $opcion);
    }

    function preguntasseleccion() {
        $this->data['tipo'] = $this->preguntas_model->tipopregunta();
        $this->data['preguntas'] = $this->preguntas_model->todaspreguntasseleccion();
        $this->layout->view('preguntas/preguntasseleccion', $this->data);
    }

    function consultaopciones() {

        $id = $this->input->post('id');
        $opciones = $this->preguntas_model->opcionpregunta($id);

        $this->output->set_content_type('application/json')->set_output(json_encode($opciones));
    }

    function guardarpreguntas() {

        $pregunta = $this->input->post('pregunta');
        $opcionpregunta = $this->input->post('opcionpregunta');
        $tipos = $this->input->post('tipos');
        $id = $this->input->post('id');
        $opcion = $this->input->post('opcion');

        if ($opcion == 1) {
            $preguntas = $this->preguntas_model->guardarpregunta($pregunta, $opcionpregunta, $tipos);
        } else {
            $preguntas = $this->preguntas_model->editarpregunta($pregunta, $id, $opcionpregunta, $tipos);
        }
    }

    function eliminarpregunta() {

        $id = $this->input->post('id');
        $preguntas = $this->preguntas_model->eliminarpregunta($id);
    }

    function preguntasusuario() {

        $id = $this->data['usuario'];
        $preguntascontestadas = $this->preguntas_model->preguntasusuario($id);

        $this->data['contador'] = count($preguntascontestadas);
        if ($this->data['contador'] == 0) {
            $this->data['preguntas'] = $this->preguntas_model->todaspreguntas();
            $this->data['i'] = array();
//        echo "<pre>";
//        var_dump($this->data['preguntas']);die;
            foreach ($this->data['preguntas'] as $pregunta) {
                $this->data['i'][$pregunta['tipPre_tipo']][$pregunta['opcPre_opcion']][$pregunta['pre_id']] = $pregunta['pre_pregunta'];
            }
        }

        $this->layout->view('preguntas/preguntasusuario', $this->data);
    }

    function guardarpreguntasusuario() {

        $si = $this->input->post('si');
        $no = $this->input->post('no');
        $na = $this->input->post('na');

        $contadorsi = count($si);
        $contadorno = count($no);
        $contadorna = count($na);
        
//        echo $contadorsi."***".$contadorno."***".$contadorna;die;

        $array = array();
        $idusuario = $this->data['usuario'];
        if (!empty($si)) {
            for ($i = 0; $i < $contadorsi; $i++) {
                $array[] = array('resUsu_respuesta' => "SI", 'usu_id' => $idusuario, 'pre_id' => $si[$i]);
            }
        }
        if (!empty($no)) {
            for ($i = 0; $i < $contadorno; $i++) {
                $array[] = array('resUsu_respuesta' => "NO", 'usu_id' => $idusuario, 'pre_id' => $no[$i]);
            }
        }
        if (!empty($na)) {
            for ($i = 0; $i < $contadorna; $i++) {
                $array[] = array('resUsu_respuesta' => "NA", 'usu_id' => $idusuario, 'pre_id' => $na[$i]);
            }
        }
        
//        echo "<pre>";
//        var_dump($array);die;
        $this->preguntas_model->ingresarrespuestas($array);
    }

    function informacionusuario() {

        $this->layout->view('preguntas/informacionusuario');
    }
    function cambiodeestadopregunta(){
        
        $id = $this->input->post('id');
        $estado = $this->input->post('estado');
        $this->preguntas_model->actualizacionestadopregunta($id,$estado);
    }

}
