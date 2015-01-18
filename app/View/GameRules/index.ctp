<div class="gameRules index">
	<h2><?php echo __('Game Rules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($gameRules as $gameRule): ?>
	<tr>
		<td><?php echo h($gameRule['GameRule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gameRule['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameRule['Game']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gameRule['Rule']['name'], array('controller' => 'rules', 'action' => 'view', $gameRule['Rule']['id'])); ?>
		</td>
		<td><?php echo h($gameRule['GameRule']['order']); ?>&nbsp;</td>
		<td><?php echo h($gameRule['GameRule']['created']); ?>&nbsp;</td>
		<td><?php echo h($gameRule['GameRule']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gameRule['GameRule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gameRule['GameRule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gameRule['GameRule']['id']), array(), __('Are you sure you want to delete # %s?', $gameRule['GameRule']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Game Rule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
