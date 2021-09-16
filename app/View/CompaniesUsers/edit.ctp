<div class="companiesUsers form">
<?php echo $this->Form->create('CompaniesUser'); ?>
	<fieldset>
		<legend><?php echo __('Edit Companies User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('role_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
