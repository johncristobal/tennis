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

            <h3 class="title">Crear torneo: #nombre</h3>
                 
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
                    <label>Nombre del torneo: #nombre</label>                    
                    <br>
                    <label>Fecha de inicio: #fecha</label>                    
                </div>
            </div>      
                <div class="col-md-4">
                <div class="form-group">
                    <label>Lugar: #lugar</label>                    
                    <br>
                    <label>Torneo: #tipo</label>                    
                </div>
            </div> 
        </div>
        <div class="row"><br></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                El ranking actual es:
                <br>
                El torneo queda de la siguiente manera:
                <br>
                <input type="button" class="btn" value="Aceptar ">
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
