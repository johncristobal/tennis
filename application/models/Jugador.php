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
    
    public function getEstauts($idestatus){
        $last_row=$this->db->select('estatus')->from('jugador')->where('id',$idestatus)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row->estatus;   
        else
            return "0";
    }
    
    public function getJugadorSemana(){
        $last_row=$this->db->select('id,nombre,edad')->from('jugador')->where('estatus',4)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row;   
        else
            return "0";
    }
    
    public function updatePlayer($datos,$id){
        $this->db->where('id', $id);
        $this->db->update('jugador', $datos);
        
        return $this->db->affected_rows();
    }
    
    public function insertPlayer($datos){
        $this->db->insert('jugador', $datos);
        $id = $this->db->insert_id();
        
        $estadistcias = array(
            'jganados' => 0,
            'jperdidos' => 0,
            'puntos' => 0,
            'torneosj' => 0,
            'puntos_perdidos' => 0,
            'rank_ant' => 0,
            'rank_act' => 0,
            'fkjugador' => $id
        );
        $this->db->insert('estadisticas_jugador', $estadistcias);        
        
        return $id;
    }

}

?>
