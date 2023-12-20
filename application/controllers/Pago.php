<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pago extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        $this->load->model('General_Model');

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
        $iduser = $this->session->userdata(IDUSERCOM);

        if ($iduser > 0) {

            $this->load->view('menu/head');
            $this->load->view('menu/menu-alterno');
            $this->load->view('pago/pago-cuerpo');
            $this->load->view('footer/footer');
            $this->load->view('js/js-carrito');
            $this->load->view('js/js-pago');
            $this->load->view('js/js');
        } else {

            redirect('Welcome');
        }
    }
    public function pagarconClip()
    {
        $data_post = $this->input->post();
        $amount = (float) $data_post['total'];

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

    public function altaCompra()
    {
        //$this->load->model('Carrito_Model'); // Carga el modelo Carrito_Model
        // Recibe datos del producto por AJAX
        $data = array(
            'fecha' => date("Y-m-d"),
            'hora' => date("H:i:s"),
            'idusuario' => $this->input->post('iduserx'),
            'servicio' => $this->input->post('idserviciox'),                        
            'total_pago' => $this->input->post('totalx'),
            'payment_request_id	' => $this->input->post('url_pagox'),            
            'estatus' => 1
        );

        $table = 'compras';

        $compra_id = $this->General_Model->altaERP($data, $table);

        if ($compra_id) {
            echo json_encode(array('status' => 'success', 'message' => 'Registro guardado.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error al guardar datos.'));
        }
    }
}
