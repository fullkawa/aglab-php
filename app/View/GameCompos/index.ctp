<div class="gameCompos index">
	<h2><?php echo __('Game Compos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('compo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($gameCompos as $gameCompo): ?>
	<tr>
		<td><?php echo h($gameCompo['GameCompo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gameCompo['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameCompo['Game']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gameCompo['Compo']['name'], array('controller' => 'compos', 'action' => 'view', $gameCompo['Compo']['id'])); ?>
		</td>
		<td><?php echo h($gameCompo['GameCompo']['created']); ?>&nbsp;</td>
		<td><?php echo h($gameCompo['GameCompo']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gameCompo['GameCompo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gameCompo['GameCompo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gameCompo['GameCompo']['id']), array(), __('Are you sure you want to delete # %s?', $gameCompo['GameCompo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Game Compo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compos'), array('controller' => 'compos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compo'), array('controller' => 'compos', 'action' => 'add')); ?> </li>
	</ul>
</div>
