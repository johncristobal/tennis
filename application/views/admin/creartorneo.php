<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--<![endif]-->

<?php   
    $this->load->view("head");
    $this->load->view("headeradmin");
?>            
<script>
    var jugadores = [];
</script>

  <style>
        .form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
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
    
        <div class="panel-group add_bottom_30" id="accordion">

            <h3 class="title">Crear torneo</h3>
                 
            <!--form name="creaRound" method="post" action="<?php echo base_url();?>Torneos/generaRoundRobin">
		<input type="text" name="no_jugadores" value="" placeholder="Número de Jugadores">
		<button>Enviar</button>
            </form-->              
        </div>
    	
    </div><!--  End col-md-6 --> 
        
    <form method="post" name="formulario" action="<?php echo base_url();?>admin/creartorneo"> 
    <input name="array" type="hidden" name="array" value="">
    <div class="container">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Registro de torneo</a></li>
          <li><a data-toggle="tab" href="#menu1">Seleccionar jugadores</a></li>
        </ul>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3>Registro de datos</h3>
                </div>
                <div class="col-md-4"></div>
            </div>
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
        </div>
          
        <div id="menu1" class="tab-pane fade">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h3>Selección de jugadores</h3>
                </div>
                <div class="col-md-4"></div>
            </div>

            <div class="row centered">
            <div class="col-md-12 centered">

                <table class="table centered">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                    <!--tr>
                        <td>
                            
                            <div class='[ form-group ]'>
                                        <input type="checkbox" onClick="toggle(this)" autocomplete='off'>
                                
                                        <div class='[ btn-group ]'>
                                            <label for='' class='[ btn btn-primary ]' onclick='toggle(this)'>
                                                <span class='[ glyphicon glyphicon-ok ]'></span>
                                                <span>&nbsp;</span>
                                            </label>
                                            <label for='' class='[ btn btn-default active ]' style='width:200px;' onclick='toggle(this)'>
                                                Seleccionar todos
                                            </label>
                                        </div>  
                                    </div>
                        </td>
                    </tr-->    
            
                <?php 
                if($jugadores){
                    
                    $i=0;
                    echo "<tr>";
                    
                    foreach($jugadores as $fila){
                        /*echo "
                        <tr>
                        <td><input type='button' class='button' name='jugadores' onclick='agregar(".$fila->id.")' value='>'></td>					
                        <td id='".$fila->id."'>".$fila->nombre."</td>

                        </tr>
                        ";*/
                        
                        if($i>3){
                            echo "</tr>";
                            echo "<tr>";
                            $i=0;                            
                        }
                        
                        echo "                            
                                <td>
                                    <div class='[ form-group ]'>
                                        <input type='checkbox' name='jugadores' id='".$fila->id."' autocomplete='off'>
                                
                                        <div class='[ btn-group ]'>
                                            <label for='".$fila->id."' class='[ btn btn-primary ]' onclick='agregar(".$fila->id.")'>
                                                <span class='[ glyphicon glyphicon-ok ]'></span>
                                                <span>&nbsp;</span>
                                            </label>
                                            <label for='".$fila->id."' class='[ btn btn-default active ]' style='width:200px;' onclick='agregar(".$fila->id.")'>
                                                ".$fila->nombre."
                                            </label>
                                        </div>  
                                    </div>
                                </td>
                            ";
                        
                        $i++;
                    }
                }
                ?>

                </tbody>
                </table>
            </div>
        </div>	  
            
        <!--Modal -->
        <div class="row">
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
            
        </div>
        </div>
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
 function agregar(id){
	//var color=document.getElementById(id).style.backgroundColor;
	//if(color.length == 0){
	if(!jugadores.includes(id)){
	//document.getElementById(id).style.backgroundColor = '#09f719';
            jugadores.push(id);
	}else{
	//document.getElementById(id).style.backgroundColor = '';
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

function toggle(source) {
    var checkboxes = document.getElementsByName('jugadores');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
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
