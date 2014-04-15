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

if (isset($turnos))
{
	$turnos = (array) $turnos;
}
$id = isset($turnos['tid']) ? $turnos['tid'] : '';

?>
<div class="admin-box">
	<h3>Turnos</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('mid') ? 'error' : ''; ?>">
				<?php echo form_label('mid', 'turnos_mid', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='turnos_mid' type='text' name='turnos_mid' maxlength="5" value="<?php echo set_value('turnos_mid', isset($turnos['mid']) ? $turnos['mid'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('mid'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('pid') ? 'error' : ''; ?>">
				<?php echo form_label('pid', 'turnos_pid', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='turnos_pid' type='text' name='turnos_pid' maxlength="5" value="<?php echo set_value('turnos_pid', isset($turnos['pid']) ? $turnos['pid'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('pid'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('fecha') ? 'error' : ''; ?>">
				<?php echo form_label('fecha', 'turnos_fecha', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='turnos_fecha' type='text' name='turnos_fecha'  value="<?php echo set_value('turnos_fecha', isset($turnos['fecha']) ? $turnos['fecha'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('fecha'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('turnos_action_create'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/settings/turnos', lang('turnos_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>