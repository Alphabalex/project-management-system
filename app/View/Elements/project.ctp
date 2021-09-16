<div class="actions">
	<h3><?php echo __($pname); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(h('New task'), array('controller' => 'tasks', 'action' => 'add', $pid)); ?></li>
		<li><?php echo $this->Html->link(h('Project tasks'), array('controller' => 'tasks', 'action' => 'index', $pid)); ?></li>
		<li><?php echo $this->Html->link(h('New comment'), array('controller' => 'comments', 'action' => 'add','projects',$pid)); ?></li>
		<li><?php echo $this->Html->link(h('Project comments'), array('controller' => 'comments', 'action' => 'index','projects',$pid)); ?></li>
	</ul>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'selection')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
