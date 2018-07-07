<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("header");    
?>            
  <link rel='stylesheet prefetch' href='http://www.aropupu.fi/bracket/jquery-bracket/dist/jquery.bracket.min.css'>
        <script type="text/javascript">
        
        function verheadtohead(id1,id2){
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
        <style>
            tr{
                line-height: 25px;  
                min-height: 25px;  
                height: 25px;
            }
            td{
                padding: 10px;
            }
            .no-padding{
                padding: 0px !important;
            }
            .line1{
                line-height: 8px;
            }
        </style>

        <div class="container">           
            <h1 class="title-green">Torneo</h1>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="pricing-table green">
                        
                        <div class="pricing-table-header" style="text-align: left;">
                            <span class="price-value">
                                <span><?=$torneodata[0]->nombre;?></span>
                                <!--span class="mo">$</span--></span>
                                <span class="heading"><?=$torneodata[0]->lugar;?>
                                <br>
                                <strong><?=$torneodata[0]->fecha_inicio;?></strong>
                                <table width="100%" align="right">
                                    <tr>
                                        <td width="20%" align="right">&nbsp;</td>
                                        <td width="20%" align="right">&nbsp;</td>
                                        <td width="20%" align="right">&nbsp;</td>
                                        <td width="20%" align="right">&nbsp;</td>
                                    </tr>
                                </table>
                            </span>
                            

                        </div>
                        
                        <div class="pricing-table-space"></div>
                    </div><!-- End pricing-table-->
                </div><!-- End col-md-3 -->
            </div><!-- End row -->
            
            <br><br>
            <form method="post" action="<?php echo base_url()?>torneos/updateTorneo">
					   <div id="matchesblank">
						<div class="demo">
						</div>
					  </div>
            <div class="container">
                <div class="row"><br></div>		
                <!--a href="<?= base_url()?>Estadisticas/tablaGeneral/<?=$torneodata[0]->id;?>" >Ver Tabla General</a-->
                <!--div class="row" style="font-size: 15px;"-->
                    <!--div class="pricing-table-features">
                            <p><strong>Six month</strong> valid</p>
                            <p><strong> Saving </strong> 30%</p>
                            <p><strong>Saving price</strong> 80$</p>
                            <p><strong>Gym + Home </strong>training</p>
                    </div-->
                <?php
                $i=1;
								
                foreach ($partidos as $value){     
												
                ?>  
                    <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <?php 
                            date_default_timezone_set('America/Mexico_City');
                            $date = new DateTime($value[0]->fecha);
                            $fechasemanal = $date->format('d-m-Y');
                        ?>
                        <span style="font-weight:bold; font-size:14px;">Semana <?=$i?></span>
                        <span style="font-weight:bold; font-size:14px;"><?=$fechasemanal?></span>
                    </div>
                    </div>
                <?php
                foreach ($value as $rondas) { 
                $flag = 0;
                    //Validacion para ronund rpbin impar
                if($rondas->fkjugador1 != $rondas->fkjugador2){                        
                ?>                        
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="col-md-2 col-sm-2 col-xs-5 no-padding"><span style="font-size: 12px;">(<?=$rondas->rank1?>)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador/<?=$rondas->fkjugador1;?>"><?=$rondas->nombre1;?></a></div>
                        <div class="col-xs-1 hidden-md hidden-sm"> - </div>
                        <div class="col-md-2 col-sm-2 col-xs-5 no-padding"><span style="font-size: 12px;">(<?=$rondas->rank2?>)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador/<?=$rondas->fkjugador2;?>"><?=$rondas->nombre2;?></a></div>
                                                
                        <!--td width="20%">
                            <label>
                            <?php 

                            date_default_timezone_set('America/Mexico_City');
                            $date = new DateTime($rondas->fecha);
                            echo $date->format('d-m-Y');
                            ?>
                            </label>
                        </td-->
                        <div class="col-md-3 col-sm-3 col-xs-7"><input type="text" name="<?=$rondas->id;?>" value="<?=$rondas->resultado;?>" required="false" readonly="true" style="background-color:#ECF0F1"></div>
                        
                        <div class="col-md-3 col-sm-3 centered col-xs-4"><a class="button_small" style="border-radius: 10px; padding: 3px 30px;" value="H2H" onclick="verheadtohead(<?=$rondas->fkjugador1?>,<?=$rondas->fkjugador2?>);">H2H</a></div>
                        <div class="col-xs-12 visible-xs hidden-sm hidden-md">
                            <br>
                        </div>

                    </div>
                <?php    
                } else {
                ?>
                    <div class="row">
                    <div class="col-md-2 col-sm-2"><span style="font-size: 12px;">Descansa</span></div>
                    <div class="col-md-1 col-sm-1"></div>
                    <div class="col-md-2 col-sm-2"><span style="font-size: 12px;">(<?=$rondas->rank1?>)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador/<?=$rondas->fkjugador1;?>"><?=$rondas->nombre1;?></a></div>
                    <!--td width="20%">&nbsp;</td-->
                    <!--td width="20%"><a class="button_newsletter" value="H2H" onclick="verheadtohead(<?=$rondas->fkjugador1?>,<?=$rondas->fkjugador2?>);">H2H</a></td-->
                    </div>
                <?php
                }
                }
                $i++;
                }
                ?>
                
                </div>
            <!--/div--> 
						
            </form>
            <br>
            
        </div><!-- End container -->
        
        <?php $this->load->view("footer");?>        

         <div id="toTop">Back to Top</div>  

        <?php 
            $this->load->view("scriptfoo");
        ?> 
           <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://www.aropupu.fi/bracket/jquery-bracket/dist/jquery.bracket.min.js'></script>
<script  src="<?= base_url();?>js/torneoElimDir.js"></script>
         <script type="text/javascript">
            $("button").click(function() {
                $('html,body').animate({
                    scrollTop: $(".second").offset().top},
                    'slow');
            });
             </script>

</body>
</html>
