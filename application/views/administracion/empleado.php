<form method="post" id="fusuario">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <label for="car_id">Cargo</label>
            <select id="car_id" name="car_id" class="form-control">
                <option value=""></option>
                <?php foreach ($cargos as $cargo) { ?>
                    <option value="<?php echo $cargo['car_id'] ?>"><?php echo $cargo['car_nombre']; ?></option>
                <?php } ?>
            </select> 
        </div>
        <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <label for="gruTra_id">Grupo de trabajo</label>
            <select id="gruTra_id" name="gruTra_id" class="form-control"> 
                <option value=""></option>
                <?php foreach ($grupotrabajo as $grupo) { ?>
                    <option value="<?php echo $grupo['gruTra_id'] ?>"><?php echo $grupo['gruTra_nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_nombres">Nombre</label><input value="<?php echo $usuario[0]['usu_nombres'] ?>" type='text' class="form-control obligatorio" name="usu_nombres" id="usu_nombres">
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_segundonombre">Segundo Nombre</label><input type='text' value="<?php echo $usuario[0]['usu_segundonombre'] ?>" class="form-control obligatorio" name="usu_segundonombre" id="usu_segundonombre">
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_apellido">Apellido</label><input type='text' class="form-control obligatorio" value="<?php echo $usuario[0]['usu_apellido'] ?>"  name="usu_apellido" id="usu_apellido">
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_segundoapellido">Segundo Apellido</label><input type='text' class="form-control obligatorio" value="<?php echo $usuario[0]['usu_segundoapellido'] ?>" name="usu_segundoapellido" id="usu_segundoapellido">
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_cc">Identificación</label><input type="text" value="<?php echo $usuario[0]['usu_cc'] ?>" class="form-control obligatorio" name="usu_cc" id="usu_cc">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="gen_id">Genero</label>
            <select id="gen_id" name="gen_id"  class="form-control">
                <option value=""></option>
                <?php foreach ($genero as $sexo) { 
                    if($sexo['gen_id'] == $usuario[0]['gen_id']){$selec= "selected";}
                    else{$selec= "";}
                    ?>
                <option <?php echo $selec; ?> value="<?php echo $sexo['gen_id'] ?>"><?php echo $sexo['gen_genero'] ?></option>
                <?php } ?>
            </select> 
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_edad">Edad</label><input type="text"  value="<?php echo $usuario[0]['usu_edad'] ?>" class="form-control obligatorio" name="usu_edad" id="usu_edad">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_fecha_nacimiento">Fecha Nacimiento</label><input type="date"  value="<?php echo $usuario[0]['usu_fecha_nacimiento'] ?>" class="form-control obligatorio date-picker" name="usu_fecha_nacimiento" id="usu_fecha_nacimiento">
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="ciu_id">Ciudad</label>
            <select id="ciu_id" name="ciu_id" class="form-control"></select>
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_celular">Celular</label>
            <input type="text" value="<?php echo $usuario[0]['usu_celular'] ?>" class="form-control obligatorio" name="usu_celular" id="usu_celular">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_telF">Telefono</label>
            <input type="text" class="form-control obligatorio"  value="<?php echo $usuario[0]['usu_telF'] ?>" name="usu_telF" id="usu_telF">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_correo">Correo</label>
            <input type="mail"  value="<?php echo $usuario[0]['usu_correo'] ?>" class="form-control obligatorio" name="usu_correo" id="usu_correo">
        </div>
    </div>
    <br>
    <div class="row">
        <hr>
    </div><br>
    <div  class="row">
        <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            <label for="tipCon_id">Tipo de Contrato</label>
            <select class="form-control" id="tipCon_id" name="tipCon_id"></select>
        </div>
        <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            <label for="usu_confir_eps">Tiene EPS</label>
            <select class="form-control obligatorio" name="usu_confir_eps" id="usu_confir_eps">
                <option value=""></option>
                <?php foreach ($confirmacion as $desicion) { ?>
                    <option value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            <label for="usu_confir_pension">Cotiza Sistema Pension</label>
            <select class="form-control obligatorio" name="usu_confir_pension" id="usu_confir_pension">
                <option value=""></option>
                <?php foreach ($confirmacion as $desicion) { ?>
                    <option value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div  class="row">
        <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            <label for="usu_confir_arl">Tiene ARL</label>
            <select  class="form-control" id="usu_confir_arl" name="usu_confir_arl">
                <option value=""></option>
                <?php foreach ($confirmacion as $desicion) { ?>
                    <option value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            <label for="usu_confir_caja_compensacio">Tiene Caja Compensación</label>
            <select class="form-control obligatorio" name="usu_confir_caja_compensacio" id="usu_confir_caja_compensacio">
                <option value=""></option>
                <?php foreach ($confirmacion as $desicion) { ?>
                    <option value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_desplazamiento_mision">Realiza desplazamientos en misión</label>
            <select  class="form-control" id="usu_desplazamiento_mision" name="usu_desplazamiento_mision">
                <option value=""></option>
                <?php foreach ($confirmacion as $desicion) { ?>
                    <option value="<?php echo $desicion['con_id'] ?>"><?php echo $desicion['con_opcion'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_rol_mision">Cual es su rol en la via en mision</label><input type="text" class="form-control obligatorio" name="usu_rol_mision" id="usu_rol_mision">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_desplazamiento_mision">con que frecuencia realiza desplazamiento en mision</label>
            <select  class="form-control" name="usu_desplazamiento_mision" id="usu_desplazamiento_mision">

            </select>
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_tipo_despla_mision">Tipo de desplazamiento en mision</label>
            <input type="text"  value="<?php echo $usuario[0]['usu_tipo_despla_mision'] ?>" class="form-control obligatorio" name="usu_tipo_despla_mision" id="usu_tipo_despla_mision">
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <label for="usu_rol_via">Rol en la via en in-itiniere(desde casa a trabajo y viceversa)</label>
            <select  class="form-control" id="usu_rol_via" name="usu_rol_via">

            </select>
        </div>
        <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <label for="usu_nro_diaro_recorrido">No recorridos diarios</label>
            <input type="text" class="form-control obligatorio"  value="<?php echo $usuario[0]['usu_nro_diaro_recorrido'] ?>" name="usu_nro_diaro_recorrido" id="usu_nro_diaro_recorrido">
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <label for="usu_tipo_transporte">Tipo de transporte que usa para realizar el despazamiento in-itinere (transporte publico,automotor,moto o ciclo, bicicleta, Transporte de la empresa, otro)</label>
            <input type="text" name="usu_tipo_transporte" id="usu_tipo_transporte" class="form-control obligatorio">
        </div>
    </div>
    <br>
    <div class="row">
        <hr>
    </div>
    <b>Si en alguno de los desplazamientos su rol es conductor conteste:</b>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="tipVeh_id">Tipo de vehiculo que conduce</label>
            <select id="tipVeh_id" class="form-control" name="tipVeh_id">
                <option value=""></option>
                <?php foreach ($tipovehiculo as $tipo) { ?>
                    <option value="<?php echo $tipo['tipVeh_id'] ?>"><?php echo $tipo['tipVeh_nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_fecha_vigencia_licencia">Fecha de vigencia de la licencia de conduccion</label>
            <input type="date" value="<?php echo $usuario[0]['usu_fecha_vigencia_licencia'] ?>"  class="form-control date-picker" name="usu_fecha_vigencia_licencia" id="usu_fecha_vigencia_licencia">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_fecha_expedicion_cc">Fecha de Expedicion Cedula</label>
            <input type="date"  value="<?php echo $usuario[0]['usu_fecha_expedicion_cc'] ?>" class="form-control date-picker" name="usu_fecha_expedicion_cc" id="usu_fecha_expedicion_cc">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="cat_id">Categoria</label>
            <select class="form-control" name="cat_id" id="cat_id">
                <option value=""></option>
                <?php foreach ($categoria as $categorias) { ?>
                    <option value="<?php echo $categorias['cat_id'] ?>"><?php echo $categorias['cat_nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_experiecia_anos">Experiencia en años de conduccion</label>
            <input type="text"  value="<?php echo $usuario[0]['usu_experiecia_anos'] ?>"  class="form-control" name="usu_experiecia_anos" id="usu_experiecia_anos">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_fecha_vigencialic">Fecha de vigencia de la licencia de conduccion</label>
            <input type="date" value="<?php echo $usuario[0]['usu_fecha_vigencia_licencia'] ?>" class="form-control" name="usu_fecha_vigencialic" id="usu_fecha_vigencialic">
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_estado_conductor">Estado Conductor</label>
            <select class="form-control" name="estCon_id" id="estCon_id">

            </select>
        </div>
        <div  class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
            <label for="usu_runt_num">No de Inscripcion ante el RUNT</label>
            <input type="text" value="<?php echo $usuario[0]['usu_runt_num'] ?>" class="form-control" name="usu_runt_num" id="usu_runt_num">
        </div>
    </div>
    <hr>
    <div class="row">
        <div  class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
            <label for="facRis_id">Principales factores de riesgo con los que se encuentra (tanto en mision como ida y vuelta al domicilio)</label>
            <select type="text" class="form-control" name="facRis_id" id="facRis_id">

            </select>
        </div>
        <div  class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
            <label for="cau_id">Causas que motivan riesgo</label>
            <select class="form-control" id="cau_id" name="cau_id">
                <option value=""></option>
                <?php foreach ($causas as $causa) { ?>
                    <option value="<?php echo $causa['cau_id'] ?>"><?php echo $causa['cau_nombre'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</form>
<div class="row" align="right">
    <button type="button" class="btn btn-success guardar">Guardar</button>
</div>
<script>
    $('.guardar').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarempleado'); ?>";

        $.post(url, $('#fusuario').serialize(), function(data) {



        });

    });
</script>    