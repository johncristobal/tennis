<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Torneomodel');        
        $this->load->model('Estadisticasmodel');
    }

    public function index()
    {
        /*
         * Desde aqu ibuscas los estatus para:
         * obtener h2h semana y con eso guardas los ids del parido con h2h
         * 
         * Get torneo where id = 1
         * get partido where estatus = 5 => h2h
         * get estaidisticas_jugador join jugador where rank_act = 1
         * 
         */

        $data['torneo']=$this->Torneomodel->getTorneoActivo();
        $temp=$this->Torneomodel->getPartidoSemana();
        $datah2h = $this->Estadisticasmodel->getdatah2h($temp->fkjugador1,$temp->fkjugador2);
        $data['primer'] =$this->Estadisticasmodel->getFirstPlace();
        $data['ganados1'] = $datah2h['ganados1'];
        $data['ganados2'] = $datah2h['ganados2'];
        $data['datos1'] = $datah2h['datos1'];
        $data['datos2'] = $datah2h['datos2'];
        //echo $data['torneo']->nombre."<br>";
        //echo $data['datos1']->nombre;
        $this->load->view('template',$data);
    }
}
