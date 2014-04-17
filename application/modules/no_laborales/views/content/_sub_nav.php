<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/no_laborales') ?>" id="list"><?php echo lang('no_laborales_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('No_Laborales.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/no_laborales/create') ?>" id="create_new"><?php echo lang('no_laborales_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>