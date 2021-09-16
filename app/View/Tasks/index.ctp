<div class="tasks index">
	<h2><?php echo __('Tasks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('description'); ?></th>
				<th><?php echo $this->Paginator->sort('priority'); ?></th>
				<th><?php echo $this->Paginator->sort('status'); ?></th>
				<th><?php echo $this->Paginator->sort('start_date'); ?></th>
				<th><?php echo $this->Paginator->sort('due_date'); ?></th>
				<th><?php echo $this->Paginator->sort('project_id'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tasks as $task) : ?>
				<tr>
					<td><?php echo h($task['Task']['id']); ?>&nbsp;</td>
					<td><?php echo h($task['Task']['name']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Text->truncate(
							h($task['Task']['description']),
							150,
							array('ellipsis' => '...', 'exact' => false, 'html' => true)
						);
						?>&nbsp;
					</td>
					<td><?php echo h($task['Task']['priority']); ?>&nbsp;</td>
					<td><?php echo h($task['Task']['status']); ?>&nbsp;</td>
					<td><?php echo h($task['Task']['start_date']); ?>&nbsp;</td>
					<td><?php echo h($task['Task']['due_date']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($task['Project']['name'], array('controller' => 'projects', 'action' => 'view', $task['Project']['id'])); ?>
					</td>
					<td><?php echo h($task['Task']['created']); ?>&nbsp;</td>
					<td><?php echo h($task['Task']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $task['Task']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $task['Task']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $task['Task']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $task['Task']['id']))); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?> </p>
	<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<?php echo $this->element('project') ?>
