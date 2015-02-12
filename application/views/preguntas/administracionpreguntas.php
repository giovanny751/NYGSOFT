<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> TIPO DE PREGUNTA </h5>
</div>
<div class="well">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <input type="text" class="form-control" placeholder="TIPO DE PREGUNTA" name="tipopregunta" id="tipopregunta">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardartipo">Guardar Tipo</button>
    </div>
    </div>
</div>
<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> AGREGAR OPCIONES DE PREGUNTA </h5>
</div>
<div class="well">
    <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-7 col-xs-6">
        <label>Tipo de Pregunta</label>
        <select class="form-control" id="tipopreguntados">
            <?php foreach($tipo as $tipopregunta){?>
            <option value="<?php echo $tipopregunta['tipPre_id'] ?>"><?php echo $tipopregunta['tipPre_tipo'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label>Opcion Pregunta</label>
        <input type="text" class="form-control" id="opcion" placeholder="OPCIÓN">
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" class="btn btn-success" id="guardaropcion">Guardar Opcion</button>
    </div>
    </div>
</div>
<script>
    $('#guardartipo').click(function() {

        var tipo = $('#tipopregunta').val();
        if (tipo != '') {
            var url = '<?php echo base_url("index.php/preguntas/guardartipopregunta"); ?>';
            $.post(url, {tipo: tipo}, function(data) {
                $('#tipopreguntados *').remove();
                var option = "";
                $.each(data,function(key,val){
                    option += "<option value='"+val.tipPre_tipo+"'>"+val.tipPre_tipo+"</option>";
                });                
                $('#tipopreguntados').append(option);
                $.notific8('guardado correctamente', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Tipo de pregunta'
                });
            });
        }

    });
    $('#guardaropcion').click(function() {
        var tipo = $('#tipopreguntados').val();
        var opcion = $('#opcion').val();
        if (tipo != '') {
            var url = '<?php echo base_url("index.php/preguntas/guardaropcionpregunta"); ?>';
            $.post(url, {tipo: tipo, opcion: opcion}, function() {
                $.notific8('guardado correctamente', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Opcion de pregunta'
                });
            });
        }
    });
</script>    
