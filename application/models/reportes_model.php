<?php

class Reportes_model extends CI_Model {

    function __construct() {
        parent::__construct();       
    }
    
    function validarquery($id,$query){
        
       $query = $this->db->query("desc $query");
       
       return $query->result_array();
    }
    function guardarreporte($reporte){
        
        $this->db->set('rep_nombre',$reporte);
        $this->db->insert('reportes');
    }
    function totalreportes(){
        $reportes= $this->db->get('reportes');
        return $reportes->result_array();
    }
    
    function inforeport($id){
        
        $this->db->where('rep_id',$id);
        $reportes= $this->db->get('reportes');
        return $reportes->result_array(); 
    }
    function editreport($id,$nombre,$estado){
        
        $this->db->where('rep_id',$id);
        $this->db->set('rep_nombre',$nombre);
        $this->db->set('rep_estado',$estado);
        $this->db->update('reportes');
        echo $this->db->last_query();
    }
    function allreport(){
        
            
        
    }
    function guardartodoreporte($data,$id){
        
        $this->db->where('rep_id',$id);
        $this->db->update('reportes',$data);
        
    }
}