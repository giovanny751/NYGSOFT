<div style="color">
    <b>Nombre de la empresa:</b> <?php echo $empresa[0]->emp_razonSocial;?>
    <p>
    <b>LOGO DE LA EMPRESA:</b> <?php echo $empresa[0]->emp_razonSocial;?>
    <h2>INTRODUCCIÓN</h2>
    <?php
    if (!empty($introduccion[0]['int_introduccion'])) {
        ?>
        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
            <?php
            echo $introduccion[0]['int_introduccion'];
        }
        ?></div><h2>OBJETIVOS</h2><?php
        ?></div><h3>OBJETIVOS GENERALES</h3><?php
    foreach ($general as $gen) {
        ?>
        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
            <?php echo $gen['objGen_objetivo'] ?><br>
        </div>

        <?php
    }
    ?><h3>OBJETIVOS ESPECIFICOS</h3><?php
    foreach ($especificos as $esp) {
        ?>
        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 color">
            <?php echo $esp['objEsp_objetivo'] ?><br></div>
        <?php
    }
    
    
    
    ?>
    <h2>Objetivos por líneas de acción del PESV </h2>
    <table>
        <tr>
            <td>Línea de Acción</td>
            <td>Objetivos específicos</td>
        </tr>
        <tr>
            <td>Comportamiento humano</td>
            <td></td>
        </tr>
        <tr>
            <td>Establecer el perfil de los conductores (propios o terceros) que trabajarán en la empresa.</td>
        </tr>
        <tr>
            <td>Desarrollar e implementar un proceso de selección de conductores.</td>
        </tr>
        <tr>
            <td>Reglamentar el uso de pruebas de ingreso para conductores.</td>
        </tr>
        <tr>
            <td>Implementar capacitaciones en seguridad vial para todo el personal.</td>
        </tr>
        <tr>
            <td>Registrar y controlar la documentación de los conductores.</td>
        </tr>
        <tr>
            <td>Definir políticas de regulación en cuanto al control de alcohol y drogas.</td>
        </tr>
        <tr>
            <td>Definir políticas de regulación en cuanto a las horas de conducción y descanso. </td>
        </tr>
        <tr>
            <td>Definir políticas de regulación en cuanto a los límites de velocidad dentro y fuera de la empresa.</td>
        </tr>
        <tr>
             <td>Definir políticas de regulación en cuanto al uso del cinturón de seguridad en los vehículos dentro y fuera de la empresa. </td>
        </tr>
        <tr>
            <td>Definir políticas de regulación en cuanto al no uso de comunicaciones móviles mientras se conduce dentro y fuera de la empresa. </td>
        </tr>
        <tr>
            <td>Definir los elementos de protección requeridos para el conductor y sus acompañantes.</td>
        </tr>
        <tr>
            <td>Vehículos Seguros</td>
            <td>Diseñar e instituir un plan de mantenimiento preventivo de los vehículos.</td>
        </tr>
        <tr>
            <td>Registrar y documentar toda la información del plan de mantenimiento preventivo.</td>
        </tr>
        <tr>
            <td>Garantizar la idoneidad del personal que realiza los mantenimientos preventivos. </td>
        </tr>
        <tr>
            <td>Establecer protocolos de inspección diaria de los vehículos.</td>
        </tr>
        <tr>
            <td>Registrar y controlar la documentación, mantenimiento e información de los vehículos.</td>
        </tr>
        <tr>
            <td>Infraestructura Segura</td>
            <td>Realizar una revisión del entorno físico donde se opera.</td>
        </tr>
        <tr>
            <td>Definir e implementar medidas de prevención en las vías internas por donde circulan vehículos y al ingreso/salida de todo el personal de las instalaciones. </td>
        </tr>
        <tr>
            <td>Generar formatos para documentar los incidentes y accidentes que se presenten dentro de las instalaciones.</td>
        </tr>
        <tr>
            <td>Realizar un estudio de Rutas.</td>
        </tr>
        <tr>
            <td>Evaluar la viabilidad de usar apoyo tecnológico (GPS) como fuente de apoyo y soporte para la conducción. </td>
        </tr>
        <tr>
            <td>Definir y establecer mecanismos de socialización e información preventiva acerca de los factores de riesgo en los desplazamientos en las vías internas y externas. </td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    
    <h2>COMPROMISO</h2>
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
        text-align: center;
    }
    .color{
        text-align: justify;
    }
</style>