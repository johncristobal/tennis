<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
            /*
             * Desde aqu ibuscas los estatus para:
             * obtener h2h semana y con eso guardas los ids del parido con h2h
             */
            $this->load->view('template');
	}
}
