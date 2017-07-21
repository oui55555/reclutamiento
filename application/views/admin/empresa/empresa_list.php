<script type="text/javascript">
  this_page="#temporadas";
</script>
<h1>Empresa</h1>

 <div class="col-sm-3">
 
		<?= form_open('admin_home/valid_user/periods', 'class="form_admin"');?>
				<fieldset>
					<legend>Agregar empresa</legend>					
					<label>Nombre empresa 
						<?= form_error('period_tit', '<br><span class="label label-danger">', '</span>'); ?>
					</label>
					<?= form_input('period_tit', $this->input->post('period_tit'));?>

        
          <label>Nombre contacto 
            <?= form_error('period_date_start', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('period_date_start', $this->input->post('period_date_start'));?>

         <label>Correo
            <?= form_error('period_date_end', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('period_date_end', $this->input->post('period_date_end'));?>
 
          <label>Direccion
            <?= form_error('period_description', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('period_description', $this->input->post('period_description'));?>


					<?= form_submit('period_add', 'Agregar', 'class="btn btn-info btn-block"');?>
  				</fieldset>
			<?= form_close();?>	

  </div>
  
  	<div class="col-sm-12">
      <h3>Empresas</h3>
        <div class="table-responsive">
          <table class="table table-hover panel">
            <thead>
              <tr>
                <th>Empresa</th>
                <th>Contacto</th>
                <th>Correo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
          	
                <? foreach ($periods->result() as $period) { ?>
                 <tr> 
                               	
                  <td><?= $period->period_title ?></td>
                  <td><?= $period->period_date_start; ?></td>
                  <td><?= $period->period_date_end; ?></td> 
                  <td>
                    <div class="btn-group" role="group" aria-label="">
                    <a href="<?= site_Url(); ?>/admin_home/valid_user/period_users/<?= $period->period_is ?>" class="btn btn-default btn-xs borrar" alt="Asignar usarios">
                      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </a>       
                    </div>
                  </td>

                </tr>		
              <? }?>  

            </tbody>
          </table>
        	<div class="txt_c"> <?= $this->pagination->create_links();?></div>
        </div>
 	 </div>

   <script type="text/javascript">


   </script>