<div id="otro_formulario">
    <div class="col-md-12 col-sm-12" >
        <div class="col-md-3 col-sm-3">
            Formulario Numero
        </div>
        <div class="col-md-3 col-sm-3">
            <?php echo count($post['url2']) + 1 ?>
        </div>
        <div class="col-md-3 col-sm-3">
            Fomulario Nombre
        </div>
        <div class="col-md-3 col-sm-3">
            <?php echo form_input('formulario', '', '') ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="col-md-3 col-sm-3">
            Nombre campo
        </div>
        <div class="col-md-3 col-sm-3">
            <?php echo form_input('formulario', '', '') ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12" >
        <div class="col-md-3 col-sm-3">
            Campo Valor
        </div>
        <div class="col-md-3 col-sm-3">
            <?php echo form_input('formulario', '', '') ?>
        </div>
        <div class="col-md-3 col-sm-3">
            Campo Texto
        </div>
        <div class="col-md-3 col-sm-3">
            <?php echo form_input('formulario', '', '') ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12" >
        <center><?php echo form_button('Guardar', "Guardar", 'id="agregar" class="btn btn-success"') ?><center>
    </div>
</div>