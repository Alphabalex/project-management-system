<?php echo $this->element('dashboard'); ?>
<div class="projects form">
	<?php echo $this->Form->create('Project'); ?>
	<fieldset>
		<legend><?php echo __('Add Project'); ?></legend>
		<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('priority');
		echo $this->Form->input('start_date');
		echo $this->Form->input('due_date');
		echo $this->Form->input('status');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
