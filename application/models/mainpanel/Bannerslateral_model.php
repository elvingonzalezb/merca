<?php
    class Bannerslateral_model extends CI_Model {
        public function __construct()
        {
                parent::__construct();
        }

        public function getListaBanners() {
            $this->db->order_by('orden');
            $query =  $this->db->get('bannerslateral');
            return $query->result();
        }
        
        public function getBanner($id_banner) {
            $this->db->where('id_banner', $id_banner);
            $query =  $this->db->get('bannerslateral');
            return $query->row();
        }
        
        public function updateBanner($id_banner, $data) {
            $this->db->where('id_banner', $id_banner);
            $this->db->update('bannerslateral', $data);
        }
        
        public function deleteBanner($id_banner) {
            $this->db->where('id_banner', $id_banner);
            $this->db->delete('bannerslateral');
        }
        
        public function grabarBanner($data) {
            $resultado = $this->db->insert('bannerslateral', $data);
            return $resultado;
        }

        public function ultimoBanner(){
            $this->db->select_max('orden');
            $query = $this->db->get('bannerslateral');
            return $query->row();
        }

       public function getTextos($current_section)
        {
            $this->db->where("seccion", $current_section);
            $query=$this->db->get("textos_web");
            return $query->row();
        }

       public function updateTextosWeb($id_seccion, $data) 
        {
            $this->db->where("id", $id_seccion);
            $result = $this->db->update("textos_web", $data);
            return $result;
        }

    }
?>