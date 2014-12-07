<div class="gameComponents form">
<?php echo $this->Form->create('GameComponent'); ?>
	<fieldset>
		<legend><?php echo __('Add Game Component'); ?></legend>
	<?php
		echo $this->Form->input('game_id');
		echo $this->Form->input('component_type');
		echo $this->Form->input('name');
		echo $this->Form->input('shortened_name');
		echo $this->Form->input('properties');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Game Components'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
