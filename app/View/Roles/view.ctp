<div class="roles view">
<h2><?php echo __('Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($role['Role']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($role['Role']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($role['Role']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Companies Users'); ?></h3>
	<?php if (!empty($role['CompaniesUser'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['CompaniesUser'] as $companiesUser): ?>
		<tr>
			<td><?php echo $companiesUser['id']; ?></td>
			<td><?php echo $companiesUser['company_id']; ?></td>
			<td><?php echo $companiesUser['user_id']; ?></td>
			<td><?php echo $companiesUser['role_id']; ?></td>
			<td><?php echo $companiesUser['created']; ?></td>
			<td><?php echo $companiesUser['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'companies_users', 'action' => 'view', $companiesUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'companies_users', 'action' => 'edit', $companiesUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'companies_users', 'action' => 'delete', $companiesUser['id']), array('confirm' => __('Are you sure you want to delete # %s?', $companiesUser['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
