<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!--<br><b>LOGO DE LA EMPRESA:</b>--> 
<?php if (!empty($empresa[0]->userfile)) { ?>

    <div align="center"><img width="200px"  src="<?php echo base_url('/uploads/') . "/" . $empresa[0]->userfile ?>" ></div>
<?php }
?>

<h4><?php echo $empresa[0]->emp_razonSocial; ?></h4>
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
<div><br></div>    
 

  
<h4 class="ano"><?php echo date('Y'); ?></h4>
<br class="salto">
<h2 class="principal">INTRODUCCIÓN</h2>
<?php
if (!empty($introduccion[0]['int_introduccion'])) {
    echo "<div >" . $introduccion[0]['int_introduccion'] . "</div>";
//    echo "<div >" . $introduccion[0]['int_introduccion'] . "</div>";
}
?>
<br class="salto">
<h2>OBJETIVOS</h2>

<h3>Objetivos generales</h3>
<?php
foreach ($general as $gen):
    ?>
    <div><?php echo utf8_encode($gen['objGen_objetivo']) ?></div>
<?php endforeach; ?>
<h3>Objetivos especificos</h3>
<?php foreach ($especificos as $esp) { ?>
    <div><?php echo utf8_encode($esp['objEsp_objetivo']) ?></div>
<?php } ?>

<h3>Objetivos por linea de accion del PESV</h3>
<ul style='line-height: 150%;'>
    <?php
    foreach ($lineaaccion as $accion => $objetivo) {
        echo "<li style='line-height: 150%;'><b>" . $accion . "</b></li><ul>";
        foreach ($objetivo as $posicion => $obj) {
            echo "<li  style='line-height: 150%;'>" . utf8_encode($obj) . "</li>";
        }
        echo "</ul><br>";
    }
    ?>
</ul>
<br class="salto">
<div>&nbsp;</div>
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
<br class="salto">
<div>&nbsp;</div>
<h2>RESPONSABLE DEL PESV</h2>
<p>Como responsable del PESV se a delegado por la Alta gerencia a: </p><?php foreach ($responsables as $responsable) : ?>
    <?php if (!empty($responsable['res_nombre']) && !empty($responsable['res_cargo'])) { ?>
        <p>
            <label>Nombre: </label><?php echo $responsable['res_nombre']; ?><br>
            <label>Cargo: </label><?php echo $responsable['res_cargo']; ?>
        </p>
    <?php
    }
endforeach;
?>
<p>Quién se encargará de diseñar, desarrollar , implementar y hacer seguimiento del PESV. Y de cada una de las acciones que deriven de éste.</p>
<br class="salto">
<div>&nbsp;</div>
<h2>COMITE DE SEGURIDAD VÌAL</h2>
<?php foreach ($comites as $comite) { ?>
    <p>
        <label>Nombre: </label><?php echo $comite['com_nombre']; ?><br>
        <label>Cargo: </label><?php echo $comite['com_cargo']; ?>
    </p>
<?php } ?>

<p><?php echo $consultatextocomite[0]['texCom_texto']; ?></p>
<br class="salto">
<div>&nbsp;</div>
<h2>COMUNICACIÒN</h2>
<p><?php if (!empty($comunicacion[0]['com_comunicacion'])) echo $comunicacion[0]['com_comunicacion'] ?></p>
<br class="salto">
<div>&nbsp;</div>
<h2>ESTADISTICAS</h2>

<p>
    
</p>

<br class="salto">
<div>&nbsp;</div>
<h2>POLÍTICA  DE  SEGURIDAD  VIAL</h2>
<?php
if (!empty($politicas[0]['pol_politica'])) {
    echo "<p>" . $politicas[0]['pol_politica'] . "</p>";
}
?>
<br>
<br class="salto">
<div>&nbsp;</div>
<h2>DIAGNOSTICO</h2>
<p><?php echo $diagnostico[0]['texDia_texto']; ?></p>
<br class="salto">
<div>&nbsp;</div>
<h2>IDENTIFICACIÓN  DE  PRIORIDADES  DE RIESGOS</h2>
<p align="justify">En reuniones de evaluación del diagnóstico, el CSV analizó los resultados obtenidos. Una vez identificados y priorizados los riesgos encontrados, se definieron las siguientes estrategias, por riesgo así:   </p>
<?php
foreach ($prioridades as $pri) {
    ?>
    <table width="100%">
        <tr>
            <td colspan="6"><b>Riesgo</b></td>
        </tr>
        <tr>
            <td colspan="6">
    <?php if (!empty($pri['pri_riesgo'])) echo $pri['pri_riesgo'] ?>
            </td>
        </tr>
        <tr>
            <td  width="180px"><b>Eje Afectado</b></td>
            <td colspan="2" width="100px"><b>Nivel de Riesgo</b></td>
            <td  align="center"><b>Peaton</b></td>
            <td  align="center"><b>Pasajero</b></td>
            <td   align="center"><b>Conductor</b></td>
        </tr>
        <tr>
            <td>
                <?php if ($pri['pri_comportamiento'] == 1) echo "Comportamiento humano" ?>
                <?php if ($pri['pri_comportamiento'] == 2) echo "Vehiculo seguro" ?>
                <?php if ($pri['pri_comportamiento'] == 3) echo "Infraestructura segura" ?>
    <?php if ($pri['pri_comportamiento'] == 4) echo "Atencion a victimas" ?>
            </td>
            <td colspan="2" >
                <?php if ($pri['tipRie_id'] == 1) echo "ALTO"; ?>
                <?php if ($pri['tipRie_id'] == 2) echo "MEDIO"; ?>
    <?php if ($pri['tipRie_id'] == 3) echo "BAJO"; ?>
            </td>
            <td align="center"><?php if (!empty($pri['pri_peaton'])) {
        echo "X";
    } else {
        echo "O";
    } ?></td>
            <td align="center"><?php if (!empty($pri['pri_pasajero'])) {
        echo "X";
    } else {
        echo "O";
    } ?></td>
            <td align="center"><?php if (!empty($pri['pri_conductor'])) {
        echo "X";
    } else {
        echo "O";
    } ?></td>
        </tr>
        <tr>
            <td colspan="6"><b>Responsable</b></td>
        </tr>
        <tr>
            <td colspan="6" align="justify">
    <?php echo $pri['pri_responsable'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="6"><b>Descripcion</b></td>
        </tr>
        <tr>
            <td colspan="6" align="justify">
    <?php if (!empty($pri['pri_descripcion'])) echo $pri['pri_descripcion'] ?>
            </td>
        </tr>
        <tr>
            <td colspan="6"><b>Estrategia</b></td>
        </tr>
        <tr>
            <td colspan="6" align="justify">
    <?php if (!empty($pri['pri_estrategia'])) echo $pri['pri_estrategia'] ?>
            </td>
        </tr>
    </table>  <br><br><br>
    <?php
}
?>
<br class="salto">
<div>&nbsp;</div>
<h2>PLAN DE ACCION</h2>
<?php
foreach ($cronograma as $semestre => $eje) {
    if ($semestre == 1)
        echo "<h3>PRIMER SEMESTRE</h3>";
    if ($semestre == 2)
        echo "<h3>SEGUNDO SEMESTRE</h3>";
    if ($semestre == 3)
        echo "<h3>TERCER SEMESTRE</h3>";
    if ($semestre == 4)
        echo "<h3>CUARTO SEMESTRE</h3>";
    foreach ($eje as $eje => $num) {

        if ($eje == 1)
            echo "<h3>Comportamiento humano</h3>";
        if ($eje == 2)
            echo "<h3>Vehiculo seguro</h3>";
        if ($eje == 3)
            echo "<h3>Infraestructura segura</h3>";
        if ($eje == 4)
            echo "<h3>Atencion a victimas</h3>";
        foreach ($num as $cronogra) {
            echo "<p>$cronogra</p>";
        }
    }
}
?>
<!--<br>
<h2>PRIORIDADES</h2>
IDENTIFICACIÓN DE PRIORIDADES DE RIESGOS VIALES EN LA ORGANIZACIÓN -->
<?php
// if (count($prioridades) > 0) {
//     echo print_y($prioridades);
//    foreach ($prioridades as $prioridad) {
?>
<!--        <p>
            <label>No Prioridad: </label><?php echo (!empty($prioridad['pri_prioridad'])) ? $prioridad['pri_prioridad'] : ''; ?> <br>
            <label>Nombre del Riesgo: </label><?php echo (!empty($prioridad['pri_riesgo'])) ? $prioridad['pri_riesgo'] : ''; ?>
        </p><br>-->
<?php
// }
//}
?>
<style>
    .ano{
        margin-top: 140px;
    }
    .titulo{
        padding: 50%;
    }
    * { 
        font-family: "calibri", Garamond, 'Comic Sans'; 
        line-height: 150%;
        font: 12px/2em sans-serif;
    }
    .principal{
        margin-top: 400px;
    }
    h2,h3,h4,img{
        text-align: center;
    }
    div{
        text-align: justify;
    }
    .salto{
        page-break-after: always;
    }
</style>
  