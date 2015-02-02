<form method="post" action="<?php echo base_url('index.php/reportes/abrirxml') ?>"> 
    <div class="row">
        <?php
        echo $logicareportes;
        ?>
    </div>
    <div class="row" align="right">
        <input type="submit" class="btn btn-success" value="REPORTE">
    </div>
</form>
