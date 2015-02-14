
<div class="row">
    <!--<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12">-->
    <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4"></div>
    <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4">
        <div class="alert alert-info"><center><b>CAMBIAR CONTRASEÑA</b></center></div>
    </div>
    <!--</div>-->   
</div>
<div class="row">
    <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4"></div>
    <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4">
        <div class="row">
            <label>Contraseña</label><input type="password" id="password" class="form-control obligatorio" />
        </div>
        <div class="row">
            <label>Repetir Contraseña</label><input type="password" id="rpassword" class="form-control obligatorio" />
        </div>
        <div class="row alerta">

        </div>
        <div class="row" align="right">
            <button type="text" id="guardar" class="btn btn-success guardar">Guardar</button>
        </div>    
    </div> 
</div>
</div>
<script>
    $('body').delegate('.guardar', 'click', function() {

        var respuesta = obligatorio($('.obligatorio'));

        if (respuesta == true && $('#password').val() == $('#rpassword').val()) {

            $('.error').remove();

            var url = "<?php echo base_url('index.php/presentacion/guardarcontrasena') ?>";
            $.post(url, {password: $('#password').val()}, function() {

            });
        }
        if ($('#password').val() != $('#rpassword').val()) {
            $.notific8('No coinciden las contraseñas', {
                horizontalEdge: 'bottom',
                life: 5000,
                theme: 'amethyst',
                heading: 'CONTRASEÑAS'
            });
        }

    });
</script>    