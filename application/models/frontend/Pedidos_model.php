<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidos_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function grabarPedido($data)	{
		$resultado = $this->db->insert('pedidos', $data);
		return $this->db->insert_id();
	}

	public function grabarDetallePedido($data) {
		$resultado = $this->db->insert('detalle_pedido', $data);
		return $this->db->insert_id();
	}

	public function getCodigoPedido(){
	$sql = "SELECT (MAX(numero_cotizacion)) AS numero_cotizacion FROM pedidos ORDER BY numero_cotizacion DESC ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function getProductos( $id ){
        $query = $this->db
                ->select('*')
                ->from('productos')
                ->where('id', $id)
                ->get()
                ->row_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

	public function getCodigoColor($id_color){
        $query = $this->db
                ->select('*')
                ->from('colores')
                ->where('id', $id_color)
                ->get()
                ->row_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getDetalles($id_pedido) {
    	$id = $id_pedido;
    $this->db->select('dp.id,dp.id_producto,dp.nombre_producto,dp.id_color,c.nombre_color,c.codigo_color,dp.codigo,dp.imagen,dp.cantidad');
        $this->db->from('detalle_pedido dp'); 
        $this->db->join('colores c','c.id=dp.id_color');
        $this->db->where_in('id_pedido',$id);
        $query=$this->db->get();
        return $query->result();
    }

    public function getPedido($id) {
        $this->db->select('id,id_usuario,numero_cotizacion,observaciones,fecha_pedido,estado');
        $this->db->from('pedidos'); 
        $this->db->where_in('id_usuario',$id);
        $query=$this->db->get();
        return $query->result();
    }
     public function getPedidoAutorizado($id) {
        $this->db->select('id,id_usuario,numero_cotizacion,observaciones,fecha_pedido,estado,total');
        $this->db->from('pedidos'); 
        $this->db->where_in('id_usuario',$id);
        $query=$this->db->get();
        return $query->result();
    }

     public function getDetallesAutorizado($id_pedido) {
        $id = $id_pedido;
    $this->db->select('dp.id,dp.id_producto,dp.nombre_producto,dp.id_color,c.nombre_color,c.codigo_color,dp.codigo,dp.imagen,dp.cantidad,dp.precio,dp.subtotal');
        $this->db->from('detalle_pedido dp'); 
        $this->db->join('colores c','c.id=dp.id_color');
        $this->db->where_in('id_pedido',$id);
        $query=$this->db->get();
        return $query->result();
    }




}//END MODEL