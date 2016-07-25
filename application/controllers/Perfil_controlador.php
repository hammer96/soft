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
          $perfiles = $this->Perfil_modelo->traerperfil();
          foreach ($perfiles as $key => $value) {
			$html.= '<tr>';
  			$html.= '<td>'.$value->perfil_id.'</td>';
			$html.= '<td>'.$value->perfil_descripcion.'</td>';
			$html.= '<td>'.$value->estado.'</td>';

			$html.= '<td><button  onclick="modificar_perfil('.$value->perfil_id.')"  type="button" class="btn btn-primary"><i class="fa-file-text-o"></i></button>  <button onclick="eliminar_p('.$value->perfil_id.')" type="button" class="btn btn-danger"></button>';
			$html.='</tr>';

		}
		return $html;
     }

	public function guarda_perfil()
	{

		if ($_POST['perfil_id']=='') {

               $result=$this->Perfil_modelo->guardarperfil();
		}else{
               $result=$this->Perfil_modelo->modificar_perfil();

          }
          $tabla = $this->tabla();
		echo  $result."|".$tabla;

	}

	public function traer_perfiles()
	{
		$res=$this->Perfil_modelo->traer_perfil();
		echo json_encode($res);

	}
	public function eliminar_perfil()
	{
		$result=$this->Perfil_modelo->eliminarp();
		$perfiles = $this->Perfil_modelo->traerperfil();

		$tabla = $this->tabla();
		echo  $result."|".$tabla;
	}



}



