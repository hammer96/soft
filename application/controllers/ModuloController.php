<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class ModuloController extends BaseController {

	public function __construct() {
		parent:: __construct();
		$this->load->library("Grilla");
	}


	public function index() {

		$view = "modulo/index";

		#$data["Modulos"]=$this->db->get_where();
		// $data["modulos"] = $this->Modulo_modelo->traer_perfiles();
		// $data["url"] = base_url()."modulos";
		$data["scripts"] = $this->cargar_js(["modulo.js"]);
		parent::init($view,$data);

	}

	public function dataGrilla() {

		$grilla_modulo = new Grilla();
		$grilla_modulo->setTable("seguridad.empleado");
		$grilla_modulo->setColumn("empleado_nombres");
		$grilla_modulo->setColumn("empleado_apellidos");
		$grilla_modulo->setColumn("empleado_user");
		$grilla_modulo->setColumn("empleado_pass");
		$json_data = $grilla_modulo->grillaData();
		echo json_encode($json_data);
	}


	public function guarda_Modulo()
	{

		if ($_POST['Modulo_id']=='') {

			$result=$this->Modulo_modelo->guardaremple();
		}else{
			$result=$this->Modulo_modelo->modificar_emple();

		}
		$tabla = $this->tabla();
		echo  $result."|".$tabla;

	}

	public function traer_Modulo()
	{
		$res=$this->Modulo_modelo->traer_emplea();
		echo json_encode($res);

	}
	public function eliminar_Modulo()
	{
		$result=$this->Modulo_modelo->eliminare();
		$perfiles = $this->Modulo_modelo->traer_emple();

		$tabla = $this->tabla();
		echo  $result."|".$tabla;
	}



}



