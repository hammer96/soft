<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_controlador extends CI_Controller {

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
		$this->load->model('Empleado_modelo');

	}


	public function index()
	{
		$data["empleados"]=$this->Empleado_modelo->traer_emple();
		$data["perfiles"]=$this->Empleado_modelo->traer_perfiles();
		$this->load->view('empleado/index',$data);
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



