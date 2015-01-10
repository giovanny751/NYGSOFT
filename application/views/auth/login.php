<head>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<style>
    .container{
        margin-top: 17%;
    }
    .row{
        margin-top: 1%;
    }
</style>
<div class="container">
    <form method="post" action="<?= base_url('index.php/auth/login') ?>">

        <div class="row formulario">
            <div class="row grayBoxFrom">
                <div class="row-fluid control" align='left'>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 col-sx-offset-4 contCentral">
                        <label>Correo</label><input type="text" id="identity" name="identity" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 col-sx-offset-4 contCentral">
                        <label>Contraseña</label><input type="password" id="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="row-fluid control" align='center'>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 col-sx-offset-4 contCentral" align="right">
                        <input type="submit" value="Ingresar" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>
        
    </form>  
</div>
