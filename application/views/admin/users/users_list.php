<script type="text/javascript">
  this_page="#administradores";
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

<h3>Lista de Administradores</h3>
<p>Agregar administradores y reclutadores<br>
  Adminstradores.- pueden agregar 'Empresas', 'Reclutadores' y 'Administradores'<br>
  Reclutadores.- pueden agregar Prospectos y asignarlos a empresas
</p>

  <div class="col-sm-3">
    <?= form_open('admin_home/valid_user/users', 'class="form_admin"');?>
        <fieldset>
          <legend>Agregar</legend>
          <label>Nombre
            <?= form_error('user_name', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_name', $this->input->post('user_name'));?>
          <label>Apellidos
            <?= form_error('user_lastName', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_lastName', $this->input->post('user_lastName'));?>

          <label>Tipo de usuario</label>
          <br><input type="radio" name="user_type" value="1" > Administrador
          <br><input type="radio" name="user_type" value="0" checked> Reclutador<br>


          <label>Email
            <?= form_error('user_mail', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_mail', $this->input->post('user_mail'));?>

          <label>Contraseña
            <?= form_error('user_password', '<br><span class="label label-danger">', '</span>'); ?>

          </label>
          <input type="text" name="user_password" data-size="7" data-character-set="a-z,0-9" class="random_pass">

          <?= form_hidden('validation', '1');?>
          <?= form_submit('registrarse', 'Agregar', 'class="btn btn-info btn-block"');?>
          </fieldset>
      <?= form_close();?>


  </div>

  <div class="col-sm-9 panel">
        <div class="table-responsive ">
          <table class="table table-hover ">
            <thead>
              <tr>
                <th>Nombre Completo</th>
                <th>E-mail</th>
                <th>Nivel</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="">
          	<? foreach ($users->result() as $user ) {?>
                <tr>
                  <td><?= $user->user_name. ' '.$user->user_lastName; ?></td>
            			<td><?= $user->user_mail; ?></td>
            			<td><? if($user->user_admin==1)echo 'Administrador'; else echo 'Reclutador'; ?></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="#" class="btn btn-default btn-xs borrar">
                      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                      <span class="confirmar">Cancelar</span>
                    </a>
                    </div>
                    <a href="<?= site_Url(); ?>/admin_home/valid_user/users/<?= $user->user_id ?>" class="btn btn-danger btn-xs confirmar">Confirmar borrado</a>
                  </td>

                  </td>
                </tr>
              <?}?>

            </tbody>
          </table>
        	<div class="txt_c"> <?= $this->pagination->create_links();?></div>
        </div>
  </div>
</div>
</div>

<script type="text/javascript">

          // Create a new password on page load
          $('.random_pass').each(function(){
            $(this).val(randString($(this)));
          });
        $('.confirmar').hide();
          $('.borrar').click(function(event){
          event.preventDefault();
          $(this).closest('td').find('.confirmar').fadeToggle();

        });

</script>
