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
        $this->db->order_by('ej.fkjugador','asc');

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
        
        $data['ganados1'] = $ganados1->ganador;
        $data['ganados2'] = $ganados2->ganador;
                        
        $this->db->select("j.id,j.edad,j.nombre,j.fecha_nac,j.plays,j.altura,ej.rank_act,ej.jganados,ej.jperdidos,ej.torneosj");
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
        
        $this->db->select("j.id,j.edad,j.nombre,j.fecha_nac,j.altura,j.plays,ej.rank_act,ej.jganados,ej.jperdidos,ej.torneosj");
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
}

?>
