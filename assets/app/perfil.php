<script>
	function modal()
	{
		$('form[name=perfil_insert]').trigger("reset");
		$("#msg_perfil").empty();

		$("#mod-form").modal('show');
	}

	function guardar_perfil()
	{
		if(perfil_insert.descripcion.value=="")
		{
			$("#msg_perfil").empty();
			$("#msg_perfil").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=descripcion]").focus(); return false;

		}

		$.ajax({
			url:'<?php echo site_url("Perfil_controlador/guarda_perfil") ?>',
			type:"post",
			data:$('form[name=perfil_insert]').serialize(),
			success:function(data){
				$info = data.split("|");
				if ($info[0]=="1")
				 {
				 	$("#informacion").empty();
				 	$("#informacion").html($info[1]);
				 	alert("Exito al guardar");

				}else
				{
					alert("Error al insertar");
				}
				$("input[name=perfil_id] ").val('');
				$('form[name=perfil_insert]').trigger("reset");
				$('#mod-form').modal('hide');
			}


		});
	}





</script>