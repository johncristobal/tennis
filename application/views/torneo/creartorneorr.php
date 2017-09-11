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
                <form name="creaRound" method="post" action="<?php echo base_url();?>torneos/generaRoundRobin">                    
                      <div class="input-group">
                        <input type="text" class="form-control" name="no_jugadores" value="" placeholder="Número de Jugadores" style="background-color: #fff; border: 1px solid #00aeef;">
                        <div class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-repeat"></i>
                            Generar
                          </button>
                        </div>
                      </div>                    
                </form>
            </div>
            </div>

            <div class="col-md-4"></div>
        </div>               
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
