<script>
	function modal()
	{
		$('form[name=empleado_insert]').trigger("reset");
		$("#msg_n").empty();
		$("#msg_a").empty();
		$("#msg_dn").empty();
		$("#msg_d").empty();
		$("#msg_email").empty();
		$("#msg_telefono").empty();

		$("#mod-form").modal('show');
	}

	function guardar_empleado()
	{
		if(empleado_insert.nombres.value=="")
		{
			$("#msg_n").empty();
			$("#msg_n").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=nombres]").focus(); return false;

		}
		if(empleado_insert.apellidos.value=="")
		{
			$("#msg_a").empty();
			$("#msg_a").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=apellidos]").focus(); return false;

		}
		if(empleado_insert.dni.value=="")
		{
			$("#msg_dn").empty();
			$("#msg_dn").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=dni]").focus(); return false;

		}
		if(empleado_insert.direccion.value=="")
		{
			$("#msg_d").empty();
			$("#msg_d").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=direccion]").focus(); return false;

		}
		if(empleado_insert.email.value=="")
		{
			$("#msg_email").empty();
			$("#msg_email").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=email]").focus(); return false;

		}
		if(empleado_insert.telefono.value=="")
		{
			$("#msg_telefono").empty();
			$("#msg_telefono").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=telefono]").focus(); return false;

		}

		$.ajax({
			url:'<?php echo site_url("Empleado_controlador/guarda_empleado") ?>',
			type:"post",
			data:$('form[name=empleado_insert]').serialize(),
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
				$("input[name=empleado_id] ").val('');
				$('form[name=empleado_insert]').trigger("reset");
				$('#mod-form').modal('hide');
			}


		});

	}

	function modificar_empleado(empleado_id)
	{
		$.post("<?php echo site_url('Empleado_controlador/traer_empleado') ?>",
		{
			empleado_id:empleado_id
		}, function(data){
			var json=JSON.parse(data);
			$("input[name=empleado_id]").val(json.empleado_id);
			$("input[name=nombres]").val(json.nombres);
			$("input[name=apellidos]").val(json.apellidos);
			$("input[name=dni]").val(json.dni);
			$("input[name=direccion]").val(json.direccion);
			$("input[name=email]").val(json.email);
			$("input[name=telefono]").val(json.telefono);
			$("input[name=perfil_id]").val(json.perfil_id);
			$("#mod-form").modal('show');
		});


	}

	function eliminar_e(empleado_id)
		{
			$.post("<?php echo site_url('Empleado_controlador/eliminar_empleado') ?> ",
			{
				empleado_id:empleado_id
			},function(data)
			{
				$info = data.split("|");
				if($info[0] == "1") {
					//limpiamos el cuerpo de la tabla
					$("#informacion").empty();
					//agregamos los nuevos productos listados
					$("#informacion").html($info[1]);
				}else{
					alert("Error al eliminar");
				}
			})
		}





</script>