<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {

        parent::__construct();
		
        $this->load->model('General_Model'); // Carga el modelo General_Model
		$this->load->library('session');
    }

	public function index()
	{
		$this->load->view('menu/head');
		$this->load->view('menu/header');
		$this->load->view('inicio/inicio-body');
		$this->load->view('footer/footer');
		$this->load->view('js/js');
	}


	
	
	public function showServicio1(){

		$query = "SELECT * FROM servicios WHERE id=1";

        echo json_encode($this->General_Model->infoxQuery($query));

	}

	public function showServicio2(){

		$query = "SELECT * FROM servicios WHERE id=2";

        echo json_encode($this->General_Model->infoxQuery($query));

	}

	public function logout() {
		// Destruir la sesión
		$this->session->sess_destroy();
		
		// Devolver una respuesta (por ejemplo, éxito)
		echo json_encode(['success' => true]);
	}
}
