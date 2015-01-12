<div class="plays form">
<?php echo $this->Form->create('Play'); ?>
	<fieldset>
		<legend><?php echo __('Add Play'); ?></legend>
	<?php
		echo $this->Form->input('testplay_id');
		echo $this->Form->input('type');
		echo $this->Form->input('status');
		echo $this->Form->input('num_players');
		echo $this->Form->input('conditions');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Plays'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Testplays'), array('controller' => 'testplays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('controller' => 'testplays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Data'), array('controller' => 'play_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Data'), array('controller' => 'play_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Histories'), array('controller' => 'play_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play History'), array('controller' => 'play_histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
