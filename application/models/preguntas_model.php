<?php

class Preguntas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function guardarpregunta($pregunta){
        
        $this->db->set('pre_pregunta',$pregunta);
        $this->db->insert('preguntas');
    }
    function editarpregunta($pregunta,$id){
        
        $this->db->where('pre_id',$id);
        $this->db->set('pre_pregunta',$pregunta);
        $this->db->update('preguntas');
    }
    function eliminarpregunta($id){
        
        $this->db->where('pre_id',$id);
        $this->db->set('pre_estado',3);
        $this->db->update('preguntas');
    }
    function todaspreguntas(){
        
        $this->db->where('pre_estado !=',3);
        $preguntas = $this->db->get('preguntas');
        return $preguntas->result_array();     
    }
    function preguntasusuario($id){
//        $this->db->where('pre_estado',1);
//        $this->db->where('pre_estado',3);
        $this->db->where('respuesta_usuario.usu_id',$id);
        $this->db->join('respuesta_usuario','respuesta_usuario.pre_id = preguntas.pre_id');
        $preguntas = $this->db->get('preguntas');
//        echo $this->db->last_query();die;
        return $preguntas->result_array();        
    }
    function preguntasusuarioresponder(){

        $preguntas = $this->db->get('preguntas');
        return $preguntas->result_array();        
    }
    function ingresarrespuestas($array){
        
        $this->db->insert_batch('respuesta_usuario',$array);
        echo $this->db->last_query();
    }
}
