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
    

    <h3 class="title">Iniciar sesión Admin</h3>
        
    <hr>
    <div class="row">
        
        <div class="col-md-3 text-center"></div>
        <div class="col-md-6 text-center">
            <form method="post" action="<?php echo base_url();?>admin/inicio">
            <div class="form-bg-1 ui-widget"><input type="text" id="name_1" class="form-control" placeholder="usuario"></div>
            <br>
            <div class="form-bg-1 ui-widget"><input type="text" id="name_2" class="form-control" placeholder="password"></div>
            <br>
            <input type="submit" class="button_small" value="Enviar">
            </form>
        </div>
        <div class="col-md-3 text-center"></div>

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
