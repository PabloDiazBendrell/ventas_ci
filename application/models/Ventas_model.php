<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {
	public function getComprobantes(){
		$resultados=$this->db->get("tipo_comprobante");
		return $resultados->result();
	}

	public function getComprobante($idcomprobante){
		$this->db->where("id",$idcomprobante);
		$resultado=$this->db->get("tipo_comprobante");
		return $resultado->row();

	}

	public function getproductos($valor){
		$this->db->select("id,codigo,nombre as label,precio,stock");
		$this->db->from("productos");
		$this->db->like("nombre",$valor);
		$resultados=$this->db->get();
		return $resultados->result_array();

	}

	public function save($data){
		return $this->db->insert("ventas",$data);

	}

	public function lasID(){
		return $this->db->insert_id();
	}

	public function updateComprobante($idcomprobante,$data){
		$this->db->where("id",$idcomprobante);
		$this->db->update("tipo_comprobante",$data);

	}

	public function save_detalle($data){
		$this->db->insert("detalle_venta",$data);
	}
}

?>