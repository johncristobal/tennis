<!DOCTYPE html>

<html lang="en">
<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Liga de tenis | Madrugaytors</title>
<meta name="description" content="Liga de tenis en el deportivo Izcalli">
<meta name="author" content="nowosc mexico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<!-- Favicons-->
<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url();?>img/apple-touch-icon-57x57-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url();?>img/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url();?>img/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url();?>img/apple-touch-icon-144x144-precomposed.png">

<!-- CSS -->
<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/menu.css" rel="stylesheet">
<link href="<?php echo base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet" >
<link href="<?php echo base_url();?>css/socialize-bookmarks.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>js/fancybox/source/jquery.fancybox.css?v=2.1.4">
<link href="<?php echo base_url();?>css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>css/flexslider.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?php echo base_url();?>css/autocomplete.css" type="text/css" media="screen">

<!-- Google web font -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Jquery -->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--script src="<?php echo base_url();?>js/buscar.js"></script-->
<!-- Support media queries for IE8 -->
<script src="<?php echo base_url();?>js/respond.min.js"></script>

<!-- HTML5 and CSS3-in older browsers-->
<script src="<?php echo base_url();?>js/modernizr.custom.17475.js"></script>

<script src="<?php echo base_url();?>js/autocomplete.js"></script>
<!--[if IE 7]>
  <link rel="stylesheet" href="font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
    <link href="<?php echo base_url();?>css/styleBrackets.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



</head>
<body>
    <header>
        <div class="container">
            <div class="row">
        	<div class="col-md-4 col-xs-9"><h2 id="logo"><a href="<?php echo base_url();?>" title="Planar - Personal Trainer">Tenis - Sportway</a></h2></div>
            <nav class="col-md-8 col-xs-3">
            	<ul id="main-nav" class="sf-menu" >
                
                    <li><a href="#">Jugadores</a>
                        <ul>
                        <li><a href="<?php echo base_url();?>admin/jugadores">Lista de jugadores</a></li>
                        <li><a href="<?php echo base_url();?>admin/registro_jugador">Agregar jugador</a></li>
                        <li><a href="<?php echo base_url();?>admin/registroDobles">Inscribir dobles</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Torneos</a>
                        <ul>
                        <li><a href="<?php echo base_url();?>admin/calendario">Ver torneos</a></li>
                        <li><a href="<?php echo base_url();?>admin/registrotorneo">Crear torneo simple</a></li>
                        <li><a href="<?php echo base_url();?>admin/registrotorneodobles">Crear torneo dobles</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>admin/rememberMail">Recordatorios</a>
                    <li><a href="#">Banners</a>
                        <ul>
                        <li><a href="<?php echo base_url();?>admin/cambiarbanners">Actualizar banners</a></li>
                        <li><a href="<?php echo base_url();?>admin/nuevobanner">Agregar nuevo banner</a></li>
                        <li><a href="<?php echo base_url();?>admin/reorderindexbanner">Ordenar banners</a></li>
                        </ul>
                    </li>
                <li><a href="<?php echo base_url();?>admin/cerrar">Cerrar sesión</a>
                </li>				

                </ul>
            </nav>
         </div>
        </div>
        </header>  
    

    <div class="container">
        
    <!--div id="sub-head">
            <div class="flyIn">
                <h2>Javascript components</h2>
                <p> Est omnis nulla ut, ius clita virtute persecuti at, id ipsum inermis aliquando. Ne iracundia omittantur has, at invidunt invenire nec.</p>
            </div>
    </div>
    
    <h3 class="title">Torneos</h3>
    <section class="row">
    <div class="col-md-12">
     <!--h4>Accordion</h4-->
    
        <div class="panel-group add_bottom_30" id="accordion">

            <h3 class="title">Crear torneo: <?=$this->session->userdata('nombre');?></h3>
                 
            <!--form name="creaRound" method="post" action="<?php echo base_url();?>Torneos/generaRoundRobin">
		<input type="text" name="no_jugadores" value="" placeholder="Número de Jugadores">
		<button>Enviar</button>
            </form-->              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
    <div class="container">

        <div class="row">
            <div class="col-md-4">
			
                <div class="form-group">
                    <label>Nombre del torneo: <?=$this->session->userdata('nombre');?></label>                    
                    <br>
                    <label>Fecha de inicio: <?=$this->session->userdata('fecha');?></label>                    
                </div>
            </div>      
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lugar: <?=$this->session->userdata('lugar');?></label>                    
                    <br>
                    <label>Torneo: <?=$this->session->userdata('tipo_torneo');?></label>                    
                </div>
            </div> 


					
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">            
        <?php 
            if($llaves){
                echo $llaves;
            }
        ?> 
                </div>
            </div>
        </div>
    <div class="container">
        <!-- Modal -->
        <div class="col-sm-4"></div>
        <div class="col-sm-8 right" style="text-align:right;">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#confirmar">Crear torneo</button>
        <br><br>
        <div class="modal fade" id="confirmar" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <!--div class="modal-header">
              </div-->
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¿Desea guardar los partidos para este torneo?</h4>
              </div>
              <div class="modal-footer">
                  <a href="#shownext" type="button" class="btn btn-info btn-lg" data-dismiss="modal" onclick="showDiv();">Sí</a>
                  <a href="#shownext" type="button" class="btn btn-default btn-lg" data-dismiss="modal" onclick="showDiv();">No</a>
              </div>
            </div>

          </div>
        </div>
        </div>

    </div>
    
    
        
<?php 
//$this->load->view("footer");
?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
