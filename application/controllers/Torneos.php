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
        $this->load->view('torneo/calendario');
    }
    
    public function resultados($i){
        
        if($i == 1){
        
            $this->load->view('torneo/resultado');
        }
        else if($i==2){
            $this->load->view('torneo/resultadorrobin');
            
        }
    }
}
