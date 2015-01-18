<div class="steps form">
<?php echo $this->Form->create('Step'); ?>
	<fieldset>
		<legend><?php echo __('Edit Step'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('play_id');
		echo $this->Form->input('context');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Step.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Step.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Steps'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
