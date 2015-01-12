<div class="plays view">
<h2><?php echo __('Play'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($play['Play']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Testplay'); ?></dt>
		<dd>
			<?php echo $this->Html->link($play['Testplay']['id'], array('controller' => 'testplays', 'action' => 'view', $play['Testplay']['id'])); ?>
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
		<dt><?php echo __('Conditions'); ?></dt>
		<dd>
			<?php echo h($play['Play']['conditions']); ?>
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
		<li><?php echo $this->Html->link(__('List Testplays'), array('controller' => 'testplays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('controller' => 'testplays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Data'), array('controller' => 'play_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Data'), array('controller' => 'play_data', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Histories'), array('controller' => 'play_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play History'), array('controller' => 'play_histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Play Data'); ?></h3>
	<?php if (!empty($play['PlayData'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Testplay Id'); ?></th>
		<th><?php echo __('Play Id'); ?></th>
		<th><?php echo __('Item1'); ?></th>
		<th><?php echo __('Item2'); ?></th>
		<th><?php echo __('Item3'); ?></th>
		<th><?php echo __('Item4'); ?></th>
		<th><?php echo __('Item5'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th><?php echo __('Label'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Detail'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($play['PlayData'] as $playData): ?>
		<tr>
			<td><?php echo $playData['id']; ?></td>
			<td><?php echo $playData['testplay_id']; ?></td>
			<td><?php echo $playData['play_id']; ?></td>
			<td><?php echo $playData['item1']; ?></td>
			<td><?php echo $playData['item2']; ?></td>
			<td><?php echo $playData['item3']; ?></td>
			<td><?php echo $playData['item4']; ?></td>
			<td><?php echo $playData['item5']; ?></td>
			<td><?php echo $playData['key']; ?></td>
			<td><?php echo $playData['label']; ?></td>
			<td><?php echo $playData['value']; ?></td>
			<td><?php echo $playData['detail']; ?></td>
			<td><?php echo $playData['created']; ?></td>
			<td><?php echo $playData['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'play_data', 'action' => 'view', $playData['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'play_data', 'action' => 'edit', $playData['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'play_data', 'action' => 'delete', $playData['id']), array(), __('Are you sure you want to delete # %s?', $playData['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Play Data'), array('controller' => 'play_data', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Play Histories'); ?></h3>
	<?php if (!empty($play['PlayHistory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Play Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Context'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($play['PlayHistory'] as $playHistory): ?>
		<tr>
			<td><?php echo $playHistory['id']; ?></td>
			<td><?php echo $playHistory['play_id']; ?></td>
			<td><?php echo $playHistory['parent_id']; ?></td>
			<td><?php echo $playHistory['lft']; ?></td>
			<td><?php echo $playHistory['rght']; ?></td>
			<td><?php echo $playHistory['context']; ?></td>
			<td><?php echo $playHistory['status']; ?></td>
			<td><?php echo $playHistory['created']; ?></td>
			<td><?php echo $playHistory['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'play_histories', 'action' => 'view', $playHistory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'play_histories', 'action' => 'edit', $playHistory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'play_histories', 'action' => 'delete', $playHistory['id']), array(), __('Are you sure you want to delete # %s?', $playHistory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Play History'), array('controller' => 'play_histories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
