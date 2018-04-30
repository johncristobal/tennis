<?php 
    $this->load->view("head");
    $this->load->view("header");
?>

<div class="row">
        <h3 class="title">Tabla General</h3>
				<h2 align="center"><?=$infoTorneo[0]->nombre;?></h2>
</div>
<br>
<div class="container hidden-xs">
                    
    <div class="row">
        <div class="col-sm-2 text-center">
            Posición
        </div>
        <div class="col-sm-2 text-left">
            Jugador
        </div>
	       <div class="col-sm-2 text-center">
            Partidos Jugados
        </div>			
        <div class="col-sm-2 text-center">
            Ganados
        </div>
        <div class="col-sm-2 text-center">
            Perdidos
        </div>
        <div class="col-sm-2 text-center">
            Puntos
        </div>
    </div>
		<?php
		$cont=1;
		foreach ($datos as $fila ) {
			
		?>
			<div class="row">
            <div class="col-sm-2 text-center">
                <strong>
                    <?= $cont ?>
                </strong>
            </div>
            <div class="col-sm-2 text-left">
                <span>
                    <a href="<?php echo base_url();?>player/jugador/"><?= $fila->nombre?></a>
                </span>
            </div>
            <div class="col-sm-2 text-center">
                <span>
                <?= $fila->Jugados ?>
                </span>
            </div>						
            <div class="col-sm-2 text-center">
                <span>
                 <?= $fila->Ganados ?>
                </span>
            </div>
            <div class="col-sm-2 text-center">
                <span>
               <?= $fila->Perdidos ?>
                </span>
            </div>
            <div class="col-sm-2 text-center">
                <span>
               <b> <?= $fila->Puntos ?></b>
                </span>
            </div>						
      </div>
		<?php
		$cont++;
		}
		?>

		<!--
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
    ?> -->
    
    </div><!-- End container -->
    <!--
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

   <!-- </div>  <!-- End container -->


 
<?php $this->load->view("footer");?>  
 <div id="toTop">Back to Top</div> 
<?php 
    $this->load->view("scriptfoo");
?> 


</body>
</html>