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

if (isset($no_laborales))
{
	$no_laborales = (array) $no_laborales;
}
$id = isset($no_laborales['nid']) ? $no_laborales['nid'] : '';

?>
<div class="admin-box">
	<h3>No Laborales</h3>
	<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
		<fieldset>

			<div class="control-group <?php echo form_error('mid') ? 'error' : ''; ?>">
				<?php echo form_label('Medico'. lang('bf_form_label_required'), 'no_laborales_mid', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='no_laborales_mid' type='text' name='no_laborales_mid' maxlength="4" value="<?php echo set_value('no_laborales_mid', isset($no_laborales['mid']) ? $no_laborales['mid'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('mid'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('inicio') ? 'error' : ''; ?>">
				<?php echo form_label('Fecha de Inicio'. lang('bf_form_label_required'), 'no_laborales_inicio', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='no_laborales_inicio' type='text' name='no_laborales_inicio'  value="<?php echo set_value('no_laborales_inicio', isset($no_laborales['inicio']) ? $no_laborales['inicio'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('inicio'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('final') ? 'error' : ''; ?>">
				<?php echo form_label('Fecha de Final', 'no_laborales_final', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='no_laborales_final' type='text' name='no_laborales_final'  value="<?php echo set_value('no_laborales_final', isset($no_laborales['final']) ? $no_laborales['final'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('final'); ?></span>
				</div>
			</div>

			<div class="control-group <?php echo form_error('detalle') ? 'error' : ''; ?>">
				<?php echo form_label('Detalle', 'no_laborales_detalle', array('class' => 'control-label') ); ?>
				<div class='controls'>
					<input id='no_laborales_detalle' type='text' name='no_laborales_detalle' maxlength="255" value="<?php echo set_value('no_laborales_detalle', isset($no_laborales['detalle']) ? $no_laborales['detalle'] : ''); ?>" />
					<span class='help-inline'><?php echo form_error('detalle'); ?></span>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" name="save" class="btn btn-primary" value="<?php echo lang('no_laborales_action_create'); ?>"  />
				<?php echo lang('bf_or'); ?>
				<?php echo anchor(SITE_AREA .'/settings/no_laborales', lang('no_laborales_cancel'), 'class="btn btn-warning"'); ?>
				
			</div>
		</fieldset>
    <?php echo form_close(); ?>
</div>