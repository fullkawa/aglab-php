<div class="repdata form">
<?php echo $this->Form->create('Repdata'); ?>
	<fieldset>
		<legend><?php echo __('Add Repdata'); ?></legend>
	<?php
		echo $this->Form->input('testplay_id');
		echo $this->Form->input('play_id');
		echo $this->Form->input('item1');
		echo $this->Form->input('item2');
		echo $this->Form->input('item3');
		echo $this->Form->input('item4');
		echo $this->Form->input('item5');
		echo $this->Form->input('key');
		echo $this->Form->input('label');
		echo $this->Form->input('value');
		echo $this->Form->input('detail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Repdata'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
