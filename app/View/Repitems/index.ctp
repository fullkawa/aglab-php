<div class="repitems index">
	<h2><?php echo __('Repitems'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_name'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('dimension1'); ?></th>
			<th><?php echo $this->Paginator->sort('dimension2'); ?></th>
			<th><?php echo $this->Paginator->sort('target'); ?></th>
			<th><?php echo $this->Paginator->sort('summary_type'); ?></th>
			<th><?php echo $this->Paginator->sort('threshold_target'); ?></th>
			<th><?php echo $this->Paginator->sort('threshold1'); ?></th>
			<th><?php echo $this->Paginator->sort('threshold2'); ?></th>
			<th><?php echo $this->Paginator->sort('min_samples'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($repitems as $repitem): ?>
	<tr>
		<td><?php echo h($repitem['Repitem']['id']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['item_name']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['label']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['description']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['dimension1']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['dimension2']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['target']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['summary_type']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['threshold_target']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['threshold1']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['threshold2']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['min_samples']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['created']); ?>&nbsp;</td>
		<td><?php echo h($repitem['Repitem']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $repitem['Repitem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $repitem['Repitem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $repitem['Repitem']['id']), array(), __('Are you sure you want to delete # %s?', $repitem['Repitem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Repitem'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
