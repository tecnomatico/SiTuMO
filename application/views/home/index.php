<div class="jumbotron" text-align="center">
	<img style="margin: -23px 0px 23px 0px" src="<?php echo site_url('assets/images/logo.png') ?>">
	<h1>Bienvenido a SiTuMO</h1>
	<h3>Sistema de Turnos Médicos Online</h3>

	<p class="lead">Busque su médico de cabecera y reserve turnos desde la comodidad de su hogar.<br/>SiTuMO ha sido desarrollado para su comodidad.</p>

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
		<h4>A Solid Base</h4>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-warning"><i class="icon-user icon-white"></i> Ingresar como Paciente</a><br><br>	
		<p>Bonfire is based on <a href="http://ellislab.com/codeigniter" target="_blank">CodeIgniter <?php echo CI_VERSION; ?></a>, a proven PHP framework. In order to make the best use of it, you should be comfortable with CodeIgniter and its <a href="http://ellislab.com/codeigniter/user-guide/" target="_blank">documentation</a> first.</p>
		<p>We use Twitter's <a href="">Bootstrap</a> front-end framework and <a href="http://jquery.com/">jQuery</a> as the basis of the CSS and Javascript.</p>
	</div>

	<div class="span4">
		<h4>A Growing Community</h4>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success"><i class="icon-user icon-white"></i> Ingresar como Médico</a><br><br>
		<p>Bonfire has an ever-growing <a href="http://forums.cibonfire.com">community</a> of users that are there to help you get unstuck, or make the best use of this powerful system.</p>
		<p>Bugs and feature discussion also happen on GitHub's <a href="https://github.com/ci-bonfire/Bonfire/issues?direction=desc&labels=0.7&sort=created&state=open">issue tracker</a>. This is the best place to report bugs and discuss new features.</p>
	</div>

	<div class="span4">
		<h4>Built-in Flexibility</h4>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-primary"><i class="icon-user icon-white"></i> Ingresar como Clínica</a><br><br>	
		<p>A <a href="https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc">modular system</a> that allows code re-use, and overriding core modules with custom modules.</p>
		<p>A <i>template system</i> that allows parent-child themes, and overriding controller views in the template.</p>
		<p><i>Role-Based Access Control</i> that provides as much fine-grained control as your modules need.</p>
	</div>

</div>