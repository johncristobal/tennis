<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Torneomodel
 *
 * @author john.cristobal
 */
class Torneomodel extends CI_Model{
    
    public function gettorneos(){
        //$this->db->select('*');
        $this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar, t.tipo_campo");
        //$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );

        $this->db->from('torneo t');
        $this->db->join('tipo_torneo tt', 'tt.id = t.tipo');
        //$this->db->where('news_id', $news_id );

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->result();
            return $row;
        }
    }
}
