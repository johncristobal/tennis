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
            <div class="row">
			
                <div class="col-md-12">
			    <h4>RANKING SPORTWAY IZCALLI</h4>
                <ul class="nav nav-tabs">
                <li class="active"><a href="#singles" data-toggle="tab">Singles</a></li>
                <li><a href="#dobles" data-toggle="tab">Dobles</a></li>
				</ul>
            
				<div class="tab-content">
			
                <div class="tab-pane active" id="singles">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php $i=1; foreach($datos as $filas) { ?>
                            <li><img src="<?php echo base_url();?>img/slider/slide-1.jpg" alt=""> <?=$filas->nombre;?> 
                            <p class="flex-caption">Ranking No. <?=$i;?></p>
                            </li>                            
                            <?php 
                                if($i == 5){
                                    break;
                                }
                                $i++;
                            } ?>
                        </ul>
					
                    </div><!-- End slider -->
                    <a   href="<?php echo base_url();?>Estadisticas/allRankings"  class=" button_medium">Ver todos los rankings</a>
                </div>
                <div class="tab-pane" id="dobles">
                       <div class="flexslider">
                        <ul class="slides">
                            <li><img src="<?php echo base_url();?>img/slider/slide-1.jpg" alt=""> CARLOS MAYA
                            <p class="flex-caption">Ranking No.1</p>
                            </li>
                            <li><img src="<?php echo base_url();?>img/slider/slide-2.jpg" alt=""> JOHN VERA
                            <p class="flex-caption">Ranking No.2</p>
                            </li>
                            <li>
                            <img src="<?php echo base_url();?>img/slider/slide-3.jpg" alt=""> DANIEL FUENTES
                            <p class="flex-caption">Ranking No.3</p>
                            </li>
                            <li>
                            <img src="<?php echo base_url();?>img/slider/slide-4.jpg" alt=""> VIRGILIO RODRIGUEZ
                            <p class="flex-caption">Ranking No.4</p>
                            </li>
                            <li>
                            <img src="<?php echo base_url();?>img/slider/slide-5.jpg" alt=""> ANTONIO GARCÍA
                            <p class="flex-caption">Ranking No.5</p>
                            </li>
                        </ul>
                    </div><!-- End slider -->
                    <a  href="<?php echo base_url();?>Estadisticas/allRankings" class=" button_medium">Ver todos los rankings</a>
                </div>
            </div>

                    
                </div><!-- End row -->
            </div><!-- End col-md-12 -->

        </div><!-- End container -->
 
        <?php $this->load->view("footer");?>        

 <div id="toTop">Back to Top</div>  
 
<!-- FLEXSLIDER -->  
<script defer src="<?php echo base_url();?>js/jquery.flexslider.js"></script> 
 <script type="text/javascript">
/* <![CDATA[ */
  $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade"
  });
});
  /* ]]> */
</script> 

<?php 
    $this->load->view("scriptfoo");
?> 


<!-- MENU JS -->    
<!--script src="<?php echo base_url();?>js/hoverIntent.js"></script>
<script src="<?php echo base_url();?>js/superfish.js"></script>
<script src="<?php echo base_url();?>js/mobile-menu.js"></script>

<script src="<?php echo base_url();?>js/placeholder.js"></script>
<script src="<?php echo base_url();?>js/inview.js"></script> 
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/validate.js"></script> 
<script src="<?php echo base_url();?>js/functions.js"></script>

<script  src="<?php echo base_url();?>js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4" type="text/javascript"></script> 
<script src="<?php echo base_url();?>js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5" type="text/javascript"></script> 
<script src="<?php echo base_url();?>js/fancy_func.js" type="text/javascript"></script--> 


</body>
</html>
      