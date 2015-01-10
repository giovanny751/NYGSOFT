   <div class="row" align="center">
        <h3>REGISTRO USUARIO</h3>
    </div>
    <div class="row">
        <button data-toggle="modal" data-target="#myModal"  type="button" id="insertarusuario" class="btn btn-success">Ingresar Usuario</button>
    </div>
    <div class="row">
        <div class="table-responsive ">
        <table class="table table-responsive table-striped table-bordered">
            <thead>
            <th style="width: 220px">Usuario</th>
            <th style="width: 220px">Email</th>
            <th style="width: 220px">Numero Celular</th>
            <th style="width: 220px">Estado</th>
            <th style="width: 220px">Modificar</th>
            <th style="width: 220px">Permisos</th>
            </thead>
            <tbody>
                <?php foreach ($usaurios as $todosusuarios) { ?>
                    <tr>
                        <td><?= $todosusuarios['username'] ?></td>
                        <td><?= $todosusuarios['email'] ?></td>
                        <td><?php
                            if (!empty($todosusuarios['phone'])) {
                                echo $todosusuarios['phone'];
                            } else {
                                echo 0;
                            }
                            ?></td>
                        <td><?php
                            if ($todosusuarios['active'] == 1)
                                echo "Activo";
                            else {
                                echo "Inactivo";
                            }
                            ?></td>
                        <td align="center"><button type="button" class="modificar btn btn-info" idpadre="<?= $todosusuarios['id'] ?>">Modificar</button></td>
                        <td align="center"><button type="button"  data-toggle="modal" data-target="#myModal3"  id="permiso" class="btn btn-info" usuarioid="<?= $todosusuarios['id'] ?>">Permisos</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="alerta"></div>
    </div>
    </div>
</div>

<!--Modal-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificacion</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Editar</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Usuario</label><input type="text" id="usuario" name="usuario" class="obligatorio form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Email</label><input type="text" id="email" name="email" class="obligatorio form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Contraseña</label><input type="text" id="contrasena" name="contrasena" class="obligatorio form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Repetir Contraseña</label>
                                <input type="text" id="rcontrasena" name="rcontrasena" class="obligatorio form-control">
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Numero Celular</label>
                                <input type="text" id="celular" name="celular" class="obligatorio form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
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
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Permisos</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Permisos</h5>
                    </div>
                    <div class="well">
                        <form method="post" id="formulariopermisos">
                            <input type="hidden" name="usuarioid" id="usuarioid">
                            <div class="row totalpermisos">

                            </div>
                        </form>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
                        <button type="button" class="btn btn-primary guardarpermiso">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .error{
        border: 2px solid #7d7d7d;
        background-color: lightgoldenrodyellow;
    }
</style>
<script>
    $('#ingresousuario').hide();

    $('.modificar').click(function () {
        $('.obligatorio').val('');

        var id = $(this).attr('idpadre');
        var url = "<?= base_url('index.php/presentacion/consultausuario') ?>";
        $.post(url, {id: id}, function (data) {
            $('#usuario').val(data.username);
            $('#email').val(data.email);
            $('#celular').val(data.phone);
        });
    });

    $('body').delegate('#permiso', 'click', function () {
        var id = $(this).attr('usuarioid');
        $('#usuarioid').val(id);
        var url = "<?php echo base_url('index.php/presentacion/permisos') ?>";
        $.post(url, {id: id}, function (data) {
            $('.totalpermisos').html(data);
        });
    });

    $('body').delegate('.guardarpermiso', 'click', function () {

        var url = "<?php echo base_url('index.php/presentacion/guardarpermisos') ?>"

        $.post(url, $('#formulariopermisos').serialize(), function () {

        });

    });

    $('#insertarusuario').click(function () {
        $('.obligatorio').val('');
    });


</script>    