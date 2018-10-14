<?php 
	class Articulos_model extends CI_Model
	{
		function __construct() 
		{
			parent::__construct();
		}
		public function getFotos() 
		{
			$sql = "SELECT id, imagen FROM articulos";
			$query = $this->db->query($sql);
			return $query->result();
		}

        public function getLista() 
        {
            $this->db->order_by('created', 'desc');
            $query = $this->db->get('articulos');
            return $query->result();
        }

		public function grabar($data)
		{
			$resultado = $this->db->insert("articulos", $data);
			$id = $this->db->insert_id();
            return $id;
		}

        public function grabaTagEnArticulo($data) {
            $resultado = $this->db->insert('tags_x_articulo', $data);
            return $resultado;
        }

        public function deleteTagDeArticulo($id) {
            $this->db->where('id_articulo', $id);
            $this->db->delete('tags_x_articulo');
        }

		public function ultimo() 
		{
			$this->db->select_max("orden");
			$query=$this->db->get("articulos");
			return $query->row_array();	
		}

		public function get($id)
		{
			$this->db->where("id", $id);
			$query=$this->db->get("articulos");
			return $query->row();
		}

		public function update($id, $data) 
		{
			$this->db->where("id", $id);
			$result = $this->db->update("articulos", $data);
			return $result;
		}

		public function delete($id)
		{
		   $this->db->where('id', $id);
		   $query = $this->db->delete("articulos");
		   return $query;
		}


        public function categorias() {
            $this->db->order_by('orden');
            $query =  $this->db->get('categorias_articulos');
            return $query->result();
        }	

        public function getListaCategorias() {
            $this->db->order_by('orden');
            $query =  $this->db->get('categorias_articulos');
            $resultado = $query->result();
            $cats = array();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['id'] = $value->id;
                $temp['categoria'] = $value->categoria;
                $temp['num_articulos'] = $this->numArticulos($value->id);
                $temp['orden'] = $value->orden;
                $temp['estado'] = $value->estado;
                $cats[] = $temp;
            }
            return $cats;
        }

        public function numArticulos($id_categoria) {
            $this->db->where('id_categoria', $id_categoria);
            $query =  $this->db->get('articulos');
            return $query->num_rows();
        }        
	}
?>