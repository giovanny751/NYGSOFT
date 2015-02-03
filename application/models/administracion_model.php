<?php

class administracion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function formulario_general() {
        $datos=$this->db->get('adminFormularios');
        return $datos->result_array();
    }

}
