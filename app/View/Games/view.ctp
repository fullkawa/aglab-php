<div class="games view">
<h2><?php echo __('Game'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($game['Game']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($game['Game']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($game['Game']['version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo'); ?></dt>
		<dd>
			<?php echo h($game['Game']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($game['Game']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($game['Game']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game'), array('action' => 'edit', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game'), array('action' => 'delete', $game['Game']['id']), array(), __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Testplays'), array('controller' => 'testplays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('controller' => 'testplays', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Testplays'); ?></h3>
	<?php if (!empty($game['Testplay'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Game Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Num Plays'); ?></th>
		<th><?php echo __('Conditions'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($game['Testplay'] as $testplay): ?>
		<tr>
			<td><?php echo $testplay['id']; ?></td>
			<td><?php echo $testplay['game_id']; ?></td>
			<td><?php echo $testplay['type']; ?></td>
			<td><?php echo $testplay['status']; ?></td>
			<td><?php echo $testplay['num_plays']; ?></td>
			<td><?php echo $testplay['conditions']; ?></td>
			<td><?php echo $testplay['created']; ?></td>
			<td><?php echo $testplay['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'testplays', 'action' => 'view', $testplay['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'testplays', 'action' => 'edit', $testplay['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'testplays', 'action' => 'delete', $testplay['id']), array(), __('Are you sure you want to delete # %s?', $testplay['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Testplay'), array('controller' => 'testplays', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
