<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<?php 
		$this->load->view("head");
		$this->load->view("headeradmin");
?>
        
    <form method="post" action="<?php echo base_url()?>admin/update_player">
        <div class="container">
                    
            <h3>Actualizar información</h3>
            <input type="hidden" name="id" value="<?=$datos->id?>">
             <div class="row">
                <div class="col-md-6">
                   <p>
                        <div class="form-group">
                        <label>Nombre completo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos->nombre;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                   </p>
                    <p>
                        <div class="form-group">
                        <label>Edad:</label>
                        <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $datos->edad;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Altura:</label>
                        <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $datos->altura;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $datos->fecha_nac;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Plays:</label>
                        <input type="text" class="form-control" id="plays" name="plays" value="<?php echo $datos->plays;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                </div>
                 <div class="col-md-6">                    
                    <p>
                        <div class="form-group">
                        <label>Drive:</label>
                        <input type="text" class="form-control" id="Drive" name="Drive" value="<?php echo $datos->Drive;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Reves:</label>
                        <input type="text" class="form-control" id="Reves" name="Reves" value="<?php echo $datos->Reves;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Servicio:</label>
                        <input type="text" class="form-control" id="Servicio" name="Servicio" value="<?php echo $datos->Servicio;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Velocidad:</label>
                        <input type="text" class="form-control" id="Velocidad" name="Velocidad" value="<?php echo $datos->Velocidad;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                    <p>
                        <div class="form-group">
                        <label>Mentalidad:</label>
                        <input type="text" class="form-control" id="Mentalidad" name="Mentalidad" value="<?php echo $datos->Mentalidad;?>" style="background-color: #fff; border: 1px solid #00aeef;">
                        </div>
                    </p>
                </div>
                </div><!-- End row -->

                <!--Validar si existe su imagen, si no poner la default y habilitar para actualizar-->
                <div class="row">                    
                    <h4 align="center"><i class="fa fa-angle-right"></i>Imagenes</h4>
                    <br>
                    <?php
                        if($datos->foto == "1"){
                    ?>
                    <p class="col-md-6 text-center">                       
                        <img src="<?php echo base_url();?>img/jugadores/<?=$datos->id?>/perfil.jpg" alt="" class="img-circle style img-responsive" style="">
                    </p>
                    <p class="col-md-6 text-center">
                        <img src="<?php echo base_url();?>img/jugadores/<?=$datos->id?>/h2h.png" alt="" class="style img-responsive" style="box-shadow: 0px 0px 0px 10px #e8e8e8;">
                    </p>
                    <?php
                        }else{
                    ?>
                    <p class="col-md-6 text-center">
                        <img src="<?php echo base_url();?>img/profile.jpg" alt="" class="img-circle style img-responsive">
                    </p>
                    <p class="col-md-6 text-center">                       
                        <img src="<?php echo base_url();?>img/blog-1.jpg" alt="" class="style img-responsive" style="box-shadow: 0px 0px 0px 10px #e8e8e8;">
                    </p>    
                    <?php
                        }
                    ?>                    
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
                <img id="imgFileUpload" alt="Select File" title="Select File" src="orange.png" style="cursor: pointer" />
<br />
<span id="spnFilePath"></span>
<input type="file" id="FileUpload1" style="display: none" />
<script type="text/javascript">
    window.onload = function () {
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
    };
</script>
            <div class="container">
            <div class="modal-footer centered">
                <input type="submit" class="btn btn-info btn-lg" data-dismiss="modal" value="Actualizar información"/>                
            </div>
            </div>
                
                </form>
        <!-- End container -->
		
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 
          
          
</body>
</html>