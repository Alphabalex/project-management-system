<div class="actions">
	<h3><?php echo __($cname); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(h('Company details'), array('controller' => 'companies', 'action' => 'view',$cid)); ?></li>
		<li><?php echo $this->Html->link(h('New project'), array('controller' => 'projects', 'action' => 'add',$cid)); ?></li>
		<li><?php echo $this->Html->link(h('Company projects'), array('controller' => 'projects', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(h('New worker'), array('controller' => 'companiesusers', 'action' => 'add',$cid)); ?></li>
		<li><?php echo $this->Html->link(h('Company workers'), array('controller' => 'companiesusers', 'action' => 'index',)); ?></li>
	</ul>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List companies'), array('controller' => 'companies', 'action' => 'selection')); ?> </li>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>
