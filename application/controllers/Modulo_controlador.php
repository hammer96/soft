<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo_controlador extends CI_Controller {

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
		$this->load->model('Modulo_modelo');

	}


	public function index()
	{
		$data["modulos"]=$this->Modulo_modelo->traer_mo();
		$data["padres"]=$this->Modulo_modelo->traer_padres();
		$this->load->view('modulos/index',$data);
	}

     public function tabla()
     {
          $html="";
          $modulos = $this->Modulo_modelo->traer_mo();
          foreach ($modulos as $key => $value) {
			$html.= '<tr>';
  			$html.= '<td>'.$value->modulo_id.'</td>';
			$html.= '<td>'.$value->modulo_nombre.'</td>';
			$html.= '<td>'.$value->modulo_icono.'</td>';
			$html.= '<td>'.$value->modulo_url.'</td>';
			$html.= '<td>'.$value->modulo_padre.'</td>';;
			$html.= '<td>'.$value->estado.'</td>';

			$html.= '<td><button  onclick="modificar_modulo('.$value->modulo_id.')"  type="button" class="btn btn-primary"><i class="fa-file-text-o"></i></button>  <button onclick="eliminar_m('.$value->modulo_id.')" type="button" class="btn btn-danger"></button>';
			$html.='</tr>';

		}
		return $html;
     }

	public function guarda_modulo()
	{

		if ($_POST['modulo_id']=='') {

               $result=$this->Modulo_modelo->guardarmodu();
		}else{
               $result=$this->Modulo_modelo->modificar_modu();

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



