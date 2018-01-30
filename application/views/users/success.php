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
    

    <h3 class="title">Registro éxitoso</h3>
        
    <hr>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12 col-xs-12">
            <span>Hemos enviado un correo a tu bandeja de entrada<br>
            Espera pronto noticias de nosotros acerca de los torneos que se acercan...</span>
            <br>
        </div>
    </div>
    
    <div class="row text-center" style="margin-bottom:10px;">
        <div class="col-md-12 col-xs-12">
            <button class="button_small" onclick="window.location.href='<?php echo base_url()?>';">GRACIAS</button>
            <br>
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
