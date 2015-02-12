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
    function cargos(){
        
        $cargo = $this->db->get('cargo');
        return $cargo->result_array();
    }
    function grupotrabajo(){
        
        $grupotrabajo = $this->db->get('grupo_trabajo');
        return $grupotrabajo->result_array();
    }
    function genero(){
        
        $genero = $this->db->get('genero');
        return $genero->result_array();
    }
    function desicion(){
        
        $genero = $this->db->get('confirmacion');
        return $genero->result_array();
    }
    function causas(){
        
        $genero = $this->db->get('causas');
        return $genero->result_array();
    }
    function categoria(){
        
        $genero = $this->db->get('categoria');
        return $genero->result_array();
    }

    function guardarempleado($data,$id){
        
        $this->db->where('usu_id',$id);
        $this->db->update('user',$data);
        
    }
    function datosusuario($id){
        
        $this->db->where('usu_id',$id);
        $user = $this->db->get('user');
        return $user->result_array();
    }
//    function guardarempleado($post) {
//        $post['usu_segundoapellido'] = $post['usu_segundoapellido'] . " ";
//        $this->db->where('usu_cc', $post['usu_cc']);
//        $this->db->update('user', $post);
//        if (($this->db->affected_rows()) > 0) {
//            $this->db->insert('user', $post);
//        }
//    }
}
