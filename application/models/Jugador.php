<?php 
class Jugador extends CI_Model{

    public function __construct(){
        parent::__construct();
            $this->load->database();
    }
    
    public function getCorreoFromId($id){
        $last_row=$this->db->select('correo')->from('jugador')->where('id',$id)->limit(1)->get()->row();
        return $last_row->correo;        
    }
    
    public function getInfo($id){
        $query="SELECT t1.*, t2.rank_act FROM `jugador` t1 INNER JOIN estadisticas_jugador t2 on t2.fkjugador=$id WHERE t1.id=$id";

        $result=$this->db->query($query);
        if($result){
            return $result->row();
        }
    }
    
    public function getJugador($nombre){

        $this->db->select('*');
        $this->db->from('jugador');
        $this->db->like("Nombre","$nombre");
        $results=$this->db->get();
        if($results->num_rows()>0){
            return $results->result();
        }else{
            return FALSE;
        }
    }
    
    public function getNombres(){
        $this->db->select('nombre');
        $this->db->from('jugador');
        $results=$this->db->get();
        if($results->num_rows()>0){
            return $results->result();
        }else{
            return FALSE;
        }
    }
    
    public function getJugadorSemana(){
        $last_row=$this->db->select('id,nombre,edad')->from('jugador')->where('estatus',4)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row;   
        else
            return "0";
    }
}

?>
