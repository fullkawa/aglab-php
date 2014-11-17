<div class="playConditions form">
<?php echo $this->Form->create('PlayCondition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Play Condition'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('play_id');
		echo $this->Form->input('name');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlayCondition.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('PlayCondition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Play Conditions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
