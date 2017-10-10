<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estadisticas
 *
 * @author john.cristobal
 */
class Estadisticas extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Estadisticasmodel');
    }
    
    public function rankings(){
        
        $datosrank['datos'] = $this->Estadisticasmodel->getAllRankings();        
        $this->load->view('statics/rankings',$datosrank);
    }
    
	 
    public function allRankings(){
        $datosrank['datos'] = $this->Estadisticasmodel->getAllRankings();        
        $this->load->view('statics/all-rankings',$datosrank);
    }
    //put your code here
}
