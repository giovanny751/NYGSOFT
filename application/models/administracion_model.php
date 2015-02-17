<?php

class administracion_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //datos de vehiculo
    function vehiculo($id) {
        $this->db->where('veh_id', $id);
        $dato = $this->db->get('vehiculo');
        return $dato->result();
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

    function    guardaradministracion($campos, $tabla) {

        $this->db->insert_batch($tabla, $campos);
//        echo $this->db->last_query();
    }

    function guardarvehiculo($vehiculo) {
        if (empty($vehiculo['veh_id'])) {
            $this->db->insert('vehiculo', $vehiculo);
        } else {
            $this->db->where('emp_id', $vehiculo['emp_id']);
            $this->db->where('veh_id', $vehiculo['veh_id']);
            $this->db->update('vehiculo', $vehiculo);
        }
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
        $this->db->join('tipo_vehiculo', 'vehiculo.tipVeh_id = tipo_vehiculo.tipVeh_id');
        $dato = $this->db->get('vehiculo');
        return $dato->result_array();
    }

    function cargos() {

        $cargo = $this->db->get('cargo');
        return $cargo->result_array();
    }

    function grupotrabajo() {

        $grupotrabajo = $this->db->get('grupo_trabajo');
        return $grupotrabajo->result_array();
    }

    function genero() {

        $genero = $this->db->get('genero');
        return $genero->result_array();
    }

    function desicion() {

        $genero = $this->db->get('confirmacion');
        return $genero->result_array();
    }

    function causas() {
        
        $this->db->join('causas_usuario','causas_usuario.cau_id = causas.cau_id','left');
        $causas = $this->db->get('causas');
//        echo $this->db->last_query();
        return $causas->result_array();
    }

    function categoria() {

        $genero = $this->db->get('categoria');
        return $genero->result_array();
    }

    function guardarempleado($data, $id) {

        $this->db->where('usu_id', $id);
        $this->db->update('user', $data);
        
//        echo $this->db->last_query();die;
    }
    function guardarfactores($factores){
        
        $this->db->insert_batch('factor_usuario',$factores);
    }
    function guardarcausas($causas){
        
        $this->db->insert_batch('causas_usuario',$causas);
    }

    function datosusuario($id) {

        $this->db->where('usu_id', $id);
        $user = $this->db->get('user');
        return $user->result_array();
    }
    function ciudad(){
        
        $ciudad = $this->db->get('ciudad');
        return $ciudad->result_array();
    }
    function tipocontrato(){
        
        $ciudad = $this->db->get('tipo_contrato');
        return $ciudad->result_array();
    }
    function frecuencia(){
        
        $ciudad = $this->db->get('frecuencia_desplazamiento');
        return $ciudad->result_array();
    }
    function tipotrasporte(){
        
        $ciudad = $this->db->get('tipo_transporte');
        return $ciudad->result_array();
    }
    function factoresriesgo(){
        
        $this->db->join('factor_usuario','factor_usuario.facRis_id = factores_riesgo.facRis_id','left');
        $ciudad = $this->db->get('factores_riesgo');
        return $ciudad->result_array();
    }
    function estadoconductor(){
        
        $ciudad = $this->db->get('estado_conductor');
        return $ciudad->result_array();
    }
    function rol(){
        
        $rol = $this->db->get('rol');
        return $rol->result_array();
    }
    function tipodesplazamiento(){
        
        $rol = $this->db->get('tipo_desplazamiento');
        return $rol->result_array();
    }
    function guardar_admin_inicio($post){
        $this->db->where('ini_id', 1);
        $this->db->update('inicio', $post);
    }
    function admin_inicio(){
        $this->db->where('ini_id', 1);
        $dato = $this->db->get('inicio');
        return $dato->result();
    }
    function guardarintroduccion($introduccion,$id){
        
       $data = array(
           'int_introduccion'=> $introduccion,
           'usu_id' => $id
       ); 
        
        $this->db->insert('introduccion',$data);
        
    }
    function guardapolitica($politica,$id){
        
       $data = array(
           'pol_politica'=> $politica,
           'emp_id' => $id
       ); 
        
        $this->db->insert('politicas',$data);
        
    }
    function guardarobjetivos($data,$tabla){
        
        $this->db->insert_batch($tabla,$data);
        
    }
    function miembros($data){
        
        $this->db->insert_batch('miembros',$data);
        
    }
    function guardarresponsables($data){
        
        $this->db->insert_batch('responsables',$data);
        
//        echo $this->db->last_query();
        
    }
    function guardarcomite($data){
        
        $this->db->insert_batch('comite',$data);
        
//        echo $this->db->last_query();
        
    }
    function eliminafactores($id){
        $this->db->where('usu_id',$id);
        $this->db->delete('factor_usuario');
    }
    function eliminacausas($id){
        $this->db->where('usu_id',$id);
        $this->db->delete('causas_usuario');
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
