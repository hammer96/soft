<?php
class Perfil_modelo extends CI_Model {

public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }

    public function traerperfil()// es para mstrar en la tabla
	{
		//return $this->db->get_where("perfil",array("estado"=>"1"))->result();
		return $this->db->query("SELECT
			seguridad.perfil.perfil_id,
			seguridad.perfil.perfil_descripcion,
			seguridad.perfil.estado
			FROM
			seguridad.perfil
			WHERE
			seguridad.perfil.estado = 1")->result();

	}

     public function guardarperfil()
    {
        $data=array(
            'perfil_descripcion'=>$this->input->post('descripcion')

            );

        $r=$this->db->insert("seguridad.perfil",$data);
        if ($r) {
           echo 'Insertando';
        }
        else{
            echo 'error';
        }
    }

    public function traer_perfil()//es para jalar uno
    {
    	$this->db->where('perfil_id',$this->input->post('perfil_id'));
    	return $this->db->get('seguridad.perfil')->row();
    }
    public function modificar_perfil()
    {

    	$data=array(

            'perfil_descripcion'=>$this->input->post('descripcion')

                );
    	$this->db->where('perfil_id',$this->input->post('perfil_id'));
             $r=$this->db->update("seguridad.perfil",$data);
            if ($r) {
                echo 'modifcado';
            }
            else{
                echo 'error';
            }
    }
    public function eliminarp()
    {
    	$data=array(
                'estado'=>'0'
                );
            $this->db->where('perfil_id',$this->input->post('perfil_id'));
          $r=$this->db->update('seguridad.perfil',$data);
            if ($r){
                echo 'eliminado';

            } else{
                echo 'error';
            }

    }


}
?>
