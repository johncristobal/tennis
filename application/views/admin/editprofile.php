<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<?php 
		$this->load->view("head");
		$this->load->view("headeradmin");
?>
        
    <form method="post" action="<?php echo base_url()?>admin/update_player" id="uploadimage" enctype="multipart/form-data">
        <div class="container">
                    
            <h3>Actualizar información</h3>
            <input type="hidden" name="id" value="<?=$datos->id?>">
             <div class="row">
                <div class="col-md-6">
                   <p>
                        <div class="form-group">
                        <label>Nombre completo:</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('nombre'); ?>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos->nombre;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                   </p>
                    <p>
                        <div class="form-group">
                        <label>Edad:</label>  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('edad'); ?>
                        <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $datos->edad;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Altura:</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('altura'); ?>
                        <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $datos->altura;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Fecha de nacimiento:</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('fecha_nac'); ?>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $datos->fecha_nac;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Plays:</label> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('plays'); ?>
                        <input type="text" class="form-control" id="plays" name="plays" value="<?php echo $datos->plays;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Estatus:</label> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('estatus'); ?>
                        <select class="form-control" id="estatus" name="estatus" style="background-color: #fff; border: 1px solid #00aeef;">
                            <option value="1" <?php if($datos->estatus == 1){echo "selected";}?>>Activo</option>
                            <option value="2" <?php if($datos->estatus == 2){echo "selected";}?>>Lesionado</option>
                            <option value="3" <?php if($datos->estatus == 3){echo "selected";}?>>No activo</option>
                            <option value="4" <?php if($datos->estatus == 4){echo "selected";}?>>Jugador de la semana</option>
                        </select>
                        </div>
                    </p>
                    <br>
                    <!--select>
                        
                    </select-->
                </div>
                 <div class="col-md-6">                    
                    <p>
                        <div class="form-group">
                        <label>Drive:</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('Drive'); ?>
                        <input type="text" class="form-control" id="Drive" name="Drive" value="<?php echo $datos->Drive;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Reves:</label> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('Reves'); ?>
                        <input type="text" class="form-control" id="Reves" name="Reves" value="<?php echo $datos->Reves;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Servicio:</label>  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('Servicio'); ?>
                        <input type="text" class="form-control" id="Servicio" name="Servicio" value="<?php echo $datos->Servicio;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Velocidad:</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('Velocidad'); ?>
                        <input type="text" class="form-control" id="Velocidad" name="Velocidad" value="<?php echo $datos->Velocidad;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Mentalidad:</label>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo form_error('Mentalidad'); ?>
                        <input type="text" class="form-control" id="Mentalidad" name="Mentalidad" value="<?php echo $datos->Mentalidad;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                </div>
                </div><!-- End row -->

                <!--Validar si existe su imagen, si no poner la default y habilitar para actualizar-->
                <div class="row">                    
                    <h4 align="center"><i class="fa fa-angle-right"></i>Imagenes</h4>
                    <br>
                    <p class="col-md-6 text-center centered">                       
                        <img id="previewing" <?php if($datos->foto == "1"){ ?>
                            src="<?php echo base_url();?>img/jugadores/<?=$datos->id?>/perfil.jpg"
                                <?php }else { ?> 
                            src="<?php echo base_url();?>img/profile.jpg"
                                <?php } ?>
                            alt="" class="img-circle style img-responsive" style="">
                        <br />
                        <input type="file" name="foto" id="foto" value="0"/>

                    </p>
                    <p class="col-md-6 text-center centered">
                        <br><br>
                        <img id="previewingrank" <?php if($datos->foto == "1"){ ?>
                            src="<?php echo base_url();?>img/jugadores/<?=$datos->id?>/h2h.png"
                                <?php }else{ ?>                             
                            src="<?php echo base_url();?>img/blog-1.jpg"
                                <?php } ?>
                            alt="" class="style img-responsive" style="box-shadow: 0px 0px 0px 10px #e8e8e8;">
                        <br />
                        <input type="file" name="foto_rank" id="foto_rank" value="0"/>                        
                    </p>
                </div>
                                
               <!-- <div class="row add_top_30">
                
                	<div class="col-md-4">
                    	<h4><i class="icon-trophy" style="color:#a3d39c;"></i> Títulos/Finales</h4>
                        <p>Qui at commune signiferumque. In mel labores moderatius, tantas saperet facilisi quo ut. Vero wisi civibus ea vim. An tota nostro sit, mel ei utinam ancillae, mutat dolores mea et. Homero iriure imperdiet eu mel. Ei enim viderer pri.</p>
                        <p><a data-toggle="modal" href="#myModal" class="button_small add_bottom_15">Ver más</a></p>
                    </div>
                    
                    <div class="col-md-4">
                    	<h4><i class="icon-bolt" style="color:#a3d39c;"></i> Partidos Ganados/Perdidos</h4>
                        <p>Qui at commune signiferumque. In mel labores moderatius, tantas saperet facilisi quo ut. Vero wisi civibus ea vim. An tota nostro sit, mel ei utinam ancillae, mutat dolores mea et. Homero iriure imperdiet eu mel. Ei enim viderer pri.</p>
                        <p><a href="#" class="button_small add_bottom_15">Ver más</a></p>
                    </div>
                    
                    <div class="col-md-4">
                    	<h4><i class="icon-star" style="color:#a3d39c;"></i> Actividad</h4>
                        <p>Qui at commune signiferumque. In mel labores moderatius, tantas saperet facilisi quo ut. Vero wisi civibus ea vim. An tota nostro sit, mel ei utinam ancillae, mutat dolores mea et. Homero iriure imperdiet eu mel. Ei enim viderer pri.</p>
                        <p><a href="#" class="button_small add_bottom_15">Ver más</a></p>
                    </div> -->
                    
                </div><!-- End row -->

            <div class="container">
            <div class="modal-footer centered">
                <input type="submit" class="btn btn-info btn-lg" data-dismiss="modal" value="Actualizar información"/>                
            </div>
            </div>
                
                </form>
        <!-- End container -->
		
<script type="text/javascript">
    /*window.onload = function () {
        var fileupload = document.getElementById("FileUpload1");
        var filePath = document.getElementById("spnFilePath");
        var image = document.getElementById("imgFileUpload");
        image.onclick = function () {
            fileupload.click();
        };
        fileupload.onchange = function () {
            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
            filePath.innerHTML = "<b>Selected File: </b>" + fileName;
        };
    };*/
    
    $(document).ready(function (e) {
        /*$("#uploadimage").on('submit',(function(e) {
            e.preventDefault();
            $("#message").empty();
            $('#loading').show();
            $.ajax({
                url: "<?php echo base_url()?>admin/update_player", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data)   // A function to be called if request succeeds
                {
                    $('#loading').hide();
                    $("#message").html(data);
                    window.location.href = "<?php echo base_url();?>admin/jugadores";                    
                }
            });
        }));*/
        
        $(function() {
            $("#foto_rank").change(function() {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','<?php echo base_url();?>img/profile.jpg');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoadedRank;
                    reader.readAsDataURL(this.files[0]);
                }
            });           
        });

        // Function to preview image after validation
        $(function() {
            $("#foto").change(function() {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','<?php echo base_url();?>img/profile.jpg');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });           
        });
        
        function imageIsLoaded(e) {
            $("#foto").css("color","green");
            $('#image_preview').css("display", "none");
            $('#previewing').attr('src', e.target.result);
            //$('#previewing').attr('width', '250px');
            //$('#previewing').attr('height', '230px');
        };
        
        function imageIsLoadedRank(e) {
            $("#foto_rank").css("color","green");
            //$('#image_preview').css("display", "none");
            $('#previewingrank').attr('src', e.target.result);
            //$('#previewing').attr('width', '250px');
            //$('#previewing').attr('height', '230px');
        };

    });
</script>                
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 
          
          
</body>
</html>