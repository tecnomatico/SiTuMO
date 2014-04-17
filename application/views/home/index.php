<div class="jumbotron" text-align="center">
	<img style="margin: -23px 0px 23px 0px" src="<?php echo site_url('../assets/images/logo.png') ?>">
	<h1>Bienvenido a SiTuMO</h1>
	<h3>Sistema de Turnos Médicos Online</h3>

	<p class="lead">Busque su médico de cabecera y reserve turnos desde la comodidad de su hogar.<br/>SiTuMO ha sido desarrollado para darle la mejor solución en cuanto a turnos.</p>

	<?php /*if (isset($current_user->email)) : ?>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Ingresar como Médico</a>
	<?php else :?>
		<a href="<?php echo site_url(LOGIN_URL); ?>" class="btn btn-large btn-primary"><?php echo lang('bf_action_login'); ?></a>
	<?php endif; */?>

</div>

<hr />

<br>

<div class="row-fluid" style="text-align:center">

	<div class="span4">
		<h4>Reserve su turno</h4>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-warning"><i class="icon-user icon-white"></i> Ingrese como Paciente</a><br><br>	
		<p>Busque un médico por Nombre y Apellido, Especialidad, Obra Social y Turnos de Atención para reservarlo al instante.</p>
	</div>

	<div class="span4">
		<h4>Registre su turno</h4>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success"><i class="icon-user icon-white"></i> Ingrese como Médico</a><br><br>
		<p>Bonfire has an ever-growing <a href="http://forums.cibonfire.com">community</a> of users that are there to help you get unstuck, or make the best use of this powerful system.</p>
	</div>

	<div class="span4">
		<h4>Administre su institución</h4>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-primary"><i class="icon-user icon-white"></i> Ingrese como Clínica</a><br><br>	
		<p>A <a href="https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc">modular system</a> that allows code re-use, and overriding core modules with custom modules.</p>
	</div>

</div>