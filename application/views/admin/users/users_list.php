<script type="text/javascript">
  this_page="#administradores";
</script>
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