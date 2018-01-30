<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    //$this->load->view("header");
?>            
<style>
    .col-centered{
        text-align: center;
    }
    
    .no-padding{
        padding: 0px;
    }
    
    .tope{
        margin-top: 12px;
    }
</style>

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
    

    <h3 class="title">Registrate a Madrugaytors</h3>
        
    <hr>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12 col-xs-12">
            <span>Los campos marcados con * son obligatorios</span>
            <br>
        </div>
    </div>
    <!--form method="post" action="<?php echo base_url();?>users/registrate"-->
    <?php echo form_open_multipart('users/registrate');?>

    <div class="row">
        <div class="col-md-12 col-xs-12 text-left no-padding tope">
            <label class="text-danger"><?php echo validation_errors(); ?></label>
            <label class="text-danger"><?php echo $error; ?></label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-3 text-right no-padding tope">
            <label>* Nombre: </label>
        </div>
        <div class="col-md-6 col-xs-9 text-center">
            <div class="form-bg-1 ui-widget"><input type="text" name="nombre" id="nombre" class="form-control" placeholder=""></div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-3 text-right no-padding tope">
            <label>* Correo: </label>
        </div>
        <div class="col-md-6 col-xs-9 text-center">
            <div class="form-bg-1 ui-widget"><input type="email" name="correo" id="correo" class="form-control" placeholder=""></div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-3 text-right no-padding tope">
            <label>* Edad: </label>
        </div>
        <div class="col-md-6 col-xs-9 text-center">
            <div class="form-bg-1 ui-widget"><input type="number" name="edad" id="edad" class="form-control" placeholder=""></div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-3 text-right no-padding tope">
            <label>Fecha de nacimiento: </label>
        </div>
        <div class="col-md-6 col-xs-9 text-center">
            <div class="form-bg-1 ui-widget"><input type="text" name="nacimiento" id="nacimiento" class="form-control" placeholder="" onfocus="(this.type='date')" onblur="(this.type='text')"></div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-3 text-right no-padding tope">
            <label>Telefono: </label>
        </div>
        <div class="col-md-6 col-xs-9 text-center">
            <div class="form-bg-1 ui-widget"><input type="tel" name="telefono" id="telefono" class="form-control" placeholder=""></div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-xs-3 text-right no-padding tope">
            <label>Sube foto: </label>
        </div>
        <div class="col-md-6 col-xs-9 text-center">
            <div class="form-bg-1 ui-widget"><input type="file" title="Selecciona una foto" name="foto" id="foto" class="form-control" placeholder="" value="Subir foto"></div>
            <br>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center tope">
        <input type="submit" class="button_small" value="Enviar">
        </div>
    </div>

    </form>
    
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
