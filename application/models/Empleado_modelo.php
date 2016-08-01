<?php
class Empleado_modelo extends CI_Model {

public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }

    public function traer_emple()// es para mstrar en la tabla
	{
		//return $this->db->get_where("seguridad.empleados",array("estado"=>"1"))->result();
		return $this->db->query("SELECT
                seguridad.empleados.empleado_id,
                seguridad.empleados.empleado_nombres,
                seguridad.empleados.empleado_apellidos,
                seguridad.empleados.empleado_dni,
                seguridad.empleados.empleado_direccion,
                seguridad.empleados.empleado_email,
                seguridad.empleados.empleado_telefono,
                seguridad.empleados.estado,
                seguridad.empleados.perfil_id
                FROM
                seguridad.empleados
                INNER JOIN seguridad.perfiles ON seguridad.empleados.perfil_id = seguridad.perfiles.perfil_id
                WHERE
                seguridad.empleados.estado = 1")->result();

	}
    public function traer_perfiles()
    {
        return  $this->db->query("select * from seguridad.perfiles
            where  estado='1'")->result();
    }

     public function guardaremple()
    {
        $data=array(
            'empleado_nombres'=>$this->input->post('nombres'),
            'empleado_apellidos'=>$this->input->post('apellidos'),
            'empleado_dni'=>$this->input->post('dni'),
            'empleado_direccion'=>$this->input->post('direccion'),
            'empleado_email'=>$this->input->post('email'),
            'empleado_telefono'=>$this->input->post('telefono'),
            'perfil_id'=>$this->input->post('perfil_id')

            );

        $r=$this->db->insert("seguridad.empleados",$data);
        if ($r) {
           echo 'Insertando';
        }
        else{
            echo 'error';
        }
    }

    public function traer_emplea()//es para jalar uno
    {
    	$this->db->where('empleado_id',$this->input->post('empleado_id'));
    	return $this->db->get('seguridad.empleados')->row();
    }
    public function modificar_emple()
    {

    	$data=array(

            'empleado_nombres'=>$this->input->post('nombres'),
            'empleado_apellidos'=>$this->input->post('apellidos'),
            'empleado_dni'=>$this->input->post('dni'),
            'empleado_direccion'=>$this->input->post('direccion'),
            'empleado_email'=>$this->input->post('email'),
            'empleado_telefono'=>$this->input->post('telefono'),
            'perfil_id'=>$this->input->post('perfil_id')

                );
    	$this->db->where('empleado_id',$this->input->post('empleado_id'));
             $r=$this->db->update("seguridad.empleados",$data);
            if ($r) {
                echo 'modifcado';
            }
            else{
                echo 'error';
            }
    }
    public function eliminare()
    {
    	$data=array(
                'estado'=>'0'
                );
            $this->db->where('empleado_id',$this->input->post('empleado_id'));
          $r=$this->db->update('seguridad.empleados',$data);
            if ($r){
                echo 'eliminado';

            } else{
                echo 'error';
            }

    }


}
?>
