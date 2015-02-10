<script>
    ruta = "ingresoform/get_datavehiculo/<?php echo $id ?>";
</script>
<center><h1><?php echo $titulo; ?></h1></center>
<div class="portlet box green">
    <div class="caption">
        &nbsp;&nbsp;<i class="fa fa-users"></i>
        Detalle
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
            <thead>
                <tr>
                    <th>Nombre del Propietario</th>
                    <th>Placa</th>
                    <th>Numero de licencia</th>
                    <th>Marca</th>
                    <th>Capacidad</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
