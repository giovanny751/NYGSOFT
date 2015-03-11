<div style="color">
    <b>Nombre de la empresa:</b> <?php echo $empresa[0]->emp_razonSocial; ?>
    <b>LOGO DE LA EMPRESA:</b> <?php echo $empresa[0]->emp_razonSocial; ?>
    <h2>INTRODUCCIÓN</h2>
    <?php
    if (!empty($introduccion[0]['int_introduccion'])) {
        echo "<p>" . $introduccion[0]['int_introduccion'] . "</p>";
    }
    ?><h2>OBJETIVOS</h2>
</div>
<h3>Objetivos generales</h3>
<?php
foreach ($general as $gen):
    ?>
    <p><?php echo $gen['objGen_objetivo'] ?></p>
    <?php
endforeach;?>
    <h3>Objetivos especificos</h3>
<?php foreach ($especificos as $esp) { ?>
    <p><?php echo $esp['objEsp_objetivo'] ?></p><br>
    <?php } ?>
    
<h3>Objetivos por linea de accion del PESV</h3>
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
<h2>COMPROMISO DE LA ALTA DIRECCIÓN</h2>
<p>Los miembros de la alta dirección que aparecen a continuación: </p>
<?php
foreach ($miembros as $miembro):
    ?>
    <p>
        <label>Nombre: </label><?php echo $miembro['mie_nombre'] ?><br>
        <label>Cargo: </label><?php echo $miembro['mie_cargo'] ?>
    </p>
    <?php
endforeach;
?>
<p><?php echo $textomiembro[0]['comTex_texto']; ?></p>

<h2>RESPONSABLE</h2>
<p>Como responsable del PESV se a delegado por la Alta gerencia a: </p><?php
foreach ($responsables as $responsable) : ?>
    <p>
        <label>Nombre: </label><?php echo $responsable['res_cargo']; ?><br>
        <label>Cargo: </label><?php echo $responsable['res_nombre']; ?>
    </p>
    <?php
endforeach;
?>
<p>Quién se encargará de diseñar, desarrollar , implementar y hacer seguimiento del PESV. Y de cada una de las acciones que deriven de éste.</p>
<h2>COMITE</h2>
<?php foreach ($comites as $comite) { ?>
    <p>
        <label>Nombre: </label><?php echo $comite['com_nombre']; ?><br>
        <label>Cargo: </label><?php echo $comite['com_cargo']; ?>
    </p>
 <?php } ?>

<p><?php echo $consultatextocomite[0]['texCom_texto']; ?></p>
<h2>POLITICA</h2>
<br>POLÍTICA  DE  SEGURIDAD  VIAL<?php
if (!empty($politicas[0]['pol_politica'])) {
    echo "<p>".$politicas[0]['pol_politica']."</p>"; } ?>
<br>
<h2>DIAGNOSTICO</h2>
<p><?php echo $diagnostico[0]['texDia_texto']; ?></p>
<br>
<h2>PRIORIDADES</h2>
IDENTIFICACIÓN DE PRIORIDADES DE RIESGOS VIALES EN LA ORGANIZACIÓN <?php
foreach ($prioridades as $prioridad) { ?>
    <p>
        <label>No Prioridad: </label><?php echo $prioridad['pri_prioridad']; ?> <br>
        <label>Nombre del Riesgo: </label><?php echo $prioridad['pri_riesgo']; ?>
    </p><br>
    <?php } ?>
<style>
    h2{
        text-align: center;
    }
    .color{
        text-align: justify;
    }
</style>