<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->
						<?php 
								
								if($llaves){
									echo $llaves;
								}
						?>    
<?php   
    $this->load->view("head");
		
    $this->load->view("headeradmin");
?>    
    
	 <link href="<?php echo base_url();?>css/styleBrackets.css" rel="stylesheet">

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

    <div class="container">
        <!-- Modal -->
        <div class="col-sm-2"></div>
        <div class="col-sm-8 centered" style="text-align:center;">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#confirmar">Crear torneo</button>
        <br><br>
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
                  <a href="#shownext" type="button" class="btn btn-info btn-lg" data-dismiss="modal" onclick="showDiv();">Sí</a>
                  <a href="#shownext" type="button" class="btn btn-default btn-lg" data-dismiss="modal" onclick="showDiv();">No</a>
              </div>
            </div>

          </div>
        </div>
        </div>
        <div class="col-sm-2"></div>

    </div>
    
    
        
<?php 
//$this->load->view("footer");
?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
