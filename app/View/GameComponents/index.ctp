<div class="gameComponents index">
	<h2><?php echo __('Game Components'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('component_type'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('shortened_name'); ?></th>
			<th><?php echo $this->Paginator->sort('properties'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($gameComponents as $gameComponent): ?>
	<tr>
		<td><?php echo h($gameComponent['GameComponent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gameComponent['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameComponent['Game']['id'])); ?>
		</td>
		<td><?php echo h($gameComponent['GameComponent']['component_type']); ?>&nbsp;</td>
		<td><?php echo h($gameComponent['GameComponent']['name']); ?>&nbsp;</td>
		<td><?php echo h($gameComponent['GameComponent']['shortened_name']); ?>&nbsp;</td>
		<td><?php echo h($gameComponent['GameComponent']['properties']); ?>&nbsp;</td>
		<td><?php echo h($gameComponent['GameComponent']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($gameComponent['GameComponent']['created']); ?>&nbsp;</td>
		<td><?php echo h($gameComponent['GameComponent']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gameComponent['GameComponent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gameComponent['GameComponent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gameComponent['GameComponent']['id']), array(), __('Are you sure you want to delete # %s?', $gameComponent['GameComponent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Game Component'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
