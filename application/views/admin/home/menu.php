
	<div class="p_15">
		<h1><? echo $user_name ." ". $user_last; ?></h1>
		<? echo $user_mail; ?><br>
	</div>


	<ul class="nav">


		<li id="profile">
			<a href="<?echo site_url();?>/admin_home/valid_user/my_profile">
				<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Mi perfil
			</a>
		</li>

		<? if($this->session->userdata('user_admin')==1){?>
		<!-- Adminn access only -->
			<li id="administradores">
				<a href="<?echo site_url();?>/admin_home/valid_user/users">
					<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Reclutadores
				</a>
			</li>
		<?}?>


		<li id="temporadas">
			<a href="<?echo site_url();?>/admin_home/valid_user/periods">
				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Empresas
			</a>
		</li>
		<!-- <li id="eventos">
			<a href="<?echo site_url();?>/admin_home/valid_user/events">
				<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> | Eventos</a>
		</li> -->
		<? if($this->session->userdata('user_admin')==0){?>
		<li id="usuarios">
			<a href="<?echo site_url();?>/admin_home/valid_user/users_event">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Candidatos</a>
		</li>
		<?}?>
		<li>
			<a href="<?echo site_url();?>/admin/logout">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Salir</a>
		</li>
	</ul>
