<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<script>
    
    jQuery(document).ready(function(){

	$('#jugador').keyup(function(){
	var nombre=$(this).val();
	
	$.post('<?php echo base_url();?>player/buscarJugador',{ nombre : nombre},function(data){
		if(data){
			$("#res_jugadores").html(data);
		}else{
			$("#res_jugadores").html('');
		}
	});	
	});
});
 
</script>