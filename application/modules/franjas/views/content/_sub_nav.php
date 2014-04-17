<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/franjas') ?>" id="list"><?php echo lang('franjas_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Franjas.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/franjas/create') ?>" id="create_new"><?php echo lang('franjas_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>