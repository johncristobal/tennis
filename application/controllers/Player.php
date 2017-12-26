<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Player
 *
 * @author john.cristobal
 */
class Player extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Jugador");
        $this->load->model("Torneomodel");
        $this->load->model("Estadisticasmodel");
    }
    
    public function jugador($id){
        $result=$this->Jugador->getInfo($id);
        $data['datos']=$result;
        $this->load->view('player/single-profile',$data);
    }
    public function perfil(){	
        //het player wher eetatus = 4
        $data['datos']=$this->Jugador->getJugadorSemana();
        $temp=$this->Torneomodel->getPartidoSemana();
        $datah2h = $this->Estadisticasmodel->getdatah2h($temp->fkjugador1,$temp->fkjugador2);            
        $data['primer'] =$this->Estadisticasmodel->getFirstPlace();
        $data['ganados1'] = $datah2h['ganados1'];
        $data['ganados2'] = $datah2h['ganados2'];
        $data['datos1'] = $datah2h['datos1'];
        $data['datos2'] = $datah2h['datos2'];
        $this->load->view('player/profile',$data);
    }

    public function buscarJugador(){
        if($this->input->post())
        {
            $this->load->model("Jugador");
            $nombre=$this->input->post('nombre');
            $jugadores=$this->Jugador->getJugador($nombre);
            if($jugadores){
                foreach($jugadores as $fila){
                    echo "<a href='".base_url()."Player/jugador/".$fila->id."' >".$fila->nombre."</a><br>";
                }
            }   
        }
    }
    
    public function getIdfromName(){
    
        $name1 = $this->input->post('nombre1');
    
        if($name1 == ""){
            echo "0";
        }else{
            $id1 = $this->Torneomodel->getIdFromName($name1)->id;        
            echo $id1;
        }        
    }
}
