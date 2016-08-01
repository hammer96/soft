<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>System Comerce </title>
	<!--<link href="favicon1.html" rel="icon" type="image/x-icon" />-->
	<?php include("assets/layouts/css.php"); ?>
</head>

<body>

	<?php include("assets/layouts/header.php"); ?>

	<div class="container" id="content-container">
		<div class="content-wrapper">
			<div class="row">
				<div class="side-nav-content">
					<?php include("assets/layouts/menu.php"); ?>
					<div class="main-content-wrapper">
						<div class="container-fluid container-padded dash-controls">
							<div class="row">
								<div class="col-md-12">
									<ol class="breadcrumb">
										<li><a href="#">Inicio</a></li>
										<li><a href="#">Library</a></li>
										<li class="active">Data</li>
									</ol>
								</div>
							</div>
						</div>
						<div class="main-content">
							<section>
								<div class="main-content">
									<section>
										<div class="container-fluid container-padded">
											<div class="row">
												<div class="col-md-12 page-title">


													<div class="pull-right">
														<button id="btnnuevo" onclick="modal()" data-toggle="modal" data-target="#mod-form" type="button" class="btn btn-success"><i class="fa-plus-square"></i> Nuevo Modulo</button>
													</div>
													<h2>Modulos</h2>
													<hr>
												</div>
											</div>
										</div>

										<div class="container-fluid container-padded">
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-plain">
														<div class="panel-body">
															<div class="table-responsive">
																<table cellpadding="0" cellspacing="0" border="10" class="datatable table table-striped table-bordered">
																	<thead>
																		<tr>
																			<th>Id</th>
																			<th>Nombre</th>
																			<th>Icono</th>
																			<th>URL</th>
																			<th>Padre</th>
																			<th>Estado</th>
																			<th>Acciones</th>
																		</tr>
																	</thead>
																	<tbody id="informacion">
																		<?php

																		foreach ($modulos as $key => $value) {
																			echo '<tr>';
																			echo '<td>'.$value->modulo_id.'</td>';
																			echo '<td>'.$value->modulo_nombre.'</td>';
																			echo '<td>'.$value->modulo_icono.'</td>';
																			echo '<td>'.$value->modulo_url.'</td>';
																			echo '<td>'.$value->modulo_padre.'</td>';
																			echo '<td>'.$value->estado.'</td>';
																			echo '<td><button  onclick="modificar_modulo('.$value->modulo_id.')"  type="button" class="btn btn-primary"><i class="fa-file-text-o"></i></button> <button onclick="eliminar_m('.$value->modulo_id.')" type="button" class="btn btn-danger"></button>'
																			;

																		}

																		?>

																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
							</div>


						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mod-form" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Nuevo Modulo</h4>
			</div>
			<div class="modal-body">
				<form name="modulo_insert" role="form"  method="POST">
					<div class="form-group">
						<input type="hidden" name="modulo_id" value="">
						<label for="nombre" class="col-sm-4 control-label">Nombre:</label>
						<div class="col-sm-0">
						<input  name="nombre" type="text" class="form-control"  placeholder="Ingrese sus nombres">
						<div id="msg_n"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="icono">Icono:</label>
						<input  name="icono" type="text" class="form-control"  placeholder="Icono">
						<div id="msg_i"></div>
					</div>
					<div class="form-group">
						<label for="url">URL:</label>
						<input  name="url" type="text" class="form-control"  placeholder="Ingrese la url">
						<div id="msg_u"></div>
					</div>

						<div class="form-group">
						<input type="hidden" name="idhijo" value="">
                                        <label for="normal-field" class="col-sm-7 control-label">Padre:</label>
                                        <div class="col-sm-0">
                                            <select name="id_padre" id="" class="form-control">
                                                <option value="">Seleccione</option>
                                                 <?php
                                                    foreach($padres as $value) {
                                                        echo '<option value="'.$value->modulo_id.'">'.$value->modulo_nombre.'</option>';
                                                    }
                                                 ?>
                                            </select>

                                        </div>
							</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="button" onclick="guardar_modulo()"  class="btn btn-success" >Guardar</button>
			</div>

		</div>
	</div>
</div>
<?php include("assets/layouts/footer.php"); ?>
<?php include("assets/layouts/js.php"); ?>
<?php include("assets/app/modulo.php") ?>
</body>

</html>