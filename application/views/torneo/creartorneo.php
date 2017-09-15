<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("header");
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

            <h3 class="title">Crear torneo</h3>
                 
            <!--form name="creaRound" method="post" action="<?php echo base_url();?>Torneos/generaRoundRobin">
		<input type="text" name="no_jugadores" value="" placeholder="Número de Jugadores">
		<button>Enviar</button>
            </form-->              
        </div>
    	
    </div><!--  End col-md-6 --> 
    
    <form method="post" name="formulario" action="<?php echo base_url();?>torneos/creartorneo"> 
    <input name="array" type="hidden" name="array" value="">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Nombre del torneo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del torneo" style="background-color: #fff; border: 1px solid #00aeef;">
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                <label>Selecciona el tipo de torneo a crear:</label>
                <select class="form-control" name="tipo" style="background-color: #fff; border: 1px solid #00aeef;">
                    <option value="1">Round Robin</option>
                    <option value="2">Eliminación Directa</option>
                </select>
            </div>
            </div>

        </div>
        <div class="row"><br></div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Fecha de inicio:</label>
                    <input type="date" class="form-control" name="fecha" placeholder="Fecha de inicio" style="background-color: #fff; border: 1px solid #00aeef;">
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lugar:</label>
                    <select class="form-control" name="lugar" style="background-color: #fff; border: 1px solid #00aeef;">
                        <option value="1">Sportway Izcalli</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Tipo de campo:</label>
                    <select class="form-control" name="campo" style="background-color: #fff; border: 1px solid #00aeef;">
                        <option value="Pasto">Pasto</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row"><br></div>
        <div class="row">
            <div class="col-md-8">
			<label>Selección de Jugadores</label>
			<table style=" border: 1px solid #00aeef;" border="2">
			<thead>
			<th></th>
			<th>Jugadores</th>
			<th></th>
			</thead>
			<tbody>
			<?php 
			if($jugadores){
				foreach($jugadores as $fila){
					echo "
					<tr>
					<td><input type='button'  name='jugadores' onclick='agregar(".$fila->id.")' value='>'></td>					
					<td id='".$fila->id."'>".$fila->nombre."</td>
					
					</tr>
					";
				}
			}
			?>

			</tbody>
			</table>
            </div>
            

        </div>		
        <div class="row"><br></div>

        <div class="row">
            <div class="col-md-4">

            </div>
        </div>        
    </div>
    
    <!--Modal -->
    <div class="container">
        <!-- Modal -->
        <div class="col-sm-4"></div>
        <div class="col-sm-4 centered" style="text-align:center;">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmar">Iniciar registro de torneo</button>
        
        <div class="modal fade" id="confirmar" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <!--div class="modal-header">
              </div-->
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">¿Desea crear el registro para el torneo?</h4>
              </div>
              <div class="modal-footer">
                  <input type="submit" id="enviar"  class="btn btn-info btn-lg" value="Si">
                  <!--a href="" type="button" class="btn btn-info btn-lg" data-dismiss="modal">Sí</a-->
                  <a href="" type="button" class="btn btn-default btn-lg" data-dismiss="modal">No</a>
              </div>
            </div>

          </div>
        </div>
        </div>
        <div class="col-sm-4"></div>

    </div>
    
    </form>
    
    
        
<?php 
//$this->load->view("footer");
?>        
 
 <div id="toTop">Back to Top</div>  

<?php 
    $this->load->view("scriptfoo");
?> 
<script>
var jugadores = [];
 function agregar(id){
	var color=document.getElementById(id).style.backgroundColor;
	if(color.length == 0){
	document.getElementById(id).style.backgroundColor = '#09f719';
	jugadores.push(id);
	}else{
	document.getElementById(id).style.backgroundColor = '';
	quitarArreglo(id);
	}
	var arv = jugadores.toString();
	document.formulario.array.value=arv;
	
 }
function quitarArreglo(id){
	var index = jugadores.indexOf(id);
	if (index > -1) {
		jugadores.splice(index, 1);
	}	
} 
/*$("#formulario").submit(function () {
	var formData = $("#formulario").serialize();
      var destino="<?php echo base_url();?>Torneos/generaRoundRobin";        
                    
                    $.ajax({
                        url: destino,
                        type: "POST",
                        data: formData+"&jugadores="+jugadores,
                        contentType: false,
                        processData: false,
                        success: function (datos)
                        {
							alert(datos);
                           // $("#resultado").html(datos);
                        }
                    });
                    return false;
            });*/
</script>
</body>
</html>
