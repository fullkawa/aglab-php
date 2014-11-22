<div class="rules form">
<?php echo $this->Form->create('Rule'); ?>
	<fieldset>
		<legend><?php echo __('Add Rule'); ?></legend>
	<?php
		echo $this->Form->input('scope');
		echo $this->Form->input('class');
		echo $this->Form->input('name');
		echo $this->Form->input('status');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Rules'), array('action' => 'index')); ?></li>
	</ul>
</div>
