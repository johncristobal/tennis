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
class Correo extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->library("email");
    }
    
    public function loadConfig(){
        
        
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
    }


    public function Enviar_correo()
    {         
        $this->loadConfig();						
        //Indicamos el protocolo a utilizar
	
        $correo=$this->input->post('correo');
        $nombre=$this->input->post('name_footer');
        $data = array(
             'Nombre'=>$this->input->post('name_footer'),
            'Mensaje'=>$this->input->post('message_footer'),
        );	
        
        $datos=$this->load->view("emailTemplate",$data,TRUE);					
        $this->email->from('hola@madrugaytors.com', 'Tennis');
        $this->email->to('nowoscmexico@gmail.com');
        $this->email->subject('Comentarios -'.$nombre);          
        $this->email->message($datos);	
        $this->email->send();
        $this->Enviar_correo_User($correo,$nombre);						
        redirect('welcome','refresh');
    }
		
    public function Enviar_correo_User($correo,$nombre){
        $this->loadConfig();

        $data = array(
         'Nombre'=>$nombre,
            );		

        $datos2=$this->load->view("correos/contacto",$data,TRUE);						
        $this->email->from('hola@madrugaytors.com', 'Tennis');
        $this->email->to($correo);
        $this->email->subject('Gracias por su contacto');          
        $this->email->message($datos2);	
        $this->email->send();						
    }

    public function correo_registro(){

    }        

    public function vercorreo(){
        $data['nombre'] = "John";
        $data['fecha'] = "14-05-2018";
        $data['rival'] = "rival";
        $data['deportivo'] = "Izcalli";
        //player and games - send correo
        $this->load->view('correos/recordatorio_juego',$data);
    }        
}
