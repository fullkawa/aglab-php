<div class="steps view">
<h2><?php echo __('Step'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($step['Step']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play'); ?></dt>
		<dd>
			<?php echo $this->Html->link($step['Play']['id'], array('controller' => 'plays', 'action' => 'view', $step['Play']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Context'); ?></dt>
		<dd>
			<?php echo h($step['Step']['context']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($step['Step']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($step['Step']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($step['Step']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Step'), array('action' => 'edit', $step['Step']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Step'), array('action' => 'delete', $step['Step']['id']), array(), __('Are you sure you want to delete # %s?', $step['Step']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Steps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Step'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
