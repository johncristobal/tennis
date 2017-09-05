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

        //where year = 2017
        
        $query = $this->db->get();

        if ($query->num_rows() > 0 )
        {
            $row = $query->result();
            return $row;
        }
    }
	
    public function selectJugadores($numJugadores){
        //Seleccionar aleatoriamente el numero de jugadores para el torneo
        $query="SELECT * FROM jugador ORDER BY rand() LIMIT $numJugadores";
        $results=$this->db->query($query);
        if($results->num_rows()>0){
            return $results->result();
        }		
    }
}
