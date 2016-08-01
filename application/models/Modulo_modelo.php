<?php
class Modulo_modelo extends CI_Model {

public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }

    public function traer_mo()// es para mstrar en la tabla
	{
		//return $this->db->get_where("seguridad.empleados",array("estado"=>"1"))->result();
        return $this->db->query("select p.modulo_nombre as hijo,p.modulo_icono,p.modulo_id as idhijo,p.modulo_url,h.modulo_nombre as padre,h.modulo_id as idpadre from seguridad.modulos as p inner join seguridad.modulos as h on p.modulo_padre=h.modulo_id where p.modulo_id > 1 and p.estado='1' ")->result();


	}
    public function traer_padres()
    {
        return  $this->db->query("select * from seguridad.modulos
            where modulo_padre='1' and  estado='1'")->result();
    }

     public function guardarmodu()
    {
        $data=array(
            'modulo_nombre'=>$this->input->post('nombre'),
            'modulo_icono'=>$this->input->post('icono'),
            'modulo_url'=>$this->input->post('url'),
            'modulo_padre'=>$this->input->post('id_padre')

            );

        $r=$this->db->insert("seguridad.modulos",$data);
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
