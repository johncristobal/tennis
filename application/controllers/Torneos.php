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
        
        if($i == 1){        
            $this->load->view('torneo/resultado');
        }
        else if($i==2){
            $this->load->view('torneo/resultadorrobin');
            
        }
    }
    
    public function registrotorneo(){
        //vista form registro torneo
        $this->load->view('torneo/creartorneo');

        //vista torneo RR
        //$this->load->view('torneo/creartorneorr');
        
        //vista torneo RR
        //$this->load->view('torneo/creartorneoel');
    }
    
    public function creartorneo(){
        //vista form registro torneo
        //$this->load->view('torneo/creartorneo');

        //faltan validaciones....
        $data['nombre'] = $this->input->post('nombre');
        $data['tipo_torneo'] = $this->input->post('tipo');
        $data['fecha'] = $this->input->post('fecha');
        $data['lugar'] = $this->input->post('lugar');
        $data['campo'] = $this->input->post('campo');

        $newdata = array(
                   'nombre' => $this->input->post('nombre'),
                   'tipo_torneo' => $this->input->post('tipo'),
                   'fecha' =>  $this->input->post('fecha'),
                   'lugar' =>  $this->input->post('lugar'),
                   'campo' =>  $this->input->post('campo')
               );

        $this->session->set_userdata($newdata);
        
        if($data['tipo_torneo'] == "1"){
            //vista torneo RR
            $this->load->view('torneo/creartorneorr',$data);
        }else if($data['tipo_torneo'] == "2"){
            //load model
            $this->load->model('Estadisticas');
            $data['datarank']=$this->Estadisticas->getAllRankings();

            //echo count($buscar['datarank']);
            //vista form registro torneo
            $this->load->view('torneo/creartorneoel',$data);
        }
        
        //vista torneo RR
        //$this->load->view('torneo/creartorneoel');
    }
	
    public function creartorneoel(){
        
        //load model
        //$this->load->model('Estadisticas');
        //$buscar['datarank']=$this->Estadisticas->getAllRankings();
        
        //echo count($buscar['datarank']);
        //vista form registro torneo
        //$this->load->view('torneo/creartorneoel',$buscar);

        //vista torneo RR
        //$this->load->view('torneo/creartorneorr');
        
        //vista torneo RR
        //$this->load->view('torneo/creartorneoel');
    }
    
    public function generaRoundRobin(){		
        if($this->input->post()){
            $total=$this->input->post('no_jugadores');
            $this->load->model('Torneomodel');
            $buscar=$this->Torneomodel->selectJugadores($total);
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
        }
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
    
    public function saveTorneo(){
        
        //valida tipo torneo de sesion
        //si es 1 => rr+ --- els e directa
        
        //get data of torneo from sesion and save it --- using model
        //save partidos...use the same for from thwe view...
        
    }
}
