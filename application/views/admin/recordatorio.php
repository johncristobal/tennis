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

            <h3 class="title">Próximos encuentros</h3>
            <?php $mesesN = array("January"=>"Enero","February"=>"Febrero","March"=>"Marzo","April"=>"Abril","May"=>"Mayo","June"=>"Junio","July"=>"Julio","August"=>"Agosto","September"=>"Septiembre","October"=>"Octubre","November"=>"Noviembre","December"=>"Diciembre");?>
            <div class="row">
                <div class="col-md-12" style="text-align: right">
                    <select class="selectpicker" style="height: 30px;" id="fechapartido">
                        <option>Selecciona una fecha...</option>
                        <?php 
                            foreach ($fechas as $value) 
                            {
                        ?>
                            <option><?= $value['fecha'] ?></option>                          
                        <?php                        
                            }
                        ?>

                      </select>
                    <button type="button" class="btn btn-info" onclick="buscarPartidos();">
                        <span class="glyphicon glyphicon-search"></span> Buscar partidos
                    </button>
                </div>
            </div>
            <div class="row">
                <br>
            </div>
            <?php            
                if(($datos) == null){
            ?>
                <div class="container">
                <div class="modal-header">
                    <h4 class="modal-title">No hay partidos próximos</h4>
                </div>
                <!--div class="modal-body">
                    <h5>¿Desea crear un nuevo torneo?</h5>
                </div>
                <div class="modal-footer centered">
                    <a href="<?php echo base_url();?>admin/registrotorneo" type="button" class="btn btn-info btn-lg" data-dismiss="modal">Sí</a>
                    <a href="" type="button" class="btn btn-default btn-lg" data-dismiss="modal">No</a>
                </div-->
                </div>
           <?php
                }
                else
                {
            ?>
            <form id="form" method="post" action="<?php echo base_url()?>admin/sendMailsRememberGames">
                <div class="container no-padding">
                    
                <div class="row centered">
                <div class="col-md-1">
                    <div class="form-check">
                        <input style="display:block;" class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="blankCheckbox" value="" aria-label="...">
                    </div>
                </div>
                    <div class="col-md-2 col-xs-12">
                        Jugador 1
                    </div>
                    <!--div class="col-md-1 hidden-xs no-padding">
                        VS
                    </div-->
                    <div class="col-md-2 col-xs-12">
                        Jugador 2
                    </div>
                    <div class="col-md-2 col-xs-5">
                        Fecha
                    </div>
                    <div class="col-md-1 col-xs-5">
                        Lugar
                    </div>
                    <div class="col-md-2 col-xs-5">
                        Estatus J1
                    </div>
                    <div class="col-md-2 col-xs-5">
                        Estatus J2
                    </div>
                </div>
                <?php               
                    foreach ($datos as $row) {                 
                ?>
                <div class="row centered no-padding">
                <div class="col-md-1">
                    <div class="form-check">
                      <input style="display:block;" class="form-check-input position-static" type="checkbox" name="<?=$row['id']?>" value="<?=$row['id']?>" aria-label="">
                    </div>
                </div>
                <div class="col-md-2">
                        <?=$row['nombre1']?>
                    </div>
                    <!--div class="col-md-1 no-padding">
                        &nbsp;
                    </div-->
                    <div class="col-md-2">
                        <?=$row['nombre2']?>
                    </div>
                    <div class="col-md-2">
                        <?=$row['fecha']?>
                    </div>
                    <div class="col-md-1">
                        Deportivo Izcalli
                    </div>
                    <div class="col-md-2">
                        <?=$row['estatus1']?>
                    </div>
                    <div class="col-md-2">
                        <?=$row['estatus2']?>
                    </div>  
                </div>
                
           <?php            
                }  
            ?>
                    
                    
            </div>
                <div class="row">
                    <br>
                </div>     
            <div class="row">                
                
            <!-- Modal -->
            <div class="col-sm-4"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-6 right" style="text-align:right;">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmar">Enviar recordatorios</button>

            <div class="modal fade" id="confirmar" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <!--div class="modal-header">
                  </div-->
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">¿Se enviarán correos a los usuarios seleccionados?</h5>
                  </div>
                  <div class="modal-footer">
                      <input type="submit" id="enviar"  class="btn btn-info btn-lg" value="Si adelante">
                      <!--a href="" type="button" class="btn btn-info btn-lg" data-dismiss="modal">Sí</a-->
                      <a href="" type="button" class="btn btn-default btn-lg" data-dismiss="modal">No, verificaré</a>
                  </div>
                </div>
              </div>
            </div>
            </div>

            </div>       

            </form>
            <?php
            }
           ?>
		              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
    <script type="text/javascript">
    $('#blankCheckbox').change(function() {
        
        var c = this.checked;
        $(':checkbox').prop('checked',c);
        //var checkboxes = $(this).closest('form').find(':checkbox');
            //checkboxes.prop('checked', $(this).is(':checked'));
    });
    
    function buscarPartidos(){
        var fecha = document.getElementById("fechapartido").value;
        //alert(fecha);
        $.ajax({
            method: "POST",
            url:"<?php echo base_url()?>Admin/saveTemporalFecha",
            data: { fecha : fecha }
        })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            window.location.href='<?php echo base_url()?>Admin/rememberMailFecha';
        });

        
    }
    </script>
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
