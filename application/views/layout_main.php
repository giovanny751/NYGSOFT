<title>NYGSOFT.COM</title>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
<!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
<!--        
        <link rel="shortcut icon" href="<?php echo base_url('images/vice/favicon.png'); ?>">


        <link href="<?php echo base_url('/assets/global/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/uniform/css/uniform.default.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'); ?>" rel="stylesheet" type="text/css"/>
         END GLOBAL MANDATORY STYLES 
         BEGIN PAGE LEVEL PLUGIN STYLES 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css'); ?>"/>

        <link href="<?php echo base_url('/assets/global/plugins/gritter/css/jquery.gritter.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/plugins/jqvmap/jqvmap/jqvmap.css'); ?>" rel="stylesheet" type="text/css"/>
         END PAGE LEVEL PLUGIN STYLES 
         BEGIN PAGE STYLES 
        <link href="<?php echo base_url('/assets/admin/pages/css/tasks.css'); ?>" rel="stylesheet" type="text/css"/>
         END PAGE STYLES 
         BEGIN THEME STYLES 
        <link href="<?php echo base_url('/assets/global/css/components.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/global/css/plugins.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/admin/layout/css/layout.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/assets/admin/layout/css/themes/darkblue.css'); ?>" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url('/assets/admin/layout/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
         END THEME STYLES 

        <link href="<?php echo base_url('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/assets/global/plugins/select2/select2.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('/assets/global/plugins/jquery-multi-select/css/multi-select.css'); ?>" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'); ?>"/>        
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/global/plugins/jquery-notific8/jquery.notific8.min.css'); ?>"/>



         BEGIN THEME STYLES UMB!! 
        <link href="<?php echo base_url('/css/style_umb.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('/css/font_google.css'); ?>" rel="stylesheet" type="text/css"/>-->
<!-- END THEME STYLES UMB!! -->

<script src='//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js'></script>
<!--<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>-->
<!--<script src="<?= base_url('js/jquery-ui.min.js') ?>" type="text/javascript"></script>-->
<script src="<?= base_url('js/dataTables.responsive.js') ?>" type="text/javascript"></script>
<link href="<?= base_url('css/dataTables.responsive.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('img/nygsoft.jpg'); ?>" rel="shortcut icon" type="image/x-icon">
<script src="<?= base_url('js/jquery.smartmenus.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('js/jquery.smartmenus.bootstrap.js') ?>" type="text/javascript"></script>

<script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>

<link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
<link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
<link href="<?= base_url('css/jquery.smartmenus.bootstrap.css') ?>" rel="stylesheet">
<!--<script src="<?= base_url('js/jquery.smartmenus.bootstrap.min.js') ?>" type="text/javascript"></script>-->
<link href="<?php echo base_url('/assets/global/css/components.css'); ?>" rel="stylesheet" type="text/css"/>

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

    <div class="modal fade" id="opcion" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true">
        <div id="remover" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div id="contenido" style="width: 100%">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cerrar" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <!--<button type="button" class="btn btn-primary">Send message</button>-->
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">

    <div class="row" style="">
        <div class="col-md-8 col-lg-8 col-sm-8 col-sx-8"><p class="text-muted">Copyright © <?php echo date("Y"); ?> texto - Nygsoft.com</p></div>
        <div class="col-md-4 col-lg-4 col-sm-4 col-sx-4" align="center"><img src="<?php echo base_url('img/nygsoft.jpg'); ?>" style="width: 70px"></div>
    </div>    

</footer>
<style>
    .obligado{
        background-color: rgb(250, 255, 189);
    }
</style>
<script>
    function obligatorio(clase) {
        var i = 0;
        $('.obligatorio').each(function (key, val) {
            if ($(this).val() == "") {
                i++
                $(this).addClass('obligado');
            } else {
                $(this).removeClass('obligado');
            }
        });
        if (i > 0) {
            alert('Faltan campos por llenar');
            return false;
        } else {
            return true;
        }
//        return i;
    }

    $('body').delegate('.opcion', 'click', function () {

//        var accion = $(this).attr('data-accion');
//
//        switch (accion) {
//            case 'pagina':
//                var texto = "<?php echo base_url('index.php/informacion/fosyga'); ?>";
//                var url = $(this).attr('data-url');
//                $('.modal-dialog').removeClass().addClass('modal-full')
//                break;
//            case 'nuevo_form':
//                var texto = "<?php echo base_url('index.php/administracion/nuevo_formulario'); ?>";
//                $('.modal-dialog').removeClass().addClass('modal-lg');
//                var url = $(this).attr('data-formulario');
//                $('#exampleModalLabel').html('Nuevo Formulario')
//                break;
//        }
////        $('#contenido').load(texto,{url2:url});
//        $.post(texto, {url2: url})
//                .done(function (msg) {
//                    $('#contenido').html(msg);
//                    $('.modal-backdrop').css('z-index', '-1')
//                })
                    $('.modal-backdrop').css('z-index', '-1')
    });



</script>   