<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_controlador extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Perfil_modelo');

	}


	public function index()
	{
		$data["perfiles"]=$this->Perfil_modelo->traerperfil();
		$this->load->view('perfil/index',$data);
	}

     public function tabla()
     {
          $html="";

     }

	public function guarda_perfil()
	{

		if ($_POST['perfil_id']=='') {

               $result=$this->Perfil_modelo->guardarperfil();
		}else{
               $result=$this->Perfil_modelo->modifcar_perfil();
          }
	}


}



