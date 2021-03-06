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
        $this->load->library("email");

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
								$partidos = $this->Torneomodel->getGames($i);
							  $data['torneodata'] = $datatorneoo;
								$data['partidos'] = $partidos;
                $this->load->view('torneo/resultadoelimdir',$data);            
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
    
    public function confirmarPartido($idjugador,$idpartido,$idrival,$estatus){
     
        //update partido from estatus
        //check estatus
        //redirect
        $this->Torneomodel->updateEstatusPartido($idjugador,$idpartido,$estatus);
        $correo = $this->Jugador->getCorreoFromId($idrival);
        $fecha = $this->Torneomodel->getFechaFromId($idpartido);
        
        $nombrerival = $this->Torneomodel->getNameFromId($idrival);
        $nombre = $this->Torneomodel->getNameFromId($idjugador);
        
        $data = array(
            "nombre" => $nombrerival,
            "nombre_rival" => $nombre,
            "fecha" => $fecha
        );
        
        //confirma
        if($estatus == 7){
            //e nviar correo a rival diciendole que su rival asistira
            //get correo from idrival
            $this->sendMailConfirma($correo,$data);
            redirect('torneos/gracias');
        }else if($estatus == 8){
            //e nviar correo a rival diciendole que su rival no estara
            $this->sendMailRechaza($correo,$data);            
            redirect('torneos/rechaza');
        }
    }
    
    public function gracias(){
        /*echo "Gracias";
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
         $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 10; $i++) {
             $string .= $characters[mt_rand(0, $max)];
        }
        echo $string;*/
        $this->load->view('torneo/confirmausuario');     
    }
    
    public function rechaza(){
        /*echo "Gracias";
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
         $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 10; $i++) {
             $string .= $characters[mt_rand(0, $max)];
        }
        echo $string;*/
        $this->load->view('torneo/rechazausuario');     
    }

    public function sendMailConfirma($correo,$data){
        
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
                
        $datos=$this->load->view("correos/confirma",$data,TRUE);					
        $this->email->from('hola@madrugaytors.com', 'Tennis');
        $this->email->to($correo);
        $this->email->cc('nowoscmexico@gmail.com');
        $this->email->subject('Recordatorio partido...');          
        $this->email->message($datos);	
        $this->email->send();
    }
    
    public function sendMailRechaza($correo,$data){
        
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
                
        $datos=$this->load->view("correos/rechaza",$data,TRUE);					
        $this->email->from('hola@madrugaytors.com', 'Tennis');
        $this->email->to($correo);
        $this->email->cc('nowoscmexico@gmail.com');
        $this->email->subject('Recordatorio partido...');          
        $this->email->message($datos);	
        $this->email->send();
    }
    
    public function verCorreo($data){

        $this->load->view("correos/rechaza",$data);					
    }
}
