<script>
    ruta = "ingresoform/get_datatable/<?php echo $id ?>";
</script>
<center><h1><?php echo $titulo; ?></h1></center>
<div class="portlet box blue">
    <div class="caption">
        &nbsp;&nbsp;<i class="fa fa-users"></i>
        Detalle
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
            <thead>
                <tr>
                    <th>NIT</th>
                    <th>Razon Social</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Nombre Reprecentante</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
