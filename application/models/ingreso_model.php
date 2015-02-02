<?php

class Ingreso_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function guardar_emp($post){
        foreach ($post as $key => $value) {
            $this->db->set($key,$value);
        }
        $this->db->insert('empresa');
    }
}
