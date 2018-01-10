<script type="text/javascript">
        
        function verheadtohead(id1,id2){
            //alert(id1);
            //alert(id2);

            //get id from catch dat from headtohead
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("torneos/saveidplayers"); ?>',
                data:{'id1':id1,'id2':id2},
                success:function(data){                    
                    //alert(data);
                    location.href = "<?php echo base_url();?>torneos/headtohead";
                }
            });
        }
        </script>
<div class="container">
            <div class="row">
                <div class="col-md-12">
                
                    <div class="flexslider">
                        <ul class="slides">
                            <li><img src="<?php echo base_url();?>img/slider/slide-1.jpg" alt="">
                            <p class="flex-caption">I will help you to achieve your goal</p>
                            </li>
                            <li><img src="<?php echo base_url();?>img/slider/slide-2.jpg" alt="">
                            <p class="flex-caption">Your exercises will be carried out to perfection</p>
                            </li>
                            <li>
                            <img src="<?php echo base_url();?>img/slider/slide-3.jpg" alt="">
                            <p class="flex-caption">Lose weight in a short time</p>
                            </li>
                            <li>
                            <img src="<?php echo base_url();?>img/slider/slide-4.jpg" alt="">
                            <p class="flex-caption">The pleasure of outdoor recreation</p>
                            </li>
                            <li>
                            <img src="<?php echo base_url();?>img/slider/slide-5.jpg" alt="">
                            <p class="flex-caption">Proper training will make you feel better</p>
                            </li>
                        </ul>
                    </div><!-- End slider -->
                    
                </div><!-- End row -->
            </div><!-- End col-md-12 -->
                       
            <div class="clase" <?php if($torneo == "0"){echo "style='display:none;'";}?>> 
            <div class="row">            
                <div class="col-md-4 col-sm-6" <?php if($torneo == "0"){echo "style='display:none;'";}?>>
                    <div class="box_calculator">
                        <a href="<?php echo base_url();?>torneos/resultados/<?=$torneo->id;?>">
                        <img src="<?php echo base_url();?>img/icon-1.png" alt="">
                        <h3>Torneo actual</h3>
                        <p><?=$torneo->nombre;?></p>
                        </a>
                    </div><!-- End box-calculator -->
                </div><!-- End col-md-3 -->
                
                <div class="col-md-4 col-sm-6" <?php if($torneo == "0"){echo "style='display:none;'";}?>>
                    <div class="box_calculator">
                        <a href="<?php echo base_url();?>Player/jugador/<?=$primer->id;?>">
                        <img src="<?php echo base_url();?>img/icon-2.png" alt="">
                        <h3>Ranking</h3>
                        <p>1er: <?=$primer->nombre;?></p>
                        </a>
                    </div><!-- End box-calculator -->
                </div><!-- End col-md-3 -->
                
                <div class="col-md-4 col-sm-6" <?php if($torneo == "0"){echo "style='display:none;'";}?>>
                    <div class="box_calculator">
                        <a href="<?php echo base_url();?>Player/perfil">
                        <img src="<?php echo base_url();?>img/icon-3.png" alt="">
                        <h3>Jugadores</h3>
                        <p>Datos de los jugadores</p>
                        </a>
                    </div><!-- End box-calculator -->
                </div><!-- End col-md-3 -->                
            </div><!-- End row -->
            </div>
            
            <?php
            
                if($datos1 != "0")
                {
                $imagen1 = base_url()."img/jugadores/".$datos1->id."/h2h.png";
                $imagen2 = base_url()."img/jugadores/".$datos2->id."/h2h.png";
                
                try{
                    if(!file_exists("img/jugadores/".$datos1->id."/h2h.png")){
                        $imagen1 = base_url()."img/jugadores/back1.png";
                    }
                    if(!file_exists("img/jugadores/".$datos2->id."/h2h.png")){
                        $imagen2 = base_url()."img/jugadores/back2.png";
                    }
                }catch(Exception $e){
                }
                }else{
                    $imagen1 = base_url()."img/jugadores/back1.png";
                    $imagen2 = base_url()."img/jugadores/back2.png";
                }

            ?>
            <div class="clase" <?php if($datos1 == "0"){echo "style='display:none;'";}?>>
            <h3 class="title">HEAD TO HEAD</h3>
            <div class="row">
    
		<div class="col-md-6">

                <div class="thumbnail">
                    <div class="img-wrapp">
                        <div class="img-effect"></div>
                        <img src="<?=$imagen1;?>" alt="" class="img-responsive" style="height: 300px;">
                    </div><!-- End img-wrapp -->
                </div><!-- End thumbnail -->
        	
                    <form>
                        <div class="form-bg-1"><input type="text" class="form-control" name="Age" value="<?=$datos1->nombre;?>" readonly="true"></div>
                            <div class="form-bg-1"><p>Ranking: <?=$datos1->rank_act;?></p></div>

                            <div class="result">
                            <h2>Ganados</h2>
                            <div id="your_cal_intake"><?=$ganados1;?></div>
                            </div>
                            <input type="hidden" name="calculator" value="daily_calorie"/>
                    </form>
		
		</div><!-- End col-md-6 -->
        
		<div class="col-md-6">
                <div class="thumbnail">
                    <div class="img-wrapp">
                        <div class="img-effect"></div>
                        <img src="<?=$imagen2?>" alt="" class="img-responsive" style="height: 300px;">
                        
                    </div><!-- End img-wrapp -->
                </div><!-- End thumbnail -->		
                <div class="form-bg-1"><input type="text" class="form-control" name="Age" value="<?=$datos2->nombre;?>" readonly="true"></div>
                    <div class="form-bg-1"><p>Ranking: <?=$datos2->rank_act;?></p></div>
                    <div class="result">
                    <h2>Ganados</h2>
                    <div id="your_cal_intake"><?=$ganados2;?></div>
                    </div>            
		</div><!-- End col-md-5-->
	</div><!-- End row -->	
        </div>
        <div class="clase" <?php if($datos1 == "0"){echo "style='display:none;'";}?>>
        <div class="row">
            <div class="col-md-4">                
            </div>
            <div class="col-md-4 text-center">                
                <a class="button_large" onclick="verheadtohead(<?=$datos1->id?>,<?=$datos2->id?>);">Ver detalle H2H</a>
            </div>
            <div class="col-md-4">                
            </div>
        </div>
        </div>
        
            
            
            <!--h3 class="title">RANKING SECTION</h3>
            
            <div class="row">
            
                <div class="col-md-6">
                    <div class="quote clearfix">
                        <img src="<?php echo base_url();?>img/testimonial-1.jpg" class="img-circle" alt="">
                        <p>
                             Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.
                        </p>
                        <em>Jhon Doe</em>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="quote clearfix">
                        <img src="<?php echo base_url();?>img/testimonial-2.jpg" class="img-circle" alt="">
                        <p>
                             Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.
                        </p>
                        <em>Jhon Doe</em>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="quote clearfix">
                        <img src="<?php echo base_url();?>img/testimonial-3.jpg" class="img-circle" alt="">
                        <p>
                             Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.
                        </p>
                        <em>Jhon Doe</em>
                    </div>
                </div>
                
                <div class="col-md-6 clearfix">
                    <div class="quote">
                        <img src="<?php echo base_url();?>img/testimonial-4.jpg" class="img-circle" alt="">
                        <p>
                             Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam.
                        </p>
                        <em>Jhon Doe</em>
                    </div>
                </div>
                
            </div><!-- End row -->

        </div><!-- End container -->
        
        <?php $this->load->view("footer");?>        

        <!-- End footer -->
 
 <div id="toTop">Back to Top</div>  
 
<!-- FLEXSLIDER -->  
<script defer src="js/jquery.flexslider.js"></script> 
 <script type="text/javascript">
/* <![CDATA[ */
  $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade"
  });
});
  /* ]]> */
</script> 


<!-- MENU JS -->    
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="js/mobile-menu.js"></script>

<!-- OTHER JS --> 
<script src="js/placeholder.js"></script>
<script src="js/inview.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="assets/validate.js"></script> 
<script src="js/functions.js"></script>



<!-- FANCYBOX -->
<script  src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4" type="text/javascript"></script> 
<script src="js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5" type="text/javascript"></script> 
<script src="js/fancy_func.js" type="text/javascript"></script> 


</body>
</html>