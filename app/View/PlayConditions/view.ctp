<div class="playConditions view">
<h2><?php echo __('Play Condition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($playCondition['PlayCondition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playCondition['Play']['id'], array('controller' => 'plays', 'action' => 'view', $playCondition['Play']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($playCondition['PlayCondition']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($playCondition['PlayCondition']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($playCondition['PlayCondition']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($playCondition['PlayCondition']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Play Condition'), array('action' => 'edit', $playCondition['PlayCondition']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Play Condition'), array('action' => 'delete', $playCondition['PlayCondition']['id']), array(), __('Are you sure you want to delete # %s?', $playCondition['PlayCondition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Conditions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Condition'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
