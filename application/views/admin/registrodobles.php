<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("headeradmin");
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
        
        function getInfoLoad(){
            //alert(id1);
            //alert(id2);
            var value1 = $("#name_1").val();
            var value2 = $("#name_2").val();

            //get id from catch dat from headtohead
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("admin/salvarpareja"); ?>',
                data:{'name1':value1,'name2':value2},
                success:function(data){                    
                    //alert(data);
                    location.href = "<?php echo base_url();?>admin/registrodobles";
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

    <h3 class="title">Registro torneo dobles</h3>
    
    <div class="row">
        <div class="col-md-4">
            Buscar jugador 1<br><br>
            <div class="form-bg-1 ui-widget"><input type="text" id="name_1" class="form-control" placeholder="Nombre..."></div>
        </div>
        <div class="col-md-1 col-centered">
            <h4>&nbsp;</h4>
        </div>
        <div class="col-md-4">
            Buscar jugador 2<br><br>
            <div class="form-bg-1"><input type="text" id="name_2" class="form-control" placeholder="Nombre..."></div>
        </div>
        <div class="col-md-3 col-centered">
            <br><br>
            <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Inscribir pareja</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col -md-8">
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Inscribir pareja</h4>
              </div>
              <div class="modal-body">
                <h4 class="col-md-12 col-xs-12 col-sm-12 text-center centered">                       
                    ¿Deseas inscribir esta pareja?
                </h4>
              </div>
              <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-info savebanner" onclick="getInfoLoad()" value="Subir">Inscribir</button>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8">
            <h3> Parejas inscritas </h3>
            <br>
        </div>
        <div class="col-sm-8 col -md-8 text-center">
        <!-- Modal -->
        <?php if(count($parejas) == 0)
            {
        ?>
        <?php
            } else {
                foreach ($parejas as $value) {
                    $name1 = $this->Torneomodel->getNameFromId($value->id_pareja1);
                    $name2 = $this->Torneomodel->getNameFromId($value->id_pareja2);
        ?>
        <div class="row">    
            <div class="col-sm-2 col-md-2">
                <?=$value->id?>
            </div>
            <div class="col-md-4">
                <?=$name1?>
            </div>
            <div class="col-md-4">
                <?=$name2?>
            </div>
        </div>
        <?php 
                }
            } 
        ?>
        </div>
    </div>
    <!--div class="row">
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
    </div-->
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
