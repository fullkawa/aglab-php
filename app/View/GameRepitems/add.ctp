<div class="gameRepitems form">
<?php echo $this->Form->create('GameRepitem'); ?>
	<fieldset>
		<legend><?php echo __('Add Game Repitem'); ?></legend>
	<?php
		echo $this->Form->input('game_id');
		echo $this->Form->input('repitem_id');
		echo $this->Form->input('disp_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Game Repitems'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Repitems'), array('controller' => 'repitems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repitem'), array('controller' => 'repitems', 'action' => 'add')); ?> </li>
	</ul>
</div>
