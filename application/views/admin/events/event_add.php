<script type="text/javascript">
  this_page="#eventos";
</script>
<h1>Eventos</h1>
<div class="col-sm-3">
 
		<?= form_open('admin_home/valid_user/events', 'class="form_admin"');?>
				<fieldset>
			     
           <label>Temporada 
            <?= form_error('event_period_id', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <select name="event_period_id" class="form-control">
            <? foreach ($periods->result() as $period) {
              $tit= $period->period_title;
              $id= $period->period_is;
              echo '<option value="'.$id.'">'.$tit.'</option>';
            }  ?>
          </select>
		      
          <legend>Agregar</legend>					
					<label>Titulo 
						<?= form_error('event_title', '<br><span class="label label-danger">', '</span>'); ?>
					</label>
					<?= form_input('event_title', $this->input->post('event_title'));?>
					
					<label>Descripción
						<?= form_error('event_description', '<br><span class="label label-danger">', '</span>'); ?>
					</label>
					<?= form_textarea('event_description', $this->input->post('event_description'));?>

				
          <label>Lugar
            <?= form_error('event_place', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('event_place', $this->input->post('event_place'));?>
          
          <label>Hora
            <?= form_error('event_hour', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('event_hour', $this->input->post('event_hour'));?>
          
          <label>Mapa
            <?= form_error('event_map', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea ('event_map', $this->input->post('event_map'));?>
         
          <label>Limite de usuarios
            <?= form_error('event_user_limit', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('event_user_limit', $this->input->post('event_user_limit'));?>

          <label>Fecha de evento
            <?= form_error('event_date', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('event_date', $this->input->post('event_date'), 'class="cal"');?>
          
						

					<?= form_submit('event_add', 'Agregar', 'class="btn btn-info btn-block"');?>
  				</fieldset>
			<?= form_close();?>	


  </div>
  
  	<div class="col-sm-9">
        <div class="table-responsive">
          <table class="table table-hover panel">
            <thead>
              <tr>
                <th></th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Limite de usuarios</th>
                <th>Temporada</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
          	<? foreach ($events->result() as $event) { ?>
             
            
                <tr>			
                  <td>
                    <? if($event->event_is_full == 1){ echo '<a  href="'.site_Url() .'/admin_home/valid_user/event/'. $event->event_id .'" class="btn btn-xs btn-danger">Evento lleno</a>';}
                    else{echo '<a  href="'.site_Url() .'/admin_home/valid_user/event/'.$event->event_id .'" class="btn btn-xs btn-success">Lugares disponibles</a>';} ?>
                  </td>
                  <td><?= $event->event_title ?></td>
                  <td><?= nice_date($event->event_date, 'd-M-Y') ?></td>
                  <td><?= $event->event_user_limit ?></td>
                  <td><?= $event->period_title ?></td>
                  <td>
                    <div class="btn-group" role="group" aria-label="">                      
                    <a href="<?= site_Url(); ?>/admin_home/valid_user/event/<?= $event->event_id ?>" class="btn btn-default btn-xs">
                      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </a>       
                    </div>
                  </td>
                </tr>		
              <? } ?>

            </tbody>
          </table>
        	<div class="txt_c"> <?= $this->pagination->create_links();?></div>
        </div>
 	 </div>
      <script type="text/javascript">
      

   </script>