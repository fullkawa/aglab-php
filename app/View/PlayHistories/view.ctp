<div class="playHistories view">
<h2><?php echo __('Play History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playHistory['Play']['id'], array('controller' => 'plays', 'action' => 'view', $playHistory['Play']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Context'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['context']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($playHistory['PlayHistory']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Play History'), array('action' => 'edit', $playHistory['PlayHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Play History'), array('action' => 'delete', $playHistory['PlayHistory']['id']), array(), __('Are you sure you want to delete # %s?', $playHistory['PlayHistory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
