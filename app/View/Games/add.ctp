<div class="games form">
<?php echo $this->Form->create('Game'); ?>
	<fieldset>
		<legend><?php echo __('Add Game'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('name');
		echo $this->Form->input('version');
		echo $this->Form->input('memo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Testplays'), array('controller' => 'testplays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('controller' => 'testplays', 'action' => 'add')); ?> </li>
	</ul>
</div>
