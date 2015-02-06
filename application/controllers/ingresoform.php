<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ingresoform extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Ingresoform_model');
        $this->load->helper('security');
        $this->load->helper('miscellaneous');
        validate_login($this->session->userdata('user_id'));
    }

    function empresa() {
        $this->data['titulo'] = "Registro Empresa";
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

    function get_datatable() {
        if ($this->input->is_ajax_request()) {
            $data = $this->Ingresoform_model->get_table();
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
        $log = array();
        $random = rand(100000, 999999);
        $log[] = array(
            'corEnv_nit' => $nit,
            'corEnv_empresa' => $empresa,
            'corEnv_correo' => $correo,
            'corEnv_contrasena' => $random
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
    }
    function ingresausuario(){
        
        $this->layout->view('ingresoform/ingresausuario');
        
    }
    function enviocorreousuario(){
        
        $documento = $this->input->post('documento');
        $tipodocumento = $this->input->post('tipodocumento');
        $correo = $this->input->post('correo');
        $log = array();
        $random = rand(100000, 999999);
        $log[] = array(
            'corUsu_documento' => $documento,
            'tipDoc_id' => $tipodocumento,
            'corUsu_correo' => $correo,
            'corUsu_contrasena' => $random
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
        $this->Ingresoform_model->guardarlogenviocorreousuarios($log);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */