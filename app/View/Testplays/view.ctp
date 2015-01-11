<div class="testplays view">
<h2><?php echo __('Testplay'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testplay['Game']['title'], array('controller' => 'games', 'action' => 'view', $testplay['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Plays'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['num_plays']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conditions'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['conditions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Testplay'), array('action' => 'edit', $testplay['Testplay']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Testplay'), array('action' => 'delete', $testplay['Testplay']['id']), array(), __('Are you sure you want to delete # %s?', $testplay['Testplay']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Testplays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($testplay['Report'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Testplay Id'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['testplay_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Report'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['report']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['updated']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Report'), array('controller' => 'reports', 'action' => 'edit', $testplay['Report']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Plays'); ?></h3>
	<?php if (!empty($testplay['Play'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Testplay Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Num Players'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($testplay['Play'] as $play): ?>
		<tr>
			<td><?php echo $play['id']; ?></td>
			<td><?php echo $play['testplay_id']; ?></td>
			<td><?php echo $play['type']; ?></td>
			<td><?php echo $play['status']; ?></td>
			<td><?php echo $play['num_players']; ?></td>
			<td><?php echo $play['created']; ?></td>
			<td><?php echo $play['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'plays', 'action' => 'view', $play['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'plays', 'action' => 'edit', $play['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'plays', 'action' => 'delete', $play['id']), array(), __('Are you sure you want to delete # %s?', $play['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
