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
        //$i = $this->Torneomodel->gettorneos();
        //echo $i[0]->id;
        
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
    
    public function creartorneo(){
        //cargar vista para crear torneos
        
        //1 - seleccioanr tipo de toenro => a partir de aqui se define la vista
        //como crear cada torneo
        //1.1 - Rodun robiin:
        //  * seleccionar el numerpo de jugadores...
        //      si son 8 jugadores---seran 8 semanas segun yo con 4 partidos cada una
        //  * pintar las casillas donde seleccionaras a los jugadores para cada semana
        
    }
}
