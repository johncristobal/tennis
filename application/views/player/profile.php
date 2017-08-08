<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<?php 
		$this->load->view("head");
		$this->load->view("header");
?>
        
        <div class="container">
        
        	<div id="sub-head">
            <div class="flyIn">
			<h2>Jugador de la semana</h2>

			<p class="col-md-4 text-center"><img src="<?php echo base_url();?>img/profile.jpg" alt="" class="img-circle style img-responsive"></p>
				<br>
                <p>Vera Cristobal</p>
				<br>
				<p>Ranking: 2</p>
				<br>
				<p>Campeón del primer torneo de Singles</p>
				<br>
				<p><a href="<?php echo base_url(); ?>index.php/Welcome/singleprofile">Ver perfil</a></p>
            </div>
            </div><!-- End sub-head -->
	<h3 class="title">HEAD TO HEAD</h3>
    
	<div class="row">
    
		<div class="col-md-6">

                <div class="thumbnail">
                    <div class="img-wrapp">
                        <div class="img-effect"></div>
                        <img src="<?php echo base_url(); ?>img/gallery/5_small.jpg" alt="" class="img-responsive">
                        <div class="img-links"><a href="<?php echo base_url(); ?>img/gallery/5.jpg" class="fancybox" title="Your caption"><i class="icon-search icon-3x"></i></a></div>
                    </div><!-- End img-wrapp -->
                </div><!-- End thumbnail -->
        	
			<form>
				<div class="form-bg-1"><input type="text" class="form-control" name="Age" placeholder="Nombre" value="Carlos Maya" ></div>
				<div class="form-bg-1"><p>Ranking: 1</p></div>
				
				<div class="result">
				<h2>Ganados</h2>
				<div id="your_cal_intake">2</div>
				</div>
				<input type="hidden" name="calculator" value="daily_calorie"/>
			</form>
		
		</div><!-- End col-md-6 -->
        
		<div class="col-md-6">
                <div class="thumbnail">
                    <div class="img-wrapp">
                        <div class="img-effect"></div>
                        <img src="<?php echo base_url(); ?>img/gallery/5_small.jpg" alt="" class="img-responsive">
                        <div class="img-links"><a href="<?php echo base_url(); ?>img/gallery/5.jpg" class="fancybox" title="Your caption"><i class="icon-search icon-3x"></i></a></div>
                    </div><!-- End img-wrapp -->
                </div><!-- End thumbnail -->		
				<div class="form-bg-1"><input type="text" class="form-control" name="Age" placeholder="Nombre" value="Vera Cristobal" ></div>
				<div class="form-bg-1"><p>Ranking: 2</p></div>
				<div class="result">
				<h2>Ganados</h2>
				<div id="your_cal_intake">2</div>
				</div>
            
		</div><!-- End col-md-5-->
	</div><!-- End row -->			
			
        </div> <!-- End container -->
        
        <?php $this->load->view("footer");?>        
 
        <div id="toTop">Back to Top</div>  

        <?php 
           $this->load->view("scriptfoo");
        ?> 


</body>
</html>