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
    }
    
    public function jugador($id){
		$this->load->model("Jugador");
		$result=$this->Jugador->getInfo($id);
		$data['datos']=$result;
        $this->load->view('player/single-profile',$data);
    }
    public function perfil(){		
        $this->load->view('player/profile');
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
}
