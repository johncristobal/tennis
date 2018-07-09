<?php 
class AdminModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function checkUser($mail,$pass){
        $last_row=$this->db->select('id')->from('users')->where('correo',$mail)->where('pass',$pass)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row->id;   
        else
            return "0";   
    }
    
    public function getParametro($key){
        $last_row=$this->db->select('valor')->from('parametria')->where('parametro',$key)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row->valor;   
        else
            return "0";   

    }
}

?>
