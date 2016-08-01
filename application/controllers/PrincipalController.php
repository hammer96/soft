<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "BaseController.php";

class PrincipalController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->model('BaseModel');
	}

	public function index() {
		$view = "principal/index";
		parent::init($view);

	}
}
