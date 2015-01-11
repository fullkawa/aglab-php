<div class="reportItems index">
	<h2><?php echo __('Report Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('game_id'); ?></th>
			<th><?php echo $this->Paginator->sort('disp_order'); ?></th>
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
	<?php foreach ($reportItems as $reportItem): ?>
	<tr>
		<td><?php echo h($reportItem['ReportItem']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reportItem['Game']['title'], array('controller' => 'games', 'action' => 'view', $reportItem['Game']['id'])); ?>
		</td>
		<td><?php echo h($reportItem['ReportItem']['disp_order']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['item_name']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['label']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['description']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['dimension1']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['dimension2']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['target']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['summary_type']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['threshold_target']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['threshold1']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['threshold2']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['min_samples']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['created']); ?>&nbsp;</td>
		<td><?php echo h($reportItem['ReportItem']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reportItem['ReportItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reportItem['ReportItem']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reportItem['ReportItem']['id']), array(), __('Are you sure you want to delete # %s?', $reportItem['ReportItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Report Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
