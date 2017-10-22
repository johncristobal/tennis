<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of torneos
 *
 * @author john.cristobal
 */
class Torneos extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();

        $this->load->model('Torneomodel');
        $this->load->model('Estadisticasmodel');
    }
    
    public function calendario(){
                
        //Load data from Torneos and show into view calendario        
        $this->load->model('Torneomodel');        
        $data['datos'] = $this->Torneomodel->gettorneos();
        
        //logica para separar los torneos por meses....
        //data[enero] = datos...
        //data[febrerp] = datos...
        
        $this->load->view('torneo/calendario',$data);                
    }
    
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
                $this->load->view('torneo/resultadorrobin',$data);            
                break;
            case 2:
                //$this->load->view('torneo/resultado');            
                break;
            default:
                break;
        }
    }
    
    public function registrotorneo(){
        //vista form registro torneo
        //cargamos modelo 
        $this->load->model('Torneomodel');
        $data['jugadores']=$this->Torneomodel->getJugadores();
        $this->load->view('torneo/creartorneo',$data);

        //vista torneo RR
        //$this->load->view('torneo/creartorneorr');
        
        //vista torneo RR
        //$this->load->view('torneo/creartorneoel');
    }
    
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
                //load model
                $this->load->model('Estadisticasmodel');
                $data['datarank']=$this->Estadisticasmodel->getAllRankings();

                //echo count($buscar['datarank']);
                //vista form registro torneo
                $this->load->view('torneo/creartorneoel',$data);
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

            $this->load->view('torneo/res_torneo_rrp',$data);
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

            $this->load->view('torneo/res_torneo_rrip',$data);
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
    
    public function saveTorneo(){
        
        //valida tipo torneo de sesion
        //si es 1 => rr+ --- else directa
        //get last id        
        $tabla = 'torneo';
        $id = $this->Torneomodel->getLastId($tabla);
        if($id){
            $idtorneo = $id->id+1;
        }
        else{
            $idtorneo = "0";
        }
        
        $data = array(
            "id" => $idtorneo,
            'nombre' => $this->session->userdata('nombre'),
            'tipo' => $this->session->userdata('tipo'),
            'fecha_inicio' => $this->session->userdata('fecha'),
            'fecha_fin' => "0000/00/00",
            'lugar' => $this->session->userdata('lugar')
        );
        
        $res = $this->Torneomodel->saveTorneo($data);
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
                    for($j=0;$j<($total/2);$j++){   
                        $games['resultado'] = "0"; 

                        $games['fktorneo'] = $idtorneo; 
                        $games['ronda'] = $i; 
                        //jugador 1 
                        $games['fkjugador1'] = $this->Torneomodel->getIdFromName($calendario[$i][$j])->id;
                        //jugador 2
                        $games['fkjugador2'] = $this->Torneomodel->getIdFromName($calendario[$i][$total-1-$j])->id;
                        $games['fecha'] = $this->session->userdata('fecha');
                        $games['ganador'] = "0";
                        $this->Torneomodel->saveGames($games);
                    }
                }
            }else{
                //impar
                $calendario=$this->session->userdata('calen_impar');                
                
                for ($i=0;$i<=$total-1;$i++){
                    for($j=0;$j<(($total-1)/2);$j++){
                        //jugador 1
                        $games['fkjugador1'] = $this->Torneomodel->getIdFromName($calendario[$i][$j])->id;
                        //jugador 2
                        $games['fkjugador2'] = $this->Torneomodel->getIdFromName($calendario[$i][$total-2-$j])->id;
                          
                        $games['resultado'] = "0"; 
                        $games['ganador'] = "0";
                        $games['fktorneo'] = $idtorneo; 
                        $games['ronda'] = $i; 
                        $games['fecha'] = $this->session->userdata('fecha');
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
                    $games['fecha'] = $this->session->userdata('fecha');
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
        redirect('/torneos/calendario', 'refresh');
        //echo $calendario;
        //when finish save data---delete session info        
    }
    
    //function to update results
    public function updateTorneo(){
        $post_data = $this->input->post();
        $this->Torneomodel->actualizaTorneo($post_data);

        $id = $this->session->userdata('idtorneo');
        redirect('torneos/resultados/'.$id);
        
    }
}
