<script type="text/javascript">
  this_page="#usuarios";
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

<h1>Usuarios</h1>

<div class="row">
    <?= form_open('admin_home/valid_user/users_event', 'class="form_admin"');?>
    <?
        //values for option select yes/no
        $options = array(
          ''         => '--',
          'si'         => 'Si',
          'no'           => 'No'
      );
    ?>
        <fieldset>
          <legend>Agregar usuario</legend>

        <div class="col-sm-4">

          <label>Nombre
            <?= form_error('user_name', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_name', $this->input->post('user_name'));?>

          <label>Apellidos
            <?= form_error('user_lastName', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_lastName', $this->input->post('user_lastName'));?>

          <label>edad
            <?= form_error('edad', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('edad', $this->input->post('edad'));?>

          <label>genero
            <?= form_error('genero', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('genero', $this->input->post('genero'));?>

          <label>Email
            <?= form_error('user_mail', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('user_mail', $this->input->post('user_mail'));?>

          <label>domicilio
            <?= form_error('domicilio', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('domicilio', $this->input->post('domicilio'));?>

          <label>municipio
            <?= form_error('municipio', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('municipio', $this->input->post('municipio'));?>

          <label>cel
            <?= form_error('cel', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('cel', $this->input->post('cel'));?>

        </div>

        <div class="col-sm-4">

          <label>nacimiento
            <?= form_error('nacimiento', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('nacimiento', $this->input->post('nacimiento'), 'class="cal"');?>

          <label>Auto propio
            <?= form_error('auto', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_dropdown('auto', $options, $this->input->post('auto'), 'class="form-control"'); ?>


          <label>escolaridad
            <?= form_error('escolaridad', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('escolaridad', $this->input->post('escolaridad'));?>

          <label>ingles
            <?= form_error('ingles', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_dropdown('ingles', $options, $this->input->post('ingles'), 'class="form-control"'); ?>

          <label>disponibilidad
            <?= form_error('disponibilidad', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_dropdown('disponibilidad', $options, $this->input->post('disponibilidad'), 'class="form-control"'); ?>

          <label>experiencia
            <?= form_error('experiencia', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('experiencia', $this->input->post('experiencia'));?>

          <label>detalles
            <?= form_error('detalles', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('detalles', $this->input->post('detalles'));?>

        </div>
        <div class="col-sm-4">

          <label>puesto
            <?= form_error('puesto', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('puesto', $this->input->post('puesto'));?>


          <label>rfc
            <?= form_error('rfc', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('rfc', $this->input->post('rfc'));?>

          <label>curp
            <?= form_error('curp', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('curp', $this->input->post('curp'));?>

          <label>Estado civil
            <?= form_error('civil', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('civil', $this->input->post('civil'));?>

          <label>nns
            <?= form_error('nns', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('nns', $this->input->post('nns'));?>

          <label>cedula
            <?= form_error('cedula', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('cedula', $this->input->post('cedula'));?>

          <label>escuela
            <?= form_error('escuela', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('escuela', $this->input->post('escuela'));?>

        </div>



          <?= form_submit('user_event_add', 'Agregar usuario', 'class="btn btn-info btn-block"');?>
          </fieldset>
      <?= form_close();?>



</div>
<div class="row">

    <?= form_open('admin_home/valid_user/users_event', 'class="form_admin edit_user_form"');?>
        <fieldset>
          <legend>Editar usuario</legend>

  <div class="col-sm-3">
          <label>Nombre </label>
          <?= form_input('user_name_edit');?>
          <label>Apellidos</label>
          <?= form_input('user_lastName_edit');?>
          <label>Email </label>
          <?= form_input('user_mail_edit');?>


          <label>domicilio</label>
          <?= form_input('domicilio_edit');?>

          <label>edad</label>
          <?= form_input('edad_edit');?>

          <label>genero</label>
          <?= form_input('genero_edit');?>

          <label>escolaridad</label>
          <?= form_textarea('escolaridad_edit');?>

          <label>disponibilidad</label>
          <?= form_input('disponibilidad_edit');?>

          <label>experiencia</label>
          <?= form_input('experiencia_edit');?>

          <label>detalles</label>
          <?= form_input('detalles_edit');?>

          <label>ingles</label>
          <?= form_input('ingles_edit');?>

          <label>cel</label>
          <?= form_input('cel_edit');?>

          <label>puesto</label>
          <?= form_input('puesto_edit');?>

          <label>rfc</label>
          <?= form_input('rfc_edit');?>

          <label>curp</label>
          <?= form_input('curp_edit');?>

          <label>nacimiento</label>
          <?= form_input('nacimiento_edit', '', 'class="cal"');?>

          <label>civil</label>
          <?= form_input('civil_edit');?>

          <label>nns</label>
          <?= form_input('nns_edit');?>

          <label>cedula</label>
          <?= form_input('cedula_edit');?>

          <label>escuela</label>
          <?= form_input('escuela_edit');?>

        <label>municipio</label>
          <?= form_input('municipio_edit');?>

        <label>auto</label>
          <?= form_input('auto_edit');?>

  </div>



          <input type="hidden" name="user_event_id">

          <?= form_submit('user_event_edit', 'Actualizar', 'class="btn btn-default btn-block"');?>
        </fieldset>
      <?= form_close();?>


</div>

<div class="row">
    <div class="col-sm-12">
      <h3>Lista de usuarios</h3>
        <div class="table-responsive ">
          <table class="table table-hover panel">
            <thead>
              <tr class="">
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>E-mail</th>

                <th>domicilio</th>
                <th>edad</th>
                <th>genero</th>
                <th>escolaridad</th>
                <th>disponibilidad</th>
                <th>experiencia</th>
                <th>detalles</th>
                <th>ingles</th>
                <th>cel</th>
                <th>puesto</th>
                <th>rfc</th>
                <th>curp</th>
                <th>nacimiento</th>
                <th>civil</th>
                <th>nns</th>
                <th>cedula</th>
                <th>escuela</th>
                <th>municipio</th>
                <th>auto</th>

                <th></th>
              </tr>
            </thead>
            <tbody >
            <? foreach ($users_event->result() as $x ) { ?>
                <tr>
                  <td class="ue_name" data-id="<?= $x->user_event_id ?>"><?= $x->user_event_name; ?> </td>
                  <td class="ue_last"><?= $x->user_event_lastName; ?></td>
                  <td class="ue_email"><?= $x->user_event_email; ?></td>

                  <td class="ue_domicilio"><?= $x->domicilio; ?></td>
                  <td class="ue_edad"><?= $x->edad; ?></td>
                  <td class="ue_genero"><?= $x->genero; ?></td>
                  <td class="ue_escolaridad"><?= $x->escolaridad; ?></td>
                  <td class="ue_disponibilidad"><?= $x->disponibilidad; ?></td>
                  <td class="ue_experiencia"><?= $x->experiencia; ?></td>
                  <td class="ue_detalles"><?= $x->detalles; ?></td>
                  <td class="ue_ingles"><?= $x->ingles; ?></td>
                  <td class="ue_cel"><?= $x->cel; ?></td>
                  <td class="ue_puesto"><?= $x->puesto; ?></td>
                  <td class="ue_rfc"><?= $x->rfc; ?></td>
                  <td class="ue_curp"><?= $x->curp; ?></td>
                  <td class="ue_nacimiento"><?= $x->nacimiento; ?></td>
                  <td class="ue_civil"><?= $x->civil; ?></td>
                  <td class="ue_nns"><?= $x->nns; ?></td>
                  <td class="ue_cedula"><?= $x->cedula; ?></td>
                  <td class="ue_escuela"><?= $x->escuela; ?></td>
                  <td class="ue_municipio"><?= $x->municipio; ?></td>
                  <td class="ue_auto"><?= $x->auto; ?></td>



                  <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="#" class="btn btn-default btn-xs btn-edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a href="#" class="btn btn-default btn-xs borrar">
                      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                      <span class="confirmar">Cancelar</span>
                    </a>

                  </div>
                  <a href="<?= site_Url(); ?>/admin_home/valid_user/users_event/<?= $x->user_event_id ?>" class="btn btn-danger btn-xs confirmar">Confirmar borrado</a>
                  </td>

                </tr>
            <? } ?>


            </tbody>
          </table>
          <nav aria-label="Page navigation" class="txt_c">
            <ul class="pagination">
              <?= $this->pagination->create_links();?>
            </ul>
          </nav>
        </div>
   </div>

</div>

</div></div>

  <script type="text/javascript">

    $(function(){
        $('.edit_user_form input,.edit_user_form label').hide();
        $('.confirmar').hide();

        $('.borrar').click(function(event){
          event.preventDefault();
          $(this).closest('td').find('.confirmar').fadeToggle('fast');

        });

        $('.btn-edit').click(function(event){
            event.preventDefault();

           $('input[name="user_event_id"]').val( $(this).closest('tr').find('.ue_name').attr('data-id'));
           $('input[name="user_name_edit"]').val( $(this).closest('tr').find('.ue_name').text());
           $('input[name="user_lastName_edit"]').val( $(this).closest('tr').find('.ue_last').text());
           $('input[name="user_mail_edit"]').val( $(this).closest('tr').find('.ue_email').text());


           $('input[name="domicilio_edit"]').val( $(this).closest('tr').find('.ue_domicilio').text());
           $('input[name="edad_edit"]').val( $(this).closest('tr').find('.ue_edad').text());
           $('input[name="genero_edit"]').val( $(this).closest('tr').find('.ue_genero').text());
           $('textarea[name="escolaridad_edit"]').val( $(this).closest('tr').find('.ue_escolaridad').text());
           $('input[name="disponibilidad_edit"]').val( $(this).closest('tr').find('.ue_disponibilidad').text());
           $('input[name="experiencia_edit"]').val( $(this).closest('tr').find('.ue_experiencia').text());
           $('input[name="detalles_edit"]').val( $(this).closest('tr').find('.ue_detalles').text());
           $('input[name="ingles_edit"]').val( $(this).closest('tr').find('.ue_ingles').text());
           $('input[name="cel_edit"]').val( $(this).closest('tr').find('.ue_cel').text());
           $('input[name="puesto_edit"]').val( $(this).closest('tr').find('.ue_puesto').text());
           $('input[name="rfc_edit"]').val( $(this).closest('tr').find('.ue_rfc').text());
           $('input[name="curp_edit"]').val( $(this).closest('tr').find('.ue_curp').text());
           $('input[name="nacimiento_edit"]').val( $(this).closest('tr').find('.ue_nacimiento').text());
           $('input[name="civil_edit"]').val( $(this).closest('tr').find('.ue_civil').text());
           $('input[name="nns_edit"]').val( $(this).closest('tr').find('.ue_nns').text());
           $('input[name="cedula_edit"]').val( $(this).closest('tr').find('.ue_cedula').text());
           $('input[name="escuela_edit"]').val( $(this).closest('tr').find('.ue_escuela').text());
           $('input[name="municipio_edit"]').val( $(this).closest('tr').find('.ue_municipio').text());
           $('input[name="auto_edit"]').val( $(this).closest('tr').find('.ue_auto').text());


            $('.edit_user_form input,.edit_user_form label').fadeIn();
        });


          // Create a new password on page load
          $('.random_pass').each(function(){
            $(this).val(randString($(this)));
          });


    });
  </script>
