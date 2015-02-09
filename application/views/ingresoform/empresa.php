<div class="container">
    <center><h1><?php echo $titulo; ?></h1></center>
    <form action="<?php echo base_url('index.php/ingresoform/guardar_emp/'); ?>" onsubmit="return obligatorio('1')" method="post">
        <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px">
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Nombre/Razón Social
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_razonSocial', '', 'class="form-control obligatorio" id="emp_razonSocial"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Nit    
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_nit', '', 'class="form-control obligatorio" id="emp_nit"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Tipo de Empresa
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_dropdown('emp_idTipo', array(), "", 'id="emp_idTipo" class="form-control"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Segmento a la que pertenece
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_segmento', '', 'class="form-control obligatorio" id="emp_segmento"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Actividad Economica (CIIU)
                </div>
                <div class="col-md-3 col-lg-3">
                    <select name="emp_ciiu1" id="emp_ciiu1" class="form-control obligatorio">
                        <option value="">Grupo :: Clase :: Descripción</option>
                        <?php foreach ($ciiu as $value) { ?>
                            <option value="<?php echo $value->ciiu_id; ?>"><?php echo $value->ciiu_grupo . " :: " . $value->ciiu_clase . " :: " . $value->ciiu_description; ?></option>
                        <?php } ?>    
                    </select>

                </div>
                <div class="col-md-3 col-lg-3">
                    Actividad Economica Secundaria (CIIU)
                </div>
                <div class="col-md-3 col-lg-3">

                    <select name="emp_ciiu2" id="emp_ciiu2" class="form-control obligatorio">
                        <option value="">Grupo :: Clase :: Descripción</option>
                        <?php
                        for ($i = 0; $i < count($ciiu); $i++) {
                            if (!empty($value->ciiu_grupo)) {
                                if ($i != 0) {
                                    ?>
                                    </optgroup>
                                <?php } ?>
                                <optgroup label="<?php echo $ciiu[$i]->ciiu_description; ?>">
                                    <?php
                                } else {
                                    ?>
                                    <option value="<?php echo $ciiu[$i]->ciiu_id; ?>"><?php echo $ciiu[$i]->ciiu_grupo . " :: " . $ciiu[$i]->ciiu_clase . " :: " . $ciiu[$i]->ciiu_description; ?></option>
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
                    <?php echo form_input('emp_telefono', '', 'class="form-control obligatorio" id="emp_telefono"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Direccion Principal
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_direccion', '', 'class="form-control obligatorio" id="emp_direccion"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Sucursales
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_sucursal', '1', false, 'id="emp_sucursal" class="form-control" ') ?>
                    NO
                    <?php echo form_radio('emp_sucursal', '0', true, 'id="emp_sucursal" class="form-control"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Direcciones Sucursales
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_direccioSuc', '', 'class="form-control obligatorio" id="emp_direccioSuc"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Nombre del Representante Legal
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_nombre_repre', '', 'class="form-control obligatorio" id="emp_nombre_repre"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    CC
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_numDocRepre', '', 'class="form-control obligatorio" id="emp_numDocRepre"') ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿La Empresa, Posee, Contrato o Administra vehiculos?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_administraVehiculos', '1', FALSE, 'id="emp_administraVehiculos"') ?>
                    NO
                    <?php echo form_radio('emp_administraVehiculos', '0', TRUE, 'id="emp_administraVehiculos"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Numero Actual de Vehiculos Propios
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_vehiculosPropios', '', 'class="form-control obligatorio" id="emp_vehiculosPropios"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Numero actual de vehiculos contratados
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_vehiculosContratados', '', 'class="form-control obligatorio" id="emp_vehiculosContratados"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Numero Actual de vehiculos que administra
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_numeroVehiculoAdministra', '', 'class="form-control obligatorio" id="emp_numeroVehiculoAdministra"') ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿la empresa contrata o administra conductores?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_adminConductores', '1', FALSE, 'id=emp_adminConductores') ?>
                    NO
                    <?php echo form_radio('emp_adminConductores', '0', TRUE, 'id=emp_adminConductores') ?>

                </div>
                <div class="col-md-3 col-lg-3">
                    Numero Actual de Conductores Contratados
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_numActConductores', '', 'class="form-control obligatorio" id=emp_numActConductores') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Numero Actual de Conductores que administra
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_numActConductoresAdministra', '', 'class="form-control obligatorio" id=emp_numActConductoresAdministra') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿La Empresa cuenta actualmente con ARL?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI 
                    <?php echo form_radio('emp_idArl', '1', FALSE, 'id=emp_idArl') ?>
                    NO
                    <?php echo form_radio('emp_idArl', '0', TRUE, 'id=emp_idArl') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Cual?
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_input('emp_idArl_otra', '', 'class="form-control obligatorio" id="emp_idArl_otra"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿La Empresa cuenta actualente con HSEQ?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_hseq', '1', FALSE, 'id=emp_hseq') ?>
                    NO
                    <?php echo form_radio('emp_hseq', '0', TRUE, 'id=emp_hseq') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿Cuenta con un procedimiento para seleccion de conductores?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_seleccionConductores', '1', FALSE, 'id="emp_seleccionConductores"') ?>
                    NO
                    <?php echo form_radio('emp_seleccionConductores', '0', TRUE, 'id="emp_seleccionConductores"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿Realiza pruebas de ingreso a los conductores?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_ingresoConductores', '1', FALSE, 'id="emp_ingresoConductores"') ?>
                    NO
                    <?php echo form_radio('emp_ingresoConductores', '0', TRUE, 'id="emp_ingresoConductores"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Examenes Medicos
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_checkbox('emp_examenesMedicos', '1', FALSE, 'id="emp_examenesMedicos"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Prueba Teorica
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_checkbox('emp_pruebasTeoricas', '1', FALSE, 'id="emp_pruebasTeoricas"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    Examentes psocosensometricos
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_checkbox('emp_examenesPsicosensometricos', '1', FALSE, 'id="emp_examenesPsicosensometricos"') ?>
                </div>
                <div class="col-md-3 col-lg-3">
                    Prueba tactica
                </div>
                <div class="col-md-3 col-lg-3">
                    <?php echo form_checkbox('emp_pruebaTactica', '1', FALSE, 'id="emp_pruebaTactica"') ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12" style="border: 1px solid #CCC;padding: 15px;margin-top:10px">
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿La empresa realiza capacitacion en seguridad vial?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_capacitaPruebaVial', '1', FALSE, 'id="emp_capacitaPruebaVial"') ?>
                    NO
                    <?php echo form_radio('emp_capacitaPruebaVial', '0', TRUE, 'id="emp_capacitaPruebaVial"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿La empresa cuenta con un procedimiento de atencion a victimas en caso de accidente y/o incidentes de transito?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_procedimientoAtencion', '1', FALSE, 'id="emp_procedimientoAtencion"') ?>
                    NO
                    <?php echo form_radio('emp_procedimientoAtencion', '0', TRUE, 'id="emp_procedimientoAtencion"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="col-md-3 col-lg-3">
                    ¿La empresa posee historicos de acciodentes y/o incidentes de trancito?
                </div>
                <div class="col-md-3 col-lg-3">
                    SI
                    <?php echo form_radio('emp_historicoAccidente', '1', FALSE, 'id="emp_historicoAccidente"') ?>
                    NO
                    <?php echo form_radio('emp_historicoAccidente', '0', TRUE, 'id="emp_historicoAccidente"') ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <center>
                    <button class="guardar">Guardar</button>
                </center>
            </div>
        </div>
    </form>
</div>