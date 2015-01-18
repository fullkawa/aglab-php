<div class="gameCompos form">
<?php echo $this->Form->create('GameCompo'); ?>
	<fieldset>
		<legend><?php echo __('Add Game Compo'); ?></legend>
	<?php
		echo $this->Form->input('game_id');
		echo $this->Form->input('compo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Game Compos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compos'), array('controller' => 'compos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compo'), array('controller' => 'compos', 'action' => 'add')); ?> </li>
	</ul>
</div>
