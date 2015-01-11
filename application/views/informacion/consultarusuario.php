<div id="row" align="center"><h3>Consultar Persona</h3></div>
<div id="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <label>Documento</label>
        <input type="text" id="documento" class="form-control"/>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
        <button type="button" id="consultar" class="btn btn-success">Consultar</button>  
    </div>
</div>
<div id="info" class="row"></div>

<script>

    $('.container').delegate('.url', 'click', function () {
        var texto = $(this).text();
        $('#info').load(texto);
    });

    $('#consultar').click(function () {
        var url = "<?php echo base_url('index.php/informacion/consultaurlusuario'); ?>"
        $.post(url, {url: url})
                .done(function (msg) {
                    var table = '<div class="row" id="resultado" ><table>';
                    $.each(msg, function (key, val) {
                        table += "<tr>";
                        table += "<td >" + val.infPer_nombre;
                        table += "</td>";
//                        table += "<td class='url'>" + val.infPer_url;
//                        table += "</td>";
                        table += '<td ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#opcion" data-accion="nuevo_producto" data-url="' + val.infPer_url + '">consul</button>'
                        table += "</td>";
                        table += "</tr>";

                    });
                    table += "</table></div>";
                    $('.container').append(table);
                }).fail(function (msg) {

        })

    })


    $('#opcion').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var accion = button.data('accion');
        var texto = button.data('url');
        return false;
        $('#contenido').html('')
        var titulo = "";
        var url = "";
        var id = "";
        switch (accion) {
            case 'nuevo_producto':
                titulo = '<h5><i class="glyphicon glyphicon-pencil"></i> Información</h5>';
//                var url = "<?php echo base_url('index.php/informacion/consultaurlusuario'); ?>"
                $('#guardar').show();
                break;
//            case 'nuevo_producto':
//                titulo = "Productos";
//                url = '<?php echo base_url('index.php/'); ?>/proveedores/crear_prodcutos';
//                id = button.data('id')
//                $('#guardar').hide();
//                break;
        }

        $('#contenido').load(texto);
        var modal = $(this)
        modal.find('.modal-title').html(titulo)
    });


</script>