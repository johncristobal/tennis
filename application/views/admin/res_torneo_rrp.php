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

            <h3 class="title">Crear torneo: <?=$this->session->userdata('nombre');?></h3>
                 
            <!--form name="creaRound" method="post" action="<?php echo base_url();?>Torneos/generaRoundRobin">
		<input type="text" name="no_jugadores" value="" placeholder="Número de Jugadores">
		<button>Enviar</button>
            </form-->              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nombre del torneo: <?=$this->session->userdata('nombre');?></label>                    
                    <br>
                    <label>Fecha de inicio: <?=$this->session->userdata('fecha');?></label>                    
                </div>
            </div>      
                <div class="col-md-4">
                <div class="form-group">
                    <label>Lugar: <?=$this->session->userdata('lugar');?></label>                    
                    <br>
                    <label>Torneo: <?=$this->session->userdata('tipo_torneo');?></label>                    
                </div>
            </div> 
        </div>
        <div class="row"><br></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <!--<form name="creaRound" method="post" action="<?php echo base_url();?>torneos/creartorneo">  -->                  
                    <div class="input-group">
                        <input type="text" class="form-control" name="no_jugadores" disabled="true" value="Número de jugadores: <?=$total;?>" placeholder="Número de Jugadores" style="background-color: #fff; border: 1px solid #00aeef;">
                      <div class="input-group-btn">
                        <button class="btn btn-default" onclick="location.reload();">
                          <i class="glyphicon glyphicon-repeat"></i>
                          Volver a generar
                        </button>
                      </div>
                    </div>
                <!--</form>-->
            </div>
            </div>

            <div class="col-md-4"></div>
        </div>               
    </div>

    <form method="post" action="<?php echo base_url();?>admin/savetorneo">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <br>
                <h3>Partidos generados:</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <br>

                <table class="table-condensed centered" width="100%">
                    <thead>
                        <tr style="text-align: center;">
                            <th width="30%"><h4>Jugador 1</h4></th>
                            <th width="15%"><h4>vs</h4></th>
                            <th width="30%"><h4>Jugador 2</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for ($i=0;$i<$total-1;$i++){
                        ?>
                                <tr class="success" style="background-color: #00aeef; color: #fff;">
                                    <td width="30%"><h6>Ronda <?=$i+1;?></h6></td>
                                    <td width="15%">&nbsp;</td>
                                    <td width="30%">&nbsp;</td>
                                </tr>
                        <?php
                                for($j=0;$j<($total/2);$j++){                            
                        ?>
                                    <tr>
                                        <td width="30%"><?=$calendario[$i][$j];?></td>
                                        <td width="15%" style="text-align: center;"></td>
                                        <td width="30%"><?=$calendario[$i][$total-1-$j];?></td>
                                    </tr>
                        <?php
                                }
                        ?>
                                    <tr><td><br></td></tr>    
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!--Modal -->
    <div class="container">
        <!-- Modal -->
        <div class="col-sm-2"></div>
        <div class="col-sm-8 centered" style="text-align:center;">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#confirmar">Crear torneo</button>
        
        <div class="modal fade" id="confirmar" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <!--div class="modal-header">
              </div-->
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¿Desea guardar los partidos para este torneo?</h4>
              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-info btn-lg" value="Si"></a>
                  <a href="#shownext" type="button" class="btn btn-default btn-lg" data-dismiss="modal">No</a>
              </div>
            </div>

          </div>
        </div>
        </div>
        <div class="col-sm-2"></div>

    </div>
    </form>
        <br>
    <br>
    <br>
    <br>
    <br>

<?php 
//$this->load->view("footer");
?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
