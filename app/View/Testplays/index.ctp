<div class="testplays index">
	<h2><?php echo __('Testplays'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('num_plays'); ?></th>
			<th><?php echo $this->Paginator->sort('min_players'); ?></th>
			<th><?php echo $this->Paginator->sort('max_players'); ?></th>
			<th><?php echo $this->Paginator->sort('conditions'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($testplays as $testplay): ?>
	<tr>
		<td><?php echo h($testplay['Testplay']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testplay['Game']['title'], array('controller' => 'games', 'action' => 'view', $testplay['Game']['id'])); ?>
		</td>
		<td><?php echo h($testplay['Testplay']['type']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['status']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['num_plays']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['min_players']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['max_players']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['conditions']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['created']); ?>&nbsp;</td>
		<td><?php echo h($testplay['Testplay']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $testplay['Testplay']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $testplay['Testplay']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testplay['Testplay']['id']), array(), __('Are you sure you want to delete # %s?', $testplay['Testplay']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Testplay'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
