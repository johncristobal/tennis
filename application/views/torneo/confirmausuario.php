<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
?>            

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

            <h3 class="title">Gracias por confirmar tu encuentro</h3>
            <?php $mesesN = array("January"=>"Enero","February"=>"Febrero","March"=>"Marzo","April"=>"Abril","May"=>"Mayo","June"=>"Junio","July"=>"Julio","August"=>"Agosto","September"=>"Septiembre","October"=>"Octubre","November"=>"Noviembre","December"=>"Diciembre");?>
            
            <div class="row" style="text-align: center; font-size: 20px;">
                Te esperamos en tu siguiente partido.
                <br>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center">
                    <a href="<?php echo base_url();?>" class="btn btn-info">Gracias </a>
                </div>
                <div class="col-md-4"></div>
            </div>
		              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
    <script type="text/javascript">
    $('#blankCheckbox').change(function() {
        debugger;
        var c = this.checked;
        $(':checkbox').prop('checked',c);
        //var checkboxes = $(this).closest('form').find(':checkbox');
            //checkboxes.prop('checked', $(this).is(':checked'));
    });
    </script>
        
<?php $this->load->view("footer");?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 

</body>
</html>
