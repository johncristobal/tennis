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
    
    public $id1headtohead = "";
    public $id2headtohead = "";
    
    public function __construct(){
        parent::__construct();

        $this->load->model('Torneomodel');
        $this->load->model('Jugador');
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
    
    public function lastid(){
        $tabla = 'torneo';
        $id = $this->Torneomodel->getLastId($tabla);
        if($id)
            echo $id->id;
        else
            echo "0";
    }        
    
    //get dat from head to head
    public function saveidplayers(){
        $this->id1headtohead = $this->input->post('id1');
        $this->id2headtohead = $this->input->post('id2');
        
        $this->session->set_userdata('idhead1',$this->id1headtohead);
        $this->session->set_userdata('idhead2',$this->id2headtohead);
        //echo "Datos: ".$this->id1headtohead."-".$this->id2headtohead;
    }
    
    public function saveidplayersfromname(){
        $name1 = $this->input->post('nombre1');
        $name2 = $this->input->post('nombre2');
    
        //get ids from names...
        $id1 = "";
        $id2 = "";
        
        //echo $name1."...".$name2;
        if($name1 == ""){
            $id1 = $this->session->userdata('idhead1');
        }else{
            $id1 = $this->Torneomodel->getIdFromName($name1)->id;        
        }
        if($name2 == ""){
           $id2 = $this->session->userdata('idhead2');
        }else{
            $id2 = $this->Torneomodel->getIdFromName($name2)->id;
        }
        $this->session->set_userdata('idhead1',$id1);
        $this->session->set_userdata('idhead2',$id2);
        //echo "Datos: ".$this->id1headtohead."-".$this->id2headtohead;        
    }
    
    public function headtohead(){
        //session to save ids to show in H2H
        //this gonna be useful when get data from landing page
        $id1 = $this->session->userdata('idhead1');
        $id2 = $this->session->userdata('idhead2');
        //destroy sesion?
        //$this->session->sess_destroy();

        //now get data t launch view
        $data=$this->Estadisticasmodel->getdatah2h($id1,$id2);
        $this->load->view('torneo/headtohead',$data);        
    }
    
    public function getNames(){
        
        $var = "";
        $dat = $this->Jugador->getNombres();
        foreach ($dat as $value) {
            $var .= $value->nombre.",";
        }        
        echo $var;
    }
    
    //edit data to show landing
    public function editar(){
        $this->load->view('torneo/editar');
    }
    //save data to show landing
    public function saveeditar(){
        
        $this->load->view('torneo/editar');
    }
    public function fechaprueba(){
        $date = new DateTime($this->session->userdata('fecha'));

        $cont = 6;
        $date->modify('+'.$cont.' day');
        echo $date->format('y-m-d') . "\n";
    }
}
