<?  foreach ($period->result() as $x) {
        $period_title = $x->period_title;
        $period_description = $x->period_description;
        $period_id = $x->period_is;
        $period_date_start = $x->period_date_start;
        $period_date_end = $x->period_date_end;
    } 
?>       
<script type="text/javascript">
  this_page="#temporadas";
</script>
<div class="row">
       <h1 class="txt_c"><?=  $period_title ?> </h1>
       
    <div class="col-sm-4">
      <div class="jumbotron">
          <p><b>Empresa:</b> <?= $period_description ?></p>
          <p><b>Contacto:</b> <?= $period_date_start ?></p>
         <!--  <p><b>Cierre:</b> <?= nice_date($period_date_end, 'd - M - Y' ) ?></p> -->
      
      <button class="btn btn-danger borrar ">Borrar</button>

     <div class="alert alert-danger confirmar" role="alert">
       <strong>¡Atención!</strong> eliminar esta empresa no se puede deshacer y se perdera toda la informacion relacionada.
       <br>
       <a href="<?= site_url()?>/admin_home/valid_user/period_user_delete/<?= $period_id ?>" class="btn btn-danger">Confirmar borrado</a>
       <button class="btn-warning btn cancelar">Cancelar</button>
     </div>

      </div>  
  </div> 
  <div class="col-sm-8">
  <?= form_open('admin_home/valid_user/period_users/'.$period_id, 'class="form_admin"');?>
        <fieldset>

          <legend>Editar empresa</legend>     
          <div  class="col-sm-6">     
          <label>Empresa 
            <?= form_error('period_tit', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('period_tit', $period_title);?>
          <label>Contacto
            <?= form_error('period_date_start', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_input('period_date_start', $period_date_start);?>

          <!-- <label>Fecha de cierre 
            <?= form_error('period_date_end', '<br><span class="label label-danger">', '</span>'); ?>
          </label> 
          <?= form_input('period_date_end', $period_date_end);?>       -->
          <input type="hidden" value="<?= $period_id; ?>" name="period_id">
          <?= form_submit('period_edit', 'Actualizar', 'class="btn btn-info btn-block"');?>
        </div>
        <div class="col-sm-6">
 
          <label>Direccion
            <?= form_error('period_description', '<br><span class="label label-danger">', '</span>'); ?>
          </label>
          <?= form_textarea('period_description', $period_description);?>

        </div>
          </fieldset>
      <?= form_close();?> 

  </div>

</div>

<div class="row">

  <div class="col-sm-6">
    <h3>Usuarios disponibles</h3>
        <div class="table-responsive ">
          <table class="table table-hover panel">
            <thead>
              <tr>
                <th>
                  <button class="btn  btn-xs check_all">
                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                  </button>
                </th>
                <th>Nombre</th>
                <th>Correo</th>
                <th><button class="btn btn-xs submit_users">Agregar</button></th>
              </tr>
            </thead>
            <tbody>
                <? foreach ($user_available->result() as $x) { ?>
                 <tr id="user_<?= $x->user_event_id ?>" class="value" data-id="<?= $x->user_event_id ?>"> 
                  <td>
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                  </td>                                
                  <td><?= $x->user_event_name ?> <?= $x->user_event_lastName?></td>
                  <td><?= $x->user_event_email ?></td>
                  <td></td>
                </tr>   
              <? }?>  
            </tbody>
        </table>        
        
         <nav aria-label="Page navigation" class="txt_c">
            <ul class="pagination">
              <?= $this->pagination->create_links();?>
            </ul>
          </nav>          
        </div>
    </div>
  

  <div class="col-sm-6">
    <h3>Usuarios agregados</h3>
        <div class="table-responsive">
          <table class="table panel table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <? foreach ($user_not_available->result() as $x) { ?>
                <tr data-id="<?= $x->period_user_id?>">                                
                  <td><?= $x->user_event_name ?></td>
                  <td><?= $x->user_event_email ?></td>
                  <td>
                    <button class="btn btn-default btn-xs remove_user">
                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                  </td>
                </tr>   
              <? }?>  

            </tbody>
          </table>
        </div>
   </div>

</div>
   <script type="text/javascript">
      $(function(){ 
        // Hide all user alredy token
        <? foreach ($user_not_available->result() as $y) { ?>
         $('#user_<?= $y->user_event_id?>').addClass('warning');
         $('#user_<?= $y->user_event_id?>').removeClass('value');
         $('#user_<?= $y->user_event_id?>').find('span').remove();
        <?}?>

        
        // submit user to 'period_user'
        $('.submit_users').click(function(){
            $('tr.active').each(function(){
              var this_tag = this;
              var value_u_id = $(this).attr('data-id')
             

              $.ajax({
                    method: "POST",
                    url: "<?= site_url();?>/admin_home/ajax_add_user",
                    data: 
                    { 
                      user_event_id: value_u_id, 
                      period_is: <?= $period_id; ?> 
                    },
                    success: function(res) 
                    {
                        $(this_tag).addClass('warning');
                        $(this_tag).removeClass('value');
                        $(this_tag).find('span').remove();
                      
                    }                    
                  });
              
            });
        });

        // remove user from register list
        $('.remove_user').click(function(){
            var user_id = $(this).closest('tr').attr('data-id');
            var this_tag =  this;     
                $.ajax({
                    method: "POST",
                    url: "<?= site_url();?>/admin_home/ajax_remove_user/"+user_id,
                    data:{period_user_id: user_id},
                    success: function(res) 
                    {
                        $(this_tag).closest('tr').remove();
                      
                    }                    
                  });

        })

        $('tr.value span.glyphicon').hide();

        $('tr.value').click(function(){
            $(this).toggleClass('active');
            $('span.glyphicon', this).fadeToggle();
        });

        $('.check_all').click(function(){
            $('tr.value').each(function(){
              $(this).addClass('active');
              $('span.glyphicon', this).fadeIn();
            });
        });
    
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
