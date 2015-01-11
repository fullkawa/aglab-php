<div class="playHistories index">
	<h2><?php echo __('Play Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('play_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('context'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($playHistories as $playHistory): ?>
	<tr>
		<td><?php echo h($playHistory['PlayHistory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($playHistory['Play']['id'], array('controller' => 'plays', 'action' => 'view', $playHistory['Play']['id'])); ?>
		</td>
		<td><?php echo h($playHistory['PlayHistory']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($playHistory['PlayHistory']['lft']); ?>&nbsp;</td>
		<td><?php echo h($playHistory['PlayHistory']['rght']); ?>&nbsp;</td>
		<td><?php echo h($playHistory['PlayHistory']['context']); ?>&nbsp;</td>
		<td><?php echo h($playHistory['PlayHistory']['status']); ?>&nbsp;</td>
		<td><?php echo h($playHistory['PlayHistory']['created']); ?>&nbsp;</td>
		<td><?php echo h($playHistory['PlayHistory']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $playHistory['PlayHistory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $playHistory['PlayHistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $playHistory['PlayHistory']['id']), array(), __('Are you sure you want to delete # %s?', $playHistory['PlayHistory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Play History'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
