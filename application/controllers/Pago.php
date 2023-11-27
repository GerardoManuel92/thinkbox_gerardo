<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends CI_Controller {
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
                array('º', '~','!','&','´',';','"',),
                array('','','','&amp;','','','&quot;'),
                $string
            );
         
         
            return $string;
        }
        
    }
    public function index(){
        $this->load->view('head/head');
        $this->load->view('pago/pago-cuerpo');
        $this->load->view('footer/footer');
        $this->load->view('pago/js/pago-js');
    }
    public function pagarconClip(){
        $this->load->model('General_Model');
        $data_post = $this->input->post();
        $amount = (float) $_POST['total'];
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api-gw.payclip.com/checkout",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'amount' => $amount,
            'currency' => 'MXN',
            'purchase_description' => $data_post['descripcion'],
            'redirection_url' => [
                'success' => 'https://my-website.com/redirection/success?me_reference_id=OID123456789',
                'error' => 'https://my-website.com/redirection/error?me_reference_id=OID123456789',
                'default' => 'https://my-website.com/redirection/default'
            ]
        ]),
        CURLOPT_HTTPHEADER => [
            "accept: application/vnd.com.payclip.v2+json",
            "content-type: application/json",
            "x-api-key: Basic YTg3YjBhNjMtZjFkMi00YzdkLTg1MTgtN2RkODA0NzJjOTFhOjM5NTQ0NmZhLTRkZGQtNDU2Yy05NTk3LTFjODMzYWJkNmU5ZQ=="
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            $resultado = ["error" => "cURL Error #" . $err];
        } else {
            $resultado = json_decode($response, true);
        }
        
        header('Content-Type: application/json');
        echo json_encode($resultado);
    
    }
}

?>