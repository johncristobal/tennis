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
        $this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar, t.tipo");
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
	
    public function getJugadores(){
		$query="SELECT * FROM jugador";
		$results=$this->db->query($query);
		if($results->num_rows()>0){
			return $results->result();
		}		
	}

    public function selectJugadores($where){
        //Seleccionar aleatoriamente el numero de jugadores para el torneo
        $query="SELECT * FROM jugador WHERE $where ORDER BY rand()";
        $results=$this->db->query($query);
        if($results->num_rows()>0){
            return $results->result();
        }		
    }
    
    public function getLugar($id){
        $this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar");
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
    
    public function getCampo($id){
        
    }
    
    public function saveTorneo($header){
        $this->db->insert('torneo', $header);
        
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function saveGames($datos){
        $this->db->insert('partidos', $datos);
        
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function getLastId($tabla){
        $last_row=$this->db->select('id')->from($tabla)->order_by('id',"desc")->limit(1)->get()->row();
        return $last_row;
    }
    
    public function getIdFromName($name){
        $last_row=$this->db->select('id')->from('jugador')->where('nombre',$name)->limit(1)->get()->row();
        return $last_row;
        
    }
}
