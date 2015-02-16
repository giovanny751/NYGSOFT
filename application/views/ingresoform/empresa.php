
<center><h1><?php echo $titulo; ?></h1></center>
<form action="<?php echo base_url('index.php/ingresoform/guardar_emp/'); ?>" onsubmit="return obligatorio('1')" method="post">
    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px">
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Nombre/Razón Social
            </div>
            <div class="col-md-3 col-lg-3">
                <?php echo form_input('emp_razonSocial', $empresa[0]->emp_razonSocial, 'class="form-control obligatorio" id="emp_razonSocial"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Nit  
            </div>
            <div class="col-md-3 col-lg-3">
                <?php echo form_input('emp_nit', $empresa[0]->emp_nit, 'class="form-control obligatorio" id="emp_nit"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Tipo de Empresa
            </div>
            <div class="col-md-3 col-lg-3">
                <?php echo form_dropdown('emp_idTipo', $tipo_empresa, $empresa[0]->emp_idTipo, 'id="emp_idTipo" class="form-control"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Segmento a la que pertenece
            </div>
            <div class="col-md-3 col-lg-3">
                <select class="form-control obligatorio" name="emp_segmento" id="emp_segmento">
                    <option value="">-Seleccionar-</option>
                    <?php foreach ($segmento as $segment) { 
                        if($empresa[0]->emp_segmento == $segment['seg_id'])$select= 'selected';
                        else $select = '';
                        ?>
                    <option value="<?php echo $segment['seg_id']; ?>"><?php echo $segment['seg_nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Actividad Economica (CIIU)
            </div>
            <div class="col-md-3 col-lg-3">
                <select name="emp_ciiu1" id="emp_ciiu1" class="form-control obligatorio">
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
                Actividad Economica Secundaria (CIIU)
            </div>
            <div class="col-md-3 col-lg-3">

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
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Telefono
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_telefono', $empresa[0]->emp_telefono, 'class="form-control obligatorio" id="emp_telefono"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Direccion Principal
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_direccion', $empresa[0]->emp_direccion, 'class="form-control obligatorio" id="emp_direccion"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Sucursales
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_sucursal', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_sucursal, 'id="emp_sucursal" class="form-control obligatorio" ') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Direcciones Sucursales
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_direccioSuc', $empresa[0]->emp_direccioSuc, 'class="form-control obligatorio" id="emp_direccioSuc"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Nombre del Representante Legal
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_nombre_repre', $empresa[0]->emp_nombre_repre, 'class="form-control obligatorio" id="emp_nombre_repre"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Cedula de Ciudadania
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_numDocRepre', $empresa[0]->emp_numDocRepre, 'class="form-control obligatorio" id="emp_numDocRepre"') ?>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿La Empresa, Posee, Contrato o Administra vehiculos?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_administraVehiculos', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_administraVehiculos, 'id="emp_administraVehiculos" class="form-control"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Numero Actual de Vehiculos Propios
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_vehiculosPropios', $empresa[0]->emp_vehiculosPropios, 'class="form-control obligatorio" id="emp_vehiculosPropios"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Numero actual de vehiculos contratados
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_vehiculosContratados', $empresa[0]->emp_vehiculosContratados, 'class="form-control obligatorio" id="emp_vehiculosContratados"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Numero Actual de vehiculos que administra
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_numeroVehiculoAdministra', $empresa[0]->emp_numeroVehiculoAdministra, 'class="form-control obligatorio" id="emp_numeroVehiculoAdministra"') ?>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿la empresa contrata o administra conductores?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_adminConductores', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_adminConductores, 'id="emp_adminConductores" class="form-control"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Numero Actual de Conductores Contratados
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_numActConductores', $empresa[0]->emp_numActConductores, 'class="form-control obligatorio" id=emp_numActConductores') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Numero Actual de Conductores que administra
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_numActConductoresAdministra', $empresa[0]->emp_numActConductoresAdministra, 'class="form-control obligatorio" id=emp_numActConductoresAdministra') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿La Empresa cuenta actualmente con ARL?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_idArl', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_idArl, 'id="emp_idArl" class="form-control"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Cual?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_input('emp_Arl_otra', $empresa[0]->emp_Arl_otra, 'class="form-control" id="emp_Arl_otra"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿La Empresa cuenta actualente con HSEQ?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_hseq', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_hseq, 'id"=emp_hseq" class="form-control" ') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿Cuenta con un procedimiento para seleccion de conductores?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_seleccionConductores', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_seleccionConductores, 'id="emp_seleccionConductores" class="form-control"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿Realiza pruebas de ingreso a los conductores?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_ingresoConductores', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_ingresoConductores, 'id="emp_ingresoConductores" class="form-control"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Examenes Medicos
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_checkbox('emp_examenesMedicos', '1', ((($empresa[0]->emp_examenesMedicos) == 1) ? TRUE : FALSE), 'id="emp_examenesMedicos"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Prueba Teorica
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_checkbox('emp_pruebasTeoricas', '1', ((($empresa[0]->emp_pruebasTeoricas) == 1) ? TRUE : FALSE), 'id="emp_pruebasTeoricas"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                Examentes psocosensometricos
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_checkbox('emp_examenesPsicosensometricos', '1', ((($empresa[0]->emp_examenesPsicosensometricos) == 1) ? TRUE : FALSE), 'id="emp_examenesPsicosensometricos"') ?>
            </div>
            <div class="col-md-3 col-lg-3">
                Prueba tactica
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_checkbox('emp_pruebaTactica', '1', ((($empresa[0]->emp_examenesPsicosensometricos) == 1) ? TRUE : FALSE), 'id="emp_pruebaTactica"') ?>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿La empresa realiza capacitacion en seguridad vial?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_capacitaPruebaVial', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_capacitaPruebaVial, 'id="emp_capacitaPruebaVial" class="form-control"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿La empresa cuenta con un procedimiento de atencion a victimas en caso de accidente y/o incidentes de transito?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_procedimientoAtencion', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_procedimientoAtencion, 'id="emp_procedimientoAtencion" class="form-control"') ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="col-md-3 col-lg-3">
                ¿La empresa posee historicos de acciodentes y/o incidentes de trancito?
            </div>
            <div class="col-md-3 col-lg-3">
<?php echo form_dropdown('emp_historicoAccidente', array('2' => 'No', '1' => 'Si'), $empresa[0]->emp_historicoAccidente, 'id="emp_historicoAccidente" class="form-control"') ?>
            </div>
        </div>
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


        $('#emp_nit').change(function() {
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
                        .done(function(msg) {
                    if (msg > 0) {
                        alert('El Nit ya se Encuentra Registrado en el Sistema')
                        $('#emp_nit').val('');
                    }
                }).fail(function(msg) {

                })
            }
        })
</script>