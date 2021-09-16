<div class="actions">
	<h3><?php echo __('My Companies'); ?></h3>
	<ul>
		<?php foreach ($companies as $company) : ?>
			<li><?php echo $this->Html->link(h($company['Company']['name']), array('controller' => 'users', 'action' => 'dashboard', $company['Company']['id'])); ?></li>
		<?php endforeach; ?>
	</ul>
	<h3><?php echo __('Assigned Companies'); ?></h3>
	<ul>
		<?php foreach ($assigned as $assign) : ?>
			<li><?php echo $this->Html->link(h($assign['Company']['name']), array('controller' => 'users', 'action' => 'dashboard', $assign['Company']['id'])); ?></li>
		<?php endforeach; ?>
	</ul>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(h('Create New Company'), array('controller' => 'companies', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
