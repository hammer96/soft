<?php
class Perfil_modelo extends CI_Model {

public function __construct()
    {
                // Call the CI_Model constructor
        parent::__construct();
    }

    public function traerperfil()
	{
		//return $this->db->get_where("perfiles",array("estado"=>"1"))->result();
		return $this->db->query("SELECT
			seguridad.perfiles.perfil_id,
			seguridad.perfiles.perfil_descripcion,
			seguridad.perfiles.estado
			FROM
			seguridad.perfiles
			WHERE
			seguridad.perfiles.estado = 1")->result();

	}

     public function guardarperfil()
    {
        $data=array(
            'perfil_descripcion'=>$this->input->post('descripcion')

            );

        $r=$this->db->insert("seguridad.perfiles",$data);
        if ($r) {
           echo 'Insertando';
        }
        else{
            echo 'error';
        }
    }



}
?>
