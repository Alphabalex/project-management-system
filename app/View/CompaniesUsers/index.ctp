<?php echo $this->element('dashboard'); ?>
<div class="companiesUsers index">
	<h2><?php echo __('Company workers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('company_id'); ?></th>
				<th><?php echo $this->Paginator->sort('user_id'); ?></th>
				<th><?php echo $this->Paginator->sort('role_id'); ?></th>
				<th><?php echo $this->Paginator->sort('username'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($companiesUsers as $companiesUser) : ?>
				<tr>
					<td><?php echo h($companiesUser['CompaniesUser']['id']); ?>&nbsp;</td>
					<td>
						<?php echo $this->Html->link($companiesUser['Company']['name'], array('controller' => 'companies', 'action' => 'view', $companiesUser['Company']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($companiesUser['User']['name'], array('controller' => 'users', 'action' => 'view', $companiesUser['User']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($companiesUser['Role']['role'], array('controller' => 'roles', 'action' => 'view', $companiesUser['Role']['id'])); ?>
					</td>
					<td>
						<?php echo $this->Html->link($companiesUser['User']['username'], array('controller' => 'users', 'action' => 'view', $companiesUser['User']['id'])); ?>
					</td>
					<td><?php echo h($companiesUser['CompaniesUser']['created']); ?>&nbsp;</td>
					<td><?php echo h($companiesUser['CompaniesUser']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $companiesUser['CompaniesUser']['id'])); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $companiesUser['CompaniesUser']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $companiesUser['CompaniesUser']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $companiesUser['CompaniesUser']['id']))); ?>
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
