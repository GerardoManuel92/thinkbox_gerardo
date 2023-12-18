<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrito_model extends CI_Model
{

    public function get_servicios()
    {
        $query = $this->db->get('servicios');
        return $query->result();
    }

    public function agregar_servicio($data)
    {
        $this->db->insert('carrito', $data);
        return $this->db->insert_id();
    }

    public function vaciar_carrito()
    {
        $this->db->empty_table('carrito');
    }

    public function consultar_carrito()
    {
        $query = $this->db->get('carrito');
        return $query->result();
    }

    public function consultar_carrito_por_usuario($usuario_id)
    {
        $this->db->select('a.id as id, a.cantidad as cantidad, a.idservicio as idservicio, b.descripcion as servicio, a.subtotal as subtotal, a.iva as iva, a.total as total');
        $this->db->from('carrito a');
        $this->db->join('servicios b', 'a.idservicio = b.id');
        $this->db->where('a.usuario', $usuario_id);
        $this->db->where('a.estatus', 0);

        $query = $this->db->get();
        return $query->result();
    }
}
