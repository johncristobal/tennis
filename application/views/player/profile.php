<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<?php 
		$this->load->view("head");
		$this->load->view("header");
?>
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
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                   
                <form>
                    <div class="form-bg-1"><input type="text" id="name_1"  class="form-control" placeholder="Buscar Jugador"></div>
                    
                </form>
                <!--form action="/action_page.php" method="get">
                    <input list="browsers" name="browser" class="form-control" placeholder="Buscar jugador...">
                <datalist id="browsers">
                  <option value="Internet Explorer">
                  <option value="Firefox">
                  <option value="Chrome">
                  <option value="Opera">
                  <option value="Safari">
                </datalist>
                <input type="submit">
                </form-->
                </div>
            </div>
            
            <br>            

			
            <div id="sub-head">

            <div class="flyIn">
			<h2>Jugador de la semana</h2>

			<p class="col-md-4 text-center"><img src="<?php echo base_url();?>img/jugadores/<?=$datos->id?>/perfil.jpg" alt="" class="img-circle style img-responsive"></p>
				<br>
                                <p><?=$datos->nombre;?></p>
				<br>
				<p>Edad: <?=$datos->edad;?></p>
				<br>
				<!--p>Campeón del primer torneo de Singles</p-->
				<br>
				<p><a href="<?php echo base_url(); ?>Player/jugador/<?=$datos->id;?>">Ver perfil</a></p>
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
                        <img src="<?php echo base_url(); ?>img/gallery/5_small.jpg" alt="" class="img-responsive">
                        <div class="img-links"><a href="<?php echo base_url(); ?>img/gallery/5.jpg" class="fancybox" title="Your caption"><i class="icon-search icon-3x"></i></a></div>
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
        <div class="row">
            <div class="col-md-4">                
            </div>
            <div class="col-md-4 text-center">                
                <a class="button_large" onclick="verheadtohead(<?=$datos1->id?>,<?=$datos2->id?>);">Ver detalle H2H</a>
            </div>
            <div class="col-md-4">                
            </div>
        </div>

			
        </div> <!-- End container -->
        
        <?php $this->load->view("footer");?>        
 
        <div id="toTop">Back to Top</div>  

        <?php 
           $this->load->view("scriptfoo");
        ?> 
        
        <?php
           $this->load->view("buscarscript");
        ?>

</body>
</html>