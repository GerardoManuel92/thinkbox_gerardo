<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registro extends CI_Controller
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


        $this->load->view('menu/head-login');
        $this->load->view('registro/body-registro');
        $this->load->view('js/js-registro');
    }

    public function registrar()
    {
        $this->load->model('General_Model');
        $data_post = $this->input->post();
        $condicion = array(
            'correo' => trim($data_post["correox"]),
            'usuario' => trim($data_post['usuariox'])
        );
        $usuario_existente = $this->General_Model->SelectUnafila("*", "usuario", $condicion);
        if ($usuario_existente != null) {
            echo json_encode(array("error" => "El usuario ya existe"));
        } else {
            $table = 'usuario';
            $data = array(
                'nombre' => trim($data_post['nombrex']),
                'apellidos' => trim($data_post['apellidox']),
                'empresa' => trim($data_post['empresax']),
                'correo' => trim($data_post['correox']),
                'usuario' => trim($data_post['usuariox']),
                'contrasena' => trim($data_post['passwordx']),
                'telefono' => trim($data_post['telefonox']),
                'estado' => 1,
            );
            $idUsuario = $this->General_Model->altaERP($data, $table);
            if ($idUsuario != null) {

                echo json_encode(array("mensaje" => "Registro exitoso"));
            } else {
                echo json_encode(array("error" => "No se puedo crear al usuario"));
            }
        }
    }
}
