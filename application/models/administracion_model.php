<?php

class administracion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function formulario_general() {
        $datos = $this->db->get('adminFormularios');
        return $datos->result_array();
    }

    function guardar_formulario($post) {
        $this->db->insert('adminformularios', $post);
    }

    function maxForm() {
        $this->db->select('MAX(form_formulario) form_formulario', false);
        $dato = $this->db->get('adminformularios');
        $dato = $dato->result_array();
        return $dato[0]['form_formulario'];
    }

    function guardaradministracion($campos, $tabla) {

        $this->db->insert_batch($tabla, $campos);
//        echo $this->db->last_query();
    }

    function guardarvehiculo($vehiculo) {

        $this->db->insert_batch('vehiculo', $vehiculo);
    }

    function confirmacion() {

        $dato = $this->db->get('confirmacion');
        return $dato->result_array();
    }

    function tipovehiculo() {

        $dato = $this->db->get('tipo_vehiculo');
        return $dato->result_array();
    }

    function tiposervicio() {

        $dato = $this->db->get('tipo_servicio');
        return $dato->result_array();
    }

    function usuarios() {
//        $this->db->where('',$empresa);
        $this->db->where('est_id !=', 3);
        $dato = $this->db->get('user');
        return $dato->result_array();
    }

    function eliminarusuario($id) {

        $this->db->where('usu_id', $id);
        $this->db->delete('user');
    }
    function eliminarvehiculo($id) {

        $this->db->where('veh_id', $id);
        $this->db->delete('vehiculo');
    }

    function cambioestado($id, $estado) {

        $this->db->where('usu_id', $id);
        $this->db->set('est_id', $estado);
        $this->db->update('user');
    }
    function cambioestadovehiculo($id, $estado) {

        $this->db->where('veh_id', $id);
        $this->db->set('est_id', $estado);
        $this->db->update('vehiculo');
    }

    function reportevehiculos() {

        $this->db->where('est_id !=', 3);
        $this->db->join('tipo_vehiculo','vehiculo.tipVeh_id = tipo_vehiculo.tipVeh_id');
        $dato = $this->db->get('vehiculo');
        return $dato->result_array();
    }

}
