<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("header");
?>      

<script type="text/javascript">
    $("#verh2h").click(function(){
       alert('alerta'); 
    });
    
    function saveAndShowH2h()
    {
        //recuperar nombrees de los input name_1_2
        //mandarlos a ajax para recueprar ids a partide de sus nombre y salvarlos en session
        //hacer reload de esta pagian para recuperar nuevo h2h
        var nombre1 = $("#name_1").val();
        var nombre2 = $("#name_2").val();
        
        //alert(nombre1+"-"+nombre2);
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("torneos/saveidplayersfromname"); ?>',
            data:{'nombre1':nombre1,'nombre2':nombre2},
            success:function(data){
                //alert(data);
                location.href = "<?php echo base_url();?>torneos/headtohead";
            }
        });
    }
</script>

<style>
    .col-centered{
        text-align: center;
}
</style>
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
    <div class="container hidden-xs">
        
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
    <?php
        $imagen1 = base_url()."img/jugadores/".$datos1->id."/perfil.jpg";
        $imagen2 = base_url()."img/jugadores/".$datos2->id."/perfil.jpg";

        try{
            if(!file_exists("img/jugadores/".$datos1->id."/perfil.jpg")){
                $imagen1 = base_url()."img/jugadores/nofoto.png";
            }
            if(!file_exists("img/jugadores/".$datos2->id."/perfil.jpg")){
                $imagen2 = base_url()."img/jugadores/nofoto.png";
            }
        }catch(Exception $e){
        }
    ?>

    <h3 class="title">Head to Head</h3>
    
    <div class="row">
        <div class="col-md-4">
            <div class="form-bg-1 ui-widget"><input type="text" id="name_1" class="form-control" placeholder="<?=$datos1->nombre;?>"></div>
        </div>
        <div class="col-md-1 col-centered">
            <h4>VS</h4>
        </div>
        <div class="col-md-4">
            <div class="form-bg-1"><input type="text" id="name_2" class="form-control" placeholder="<?=$datos2->nombre;?>"></div>
        </div>
        <div class="col-md-3 col-centered">
            <a class="verh2h button_medium" onclick="saveAndShowH2h();">Mostrar H2H</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <p class="text-center"><img src="<?=$imagen1?>" alt="" class="img-circle style img-responsive" style="height:250px"></p>
            <div class="col-centered">
                <h5><a href="<?php echo base_url()?>player/jugador/<?=$datos1->id;?>"><?=$datos1->nombre;?></a></h5>
                Rank: <?=$datos1->rank_act?>
            </div>
        </div>
        <div class="col-md-2 col-centered" style="margin-top:100px;">
            <h2><?=$ganados1;?></h2>
            wins
        </div>
        <div class="col-md-2" style="margin-top:100px;">
            <h1 class="col-centered">VS</h1>
        </div>
        <div class="col-md-2 col-centered" style="margin-top:100px;">
            <h2><?=$ganados2;?></h2>
            wins
        </div>
        <div class="col-md-3">
            <p class="text-center"><img src="<?=$imagen2?>" alt="" class="img-circle style img-responsive" style="height:250px"></p>
            <div class="col-centered">
                <h5><a href="<?php echo base_url()?>player/jugador/<?=$datos2->id;?>"><?=$datos2->nombre;?></a></h5>
                Rank: <?=$datos2->rank_act?>
            </div>
        </div>
    </div>
    
    <hr>
    
    <div class="row" style="padding: 10px;">
        <div class="col-md-4">
            <h5><?=$datos1->edad;?></h5>
        </div>
        <div class="col-md-4 alert-info col-centered">
            Edad
        </div>
        <div class="col-md-4" style="text-align:right;">
            <h5><?=$datos2->edad;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-md-4">
            <h5><?=$datos1->fecha_nac;?></h5>
        </div>
        <div class="col-md-4 alert-info col-centered">
            Fecha de nacimiento
        </div>
        <div class="col-md-4" style="text-align:right;">
            <h5><?=$datos2->fecha_nac;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-md-4">
            <h5><?=$datos1->altura;?></h5>
        </div>
        <div class="col-md-4 alert-info col-centered">
            Altura
        </div>
        <div class="col-md-4" style="text-align:right;">
            <h5><?=$datos2->altura;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-md-4">
            <h5><?=$datos1->plays;?></h5>
        </div>
        <div class="col-md-4 alert-info col-centered">
            Plays
        </div>
        <div class="col-md-4" style="text-align:right;">
            <h5><?=$datos2->plays;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-md-4">
            <h5><?=$datos1->jganados;?> / <?=$datos1->jperdidos;?></h5>
        </div>
        <div class="col-md-4 alert-info col-centered">
            Ganados/Perdidos
        </div>
        <div class="col-md-4" style="text-align:right;">
            <h5><?=$datos2->jganados;?> / <?=$datos2->jperdidos;?></h5>
        </div>
    </div>
    </div><!--  End container --> 
    
    <div class="container visible-xs">
        
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
    <?php
        $imagen1 = base_url()."img/jugadores/".$datos1->id."/perfil.jpg";
        $imagen2 = base_url()."img/jugadores/".$datos2->id."/perfil.jpg";

        try{
            if(!file_exists("img/jugadores/".$datos1->id."/perfil.jpg")){
                $imagen1 = base_url()."img/jugadores/nofoto.png";
            }
            if(!file_exists("img/jugadores/".$datos2->id."/perfil.jpg")){
                $imagen2 = base_url()."img/jugadores/nofoto.png";
            }
        }catch(Exception $e){
        }
    ?>

    <h3 class="title">Head to Head</h3>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="form-bg-1 ui-widget"><input type="text" id="name_1" class="form-control" placeholder="<?=$datos1->nombre;?>"></div>
        </div>
        <div class="col-xs-12 col-centered">
            <h4>VS</h4>
        </div>
        <div class="col-xs-12">
            <div class="form-bg-1"><input type="text" id="name_2" class="form-control" placeholder="<?=$datos2->nombre;?>"></div>
        </div>
        <div class="col-xs-12 col-centered">
            <br>
            <a class="verh2h button_medium" onclick="saveAndShowH2h();">Mostrar H2H</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-6">
            <p class="text-center"><img src="<?=$imagen1?>" alt="" class="img-circle style img-responsive" style="height:175px"></p>
            <div class="col-centered">
                <h5><a href="<?php echo base_url()?>player/jugador/<?=$datos1->id;?>"><?=$datos1->nombre;?></a></h5>
                Rank: <?=$datos1->rank_act?>
            </div>
        </div>
        <div class="col-xs-6">
            <p class="text-center"><img src="<?=$imagen2?>" alt="" class="img-circle style img-responsive" style="height:175px"></p>
            <div class="col-centered">
                <h5><a href="<?php echo base_url()?>player/jugador/<?=$datos2->id;?>"><?=$datos2->nombre;?></a></h5>
                Rank: <?=$datos2->rank_act?>
            </div>
        </div>
    </div>
    
    <div class="row" style="margin-top:25px;">
        <div class="col-xs-3">
            &nbsp;
        </div>
        <div class="col-xs-2 col-centered">
            <h2><?=$ganados1;?></h2>
            wins
        </div>
        <div class="col-xs-2">
            <h1 class="col-centered">VS</h1>
        </div>
        <div class="col-xs-2 col-centered">
            <h2><?=$ganados2;?></h2>
            wins
        </div>
        <div class="col-xs-3">
            &nbsp;
        </div>
    </div>
    
    <hr>
    
    <div class="row" style="padding: 10px;">
        <div class="col-xs-4">
            <h5><?=$datos1->edad;?></h5>
        </div>
        <div class="col-xs-4 col-centered">
            Edad
        </div>
        <div class="col-xs-4" style="text-align:right;">
            <h5><?=$datos2->edad;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-xs-4">
            <h5><?=$datos1->fecha_nac;?></h5>
        </div>
        <div class="col-xs-4 col-centered">
            Fecha de nacimiento
        </div>
        <div class="col-xs-4" style="text-align:right;">
            <h5><?=$datos2->fecha_nac;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-xs-4">
            <h5><?=$datos1->altura;?></h5>
        </div>
        <div class="col-xs-4 col-centered">
            Altura
        </div>
        <div class="col-xs-4" style="text-align:right;">
            <h5><?=$datos2->altura;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-xs-4">
            <h5><?=$datos1->plays;?></h5>
        </div>
        <div class="col-xs-4 col-centered">
            Plays
        </div>
        <div class="col-xs-4" style="text-align:right;">
            <h5><?=$datos2->plays;?></h5>
        </div>
    </div>
    
    <div class="row" style="padding: 10px;">
        <div class="col-xs-4">
            <h5><?=$datos1->jganados;?> / <?=$datos1->jperdidos;?></h5>
        </div>
        <div class="col-xs-4 col-centered">
            Ganados/Perdidos
        </div>
        <div class="col-xs-4" style="text-align:right;">
            <h5><?=$datos2->jganados;?> / <?=$datos2->jperdidos;?></h5>
        </div>
    </div>
    </div><!--  End container --> 
    
    
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

 <script>
      
      //call ajax to get name
      //fill tags with those names
      //when look for , get name from input and get id from that name and do the same
    $( function() {
        
        $.ajax({
                type:'POST',
                url:'<?php echo base_url("torneos/getNames"); ?>',
                //data:{'id1':id1,'id2':id2},
                success:function(data){
                    //alert(data);
                    
                    var sld = data.split(',');                    
                    $( "#name_1" ).autocomplete({
                        source: sld
                    });
                    $( "#name_2" ).autocomplete({
                        source: sld
                    });
                    //alert(data);
                    //location.href = "<?php echo base_url();?>torneos/headtohead";
                }
            });
            
       /*var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];*/
    /*$( "#tags" ).autocomplete({
        source: availableTags
    });*/
    
    });
  
  
  </script>
</body>
</html>
