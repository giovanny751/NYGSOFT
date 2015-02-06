<?php
if ($contador == 0) {
    echo "<div class='row'><form method='post' id='fusuario'>";
    foreach ($i as $tipo => $preguntaopcion) {
        echo "<div class='table-responsive'>
            <table class='table table-responsive table-striped table-bordered'>";
        echo "<tr><td colspan='4' align='center'>" . $tipo . "</td></tr>";
        foreach ($preguntaopcion as $opcion => $opcionpregunta) {
            echo "<tr><td colspan='4'><b>" . $opcion . "</b></td></tr>";
            foreach ($opcionpregunta as $id => $pregunta) {
                echo "<tr><td>" . $pregunta . "</td><td>
                    <input type='checkbox' value='".$id."'  name='si[]' class='form-control seleccionado' ></td>
                    <td><input type='checkbox' value='".$id."' name='no[]' class='form-control seleccionado' ></td>
                    <td><input type='checkbox' value='".$id."' name='na[]' class='form-control seleccionado' ></td>
                    </tr>";
            }
        }
        echo "</table>
            </div>";
    }
    echo "</form></div>";
    ?>
    <div class="row" align="right">
        <button type="button" class="btn btn-success guardar">Guardar</button>
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

                }
            });
            console.log(h);
            if (h == 0) {
                var url = "<?php echo base_url('index.php/preguntas/guardarpreguntasusuario') ?>";

                $.post(url, $('#fusuario').serialize(), function(data) {

                });
            }else{
                $.notific8('POR FAVOR RESPONDER TODAS LAS PREGUNTAS', {
                        horizontalEdge: 'bottom',
                        life: 7000,
                        theme: 'amethyst',
                        heading: 'PREGUNTAS'
                    });
            }
        });
    </script>    
<?php } else { ?>
    <div class="row">
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-sx-offset-2 col-sm-8 col-sx-8 col-lg-8 col-md-8">
            <div class="alert alert-info"><center><b>LA PRUEBA YA HA SIDO PRESENTADA</b></center></div>
        </div>
    </div>
<?php } ?>
