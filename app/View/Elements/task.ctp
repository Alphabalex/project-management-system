<div class="actions">
	<?php
	$tid = $task['Task']['id'];
	$tname = $task['Task']['name'];
	?>
	<h3><?php echo __($tname); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(h('New comment'), array('controller' => 'comments', 'action' => 'add', 'tasks', $tid)); ?></li>
		<li><?php echo $this->Html->link(h('Task comments'), array('controller' => 'comments', 'action' => 'index', 'tasks', $tid)); ?></li>
	</ul>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List tasks'), array('controller' => 'tasks', 'action' => 'index', $pid)); ?> </li>
		<li><?php echo $this->Html->link(__('List projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'selection')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
