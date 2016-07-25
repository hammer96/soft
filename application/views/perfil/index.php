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
														<button id="btnnuevo" onclick="modal()" data-toggle="modal" data-target="#mod-form" type="button" class="btn btn-success"><i class="fa-plus-square"></i> Nuevo Perfil</button>
													</div>
													<h2>Perfiles</h2>
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
																			<th>Descripcion</th>
																			<th>Estado</th>
																			<th>Acciones</th>
																		</tr>
																	</thead>
																	<tbody id="informacion">
																		<?php

																		foreach ($perfiles as $key => $value) {
																			echo '<tr>';
																			echo '<td>'.$value->perfil_id.'</td>';
																			echo '<td>'.$value->perfil_descripcion.'</td>';
																			echo '<td>'.$value->estado.'</td>';
																			echo '<td><button  onclick="modificar_perfil()"  type="button" class="btn btn-primary"><i class="fa-file-text-o"></i></button>';
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
				<h4 class="modal-title">Nuevo Perfil</h4>
			</div>
			<div class="modal-body">
				<form name="perfil_insert" role="form"  method="POST">
					<div class="form-group">
						<input type="hidden" name="perfil_id" value="">
						<label for="descripcion">Descripcion:</label>
						<input  name="descripcion" type="text" class="form-control"  placeholder="Ingrese la descripcion">
						<div id="msg_perfil"></div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="button" onclick="guardar_perfil()"  class="btn btn-success" >Guardar</button>
			</div>
		</div>
	</div>
</div>
<?php include("assets/layouts/footer.php"); ?>
<?php include("assets/layouts/js.php"); ?>
<?php include("assets/app/perfil.php") ?>
</body>

</html>