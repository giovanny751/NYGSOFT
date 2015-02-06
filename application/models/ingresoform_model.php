<?php

class Ingresoform_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function guardar_emp($post) {
        $datos = array();
        $datos[] = $post;
        $insertar = array();
        foreach ($post as $key => $value) {
            if ($key != "emp_idArl_otra" && !empty($value))
                $insertar[$key] = $value;
        }

        $this->db->insert('empresa', $insertar);

        echo $this->db->last_query();
    }

    function get_table() {
        //CAMPOS
        $aColumns = array(
            'emp_id',
            'emp_razonSocial',
            'emp_nit',
            'emp_idTipo'
        );
        //LLAVE PRIMARIA
        $sIndexColumn = "emp_nit";
        //TABLA
        $sTable = "empresa";
        $rWhere = "";

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
                    FROM empresa " .
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
//                } elseif ($aColumns[$i] == "emp_razonSocial") {
//                    $row[] = ($aRow['emp_razonSocial'] > 0) ? '<spam class="label label-success">SI</spam>' : '<spam class="label label-default">NO</spam>';
//                    $row[] = '<a href="' . base_url('index.php/profile/assess/' . $aRow[$aColumns[2]] . '/' . $aRow['emp_razonSocial']) . '" class="btn default btn-xs blue-stripe">Evaluar</a>';
//                }  else
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
    function guardarlogenviocorreo($log) {

        $this->db->insert_batch('correo_usuario', $log);
    }

}
