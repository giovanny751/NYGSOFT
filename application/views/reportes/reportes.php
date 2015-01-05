<head>
    <script src="<?php echo  base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <script src="<?php echo  base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
    <link href="<?php echo  base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo  base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>


<div class="container">
    <div class="row">
        <div class="col-md-5 col-lg-5 col-sm-5 col-sx-5">
            <div class="row" align="right">
                <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-success opciones">Nuevo</button>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table" align="center" border="1">
                        <thead>
                        <th>Nombre</th>
                        <!--<th>Estado</th>-->
                        <th>Opciones</th>
                        </thead>
                        <tbody id="totalreportes">
                            <?php
                            foreach ($reporte as $totalreportes) {
                                ?>
                                <tr>
                                    <td><?php echo $totalreportes['rep_nombre']; ?></td>
                                    <!--<td><?php echo $totalreportes['rep_estado']; ?></td>-->
                                    <td><button  data-toggle="modal" data-target="#myModal2"  class="btn btn-info opciones" repid="<?php echo $totalreportes['rep_id']; ?>">Opciones</button></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-lg-1 col-sm-1 col-sx-1"></div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-sx-6">
            <div class="row">
                <label>Query</label><textarea class="form-control" id="query"></textarea>
            </div>
            <div class="row" align="right">
                <button class="guardarquery btn btn-success">Validar</button>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i>Nuevo</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Nombre</label><input type="text" id="nombre" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" class="btn btn-primary guardar">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i>Editar</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Nombre</label><input type="text" id="editnombre" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Estado</label>
                                <select id="estado" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" class="btn btn-primary guardar">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('body').delegate('.guardarquery', 'click', function () {
        var query = $('#query').val();
        var url = "<?php echo base_url('index.php/reportes/validarquery') ?>";
        $.post(url, {query: query}, function (data) {

        });
    });

    $('.guardar').click(function () {

        $('#totalreportes *').remove();

        var nuevoreporte = $('#nombre').val();
        var url = "<?php echo base_url('index.php/reportes/guardarreporte') ?>";
        $.post(url, {nuevoreporte: nuevoreporte}, function (data) {
            var bodytable = "";
            $.each(data, function (key, val) {
                bodytable += "<tr>";
                bodytable += "<td>" + val.rep_nombre + "</td>"
                bodytable += "<td>" + val.rep_estado + "</td>"
                bodytable += '<td><button class="btn btn-info opciones" repid="' + val.rep_id + '">Opciones</button></td>'
                bodytable += "</tr>";
            });

            $('#totalreportes').append(bodytable);

            $('#myModal').modal('hide');
        });
    });

    $('table').delegate('.opciones', 'click', function () {

        

    });

</script>

