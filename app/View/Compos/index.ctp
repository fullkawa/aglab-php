<div class="compos index">
	<h2><?php echo __('Compos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
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
	<?php foreach ($compos as $compo): ?>
	<tr>
		<td><?php echo h($compo['Compo']['id']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['component_type']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['name']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['shortened_name']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['properties']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['created']); ?>&nbsp;</td>
		<td><?php echo h($compo['Compo']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $compo['Compo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $compo['Compo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $compo['Compo']['id']), array(), __('Are you sure you want to delete # %s?', $compo['Compo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Compo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
