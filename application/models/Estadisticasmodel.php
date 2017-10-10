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
        $this->db->where('j.estatus = 1');

        //where year = 2017
        
        $query = $this->db->get();

        if ($query->num_rows() > 0 )
        {
            $row = $query->result();
            return $row;
        }
    }
}

?>
