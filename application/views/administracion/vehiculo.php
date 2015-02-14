<?php
if (count($vehiculo) > 0) {
    $veh_id = $vehiculo[0]->veh_id;
    $tipVeh_id = $vehiculo[0]->tipVeh_id;
    $tipSer_id = $vehiculo[0]->tipSer_id;
    $veh_placa = $vehiculo[0]->veh_placa;
    $veh_numlicencia = $vehiculo[0]->veh_numlicencia;
    $veh_marca = $vehiculo[0]->veh_marca;
    $veh_linea = $vehiculo[0]->veh_linea;
    $veh_color = $vehiculo[0]->veh_color;
    $veh_modelo = $vehiculo[0]->veh_modelo;
    $veh_capacidad = $vehiculo[0]->veh_capacidad;
    $veh_cilindraje = $vehiculo[0]->veh_cilindraje;
    $veh_vin = $vehiculo[0]->veh_vin;
    $veh_chasis = $vehiculo[0]->veh_chasis;
    $tipCar_id = $vehiculo[0]->tipCar_id;
    $veh_kilometraje = $vehiculo[0]->veh_kilometraje;
    $veh_fechaultmantenimiento = $vehiculo[0]->veh_fechaultmantenimiento;
    $veh_fechaproxmantenimiento = $vehiculo[0]->veh_fechaproxmantenimiento;
    $veh_realizamantenimiento = $vehiculo[0]->veh_realizamantenimiento;
    $veh_seguridadactiva = $vehiculo[0]->veh_seguridadactiva;
    $veh_seguridadpaciva = $vehiculo[0]->veh_seguridadpaciva;
    $veh_planifica = $vehiculo[0]->veh_planifica;
    $veh_preestablecidas = $vehiculo[0]->veh_preestablecidas;
    $veh_inspecciondiaria = $vehiculo[0]->veh_inspecciondiaria;
    $veh_puntoscriticos = $vehiculo[0]->veh_puntoscriticos;
    $veh_nombrepropietario = $vehiculo[0]->veh_nombrepropietario;
    $veh_identificacion = $vehiculo[0]->veh_identificacion;
    $veh_direccion = $vehiculo[0]->veh_direccion;
    $veh_telefono = $vehiculo[0]->veh_telefono;
    $veh_correo = $vehiculo[0]->veh_correo;
    $veh_comparendos = $vehiculo[0]->veh_comparendos;
    $veh_soatvigente = $vehiculo[0]->veh_soatvigente;
    $veh_numerosoat = $vehiculo[0]->veh_numerosoat;
    $veh_fechainiciosoat = $vehiculo[0]->veh_fechainiciosoat;
    $veh_fechafinsoat = $vehiculo[0]->veh_fechafinsoat;
    $veh_entidadexpsoat = $vehiculo[0]->veh_entidadexpsoat;
    $veh_rtm = $vehiculo[0]->veh_rtm;
    $veh_fecinirtm = $vehiculo[0]->veh_fecinirtm;
    $veh_fecfinrtm = $vehiculo[0]->veh_fecfinrtm;
    $veh_tarjetaoperacion = $vehiculo[0]->veh_tarjetaoperacion;
    $veh_empresaafiliacion = $vehiculo[0]->veh_empresaafiliacion;
    $veh_feciniafiliacion = $vehiculo[0]->veh_feciniafiliacion;
    $veh_fecfinafiliacion = $vehiculo[0]->veh_fecfinafiliacion;
    $usu_id = $vehiculo[0]->usu_id;
    $est_id = $vehiculo[0]->est_id;
} else {
    $veh_id = '';
    $tipVeh_id = '';
    $tipSer_id = '';
    $veh_placa = '';
    $veh_numlicencia = '';
    $veh_marca = '';
    $veh_linea = '';
    $veh_color = '';
    $veh_modelo = '';
    $veh_capacidad = '';
    $veh_cilindraje = '';
    $veh_vin = '';
    $veh_chasis = '';
    $tipCar_id = '';
    $veh_kilometraje = '';
    $veh_fechaultmantenimiento = '';
    $veh_fechaproxmantenimiento = '';
    $veh_realizamantenimiento = '';
    $veh_seguridadactiva = '';
    $veh_seguridadpaciva = '';
    $veh_planifica = '';
    $veh_preestablecidas = '';
    $veh_inspecciondiaria = '';
    $veh_puntoscriticos = '';
    $veh_nombrepropietario = '';
    $veh_identificacion = '';
    $veh_direccion = '';
    $veh_telefono = '';
    $veh_correo = '';
    $veh_comparendos = '';
    $veh_soatvigente = '';
    $veh_numerosoat = '';
    $veh_fechainiciosoat = '';
    $veh_fechafinsoat = '';
    $veh_entidadexpsoat = '';
    $veh_rtm = '';
    $veh_fecinirtm = '';
    $veh_fecfinrtm = '';
    $veh_tarjetaoperacion = '';
    $veh_empresaafiliacion = '';
    $veh_feciniafiliacion = '';
    $veh_fecfinafiliacion = '';
    $usu_id = '';
    $est_id = '';
}
?>

<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> AGREGAR VEHICULOS</h5>
</div>
<div class='well'>
    <form method="post" action="<?php echo base_url('index.php/administracion/guardarvehiculo'); ?>" onsubmit="return obligatorio('1')" >
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="tipVeh_id">Tipo Vehiculo</label>
                <select id="tipVeh_id" name="tipVeh_id" class="form-control obligado" class="obligatorio">
                    <option value=""></option>
                    <?php
                    foreach ($tipovehiculo as $tipo) {
                        if ($tipo['tipVeh_id'] == $tipVeh_id) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $tipo['tipVeh_id'] ?>"><?php echo $tipo['tipVeh_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="tipSer_id">Tipo Servicio</label>
                <select id="tipSer_id" name="tipSer_id" class="form-control obligado">
                    <option value=""></option>
                    <?php
                    foreach ($tiposervicio as $tiposer) {
                        if ($tiposer['tipSer_id'] == $tipSer_id) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $tiposer['tipSer_id'] ?>"><?php echo $tiposer['tipSer_nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_placa">Placa</label>
                <input type="text" class="form-control obligado" name="veh_placa" id="veh_placa">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_numlicencia">No licencia trancito</label>
                <input type="text" class="form-control obligado" name="veh_numlicencia" id="veh_numlicencia">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_marca">Marca</label>
                <input type="text" class="form-control obligado" name="veh_marca" id="veh_marca">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_linea">Linea</label>
                <input type="text" class="form-control obligado" name="veh_linea" id="veh_linea">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_color">Color</label>
                <input type="text" class="form-control obligado" name="veh_color" id="veh_color">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_modelo">Modelo</label>
                <input type="text" class="form-control obligado" name="veh_modelo" id="veh_modelo">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_capacidad">Capacidad de Carga</label>
                <input type="text" class="form-control obligado" name="veh_capacidad" id="veh_capacidad">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_cilindraje">Cilindraje</label>
                <input type="text" class="form-control obligado" name="veh_cilindraje" id="veh_cilindraje">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="veh_vin">No VIN</label>
                <input type="text" class="form-control obligado" name="veh_vin" id="veh_vin">
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="veh_chasis">No Chasis</label>
                <input type="date" class="form-control obligado" name="veh_chasis" id="veh_chasis">
            </div>
            <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <label for="tipCar_id">Tipo Carroceria</label>
                <input type="date" class="form-control obligado" name="tipCar_id" id="tipCar_id">
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_kilometraje">Kilometraje actual</label>
                <input type="text" class="form-control obligado" name="veh_kilometraje" id="veh_kilometraje">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechaultmantenimiento">Fecha ultimo Mantenimiento</label>
                <input type="date" class="form-control date-picker" name="veh_fechaultmantenimiento" id="veh_fechaultmantenimiento">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechaproxmantenimiento">Fecha proximo Mantenimiento</label>
                <input type="date" class="form-control date-picker" name="veh_fechaproxmantenimiento" id="veh_fechaproxmantenimiento">
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_realizamantenimiento">Centro donde realiza el mantenimiento</label>
                <input type="text" class="form-control obligado" name="veh_realizamantenimiento" id="veh_realizamantenimiento">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_seguridadactiva">El vehiculo cuenta con seguridad activa</label>
                <select class="form-control obligado" name="veh_seguridadactiva" id="veh_seguridadactiva">
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_seguridadactiva) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_seguridadpaciva">El vehiculo cuenta con seguridad pasiva</label>
                <select class="form-control obligado" name="veh_seguridadpaciva" id="veh_seguridadpaciva">
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_seguridadpaciva) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_planifica">Esta planificada la modernizacion del vehiculo</label>
                <select class="form-control obligado" name="veh_planifica" id="veh_planifica">
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_planifica) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_preestablecidas">Las rutas del vehiculo estan preestablecidas</label>
                <select class="form-control obligado" name="veh_preestablecidas" id="veh_preestablecidas">
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_preestablecidas) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_inspecciondiaria">Realiza inspeccion diaria del vehiculo</label>
                <select class="form-control obligado" name="veh_inspecciondiaria" id="veh_inspecciondiaria">
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_inspecciondiaria) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_puntoscriticos">Estan identificados los puntos criticos de mayor accidentalidad de la ruta</label>
                <select class="form-control obligado" name="veh_puntoscriticos" id="veh_puntoscriticos">
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_puntoscriticos) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-">
                <label for="veh_nombrepropietario">Nombre del Propietario</label>
                <input type="text" id="veh_nombrepropietario" name="veh_nombrepropietario" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_identificacion">Cedula</label>
                <input type="text" id="veh_identificacion" name="veh_identificacion" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_direccion">Direccion</label>
                <input type="text" id="veh_direccion" name="veh_direccion" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_telefono">Telefono</label>
                <input type="text" id="veh_telefono" name="veh_telefono" class='form-control'>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_correo">Correo Electronico</label>
                <input type="text" id="veh_correo" name="veh_correo" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_comparendos">Posee actualmente deudas de comparendos</label>
                <select id="veh_comparendos" name="veh_comparendos" class='form-control'>
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_comparendos) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_soatvigente">Tiene Soat Vigente</label>
                <select id="veh_soatvigente" name="veh_soatvigente" class='form-control'>
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_soatvigente) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?>value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_numerosoat">Numero Soat</label>
                <input type="text" id="veh_numerosoat" name="veh_numerosoat" class='form-control'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechainiciosoat">Fecha Vigencia</label>
                <input type="date" id="veh_fechainiciosoat date-picker" name="veh_fechainiciosoat" class='form-control date-picker'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fechafinsoat">Fecha fin vigencia</label>
                <input type="date" id="veh_fechafinsoat date-picker" name="veh_fechafinsoat" class='form-control date-picker'>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_entidadexpsoat">Entidad expide el soat</label>
                <select id="veh_entidadexpsoat" name="veh_entidadexpsoat" class='form-control'>

                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_rtm">Tiene RTM vigente</label>
                <select id="veh_rtm" name="veh_rtm" class='form-control'>
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_rtm) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fecinirtm">Fecha Inicio Vigencia</label>
                <input type="date" id="veh_fecinirtm" name="veh_fecinirtm" class='form-control date-picker'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-">
                <label for="veh_fecfinrtm">Fecha fin vigencia</label>
                <input type="date" id="veh_fecfinrtm" name="veh_fecfinrtm" class='form-control date-picker'>
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_tarjetaoperacion">para prestar los servicios de transporte, esta obligado a tener tarjeta de operacion</label>
                <select id="veh_tarjetaoperacion" name="veh_tarjetaoperacion" class='form-control'>
                    <option value=""></option>
                    <?php
                    foreach ($confirmacion as $validacion) {
                        if ($validacion['con_id'] == $veh_tarjetaoperacion) {
                            $sele = "selected='selected'";
                        } else {
                            $sele = "";
                        }
                        ?>
                        <option <?php echo $sele; ?> value="<?php echo $validacion['con_id'] ?>"><?php echo $validacion['con_opcion'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                <label for="veh_empresaafiliacion">Nombre de la empresa a la que se encuentra afiliado</label>
                <input type="text" id="veh_empresaafiliacion" name="veh_empresaafiliacion" class='form-control'>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_feciniafiliacion">Fecha Inicio vigencia</label>
                <input type="date" id="veh_feciniafiliacion date-picker" name="veh_feciniafiliacion" class='form-control date-picker'>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <label for="veh_fecfinafiliacion">Fecha Fin Vigencia</label>
                <input type="date" id="veh_fecfinafiliacion" name="veh_fecfinafiliacion" class='form-control date-picker'>
            </div>
        </div>
        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $id_emp; ?>">
        <input type="hidden" name="veh_id" id="veh_id" value="<?php echo $id; ?>">
        <div class="row" align="right">
            <button class="btn btn-success" >Guardar</button>
        </div>
    </form>

</div>