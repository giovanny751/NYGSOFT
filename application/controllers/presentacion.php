<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$padre = "prueba";

class Presentacion extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $numero = "";

        $this->load->database();
        $this->load->model('ingreso_model');
        $this->load->model('Roles_model');
        $this->data['menu'] = $this->session->userdata('menu');
        $this->data['user'] = $this->ion_auth->user()->row();
    }

    function principal() {
        if (!empty($this->data['user'])) {
//            var_dump($this->data['user']);die;
            
            $menu = $this->modulos('prueba', null, $this->data['user']->id);
            $this->session->set_userdata('menu', $menu);
//            $this->load->view('presentacion/modulos', $this->data);
            $data['menu'] = $menu;
            $data['title'] = 'Index';
            $data['content'] = 'presentacion/modulos';
            $this->load->view('template/template', $data);
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function modulos($datosmodulos, $html = null,$usuarioid) {
        $tipo=2;
        $menu = $this->ingreso_model->menu($datosmodulos,$usuarioid,$tipo);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);
        if ($datosmodulos == 'prueba')
            $html .="<ul class='nav navbar-nav'>";
        else
            $html .="<ul class='dropdown-menu'>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        $html .= "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "' >" . strtoupper($nombrepapa) . "</a>";
                        if (!empty($submenus[0]))
                            $html .=$this->modulos($submenus[0], null,$usuarioid);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function principal_menu() {
        if (!empty($this->data['user'])) {
            return $menu = $this->load->view('presentacion/modulos');
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function administracionmenu() {

        $this->load->view('presentacion/menu', $this->data);
    }

    function consultadatosmenu() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $datos = $this->ingreso_model->consultamenu($idgeneral);

            $this->output->set_content_type('application/json')->set_output(json_encode($datos[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    public function creacionmenu() {

        if (!empty($this->data['user'])) {

            $this->data['hijo'] = $this->input->post('menu');
            $this->data['nombrepadre'] = $this->input->post('nombrepadre');
            $this->data['idgeneral'] = $this->input->post('idgeneral');

//            echo $this->data['idgeneral'];

            if (empty($this->data['idgeneral']))
                $this->data['hijo'] = 0;

            $this->data['menu'] = $this->ingreso_model->consultahijos($this->data['idgeneral']);

//            var_dump($this->data['menu'] );

            if (!empty($this->data['idgeneral'])) {

                $this->data['menu'] = $this->ingreso_model->hijos($this->data['idgeneral']);
            }


            $this->load->view('presentacion/menu', $this->data);
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardarmodulo() {


        if (!empty($this->data['user'])) {
            $modulo = $this->input->post('modulo');
            $padre = $this->input->post('padre');
            $general = $this->input->post('general');
            $actualizamodulo = $this->ingreso_model->actualizahijos($general);

            $guardamodulo = $this->ingreso_model->guardarmodulo($modulo, $padre, $general);
            $menu = $this->ingreso_model->cargamenu($general);


            $this->output->set_content_type('application/json')->set_output(json_encode($menu));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardaatribustosmodulo() {

        $idgeneral = $this->input->post('idgeneral');

        if (!empty($idgeneral)) {

            $controlador = $this->input->post('controlador');
            $accion = $this->input->post('accion');
            $estado = $this->input->post('estado');
            $nombre = $this->input->post('nombre');

            $this->ingreso_model->guardaatributos($idgeneral, $controlador, $accion, $estado, $nombre);
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function usuario() {

        $this->data['usaurios'] = $this->ingreso_model->totalusuarios();
        $this->load->view('presentacion/usuario', $this->data);
    }

    function consultausuario() {

        $id = $this->input->post('id');
        if (!empty($id)) {
            $usuario = $this->ingreso_model->consultausuario($id);
            $this->output->set_content_type('application/json')->set_output(json_encode($usuario[0]));
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    function guardarusuario() {

        $usuario = $this->input->post('usuario');
        $email = $this->input->post('email');
        $contrasena = $this->input->post('contrasena');

        $enviodatos = $this->ingreso_model->guardarusuario($usuario, $email, $contrasena);
    }

    function aliminamodulo() {

        $idgeneral = $this->input->post('idgeneral');
        if (!empty($idgeneral)) {
            $eliminar = $this->ingreso_model->eliminar($idgeneral);
        } else {
            
        }
    }

    function permisosusuarios() {

        $this->data['usuarios'] = $this->ingreso_model->usuarios();

        $this->load->view('presentacion/permisosusuarios', $this->data);
    }

    function permisosmenu($iduser, $datosmodulos = 'prueba', $dato = null) {

//        echo $iduser;die;

        $this->load->model("ingreso_model");

        $menu = $this->ingreso_model->menu($iduser, $datosmodulos);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']][$modulo['modulo_menuid']] [] = $modulo['menu_idhijo'];

        if ($datosmodulos == 'prueba')
            echo "<ul class='principal'>";
        else
            echo "<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $permiosos => $menuprincipal)
                        foreach ($menuprincipal as $submenus):
                            if (!empty($permiosos))
                                echo "<li><a href=''>" . strtoupper($nombrepapa) . "</a><input type='checkbox' checked='checked' value='" . $padre . "' name='" . $padre . "' papa='" . $padre . "'>";
                            else
                                echo "<li><a href=''>" . strtoupper($nombrepapa) . "</a><input type='checkbox'  value='" . $padre . "' name='" . $padre . "' papa='" . $padre . "'>";
                            if (!empty($submenus))
                                $this->permisosmenu($iduser, $submenus);
                            echo "</li>";
                        endforeach;
        echo "</ul>";
    }

    function retornamenutotal() {

        $usuario = $this->input->post('usuario');
        $menu = $this->permisosmenu($usuario);

        return $menu;
    }

    function savepermissionsuser() {

        $this->data['user'] = $this->input->post('usuario');

        $eliminarpermisos = $this->ingreso_model->eliminarpermisos($this->data['user']);

        $usuario = $this->input->post();
//        echo "<pre>";
//        var_dump($usuario);
        $datos = array();
        foreach ($usuario as $papa => $modulos) {

//            echo $papa."****".$modulos;
//            if($modulos != '$modulos')
            $datos[] = array('user_id' => $this->data['user'], 'modulo_menuid' => $modulos);
        }

        $guardarpermisos = $this->ingreso_model->permisosmodulo($datos);
    }

    function roles() {


        $this->data['roles'] = $this->Roles_model->roles();

//        var_dump($this->data['roles']);die;

        $this->load->view('presentacion/roles', $this->data);
    }

    function guardarroles() {

        $nombre = $this->input->post('nombre');

        $this->data['roles'] = $this->Roles_model->guardarrol($nombre);

        $roles = $this->Roles_model->roles();

        $this->output->set_content_type('application/json')->set_output(json_encode($roles));
    }

    function guardaratributosmenu() {

        $nombre = $this->input->post('nombre');
        $controlador = $this->input->post('controlador');
        $accion = $this->input->post('accion');
        $estado = $this->input->post('estado');
        $id = $this->input->post('id');

        $this->ingreso_model->guardaratributosmenu($nombre, $controlador, $accion, $estado, $id);
    }

    function administracionareas() {

        $this->data['cargos'] = $this->ingreso_model->areas();

        $this->load->view('presentacion/administracionareas', $this->data);
    }

    function guardararea() {

        $area = $this->input->post('area');

        $this->ingreso_model->guardararea($area);

        $areas = $this->ingreso_model->areas();
        $this->output->set_content_type('application/json')->set_output(json_encode($areas));
    }

    function guardarcargo() {

        $area = $this->input->post('area');
        $cargo = $this->input->post('cargo');

        $this->ingreso_model->guardarcargo($area, $cargo);
    }

    function permisousuarios($datosmodulos, $html = null,$idusuario) {
        
        $tipo=1;
        $menu = $this->ingreso_model->menu($datosmodulos,$idusuario,$tipo);
        $i = array();
        foreach ($menu as $modulo)
            $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion'], $modulo['menudos']);
        if ($datosmodulos == 'prueba')
            $html .="<ul>";
        else
            $html .="<ul>";
        foreach ($i as $padre => $nombrepapa)
            foreach ($nombrepapa as $nombrepapa => $menuidpadre)
                foreach ($menuidpadre as $modulos => $menu)
                    foreach ($menu as $submenus):
                        if($submenus[3]==$padre){
                            $checked = 'checked' ;
                        }else{
                            $checked = '';
                        }
                        $html .= "<li> <input type='checkbox' ".$checked." name='permisousuario[]' value='" . $padre . "'>" . strtoupper($nombrepapa);
                        if (!empty($submenus[0]))
                            $html .=$this->permisousuarios($submenus[0], null,$idusuario);
                        $html .= "</li>";
                    endforeach;
        $html.="</ul>";
        return $html;
    }

    function permisos() {
        $idusuario = $this->input->post('id');
        echo $this->permisousuarios('prueba', null,$idusuario);
    }

    function guardarpermisos() {
        $permisosmenu = $this->input->post('permisousuario');
        $usuarioid = $this->input->post('usuarioid');

        $permiso = array();
        $contador = count($permisosmenu);

        for ($i = 0; $i < $contador; $i++) {
            $permiso[] = array('usu_id' => $usuarioid, 'menu_id' => $permisosmenu[$i]);
        }

        $this->ingreso_model->eliminarpermisosmenu($usuarioid);
        $this->ingreso_model->permisosusuariomenu($permiso);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */