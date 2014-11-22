<div class="plays view">
<h2><?php echo __('Play'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($play['Play']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($play['Game']['title'], array('controller' => 'games', 'action' => 'view', $play['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($play['Play']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($play['Play']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Players'); ?></dt>
		<dd>
			<?php echo h($play['Play']['num_players']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($play['Play']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($play['Play']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Play'), array('action' => 'edit', $play['Play']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Play'), array('action' => 'delete', $play['Play']['id']), array(), __('Are you sure you want to delete # %s?', $play['Play']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Conditions'), array('controller' => 'play_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Condition'), array('controller' => 'play_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Play Conditions'); ?></h3>
	<?php if (!empty($play['PlayCondition'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Play Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($play['PlayCondition'] as $playCondition): ?>
		<tr>
			<td><?php echo $playCondition['id']; ?></td>
			<td><?php echo $playCondition['play_id']; ?></td>
			<td><?php echo $playCondition['name']; ?></td>
			<td><?php echo $playCondition['value']; ?></td>
			<td><?php echo $playCondition['created']; ?></td>
			<td><?php echo $playCondition['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'play_conditions', 'action' => 'view', $playCondition['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'play_conditions', 'action' => 'edit', $playCondition['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'play_conditions', 'action' => 'delete', $playCondition['id']), array(), __('Are you sure you want to delete # %s?', $playCondition['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Play Condition'), array('controller' => 'play_conditions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
