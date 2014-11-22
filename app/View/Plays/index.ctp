<div class="plays index">
	<h2><?php echo __('Plays'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('num_players'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($plays as $play): ?>
	<tr>
		<td><?php echo h($play['Play']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($play['Game']['title'], array('controller' => 'games', 'action' => 'view', $play['Game']['id'])); ?>
		</td>
		<td><?php echo h($play['Play']['type']); ?>&nbsp;</td>
		<td><?php echo h($play['Play']['status']); ?>&nbsp;</td>
		<td><?php echo h($play['Play']['num_players']); ?>&nbsp;</td>
		<td><?php echo h($play['Play']['created']); ?>&nbsp;</td>
		<td><?php echo h($play['Play']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $play['Play']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $play['Play']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $play['Play']['id']), array(), __('Are you sure you want to delete # %s?', $play['Play']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Play'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Conditions'), array('controller' => 'play_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Condition'), array('controller' => 'play_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
