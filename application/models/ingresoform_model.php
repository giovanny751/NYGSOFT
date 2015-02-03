<?php

class Ingresoform_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function guardar_emp($post){
        $datos = array();
        $datos[] = $post;
        $insertar = array();
        foreach ($post as $key => $value) {
            if($key!="emp_idArl_otra" && !empty($value))
            $insertar[$key] = $value;
        }
        
        $this->db->insert('empresa',$insertar);
        
        echo $this->db->last_query();
    }

}

