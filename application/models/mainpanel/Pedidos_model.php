<?php
class Pedidos_model extends CI_Model {
    public function __construct()
    {
            parent::__construct();
    }

    public function getListado() {
        $this->db->select('p.id,p.id_usuario,p.numero_cotizacion,p.observaciones,p.fecha_pedido,p.hora_pedido,p.total,p.estado,ru.nombres,ru.apellidos,ru.email');
        $this->db->from('pedidos p');
        $this->db->join('registro_usuarios ru','ru.id=p.id_usuario');
        $this->db->order_by('p.fecha_pedido', 'desc');
         $this->db->order_by('p.hora_pedido', 'desc');
        $query=$this->db->get();
        return $query->result();
    }

    public function get($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('pedidos');
        return $query->row();
    }

    public function getDetalles($id) {
    $this->db->select('dp.id,dp.id_producto,dp.nombre_producto,dp.id_color,c.nombre_color,dp.codigo,dp.imagen,dp.cantidad,dp.precio,dp.subtotal');
        $this->db->from('detalle_pedido dp');
        $this->db->join('colores c','c.id=dp.id_color');
        $this->db->where_in('dp.id_pedido',$id);
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



    public function getPedido($id) {
        $this->db->select('p.id,p.id_usuario,p.numero_cotizacion,p.observaciones,p.fecha_pedido,p.hora_pedido,p.total,p.estado,ru.nombres,ru.apellidos,ru.email,ru.telefono');
        $this->db->from('pedidos p');
        $this->db->join('registro_usuarios ru','ru.id=p.id_usuario');
         $this->db->where_in('p.id',$id);
        $query=$this->db->get();
        return $query->row();
    }

    public function getPedido2($id) {
          $sql = "SELECT p.id,p.id_usuario,p.numero_cotizacion,p.observaciones,p.fecha_pedido,p.estado,ru.nombres,ru.apellidos,ru.telefono,ru.email
                    FROM pedidos p
                    INNER JOIN registro_usuarios ru on ru.id=p.id_usuario
                    WHERE p.id =1";
                    $query =  $this->db->query($sql);
                    return $query->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update("pedidos", $data);
        return $result;
    }

    public function getColDel($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('pedidos');
        return $query->row();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete("pedidos");
        return $query;
    }

    public function getsubTotal($id_detalle) {
        $this->db->select('id_pedido,cantidad,precio,subtotal');
        $this->db->from('detalle_pedido');
        $this->db->where('id',$id_detalle);
        $query=$this->db->get();
        return $query->row();
    }

    public function getTotal($id_pedido) {
        $this->db->select('total');
        $this->db->from('pedidos');
        $this->db->where('id',$id_pedido);
        $query=$this->db->get();
        return $query->row();
    }
     public function updatePrecio($id, $data) {
        $this->db->where('id', $id);
        $result = $this->db->update("detalle_pedido", $data);
        return $result;
    }

     public function updateTotal($id_pedido, $data2) {
        $this->db->where('id', $id_pedido);
        $result = $this->db->update("pedidos", $data2);
        return $result;
    }
    public function getUsuario($id)
    {
      $this->db->where("id", $id);
      $query=$this->db->get("registro_usuarios");
      return $query->row();
    }
    public function getDetallesCotizar($id) {
    $this->db->select('dp.id,dp.id_producto,dp.nombre_producto,dp.id_color,c.nombre_color,dp.codigo,dp.imagen,dp.cantidad,dp.precio,dp.subtotal');
        $this->db->from('detalle_pedido dp');
        $this->db->join('colores c','c.id=dp.id_color');
        $this->db->where_in('dp.id_pedido',$id);
        $query=$this->db->get();
        return $query->result_array();
    }

  }
?>
