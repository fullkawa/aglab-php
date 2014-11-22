<div class="rules form">
<?php echo $this->Form->create('Rule'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rule'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rule.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Rule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rules'), array('action' => 'index')); ?></li>
	</ul>
</div>
