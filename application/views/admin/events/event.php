	<? foreach ($event as $x) { 
		$user_limit 	=	$x->event_user_limit;
		$description 	= 	$x->event_description;
		$event_title 	=	$x->event_title;
		$event_date 	= 	$x->event_date;
		$event_period_id=	$x->event_period_id;
		$event_hour		=	$x->event_hour;
		$event_place	=	$x->event_place;
		$event_map		=	$x->event_map;

	} ?>
	<script type="text/javascript">
	  this_page="#eventos";
	</script>
	<div class="row">
	<h1 class="txt_c"><?= $event_title ?></h1>
	<div class="col-sm-4">

	<div class="jumbotron">
		  
		  <p><b>Descripción: </b><?= $description ?></p>
		  <p><b>Limite de asistentes:</b> <?= $user_limit ?></p>
		  <p><b>Fecha del evento:</b> <?= nice_date($event_date, 'd - M - Y' )?></p>

		 <button class="btn btn-danger borrar btn-block">Borrar</button>

		 <div class="alert alert-danger confirmar" role="alert">
		 	 <strong>¡Atención!</strong> eliminar esta empresa no se puede deshacer y se perdera toda la informacion relacionada.
		 	 <br><a href="<?= site_url()?>/admin_home/valid_user/event/<?= $this->uri->segment(4) ?>/1" class="btn-danger btn">Confirmar borrado</a>
		 	 <button class="btn-warning btn cancelar">Cancelar</button>
		 </div>

		</div>

			<?= form_open('admin_home/valid_user/event/'.$this->uri->segment(4), 'class="form_admin"');?>
				<fieldset>
					<legend>Editar</legend>					
					<label>Titulo</label>					
					<?= form_input('event_title', $event_title, 'required');?>
					
					<label>Descripción</label>					
					<?= form_textarea('event_description', $description, 'required rows="5"');?>
				
		          <label>Temporada </label>
					
					<select name="event_period_id" class="form-control" required>
			            <? foreach ($periods->result() as $period) 
			            {
			              $tit= $period->period_title;
			              $id= $period->period_is;
			              if($id==$event_period_id )
			              {
				              echo '<option value="'.$id.'" selected>'.$tit.'</option>';		              	

			              }else{
				              echo '<option value="'.$id.'">'.$tit.'</option>';		              	
			              }
			            }  ?>
			          </select>

		          <label>Lugar</label>
		          <?= form_input('event_place', $event_place, 'required');?>
		         
		          <label>Hora</label>
		          <?= form_input('event_hour', $event_hour, 'required');?>
		         
		          <label>Mapa</label>
		          <?= form_textarea('event_map', $event_map, 'required');?>
		         
		          <label>Limite de usuarios</label>
		          <?= form_input('event_user_limit', $user_limit, 'required');?>

		          <label>Fecha de evento</label>
		          <?= form_input('event_date', $event_date, 'class="cal" required');?>

			          <input type="hidden" value="<?= $this->uri->segment(4); ?>" name="event_id">
					<?= form_submit('event_edit', 'Actualizar', 'class="btn btn-info btn-block"');?>
  				</fieldset>
			<?= form_close();?>		
</div>


<div class="col-sm-8">
	<?if($users_in_event){?>
	<div class="panel">
		<div class="panel-heading">
			Lista de usuarios registrados a este evento
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
				</tr>	
			</thead>

			<tbody>
				<? foreach ($users_in_event as $y) {?>
				<tr>
					<td><?= $y->user_event_name; ?> <?= $y->user_event_lastName; ?></td>
					<td><?= $y->user_event_email; ?></td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>
	<?}else{?>
	
	<div class="alert alert-warning" role="alert">No hay usuarios registrados aun.</div>
		
	<?}?>
</div>

</div>
<script type="text/javascript">
	$(function(){
		$('.confirmar').hide();
		$('.borrar').click(function(event){
			event.preventDefault();
			$('.confirmar').fadeToggle();
			$(this).fadeToggle();
		});
		$('.cancelar').click(function(event){
			event.preventDefault();
			$('.borrar').fadeToggle();
			
			$(this).closest('.confirmar').fadeToggle();
		});
	});
</script>