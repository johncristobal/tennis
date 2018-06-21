<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarionuevo
 *
 * @author john.cristobal
 */
class usuarionuevo extends CI_Model{
    
    public function insertar($data){
        $this->db->insert('inscripciones', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    
    public function updateData($id,$ruta){
        //$this->db->select('inscripciones');
        $this->db->where('id', $id);
        $this->db->update('inscripciones', $ruta);

        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}
