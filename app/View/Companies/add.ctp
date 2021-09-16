<div class="companies form">
	<?php echo $this->Form->create('Company'); ?>
	<fieldset>
		<legend><?php echo __('Add Company'); ?></legend>
		<?php
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('status');
		echo $this->Form->input('type_id');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
