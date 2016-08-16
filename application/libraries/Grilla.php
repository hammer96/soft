<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grilla {

	private $column;
	private $table;
	protected $ci;

	public function __construct(){
		$this->ci =& get_instance();
	}
	public function setColumn($columna) {
		$this->column[] = $columna;
	}

	public function getColumns() {
		return $this->column;
	}

	public function setTable($table) {
		$this->table = $table;
	}

	public function getTable() {
		return $this->table;
	}



	public function grillaData() {

		$columns = $this->getColumns();
		$table = $this->getTable();
		$total_registros = $this->ci->db->get_where($table,array("estado"=>"1"))->num_rows();
		$total_filtered = $total_registros;
		$select = "select ";
		$where = "from ".$table." where 1=1 ";

		for ($i=0 ; $i < count($columns) ; $i++) {

			if($i == count($columns)-1) {
				$select .= $columns[$i]." ";

			} else {
				$select .= $columns[$i].", ";

			}

		}
		if(!empty($_REQUEST['search']['value'])) {
			for ($i=0 ; $i < count($columns) ; $i++) {
				if($i == 0) {
					$where .= "and ( ".$columns[$i]." ilike '".$_REQUEST['search']['value']."%' ";
				}
				if($i == count($columns)-1) {

					$where .= "or ".$columns[$i]." ilike '".$_REQUEST['search']['value']."%' )";
				} else {

					$where .= "or ".$columns[$i]." ilike '".$_REQUEST['search']['value']."%' ";
				}

			}
		}

		$order_by = " order by ". $columns[$_REQUEST['order'][0]['column']]." ".$_REQUEST['order'][0]['dir']." limit ".$_REQUEST['length']."  offset ".$_REQUEST['start']."  ";
		$consulta = $select.$where.$order_by;
		#print_r($consulta); exit;
		$registros = $this->ci->db->query($consulta)->result();
		$j = 0;
		if(count($registros) > 0) {
			foreach ($registros as $key => $value) {
				for ($i=0; $i < count($columns) ; $i++) {
					$column_name = (string)$columns[$i];
					$data[$j][] = $value->$column_name;
				}
				$j++;
			}
		} else {
			$data = array();
		}


		$json_data = array(
			"draw"            => intval( $_REQUEST['draw'] ),
			"recordsTotal"    => intval( $total_registros ),
			"recordsFiltered" => intval( $total_filtered ),
			"data"            => $data
			);

		return $json_data;


	}
}

?>