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

    function empleado($id = null) {

        if (!empty($id)) {
            $id = deencrypt_id($id);
        } else {
            $id = $this->data['user']['user_id'];
        }

        $this->data['cargos'] = $this->administracion_model->cargos();
        $this->data['grupotrabajo'] = $this->administracion_model->grupotrabajo();
        $this->data['genero'] = $this->administracion_model->genero();
        $this->data['confirmacion'] = $this->administracion_model->desicion();
        $this->data['causas'] = $this->administracion_model->causas();
        $this->data['categoria'] = $this->administracion_model->categoria();
        $this->data['tipovehiculo'] = $this->administracion_model->tipovehiculo();
        $this->data['usuario'] = $this->administracion_model->datosusuario($id);
        $this->data['ciudad'] = $this->administracion_model->ciudad();
        $this->data['tipocontrato'] = $this->administracion_model->tipocontrato();
        $this->data['frecuencia'] = $this->administracion_model->frecuencia();
        $this->data['tipotrasporte'] = $this->administracion_model->tipotrasporte();
        $this->data['factoresriesgo'] = $this->administracion_model->factoresriesgo();
        $this->data['tipodesplazamiento'] = $this->administracion_model->tipodesplazamiento();
        $this->data['estadoconductor'] = $this->administracion_model->estadoconductor();
        $this->data['rol'] = $this->administracion_model->rol();


        $this->layout->view('administracion/empleado', $this->data);
    }

    function guardarempleado() {

        $formulario = $this->input->post();
        $id = $this->data['user']['user_id'];
        $ruta = 'index.php/login/acceso/pp/' . encrypt_id($id);
//        echo $ruta;die;
        $data = array();
        $factoresriesgo = $this->input->post('facRis_id');
        $causas = $this->input->post('cau_id');

//------------------------------------------------------------------------------
//                      ELIMINA FACTORES        
//------------------------------------------------------------------------------      
        $this->administracion_model->eliminafactores($id);
//------------------------------------------------------------------------------
//                      ELIMINA CAUSAS       
//------------------------------------------------------------------------------        
        $this->administracion_model->eliminacausas($id);
        $factores = array();
        foreach ($factoresriesgo as $campo => $valor) {
            $factores[] = array(
                'facRis_id' => $valor,
                'usu_id' => $id
            );
        }

        if (!empty($factoresriesgo))
            $this->administracion_model->guardarfactores($factores);

        $causales = array();
        foreach ($causas as $campo => $valor) {
            $causales[] = array(
                'cau_id' => $valor,
                'usu_id' => $id
            );
        }

        if (!empty($causas))
            $this->administracion_model->guardarcausas($causales);

        foreach ($formulario as $campo => $valor) {
            if ($campo != 'facRis_id' && $campo != 'cau_id')
                $data[$campo] = $valor;
        }
//        echo "<pre>";
//        var_dump($data);die;



        $this->administracion_model->guardarempleado($data, $id);
//        $this->administracion_model->guardarempleado($formulario);



        redirect($ruta, 'location');
    }

    function vehiculo($id_emp = null, $id = null) {
        $this->data['titulo'] = "Registro Empresa";
        $this->data['id'] = deencrypt_id($id);
        if ($id_emp == NULL) {
            $this->data['id_emp'] = $this->data['user']['emp_id'];
            if ($this->data['user']['emp_id'] == 0) {
                redirect('index.php/presentacion/principal', 'location');
            }
        } else {
            $this->data['id_emp'] = deencrypt_id($id_emp);
        }

        $this->data['vehiculo'] = $this->administracion_model->vehiculo($this->data['id']);
        $this->data['tiposervicio'] = $this->administracion_model->tiposervicio();
        $this->data['tipovehiculo'] = $this->administracion_model->tipovehiculo();
        $this->data['confirmacion'] = $this->administracion_model->confirmacion();

//        var_dump($this->data['confirmacion']);die;

        $this->layout->view('administracion/vehiculo', $this->data);
    }

    function guardarvehiculo() {

        $vehiculo = $this->input->post();
        $this->administracion_model->guardarvehiculo($vehiculo);
        redirect('index.php/ingresoform/lisVehiculos', 'location');
    }

    function guardaradminempleado() {

        $name = $this->input->post('name');
        $contenido = $this->input->post('contenido');

        switch ($name) {
            case 'rol':
                $campos[] = array('rol_nombre' => $contenido);
                $tabla = 'rol';
                break;
            case 'segmento':
                $campos[] = array('seg_nombre' => $contenido);
                $tabla = 'segmento';
                break;
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
                $campos[] = array('ciu_nombre' => $contenido);
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
            case 'tiposervicio':
                $campos[] = array('tipSer_nombre' => $contenido);
                $tabla = 'tipo_servicio';
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
        $this->data['usuarios'] = $this->administracion_model->cambioestado($idusuario, $numero);
    }

    function cambioestadovehiculo() {

        $idusuario = $this->input->post('usuario');
        $numero = $this->input->post('numero');
        $this->data['usuarios'] = $this->administracion_model->cambioestadovehiculo($idusuario, $numero);
    }

    function reportevehiculo() {

        $this->data['vehiculos'] = $this->administracion_model->reportevehiculos();
        $this->layout->view('administracion/reportevehiculo', $this->data);
    }

    function administracion() {
        $this->data['inicio'] = $this->administracion_model->admin_inicio();
        $this->layout->view('administracion/inicio', $this->data);
    }

    function guardar_admin_inicio() {
        $post = $this->input->post();
        $this->administracion_model->guardar_admin_inicio($post);
    }

    function pesv() {

        $this->layout->view('administracion/pesv', $this->data);
    }

    function guardarintroduccion() {

        $introduccion = $this->input->post('introduccion');
        $id = $this->data['user']['user_id'];

        $this->administracion_model->guardarintroduccion($introduccion, $id);
    }

    function guardarobjetivos() {

        $general = $this->input->post('objetivos');
        $especifico = $this->input->post('objetivosespecificos');
        $id = $this->data['user']['user_id'];
        $data = array();
        if (!empty($general)) {
            $data = array();
            for ($i = 0; $i < count($general); $i++) {

                $data[] = array(
                    'objGen_objetivo' => $general[$i],
                    'emp_id' => $id
                );
            }
            $tabla = 'objetivos_generales';
            $this->administracion_model->guardarobjetivos($data, $tabla);
        }
        $data = array();
        if (!empty($especifico)) {
            for ($i = 0; $i < count($general); $i++) {

                $data[] = array(
                    'objEsp_objetivo' => $especifico[$i],
                    'emp_id' => $id
                );
            }
            $tabla = 'objetivos_especificos';
            $this->administracion_model->guardarobjetivos($data, $tabla);
        }
    }

    function guardarmiembros() {

        $cargo = $this->input->post('cargo');
        $nombre = $this->input->post('nombre');
        $id = $this->data['user']['user_id'];
        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[] = array(
                'mie_cargo' => $cargo[$i],
                'mie_nombre' => $nombre[$i],
                'emp_id' => $id
            );
        }

        $this->administracion_model->miembros($data);
    }

    function guardarresponsables() {

        $cargo = $this->input->post('cargo');
        $nombre = $this->input->post('nombre');
        $id = $this->data['user']['user_id'];
        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[] = array(
                'res_cargo' => $cargo[$i],
                'res_nombre' => $nombre[$i],
                'emp_id' => $id
            );
        }
        $this->administracion_model->guardarresponsables($data);
    }

    function guardarcomite() {

        $cargo = $this->input->post('cargo');
        $nombre = $this->input->post('nombre');
        $id = $this->data['user']['user_id'];
        $data = array();
        for ($i = 0; $i < count($cargo); $i++) {
            $data[] = array(
                'com_cargo' => $cargo[$i],
                'com_nombre' => $nombre[$i],
                'emp_id' => $id
            );
        }
        $this->administracion_model->guardarcomite($data);
    }

    function guardapolitica() {

        $politica = $this->input->post('politica');
        $empresa = $this->data['user']['user_id'];
        $this->administracion_model->guardapolitica($politica, $empresa);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */