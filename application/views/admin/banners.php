<!DOCTYPE html>

<?php 
    $this->load->view("head");
    $this->load->view("headeradmin");
?>
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Expires" content="-1">
        
    <form method="post" action="<?php echo base_url()?>admin/updateBanners" id="uploadimage" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3>Actualizar banners</h3>
                </div>
                <div class="col-md-8 col-sm-8">
                    <p>
                        Puedes actualizar un banner existente o eliminarlo de la lista. 
                    </p>
                </div>
                <!--div class="col-md-8 col-sm-8 align-right" style="text-align:right;">
                    <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Subir nuevo banner</button>
                </div-->
            </div>

            <!--Modal to upload banner banner-->
            <div class="row">
                <div class="col-sm-8 col -md-8">
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Agregar nuevo banner</h4>
                      </div>
                      <div class="modal-body">
                        <p class="col-md-12 col-xs-12 col-sm-12 text-center centered">                       
                            <input type="file" name="foto9999" id="foto9999" value="0" onchange="validar(this,9999);"/>
                            <br />
                            <img id="previewing9999" src="<?php echo base_url();?>img/slider/slide.jpg" alt="" class="style img-responsive" style="">
                            <br>
                            <hr style="border-width:2px;">
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-info savebanner" id="subirnuevomodal" value="Subir"/>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>

            <!--Modal to delete banner-->
            <div class="row">
                <div class="col-sm-8 col -md-8">
                <!-- Modal -->
                <div id="modalborrar" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Eliminar banner</h4>
                      </div>
                      <div class="modal-body">
                        <p class="col-md-12 col-xs-12 col-sm-12 text-center centered">                       
                            ¿Deseas eliminar esta banner?
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-info savebanner" id="eliminarbanner" value="Eliminar"/>Eliminar</a>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            
            <?php
                $indice = 1;
                foreach($banners as $file){
            ?>                
            <!--Validar si existe su imagen, si no poner la default y habilitar para actualizar-->
            <div class="row">                    
                <p class="col-md-6 col-xs-6 text-center centered">       
                    <input type="file" value="Actualizar banner" name="foto<?=$indice?>" id="foto<?=$indice?>" onchange="validar(this,<?=$indice?>);"/>
                </p>
                <p class="col-md-6 col-xs-6 text-right right">       
                    <a class="btn btn-danger" onclick="eliminar(<?=$indice?>);">Eliminar banner</a>                    
                </p>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center centered">
                <img id="previewing<?=$indice?>" src="<?php echo base_url();?><?=$urlfolder?>/<?=$file?>" alt="" class="style img-responsive" style="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center centered">
                    <hr>
                    <br><br>
                </div>
            </div>
            <?php 
                $indice++;
                }
            ?>
                                
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
    
    /*$("#uploadimage").on('submit',(function(e) {
        e.preventDefault();
        //$("#message").empty();
        //$('#loading').show();
        $.ajax({
            url: "<?php echo base_url()?>admin/uploadNewBanners", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $('#loading').hide();
                $("#message").html(data);
            }
        });
    }));*/
            
    var indiceChange = "";
    var ideliminado = "";

    $('#eliminarbanner').click(function(){
        $.ajax
        ({
            url: '<?php echo base_url()?>admin/deletebanner/'+ideliminado,
            type: 'post',
            cache: false,
            contentType: false,
            processData: false,
            success: function(result)
            {
                //alert(result);
                location.reload(true);
            }
        });
    });
    
    function eliminar(indice){
        //del elemento seleccionadosubo y actualizo foto del respectivo indice
        //alert(elemento);
        ideliminado = indice;
        //$("#message").empty(); // To remove the previous error message
        $('#modalborrar').modal('toggle');
    }
    
    function validar(elemento,indice){
        //del elemento seleccionadosubo y actualizo foto del respectivo indice
        //alert(elemento);
        indiceChange = indice;
        //$("#message").empty(); // To remove the previous error message
        var file = elemento.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
        {
            $('#previewing'+indice).attr('src','<?php echo base_url();?>img/profile.jpg');
            //$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
            return false;
        }
        else
        {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(elemento.files[0]);
        }
    }
    
    function imageIsLoaded(e) {
        $("#foto"+indiceChange).css("color","green");
        //$('#image_preview').css("display", "none");
        $('#previewing'+indiceChange).attr('src', e.target.result);
        //$('#previewing').attr('width', '250px');
        //$('#previewing').attr('height', '230px');
    };
    

</script>                
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 
          
          
</body>
</html>