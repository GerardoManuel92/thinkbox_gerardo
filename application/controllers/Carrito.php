<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrito extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_Model'); // Carga el modelo General_Model
        $this->load->model('Carrito_Model'); // Carga el modelo Carrito_Model

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
        $iduser = $this->session->userdata(IDUSERCOM);

        if ($iduser > 0) {

            $this->load->view('menu/head');
            $this->load->view('menu/menu-alterno');
            $this->load->view('carrito/carrito-cuerpo');
            $this->load->view('footer/footer');
            $this->load->view('js/js-carrito');
            $this->load->view('js/js');
        } else {
            redirect('Welcome');
        }
    }

    public function agregar_servicio()
    {
        //$this->load->model('Carrito_Model'); // Carga el modelo Carrito_Model
        // Recibe datos del producto por AJAX
        $data = array(
            'fecha' => date("Y-m-d"),
            'hora' => date("H:i:s"),
            'idservicio' => $this->input->post('idserviciox'),
            'usuario' => $this->input->post('iduserx'),
            'cantidad' => 1, // Puedes ajustar esto según tus necesidades
            'subtotal' => $this->input->post('subtotalx'),
            'iva' => $this->input->post('ivax'),
            'total' => $this->input->post('totalx'), // Precio por defecto para la primera vez
            'estatus' => 0
        );

        $table = 'carrito';

        $carrito_id = $this->General_Model->altaERP($data, $table);

        if ($carrito_id) {
            echo json_encode(array('status' => 'success', 'message' => 'Producto agregado al carrito.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error al agregar el producto al carrito.'));
        }
    }

    public function obtener_datos_carrito_idusuario($usuario_id)
    {
        // Llamada a la función del modelo con el ID del usuario
        $datosCarrito = $this->General_Model->consultar_carrito_por_usuario($usuario_id);

        header('Content-Type: application/json');
        echo json_encode($datosCarrito);
    }

    public function actualizar_carrito()
    {
        $data_post = $this->input->post();

        $datos = array(
            'fecha' => date("Y-m-d"),
            'hora' => date("H:i:s"),
            'cantidad' => $data_post['cantidadx'],
            'subtotal' => $data_post['subtotalx'],
            'iva' => $data_post['ivax'],
            'total' => $data_post['totalx'],
        );

        $tabla = "carrito";
        $condicion = array('usuario' => $data_post["iduserx"], 'id' => $data_post["idcartx"]);

        // Manejo de errores
        try {
            $update = $this->General_Model->updateERP($datos, $tabla, $condicion);
            echo json_encode($update);
        } catch (Exception $e) {
            // Manejo de errores
            echo json_encode(array('error' => $e->getMessage()));
        }
    }


    public function vaciarCarrito()
    {
        $data_post = $this->input->post();

        $datos = array(

            'estatus' => 1,  //Cambia estatus 1 que es elimininado                      
        );
        $tabla = "carrito";
        $condicion = array('usuario' => $data_post["iduserx"]);

        $update = $this->General_Model->updateERP($datos, $tabla, $condicion);



        echo json_encode($update);
    }


    public function consultarCarrito()
    {
        $this->load->helper('cookie');
        // Recuperar todos los productos existentes en las cookies
        $cart = array();
        for ($i = 1; $i <= 100; $i++) {
            $cookie_name = 'cart_product_' . $i;
            if ($this->input->cookie($cookie_name)) {
                $product = unserialize($this->input->cookie($cookie_name));
                $cart[] = $product;
            }
        }
        $iduser = $this->session->userdata(IDUSERCOM);
        if (isset($iduser)) {
            // Obtener el carrito actual de la sesión
            $cart_en_sesion = $this->session->userdata(CARRITO);
            $cart_en_sesion = ($cart_en_sesion) ? $cart_en_sesion : array();
            if ($cart !== $cart_en_sesion) {
                // Combinar los carritos de las cookies y de la sesión
                $cart_total = array_merge($cart, $cart_en_sesion);
                // Eliminar duplicados basándonos en el ID del producto
                $cart_total = $this->eliminarDuplicadosPorID($cart_total);
                // Almacenar el carrito en la variable de sesión
                $this->session->set_userdata(CARRITO, $cart_total);

                for ($i = 1; $i <= 100; $i++) {
                    $cookie_name = 'cart_product_' . $i;
                    if ($this->input->cookie($cookie_name)) {
                        $product = unserialize($this->input->cookie($cookie_name));
                        if (isset($product)) {
                            delete_cookie($cookie_name);
                        }
                    }
                }
            } else {
                $cart_total = $cart_en_sesion;
            }
        } else {
            // Si el usuario no está autenticado, simplemente usa el carrito de las cookies
            $cart_total = $cart;
        }
        // Devolver el carrito completo en formato JSON
        echo json_encode($cart_total);
    }
}
