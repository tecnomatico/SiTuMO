<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/turnos') ?>" id="list"><?php echo lang('turnos_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Turnos.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/turnos/create') ?>" id="create_new"><?php echo lang('turnos_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>