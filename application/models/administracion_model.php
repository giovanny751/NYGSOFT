<?php

class administracion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function formulario_general() {
        $datos=$this->db->get('adminFormularios');
        return $datos->result_array();
    }
    function guardar_formulario($post){
        $this->db->insert('adminformularios',$post);
    }
    function maxForm(){
        $this->db->select('MAX(form_formulario) form_formulario',false);
        $dato=$this->db->get('adminformularios');
        $dato=$dato->result_array();
        return $dato[0]['form_formulario'];
    }
    function guardaradministracion($campos,$tabla){
        
        $this->db->insert_batch($tabla,$campos);
//        echo $this->db->last_query();
        
    }

}
