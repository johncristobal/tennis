<?php 
class Estadisticasmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
            $this->load->database();
    }
    
    public function getAllRankings(){
        //$this->db->select('*');
        $this->db->select("j.id,j.edad,j.nombre,j.foto_rank,ej.rank_act,ej.puntos,ej.torneosj");
        //$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );

        $this->db->from('estadisticas_jugador ej');
        $this->db->join('jugador j', 'j.id = ej.fkjugador');
        $this->db->order_by('ej.rank_act','asc');

        //where year = 2017
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->result();
            return $row;
        }
    }
    
    public function getFirstPlace(){
       $this->db->select("j.id,j.edad,j.nombre,j.foto_rank,ej.rank_act,ej.puntos,ej.torneosj");
        //$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );

        $this->db->from('estadisticas_jugador ej');
        $this->db->join('jugador j', 'j.id = ej.fkjugador');
        $this->db->order_by('ej.rank_act','asc');
        $this->db->limit(1);

        //where year = 2017
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            return $row;
        }  
    }
    
    public function getdatah2h($id1,$id2){
        
        $data1 = array();
        $data2 = array();
        
        $ganados1 = $this->db->select('count(ganador) as ganador')->from('partidos')->where('fkjugador1 = '.$id1)->where('fkjugador2 = '.$id2)->where('ganador = '.$id1)->get()->row();
        $ganados2 = $this->db->select('count(ganador) as ganador')->from('partidos')->where('fkjugador1 = '.$id1)->where('fkjugador2 = '.$id2)->where('ganador = '.$id2)->get()->row();
        
        if($ganados1->ganador == "0" && $ganados2->ganador == "0"){
            $ganados1 = $this->db->select('count(ganador) as ganador')->from('partidos')->where('fkjugador2 = '.$id1)->where('fkjugador1 = '.$id2)->where('ganador = '.$id2)->get()->row();
            $ganados2 = $this->db->select('count(ganador) as ganador')->from('partidos')->where('fkjugador2 = '.$id1)->where('fkjugador1 = '.$id2)->where('ganador = '.$id1)->get()->row();
            $data['ganados1'] = $ganados2->ganador;
            $data['ganados2'] = $ganados1->ganador;
        }else{
            $data['ganados1'] = $ganados1->ganador;
            $data['ganados2'] = $ganados2->ganador;            
        }
                                
        $this->db->select("j.id,j.edad,j.nombre,DATE_FORMAT(j.fecha_nac, '%d/%m/%Y') as fecha_nac,j.plays,j.altura,ej.rank_act,ej.jganados,ej.jperdidos,ej.torneosj");
        $this->db->from('estadisticas_jugador ej');
        $this->db->join('jugador j', 'j.id = ej.fkjugador');
        $this->db->order_by('ej.fkjugador','asc');
        $this->db->where('j.id = '.$id1);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            $data['datos1'] = $query->row();
        }
        else{
            $data['datos1'] = "0";            
        }
        
        $this->db->select("j.id,j.edad,j.nombre,DATE_FORMAT(j.fecha_nac, '%d/%m/%Y') as fecha_nac,j.altura,j.plays,ej.rank_act,ej.jganados,ej.jperdidos,ej.torneosj");
        $this->db->from('estadisticas_jugador ej');
        $this->db->join('jugador j', 'j.id = ej.fkjugador');
        $this->db->order_by('ej.fkjugador','asc');
        $this->db->where('j.id = '.$id2);

        $query2 = $this->db->get();

        if ($query2->num_rows() > 0)
        {
            $data['datos2'] = $query2->row();
        }
        else{
            $data['datos2'] = "0";            
        }

        return $data;
    }
	public function getTotalPlayed(){
		//getting the total matches played
		$sql="SELECT t2.fkjugador,COUNT(t2.fkjugador) as total_jugados fROM `partidos` t1 INNER JOIN estadisticas_jugador t2 WHERE (t2.fkjugador=t1.`fkjugador1` OR t2.fkjugador=t1.`fkjugador2`) AND t1.`ganador`!=0 GROUP BY t2.fkjugador HAVING COUNT(t2.fkjugador)";
		$results=$this->db->query($sql);
        if($results->num_rows()>0){
            return $results->result();
        }				
		
		
	}
		public function getTotalWon(){
		//getting the matches won
		$sql="SELECT t2.fkjugador,COUNT(t2.fkjugador) as ganados fROM `partidos` t1 INNER JOIN estadisticas_jugador t2 WHERE (t2.fkjugador=t1.ganador ) GROUP BY t2.fkjugador HAVING COUNT(t2.fkjugador)";
		$results=$this->db->query($sql);
        if($results->num_rows()>0){
            return $results->result();
        }				
	}
		public function updateStatistics($id,$data){
		
			$this->db->where('fkjugador',$id);
			return $this->db->update('estadisticas_jugador',$data);
	}
		public function getinfoTorneo($idTorneo){
			//getting mathced won by tournament SELECT t1.id, (SELECT COUNT(*) FROM partidos t2 WHERE t1.id=t2.ganador) as Ganados,(SELECT COUNT(*) FROM partidos t2 WHERE (t1.id=t2.fkjugador1 OR t1.id=t2.fkjugador2) AND t2.resultado!=0) as Jugados  FROM `jugador` t1 GROUP BY t1.id
			$sql="SELECT t1.id,t1.nombre ,(SELECT COUNT(*) FROM partidos t2 WHERE t1.id=t2.ganador AND t2.fktorneo=$idTorneo ) as Ganados,(SELECT COUNT(*) FROM partidos t2 WHERE (t1.id=t2.fkjugador1 OR t1.id=t2.fkjugador2) AND t2.resultado!=0 AND t2.fktorneo=$idTorneo ) as Jugados , ((SELECT COUNT(*) FROM partidos t2 WHERE t1.id=t2.ganador AND t2.fktorneo=$idTorneo )*3) as Puntos,(SELECT COUNT(*) FROM partidos t2 WHERE (t1.id=t2.fkjugador1 OR t1.id=t2.fkjugador2) AND t2.resultado!=0 AND t2.fktorneo=0 ) -(SELECT COUNT(*) FROM partidos t2 WHERE t1.id=t2.ganador AND t2.fktorneo=0 )as Perdidos FROM `jugador`t1 INNER JOIN partidos t3 ON (t1.id= t3.fkjugador1  OR t1.id= t3.fkjugador2  ) WHERE (t1.estatus=1 OR t1.estatus=4) AND t3.fktorneo=$idTorneo
			GROUP BY t1.id  ORDER BY `Puntos`  DESC";
			$results=$this->db->query($sql);
        if($results->num_rows()>0){
            return $results->result();
        }	
	}	

	
}


?>
