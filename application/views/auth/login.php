<head>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('css/estilos.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<style>
    .container{
        margin-top: 5%;
    }
    .row{
        margin-top: 1%;
    }
    section { 
	background: url('<?php echo base_url('img/nygsoft.jpg'); ?>') no-repeat fixed center; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
    }
</style>
<section>
    <div class="row" >
        <?php 
    if ($message) {
                ?>
                <div class="container" >
                    <div class="alert alert-<?php echo $message_type; ?>">
                        <?php echo $message; ?>
                    </div>
                </div>
                <?php
            }
    ?>
        <form method="post" action="<?= base_url('index.php/auth/login') ?>">
            <div class="col-md-6 col-lg-6 col-sm-6 col-sx-6 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 col-sx-offset-3 contCentral">
                <div class="row formulario">
<!--                    <div class="row logosIndex" align='center'>
                        <img src="<?php echo base_url('img/nygsoft.jpg'); ?>" style="width: 200px" alt="NYGSOFT"/>
                    </div>-->
                    <div class="row grayBoxFrom" >
                        <div class="row-fluid control" align='left'>
                            <label>Correo</label><input type="text" id="identity" name="identity" class="form-control">                        
                            <label>Contraseña</label><input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="row-fluid control" align='center'>
                            <br><input type="submit"  class="btn btn-primary btn-lg" value="Ingresar" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
        </form>    
    </div>
</section>
