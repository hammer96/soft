<script>
	function modal()
	{
		$('form[name=modulo_insert]').trigger("reset");
		$("#msg_n").empty();
		$("#msg_i").empty();
		$("#msg_u").empty();
		$("#mod-form").modal('show');
	}

	function guardar_modulo()
	{
		if(modulo_insert.nombre.value=="")
		{
			$("#msg_n").empty();
			$("#msg_n").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=nombre]").focus(); return false;

		}
		if(modulo_insert.icono.value=="")
		{
			$("#msg_i").empty();
			$("#msg_i").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=icono]").focus(); return false;

		}
		if(modulo_insert.url.value=="")
		{
			$("#msg_u").empty();
			$("#msg_u").html("<span class='text-danger'>Campo Obligatorio</span>");
			$("input[name=url]").focus(); return false;

		}

		$.ajax({
			url:'<?php echo site_url("Modulo_controlador/guarda_modulo") ?>',
			type:"post",
			data:$('form[name=modulo_insert]').serialize(),
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
				$("input[name=modulo_id] ").val('');
				$('form[name=modulo_insert]').trigger("reset");
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