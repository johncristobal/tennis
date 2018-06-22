<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Moon
 */
class admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        //load model
        $this->load->model('Torneomodel');
        $this->load->model('Jugador');
        $this->load->model('Estadisticasmodel');

        $this->load->library("email");

    }
    //put your code here
    
    public function index(){
        $this->load->view('admin/login');
    }
    
    public function inicio(){
        $this->session->set_userdata('admin','1');
        
        //Load data from Torneos and show into view calendario        
        $this->load->model('Torneomodel');        
        $data['datos'] = $this->Torneomodel->gettorneos();

        $this->load->view('admin/calendario',$data);        
    }
    
    //solo el admin puede registrar torneo
    public function registrotorneo(){
        //vista form registro torneo
        //cargamos modelo 
        $this->load->model('Torneomodel');
        $data['jugadores']=$this->Torneomodel->getJugadores();
        $this->load->view('admin/creartorneo',$data);

        //vista torneo RR
        //$this->load->view('torneo/creartorneorr');
        
        //vista torneo RR
        //$this->load->view('torneo/creartorneoel');
    }
    
    //admin crea trorneos
    public function creartorneo(){
        //vista form registro torneo
        //$this->load->view('torneo/creartorneo');
        if($this->input->post()){
			
            //faltan validaciones....
            //Guardamos informacion en seson
            $jugadores=explode(',',$this->input->post('array')); 
            $data['jugadores']=$jugadores;
            $data['nombre'] = $this->input->post('nombre');
            $data['tipo_torneo'] = $this->input->post('tipo');
            $data['fecha'] = $this->input->post('fecha');
            $data['lugar'] = $this->Torneomodel->getLugar($this->input->post('lugar'));
            $data['campo'] = $this->Torneomodel->getCampo($this->input->post('campo'));//$this->input->post('campo');

            $newdata = array(
                'nombre' => $this->input->post('nombre'),
                'tipo' => $this->input->post('tipo'),
                'fecha' =>  $this->input->post('fecha'),
                'lugar' =>  $this->input->post('lugar'),
                'campo' =>  $this->input->post('campo'),
                'jugadoresTorneo'=>$jugadores
            );

            $this->session->set_userdata($newdata); 
        
            //Si es 1..Rodun robin y lanzamos------------------
            if($data['tipo_torneo'] == "1"){
                //vista torneo RR
                //$this->load->view('torneo/creartorneorr',$data);

                $total=count($jugadores);//$this->input->post('no_jugadores');
                $jugadoresSelected=$this->session->userdata('jugadoresTorneo');
                $this->generaRoundRobin($total,$jugadoresSelected);
            }
            //Caso 2.....elimincacion directa.------------------
            else if($data['tipo_torneo'] == "2"){
                $data['datarank']=$this->Estadisticasmodel->getAllRankings();

                //echo count($buscar['datarank']);
                //vista form registro torneo
                $this->load->view('admin/creartorneoel',$data);
            }
        }else{
            echo "error";
        }        
    }
   
    public function generaRoundRobin($total,$jugadoresSelected){		
        //if($this->input->post()){
	
        //$total=$this->input->post('no_jugadores');
        //$jugadoresSelected=$this->session->userdata('jugadoresTorneo');

        for($i=0;$i<count($jugadoresSelected);$i++){
            $contador=count($jugadoresSelected);
            @$where.=" id=".$jugadoresSelected[$i];
            if(($i+1)<$contador){
                $where.=" OR ";	
            }
        }

        $buscar=$this->Torneomodel->selectJugadores($where);
        $jugadores=array();
        if($buscar){
            foreach($buscar as $fila){
                array_push($jugadores,$fila->nombre);
            }
        }

        if(($total%2)==0){
            $calen = $this->roundRobinPar($total,$jugadores);
            //load view with data
            $data['calendario'] = $calen;
            $data['total'] = $total;

            $newdata = array(
               'calen_par' => $calen,
               'total' => $total
               );

            $this->session->set_userdata($newdata);

            $this->load->view('admin/res_torneo_rrp',$data);
        }else{
            $calen = $this->roundRobinImpar($total,$jugadores);
            //load view with data

            $data['calendario'] = $calen;
            $data['total'] = $total;

            $newdata = array(
               'calen_impar' => $calen,
               'total' => $total
               );

            $this->session->set_userdata($newdata);

            $this->load->view('admin/res_torneo_rrip',$data);
        }
        //}else{
        //    echo "error";
        //}
    }
    
    public function roundRobinPar($total,$jugadores){
	$calendario[$total][$total-1]="";
	$cont=0;
	//Algoritmo de ordenamiento 
        for($i=0;$i<$total-1;$i++){
            $aux=0;
            for($j=0;$j<$total;$j++){
                $posicion=$cont+$j;	
                if($posicion>=$total-1){
                    $calendario[$i][$j]=$jugadores[$aux];
                    $aux++;					
                }else{
                    $jugadores[$posicion];	
                    $calendario[$i][$j]=$jugadores[$posicion];			
                }
            }
            $cont++;
            //echo "<br>";
        }
        
	//Algoritmo para poner el último digito al final de cada fila
	for($i=0;$i<$total;$i++){
            $calendario[$i][$total-1]=$jugadores[$total-1];
        }
	
	//Algoritmo para hacer los enfrentamientos, el primero de la fila va contra el último y así... :P 1-6 2-5-3-4 para la primera fecha
	/*for ($i=0;$i<$total-1;$i++){
            for($j=0;$j<($total/2);$j++){
                echo $calendario[$i][$j]." vs ".$calendario[$i][$total-1-$j]." / ";
            }
            echo "<br>";
	}
	echo "<br>";*/	
        
        return $calendario;
    }
    
    public function roundRobinImpar($total,$jugadores){
        $calendario[$total][$total]="";
        $cont=0;
        for($i=0;$i<=$total-1;$i++){	
            $aux=0;
            for($j=0;$j<$total;$j++){
                $posicion=$cont+$j;	
                if($posicion>$total-1){
                    $calendario[$i][$j]=$jugadores[$aux];
                    $aux++;					
                }else{				
                    $calendario[$i][$j]=$jugadores[$posicion];			
                }

                // echo $calendario[$i][$j]." ";
            }
            $cont++;
            //echo "<br>";
        }	

        /*echo "<br>";
        //Algoritmo para los enfrentamientos
        for ($i=0;$i<=$total-1;$i++){
            echo $i.".-";
            //echo $jugadores[4]."<br>";
            for($j=0;$j<(($total-1)/2);$j++){
                echo $calendario[$i][$j]." vs ".$calendario[$i][$total-2-$j]."/ ";
            }
            echo " [Descansa ".$calendario[$i][$total-1]."]";
            echo "<br>";
        }*/
        
        return $calendario;
    }
    
    public function lastid(){
        $tabla = 'torneo';
        $id = $this->Torneomodel->getLastId($tabla);
        if($id)
            echo $id->id;
        else
            echo "0";
    }

    //save torneo
    public function saveTorneo(){
        
        //valida tipo torneo de sesion
        //si es 1 => rr+ --- else directa
        //get last id to create a new one       
        $tabla = 'torneo';
        $id = $this->Torneomodel->getLastId($tabla);
        if($id){
            $idtorneo = $id->id+1;
        }
        else{
            $idtorneo = "0";
        }

        //for round 1 its the same, round 2 +1, round 3 plus7, round 4 pluss = (+1+7)        
        date_default_timezone_set('America/Mexico_City');
        $fechatoupdate = new DateTime($this->session->userdata('fecha'));
        
        $data = array(
            "id" => $idtorneo,
            'nombre' => $this->session->userdata('nombre'),
            'tipo' => $this->session->userdata('tipo'),
            'fecha_inicio' => $this->session->userdata('fecha'),
            'fecha_fin' => "0000/00/00",
            'lugar' => $this->session->userdata('lugar'),
						'estatus'=>1
        );
        
        $res = $this->Torneomodel->saveTorneo($data);
        
        $contador = 0;
        if($res == "-1"){
            echo "error";
        }else{
            //save partidos...use the same for from thwe view...        
            $total=$this->session->userdata('total');
            //torneo con jugadores par
            if(($total%2)==0){
                $calendario=$this->session->userdata('calen_par');
                for ($i=0;$i<$total-1;$i++){
                    //ronda $i
                    //get date to save round
                    if($contador == 2){
                        $fechatoupdate->modify('+6 day');
                        $contador = 0;
                    }
                    $fechatoupdate->modify('+'.$contador.' day');
                    $contador += 1;
                    
                    for($j=0;$j<($total/2);$j++){   
                        $games['resultado'] = "0"; 

                        $games['fktorneo'] = $idtorneo; 
                        $games['ronda'] = $i; 
                        //jugador 1 
                        $games['fkjugador1'] = $this->Torneomodel->getIdFromName($calendario[$i][$j])->id;
                        //jugador 2
                        $games['fkjugador2'] = $this->Torneomodel->getIdFromName($calendario[$i][$total-1-$j])->id;
                        $games['fecha'] = $fechatoupdate->format('y-m-d');
                        $games['ganador'] = "0";
                        $this->Torneomodel->saveGames($games);
                    }
                }
            }else{
                //impar
                $calendario=$this->session->userdata('calen_impar');                
                
                for ($i=0;$i<=$total-1;$i++){
                                        
                    //get date to save round
                    if($contador == 2){
                        $fechatoupdate->modify('+6 day');
                        $contador = 0;
                    }
                    $fechatoupdate->modify('+'.$contador.' day');
                    $contador += 1;
                    
                    for($j=0;$j<(($total-1)/2);$j++){
                        //jugador 1
                        $games['fkjugador1'] = $this->Torneomodel->getIdFromName($calendario[$i][$j])->id;
                        //jugador 2
                        $games['fkjugador2'] = $this->Torneomodel->getIdFromName($calendario[$i][$total-2-$j])->id;
                          
                        $games['resultado'] = "0"; 
                        $games['ganador'] = "0";
                        $games['fktorneo'] = $idtorneo; 
                        $games['ronda'] = $i; 
                        $games['fecha'] = $fechatoupdate->format('y-m-d');
                        $this->Torneomodel->saveGames($games);
                    }
                    //descansa                    
                    $games['ganador'] = "0";
                    //descansa                    
                    $games['fkjugador1'] = $this->Torneomodel->getIdFromName($calendario[$i][$total-1])->id;
                    //descansa                    
                    $games['fkjugador2'] = $this->Torneomodel->getIdFromName($calendario[$i][$total-1])->id;
                    $games['resultado'] = "0"; 
                    $games['fktorneo'] = $idtorneo; 
                    $games['ronda'] = $i; 
                    $games['fecha'] = $fechatoupdate->format('y-m-d');
                    $this->Torneomodel->saveGames($games);
                }
            }
        }
        //return redirec(base_url());
        $this->load->model('Torneomodel');        
        $data['datos'] = $this->Torneomodel->gettorneos();
        
        //logica para separar los torneos por meses....
        //data[enero] = datos...
        //data[febrerp] = datos...
        
        //$this->load->view('torneo/calendario',$data);                
        redirect('admin/inicio', 'refresh');
        //echo $calendario;
        //when finish save data---delete session info        
    }

    //show resultados to update data
    public function resultados($i){        
        //id from the tournament...
        //get data from database
        //get games fktorneo
        $datatorneoo = $this->Torneomodel->getTorneoData($i);
        
        //save in session this torneo id...
        $this->session->set_userdata('idtorneo',$i);
        
        switch ($datatorneoo[0]->tipo) {
            case 1:
                $partidos = $this->Torneomodel->getGames($i);
                //$estats = $this->Estadisticasmodel->getDataPlayer($i);
                //echo "...".$partidos->ronda;
                $data['torneodata'] = $datatorneoo;
                $data['partidos'] = $partidos;
                
                /*echo count($partidos);
                echo "<br>";
                //echo $partidos;
                foreach ($partidos as $value) {
                    echo "Cantidad de datos en value: ".count($value)."<br>";
                    echo "Ronda: n<br>";
                    foreach ($value as $rondas) {
                        
                        echo "Jugador1 = ".$rondas->fkjugador1."<br>";
                        echo "Jugador2 = ".$rondas->fkjugador2."<br>";
                    }
                    //echo $value[0]->fkjugador1."<br>";
                    //echo $value[1]->fkjugador1."<br>";
                }*/
                $this->load->view('admin/resultadorrobin',$data);            
                break;
            case 2:
                //$this->load->view('torneo/resultado');            
                break;
            default:
                break;
        }
    }
    
    //function to update results
    public function updateTorneo(){
        $post_data = $this->input->post();
        $extra = $this->input->post('h2hselected');
        $this->Torneomodel->actualizaTorneo($post_data,$extra);
				$this->updateStatistics();
        $id = $this->session->userdata('idtorneo');
        redirect('admin/resultados/'.$id);
        
    }	
    
    //function to update estadisticas_jugador
    public function updateStatistics(){

            $totalJ=$this->Estadisticasmodel->getTotalPlayed();
            $totalG=$this->Estadisticasmodel->getTotalWon();
            if($totalJ){
                    foreach ($totalJ as $fila){
                            if($totalG){
                                    foreach ($totalG as $fila2){
                                            if($fila->fkjugador==$fila2->fkjugador){
                                                    $perdidos=$fila->total_jugados - $fila2->ganados;
                                                    $ganados=$fila2->ganados;
                                                    break;
                                            }else{
                                                    $perdidos=$fila->total_jugados;
                                                    $ganados=0;
                                            }

                                    }
                            $array=array(
                            'jganados'=>$ganados,
                            'jperdidos'=>$perdidos,
                            'Puntos'=>0,
                            'torneosj'=>0,
                            );
                            $this->Estadisticasmodel->updateStatistics($fila->fkjugador,$array);
                            }						
                            }

            }



    }

    //send mails with data
    public function sendMailsRememberGames(){
        
        $checks = $this->input->post();
        
        $jugadores = $this->Torneomodel->getJugadores();
        foreach ($jugadores as $jugador) {
            
            //de cada jugador, obtenogo sus rivales para mandar un solo correo
            $partidosjugadortemp = array();
            $partidorivales = array();
            foreach ($checks as $value) {
                //if value has data, then check selected, get values from partido with id 
                if($value != ""){
                    $partido = $this->Torneomodel->getPartidoFromId($value);    //obtengo partido
                    $partidorivales['idpartido'] = $value;                      //guardo id partido
                    if($jugador->id == $partido->fkjugador1){                   //if else para guardar rival
                        $partidorivales['idrival'] = $this->Torneomodel->getNameFromId($partido->fkjugador2);
                        $partidorivales['id_rival'] = $partido->fkjugador2;
                    }else if($jugador->id == $partido->fkjugador2){
                        $partidorivales['idrival'] = $this->Torneomodel->getNameFromId($partido->fkjugador1);                      
                        $partidorivales['id_rival'] = $partido->fkjugador1;
                    }else{
                        continue;
                    }
                    
                    $partidorivales['fecha'] = $partido->fecha;                 //guardo fecha

                    array_push($partidosjugadortemp, $partidorivales);
                }
            }
            
            if(count($partidosjugadortemp)>0)
            {                                                                   //tengo partidos, mando correos
                $data['nombre'] = $jugador->nombre;
                $data['idjugador'] = $jugador->id;
                $data["datos"] = $partidosjugadortemp;
                // en $partidosjugadortemp tengo los rivales del jugador en foreach
                //en vezz de cargar vista, se envia correo a los jugadores...1

                // enviar correo
                $correo = $jugador->correo;
                $this->sendMailRememberGame($correo, $data);
                
                //mostrar info en vista unicamente
                //$this->load->view('correos/recordatorio_juego',$data);
                //break;
            }
        }
        
        //when finish, load...
        redirect('admin/inicio');
    }

    public function saveTemporalFecha(){
        $fecha = $this->input->post('fecha');        
        $this->session->set_userdata('fecha', $fecha);
        echo "si";
    }
    
    public function rememberMailFecha(){
        
        $fecha = $this->session->userdata('fecha');    
        $date = new DateTime($fecha);    //chenage to datetime
        
        $partidos_fin_semana_from_jugador = $this->Torneomodel->getProximosPartidosFromFecha($fecha,"","");  //get partidos del sabado
        $fechas = $this->Torneomodel->getFechasPartidos();

        /*$jugadores = $this->Torneomodel->getJugadores();
        foreach ($jugadores as $jugador) {
            $partidos_fin_semana_from_jugador = $this->Torneomodel->getProximosPartidos($fechasabado->format('Y-m-d'),$fechadomingo->format('Y-m-d'),$jugador->id);  //get partidos del sabado
            
            if ($partidos_fin_semana_from_jugador != ""){
                //$data['nombre'] = $jugador->nombre;
                $data[$jugador->id] = $partidos_fin_semana_from_jugador;
            }
            //player and games - send correo
            //$this->load->view('correos/recordatorio_juego',$data);            
        }*/
        $data["datos"] = $partidos_fin_semana_from_jugador;
        $data["fechas"] = $fechas;
        $this->load->view('admin/recordatorio',$data);                
    }
    
    //funtion to show next games
    public function rememberMail(){
        //get players actives
        //recupero los partidos cuyas fechas sean el proximo fin de semana con base a la fecha actual
        //se enviaran los jueves/viernes
        //si es jueves/viernes, recupero los juegos de sabado y domingo proximos
        //si es otro dia, mandamos leyenda que no hay juegos proximos :)
                
        //si hay partidos, mostramos lista de partidos con un check de aquien le mandaremos recordatorio
        //check jugador a vs jugador b
        //los que tengan check, mandamos correo:
        /*
         * from jugador get all games and send mail with all games
         */
        
        //get list of dates
        $fechas = $this->Torneomodel->getFechasPartidos();
        
        $fechahoy = date("Y-m-d");          //get date       
        $date = new DateTime($fechahoy);    //chenage to datetime
        $fechahoytemp = date("Y-m-d");      //get date       
        $datetemp = new DateTime($fechahoytemp);    //chenage to datetime
        $fechasabado = $date->modify('+3 day');    //fecha sabado en teoria
        $fechadomingo = $datetemp->modify('+2 day');    //fecha sabado en teoria
        
        $partidos_fin_semana_from_jugador = $this->Torneomodel->getProximosPartidos($fechasabado->format('Y-m-d'),$fechadomingo->format('Y-m-d'),"");  //get partidos del sabado
            
        /*$jugadores = $this->Torneomodel->getJugadores();
        foreach ($jugadores as $jugador) {
            $partidos_fin_semana_from_jugador = $this->Torneomodel->getProximosPartidos($fechasabado->format('Y-m-d'),$fechadomingo->format('Y-m-d'),$jugador->id);  //get partidos del sabado
            
            if ($partidos_fin_semana_from_jugador != ""){
                //$data['nombre'] = $jugador->nombre;
                $data[$jugador->id] = $partidos_fin_semana_from_jugador;
            }
            //player and games - send correo
            //$this->load->view('correos/recordatorio_juego',$data);            
        }*/
        $data["datos"] = $partidos_fin_semana_from_jugador;
        $data["fechas"] = $fechas;
        $this->load->view('admin/recordatorio',$data);
    }
    
    public function sendMailRememberGame($correo,$data){
        
        $configmail['protocol']    = 'pop3'; 				
        $configmail['smtp_host']    = 'p3plcpnl0857.prod.phx3.secureserver.net'; 
        $configmail['smtp_port']    = 995; 
        $configmail['smtp_timeout'] = '20'; 
        $configmail['smtp_user']    = 'hola@madrugaytors.com'; 
        $configmail['smtp_pass']    = 'emporiowhite'; 
        $configmail['charset']    = 'utf-8'; 
        $configmail['newline']    = "\r\n"; 
        $configmail['mailtype'] = 'html'; 
        $configmail['validation'] = TRUE;      
        $this->email->initialize($configmail);
                
        $datos=$this->load->view("correos/recordatorio_juego",$data,TRUE);					
        $this->email->from('hola@madrugaytors.com', 'Tennis');
        $this->email->to($correo);
        $this->email->cc('nowoscmexico@gmail.com');
        $this->email->subject('Recordatorio partido...');          
        $this->email->message($datos);	
        $this->email->send();
    }

    //--------------------get info de los jugadores-----------------------------
    public function registro_jugador(){
        /*
         * get info from jugadores
         * show everything that you can change...
         * - 
         * 
         */
        $this->load->view('admin/editprofile_empty');

    }
    
    //--------------------get info de los jugadores-----------------------------
    public function jugadores(){
        /*
         * get info from jugadores
         * show everything that you can change...
         * - 
         * 
         */
        $jugadores = $this->Torneomodel->getJugadoresAdmin();
        $data["datos"] = $jugadores;
        //$data["fechas"] = $fechas;
        $this->load->view('admin/jugadores',$data);
    }
    
    //--------------------edit specifi player-----------------------------
    public function editar_jugaador($id){
        /*
         * get info from jugadores
         * show everything that you can change...
         * - 
         * 
         */
        $result=$this->Jugador->getInfo($id);
        $data['datos']=$result;
        $this->load->view('admin/editprofile',$data);
    }

    //--------------------edit specifi player-----------------------------
    public function update_player(){
        /*
         * get info from jugadores
         * show everything that you can change...
         * - 
         * 
         */
        
        $datos = $this->input->post();
        $id = $this->input->post('id');
        //VALIDATE DATA
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'Favor de completar este campo');
        $this->form_validation->set_error_delimiters('<label style="color:#f5c6cb">', '</label>'); 

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('edad', 'Edad', 'required');
        $this->form_validation->set_rules('fecha_nac', 'Fecha_nac', 'required');
        $this->form_validation->set_rules('altura', 'Altura', 'required');
        $this->form_validation->set_rules('plays', 'Plays', 'required');
        $this->form_validation->set_rules('Drive', 'Drive', 'required');
        $this->form_validation->set_rules('Reves', 'Reves', 'required');
        $this->form_validation->set_rules('Servicio', 'Servicio', 'required');
        $this->form_validation->set_rules('Velocidad', 'Velocidad', 'required');
        $this->form_validation->set_rules('Mentalidad', 'Mentalidad', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            //redirect('admin/editar_jugaador/'.$id);
            $result=$this->Jugador->getInfo($id);
            $data['datos']=$result;
            $this->load->view('admin/editprofile',$data);
        }
        else
        {
        $result=$this->Jugador->updatePlayer($datos,$id);

        if($result == -1){
            echo "error";
        }else{
            
            //create folder to save data
            $tempPath = "img/jugadores/".$id;//.$_FILES['file']['name']; // Target path where file is to be stored
            if (!is_dir($tempPath)) {
               mkdir($tempPath);
            }
            
            //validate if photo uploaded
            if(isset($_FILES["foto"]["type"])){
                //remember  chmod -R 777 .
                $sourcePath = $_FILES['foto']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "img/jugadores/".$id."/perfil.jpg";//.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                $foto = 1;
            }else{
                $foto = 0;                
            }
            //validate if photo uploaded
            if(isset($_FILES["foto_rank"]["type"])){
                //remember  chmod -R 777 .
                $sourcePath = $_FILES['foto_rank']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "img/jugadores/".$id."/h2h.png";//.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                $foto_rank = 1;
            }else{
                $foto_rank = 0;                
            }
            
            //when upload both photos, then update database
            $datos = array(
                "foto" => $foto,
                "foto_rank" => $foto_rank
            );
            $result_temp=$this->Jugador->updatePlayer($datos,$id);
        }
        
        echo "si";
        }
    }
    
    public function insert_player(){
        $datos = $this->input->post();
        
        //VALIDATE DATA
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'Favor de completar este campo');
        $this->form_validation->set_error_delimiters('<label style="color:#f5c6cb">', '</label>'); 

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('edad', 'Edad', 'required');
        $this->form_validation->set_rules('fecha_nac', 'Fecha_nac', 'required');
        $this->form_validation->set_rules('altura', 'Altura', 'required');
        $this->form_validation->set_rules('plays', 'Plays', 'required');
        $this->form_validation->set_rules('Drive', 'Drive', 'required');
        $this->form_validation->set_rules('Reves', 'Reves', 'required');
        $this->form_validation->set_rules('Servicio', 'Servicio', 'required');
        $this->form_validation->set_rules('Velocidad', 'Velocidad', 'required');
        $this->form_validation->set_rules('Mentalidad', 'Mentalidad', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/editprofile_empty');
        }
        else
        {

        $result=$this->Jugador->insertPlayer($datos);

        if($result == -1){
            echo "error";
        }else{
            
            //create folder to save data
            $tempPath = "img/jugadores/".$result;//.$_FILES['file']['name']; // Target path where file is to be stored
            if (!is_dir($tempPath)) {
               mkdir($tempPath);
            }
            
            //validate if photo uploaded
            if(isset($_FILES["file"]["type"])){
                //remember  chmod -R 777 .
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "img/jugadores/".$result."/perfil.jpg";//.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                $foto = 1;
            }else{
                $foto = 0;                
            }
            //validate if photo uploaded
            if(isset($_FILES["filerank"]["type"])){
                //remember  chmod -R 777 .
                $sourcePath = $_FILES['filerank']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "img/jugadores/".$result."/h2h.png";//.$_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                $foto_rank = 1;
            }else{
                $foto_rank = 0;                
            }
            
            //when upload both photos, then update database
            $datos = array(
                "foto" => $foto,
                "foto_rank" => $foto_rank
            );
            $result_temp=$this->Jugador->updatePlayer($datos,$result);
        }
        
        echo "si";
        }

        //redirect('/admin/jugadores');
    }
    
    public function cerrar(){
        $this->session->sess_destroy();
        redirect('/');
    }
    
}
