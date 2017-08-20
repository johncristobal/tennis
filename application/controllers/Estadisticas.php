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
    }
    
    public function rankings(){
        $this->load->view('statics/rankings');
    }
    
    /*
     * Carlitps
     * Todos los rankings
     * 15 08 17
     */
	 
	public function allRankings(){
        $this->load->view('statics/all-rankings');
    }
    //put your code here
}
