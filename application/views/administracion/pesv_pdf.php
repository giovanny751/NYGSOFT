<div style="color">
    <b>Nombre de la empresa:</b> <?php echo $empresa[0]->emp_razonSocial; ?>
    <p>
        <b>LOGO DE LA EMPRESA:</b> <?php echo $empresa[0]->emp_razonSocial; ?>
    <h2>INTRODUCCIÓN</h2>
    <?php
    if (!empty($introduccion[0]['int_introduccion'])) {
        ?>
        <p>
            <?php
            echo $introduccion[0]['int_introduccion'];
        }
        ?></p><br><h2>OBJETIVOS</h2><?php
        ?></div><h3>Objetivos generales</h3><?php
foreach ($general as $gen) {
    ?>
    <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
        <?php echo $gen['objGen_objetivo'] ?><br>
    </div>

    <?php
}
?><h3>Objetivos especificos</h3><?php
foreach ($especificos as $esp) {
    ?>
    <p>
        <?php echo $esp['objEsp_objetivo'] ?></p><br>
    <?php
}
?>
<h3>Objetivos por linea de accion del PESV</h3>
<!--<table >-->
<ul>
    <?php
    foreach ($lineaaccion as $accion => $objetivo) {
        echo "<li><b>" . $accion . "</b></li><ul>";
        foreach ($objetivo as $posicion => $obj) {
            echo "<li>" . $obj . "</li>";
        }
        echo "</ul><br>";
    }
    ?>
</ul>
<!--</table>-->

<h2>COMPROMISO DE LA ALTA DIRECCIÓN</h2>
<br>Los miembros de la alta dirección que aparecen a continuación: <br>
<?php
foreach ($miembros as $miembro) {
    ?>
    <p>
        <label>Nombre: </label><?php echo $miembro['mie_nombre'] ?><br>
        <label>Cargo: </label><?php echo $miembro['mie_cargo'] ?>
    </p><br>
    <?php
}
?>
<br>Preocupados por el bienestar de la organización, se comprometen a:<br>

<h2>RESPONSABLE</h2>
<br>Como responsable del PESV se a delegado por la Alta gerencia a: <br><?php
foreach ($responsables as $responsable) {
    ?>
    <p>
        <label>Nombre: </label><?php echo $responsable['res_cargo']; ?><br>
        <label>Cargo: </label><?php echo $responsable['res_nombre']; ?>
    </p><br>
    <?php
}
?><h2>COMITE</h2><?php
foreach ($comites as $comite) {
    ?>
    <p>
        <label>Nombre: </label><?php echo $comite['com_nombre']; ?><br>
        <label>Cargo: </label><?php echo $comite['com_cargo']; ?>
    </p>
    <?php
}
?><h2>POLITICA</h2>
<br>POLÍTICA  DE  SEGURIDAD  VIAL<?php
if (!empty($politicas[0]['pol_politica'])) {
    ?><p>
        <?php
        echo $politicas[0]['pol_politica'];
    }
    ?></p><br><h2>PRIORIDADES</h2>
IDENTIFICACIÓN DE PRIORIDADES DE RIESGOS VIALES EN LA ORGANIZACIÓN <?php
foreach ($prioridades as $prioridad) {
    ?>

    <p>
        <label>No Prioridad: </label><?php echo $prioridad['pri_prioridad']; ?> <br>
        <label>Nombre del Riesgo: </label><?php echo $prioridad['pri_riesgo']; ?>
    </p><br>
    <?php
}
?>
</div>
<style>
    h2{
        text-align: center;
    }
    .color{
        text-align: justify;
    }
</style>