<div class="playData index">
	<h2><?php echo __('Play Data'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('play_id'); ?></th>
			<th><?php echo $this->Paginator->sort('item1'); ?></th>
			<th><?php echo $this->Paginator->sort('item2'); ?></th>
			<th><?php echo $this->Paginator->sort('item3'); ?></th>
			<th><?php echo $this->Paginator->sort('item4'); ?></th>
			<th><?php echo $this->Paginator->sort('item5'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($playData as $playData): ?>
	<tr>
		<td><?php echo h($playData['PlayData']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($playData['Play']['id'], array('controller' => 'plays', 'action' => 'view', $playData['Play']['id'])); ?>
		</td>
		<td><?php echo h($playData['PlayData']['item1']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['item2']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['item3']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['item4']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['item5']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['value']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['created']); ?>&nbsp;</td>
		<td><?php echo h($playData['PlayData']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $playData['PlayData']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $playData['PlayData']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $playData['PlayData']['id']), array(), __('Are you sure you want to delete # %s?', $playData['PlayData']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Play Data'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
