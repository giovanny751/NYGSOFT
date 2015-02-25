<div style="color">
    <h2>INTRODUCCION</h2>
    <?php
    if (!empty($introduccion[0]['int_introduccion'])) {
        ?>
        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
            <?php
            echo $introduccion[0]['int_introduccion'];
        }
        ?></div><h2>OBJETIVOS GENERALES</h2><?php
    foreach ($general as $gen) {
        ?>
        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
            <?php echo $gen['objGen_objetivo'] ?><br>
        </div>

        <?php
    }
    ?><h2>OBJETIVOS ESPECIFICOS</h2><?php
    foreach ($especificos as $esp) {
        ?>
        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
            <?php echo $esp['objEsp_objetivo'] ?><br></div>
        <?php
    }
    ?><h2>COMPROMISO</h2>
    <br>Los miembros de la alta dirección que aparecen a continuación: <br>
    <?php
    foreach ($miembros as $miembro) {
        ?>
        <div class="color col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
            <label>Nombre: </label><?php echo $miembro['mie_nombre'] ?><br>
            <label>Cargo: </label><?php echo $miembro['mie_cargo'] ?>
        </div>
        <?php
    }
    ?><h2>RESPONSABLE</h2>
    <br>Como responsable del PESV se a delegado por la Alta gerencia a: <br><?php
    foreach ($responsables as $responsable) {
        ?>
        <div class="color col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
            <label>Nombre: </label><?php echo $responsable['res_cargo']; ?><br>
            <label>Cargo: </label><?php echo $responsable['res_nombre']; ?>
        </div>
        <?php
    }
    ?><h2>COMITE</h2><?php
    foreach ($comites as $comite) {
        ?>

        <div class="color col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
            <label>Nombre: </label><?php echo $comite['com_nombre']; ?><br>
            <label>Cargo: </label><?php echo $comite['com_cargo']; ?>
        </div>

        <?php
    }
    ?><h2>POLITICA</h2>
    <br>POLÍTICA  DE  SEGURIDAD  VIAL<br><?php
    if (!empty($politicas[0]['pol_politica'])) {
        ?><div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
        <?php
        echo $politicas[0]['pol_politica'];
    }
    ?></div><br><h2>PRIORIDADES</h2>
    IDENTIFICACIÓN DE PRIORIDADES DE RIESGOS VIALES EN LA ORGANIZACIÓN <?php
    foreach ($prioridades as $prioridad) {
        ?>

        <div class=" color col-lg-offset-2 col-sm-offset-2 col-xs-offset-2 col-md-offset-2 col-lg-3 col-sm-3 col-xs-3 col-md-3">
            <label>No Prioridad: </label><?php echo $prioridad['pri_prioridad']; ?> <br>
            <label>Nombre del Riesgo: </label><?php echo $prioridad['pri_riesgo']; ?>
        </div>
        <?php
    }
    ?>
</div>
<style>
    h2{
        background-color: #d9edf7;
        border-color: #bce8f1;
        color: #31708f;
    }
    .color{
        text-align: justify;
    }
</style>