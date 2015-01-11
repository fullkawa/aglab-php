<div class="reports form">
<?php echo $this->Form->create('Report'); ?>
	<fieldset>
		<legend><?php echo __('Edit Report'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('testplay_id');
		echo $this->Form->input('report');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Report.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Report.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Testplays'), array('controller' => 'testplays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('controller' => 'testplays', 'action' => 'add')); ?> </li>
	</ul>
</div>
