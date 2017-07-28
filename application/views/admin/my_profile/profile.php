<?

	$update_my_data =site_url().'/admin_home/valid_user/update_my_data';

	$update_my_pass =site_url().'/admin_home/valid_user/update_my_pass';

?>
<script type="text/javascript">
  this_page="#profile";
</script>

<div class="navbar-header navbar-fixed-top" role="navigation">
	<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="<?php echo base_url('css/images/logo.png'); ?>"></a>
	</div>

<ul class="nav navbar-right top-nav">
		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
				<ul class="dropdown-menu message-dropdown">
						<li class="message-preview">
								<a href="#">
										<div class="media">
												<span class="pull-left">
														<img class="media-object" src="http://placehold.it/50x50" alt="">
												</span>
												<div class="media-body">
														<h5 class="media-heading"><strong>Reclutador 002 </strong>
														</h5>
														<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
														<p>Lorem ipsum dolor sit amet, consectetur...</p>
												</div>
										</div>
								</a>
						</li>
						<li class="message-preview">
								<a href="#">
										<div class="media">
												<span class="pull-left">
														<img class="media-object" src="http://placehold.it/50x50" alt="">
												</span>
												<div class="media-body">
														<h5 class="media-heading"><strong>Reclutador 002 Smith</strong>
														</h5>
														<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
														<p>Lorem ipsum dolor sit amet, consectetur...</p>
												</div>
										</div>
								</a>
						</li>
						<li class="message-preview">
								<a href="#">
										<div class="media">
												<span class="pull-left">
														<img class="media-object" src="http://placehold.it/50x50" alt="">
												</span>
												<div class="media-body">
														<h5 class="media-heading"><strong>Reclutador 002 </strong>
														</h5>
														<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
														<p>Lorem ipsum dolor sit amet, consectetur...</p>
												</div>
										</div>
								</a>
						</li>
						<li class="message-footer">
								<a href="#">Read All New Messages</a>
						</li>
				</ul>
		</li>
		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
				<ul class="dropdown-menu alert-dropdown">
						<li>
								<a href="#">¡Alerta! <span class="label label-default">¡UNA ALERTA!</span></a>
						</li>

				</ul>
		</li>
		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Usuario <b class="caret"></b></a>
				<ul class="dropdown-menu">
						<li>
								<a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
						</li>
						<li class="divider"></li>
						<li>
								<a href="#"><i class="fa fa-fw fa-power-off"></i> Salir</a>
						</li>
				</ul>
		</li>
</ul>
</div>


<div id="page-wrapper">

		<div class="container-fluid">
			<div class="row">

					<div class="col-lg-6  col-md-6">
							<div class="panel panel-yellow">
									<div class="panel-heading">
											<div class="row">
													<div class="col-xs-3">
															<i class="fa fa-calendar fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">
															<div class="huge">14</div>
															<div>Nuevas Entrevistas</div>
													</div>
											</div>
									</div>
									<a href="#">
											<div class="panel-footer">
													<span class="pull-left">Ver Detalles</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
					</div>
					<div class="col-lg-6  col-md-6">
							<div class="panel panel-red">
									<div class="panel-heading">
											<div class="row">
													<div class="col-xs-3">
															<i class="fa fa-thumb-tack fa-5x"></i>
													</div>
													<div class="col-xs-9 text-right">
															<div class="huge">8</div>
															<div>Colocaciones Exitosas</div>
													</div>
											</div>
									</div>
									<a href="#">
											<div class="panel-footer">
													<span class="pull-left">Ver Detalles</span>
													<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
													<div class="clearfix"></div>
											</div>
									</a>
							</div>
					</div>
			</div>


<header class="admin_header">


	<h3>Mi perfil</h3>

	<p>Aqui puedes editar tus datos y cambiar tu contraseña</p>

</header>



<?= form_open($update_my_data, 'class="form_admin col-sm-6"');?>

	<fieldset class="">

		<legend>Datos personales</legend>

			<label>Nombre</label>

				<?= form_input('user_name', $user_name, 'required');?>

			<label>Apellido</label>

				<?= form_input('user_lastName', $user_last, 'required');?>

			<label>Correo</label>

				<?= form_input('user_mail', $user_mail, 'required');?>
			<input name="user_id" value="<?= $user_id?>" type="hidden">

				<?= form_submit('user_data', 'Actualizar', 'class="btn btn-block btn-info"');?>

	</fieldset >

<?= form_close();?>

<?= form_open($update_my_pass, 'class="form_admin col-sm-6"');?>
<? if(isset($pass_changed)){?>
<div class="alert alert-success" role="alert"> Contraseña cambiada correctamente.</div>
<?}?>

	<fieldset class="">

		<legend>Cambia tu contraseña</legend>

			<label>Nueva contraseña</label>
				<?= form_error('user_pass', '<br><span class="label label-danger">', '</span>'); ?>
				<?= form_password('user_pass');?>

			<label>Confirmar contraseña</label>
				<?= form_error('user_passC', '<br><span class="label label-danger">', '</span>'); ?>
				<?= form_password('user_passC');?>
			<input name="user_id" value="<?= $user_id?>" type="hidden">
				<?= form_submit('user_pass_data', 'Cambiar', 'class="btn btn-block btn-info"');?>

	</fieldset>

<?= form_close();?>

</div>

</div>
