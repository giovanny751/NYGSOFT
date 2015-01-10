<title>NYGSOFT.COM</title>

<script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
<script src='//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js'></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<!--<script src="<?= base_url('js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('js/dataTables.responsive.js') ?>" type="text/javascript"></script>
<link href="<?= base_url('css/dataTables.responsive.css') ?>" rel="stylesheet" type="text/css"/>-->
<link href="<?php echo base_url('img/nygsoft.jpg'); ?>" rel="shortcut icon" type="image/x-icon">
<script src="<?= base_url('js/jquery.smartmenus.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('js/jquery.smartmenus.bootstrap.js') ?>" type="text/javascript"></script>

<script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>

<link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="<?= base_url('css/jquery.smartmenus.bootstrap.css') ?>" rel="stylesheet">
<!--<script src="<?= base_url('js/jquery.smartmenus.bootstrap.min.js') ?>" type="text/javascript"></script>-->

<style>
    .container{
        margin-top: 5%;
        /*position: fixed;*/    
    }
    .row{
        margin-top: 1%;
    }
</style>
<?php

function modulos($datosmodulos = 'prueba', $dato = null) {

    $ci = &get_instance();
    $ci->load->model("ingreso_model");
    $user = null;
    $menu = $ci->ingreso_model->menu($datosmodulos, 3, 1);
    $i = array();
    foreach ($menu as $modulo)
        $i[$modulo['menu_id']][$modulo['menu_nombrepadre']][$modulo['menu_idpadre']] [] = array($modulo['menu_idhijo'], $modulo['menu_controlador'], $modulo['menu_accion']);

//        echo "<pre>";
//        var_dump($i);die;
//        
    if ($datosmodulos == 'prueba')
        echo "<ul class='nav navbar-nav'>";
    else
        echo "<ul class='dropdown-menu'>";
    foreach ($i as $padre => $nombrepapa)
        foreach ($nombrepapa as $nombrepapa => $menuidpadre)
            foreach ($menuidpadre as $modulos => $menu)
                foreach ($menu as $submenus):
                    if ($submenus[1] == "" && $submenus[2] == "") {
                        echo "<li><a href='#'>" . strtoupper($nombrepapa) . "</a>";
                    } else {
                        echo "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "'>" . strtoupper($nombrepapa) . "</a>";
                    }
                    if (!empty($submenus[0]))
                        modulos($submenus[0]);
                    echo "</li>";
                endforeach;
    echo "</ul>";
}
?>
<div class='container'>
    <div class="row">
        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">NYGSOFT</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">NYGSOFT</a>
            </div>
            <div class="navbar-collapse collapse">
                <?= modulos(); ?>
            </div>
        </div><!--/.nav-collapse -->
    </div>
    <div class="row">
        <?php echo $content_for_layout ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row" style="">
            <div class="col-md-8 col-lg-8 col-sm-8 col-sx-8"><p class="text-muted">Copyright © <?php echo date("Y"); ?> texto - Nygsoft.com</p></div>
            <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4" align="center"><img src="<?php echo base_url('img/nygsoft.jpg'); ?>" style="width: 70px"></div>
        </div>    
    </div>     
</footer>