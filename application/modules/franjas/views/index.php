<div>
	<h1 class="page-header">Franjas</h1>
</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
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
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'fid') : ?>
					<td>
						<?php if ($field == 'deleted'): ?>
							<?php e(($value > 0) ? lang('franjas_true') : lang('franjas_false')); ?>
						<?php else: ?>
							<?php e($value); ?>
						<?php endif ?>
					</td>
				<?php endif; ?>
				
			<?php endforeach; ?>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>