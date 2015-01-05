<html>
<head>
    <title>NYGSOFT.COM</title>
    <link href="<?php echo base_url('img/nygsoft.jpg'); ?>" rel="shortcut icon" type="image/x-icon">
    <script src="<?php echo base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('js/jquery.smartmenus.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('js/jquery.smartmenus.bootstrap.js') ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('js/ajaxfileupload.js') ?>" type="text/javascript"></script>
    <!--<script src="<?php echo base_url('js/plupload.dev.js') ?>" type="text/javascript"></script>-->
    <link href="<?php echo base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('css/jquery.smartmenus.bootstrap.css') ?>" rel="stylesheet">
    <!--<script src="<?php echo base_url('js/jquery.smartmenus.bootstrap.min.js') ?>" type="text/javascript"></script>-->
    <style>

        body > .container {
            padding: 60px 15px 0;
        }
        html, body {
            height: 100%;
        }
        #contenedor {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -60px;
        }
        #footer{
            height: 60px;
        }

    </style>
</head>

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
                    echo "<li><a href='" . base_url("index.php/" . $submenus[1] . "/" . $submenus[2]) . "'>" . strtoupper($nombrepapa) . "</a>";
                    if (!empty($submenus[0]))
                        modulos($submenus[0]);
                    echo "</li>";
                endforeach;
    echo "</ul>";
}
?>

<body>
    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top" >
            <div class='container'> 
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">NYGSOFT</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">NYGSOFT</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <?php echo modulos(); ?>
                </div>
            </div>
        </nav>
    </div>

    <div class='container'> 

        <?php echo $content_for_layout ?>

    </div>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">Copyright © <?php echo date("Y"); ?> texto - Nygsoft.com
                <img src="<?php echo base_url('img/nygsoft.jpg'); ?>" style="width: 70px">
        </div>
    </footer>
    <div id="footer">
        <p>© Michelle Torres 2013</p>
    </div>
</body>
</html>