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
        $this->db->select('t.id,t.nombre,DATE_FORMAT(t.fecha_inicio, "%d/%m/%Y") as fecha_inicio,lug.lugar,tt.descripcion,t.tipo');
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
    
    public function getGames($id,$tipo){
        
        if($tipo == "dobles")
        {
            //then---the idea is
            //get the number of round and return data separated in block
            $last_row=$this->db->select('ronda')->from('partidos')->where('fktorneo',$id)->order_by('ronda',"desc")->limit(1)->get()->row();
            //here we have $idtorneo and $lastronda...so...
            $arregloRondas = array();

            for($i=0;$i<=$last_row->ronda;$i++){
                $partidosi = $this->db->select("id,ganador, fecha,resultado,'nombre1' as nombre1, 'nombre2' as nombre2, fkjugador1,fkjugador2,ronda,'rank1' as rank1, 'rank2' as rank2,estatus")
                        ->from('partidos p')
                        ->where('fktorneo',$id)
                        ->where('ronda',$i)
                        ->get()->result();

                foreach ($partidosi as $rondas) {      
                    $rondas->rank1 = "-";//$this->getrankingfromid($rondas->fkjugador1);
                    $rondas->rank2 = "-";//$this->getrankingfromid($rondas->fkjugador2);
                    $rondas->nombre1 = $this->getNameFromIdDobles($rondas->fkjugador1);
                    $rondas->nombre2 = $this->getNameFromIdDobles($rondas->fkjugador2);
                }

                array_push($arregloRondas, $partidosi);
            }
            return $arregloRondas;
        }else{
        
            //then---the idea is
            //get the number of round and return data separated in block
            $last_row=$this->db->select('ronda')->from('partidos')->where('fktorneo',$id)->order_by('ronda',"desc")->limit(1)->get()->row();
            //here we have $idtorneo and $lastronda...so...
            $arregloRondas = array();

            for($i=0;$i<=$last_row->ronda;$i++){
                $partidosi = $this->db->select("id,ganador, fecha,resultado,'nombre1' as nombre1, 'nombre2' as nombre2, fkjugador1,fkjugador2,ronda,'rank1' as rank1, 'rank2' as rank2,estatus")
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
        
    }
    
    public function gettorneos(){
        //$this->db->select('*');
        $this->db->select('t.id,t.nombre,t.fecha_inicio as inicial,DATE_FORMAT(t.fecha_inicio, "%d/%m/%Y") as fecha_inicio,lug.lugar,tt.descripcion');
        //$this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar, t.tipo");
        //$this->db->select("DATE_FORMAT( t.fecha_inicio, '%d/%m/%Y')",      FALSE );

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
    
    public function getJugadoresAdmin(){
                $this->db->select('j.id,j.nombre,es.descripcion');
        //$this->db->select("t.id, t.nombre, t.fecha_inicio, tt.descripcion, t.fecha_fin, t.lugar, t.tipo");
        //$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );

        $this->db->from('jugador j');
        $this->db->join('estatus es', 'es.id = j.estatus');
        //$this->db->join('tipo_torneo tt', 'tt.id = t.tipo');
        //$this->db->where('t.id', $id );

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
    
    public function getJugadoresdobles(){
        $query="SELECT * FROM parejas";
        $results=$this->db->query($query);
        $arreglofinal = array();
        
        //agregar unicamente id y nombres juntos
        if($results->num_rows()>0){
            foreach ($results->result() as $value){
                $nombrefk1 = $this->getNameFromId($value->id_pareja1);
                $nombrefk2 = $this->getNameFromId($value->id_pareja2);
                                
                $datos = array(
                    "nombre" => $nombrefk1." <br> ".$nombrefk2,
                    "id" => $value->id
                );
                
                array_push($arreglofinal,$datos);
            }
        }
        
        return $arreglofinal;
    }

    public function selectJugadores($where){
        //Seleccionar aleatoriamente el numero de jugadores para el torneo
        $query="SELECT t1.* FROM jugador t1 INNER JOIN estadisticas_jugador t2 ON t1.id=t2.fkjugador WHERE $where ORDER BY t2.rank_act";
        $results=$this->db->query($query);
        if($results->num_rows()>0){
            return $results->result();
        }		
    }
    
    public function selectJugadoresDobles($where){
        //Seleccionar aleatoriamente el numero de jugadores para el torneo
        $query="SELECT * FROM parejas WHERE $where ORDER BY rand()";
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

    public function getIdFromNameDoble($name){
        $last_row=$this->db->select('id')->from('parejas')->where('nombre',$name)->limit(1)->get()->row();
        return $last_row;
        
    }
    
    public function getIdFromName($name){
        $last_row=$this->db->select('id')->from('jugador')->where('nombre',$name)->limit(1)->get()->row();
        return $last_row;
        
    }

    public function getFechaFromId($id){
        $last_row=$this->db->select("DATE_FORMAT(fecha, '%d/%m/%Y') as fecha")->from('partidos')->where('id',$id)->limit(1)->get()->row();
        return $last_row->fecha;        
    }

    public function getNameFromIdDobles($id){
        $last_row=$this->db->select('nombre')->from('parejas')->where('id',$id)->limit(1)->get()->row();
        return $last_row->nombre;        
    }
    
    public function getNameFromId($id){
        $last_row=$this->db->select('nombre')->from('jugador')->where('id',$id)->limit(1)->get()->row();
        return $last_row->nombre;        
    }

        public function getNameFromIdEstatus($id){
        $last_row=$this->db->select('descripcion')->from('estatus')->where('id',$id)->limit(1)->get()->row();
        return $last_row->descripcion;        
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

    public function getPartidoFromId($id){
        $last_row=$this->db->select('id,resultado,ganador,DATE_FORMAT(fecha, "%d/%m/%Y") as fecha,fktorneo,fkjugador1,fkjugador2,ronda,estatus,confirmafk1,confirmafk2')->from('partidos')->where('id',$id)->get()->row();
        if(isset($last_row)){
            return $last_row;   
        }
        else {
            return "0";
        }
    }
    
    public function getPartidoSemana(){
        $last_row=$this->db->select('fkjugador1,fkjugador2')->from('partidos')->where('estatus',5)->limit(1)->get()->row();
        if(isset($last_row))
            return $last_row;   
        else
            return "0";
    }           
    
    public function getFechasPartidos(){
        $query="SELECT DISTINCT fecha FROM `partidos`";
        $results=$this->db->query($query);
        if($results->num_rows()>0){
            return $results->result_array();
        }else{
            return "0";
        }
    }
    
    public function getProximosPartidosFromFecha($fechaProxima){
        
        $data = array();
        
        $partidosi = $this->db->select("p.id,p.fkjugador1,p.fkjugador2,p.fecha,p.confirmafk1,p.confirmafk2")
            ->from('partidos p')
            //->where('fecha',$fechaProxima)
            //->join('jugador j','j.id = '.$id)
            ->where("(fecha='".$fechaProxima."')")// and (fkjugador1=".$id." or fkjugador2=".$id.")")
            //->where("p.fkjugador1=".$id.' or p.fkjugador2='.$id)
            ->get()->result_array();
        
        if(count($partidosi)>0){
            
            $partidosfinal = array();
            foreach ($partidosi as $partido){

                $partidosfinaltemp = array();
                $partidosfinaltemp['id'] = $partido['id'];
                $partidosfinaltemp['nombre1'] = $this->getNameFromId($partido['fkjugador1']);
                $partidosfinaltemp['nombre2'] = $this->getNameFromId($partido['fkjugador2']);
                $partidosfinaltemp['fecha'] = $partido['fecha'];
                $partidosfinaltemp['estatus1'] = $this->getNameFromIdEstatus($partido['confirmafk1']);
                $partidosfinaltemp['estatus2'] = $this->getNameFromIdEstatus($partido['confirmafk2']);
                
                array_push($partidosfinal, $partidosfinaltemp);
            }
            
            return $partidosfinal;
            //iteramos los partidos...
            //en un arreglo guardamos la fecha y el nombre del rival
            //decimos que si fkjugador1 = id, entonces fkjugador2
            //viceversa si fkjugador2 = id, entonces fkjugador1
            
            /*foreach ($partidosi as $partido) {
                $datos = array();
                /*if($id == $partido['fkjugador1']){
                    $datos['idrival'] = $partido['fkjugador2'];
                }else{
                    $datos['idrival'] = $partido['fkjugador1'];                    
                }*//*
                $datos['idrival1'] = $partido['fkjugador1'];
                $datos['idrival2'] = $partido['fkjugador2'];
                $datos['estatusconfirma1'] = $partido['confirmafk1'];
                $datos['estatusconfirma2'] = $partido['confirmafk2'];
                $datos['fecha'] = $partido['fecha'];
                $datos['idusuario'] = $id;
                
                $data[$partido['id']] = $datos;
            } 
                 *            return $data;
                 */
            
            
        }else{
            return "";            
        }        
    }
    
    public function getProximosPartidos($fechaProxima,$fechaProxima2,$id){
        
        $data = array();
        
        $partidosi = $this->db->select("p.id,p.fkjugador1,p.fkjugador2,DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,p.confirmafk1,p.confirmafk2")
            ->from('partidos p')
            //->where('fecha',$fechaProxima)
            //->join('jugador j','j.id = '.$id)
            ->where("(fecha='".$fechaProxima."' or fecha='".$fechaProxima2."')")// and (fkjugador1=".$id." or fkjugador2=".$id.")")
            //->where("p.fkjugador1=".$id.' or p.fkjugador2='.$id)
            ->get()->result_array();
        
        if(count($partidosi)>0){
            
            $partidosfinal = array();
            foreach ($partidosi as $partido){

                $partidosfinaltemp = array();
                $partidosfinaltemp['id'] = $partido['id'];
                $partidosfinaltemp['nombre1'] = $this->getNameFromId($partido['fkjugador1']);
                $partidosfinaltemp['nombre2'] = $this->getNameFromId($partido['fkjugador2']);
                $partidosfinaltemp['fecha'] = $partido['fecha'];
                $partidosfinaltemp['estatus1'] = $this->getNameFromIdEstatus($partido['confirmafk1']);
                $partidosfinaltemp['estatus2'] = $this->getNameFromIdEstatus($partido['confirmafk2']);
                
                array_push($partidosfinal, $partidosfinaltemp);
            }
            
            return $partidosfinal;
            //iteramos los partidos...
            //en un arreglo guardamos la fecha y el nombre del rival
            //decimos que si fkjugador1 = id, entonces fkjugador2
            //viceversa si fkjugador2 = id, entonces fkjugador1
            
            /*foreach ($partidosi as $partido) {
                $datos = array();
                /*if($id == $partido['fkjugador1']){
                    $datos['idrival'] = $partido['fkjugador2'];
                }else{
                    $datos['idrival'] = $partido['fkjugador1'];                    
                }*//*
                $datos['idrival1'] = $partido['fkjugador1'];
                $datos['idrival2'] = $partido['fkjugador2'];
                $datos['estatusconfirma1'] = $partido['confirmafk1'];
                $datos['estatusconfirma2'] = $partido['confirmafk2'];
                $datos['fecha'] = $partido['fecha'];
                $datos['idusuario'] = $id;
                
                $data[$partido['id']] = $datos;
            } 
                 *            return $data;
                 */
            
            
        }else{
            return "";            
        }        
    }
    
    //actualiza estatus partido segun usario fkjugador
    public function updateEstatusPartido($idjugador,$idpartido,$estatus){
        
        $last_row=$this->db->select('*')->from('partidos')->where('id',$idpartido)->get()->row();
        if(isset($last_row)){
            
            if($last_row->fkjugador1 == $idjugador){
                $updateData = array(
                    'confirmafk1' => $estatus
                );

            }else if($last_row->fkjugador2 == $idjugador){
                $updateData = array(
                    'confirmafk2' => $estatus
                );

            }else{
                //raro pero podria pasar
                return "0";
            }
            
            $this->db->where('id', $idpartido);
            $this->db->update('partidos', $updateData);
            
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }
        else {
            return "0";
        }
    }
}
