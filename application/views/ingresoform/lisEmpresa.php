<script>
    ruta = "ingresoform/get_datatable";
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
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Ciudad</th>
                    <th>Documento</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>