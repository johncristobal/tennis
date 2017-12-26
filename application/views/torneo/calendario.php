<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("header");
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

            <h3 class="title">Torneos</h3>
            <?php $mesesN = array("January"=>"Enero","February"=>"Febrero","March"=>"Marzo","April"=>"Abril","May"=>"Mayo","June"=>"Junio","July"=>"Julio","August"=>"Agosto","September"=>"Septiembre","October"=>"Octubre","November"=>"Noviembre","December"=>"Diciembre");?>
            
           <?php            
           if(count($datos) == 0){
           ?>
            <div class="container">
            <div class="modal-header">
                <h4 class="modal-title">No se encontraron registros de torneos</h4>
            </div>
            <div class="modal-body">
                <h5>¿Desea crear un nuevo torneo?</h5>
            </div>
            <div class="modal-footer centered">
                <a href="<?php echo base_url();?>torneos/registrotorneo" type="button" class="btn btn-info btn-lg" data-dismiss="modal">Sí</a>
                <a href="" type="button" class="btn btn-default btn-lg" data-dismiss="modal">No</a>
            </div>
            </div>
            
           <?php
           }
           else
           {
           foreach ($datos as $row) { 
            ?>
                                       
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$row->id;?>">
                  <!--Mes Año-->
                  Inicio: <?php date_default_timezone_set('America/Mexico_City'); setlocale(LC_ALL,"es_ES"); $nameing = date("F", strtotime($row->fecha_inicio)); echo $mesesN[$nameing];?>
                </a>
              </h4>
            </div>
              
            <div id="collapse<?=$row->id;?>" class="panel-collapse collapse in">
                
              <div class="panel-body"><!--Colocar datos importantes del torneo-->                  
                <!--Repeat this section to get info about tournaments-->
                <section class="row">
                <div class="col-md-3">
                    <a href="<?php echo base_url();?>torneos/resultados/<?=$row->id;?>"><h4 class="title-green"><?=$row->nombre;?></h4></a>
                    <p><?=$row->lugar;?></p>
                    <strong><?php echo $row->fecha_inicio;?></strong>
                </div>
                  
                <div class="col-md-3">
                    <h4>&nbsp;</h4>
                    <strong><?=$row->descripcion;?></strong>
                    <p>&nbsp;</p>
                </div>
                    
                <!--div class="col-md-3">
                    <h4>&nbsp;</h4>
                    <p><?=$row->tipo_campo;?></p>
                    <strong>&nbsp;</strong>
                </div-->
                </section>
                <hr>
                  
              </div>
            </div>
          </div>
           <?php            
                }  
            }
           ?>
		              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
