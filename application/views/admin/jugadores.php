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

                <div class="col-md-2">
                    Id
                </div>
                <div class="col-md-4">
                    Nombre
                </div>
                <div class="col-md-3">
                    Editar
                </div>
                <div class="col-md-3">
                    Eliminar
                </div>


            </div><!-- End row -->

            <?php
           foreach ($datos as $row) { 
            ?>
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-2">
                        <?=$row->id?>
                    </div>
                    <div class="col-md-4">
                    <?=$row->nombre?>
                    </div>
                    <div class="col-md-3">
                        <button onclick="editPlayer(<?=$row->id?>)"> </button>
                    </div>
                    <div class="col-md-3">
                        Eliminar
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
         alert(id);
         window.location.href = "<?php base_url()?>editar_jugaador/"+id;
     }
     
 </script>
<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
