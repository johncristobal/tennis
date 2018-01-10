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

    //function to update tormeo(
    public function actualizaTorneo($datos,$extra){
        
        $ganador = "";
        $res = "";
        $ii = 1;
        $llave = "";
        
        //echo $datos;
        
        foreach ($datos as $key=>$value){
            //echo $key."-".$value;
            //echo "<br>";            
            
            if(strpos($key, 'h2hselected') !== false){
                continue;
            }
            
            //Little algorithm to save data
            if(strpos($key, 'radio') !== false){
                $ganador = $value;
            }else{
                $res = $value;
                $llave = $key;
            }
            
            if($ii%2 != 0){
                $ii++;
                continue;
            }else{
                $ii++;
            }
            
            $updateData = array(
                'resultado' => $res,
                'ganador' => $ganador
            );
            $this->db->where('id', $llave);
            $this->db->update('partidos', $updateData);
        }
        
        //first...set all sesttua in 1 where esttua in 5
        $upda = array(
            'estatus' => 1
        );                       
        $this->db->where('estatus', 5);
        $this->db->update('partidos', $upda);     
        
        //update H2H semana
        $updateData = array(
            'estatus' => 5
        );
        $this->db->where('id',$extra);
        $this->db->update('partidos', $updateData);
        
        
    }

    public function getTorneoData($id){
        $this->db->select('t.id,t.nombre,t.fecha_inicio,lug.lugar,tt.descripcion,t.tipo');
        //$this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar, t.tipo");
        //$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );

        $this->db->from('torneo t');
        $this->db->join('lugar lug', 'lug.id = t.lugar');
        $this->db->join('tipo_torneo tt', 'tt.id = t.tipo');
        $this->db->where('t.id', $id );

        //where year = 2017
        
        $query = $this->db->get();

        if ($query->num_rows() > 0 )
        {
            $row = $query->result();
            return $row;
        }
    }
    
    public function getGames($id){
        
        //then---the idea is
        //get the number of round and return data separated in block
        $last_row=$this->db->select('ronda')->from('partidos')->where('fktorneo',$id)->order_by('ronda',"desc")->limit(1)->get()->row();
        //here we have $idtorneo and $lastronda...so...
        $arregloRondas = array();
        
        for($i=0;$i<=$last_row->ronda;$i++){
            $partidosi = $this->db->select("id,ganador,fecha,resultado,'nombre1' as nombre1, 'nombre2' as nombre2, fkjugador1,fkjugador2,ronda,'rank1' as rank1, 'rank2' as rank2,estatus")
                    ->from('partidos p')
                    ->where('fktorneo',$id)
                    ->where('ronda',$i)
                    ->get()->result();
            
            foreach ($partidosi as $rondas) {                
                $rondas->rank1 = $this->getrankingfromid($rondas->fkjugador1);
                $rondas->rank2 = $this->getrankingfromid($rondas->fkjugador2);
                $rondas->nombre1 = $this->getNameFromId($rondas->fkjugador1);
                $rondas->nombre2 = $this->getNameFromId($rondas->fkjugador2);
            }
            
            array_push($arregloRondas, $partidosi);
        }
        
        return $arregloRondas;
 
    }
    
    public function gettorneos(){
        //$this->db->select('*');
        $this->db->select('t.id,t.nombre,t.fecha_inicio,lug.lugar,tt.descripcion');
        //$this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar, t.tipo");
        //$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );

        $this->db->from('torneo t');
        $this->db->join('lugar lug', 'lug.id = t.lugar');
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
    
    public function getNameFromId($id){
        $last_row=$this->db->select('nombre')->from('jugador')->where('id',$id)->limit(1)->get()->row();
        return $last_row->nombre;        
    }

    public function getrankingfromid($id){
        $last_row=$this->db->select('rank_act')->from('estadisticas_jugador')->where('fkjugador',$id)->limit(1)->get()->row();
        return $last_row->rank_act;                
    }
    
    public function getTorneoActivo(){
        $last_row=$this->db->select('id,nombre,fecha_inicio')->from('torneo')->where('estatus',1)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row;   
        else
            return "0";
    }
    
    public function getPartidoSemana(){
        $last_row=$this->db->select('fkjugador1,fkjugador2')->from('partidos')->where('estatus',5)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row;   
        else
            return "0";
    }           
}
