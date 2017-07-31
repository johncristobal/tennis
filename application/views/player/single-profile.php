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
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Contacts</h5>
                    <p>
                        Our mission is to bring affordable Technology education to people everywhere, in order to help them achieve their dreams and change the world. to bring affordable Technology education to people everywhere, in order to help them achieve their dreams and change the world.
                    </p>
                    <ul>
                        <li><i class="icon-user"></i> Personal trainer Name</li>
                        <li><i class="icon-phone"></i> Telephone: 41.22.319.36.10 </li>
                        <li><i class="icon-envelope"></i> Email: <a href="#">info@planar.com </a></li>
                        <li><i class="icon-skype"></i> Skype name: Planar</li>
                    </ul>
                    <ul class="social-bookmarks clearfix">
                        <li class="linkedin"><a href="#">behance</a></li>
                        <li class="facebook"><a href="#">facebook</a></li>
                        <li class="googleplus"><a href="#">googleplus</a></li>
                        <li class="twitter"><a href="#">twitter</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="add_bottom_15">Suggest this site to a friend</h5>
                    <div id="message-friend"></div>
                    <form method="post" action="assets/send_to_friend.php" id="contactfriend">
                        <div class="form-bg-1"><input type="text" id="name_footer" class="form-control" placeholder="Your name*"></div>
                        <div class="form-bg-2"><input type="text" id="friendname_footer" class="form-control" placeholder="Your friend name*"></div>
                        <div class="form-bg-1"><input type="email" id="friendemail_footer" class="form-control" placeholder="Your friend email*"></div>
                        <div class="form-bg-2"><textarea rows="3" id="message_footer" class="form-control" placeholder="Message*"></textarea></div>
                        <div class="form-bg-1"><input type="text" id="verify_footer" class="form-control" placeholder="Are you human? 3 + 1 ="></div>
                        <input type="submit" id="submit-friend" value="Submit" class=" button_medium add_top_30">
                    </form>
                </div>
            </div>
        </div>
        <div id="copy">© 2013 - All Rights Reserved</div>
        </footer><!-- End footer -->
 
 <div id="toTop">Back to Top</div>  

<!-- MENU JS -->    
<script src="<?php echo base_url();?>js/hoverIntent.js"></script>
<script src="<?php echo base_url();?>js/superfish.js"></script>
<script src="<?php echo base_url();?>js/mobile-menu.js"></script>

<!-- OTHER JS --> 
<script src="<?php echo base_url();?>js/placeholder.js"></script>
<script src="<?php echo base_url();?>js/inview.js"></script> 
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/validate.js"></script> 
<script src="<?php echo base_url();?>js/functions.js"></script>



<!-- FANCYBOX -->
<script  src="<?php echo base_url();?>js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4" type="text/javascript"></script> 
<script src="<?php echo base_url();?>js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5" type="text/javascript"></script> 
<script src="<?php echo base_url();?>js/fancy_func.js" type="text/javascript"></script> 


</body>
</html>