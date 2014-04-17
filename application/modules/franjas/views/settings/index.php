<?php

$num_columns	= 10;
$can_delete	= $this->auth->has_permission('Franjas.Settings.Delete');
$can_edit		= $this->auth->has_permission('Franjas.Settings.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

?>
<div class="admin-box">
	<h3>Franjas</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Medico</th>
					<th>Hora de Inicio Manana</th>
					<th>Hora de Final Manana</th>
					<th>Hora de Inicio Tarde</th>
					<th>Hora de Final Tarde</th>
					<th>Hora de Inicio Noche</th>
					<th>Hora de Final Noche</th>
					<th>Dia de la Semana</th>
					<th>Franja</th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected'); ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('franjas_delete_confirm'))); ?>')" />
					</td>
				</tr>
				<?php endif; ?>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record->fid; ?>" /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/settings/franjas/edit/' . $record->fid, '<span class="icon-pencil"></span>' .  $record->mid); ?></td>
				<?php else : ?>
					<td><?php e($record->mid); ?></td>
				<?php endif; ?>
					<td><?php e($record->horaim) ?></td>
					<td><?php e($record->horafm) ?></td>
					<td><?php e($record->horait) ?></td>
					<td><?php e($record->horaft) ?></td>
					<td><?php e($record->horain) ?></td>
					<td><?php e($record->horafn) ?></td>
					<td><?php e($record->dia) ?></td>
					<td><?php e($record->mnt) ?></td>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">No records found that match your selection.</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>