<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->

<!--<![endif]-->
<?php 
    $this->load->view("head");
    $this->load->view("header");
?>

<div class="row">
        <h3 class="title">RANKING</h3>
</div>
<div class="container hidden-xs">
                    
    <div class="row">
        <div class="col-sm-2 text-center">
            Ranking
        </div>
        <div class="col-sm-3 text-left">
            Jugador
        </div>
        <div class="col-sm-2 text-center">
            Edad
        </div>
        <div class="col-sm-2 text-center">
            Puntos
        </div>
        <div class="col-sm-3 text-center">
            Torneos jugados
        </div>
    </div>
    <?php foreach ($datos as $value) {
    ?>   
        <div class="row">
            <div class="col-sm-2 text-center">
                <strong>
                    <?=$value->rank_act;?>
                </strong>
            </div>
            <div class="col-sm-3 text-left">
                <span>
                    <a href="<?php echo base_url();?>player/jugador/<?=$value->id;?>"><?=$value->nombre;?></a>
                </span>
            </div>
            <div class="col-sm-2 text-center">
                <span>
                    <?=$value->edad;?>
                </span>
            </div>
            <div class="col-sm-2 text-center">
                <span>
                    <?=$value->puntos;?>
                </span>
            </div>
            <div class="col-sm-3 text-center">
                <span>
                    <?=$value->torneosj;?>
                </span>
            </div>
      </div>
    <?php
        }
    ?>
    
    </div><!-- End container -->
    
    <div class="container visible-xs">
                    
        <?php foreach ($datos as $value) {
         ?>   

        <div class="row">
            <div class="col-xs-4">                
                <strong>
                    Ranking: <?=$value->rank_act;?>
                </strong>
            </div>
            <div class="col-xs-5">
                <span>
                    <a href="<?php echo base_url();?>player/jugador/<?=$value->id;?>"><?=$value->nombre;?></a>
                </span>
            </div>
            <div class="col-xs-3">            
                <span>
                    Edad: <?=$value->edad;?>
                </span>
            </div>
        </div>
        <div class="row">            
            <div class="col-xs-12">
                <strong>Puntos: </strong><span><?=$value->puntos;?></span>
            </div>
        </div>
        <div class="row">            
            <div class="col-xs-12">
                <strong>Torneos jugados: </strong><span><?=$value->torneosj;?></span>
            </div>
        </div>
        <div class="row">            
            <hr>
        </div>
        
        <?php
        }
        ?>
    </div><!-- End row -->

    </div><!-- End container -->

    <?php $this->load->view("footer");?>        

 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

 <!-- MENU JS -->    
<!--script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="js/supersubs.js"></script>
<script src="js/mobile-menu.js"></script>

<script src="js/placeholder.js"></script>
<script src="js/inview.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="assets/validate.js"></script> 
<script src="js/functions.js"></script>

<script  src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.4" type="text/javascript"></script> 
<script src="js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5" type="text/javascript"></script> 
<script src="js/fancy_func.js" type="text/javascript"></script--> 


</body>
</html>