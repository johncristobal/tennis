<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<?php 
		$this->load->view("head");
		$this->load->view("header");
?>
        
        <div class="container">
                    
   			 <h3 class="title">Vera Cristobal</h3>
             <div class="row">
                    <div class="col-md-6">
                   <h3>Acerca de mi</h3>
				   <p><strong>Nombre Completo:</strong> John Vera Cristobal Jimenez </p>
				   <p><strong>Ranking:</strong> 2</p>
				   <p><strong>Edad:</strong> 25 años</p>
				   <p><strong>Altura:</strong> 1.69 cms</p>
				   <p><strong>Lugar de Nacimiento:</strong> Veracruz,Veracruz </p>
				   <p><strong>Nombre Completo:</strong> John Vera Cristobal Jimenez </p>
				   <p><strong>Plays:</strong> RIGHT-HANDED, TWO-HANDED BACKHAND </p>
                    </div>
					
                    
                <p class="col-md-6 text-center"><img src="<?php echo base_url();?>img/profile.jpg" alt="" class="img-circle style img-responsive"></p>
                
                </div><!-- End row -->
                
                <div class="row add_top_30">
                
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
                    </div>
                    
                </div><!-- End row -->
        </div> <!-- End container -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  <h4 class="modal-title">Títulos/Finales</h4>
			</div>
                      <div class="col-md-12">
                      <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                <th style="width:15%">Año</th>
                                <th style="width:65%">Torneo</th>
								<th style="width:65%">Lugar</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td>2017</td>
                            <td>Sportway Izcalli Primavera</td>
							<td>Finalista</td>
                          </tr>
                          <tr>
                            <td>2017</td>
                            <td>Sportway Izcalli Verano</td>
							<td>Campeón</td>
                          </tr>
                          </tbody>
                        </table> <!-- End table responsive -->
                        </div>
					</div>
			<div class="modal-footer">
			  <button type="button" class=" button_small" data-dismiss="modal">Close</button>
			</div>
		  </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	  </div><!-- /.modal -->	
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 
          
          
</body>
</html>