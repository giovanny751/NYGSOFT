<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ingresoform extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingresoform_model');
        $this->load->helper('security');
        validate_login($this->data['user']['user_id']);
    }

    function empresa($id=null) {
        $this->data['titulo'] = "Registro Empresa";
        $this->data['ciiu'] = $this->Ingresoform_model->get_ciiu();
        $this->data['tipo_empresa'] = get_dropdown($this->Ingresoform_model->tipo_empresa(), 'tipEmp_id', 'tipEmp_nombre');
        $this->layout->view('ingresoform/empresa', $this->data);
    }

    function guardar_emp() {
        $post = $this->input->post();
        $this->Ingresoform_model->guardar_emp($post);
    }

    function lisEmpresa() {
        $this->data['titulo'] = "Empresas";
        $this->layout->view('ingresoform/lisEmpresa', $this->data);
    }
    function lisVehiculos($id) {
        $this->data['titulo'] = "Vehiculos";
        $this->data['id'] = $id;
        $this->layout->view('ingresoform/lisVehiculos', $this->data);
    }
    function lisEmpleado() {
        $this->data['titulo'] = "Vehiculos";
        $this->layout->view('ingresoform/lisEmpresa', $this->data);
    }

    function get_datatable() {
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_table();
            echo $data;
        } else {
            echo 'Acceso no utorizado';
        }
    }
    function get_datavehiculo($id) {
        $id=deencrypt_id($id);
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_datavehiculo($id);
            echo $data;
        } else {
            echo 'Acceso no utorizado';
        }
    }

    function ingresarempresa() {

        $this->layout->view('ingresoform/ingresarempresa');
    }

    function enviocorreoempresa() {

        $empresa = $this->input->post('empresa');
        $correo = $this->input->post('correo');
        $nit = $this->input->post('nit');
        $empresa = $this->data['user']['user_id'];
        $log = array();
        $random = encrypt_id($nit);
        $log[] = array(
            'corEnv_nit' => $nit,
            'corEnv_empresa' => $empresa,
            'corEnv_correo' => $correo,
            'corEnv_contrasena' => $random,
            'usu_idagrego' => $empresa
        );



        $message = "<table>";
        $message .= "<tr>";
        $message .= "<td colspan='2' style='color:white;background-color:blue;'><center><b>" . $empresa . "</b></center></td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Usuario</td>";
        $message .= "<td>" . $correo . "</td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Contraseña</td>";
        $message .= "<td>" . $random . "</td>";
        $message .= "<tr>";

        $message .= "</table>";

        mail($correo, "Registro de empresas", $message);
        $this->Ingresoform_model->guardarlogenviocorreo($log);
        $this->Ingresoform_model->ingresousuarioempresa($correo,$random,$nit);
    }
    function ingresausuario(){
        
        $this->layout->view('ingresoform/ingresausuario');
        
    }
    function enviocorreousuario(){
        
        $documento = $this->input->post('documento');
        $tipodocumento = $this->input->post('tipodocumento');
        $correo = $this->input->post('correo');
        $empresa = $this->data['user']['user_id'];
        
        $log = array();
        $random = encrypt_id($documento);
        $log[] = array(
            'corUsu_documento' => $documento,
            'tipDoc_id' => $tipodocumento,
            'corUsu_correo' => $correo,
            'corUsu_contrasena' => $random,
            'usu_idagrego' => $empresa
        );
        
        $message = "<table>";
        $message .= "<tr>";
        $message .= "<td colspan='2' style='color:white;background-color:blue;'><center><b>" . $documento . "</b></center></td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Usuario</td>";
        $message .= "<td>" . $correo . "</td>";
        $message .= "</tr>";
        $message .= "<tr>";
        $message .= "<td>Contraseña</td>";
        $message .= "<td>" . $random . "</td>";
        $message .= "<tr>";

        $message .= "</table>";
        
        mail($correo, "Registro de Usuario", $message);
        $this->Ingresoform_model->guardarlogenviocorreousuario($log);
        $this->Ingresoform_model->ingresousuariopagina($correo,$random,$documento);
        
    }

    // verificar si existe el nit
    function confir_nit() {
        $post=$this->input->post();
        $datos=$this->Ingresoform_model->confir_nit($post);
        echo count($datos);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */