<div class="repitems form">
<?php echo $this->Form->create('Repitem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Repitem'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_name');
		echo $this->Form->input('label');
		echo $this->Form->input('description');
		echo $this->Form->input('dimension1');
		echo $this->Form->input('dimension2');
		echo $this->Form->input('target');
		echo $this->Form->input('summary_type');
		echo $this->Form->input('threshold_target');
		echo $this->Form->input('threshold1');
		echo $this->Form->input('threshold2');
		echo $this->Form->input('min_samples');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Repitem.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Repitem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Repitems'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
