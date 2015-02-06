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
        validate_login($this->session->userdata('user_id'));
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

        $this->layout->view('administracion/empleado');
    }

    function guardaradminempleado() {

        $name = $this->input->post('name');
        $contenido = $this->input->post('contenido');

        switch ($name) {
            case 'entidadsoat':
                $campos[] = array('entSoa_nombre' => $contenido);
                $tabla = 'entidad_soat';
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */