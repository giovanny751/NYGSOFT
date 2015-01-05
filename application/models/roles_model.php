<?php

class Roles_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
        
    }
    
    function roles(){
        
        $consulta = $this->db->get('roles');
        
//        echo $this->db->last_query();die;
        
        return $consulta->result_array();
    }
    
    function guardarrol($nombre){
        
        $this->db->set('rol_nombre',$nombre);
        
        $this->db->insert('roles');
        
    } 
}