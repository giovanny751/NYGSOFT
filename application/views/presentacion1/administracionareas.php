<head>
    <script src="<?= base_url('js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('js/bootstrap.js') ?>" type="text/javascript"></script>
    <link href="<?= base_url('css/bootstrap.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<div class="container">
    <div class="row" align="center">
        CREACION DE AREAS
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <label>Nombre Area</label><input type="text" class="form-control" id="area" name="area">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <button type="button" class="btn btn-success" id="guardararea">Guardar</button>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <label>Area</label>
            <select class="form-control" id="areascreadas">
                <?php foreach($cargos as $cargo){ ?>
                    <option values="<?php echo $cargo['are_id'] ?>"><?php echo $cargo['are_area'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <label>Cargo</label><input type="text" class="form-control" id="cargo" name="cargo">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <button type="button" class="btn btn-success" id="guardarcargo">Guardar</button>
        </div>
    </div>
</div>
<script>

$('#guardararea').click(function(){ 
    
    var area = $('#area').val();
    
    var url = "<?php echo base_url('index.php/presentacion/guardararea'); ?>";
    
    $.post(url,{area:area},function(data){
        
        $('#areascreadas *').remove();
        
        var areas ='';
        
        $.each(data,function(key,val){
            areas += "<option values='"+val.are_id+"'>"+val.are_area+"</option>";
        });
        
        $('#areascreadas').append(areas);
    });
    
});
$('#guardarcargo').click(function(){    
    
    var area = $('#areascreadas').val();    
    var cargo = $('#cargo').val();
    
    var url = "<?php echo base_url('index.php/presentacion/guardarcargo'); ?>";
    $.post(url,{area:area,cargo:cargo},function(data){
        
        
        
    });
});

</script>