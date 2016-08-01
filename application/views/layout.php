<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>System Comerce </title>
	<link href="favicon1.html" rel="icon" type="image/x-icon" />
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


						<!-- <div class="container-fluid container-padded dash-controls">
							<div class="row">
								<div class="col-md-12">
									<ol class="breadcrumb">
										<li><a href="#">Inicio</a></li>
										<li><a href="#">Library</a></li>
										<li class="active">Data</li>
									</ol>
								</div>
							</div>
						</div> -->
						<div class="main-content">
							<section>
								<div class="container-fluid container-padded">
									<!-- <div class="row">
										<div class="col-md-12 page-title">
											<h2>Blank page</h2>
											<hr>
										</div>
									</div> -->
									<?php

									if(isset($param)) {
										foreach ($param as $key => $value) {
											$data[$key] = $value;
										}

										$this->load->view($view,$data);
									}else{
										$this->load->view($view);
									}

									?>
								</div>
								<!-- <div class="container-fluid container-padded">
									<div class="row">
										<div class="col-md-12">
											Blank page.
										</div>
									</div>
								</div> -->
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("assets/layouts/footer.php"); ?>
	<?php include("assets/layouts/js.php"); ?>
</body>

</html>