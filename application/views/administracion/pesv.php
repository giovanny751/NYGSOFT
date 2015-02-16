<style>
    label{
        color:black;
    }
</style>

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
                <li><a href="#portlet_tab3" data-toggle="tab">COMPROMISO </a></li>
                <li><a href="#portlet_tab4" data-toggle="tab">RESPONSABLES </a></li>
                <li><a href="#portlet_tab5" data-toggle="tab">COMITE </a></li>
                <li><a href="#portlet_tab6" data-toggle="tab">POLÍTICA </a></li>
                <li><a href="#portlet_tab7" data-toggle="tab">COMUNICACIÓN </a></li>
                <li><a href="#portlet_tab8" data-toggle="tab">DIAGNÓSTICO</a></li>
                <li><a href="#portlet_tab9" data-toggle="tab">PRIORIDADES</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="portlet_tab1">
                    <div class="alert alert-info"><center><p>INTRODUCCIÓN</p></center></div>
                    <div>
                        <textarea id="introduccion" class="form-control" style="width: 1139px; height: 258px;"></textarea>
                    </div>
                    <div align="center" style="margin-top:15px;">
                        <button type="button" id="guardarintroduccion" class="btn btn-success">Gardar</button>
                    </div>
                </div>

                <div class="tab-pane" id="portlet_tab2">
                    <form method="post" id="objetivos">
                        <div  class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-xs-8 col-sm-8" id="objetivosgen">
                            <div class="alert alert-info"><center>OBJETIVOS GENERALES</center></div>
                            <div class="principal">
                                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
                                    <input type="text" class="form-control" name="objetivos[]" placeholder="Objetivos Generales">
                                </div>
                                <div align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                                    <button type="button" class="btn btn-info agregarobjetivo" >Agregar</button>
                                </div>
                                <div align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                                    <button type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2"></div>
                        <div style="margin-top:15px;" class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-xs-8 col-sm-8" style="margin-top:15px">
                            <div class="alert alert-info"><center><p>OBJETIVOS ESPECIFICOS</p></center></div>
                            <div class="row agregar">
                                <div class="principaldos">
                                    <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8"><input type="text" class="form-control" name="objetivosespecificos" placeholder="Objetivos Especificos"></div>
                                    <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"><button type="button" class="btn btn-info agregarespecifico">Agregar</button></div>
                                    <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"><button type="button" class="btn btn-danger eliminarpecifico">Eliminar</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2"></div>
                    </form>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarobjetivos" class="btn btn-success">Gardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab3">
                    <div class="alert alert-info"><center><p>Los  miembros  de  la  alta  dirección  que  aparecen  a  continuación:  </p></center></div>
                    <form method="post" id="miembros">
                        <div class="row miembros">
                            <div clas="principalmiembros">
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                </div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarmiembro">Agregar</button></div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarmiembro">Eliminar</button></div>
                            </div>
                        </div>
                    </form>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarmiembros" class="btn btn-success">Gardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab4">
                    <div class="alert alert-info"><center><p>Como  responsable  del  PESV  se  a  delegado  por  la  Alta  gerencia  a: </p></center></div>
                    <form method="post" id="responsables">
                        <div class="row datosresponsable">
                            <div class="row responsable">
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                </div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarresponsable">Agregar</button></div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarresponsable">Eliminar</button></div>
                            </div>
                        </div>
                    </form>    
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarresponsables" class="btn btn-success">Gardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab5">
                    <div class="alert alert-info"><center><p>El  CSV  (comité  de  seguridad  vial)  designado  por  la  alta  gerencia,  está  conformado  por:  </p></center></div>
                    <form method="post" id="comite">
                        <div class="comite">
                            <div class="row principalcomite">
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">
                                </div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarcomite">Agregar</button></div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarcomite">Eliminar</button></div>
                            </div>
                        </div>
                    </form>    
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarcomite" class="btn btn-success">Gardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab6">
                    <div class="alert alert-info"><center><p>POLÍTICA  DE  SEGURIDAD  VIAL  </p></center></div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                            <textarea class="form-control politica" style="width: 1139px; height: 258px;"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarpolitica" class="btn btn-success">Gardar</button>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab7">
                    <div class="alert alert-info"><center><p>POLÍTICA  DE  SEGURIDAD  VIAL  </p></center></div>
                    <div class="row">
                        <div align="justify" class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8" style="color:black">
                            <p>El  lider  de  la  organización  garantizará  que  las  acciones  de  este  PESV  sea  informadas  a  todos  los  involucrados  a  través  de  carteleras,  boletines  y  comunicados.</p>  

                            <p>Nota:  La  opción  de  comunicación,  debe  poder  ser  fexible  para  cada  organización.  (Boletines,  correo  electrponico,  página  web,  etc,  etc) </p> 

                            <p>La  politica  de  seguridad  vial  se  mantendrá  en  un  lugar  visible  y  disponible  para  ser  consultada  por  los  miembros  de  la  organización.  El  Plan  Estratégico  de  Seguridad  Vial,  debe  ser  comunicado  a  todos  los  empleados. </p> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab8">
                    <div class="alert alert-info"><center><p>DIAGNÓSTICO</p></center></div>
                    <div class="row">
                        <div align="justify" class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-8 col-sm-8 col-xs-8 col-md-8" style="color:black">
                            <p>Los  formularios  del  diagnostico  realizado  para  la  empresa  se  pueden  ver  en  el  anexo  1  de  este  documento.  Los  resultados  obtenidos  se  pueden  ver  en  el  anexo  2.  De  dichos  resultados  se  identificaron  y  priorizaron  los  siguientes  riesgos: </p>  

                            <p>Nota:  Los  anexos  a  los  que  se  refiere  esta  parte  son:  Anexo  1  (fromularios  en  PDF)  y  Anexo  2  (los  reportes  que  debe  arrojar  el  aplicativo). </p>  
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="portlet_tab9">
                    <div class="alert alert-info"><center><p>IDENTIFICACIÓN  DE  PRIORIDADES    DE  RIESGOS  VIALES  EN  LA  ORGANIZACIÓN  </p></center></div>
                    <center><p class="alert alert-danger">Ejes  son:  Factor  humano,  infraestructura  segura, vehpiculos  seguros  y  atención  a  víctimas.   </p></center>
                    <form method="post" id="prioridades">
                        <div class="row principalpriorida">

                            <div class="infoprioridades">
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>No Prioridad</label><input type="text" class="form-control" name="prioridad[]" placeholder="Prioridad">
                                </div>
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">
                                    <label>Nombre del Riesgo</label><input type="text" class="form-control" name="riesgo" placeholder="Riesgo">
                                </div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarprioridad">Agregar</button></div>
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarprioridad">Eliminar</button></div>
                            </div>

                        </div>
                    </form>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" align="center" style="margin-top:15px;">
                        <button type="button" id="guardarprioridades" class="btn btn-success">Gardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


    $('#guardarpolitica').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardapolitica'); ?>";
        var politica = $('.politica').val();

        console.log(politica);
        $.post(url, {politica: politica})
                .done(function(msn) {
            alerta('verde', 'POLITICA GUARDADA CORRECTAMENTE');
        }).fail(function(msg) {
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });

    $('body').delegate('.agregarprioridad', 'click', function() {

        var contenido = '  <div class="infoprioridades">\n\
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
    $('body').delegate('.eliminarprioridad', 'click', function() {

        $(this).parents('.infoprioridades').remove();
    });
    $('body').delegate('.agregarcomite', 'click', function() {

        var contenido = ' <div class="row principalcomite">\n\
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

        var contenido = ' <div class="row responsable">\n\
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
                            <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">\n\
                            <input type="text" class="form-control" name="objetivos[]" placeholder="Objetivos Generales"></div>\n\
                                <div align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">\n\
                                <button type="button" class="btn btn-info agregarobjetivo" >Agregar</button>\n\
                            </div><div align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2">\n\
                                    <button type="button" class="btn btn-danger eliminarobjetivo">Eliminar</button>\n\
                            </div></div>';

        $('#objetivosgen').append(contenido);

    });
    $('body').delegate('.eliminarobjetivo', 'click', function() {

        $(this).parents('.principal').remove();
    });
//
//
    $('body').delegate('.agregarmiembro', 'click', function() {

        var contenido = '<div clas="principalmiembros">\n\
                                <div class="col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Nombre</label><input type="text" class="form-control" name="nombre[]" placeholder="Nombre">\n\
                                </div>\n\
                                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3">\n\
                                    <label>Cargo</label><input type="text" class="form-control" name="cargo[]" placeholder="Cargo">\n\
                                </div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-info agregarmiembro">Agregar</button></div>\n\
                                <div  align="center" class="col-lg-1 col-sm-1 col-xs-1 col-md-1"><button type="button" class="btn btn-danger eliminarmiembro">Eliminar</button></div>\n\
                            </div>';
        $('.miembros').append(contenido);
    });

    $('body').delegate('.eliminarmiembro', 'click', function() {

        $(this).parent().parent().remove();
    });
//
    $('body').delegate('.agregarespecifico', 'click', function() {

        var contenido = ' <div class="principaldos">\n\
                                    <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8"><input type="text" class="form-control" name="objetivosespecificos[]" placeholder="Objetivos Especificos"></div>\n\
                                    <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"><button type="button" class="btn btn-info agregarespecifico">Agregar</button></div>\n\
                                    <div  align="center" class="col-lg-2 col-sm-2 col-xs-2 col-md-2"><button type="button" class="btn btn-danger eliminarespecifico">Eliminar</button></div>\n\
                                </div>';
        $('.agregar').append(contenido);
    });

    $('body').delegate('.eliminarespecifico', 'click', function() {

        $(this).parents('.principaldos').remove();
    });
//
//
    $('#guardarintroduccion').click(function() {
        var introduccion = $('#introduccion').val();
        var url = "<?php echo base_url('index.php/administracion/guardarintroduccion'); ?>";
        $.post(url, {introduccion: introduccion})
                .done(function(msn) {
            alerta('verde', 'INTRODUCCION GUARDADA CORRECTAMENTE');
        }).fail(function(msg) {
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });
    $('#guardarobjetivos').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarobjetivos'); ?>";
        $.post(url, $('#objetivos').serialize())
                .done(function(msn) {
            alerta('verde', 'INTRODUCCION GUARDADA CORRECTAMENTE');
        }).fail(function(msg) {
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });
    });
//
    $('#guardarresponsables').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarresponsables'); ?>";
        $.post(url, $('#responsables').serialize())
                .done(function(msn) {
            alerta('verde', 'RESPONSABLES GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });

    });
    $('#guardarcomite').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarcomite'); ?>";
        $.post(url, $('#comite').serialize())
                .done(function(msn) {
            alerta('verde', 'RESPONSABLES GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });

    });
    $('#guardarprioridades').click(function() {

        var url = "<?php echo base_url('index.php/administracion/guardarprioridades'); ?>";
        $.post(url, $('#prioridades').serialize())
                .done(function(msn) {
            alerta('verde', 'RESPONSABLES GUARDADOS CORRECTAMENTE');
        }).fail(function(msg) {
            alerta('rojo', 'ERROR POR FAVOR COMUNICARCE CON EL ADMINISTRADOR');
        });

    });

</script>    
