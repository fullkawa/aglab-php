<div class="plays form">
<?php echo $this->Form->create('Play'); ?>
	<fieldset>
		<legend><?php echo __('Edit Play'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('game_id');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
		echo $this->Form->input('num_players');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Play.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Play.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Plays'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Conditions'), array('controller' => 'play_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Condition'), array('controller' => 'play_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
