<div class="row">
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>TIPO IDENTIFICACION</label>
        <select class="form-control obligatorio" id="tipodocumento">
            <option value="">-Seleccionar-</option>
            <option value="1">CEDULA</option>
        </select>
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>DOCUMENTO</label>
        <input type="text" class="form-control obligatorio" id="documento" name="documento" placeholder="DOCUMENTO">
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>DOCUMENTO</label>
        <input type="text" class="form-control obligatorio" id="documento" name="documento" placeholder="DOCUMENTO">
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 ">
        <label>CORREO</label>
        <input type="text" name="correo" id="correo" class="form-control obligatorio" placeholder="CORREO">
    </div>
    <div class="col-lg-offset-3 col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-6 col-md-6 col-xs-6 col-sm-6 " align="right">
        <br><button type="button" class="btn btn-success" id="guardar">Enviar Correo</button>
    </div>
</div>
<script>
    $('#guardar').click(function(){
        
       var documento = $('#documento').val(); 
       var correo = $('#correo').val();
       var tipodocumento = $('#tipodocumento').val();
        
       var datos = obligatorio($('.obligatorio'));
       
       if(datos == true){
           
           var url = "<?php echo base_url("index.php/ingresoform/enviocorreousuario") ?>";
           $.post(url,{documento:documento,tipodocumento:tipodocumento,correo:correo},function(){
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