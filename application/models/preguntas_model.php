<?php

class Preguntas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function guardarpregunta($pregunta,$opcionpregunta,$tipos){
        
        $this->db->set('pre_pregunta',$pregunta);
        $this->db->set('tipPre_id',$tipos);
        $this->db->set('opcPre_id',$opcionpregunta);
        $this->db->insert('preguntas');
    }
    function editarpregunta($pregunta,$id,$opcionpregunta,$tipos){
        
        $this->db->where('pre_id',$id);
        $this->db->set('pre_pregunta',$pregunta);
        $this->db->set('tipPre_id',$tipos);
        $this->db->set('opcPre_id',$opcionpregunta);
        $this->db->update('preguntas');
    }
    function eliminarpregunta($id){
        
        $this->db->where('pre_id',$id);
        $this->db->set('pre_estado',3);
        $this->db->update('preguntas');
    }
    function todaspreguntasseleccion(){
        
        $this->db->where('pre_estado !=',3); 
        $preguntas = $this->db->get('preguntas');
        
//        echo $this->db->last_query();
        
        return $preguntas->result_array();     
    }
    function todaspreguntas(){
        
        $this->db->where('pre_estado !=',3);
        $this->db->where('pre_estado !=',2);
        $this->db->select('preguntas.pre_id,tipo_pregunta.tipPre_id,opcion_pregunta.opcPre_id,tipo_pregunta.tipPre_tipo,opcion_pregunta.opcPre_opcion,preguntas.pre_pregunta');
        $this->db->join('tipo_pregunta','tipo_pregunta.tipPre_id = preguntas.tipPre_id'); 
        $this->db->join('opcion_pregunta','preguntas.opcPre_id = opcion_pregunta.opcPre_id'); 
        $preguntas = $this->db->get('preguntas');
        
//        echo $this->db->last_query();
        
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
    function tipopregunta(){
        $tipo = $this->db->get('tipo_pregunta');
        return $tipo->result_array();
    }
    function opcionpregunta($id = null){
        
        if(!empty($id))$this->db->where('tipPre_id',$id);
        $opcion = $this->db->get('opcion_Pregunta');
        return $opcion->result_array();
    }
    
    function guardartipopregunta($tipopregunta){
        $tipo = array();
        $tipo[] = array('tipPre_tipo'=>$tipopregunta);
        $this->db->insert_batch('tipo_pregunta',$tipo);
        
    }
    function guardaropcionpregunta($tipopregunta,$opcion){
        $tipo = array();
        $tipo[] = array('tipPre_id'=>$tipopregunta,'opcPre_opcion'=>$opcion);
        $this->db->insert_batch('opcion_Pregunta',$tipo);
    }
    function actualizacionestadopregunta($id,$estado){
        
        $this->db->where('pre_id',$id);
        if($estado == 1){
            $this->db->set('pre_estado',2);
        } else{
            $this->db->set('pre_estado',1);
        }
        
        $this->db->update('preguntas');
        
    }
}
