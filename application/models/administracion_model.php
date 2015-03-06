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

    function guardaradministracion($campos, $tabla) {

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

    function tipovinculacion() {

        $dato = $this->db->get('tipo_vinculacion');
        return $dato->result_array();
    }

    function tipocarroceria() {

        $dato = $this->db->get('tipo_carroceria');
        return $dato->result_array();
    }

    function entidades() {

        $dato = $this->db->get('entidad_soat');
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

    function causas($id) {

        $this->db->select('causas.cau_nombre,causas.cau_id,causas_usuario.usu_id,causas_usuario.cauUsu_id');
        $this->db->join('causas_usuario', 'causas_usuario.cau_id = causas.cau_id and usu_id=' . $id, 'left');
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

    function guardarfactores($factores) {

        $this->db->insert_batch('factor_usuario', $factores);
    }

    function guardarcausas($causas) {

        $this->db->insert_batch('causas_usuario', $causas);
    }

    function datosusuario($id) {

        $this->db->where('usu_id', $id);
        $user = $this->db->get('user');
        return $user->result_array();
    }

    function ciudad() {

        $ciudad = $this->db->get('ciudad');
        return $ciudad->result_array();
    }

    function tipocontrato() {

        $ciudad = $this->db->get('tipo_contrato');
        return $ciudad->result_array();
    }

    function frecuencia() {

        $ciudad = $this->db->get('frecuencia_desplazamiento');
        return $ciudad->result_array();
    }

    function tipotrasporte() {

        $ciudad = $this->db->get('tipo_transporte');
        return $ciudad->result_array();
    }

    function factoresriesgo($id) {

        $this->db->select('factores_riesgo.facRis_id,factores_riesgo.facRis_nombre,factor_usuario.facUsu_id');
        $this->db->join('factor_usuario', 'factor_usuario.facRis_id = factores_riesgo.facRis_id and usu_id=' . $id, 'left');
        $ciudad = $this->db->get('factores_riesgo');
//        echo $this->db->last_query();die;
        return $ciudad->result_array();
    }

    function estadoconductor() {

        $ciudad = $this->db->get('estado_conductor');
        return $ciudad->result_array();
    }

    function restricciones() {

        $ciudad = $this->db->get('restricciones');
        return $ciudad->result_array();
    }

    function rol() {

        $rol = $this->db->get('rol');
        return $rol->result_array();
    }

    function tipodesplazamiento() {

        $rol = $this->db->get('tipo_desplazamiento');
        return $rol->result_array();
    }

    function guardar_admin_inicio($post) {
        $this->db->where('ini_id', 1);
        $this->db->update('inicio', $post);
    }

    function guardar_admin_inicio_emp($post, $id) {
        $this->db->where('emp_id', $id);
        $this->db->update('empresa', $post);
    }

    function info_empresa($id) {
        $this->db->where('emp_id', $id);
        $dato = $this->db->get('empresa');
        return $dato->result();
    }

    function admin_inicio() {
        $this->db->where('ini_id', 1);
        $dato = $this->db->get('inicio');
        return $dato->result();
    }

    function admin_inicio_emp($id) {
        $this->db->set('emp_inicio,emp_id');
        $this->db->where('emp_id', $id);
        $dato = $this->db->get('empresa');
        return $dato->result();
    }

    function visualizacionintroduccion($id) {

        $this->db->where('emp_id', $id);
        $dato = $this->db->get('introduccion');
        return $dato->result_array();
    }

    function visualizacionobjgen($id) {

        $this->db->where('emp_id', $id);
        $dato = $this->db->get('objetivos_generales');
        return $dato->result_array();
    }

    function visualizacionobjesp($id) {

        $this->db->where('emp_id', $id);
        $this->db->where('tipObj_id', 5);
//        $this->db->join('tipo_objetivo','tipo_objetivo.tipObj_id = objetivos_especificos.tipObj_id');

        $dato = $this->db->get('objetivos_especificos');
        return $dato->result_array();
    }

    function visualizacionobjesplineaaccion($id) {

        $this->db->select('objetivos_especificos.objEsp_objetivo,tipo_objetivo.tipObj_nombre');
        $this->db->where('emp_id', $id);
        $this->db->where('objetivos_especificos.tipObj_id !=', 5);
        $this->db->join('tipo_objetivo', 'tipo_objetivo.tipObj_id = objetivos_especificos.tipObj_id');

        $dato = $this->db->get('objetivos_especificos');
        return $dato->result_array();
    }

    function visualizacionmiembros($id) {

        $this->db->where('emp_id', $id);
        $dato = $this->db->get('miembros');
        return $dato->result_array();
    }

    function visualizacionresponsables($id) {

        $this->db->where('emp_id', $id);
        $dato = $this->db->get('responsables');
        return $dato->result_array();
    }

    function visualizacioncomite($id) {

        $this->db->where('emp_id', $id);
        $dato = $this->db->get('comite');
        return $dato->result_array();
    }

    function consultaingtroduccion($id) {

        $this->db->where('emp_id', $id);
        $datos = $this->db->get('introduccion');
        return $datos->result_array();
    }

    function eliminarpesv($tabla, $campo, $id, $idempresa) {

        $this->db->where('emp_id', $idempresa);
        $this->db->where($campo, $id);
        $this->db->delete($tabla);

        echo $this->db->last_query();
    }

    function actualizaintroduccion($introduccion, $id) {

        $this->db->set('int_introduccion', $introduccion);
        $this->db->where('emp_id', $id);
        $datos = $this->db->update('introduccion');
    }

    function guardarintroduccion($introduccion, $id) {

        $data = array(
            'int_introduccion' => $introduccion,
            'emp_id' => $id
        );

        $this->db->insert('introduccion', $data);
    }

    function guardapolitica($politica, $id) {

        $data = array(
            'pol_politica' => $politica,
            'emp_id' => $id
        );

        $this->db->insert('politicas', $data);
    }

    function actualizarpolitica($politica, $id) {

        $this->db->where('emp_id', $id);
        $this->db->set('pol_politica', $politica);
        $this->db->update('politicas');
    }

    function verificapolitica($id) {

        $this->db->where('emp_id', $id);
        $politica = $this->db->get('politicas');
        return $politica->result_array();
    }

    function verificaprioridad($id) {

        $this->db->where('emp_id', $id);
        $politica = $this->db->get('prioridades');
        return $politica->result_array();
    }

    function eliminarprioridades($id) {

        $this->db->where('pri_id', $id);
        $this->db->delete('prioridades');
    }

    function insertaprioridades($data) {

        $this->db->insert_batch('prioridades', $data);
    }

    function guardarobjetivos($data, $tabla) {

        $this->db->insert_batch($tabla, $data);
    }

    function miembros($data) {

        $this->db->insert_batch('miembros', $data);
    }

    function eliminarmiembros($id) {

        $this->db->where('emp_id', $id);
        $this->db->delete('miembros');
    }

    function guardarresponsables($data) {

        $this->db->insert_batch('responsables', $data);

//        echo $this->db->last_query();
    }

    function eliminarresponsables($id) {

        $this->db->where('emp_id', $id);
        $this->db->delete('responsables');

//        echo $this->db->last_query();
    }

    function eliminarcomite($id) {

        $this->db->where('emp_id', $id);
        $this->db->delete('comite');

//        echo $this->db->last_query();
    }

    function guardarcomite($data) {

        $this->db->insert_batch('comite', $data);

//        echo $this->db->last_query();
    }

    function eliminafactores($id) {
        $this->db->where('usu_id', $id);
        $this->db->delete('factor_usuario');
    }

    function eliminacausas($id) {
        $this->db->where('usu_id', $id);
        $this->db->delete('causas_usuario');
    }

    function estadisticas($id) {

        $datos = $this->db->query("
            
            select 
		(select count(usu_confir_arl) from user where emp_id = $id) arl,
		(select sum(if(usu_confir_arl = '',1,0)) from user where emp_id = $id) arlnula,
		(select sum(if(usu_confir_arl = 1,1,0)) from user where emp_id = $id) arlsi,
		(select sum(if(usu_confir_arl = 2,1,0)) from user where emp_id = $id) arlno ,
		(select count(usu_confir_pension) from user where emp_id = $id) pension,
		(select sum(if(usu_confir_pension = '',1,0)) from user where emp_id = $id) pensionnula ,
		(select sum(if(usu_confir_pension = 1,1,0)) from user where emp_id = $id) pensionsi ,
		(select sum(if(usu_confir_pension = 2,1,0)) from user where emp_id = $id) pensionno,
		(select count(usu_confir_eps) from user where emp_id = $id) eps,
		(select sum(if(usu_confir_eps = '',1,0)) from user where emp_id = $id) epsnula,
		(select sum(if(usu_confir_eps = 1,1,0)) from user where emp_id = $id) epssi,
		(select sum(if(usu_confir_eps = 2,1,0)) from user where emp_id = $id) epsno,
		(select count(usu_confir_caja_compensacio) from user where emp_id = $id) cajacompensacion,
		(select sum(if(usu_confir_caja_compensacio = '',1,0)) from user where emp_id = $id) cajacompensacionnula,
		(select sum(if(usu_confir_caja_compensacio = 1,1,0)) from user where emp_id = $id) cajacompensacionsi,
		(select sum(if(usu_confir_caja_compensacio = 2,1,0)) from user where emp_id = $id) cajacompensacionno,
                (select count(usu_desplazamiento_mision) from user where emp_id = $id) usu_desplazamiento_mision,
		(select sum(if(usu_desplazamiento_mision = '',1,0)) from user where emp_id = $id) usu_desplazamiento_misionnula,
		(select sum(if(usu_desplazamiento_mision = 1,1,0)) from user where emp_id = $id) usu_desplazamiento_misionsi,
		(select sum(if(usu_desplazamiento_mision = 2,1,0)) from user where emp_id = $id) usu_desplazamiento_misionno

            ");
        return $datos->result();
    }

    function itiniere($id) {

        $datos = $this->db->query("
            
            select 
		(select count(usu_confir_arl) from user where emp_id = $id) total,
		(select sum(if(usu_rol_via = '',1,0)) from user where emp_id = $id) sininfo,
		(select sum(if(usu_rol_via = 'Conductor',1,0)) from user where emp_id = $id) conductor,
		(select sum(if(usu_rol_via = 'Pasajero',1,0)) from user where emp_id = $id) pasajero, 
		(select sum(if(usu_rol_via = 'Peaton',1,0)) from user where emp_id = $id) peaton
            ");

//        echo $this->db->last_query();die;
        return $datos->result();
    }

    function tipoobjetivo() {

        $datos = $this->db->get('tipo_objetivo');
        return $datos->result_array();
    }

    function tipotransporte($id) {

        $datos = $this->db->query("
            select 
		(select count(usu_tipo_transporte) from user where emp_id = $id) total,
		(select sum(if(usu_tipo_transporte = '',1,0)) from user where emp_id = $id) sininfo,
		(select sum(if(usu_tipo_transporte = '3',1,0)) from user where emp_id = $id) monopatin,
		(select sum(if(usu_tipo_transporte = '4',1,0)) from user where emp_id = $id) Patines,
		(select sum(if(usu_tipo_transporte = '5',1,0)) from user where emp_id = $id) Bicicleta, 
		(select sum(if(usu_tipo_transporte = '6',1,0)) from user where emp_id = $id) Moto,
		(select sum(if(usu_tipo_transporte = '7',1,0)) from user where emp_id = $id) Transporteautomotorparticular,
		(select sum(if(usu_tipo_transporte = '8',1,0)) from user where emp_id = $id) Transporteautomotorpublico
            ");

//        echo $this->db->last_query();die;
        return $datos->result();
    }

    function eliminabjetivos($id, $tabla, $campo) {

        $this->db->where('emp_id', $id);
        $this->db->delete($tabla);
    }

    function empleado_el($id) {
        $id = deencrypt_id($id);
        $this->db->set('usu_status', '3');
        $this->db->where('usu_id', $id);
        $this->db->update('user');
    }

    function vehiculo_el($id) {
        $id = deencrypt_id($id);
        $this->db->set('veh_status', '3');
        $this->db->where('veh_id', $id);
        $this->db->update('vehiculo');
    }

    function empresa_el($id) {
        $id = deencrypt_id($id);
        $this->db->set('emp_status', '3');
        $this->db->where('emp_id', $id);
        $this->db->update('empresa');
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
