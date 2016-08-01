<?php
class BaseModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($tabla,$campos)
	{
		for($i = 0 ; $i < count($campos); $i++) {
			$data[$campos[$i]] = $this->input->post($campos[$i]);
		}
		$estado = $this->db->insert($tabla, $data);

		if ($estado) {
			return "i";
		}else{
			return "ei";
		}
	}

	public function modificar($tabla,$campos,$id){
		for($i = 0 ; $i < count($campos); $i++) {
			$data[$campos[$i]] = $this->input->post($campos[$i]);
		}
		$this->db->where($id, $this->input->post("id"));
		$estado= $this->db->update($tabla, $data);
		if ($estado==1) {
			return "m";
		}else{
			return "em";
		}
	}

	public function eliminar($array){

		$data = array(
           $array[2] => "I"
        );
		$this->db->where($array[1], $this->input->post("id"));
		$estado= $this->db->update($array[0], $data);
		if ($estado==1) {
			return "1";
		}else{
			return "0";
		}
	}
}

?>