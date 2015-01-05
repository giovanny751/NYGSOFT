<?php

class Reportes_model extends CI_Model {

    function __construct() {
        parent::__construct();       
    }
    
    function validarquery($id,$query){
        
       
           
    }
    function guardarreporte($reporte){
        
        $this->db->set('rep_nombre',$reporte);
        $this->db->insert('reportes');
    }
    function totalreportes(){
        $reportes= $this->db->get('reportes');
        return $reportes->result_array();
    }
    
}