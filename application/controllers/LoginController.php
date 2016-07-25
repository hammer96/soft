<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "BaseController.php";

class LoginController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->model('BaseModel');
	}

	public function index() {
		$this->load->view("login");

	}

	public function loguearse() {
		$result = $this->db->get_where("seguridad.empleado",array(
				"empleado_user" => $this->input->post("empleado_user"),
				"empleado_pass" => $this->input->post("empleado_pass")
			))->row();

		if(count($result)>0) {
			$data["response"] = "ok";
		} else {
			$data["response"] = "nothing";
		}

		echo json_encode($data);
	}
}
