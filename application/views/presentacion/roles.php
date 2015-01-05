    <div class="row" align="center">
        <h3>ADMINISTRACION DE ROLES</h3>
    </div>
    <div class="row">
        <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-info opciones">Nuevo Rol</button>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Opciones</th>
                </thead>
                <tbody id="cuerporol">
                    <?php foreach($roles as $datos){?>
                    <tr>
                        <td><?php echo $datos['rol_nombre']; ?></td>
                        <td><?php echo $datos['rol_estado']; ?></td>
                        <td><button type="button" rol="<?php echo $datos['rol_id']; ?>" class="btn btn-info">Opciones</button></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>    
    </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificacion</h4>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                <div class=" marginV20">
                    <div class="widgetTitle">
                        <h5><i class="glyphicon glyphicon-pencil"></i> Nuevo</h5>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
                                <label>Nombre</label><input type="text" id="nombre" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
            <div class="modal-footer">
                <div class="row marginV10">
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 col-md-offset-8 col-lg-offset-8 col-sm-offset-8 col-sx-offset-8 margenlogo' align='center' >
                        <button type="button" class="btn btn-primary guardar">Guardar</button>
                    </div>
                    <div class='col-md-2 col-lg-2 col-sm-2 col-sx-2 margenlogo' align='center' >
                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

<script>
//------------------------------------------------------------------------------
//                      NUEVO ROL    
//------------------------------------------------------------------------------    
    $('body').delegate('.guardar','click',function(){
        
        var nombre = $('#nombre').val();
        var url = "<?php echo base_url('index.php/presentacion/guardarroles'); ?>";
        $.post(url,{nombre:nombre},function(data){
            $('#myModal').modal('hide');
            
            var filas = "";
            $.each(data,function(key,val){
                                
                filas += "<tr>";
                filas += "<td>"+val.rol_nombre+"</td>";
                filas += "<td>"+val.rol_estado+"</td>";
                filas += "<td><button type='button' rol='"+val.rol_id+"' class='btn btn-info'>Opciones</button></td>";
                filas += "</tr>";
            });
            
            $('#cuerporol *').remove();
            $('#cuerporol').append(filas);
            
            $('#nombre').val('');
            
        });
        
    });
    
    
</script>