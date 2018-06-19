<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("headeradmin");
?>            
    <div class="container">
        
    <!--div id="sub-head">
            <div class="flyIn">
                <h2>Javascript components</h2>
                <p> Est omnis nulla ut, ius clita virtute persecuti at, id ipsum inermis aliquando. Ne iracundia omittantur has, at invidunt invenire nec.</p>
            </div>
    </div>
    
    <h3 class="title">Torneos</h3>
    <section class="row">
    <div class="col-md-12">
     <!--h4>Accordion</h4-->
    
        <div class="panel-group add_bottom_30" id="accordion">

            <h3 class="title">Jugadores</h3>
            <?php $mesesN = array("January"=>"Enero","February"=>"Febrero","March"=>"Marzo","April"=>"Abril","May"=>"Mayo","June"=>"Junio","July"=>"Julio","August"=>"Agosto","September"=>"Septiembre","October"=>"Octubre","November"=>"Noviembre","December"=>"Diciembre");?>
            
           <?php            
           if(count($datos) == 0){
           ?>
            <div class="container">
            <div class="modal-header">
                <h4 class="modal-title">No se encontraron jugadores registrados</h4>
            </div>
            <div class="modal-body">
                <h5>¿Desea registrar un nuevo jugador?</h5>
            </div>
            <div class="modal-footer centered">
                <a href="<?php echo base_url();?>admin/registrotorneo" type="button" class="btn btn-info btn-lg" data-dismiss="modal">Sí</a>
                <a href="" type="button" class="btn btn-default btn-lg" data-dismiss="modal">No</a>
            </div>
            </div>
            
           <?php
           }
           else
           {
            ?>
            <div class="row">

                <div class="col-md-1">
                    Id
                </div>
                <div class="col-md-3">
                    Nombre
                </div>
                <div class="col-md-3">
                    Estatus
                </div>
                <div class="col-md-1">
                    Editar
                </div>
                <div class="col-md-1">
                    Eliminar
                </div>


            </div><!-- End row -->

            <?php
           foreach ($datos as $row) { 
            ?>
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-1">
                        <?=$row->id?>
                    </div>
                    <div class="col-md-3">
                    <?=$row->nombre?>
                    </div>
                    <div class="col-md-3">
                    <?=$row->descripcion?>
                    </div>
                    <div class="col-md-1">
                        <img src="<?php echo base_url()?>img/baseline_build_black_18dp.png" onclick="editPlayer(<?=$row->id?>)">
                    </div>
                    <div class="col-md-1">
                        <img src="<?php echo base_url()?>img/baseline_delete_black_18dp.png" onclick="deletePlayer(<?=$row->id?>)">
                    </div>
                </div><!-- End row -->
            </div> <!-- End container -->
          
           <?php            
                }  
            ?>
            <div class="container">
            <div class="modal-header">
                <!--h4 class="modal-title">No se encontraron registros de torneos</h4-->
            </div>
            <div class="modal-body">
                <h5>¿Desea registrar nuevo jugador?</h5>
            </div>
            <div class="modal-footer centered">
                <a href="<?php echo base_url();?>admin/registro_jugador" type="button" class="btn btn-info btn-lg" data-dismiss="modal">Clic aquí</a>                
            </div>
            </div>
            <?php
            }
           ?>
		              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  
 <script type="text/javascript">
     
     function editPlayer(id){
         //alert(id);
         window.location.href = "<?php base_url()?>editar_jugaador/"+id;
     }

     function deletePlayer(id){
        var a = alert("¿Seguro que deshabilitar al jugador?");
        if(a){
            //eliminar - solo poner estatus en 3
        }else{
            //no hago nada :) 
        }
     }

 </script>
<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
