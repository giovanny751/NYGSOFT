<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('administracion_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
//        validate_login($this->session->userdata('user_id'));
    }

    function index() {
        $this->data['titulo'] = "Administracion de Formilarios";
        $formulario = $this->administracion_model->formulario_general();
        $this->data['formularios'] = get_dropdown_select($formulario, 'form_formulario', 'form_nombreForm', '-1', 'Seleccionar...');
        $this->layout->view('administracion/list', $this->data);
    }

    function nuevo_formulario_envio() {
        $this->data['titulo'] = "Administracion de Formilarios";
        $formulario = $this->administracion_model->formulario_general();
        $this->data['formularios'] = get_dropdown_select($formulario, 'form_formulario', 'form_nombreForm', '-1', 'Seleccionar...');
        $this->load->view('administracion/list', $this->data);
    }

    function nuevo_formulario() {
        $this->data['url2'] = $this->administracion_model->maxForm();
        $this->load->view('administracion/nuevo_formulario', $this->data);
    }

    function guardar_formulario() {
        $post = $this->input->post();
        $this->administracion_model->guardar_formulario($post);
        echo $this->nuevo_formulario_envio();
    }

    function administracionempleado() {

        $this->layout->view('administracion/administracionempleado');
    }

    function empleado() {
        
        
         $id = $this->data['user'];
        $this->data['cargos'] = $this->administracion_model->cargos();
        $this->data['grupotrabajo'] = $this->administracion_model->grupotrabajo();
        $this->data['genero'] = $this->administracion_model->genero();
        $this->data['confirmacion'] = $this->administracion_model->desicion();
        $this->data['causas'] = $this->administracion_model->causas();
        $this->data['categoria'] = $this->administracion_model->categoria();
        $this->data['tipovehiculo'] = $this->administracion_model->tipovehiculo();
        $this->data['usuario'] = $this->administracion_model->datosusuario($id['user_id']);
        
        
        $this->layout->view('administracion/empleado',$this->data);
    }
    function guardarempleado(){
        
        $formulario = $this->input->post();
        $id = $this->data['user'];
        
        $this->administracion_model->guardarempleado($formulario,$id['user_id']);
//        $this->administracion_model->guardarempleado($formulario);

    }

    function vehiculo() {

        $this->data['tiposervicio'] = $this->administracion_model->tiposervicio();
        $this->data['tipovehiculo'] = $this->administracion_model->tipovehiculo();
        $this->data['confirmacion'] = $this->administracion_model->confirmacion();

//        var_dump($this->data['confirmacion']);die;

        $this->layout->view('administracion/vehiculo', $this->data);
    }

    function guardarvehiculo() {

        $vehiculo[] = $this->input->post();

        $this->administracion_model->guardarvehiculo($vehiculo);
        echo $this->db->last_query();
    }

    function guardaradminempleado() {

        $name = $this->input->post('name');
        $contenido = $this->input->post('contenido');

        switch ($name) {
            case 'entidadsoat':
                $campos[] = array('entSoa_nombre' => $contenido);
                $tabla = 'entidad_soat';
                break;
            case 'genero':
                $campos[] = array('gen_genero' => $contenido);
                $tabla = 'genero';
                break;
            case 'grupo':
                $campos[] = array('gruTra_nombre' => $contenido);
                $tabla = 'grupo_trabajo';
                break;
            case 'tipoempresa':
                $campos[] = array('tipEmp_nombre' => $contenido);
                $tabla = 'tipo_empresa';
                break;
            case 'actividadeconomica':
                $campos[] = array('actEco_Detalle' => $contenido);
                $tabla = 'actividad_economica';
                break;
            case 'cargo':
                $campos[] = array('car_nombre' => $contenido);
                $tabla = 'cargo';
                break;
            case 'ciudad':
                $campos[] = array('car_nombre' => $contenido);
                $tabla = 'ciudad';
                break;
            case 'tipocontrato':
                $campos[] = array('tipCon_nombre' => $contenido);
                $tabla = 'tipo_contrato';
                break;
            case 'frecuenciadesplazamiento':
                $campos[] = array('freDes_nombre' => $contenido);
                $tabla = 'frecuencia_desplazamiento';
                break;
            case 'tipodesplazamiento':
                $campos[] = array('tipDes_nombre' => $contenido);
                $tabla = 'tipo_desplazamiento';
                break;
            case 'tipotransporte':
                $campos[] = array('tipTra_nombre' => $contenido);
                $tabla = 'tipo_transporte';
                break;
            case 'tipovehiculo':
                $campos[] = array('tipVeh_nombre' => $contenido);
                $tabla = 'tipo_vehiculo';
                break;
            case 'categoria':
                $campos[] = array('cat_nombre' => $contenido);
                $tabla = 'categoria';
                break;
            case 'restricciones':
                $campos[] = array('res_nombre' => $contenido);
                $tabla = 'restricciones';
                break;
            case 'estadoconductor':
                $campos[] = array('estCon_nombre' => $contenido);
                $tabla = 'estado_conductor';
                break;
            case 'factoresriesgo':
                $campos[] = array('facRie_nombre' => $contenido);
                $tabla = 'factores_riesgo';
                break;
            case 'causas':
                $campos[] = array('cau_nombre' => $contenido);
                $tabla = 'causas';
                break;
            default:
                break;
        }

        $this->administracion_model->guardaradministracion($campos, $tabla);
    }

    function usuarios() {

        $this->data['usuarios'] = $this->administracion_model->usuarios();

        $this->layout->view('administracion/usuarios', $this->data);
    }

    function eliminarusuario() {

        $idusuario = $this->input->post('usuario');
        $this->data['usuarios'] = $this->administracion_model->eliminarusuario($idusuario);
    }
    function eliminarvehiculo() {

        $vehiculo = $this->input->post('vehiculo');
        $this->data['usuarios'] = $this->administracion_model->eliminarvehiculo($vehiculo);
    }

    function cambioestado() {

        $idusuario = $this->input->post('usuario');
        $numero = $this->input->post('numero');
        $this->data['usuarios'] = $this->administracion_model->cambioestado($idusuario,$numero );
    }
    function cambioestadovehiculo() {

        $idusuario = $this->input->post('usuario');
        $numero = $this->input->post('numero');
        $this->data['usuarios'] = $this->administracion_model->cambioestadovehiculo($idusuario,$numero );
    }
    function reportevehiculo(){
        
        $this->data['vehiculos'] = $this->administracion_model->reportevehiculos();
        $this->layout->view('administracion/reportevehiculo', $this->data);
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */