<center><h1><?php echo $titulo; ?></h1></center>

<div class="container">
    <div class="col-lg-12 col-md-12">
        <div class="col-lg-3 col-md-3">
            Formulario
        </div>
        <div class="col-lg-3 col-md-3">
            <?php echo form_dropdown('formulario', $formularios, '-1', 'id="formulario"') ?>
        </div>
        <div class="col-lg-3 col-md-3" id="otro_formulario" style="display: none">
            <button type="button" class="btn defaul blue opcion" data-toggle="modal" data-target="#opcion" data-accion="nuevo_form" data-formulario="<?php echo count($formularios) + 1;?>" >
                Agregar        
            </button>
        </div>
    </div>
</div>
<script>
    $('#formulario').change(function () {
        var titulo = $('#formulario option:selected').text();
        if (titulo == 'OTRO') {
            $('#otro_formulario').show();
            return false;
        } else {
            $('#otro_formulario').hide();
        }
    })
</script>