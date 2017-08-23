<?php 
class Jugador extends CI_Model{

public function __construct(){
parent::__construct();
$this->load->database();
}
public function getInfo($id){
	$query="SELECT t1.*, t2.rank_act FROM `jugador`t1 INNER JOIN estadisticas_jugador t2 on t2.fkjugador=$id WHERE t1.id=$id";
	
	$result=$this->db->query($query);
	if($result){
		return $result->row();
	}
	
}
public function getJugador($nombre){

	$this->db->select('*');
	$this->db->from('jugador');
	$this->db->where("MATCH (nombre) AGAINST ('".$nombre."')  limit 10",NULL,FALSE);
	$results=$this->db->get();
	if($results->num_rows()>0){
		return $results->result();
	}else{
		return FALSE;
	}
    }
}

?>
