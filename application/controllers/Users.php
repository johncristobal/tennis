<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author john.cristobal
 */
class users extends CI_Controller{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function index(){
        
        $this->load->view('users/login', array('error' => ' ' ));
    }
    
    public function registrate(){
    
        $this->form_validation->set_rules('nombre', 'nombre', 'required',array('required' => 'Favor de colocar %s.'));
        $this->form_validation->set_rules('correo', 'correo', 'required|valid_email',array('required' => 'Favor de colocar %s.',"valid_email" => "Correo inválido"));
        $this->form_validation->set_rules('edad', 'edad', 'required',array('required' => 'Favor de colocar %s.'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('users/login');
        }
        else
        {
            $this->load->model('usuarionuevo');
            //saveData DB
            $data = array(
                "nombre" => $this->input->post('nombre'),
                "edad" => $this->input->post('edad'),
                "fecha_nac" => $this->input->post('nacimiento'),
                "correo" => $this->input->post('correo'),
                "telefono" => $this->input->post('telefono'),
                "estatus" => 3
                //"foto" => $this->input->post('foto')
            );
            $id = $this->usuarionuevo->insertar($data);
            
            //cargar archivo foto
            $retorno = $this->do_upload($id);
            if($retorno === "0"){

                $error = array('error' => $this->upload->display_errors());
                $this->load->view('users/login',$error);
            }else{
                $dataupd = array(
                    'foto' => $retorno
                );
                //acutalizamos db con foto = $id.
                $id2 = $this->usuarionuevo->updateData($id,$dataupd);
                //echo $id2;
            }
            
            //launch view success
            $this->load->view('users/success');
        }
    }
    
    public function do_upload($id)
    {
        $output = "./uploads/".$id."/";
        if (!file_exists($output)) {
            mkdir($output, 0755, true);
        }
        
        $config['upload_path']          = "./uploads/".$id."/";
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto'))
        {
            //$this->load->view('users/login', $error);
            return "0";
        }
        else
        {
            $upload_data = $this->upload->data();
            return "uploads/".$id."/".$upload_data["file_name"];
        }
    }                  
}
