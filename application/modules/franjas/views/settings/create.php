<?php

$validation_errors = validation_errors();

if ($validation_errors) :
?>
<div class="alert alert-block alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<h4 class="alert-heading">Please fix the following errors:</h4>
	<?php echo $validation_errors; ?>
</div>
<?php
endif;

if (isset($franjas))
{
	$franjas = (array) $franjas;
}
$id = isset($franjas['fid']) ? $franjas['fid'] : '';

?>
<div class="admin-box">
	<h3>Franjas</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('mid') ? 'error' : ''; ?>">
				<?php echo form_label('Medico'. lang('bf_form_label_required'), 'franjas_mid', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_mid' type='text' name='franjas_mid' maxlength="4" value="<?php echo set_value('franjas_mid', isset($franjas['mid']) ? $franjas['mid'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('mid'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('horaim') ? 'error' : ''; ?>">
				<?php echo form_label('Hora de Inicio Manana', 'franjas_horaim', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_horaim' type='text' name='franjas_horaim'  value="<?php echo set_value('franjas_horaim', isset($franjas['horaim']) ? $franjas['horaim'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('horaim'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('horafm') ? 'error' : ''; ?>">
				<?php echo form_label('Hora de Final Manana', 'franjas_horafm', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_horafm' type='text' name='franjas_horafm'  value="<?php echo set_value('franjas_horafm', isset($franjas['horafm']) ? $franjas['horafm'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('horafm'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('horait') ? 'error' : ''; ?>">
				<?php echo form_label('Hora de Inicio Tarde', 'franjas_horait', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_horait' type='text' name='franjas_horait'  value="<?php echo set_value('franjas_horait', isset($franjas['horait']) ? $franjas['horait'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('horait'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('horaft') ? 'error' : ''; ?>">
				<?php echo form_label('Hora de Final Tarde', 'franjas_horaft', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_horaft' type='text' name='franjas_horaft'  value="<?php echo set_value('franjas_horaft', isset($franjas['horaft']) ? $franjas['horaft'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('horaft'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('horain') ? 'error' : ''; ?>">
				<?php echo form_label('Hora de Inicio Noche', 'franjas_horain', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_horain' type='text' name='franjas_horain'  value="<?php echo set_value('franjas_horain', isset($franjas['horain']) ? $franjas['horain'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('horain'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('horafn') ? 'error' : ''; ?>">
				<?php echo form_label('Hora de Final Noche', 'franjas_horafn', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_horafn' type='text' name='franjas_horafn'  value="<?php echo set_value('franjas_horafn', isset($franjas['horafn']) ? $franjas['horafn'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('horafn'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('dia') ? 'error' : ''; ?>">
				<?php echo form_label('Dia de la Semana'. lang('bf_form_label_required'), 'franjas_dia', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_dia' type='text' name='franjas_dia' maxlength="1" value="<?php echo set_value('franjas_dia', isset($franjas['dia']) ? $franjas['dia'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('dia'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('mnt') ? 'error' : ''; ?>">
				<?php echo form_label('Franja'. lang('bf_form_label_required'), 'franjas_mnt', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='franjas_mnt' type='text' name='franjas_mnt' maxlength="1" value="<?php echo set_value('franjas_mnt', isset($franjas['mnt']) ? $franjas['mnt'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('mnt'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('franjas_action_create'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/settings/franjas', lang('franjas_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>