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
                    
    <h3 class="title">TODOS LOS RANKINGS</h3>

    <div class="row">
    <table class="table-striped" width="100%">
    <thead>
      <tr>
        <th>Ranking</th>
        <th>Movimiento</th>
        <th>Jugador</th>
        <th>Edad</th>
        <th>Puntos</th>
        <th>Torneos Jugados</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $value) {
         ?>   
      <tr>
        <td width="10%"><?=$value->rank_act;?></td>
        <td width="10%">+1</td>
        <td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>player/jugador/<?=$value->id;?>"><?=$value->nombre;?></a></td>
        <td width="10%"><?=$value->edad;?></td>
        <td width="10%"><?=$value->puntos;?></td>
        <td width="10%"><?=$value->torneosj;?></td>
      </tr>
        <?php
            }
        ?>

    </tbody>
    </table>
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