<div style="color">
    <b>Nombre de la empresa:</b> <?php echo $empresa[0]->emp_razonSocial; ?>
    <br><b>LOGO DE LA EMPRESA:</b> 
    <?php if (!empty($empresa[0]->userfile)) {
        ?>
        <center><img src="<?php echo base_url('/uploads/') . "/" . $empresa[0]->userfile ?>" style="width: 100px"></center>
        <?php }
    ?>
    <h2>INTRODUCCIÓN</h2>
    <?php
    if (!empty($introduccion[0]['int_introduccion'])) {
        echo "<p>" . $introduccion[0]['int_introduccion'] . "</p>";
    }
    ?>
    