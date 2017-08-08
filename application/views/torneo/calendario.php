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
            
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Mes Año
                </a>
              </h4>
            </div>
              
            <div id="collapseOne" class="panel-collapse collapse in">
                
              <div class="panel-body"><!--Colocar datos importantes del torneo-->                  
                <!--Repeat this section to get info about tournaments-->
                <section class="row">
                <div class="col-md-3">
                    <a href="<?php echo base_url();?>torneos/resultados/1"><h4 class="title-green">Torneo Verano 2017</h4></a>
                    <p>Sportway Izcalli</p>
                    <strong>2017.07.30</strong>
                </div>
                  
                <div class="col-md-3">
                    <h4>&nbsp;</h4>
                    <strong>Singles</strong>
                    <p>&nbsp;</p>
                </div>
                    
                    <div class="col-md-3" style="border-right-style: solid;">
                    <h4>&nbsp;</h4>
                    <p>Pasto</p>
                    <strong>&nbsp;</strong>
                </div>
                </section>
                <hr>
                  
              </div>
            </div>
          </div>
            
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  Mes Año
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body"><!--Colocar datos importantes del torneo-->
                <section class="row">
                <div class="col-md-3">
                    <a href="<?php echo base_url();?>torneos/resultados/2"><h4 class="title-green">Torneo Verano 2017</h4></a>
                    <p>Sportway Izcalli</p>
                    <strong>2017.07.30</strong>
                </div>
                  
                <div class="col-md-3">
                    <h4>&nbsp;</h4>
                    <strong>Singles</strong>
                    <p>&nbsp;</p>
                </div>
                    
                    <div class="col-md-3" style="border-right-style: solid;">
                    <h4>&nbsp;</h4>
                    <p>Pasto</p>
                    <strong>&nbsp;</strong>
                </div>
                </section>
                <hr>
                
                <section class="row">
                <div class="col-md-3">
                    <a href="<?php echo base_url();?>torneos/resultados/2"><h4 class="title-green">Torneo Verano 2017</h4></a>
                    <p>Sportway Izcalli</p>
                    <strong>2017.07.30</strong>
                </div>
                  
                <div class="col-md-3">
                    <h4>&nbsp;</h4>
                    <strong>Singles</strong>
                    <p>&nbsp;</p>
                </div>
                    
                    <div class="col-md-3" style="border-right-style: solid;">
                    <h4>&nbsp;</h4>
                    <p>Pasto</p>
                    <strong>&nbsp;</strong>
                </div>
                </section>
                <hr>
                
              </div>
            </div>
          </div>
                       
        </div>
    	
    </div><!--  End col-md-6 --> 
    
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>