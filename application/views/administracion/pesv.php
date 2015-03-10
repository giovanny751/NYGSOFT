<style>
    label{
        color:black;
    }
    #container {
        height: 400px; 
        min-width: 310px; 
        max-width: 800px;
        margin: 0 auto;
    }
</style>
<?php // var_dump($itiniere);die;?>
<script src="<?php echo base_url('js/reportes/highcharts.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('js/reportes/highcharts-3d.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('js/exporting.js') ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url('dist/css/font-awesome.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('dist/js/summernote.js?v=' . date("d-h")); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('dist/js/script_summernote.js?v=' . date("d-h")); ?>"></script>
<link href="<?php echo base_url('dist/css/summernote.css?v=' . date("d-h")); ?>" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<div style="text-align: right"><a href="<?php echo base_url('index.php/Administracion/pesv_pdf') ?>" target="_black" class="btn green"> Imprimir PDF</a></div>
<div class="portlet box blue tabbable">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>INFORMACIÓN EMPRESA
        </div>
    </div>
    <div class="portlet-body">
        <div class=" portlet-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#portlet_tab1" data-toggle="tab">INTRODUCCIÓN </a></li>
                <li><a href="#portlet_tab2" data-toggle="tab">OBJETIVOS</a></li>
                <!--<li><a href="#portlet_tab2" data-toggle="tab">OBJETIVOS PESV</a></li>-->
                <li><a href="#portlet_tab3" data-toggle="tab">COMPROMISO </a></li>
                <li><a href="#portlet_tab4" data-toggle="tab">RESPONSABLES </a></li>
                <li><a href="#portlet_tab5" data-toggle="tab">COMITE </a></li>
                <li><a href="#portlet_tab6" data-toggle="tab">POLÍTICA </a></li>
                <li><a href="#portlet_tab7" data-toggle="tab">COMUNICACIÓN </a></li>
                <li><a href="#portlet_tab10" data-toggle="tab">ESTADISTICAS </a></li>
                <li><a href="#portlet_tab8" data-toggle="tab">DIAGNÓSTICO</a></li>
                <li><a href="#portlet_tab9" data-toggle="tab">PRIORIDADES</a></li>
                <li><a href="#portlet_tab11" data-toggle="tab">CRONOGRAMA</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="portlet_tab1">
                    <div class="alert alert-info"><center><p><b>INTRODUCCIÓN</b></p></center></div>
                    <div col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8>
                        <textarea id="introduccion" class="form-control textareasumer" style="width: 100%; height: 258px;"><?php if (!empty($introduccion[0]['int_introduccion'])) echo $introduccion[0]['int_introduccion'] ?></textarea>
                    </div>
                    <div align="center" style="margin-top:15px;">
                        <button type="button" id="guardarintroduccion" class="btn btn-success">Guardar</button>
                    </div>
                </div>

                <div class="tab-pane" id="portlet_tab2">
                    <form method="post" id="objetivos">
                        <div  class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="objetivosgen">
                            <div class="alert alert-info"><center><b>OBJETIVOS GENERALES</b></center></div>

                            <?php if (empty($general)) { ?>
                                <div class="principal">
                                    <div class="col-lg-10 col-sm-10 col-xs-10 col-md-10">
                                        <textarea class="form-control" name="objetivos[]" ></textarea>
                                        <!--<input type="text" placeholder="Objetivos Generales">-->
                                    </div>
                                    <div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                                        <button type="button" class="btn btn-info agregarobjetivo" >Agregar</button>
                                    </div>
                                    <div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                                        <button dato="general" type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button>
                                    </div>
                                </div>
                                <?php
                            } else {
                                foreach ($general as $gen) {
                                    ?>
                                    <div class="principal">
                                        <div class="col-lg-10 col-sm-10 col-xs-10 col-md-10">
                                            <textarea class="form-control" name="objetivos[]"><?php echo utf8_encode($gen['objGen_objetivo']) ?></textarea>
                                            <!--<input type="text" value="<?php echo $gen['objGen_objetivo'] ?>" class="form-control" name="objetivos[]" placeholder="Objetivos Generales">-->
                                        </div>
                                        <div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                                            <button objid="<?php echo $gen['objGen_id'] ?>" type="button" class="btn btn-info agregarobjetivo" >Agregar</button>
                                        </div>
                                        <div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                                            <button dato="general" doc="<?php echo $gen['objGen_id'] ?>" type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div style="margin-top:15px;" class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-top:15px">
                            <div class="alert alert-info"><center><p><b>OBJETIVOS ESPECIFICOS</b></p></center></div>
                            <div class="row agregar">
                                <!--<div class="principal">-->
                                <?php if (empty($especificos)) { ?>
                                    <div class="principaldos">
                                        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
                                            <textarea  class="form-control" name="objetivosespecificos[]"></textarea>
                                            <!--<input  type="text" class="form-control" name="objetivosespecificos[]" placeholder="Objetivos Especificos">-->
                                        </div>
                                        <div align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                                            <select class='form-control' name="tipoobjetivo[]">
                                                <option value=''>-Seleccionar-</option>
                                                <?php foreach ($tipoobjetivo as $tipo => $tipobj) { ?>
                                                    <option value='<?php echo $tipobj['tipObj_id']; ?>'><?php echo $tipobj['tipObj_nombre']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarespecifico">Agregar</button></div>
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button  dato="especifico"  type="button" class="btn btn-danger eliminarpecifico">Eliminar</button></div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <!--<div class="row">-->
                                    <?php
                                    foreach ($especificos as $esp) {
                                        ?>
                                        <div class="principal">
                                            <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
                                                <textarea class="form-control" name="objetivosespecificos[]" ><?php echo utf8_encode($esp['objEsp_objetivo']) ?></textarea>
                                                <!--<input value="<?php echo $esp['objEsp_objetivo'] ?>" type="text" class="form-control" name="objetivosespecificos[]" placeholder="Objetivos Especificos">-->
                                            </div>
                                            <div align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                                                <select class='form-control' name="tipoobjetivo[]">
                                                    <option value=''>-Seleccionar-</option>
                                                    <?php
                                                    $dato = "";
                                                    foreach ($tipoobjetivo as $tipo => $tipobj) {

                                                        if ($esp['tipObj_id'] == $tipobj['tipObj_id']) {
                                                            $select = 'selected';
                                                        } else {
                                                            $select = '';
                                                        }

                                                        echo "<option " . $select . " value='" . $tipobj['tipObj_id'] . "'>" . $tipobj['tipObj_nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                                                <button type="button" class="btn btn-info agregarespecifico">Agregar</button>
                                            </div>
                                            <div esp="" align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                                                <button doc="<?php echo $esp['objEsp_id'] ?>" dato="especifico"  type="button" class="btn btn-danger eliminarpecifico">Eliminar</button>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <!--</div>-->
                                    <?php
                                }
                                ?>
                                <!--</div>-->

                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                                <button type="button" id="guardarobjetivos" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="portlet_tab3">
                    <div class="alert alert-info"><center><p><b>COMPROMISO DE LA ALTA DIRECCIÓN </b></p></center></div>
                    <p class="bg-info" style="color:black">Los miembros de la alta dirección que aparecen a continuación:</p>
                    <form method="post" id="miembros">
                        <div class="row miembros">

                            <?php if (empty($miembros)) { ?>
                                <div clas="principal">
                                    <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                        <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                        <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                    </div>
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><label>&nbsp;</label><button type="button" class="btn btn-info agregarmiembro">Agregar</button></div>
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><label>&nbsp;</label><button  dato="compromiso"  type="button" class="btn btn-danger eliminarpecifico">Eliminar</button></div>
                                    <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"></div>
                                </div>
                                <?php
                            } else {

                                foreach ($miembros as $miembro) {
                                    ?>
                                    <div clas="principal">
                                        <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Nombre</label><input type="text" value="<?php echo $miembro['mie_nombre'] ?>" class="form-control" name="nombre[]" placeholder="Nombre">
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Cargo</label><input type="text" value="<?php echo $miembro['mie_cargo'] ?>" class="form-control" name="cargo[]" placeholder="Cargo">
                                        </div>
                                        <div  miemid="<?php echo $miembro['mie_id'] ?>" align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarmiembro">Agregar</button></div>
                                        <div  miemid="" align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button doc="<?php echo $miembro['mie_id'] ?>" dato="compromiso" type="button" class="btn btn-danger eliminarpecifico">Eliminar</button></div>
                                        <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"></div>  
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8>
                            <textarea id="miembrotexto" class="form-control textareasumer" style="width: 100%; height: 258px;"><?php echo $textomiembro[0]['comTex_texto']; ?></textarea>
                        </div>
                        <input type="hidden" name="textomiembro" id="textomiembro">
                    </form>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarmiembros" class="btn btn-success">Guardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab4">
                    <div class="alert alert-info"><center><p><b>RESPONSABLE(S) DEL PESV</b></p></center></div>
                    <p class="bg-info" style="color:black">Como responsable(s) del PESV se a delegado por la Alta gerencia a:</p>

                    <form method="post" id="responsables">
                        <div class="row datosresponsable">
                            <div class="row responsable">
                                <?php if (empty($responsables)) { ?>
                                    <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                        <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                        <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                    </div>
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarresponsable">Agregar</button></div>
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button dato="responsable" type="button" class="btn btn-danger eliminarresponsable">Eliminar</button></div>
                                    <?php
                                } else {
                                    foreach ($responsables as $responsable) {
                                        ?>
                                        <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Nombre</label><input type="text" value="<?php echo $responsable['res_cargo']; ?>" class="form-control" name="nombre[]" placeholder="Nombre">
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Cargo</label><input type="text" value="<?php echo $responsable['res_nombre']; ?>" class="form-control" name="cargo[]" placeholder="Cargo">
                                        </div>
                                        <div res="<?php echo $responsable['res_id']; ?>" align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarresponsable">Agregar</button></div>
                                        <div res="<?php echo $responsable['res_id']; ?>" align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button doc="<?php echo $responsable['res_id']; ?>" type="button"  dato="responsable" class="btn btn-danger eliminarobjetivo">Eliminar</button></div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                    <br>
                    <br>
                    <p class="bg-info" style="color:black">Quién se encargará de diseñar, desarrollar , implementar y hacer seguimiento del PESV. Y de cada una de las acciones que deriven de éste.</p>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarresponsables" class="btn btn-success">Guardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab5">
                    <div class="alert alert-info"><center><p><b>COMITÉ DE SEGURIDAD VIAL</b></p></center></div>
                    <p class="bg-info" style="color:black">El CSV (comité de seguridad vial) designado por la alta gerencia, está conformado por:</p>
                    <form method="post" id="comite">
                        <div class="comite">
                            <div class="row">
                                <?php if (empty($comites)) { ?>
                                    <div class="principal">
                                        <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                        </div>
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarcomite">Agregar</button></div>
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button dato="comite" type="button" class="btn btn-danger eliminarcomite">Eliminar</button></div>
                                    </div>
                                    <?php
                                } else {
                                    foreach ($comites as $comite) {
                                        ?>
                                        <div class="principal">
                                            <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                                <label>Nombre</label><input value="<?php echo $comite['com_nombre']; ?>" type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                                <label>Cargo</label><input value="<?php echo $comite['com_cargo']; ?>" type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                            </div>
                                            <div com="<?php echo $comite['com_id']; ?>" align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarcomite">Agregar</button></div>
                                            <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button  dato="comite" doc="<?php echo $comite['com_id']; ?>" type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button></div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                            <br>
                            <div style="margin-top: 3px" col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8>
                                <textarea id="textocomite" class="form-control textareasumer" style="width: 100%; height: 258px;"><?php echo $consultatextocomite[0]['texCom_texto'] ?></textarea>
                            </div>
                            <input type="hidden" name="textocom" id="textocom">
                            </form>    
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                                <button type="button" id="guardarcomite" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                </div>
                <div class="tab-pane" id="portlet_tab6">
                    <div class="alert alert-info"><center><p><b>POLÍTICA  DE  SEGURIDAD  VIAL </b> </p></center></div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                            <textarea id="politica" class="form-control textareasumer" style="width: 1139px; height: 258px;"><?php if (!empty($politicas[0]['pol_politica'])) echo $politicas[0]['pol_politica']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarpolitica" class="btn btn-success">Guardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab7">
                    <div class="alert alert-info"><center><p><b>COMUNICACIÓN </b></p></center></div>
                    <div class="row">
                        <div align="justify" class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8" style="color:black">
                            <p>El  lider  de  la  organización  garantizará  que  las  acciones  de  este  PESV  sea  informadas  a  todos  los  involucrados  a  través  de  carteleras,  boletines  y  comunicados.</p>  

                            <p>Nota:  La  opción  de  comunicación,  debe  poder  ser  fexible  para  cada  organización.  (Boletines,  correo  electrponico,  página  web,  etc,  etc) </p> 

                            <p>La  politica  de  seguridad  vial  se  mantendrá  en  un  lugar  visible  y  disponible  para  ser  consultada  por  los  miembros  de  la  organización.  El  Plan  Estratégico  de  Seguridad  Vial,  debe  ser  comunicado  a  todos  los  empleados. </p> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab10">
                    <div class="alert alert-info"><center><p><b>ESTADISTICAS</b></p></center></div>
                    <div class="row" >
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                            <div id="container"></div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" >
                            <div id="categoria"></div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" >
                            <div id="tipotransporte"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab8">
                     <div class="alert alert-info"><center><p><b>DIAGNÓSTICO</b></p></center></div>
                    <div col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8>
                        <textarea id="diagnostico" class="form-control textareasumer" style="width: 100%; height: 258px;"><?php if (!empty($diagnostico[0]['texDia_texto'])) echo $diagnostico[0]['texDia_texto'] ?></textarea>
                    </div>
                    <div class="row" align="center">
                        <button type="button" class="btn btn-success" id="guardardiagnostico">Guardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab9">
                    <div class="alert alert-info"><center><p><b>IDENTIFICACIÓN  DE  PRIORIDADES    DE  RIESGOS  VIALES  EN  LA  ORGANIZACIÓN  </b></p></center></div>
                    <center><p class="bg-danger" style="color:black">Ejes  son:  Factor  humano,  infraestructura  segura, vehpiculos  seguros  y  atención  a  víctimas.   </p></center>
                    <form method="post" id="prioridades">
                        <div class="row principalpriorida">


                            <?php if (empty($prioridades)) { ?>
                                <div class="principal">
                                    <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                        <label>No Prioridad</label><input type="text" class="form-control" name="prioridad[]" placeholder="Prioridad">
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                        <label>Nombre del Riesgo</label><input type="text" class="form-control" name="riesgo[]" placeholder="Riesgo">
                                    </div>
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarprioridad">Agregar</button></div>
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button dato="prioridad" type="button" class="btn btn-danger eliminarprioridad">Eliminar</button></div>
                                    <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">

                                    </div> 
                                </div> 
                                <?php
                            } else {
                                foreach ($prioridades as $prioridad) {
                                    ?>
                                    <div class="principal">
                                        <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>No Prioridad</label><input value="<?php echo $prioridad['pri_prioridad']; ?>" type="text" class="form-control" name="prioridad[]" placeholder="Prioridad">
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                            <label>Nombre del Riesgo</label><input value="<?php echo $prioridad['pri_riesgo']; ?>" type="text" class="form-control" name="riesgo[]" placeholder="Riesgo">
                                        </div>
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button pri="<?php echo $prioridad['pri_riesgo']; ?>" type="button" class="btn btn-info agregarprioridad">Agregar</button></div>
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button  dato="prioridad" doc="<?php echo $prioridad['pri_id']; ?>" type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button></div>
                                        <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"></div> 
                                    </div>
                                    <?php
                                }
                            }
                            ?>


                        </div>
                    </form>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarprioridades" class="btn btn-success">Guardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab11">
                    <div class="alert alert-info"><center><p>CRONOGRAMA</p></center></div>

                    <div class="row datosresponsable">
                        <div class="row responsable">
                        </div>
                    </div>
                    </
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//    if(!empty($tipoobjetivo)){
$dato = "";
foreach ($tipoobjetivo as $tipo => $tipobj) {
    $dato .= "<option value='" . $tipobj['tipObj_id'] . "'>" . $tipobj['tipObj_nombre'] . "</option>";
}
?>


<script>

$('#guardardiagnostico').click(function(){
    
//    alert('paso por aca');
    
    var diagnostico = $('#diagnostico').code();
    var url = "<?php echo base_url('index.php/administracion/guardardiagnostico') ?>";
    
    $.post(url,{diagnostico:diagnostico}).done(function(msg){
        alerta('verde',"DATOS GUARDADOS CORRECTAMENTE")
    }).fail(function(msg){
        alerta('rojo','ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
    });
});

//------------------------------------------------------------------------------
//Grafica
//------------------------------------------------------------------------------
    $(function() {

        $('#tipotransporte').highcharts({
            chart: {
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'Tipo de transporte que usa para realizar el despazamiento '
            },
//            subtitle: {
//                text: 'peaton,pasajero,conductor,sininfo'
//            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: [
                    'Mono patin',
                    'Patines',
                    'Bicicleta',
                    'Moto',
                    'Transporte automotor  particular',
                    'Transporte automotor publico'
                ]
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [{
                    name: 'Tipo',
                    data: [<?php echo $tipotransporte[0]->sininfo ?>,
<?php echo $tipotransporte[0]->monopatin ?>,
<?php echo $tipotransporte[0]->Patines ?>,
<?php echo $tipotransporte[0]->Bicicleta ?>,
<?php echo $tipotransporte[0]->Moto ?>,
<?php echo $tipotransporte[0]->Transporteautomotorparticular ?>,
<?php echo $tipotransporte[0]->Transporteautomotorpublico ?>
                    ],
                    stack: 'male'
                }
            ]
        });

        $('#categoria').highcharts({
            chart: {
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'Rol en la via en in-itiniere'
            },
            subtitle: {
                text: 'peaton,pasajero,conductor,sininfo'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: [
                    'Conductor',
                    'Pasajero',
                    'Peaton',
                    'No Contestados',
                ]
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [{
                    name: 'itiniere',
                    data: [<?php echo $itiniere[0]->conductor ?>,
<?php echo $itiniere[0]->pasajero ?>,
<?php echo $itiniere[0]->peaton ?>,
<?php echo $itiniere[0]->sininfo ?>
                    ],
                    stack: 'male'
                }
            ]
        });
        $('#container').highcharts({
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    viewDistance: 25,
                    depth: 40
                },
                marginTop: 80,
                marginRight: 40
            },
            title: {
                text: 'REPORTE GENERAL DE USUARIOS'
            },
            xAxis: {
                categories: [
                    'Tienen Arl',
                    'Cotiza Sistema Pension',
                    'Tienen Eps',
                    'Caja Compensacion'
                ]
            },
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'EMPLEADOS'
                }
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    depth: 40
                }
            },
            series: [{
                    name: 'Si',
                    data: [<?php echo $estadistica[0]->arlsi ?>,
<?php echo $estadistica[0]->pensionsi ?>,
<?php echo $estadistica[0]->epssi ?>,
<?php echo $estadistica[0]->cajacompensacionsi ?>
                    ],
                    stack: 'male'
                }, {
                    name: 'No',
                    data: [<?php echo $estadistica[0]->arlno ?>,
<?php echo $estadistica[0]->pensionno ?>,
<?php echo $estadistica[0]->epsno ?>,
<?php echo $estadistica[0]->cajacompensacionno ?>
                    ],
                    stack: 'male'
                }, {
                    name: 'NO CONTESTADAS',
                    data: [<?php echo $estadistica[0]->arlnula ?>,
<?php echo $estadistica[0]->pensionnula ?>,
<?php echo $estadistica[0]->epsnula ?>,
<?php echo $estadistica[0]->cajacompensacionnula ?>
                    ],
                    stack: 'male'
                }
            ]
        });
    });

//------------------------------------------------------------------------------

    $('#guardarpolitica').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardapolitica     '); ?>";
        var politica = $('#politica').code();
        modal();
//        console.log(politica);
        $.post(url, {politica: politica})
                .done(function(msn) {
            quit_modal();
            alerta('verde', 'POLITICA GUARDADA CORRECTAMENTE');
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });

    $('body').delegate('.agregarprioridad', 'click', function() {

        var contenido = '  <div class="principal">\n\
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>No Prioridad</label><input type="text" class="form-control" name="prioridad[]" placeholder="Prioridad">\n\
                                </div>\n\
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Nombre del Riesgo</label><input type="text" class="form-control" name="riesgo[]" placeholder="Riesgo">\n\
                                </div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarprioridad">Agregar</button></div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarprioridad">Eliminar</button></div>\n\
                            </div>';

        $('.principalpriorida').append(contenido);

    });
    $('body').delegate('.agregarcomite', 'click', function() {

        var contenido = ' <div class="row principal">\n\
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">\n\
                                </div>\n\
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">\n\
                                </div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarcomite">Agregar</button></div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarcomite">Eliminar</button></div>\n\
                            </div>';

        $('.comite').append(contenido);

    });
    $('body').delegate('.eliminarcomite', 'click', function() {

        $(this).parents('.principalcomite').remove();
    });
    $('body').delegate('.agregarresponsable', 'click', function() {

        var contenido = ' <div class="row principal">\n\
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">\n\
                                </div>\n\
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">\n\
                                </div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarresponsable">Agregar</button></div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarresponsable">Eliminar</button></div>\n\
                            </div>';

        $('.datosresponsable').append(contenido);

    });
    $('body').delegate('.eliminarresponsable', 'click', function() {

        $(this).parents('.responsable').remove();
    });
    $('body').delegate('.agregarobjetivo', 'click', function() {

        var contenido = ' <div class="principal">\n\
                            <div class="col-lg-10 col-sm-10 col-xs-10 col-md-10">\n\
                            <textarea  class="form-control" name="objetivos[]"></textarea></div>\n\
                                <div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">\n\
                                <button type="button" class="btn btn-info agregarobjetivo" >Agregar</button>\n\
                            </div><div align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1">\n\
                                    <button type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button>\n\
                            </div></div>';

        $('#objetivosgen').append(contenido);

    });
    $('body').delegate('.eliminarobjetivo', 'click', function() {

        var id = $(this).attr('doc');
        var dato = $(this).attr('dato');
        var url = "<?php echo base_url('index.php/administracion/eliminar'); ?>";

        $(this).parents('.infoprioridades').remove();

        $.post(url, {id: id, dato: dato}).done(function(msg) {

        }).fail(function(msg) {

        });

        $(this).parents('.principal').remove();
    });
    $('body').delegate('.eliminarpecifico', 'click', function() {

        var id = $(this).attr('doc');
        var dato = $(this).attr('dato');
        var url = "<?php echo base_url('index.php/administracion/eliminar'); ?>";

        $.post(url, {id: id, dato: dato}).done(function(msg) {

        }).fail(function(msg) {

        });

        $(this).parents('.principal').remove();
    });
//
//
    $('body').delegate('.agregarmiembro', 'click', function() {

        var contenido = '<div clas="principal">\n\
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">\n\
                                </div>\n\
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">\n\
                                </div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarmiembro">Agregar</button></div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarpecifico">Eliminar</button></div>\n\
                            </div>';
        $('.miembros').append(contenido);
    });
//
    $('body').delegate('.agregarespecifico', 'click', function() {
        var dato = "<?php echo $dato; ?>";
//        alert(dato);
        var objetivo = "";

        console.log(objetivo);

        var contenido = ' <div class="principal">\n\
                                    <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">\n\
        <textarea class="form-control" name="objetivosespecificos[]"></textarea>\n\
        </div>\n\
                                    <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2"><select class="form-control" name="tipoobjetivo[]"><option value="">-Seleccionar-</option>' + dato + '</select></div>\n\
                                        <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarespecifico">Agregar</button></div>\n\
                                    <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarespecifico">Eliminar</button></div>\n\
                                </div>';
        $('.agregar').append(contenido);
        $('.tab-pane').append('height', '850px');
    });

    $('body').delegate('.eliminarespecifico', 'click', function() {

        $(this).parents('.principaldos').remove();
    });
//
//
    $('#guardarintroduccion').click(function() {
        var introduccion = $('#introduccion').code();
        var url = "<?php echo base_url('index.php/administracion/guardarintroduccion'); ?>";
        modal();
        $.post(url, {introduccion: introduccion})
                .done(function(msn) {
            alerta('verde', 'INTRODUCCION GUARDADA CORRECTAMENTE');
            quit_modal();
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });

    $('#guardarmiembros').click(function() {
//        var introduccion = $('#introduccion').code();

        var introduccion = $('#miembrotexto').code();
//        console.log(introduccion);
        $('#textomiembro').val(introduccion);

        var url = "<?php echo base_url('index.php/administracion/guardarmiembros'); ?>";
        modal();
        $.post(url, $('#miembros').serialize())
                .done(function(msn) {
            quit_modal();
            alerta('verde', 'INTRODUCCION GUARDADA CORRECTAMENTE');
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });
    $('#guardarobjetivos').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarobjetivos'); ?>";
        modal();
        $.post(url, $('#objetivos').serialize())
                .done(function(msn) {
            quit_modal();
            alerta('verde', 'OBJETIVOS GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });
//
    $('#guardarresponsables').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarresponsables'); ?>";
        modal();
        $.post(url, $('#responsables').serialize())
                .done(function(msn) {
            quit_modal();
            alerta('verde', 'RESPONSABLES GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });

    });
    $('#guardarcomite').click(function() {
        var introduccion = $('#textocomite').code();
//        console.log(introduccion);
        $('#textocom').val(introduccion);
        var url = "<?php echo base_url('index.php/administracion/guardarcomite'); ?>";
        modal();
        $.post(url, $('#comite').serialize())
                .done(function(msn) {
            quit_modal();
            alerta('verde', 'COMITE GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });

    });
    $('#guardarprioridades').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarprioridades'); ?>";
        modal();
        $.post(url, $('#prioridades').serialize())
                .done(function(msn) {
            quit_modal();
            alerta('verde', 'PRIORIDADES GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            quit_modal();
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });

    });

</script>    
