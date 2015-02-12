<div class="widgetTitle">
    <h5><i class="glyphicon glyphicon-ok"></i> INGRESAR EMPRESA</h5>
</div>
<div class='well'>
    <div class="row">
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
            <label>Nit</label>
            <input type="text" class="form-control obligatorio" id="nit" name="nit" placeholder="NIT">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
            <label>Empresa</label>
            <input type="text" class="form-control obligatorio" id="empresa" name="empresa" placeholder="EMPRESA">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
            <label>Correo</label>
            <input type="text" name="correo" id="correo" class="form-control obligatorio" placeholder="CORREO">
        </div>
        <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 " align="right">
            <br><button type="button" class="btn btn-success" id="guardar">Enviar Correo</button>
        </div>
    </div>
</div>
<script>
    $('#guardar').click(function() {

        var empresa = $('#empresa').val();
        var correo = $('#correo').val();
        var nit = $('#nit').val();

        var datos = obligatorio($('.obligatorio'));

        if (datos == true) {

            var url = "<?php echo base_url("index.php/ingresoform/enviocorreoempresa") ?>";
            $.post(url, {nit: nit, empresa: empresa, correo: correo}, function() {
                $.notific8('', {
                    horizontalEdge: 'bottom',
                    life: 5000,
                    theme: 'amethyst',
                    heading: 'Correo enviado Con exito'
                });
            });
        }

    });
</script>    