<?php
	class Modelo_buscar extends CI_Model {

    	public function add_registro($registro){
    		$this->db->insert('REGISTRO', $registro);
    	}    

    	public function registros(){
    		$this->db->select('*');
    		return $this->db->get('REGISTRO')->result_array();
    	}

    	public function delete_registro($id_registro){
    		$this->db->where('ID', $id_registro);
    		$this->db->delete('REGISTRO');
    	}

    	public function update_registro($registro,$id_registro){
    		$this->db->where('ID', $id_registro);
    		$this->db->update('REGISTRO', $registro);
    	}

	}	
?>