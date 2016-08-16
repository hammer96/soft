<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class EmpleadoController extends CI_Controller {

	public function __construct() {
		parent:: __construct();
	}


	public function index() {

		$view = "empleado/index";
		#$data["empleados"]=$this->db->get_where();
		$data["perfiles"]=$this->Empleado_modelo->traer_perfiles();
		$data["url"] = base_url()."modulos";
		$data["scripts"] = $this->cargar_js(["empleado.js"]);
		parent::init($view,$data);

	}

     public function tabla()
     {
          $html="";
          $empleados = $this->Empleado_modelo->traer_emple();
          foreach ($empleados as $key => $value) {
			$html.= '<tr>';
  			$html.= '<td>'.$value->empleado_id.'</td>';
			$html.= '<td>'.$value->empleado_nombres.'</td>';
			$html.= '<td>'.$value->empleado_apellidos.'</td>';
			$html.= '<td>'.$value->empleado_dni.'</td>';
			$html.= '<td>'.$value->empleado_direccion.'</td>';
			$html.= '<td>'.$value->empleado_email.'</td>';
			$html.= '<td>'.$value->empleado_telefono.'</td>';
			$html.= '<td>'.$value->estado.'</td>';

			$html.= '<td>'.$value->perfil_id.'</td>';

			$html.= '<td><button  onclick="modificar_empleado('.$value->empleado_id.')"  type="button" class="btn btn-primary"><i class="fa-file-text-o"></i></button>  <button onclick="eliminar_e('.$value->empleado_id.')" type="button" class="btn btn-danger"></button>';
			$html.='</tr>';

		}
		return $html;
     }

	public function guarda_empleado()
	{

		if ($_POST['empleado_id']=='') {

               $result=$this->Empleado_modelo->guardaremple();
		}else{
               $result=$this->Empleado_modelo->modificar_emple();

          }
          $tabla = $this->tabla();
		echo  $result."|".$tabla;

	}

	public function traer_empleado()
	{
		$res=$this->Empleado_modelo->traer_emplea();
		echo json_encode($res);

	}
	public function eliminar_empleado()
	{
		$result=$this->Empleado_modelo->eliminare();
		$perfiles = $this->Empleado_modelo->traer_emple();

		$tabla = $this->tabla();
		echo  $result."|".$tabla;
	}



}



