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
    }

    function preguntasseleccion() {

        $this->data['preguntas'] = $this->preguntas_model->todaspreguntas();
        $this->layout->view('preguntas/preguntasseleccion', $this->data);
    }

    function guardarpreguntas() {

        $pregunta = $this->input->post('pregunta');
        $id = $this->input->post('id');
        $opcion = $this->input->post('opcion');

        if ($opcion == 1) {
            $preguntas = $this->preguntas_model->guardarpregunta($pregunta);
        } else {
            $preguntas = $this->preguntas_model->editarpregunta($pregunta, $id);
        }
    }

    function eliminarpregunta() {

        $id = $this->input->post('id');
        $preguntas = $this->preguntas_model->eliminarpregunta($id);
    }

    function preguntasusuario() {
        
        $id = $this->ion_auth->user()->row();
        $preguntascontestadas = $this->preguntas_model->preguntasusuario($id->id);
        
        $this->data['preguntas'] = "";
        $this->data['contador'] = count($preguntascontestadas);
        if($this->data['contador'] == 0){
            $this->data['preguntas'] = $this->preguntas_model->preguntasusuarioresponder();
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

        $array = array();
        $idusuario = $this->ion_auth->user()->row()->id;
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
        $this->preguntas_model->ingresarrespuestas($array);
    }
    function informacionusuario(){
        
        $this->layout->view('preguntas/informacionusuario');
        
    }

}
