<?php 
//echo $contador;die;
if($contador == 0){
?>
<div class="col-md-offset-2 col-lg-offset-2 col-sm-offset-2 col-sx-offset-2 col-md-8 col-lg-8 col-sm-8 col-sx-8 ">
    <div class="table-responsive ">
        <form method="post" id="fusuario">
            <table class="table table-responsive table-striped table-bordered">
                <thead>
                <th>Pregunta</th>
                <th>SI</th>
                <th>NO</th>
                <th>N/A</th>
                </thead>
                <tbody>
                    <?php foreach ($preguntas as $pregunta) { ?>
                        <tr>
                            <td><?php echo $pregunta['pre_pregunta']; ?></td>
                            <td><input type="checkbox" value="<?php echo $pregunta['pre_id']; ?>" class="form-control seleccionado" name="si[]"></td>
                            <td><input type="checkbox" value="<?php echo $pregunta['pre_id']; ?>" class="form-control seleccionado" name="no[]"></td>
                            <td><input type="checkbox" value="<?php echo $pregunta['pre_id']; ?>" class="form-control seleccionado" name="na[]"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
    <div class="row" align="right">
        <button type="button" class="btn btn-success guardar">Guardar</button>
    </div>
</div>
<script>
    $('.seleccionado').click(function() {

        $(this).parents('td').siblings().children('input').each(function(indice, campo) {
            $(this).prop('checked', false);
        });
    });
    $('.guardar').click(function() {
        var h = 0;
        $('table tbody tr').each(function(key, val) {
            
            var i = 0;
            
            $(this).children('td').children('input').each(function(indice, campo) {
                if ($(this).prop('checked') == false) {
                    i++;
                }
            });
            if (i == 3) {
                h++;
                $(this).children('td').children('input').css('background-color','red');
            }
        });
        console.log(h);
//        if (h == 0) {
            var url = "<?php echo base_url('index.php/preguntas/guardarpreguntasusuario') ?>";

            $.post(url, $('#fusuario').serialize(), function(data) {

            });
//        }
    });
</script>    
<?php }else{ ?>
<div class="row">
    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-sx-offset-2 col-sm-8 col-sx-8 col-lg-8 col-md-8">
        
    </div>
</div>
<?php } ?>
