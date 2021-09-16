<?php echo $this->element('project') ?>
<div class="comments form">
	<?php echo $this->Form->create('Comment'); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
		<?php
		echo $this->Form->input('comment');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
