jQuery(document).ready(function(){

	$('#jugador').keyup(function(){
	var base_url = window.location.pathname;
	var nombre=$(this).val();
	
	$.post('http://localhost/CodeTenis/player/buscarJugador',{ nombre : nombre},function(data){
		if(data){
			$("#res_jugadores").html(data);
		}else{
			$("#res_jugadores").html('');
		}
	});	
	});
});