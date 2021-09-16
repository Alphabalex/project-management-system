<div class="companiesUsers view">
<h2><?php echo __('Companies User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($companiesUser['CompaniesUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companiesUser['Company']['name'], array('controller' => 'companies', 'action' => 'view', $companiesUser['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companiesUser['User']['name'], array('controller' => 'users', 'action' => 'view', $companiesUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($companiesUser['Role']['role'], array('controller' => 'roles', 'action' => 'view', $companiesUser['Role']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($companiesUser['CompaniesUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($companiesUser['CompaniesUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
