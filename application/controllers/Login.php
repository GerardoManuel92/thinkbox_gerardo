<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

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

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		function changeString($string)
		{

			$string = trim($string);

			$string = str_replace(
				array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
				array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
				$string
			);

			$string = str_replace(
				array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
				array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
				$string
			);

			$string = str_replace(
				array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
				array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
				$string
			);

			$string = str_replace(
				array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
				array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
				$string
			);

			$string = str_replace(
				array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
				array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
				$string
			);

			$string = str_replace(
				array('&ntilde;', '&Ntilde;', 'ç', 'Ç'),
				array('n', 'N', 'c', 'C',),
				$string
			);

			//Esta parte se encarga de eliminar cualquier caracter extraño
			$string = str_replace(
				array('º', '~', '!', '&', '´', ';', '"',),
				array('', '', '', '&amp;', '', '', '&quot;'),
				$string
			);


			return $string;
		}
	}

	public function index()
	{
		if (isset($iduser)) {
			redirect('Inicio');
		} else {
			$this->load->view('menu/head-login');
			$this->load->view('login/body-login');
			$this->load->view('js/js-login');
		}
	}

	public function verificarUser()
	{
		$data_post = $this->input->post();
		$this->load->model('General_Model');
		$usuario = $data_post["usuariox"];
		$pass = $data_post["passx"];
		$query = "SELECT id, nombre AS nombre FROM `usuario` WHERE estado = 1 AND usuario='" . $usuario . "' AND contrasena='" . $pass . "' ";
		$mquery2 = $this->db->query($query);
		$cant = $mquery2->num_rows();

		if ($cant > 0) {
			$datos = $mquery2->row();

			$this->session->set_userdata(IDUSERCOM, $datos->id);
			$this->session->set_userdata(NOMBRECOM, $datos->nombre);

			echo json_encode($datos);
		} else {
			echo json_encode(null);
		}
	}
}
