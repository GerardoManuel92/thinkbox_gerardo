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
        $this->load->view('menu/head');
        $this->load->view('menu/menu-alterno');
        $this->load->view('carrito/carrito-cuerpo');
        $this->load->view('footer/footer');
        $this->load->view('js/js-carrito');
        $this->load->view('js/js');
    }

    public function agregar_servicio()
    {
        //$this->load->model('Carrito_Model'); // Carga el modelo Carrito_Model
        // Recibe datos del producto por AJAX
        $data = array(
            'idservicio' => $this->input->post('idserviciox'),
            'usuario' => $this->input->post('iduserx'),
            'cantidad' => 1, // Puedes ajustar esto según tus necesidades
            'subtotal' => $this->input->post('subtotalx'),
            'iva' => 16,
            'total' => $this->input->post('totalx') // Precio por defecto para la primera vez
        );

        $carrito_id = $this->Carrito_Model->agregar_servicio($data);

        if ($carrito_id) {
            echo json_encode(array('status' => 'success', 'message' => 'Producto agregado al carrito.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error al agregar el producto al carrito.'));
        }
    }

    public function vaciar_carrito()
    {
        $this->Carrito_Model->vaciar_carrito();
        echo json_encode(array('status' => 'success', 'message' => 'Carrito vaciado.'));
    }

    public function consultar_carrito()
    {
        $carrito = $this->Carrito_Model->consultar_carrito();
        echo json_encode($carrito);
    }

    public function obtener_datos_carrito_idusuario($usuario_id) {
        // Llamada a la función del modelo con el ID del usuario
        $datosCarrito = $this->Carrito_Model->consultar_carrito_por_usuario($usuario_id);
    
        header('Content-Type: application/json');
        echo json_encode($datosCarrito);
    }



    public function addCarrito()
    {
        $this->load->model('General_Model');
        $data_post = $this->input->post();
        $cart = array();
        $iduser = $this->session->userdata(IDUSERCOM);
        if (isset($iduser)) {
            $cart = $this->addCarritoSession($data_post);
        } else {
            $cart = $this->addCarritoCookie($data_post);
        }
        // Devolver el carrito completo en formato JSON
        echo json_encode($cart);
    }


    private function addCarritoCookie($data_post)
    {
        $cart = array();
        // Recuperar todos los productos existentes en las cookies  
        $id = 0;
        for ($i = 1; $i <= 100; $i++) {
            $cookie_name = 'cart_product_' . $i;
            if ($this->input->cookie($cookie_name)) {
                $product = unserialize($this->input->cookie($cookie_name));
                if ($product['id'] == $data_post['idProductox']) {
                    // El producto ya está en el carrito, actualiza la cantidad
                    $product['cantidad'] += $data_post['cantidadx'];
                    // Guarda la cookie actualizada
                    $this->input->set_cookie($cookie_name, serialize($product), 3600);
                }
                $cart[] = $product;
                $id = $i;
            }
        }

        // Si el producto no estaba en el carrito, agrégalo
        if (!$this->productFound($cart, $data_post['idProductox'])) {
            $new_product = array(
                'id' => $data_post['idProductox'],
                'descripcion' => $data_post['descripcionx'],
                'cantidad' => 1,
                'precio' => $data_post['preciox']
            );
            $cart[] = $new_product;
            // Guarda la nueva cookie
            $cookie_name = 'cart_product_' . ($id + 1);
            $this->input->set_cookie($cookie_name, serialize($new_product), 3600);
        }

        return $cart;
    }

    private function addCarritoSession($data_post)
    {
        // Obtener el carrito actual de la sesión
        $cart_en_sesion = $this->session->userdata(CARRITO);
        $cart_en_sesion = ($cart_en_sesion) ? $cart_en_sesion : array();

        // Buscar el producto en el carrito de la sesión y obtener su índice
        foreach ($cart_en_sesion as &$product) {
            if ($product['id'] == $data_post['idProductox']) {
                // El producto ya está en el carrito, actualiza la cantidad
                $product['cantidad'] += 1;
            }
        }
        $this->session->set_userdata(CARRITO, $cart_en_sesion);
        // Si el producto no estaba en el carrito de la sesión, agrégalo
        if (!$this->productFound($cart_en_sesion, $data_post['idProductox'])) {
            $new_product = array(
                'id' => $data_post['idProductox'],
                'descripcion' => $data_post['descripcionx'],
                'cantidad' => 1,
                'precio' => $data_post['preciox']
            );
            $cart_en_sesion[] = $new_product;
            // Guarda el carrito actualizado en la sesión
            $this->session->set_userdata(CARRITO, $cart_en_sesion);
        }

        return $cart_en_sesion;
    }

    // Método para verificar si un producto ya está en el carrito
    private function productFound($cart, $productId)
    {
        foreach ($cart as $product) {
            if ($product['id'] == $productId) {
                return true;
            }
        }
        return false;
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

    public function deleteCarrito()
    {
        $this->load->model('General_Model');
        $this->load->helper('cookie');

        $data_post = $this->input->post();
        $cart = array();
        $iduser = $this->session->userdata(IDUSERCOM);
        if (isset($iduser)) {
            $cart = $this->deleteCarritoSession($data_post);
        } else {
            $cart = $this->deleteCarritoCookie($data_post);
        }

        // Devuelve el carrito actualizado en formato JSON
        echo json_encode($cart);
    }

    private function deleteCarritoCookie($data_post)
    {
        $cart = array();
        $cookie_name_found = null; // Inicializa la variable
        for ($i = 1; $i <= 100; $i++) {
            $cookie_name = 'cart_product_' . $i;
            if ($this->input->cookie($cookie_name)) {
                $product = unserialize($this->input->cookie($cookie_name));
                if ($product['id'] == $data_post['idProductox']) {
                    $cookie_name_found = $cookie_name;
                    break; // Detén el bucle una vez que encuentres la cookie
                }
            }
        }

        // Verificar si se encontró la cookie
        if ($cookie_name_found) {
            // El producto está en el carrito, elimina la cookie
            delete_cookie($cookie_name_found);
        }
        for ($i = 1; $i <= 100; $i++) {
            $cookie_name = 'cart_product_' . $i;
            if ($this->input->cookie($cookie_name)) {
                $product = unserialize($this->input->cookie($cookie_name));
                $cart[] = $product;
            }
        }
        return $cart;
    }

    private function deleteCarritoSession($data_post)
    {
        $cart = array();
        // Obtener el carrito actual de la sesión
        $cart_en_sesion = $this->session->userdata(CARRITO);
        $cart_en_sesion = ($cart_en_sesion) ? $cart_en_sesion : array();
        // Inicializa la variable
        $product_found_key = null;
        // Buscar el producto en el carrito de la sesión y obtener su índice
        foreach ($cart_en_sesion as $key => $product) {
            if ($product['id'] == $data_post['idProductox']) {
                $product_found_key = $key;
                break; // Detén el bucle una vez que encuentres el producto
            }
        }
        // Verificar si se encontró el producto
        if ($product_found_key !== null) {
            // El producto está en el carrito, elimínalo del carrito de la sesión
            unset($cart_en_sesion[$product_found_key]);
            // Reindexar el array después de la eliminación
            $cart = array_values($cart_en_sesion);
            // Actualizar el carrito en la variable de sesión
            $this->session->set_userdata(CARRITO, $cart);
        }
        return $cart;
    }

    // Función para eliminar duplicados basándonos en el ID del producto
    private function eliminarDuplicadosPorID($cart)
    {
        $unique_cart = array();
        $ids = array();

        foreach ($cart as $product) {
            $id = $product['id'];

            // Si el ID no está en el array de IDs, añádelo y agrega el producto al carrito único
            if (!in_array($id, $ids)) {
                $ids[] = $id;
                $unique_cart[] = $product;
            } else {
                // Si el ID ya está presente, actualiza la cantidad del producto existente
                foreach ($unique_cart as &$existing_product) {
                    if ($existing_product['id'] === $id) {
                        $existing_product['cantidad'] += $product['cantidad'];
                        break;
                    }
                }
            }
        }

        return $unique_cart;
    }

    public function actualizarCantidadCarrito()
    {
        $this->load->model('General_Model');
        $data_post = $this->input->post();
        $cart = array();
        $iduser = $this->session->userdata(IDUSERCOM);
        if (isset($iduser)) {
            $cart = $this->actualizarCarritoSession($data_post);
        } else {
            $cart = $this->actualziarCarritoCookie($data_post);
        }
        // Devolver el carrito completo en formato JSON
        echo json_encode($cart);
    }
    private function actualziarCarritoCookie($data_post)
    {
        $cart = array();
        // Recuperar todos los productos existentes en las cookies  
        for ($i = 1; $i <= 100; $i++) {
            $cookie_name = 'cart_product_' . $i;
            if ($this->input->cookie($cookie_name)) {
                $product = unserialize($this->input->cookie($cookie_name));
                if ($product['id'] == $data_post['idProductox']) {
                    // El producto ya está en el carrito, actualiza la cantidad
                    $product['cantidad'] = $data_post['cantidadx'];
                    // Guarda la cookie actualizada
                    $this->input->set_cookie($cookie_name, serialize($product), 3600);
                }
                $cart[] = $product;
            }
        }

        return $cart;
    }

    private function actualizarCarritoSession($data_post)
    {
        // Obtener el carrito actual de la sesión
        $cart_en_sesion = $this->session->userdata(CARRITO);
        $cart_en_sesion = ($cart_en_sesion) ? $cart_en_sesion : array();

        // Buscar el producto en el carrito de la sesión y obtener su índice
        foreach ($cart_en_sesion as &$product) {
            if ($product['id'] == $data_post['idProductox']) {
                // El producto ya está en el carrito, actualiza la cantidad
                $product['cantidad'] = $data_post['cantidadx'];
            }
        }
        $this->session->set_userdata(CARRITO, $cart_en_sesion);

        return $cart_en_sesion;
    }
}
