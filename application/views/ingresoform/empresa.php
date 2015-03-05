
<div class="alert alert-info"><center><?php echo $titulo; ?></center></div>
<form action="<?php echo base_url('index.php/ingresoform/guardar_emp/'); ?>" onsubmit="return obligatorio('1')" method="post">
    <div class="row" >
        <!--    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px">-->
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <label>Nombre/Razón Social</label><?php echo form_input('emp_razonSocial', $empresa[0]->emp_razonSocial, 'class="form-control obligatorio" id="emp_razonSocial"') ?>
            </div>
            <div class="col-md-2 col-lg-2">
                <label>Nit</label>

                <?php echo form_input('emp_nit', $empresa[0]->emp_nit, 'class="form-control obligatorio" placeholder="NIT"  id="emp_nit"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                <label>Tipo de Empresa</label><?php echo form_dropdown('emp_idTipo', $tipo_empresa, $empresa[0]->emp_idTipo, 'id="emp_idTipo" class="form-control"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                <label>Segmento a la que pertenece</label>
                <select class="form-control" name="emp_segmento" id="emp_segmento">
                    <option value="">-Seleccionar-</option>
                    <?php
                    foreach ($segmento as $segment) {
                        if ($empresa[0]->emp_segmento == $segment['seg_id'])
                            $select = 'selected';
                        else
                            $select = '';
                        ?>
                        <option <?php echo $select; ?> value="<?php echo $segment['seg_id']; ?>"><?php echo $segment['seg_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <label>Actividad Economica (CIIU)</label><select name="emp_ciiu1" id="emp_ciiu1" class="form-control obligatorio">
                    <option value="">Grupo :: Clase :: Descripción</option>
                    <?php
                    for ($i = 0; $i < count($ciiu); $i++) {
                        if (!empty($ciiu[$i]->ciiu_grupo)) {
                            if ($i != 0) {
                                ?>
                                </optgroup>
                            <?php } ?>
                            <optgroup label="<?php echo $ciiu[$i]->ciiu_description; ?>">
                                <?php
                            } else {

                                if ($empresa[0]->emp_ciiu1 == $ciiu[$i]->ciiu_id) {
                                    $sele = "selected='selected'";
                                } else {
                                    $sele = "";
                                }
                                ?>
                                <option <?php echo $sele; ?> value="<?php echo $ciiu[$i]->ciiu_id; ?>"><?php echo $ciiu[$i]->ciiu_grupo . " :: " . $ciiu[$i]->ciiu_clase . " :: " . $ciiu[$i]->ciiu_description; ?></option>
                                <?php
                            }
                        }
                        ?>    </optgroup>
                </select>

            </div>
            <div class="col-md-3 col-lg-3">
                <label>Actividad Economica Secundaria (CIIU)</label>
                <select name="emp_ciiu2" id="emp_ciiu2" class="form-control">
                    <option value="">Grupo :: Clase :: Descripción</option>
                    <?php
                    for ($i = 0; $i < count($ciiu); $i++) {
                        if (!empty($ciiu[$i]->ciiu_grupo)) {
                            if ($i != 0) {
                                ?>
                                </optgroup>
                            <?php } ?>
                            <optgroup label="<?php echo $ciiu[$i]->ciiu_description; ?>">
                                <?php
                            } else {
                                if ($empresa[0]->emp_ciiu2 == $ciiu[$i]->ciiu_id) {
                                    $sele = "selected='selected'";
                                } else {
                                    $sele = "";
                                }
                                ?>
                                <option <?php echo $sele; ?> value="<?php echo $ciiu[$i]->ciiu_id; ?>"><?php echo $ciiu[$i]->ciiu_grupo . " :: " . $ciiu[$i]->ciiu_clase . " :: " . $ciiu[$i]->ciiu_description; ?></option>
                                <?php
                            }
                        }
                        ?>    </optgroup>
                </select>

            </div>
            <div class="col-md-3 col-lg-3">
                <label>Telefono</label><?php echo form_input('emp_telefono', $empresa[0]->emp_telefono, 'class="form-control obligatorio" placeholder="TELEFONO" id="emp_telefono"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                <label>Direccion Principal</label><?php echo form_input('emp_direccion', $empresa[0]->emp_direccion, 'class="form-control obligatorio" placeholder="DIRECCION" id="emp_direccion"') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-lg-2">
                <label>Sucursales</label><?php echo form_dropdown('emp_sucursal', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_sucursal, 'id="emp_sucursal" class="form-control obligatorio" ') ?>
            </div>
            <div class="col-md-4 col-lg-4">
                <label>Direcciones Sucursales</label><?php echo form_input('emp_direccioSuc', $empresa[0]->emp_direccioSuc, 'class="form-control obligatorio" placeholder="DIRECCION" id="emp_direccioSuc"') ?>
            </div>
            <div class="col-md-4 col-lg-4">
                <label>Nombre del Representante Legal</label><?php echo form_input('emp_nombre_repre', $empresa[0]->emp_nombre_repre, 'class="form-control obligatorio" placeholder="REPRESENTANTE" id="emp_nombre_repre"') ?>
            </div>
            <div class="col-md-2 col-lg-2">
                <label>Cedula de Ciudadania</label><?php echo form_input('emp_numDocRepre', $empresa[0]->emp_numDocRepre, 'class="form-control obligatorio" placeholder="CEDULA" id="emp_numDocRepre"') ?>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="row">
            <center>No Actual de Vehiculos
            </center>  
        </div>  
        <div class="row">  
            <div class="row">
                <!--<div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">-->
                <!--            <div class="col-md-3 col-lg-3">
                                <label>¿ Posee, Contrata o Administra vehiculos?</label><?php echo form_dropdown('emp_administraVehiculos', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_administraVehiculos, 'id="emp_administraVehiculos" class="form-control"') ?>
                            </div>-->
                <div class="col-md-3 col-lg-3">
                    <label>Propios</label><?php echo form_input('emp_vehiculosPropios', $totalvehiculos[0]->propios, 'disabled="disabled" class="form-control obligatorio" id="emp_vehiculosPropios"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label>Contratistas</label>
                    <!--<input type="text" class="form-control obligatorio" id="emp_vehiculosContratados" value="<?php echo $empresa[0]->emp_vehiculosContratados; ?>" name="emp_vehiculosContratados">-->
                    <?php echo form_input('emp_vehiculosContratados', $totalvehiculos[0]->contratista, 'disabled="disabled" class="form-control obligatorio" id="emp_vehiculosContratados"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label>Administrados</label>
                    <!--<input type="text" class="form-control" value="<?php echo $empresa[0]->emp_numeroVehiculoAdministra; ?>" class="form-control obligatorio" id="emp_numeroVehiculoAdministra" name="emp_numeroVehiculoAdministra">-->    
                    <?php echo form_input('emp_numeroVehiculoAdministra', $totalvehiculos[0]->administrado, 'disabled="disabled" class="form-control obligatorio" id="emp_numeroVehiculoAdministra"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label>Total</label><input disabled="disabled" type="text" value="<?php echo $totalvehiculos[0]->total; ?>"  class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <center>No Actual de Conductores</center>
            </div>    
            <div class="row">
                <!--            <div class="col-md-3 col-lg-3">
                                <label>¿contrata o administra conductores?</label><?php echo form_dropdown('emp_adminConductores', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_adminConductores, 'id="emp_adminConductores" class="form-control"') ?>
                            </div>-->
                <div class="col-md-3 col-lg-3">
                    <label>Propios</label><?php echo form_input('emp_numActConductores', $conductores[0]->propios, 'disabled="disabled" class="form-control obligatorio" id=emp_numActConductores') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label>Contratistas</label><?php echo form_input('emp_numActConductores', $conductores[0]->contratista, ' disabled="disabled" class="form-control obligatorio" id=emp_numActConductores') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label>Administrados</label><?php echo form_input('emp_numActConductoresAdministra', $conductores[0]->administrado, 'disabled="disabled" class="form-control obligatorio" id=emp_numActConductoresAdministra') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    <label>Total</label><input disabled="disabled" type="text" value="<?php echo $conductores[0]->total; ?>"  class="form-control">
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row" >
        <!--<div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">-->

        <div class="row">
            <div class="col-md-3 col-lg-3">
                <label>¿Cuentan con ARL?</label><?php echo form_dropdown('emp_idArl', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_idArl, 'id="emp_idArl" class="form-control"') ?>
            </div>
            <div class="col-md-2 col-lg-2">
                <label>Cual?</label><?php echo form_input('emp_Arl_otra', $empresa[0]->emp_Arl_otra, 'class="form-control" id="emp_Arl_otra"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                <label>¿cuenta actualente con HSEQ?</label><?php echo form_dropdown('emp_hseq', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_hseq, 'id"=emp_hseq" class="form-control" ') ?>
            </div>
            <div class="col-md-4 col-lg-4">
                <label>¿Cuenta con un procedimiento para seleccion de conductores?</label><?php echo form_dropdown('emp_seleccionConductores', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_seleccionConductores, 'id="emp_seleccionConductores" class="form-control"') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <label>¿Realiza pruebas de ingreso a los conductores?</label><?php echo form_dropdown('emp_ingresoConductores', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_ingresoConductores, 'id="emp_ingresoConductores" class="form-control"') ?>
            </div>
            <div class="col-md-1 col-lg-1">
                <label> Examenes Medicos</label><?php echo form_checkbox('emp_examenesMedicos', '1', ((($empresa[0]->emp_examenesMedicos) == 1) ? TRUE : FALSE), 'id="emp_examenesMedicos"') ?>
            </div>
            <div class="col-md-1 col-lg-1">
                <label>Prueba Teorica</label><?php echo form_checkbox('emp_pruebasTeoricas', '1', ((($empresa[0]->emp_pruebasTeoricas) == 1) ? TRUE : FALSE), 'id="emp_pruebasTeoricas"') ?>
            </div>
            <div class="col-md-2 col-lg-2">
                <label>Examentes psocosensometricos</label><?php echo form_checkbox('emp_examenesPsicosensometricos', '1', ((($empresa[0]->emp_examenesPsicosensometricos) == 1) ? TRUE : FALSE), 'id="emp_examenesPsicosensometricos"') ?>
            </div>
            <div class="col-md-1 col-lg-1">
                <label>Prueba tactica</label><?php echo form_checkbox('emp_pruebaTactica', '1', ((($empresa[0]->emp_examenesPsicosensometricos) == 1) ? TRUE : FALSE), 'id="emp_pruebaTactica"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                <label>¿realiza capacitacion en seguridad vial?</label><?php echo form_dropdown('emp_capacitaPruebaVial', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_capacitaPruebaVial, 'id="emp_capacitaPruebaVial" class="form-control"') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <label>Logo Corporativo: </label><input type="file" id="emp_imagen" name="emp_imagen">
            </div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row" >
        <!--<div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">-->
        <div class="col-md-7 col-lg-7">
            <label>¿cuenta con un procedimiento de atencion a victimas en caso de accidente y/o incidentes de transito?</label><?php echo form_dropdown('emp_procedimientoAtencion', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_procedimientoAtencion, 'id="emp_procedimientoAtencion" class="form-control"') ?>
        </div>
        <div class="col-md-5 col-lg-5">
            <label>¿posee historicos de acciodentes y/o incidentes de transito?</label><?php echo form_dropdown('emp_historicoAccidente', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_historicoAccidente, 'id="emp_historicoAccidente" class="form-control"') ?>
        </div>
        <br>
        <hr>
        <br>
        <div class="col-md-12 col-lg-12">
            <input type="hidden" value="<?php echo $id; ?>" id="emp_id" name="emp_id">
            <center>
                <button class="guardar btn btn-success">Guardar</button>
            </center>
        </div>
    </div>
</form>

<script>
    $('#emp_nit').validCampoFranz('0123456789');


    $('#emp_nit').change(function () {
        var num = $(this).val();
        console.log(num);
        if (isNaN(num)) {
            $('#emp_nit').val('');
            alert('Dato no correcto.')
            return  false;
        }

        var url = base_url_js + "index.php/ingresoform/confir_nit";
        var emp_nit = $(this).val();
        if (emp_nit != "") {
            $.post(url, {emp_nit, emp_nit})
                    .done(function (msg) {
                        if (msg > 0) {
                            alert('El Nit ya se Encuentra Registrado en el Sistema')
                            $('#emp_nit').val('');
                        }
                    }).fail(function (msg) {

            })
        }
    })
</script>