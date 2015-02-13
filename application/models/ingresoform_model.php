<?php

class Ingresoform_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function guardar_emp($post) {
        $post['emp_razonSocial'] = $post['emp_razonSocial'] . " ";
        $this->db->where('emp_nit', $post['emp_nit']);
        $this->db->update('empresa', $post);
        if (($this->db->affected_rows()) > 0) {
            $this->db->insert('empresa', $post);
        }
    }

    function get_table($id) {
        //CAMPOS
        $aColumns = array(
            'emp_nit',
            'emp_razonSocial',
            'emp_telefono',
            'emp_direccion',
            'emp_nombre_repre',
            'emp_id',
        );
        //LLAVE PRIMARIA
        $sIndexColumn = "emp_nit";
        //TABLA
        $sTable = "empresa";
        if ($id != null)
            $rWhere = "where emp_id=" . $id . " ";
        else
            $rWhere = "where 1=1  ";

        $aColumns2 = array();
        foreach ($aColumns as $aColumn) {
            $aColumns2[] = $aColumn;
        }

        //CONTRADOR DE PAGINACION
        $sLimit = "";
        if (isset($_GET['start']) && $_GET['length'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['start']) . ", " .
                    intval($_GET['length']);
        }

        //ORDENAR
        $sOrder = "";
        if (isset($_GET['order'])) {
            $sOrder = "ORDER BY  ";
            $sOrder .= $aColumns2[$_GET['order'][0]['column']] . "
                    " . ($_GET['order'][0]['dir'] === 'asc' ? 'asc' : 'desc') . ", ";
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        //FILTRO
        $sWhere = '';
        if (isset($_GET['search']['value']) && $_GET['search']['value'] != "") {
            $data = $_GET['search']['value'];
            $sWhere = " AND (";
            for ($i = 0; $i < count($aColumns2); $i++) {
                $sWhere .= $aColumns2[$i] . " LIKE '" . '%' . mysql_real_escape_string($data) . '%' . "' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        //CONSULTA DE REGISTROS
        $sQuery = " SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns2)) . "
                    FROM " . $sTable . " " .
                $rWhere . " " .
                $sWhere . " " .
                $sOrder . " " .
                $sLimit;
        $sQueryprueba = $sQuery;
        //echo $sQuery;
        //mail("yeison@tellocor.com",'consulta',$sQuery);
        $rResult = $this->db->query($sQuery);

        //CONSULTA DE GRAN TOTAL
        $sQuery = "SELECT FOUND_ROWS() AS total";

        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->result();
        $iFilteredTotal = $aResultFilterTotal[0]->total;

        //CONSULTA TOTAL DE REGISTROS (SIN FILTRO)
        $sQuery = " SELECT COUNT(" . $sIndexColumn . ") AS total FROM   $sTable ";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->result();
        $iTotal = $aResultTotal[0]->total;

        //GENERAR ARRAY DE RESPUESTA
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        $fetch_array = $rResult->result_array();

//        'emp_id',
//            'emp_razonSocial',
//            'emp_nit',
//            'emp_idTipo'

        $contador = 1;
        foreach ($fetch_array as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
//                if ($aColumns[$i] == "emp_id") {
//                    $row[] = $contador;
//                } else
                if ($aColumns[$i] == "emp_id") {
                    $row[] = '<a href="' . base_url('index.php/ingresoform/lisVehiculos/' . encrypt_id($aRow['emp_id'])) . '" class="btn btn-success btn-xs">Vehiculos</a>' .
                            '<a href="' . base_url('index.php/ingresoform/lisEmpleado/' . encrypt_id($aRow['emp_id'])) . '" class="btn btn-primary btn-xs">Empleados</a>' .
                            '<a href="' . base_url('index.php/ingresoform/empresa/' . encrypt_id($aRow['emp_id'])) . '" class="btn btn-info btn-xs">Editar</a>';
                } else
                if ($aColumns[$i] != ' ') {
                    /* General output */
                    //$row[] = print_r($this->input->get());
                    //$row[] = $sQueryprueba;
                    $row[] = $aRow[$aColumns[$i]];
                }
            }
            $output['aaData'][] = $row;
            $contador++;
        }

        return json_encode($output);
    }

    function get_datavehiculo($id = null) {
        //CAMPOS
        $aColumns = array(
            'veh_nombrepropietario',
            'veh_placa',
            'veh_numlicencia',
            'veh_marca',
            'veh_capacidad',
            'veh_id',
        );
        //LLAVE PRIMARIA
        $sIndexColumn = "veh_nombrepropietario";
        //TABLA
        $sTable = "vehiculo join empresa on empresa.emp_id=vehiculo.emp_id";
        if ($id != null)
            $rWhere = "where vehiculo.emp_id=" . $id . " ";
        else
            $rWhere = "where 1=1  ";

        $aColumns2 = array();
        foreach ($aColumns as $aColumn) {
            $aColumns2[] = $aColumn;
        }

        //CONTRADOR DE PAGINACION
        $sLimit = "";
        if (isset($_GET['start']) && $_GET['length'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['start']) . ", " .
                    intval($_GET['length']);
        }

        //ORDENAR
        $sOrder = "";
        if (isset($_GET['order'])) {
            $sOrder = "ORDER BY  ";
            $sOrder .= $aColumns2[$_GET['order'][0]['column']] . "
                    " . ($_GET['order'][0]['dir'] === 'asc' ? 'asc' : 'desc') . ", ";
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        //FILTRO
        $sWhere = '';
        if (isset($_GET['search']['value']) && $_GET['search']['value'] != "") {
            $data = $_GET['search']['value'];
            $sWhere = " AND (";
            for ($i = 0; $i < count($aColumns2); $i++) {
                $sWhere .= $aColumns2[$i] . " LIKE '" . '%' . mysql_real_escape_string($data) . '%' . "' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        //CONSULTA DE REGISTROS
        $sQuery = " SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns2)) . "
                    FROM " . $sTable . " " .
                $rWhere . " " .
                $sWhere . " " .
                $sOrder . " " .
                $sLimit;
        $sQueryprueba = $sQuery;
        //echo $sQuery;
        //mail("yeison@tellocor.com",'consulta',$sQuery);
        $rResult = $this->db->query($sQuery);

        //CONSULTA DE GRAN TOTAL
        $sQuery = "SELECT FOUND_ROWS() AS total";

        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->result();
        $iFilteredTotal = $aResultFilterTotal[0]->total;

        //CONSULTA TOTAL DE REGISTROS (SIN FILTRO)
        $sQuery = " SELECT COUNT(" . $sIndexColumn . ") AS total FROM   $sTable ";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->result();
        $iTotal = $aResultTotal[0]->total;

        //GENERAR ARRAY DE RESPUESTA
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        $fetch_array = $rResult->result_array();

//        'emp_id',
//            'emp_razonSocial',
//            'emp_nit',
//            'emp_idTipo'

        $contador = 1;
        foreach ($fetch_array as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
//                if ($aColumns[$i] == "emp_id") {
//                    $row[] = $contador;
//                } else
                if ($aColumns[$i] == "veh_id") {
                    $row[] = '<a href="' . base_url('index.php/administracion/vehiculo/' . encrypt_id($aRow['veh_id'])) . '" class="btn btn-success btn-xs">Editar</a>';
                } else
                if ($aColumns[$i] != ' ') {
                    /* General output */
                    //$row[] = print_r($this->input->get());
                    //$row[] = $sQueryprueba;
                    $row[] = $aRow[$aColumns[$i]];
                }
            }
            $output['aaData'][] = $row;
            $contador++;
        }

        return json_encode($output);
    }
    function get_dataEmpleado($id = null) {
        //CAMPOS
        $aColumns = array(
            'veh_nombrepropietario',
            'veh_placa',
            'veh_numlicencia',
            'veh_marca',
            'veh_capacidad',
            'veh_id',
        );
        //LLAVE PRIMARIA
        $sIndexColumn = "veh_nombrepropietario";
        //TABLA
        $sTable = "vehiculo join empresa on empresa.emp_id=vehiculo.emp_id";
        if ($id != null)
            $rWhere = "where vehiculo.emp_id=" . $id . " ";
        else
            $rWhere = "where 1=1  ";

        $aColumns2 = array();
        foreach ($aColumns as $aColumn) {
            $aColumns2[] = $aColumn;
        }

        //CONTRADOR DE PAGINACION
        $sLimit = "";
        if (isset($_GET['start']) && $_GET['length'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['start']) . ", " .
                    intval($_GET['length']);
        }

        //ORDENAR
        $sOrder = "";
        if (isset($_GET['order'])) {
            $sOrder = "ORDER BY  ";
            $sOrder .= $aColumns2[$_GET['order'][0]['column']] . "
                    " . ($_GET['order'][0]['dir'] === 'asc' ? 'asc' : 'desc') . ", ";
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        //FILTRO
        $sWhere = '';
        if (isset($_GET['search']['value']) && $_GET['search']['value'] != "") {
            $data = $_GET['search']['value'];
            $sWhere = " AND (";
            for ($i = 0; $i < count($aColumns2); $i++) {
                $sWhere .= $aColumns2[$i] . " LIKE '" . '%' . mysql_real_escape_string($data) . '%' . "' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        //CONSULTA DE REGISTROS
        $sQuery = " SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns2)) . "
                    FROM " . $sTable . " " .
                $rWhere . " " .
                $sWhere . " " .
                $sOrder . " " .
                $sLimit;
        $sQueryprueba = $sQuery;
        //echo $sQuery;
        //mail("yeison@tellocor.com",'consulta',$sQuery);
        $rResult = $this->db->query($sQuery);

        //CONSULTA DE GRAN TOTAL
        $sQuery = "SELECT FOUND_ROWS() AS total";

        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->result();
        $iFilteredTotal = $aResultFilterTotal[0]->total;

        //CONSULTA TOTAL DE REGISTROS (SIN FILTRO)
        $sQuery = " SELECT COUNT(" . $sIndexColumn . ") AS total FROM   $sTable ";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->result();
        $iTotal = $aResultTotal[0]->total;

        //GENERAR ARRAY DE RESPUESTA
        $output = array(
            "sEcho" => 0,
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        $fetch_array = $rResult->result_array();

//        'emp_id',
//            'emp_razonSocial',
//            'emp_nit',
//            'emp_idTipo'

        $contador = 1;
        foreach ($fetch_array as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
//                if ($aColumns[$i] == "emp_id") {
//                    $row[] = $contador;
//                } else
                if ($aColumns[$i] == "veh_id") {
                    $row[] = '<a href="' . base_url('index.php/administracion/vehiculo/' . encrypt_id($aRow['veh_id'])) . '" class="btn btn-success btn-xs">Editar</a>';
                } else
                if ($aColumns[$i] != ' ') {
                    /* General output */
                    //$row[] = print_r($this->input->get());
                    //$row[] = $sQueryprueba;
                    $row[] = $aRow[$aColumns[$i]];
                }
            }
            $output['aaData'][] = $row;
            $contador++;
        }

        return json_encode($output);
    }

    function guardarlogenviocorreo($log) {

        $this->db->insert_batch('correo_envio', $log);
    }

    function guardarlogenviocorreousuario($log) {

        $this->db->insert_batch('correo_usuario', $log);
    }

    function ingresousuariopagina($correo, $random, $documento) {

        $datos[] = array(
            'usu_correo' => $correo,
            'usu_password' => $random,
            'usu_cc' => $documento,
            'usu_tipo' => '1'
        );

        $usuario = $this->db->insert_batch('user', $datos);
        return $this->db->insert_id();
    }

    function ingresousuarioempresa($correo, $random, $documento,$empresa) {

        $datos2 = array(
            'emp_nit' => $documento,
            'emp_razonSocial' => $empresa,
        );

        $this->db->insert('empresa', $datos2);
        $id=  $this->db->insert_id();
        $datos[] = array(
            'usu_correo' => $correo,
            'usu_password' => $random,
            'usu_cc' => $documento,
            'emp_id' => $id,
            'usu_tipo' => '2'
        );
        

        $this->db->insert_batch('user', $datos);
        return $this->db->insert_id();
    }

    // lista de la tabla ciiu
    function get_ciiu() {
        $dato = $this->db->get('ciiu');
        return $dato->result();
    }

    //tipo de empresa
    function tipo_empresa() {
        $dato = $this->db->get('tipo_empresa');
        return $dato->result();
    }

    // verificar si existe el nit
    function confir_nit($post) {
        $this->db->where('emp_nit', $post['emp_nit']);
        $dato = $this->db->get('empresa');
        return $dato->result();
    }
    function permisosusuarioempresa($idusuario){
        $data = array(
            array('menu_id'=>9,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>39,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>44,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>45,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>46,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>47,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>48,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>49,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>50,'rol_id'=>50,'usu_id'=>$idusuario),
            array('menu_id'=>51,'rol_id'=>50,'usu_id'=>$idusuario)
        );
        
        $this->db->insert_batch('permisos',$data); 
        
    }
    function permisosusuariousuario($idusuario){
        $data = array(
            array('menu_id'=>9,'rol_id'=>49,'usu_id'=>$idusuario),
            array('menu_id'=>40,'rol_id'=>49,'usu_id'=>$idusuario),
            array('menu_id'=>41,'rol_id'=>49,'usu_id'=>$idusuario),
            array('menu_id'=>42,'rol_id'=>49,'usu_id'=>$idusuario),
            array('menu_id'=>43,'rol_id'=>49,'usu_id'=>$idusuario)
        );
        
        $this->db->insert_batch('permisos',$data); 
        
    }
}
