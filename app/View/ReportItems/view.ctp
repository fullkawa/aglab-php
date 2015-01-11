<div class="reportItems view">
<h2><?php echo __('Report Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reportItem['Game']['title'], array('controller' => 'games', 'action' => 'view', $reportItem['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disp Order'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['disp_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item Name'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['item_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dimension1'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['dimension1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dimension2'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['dimension2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary Type'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['summary_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold Target'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['threshold_target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold1'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['threshold1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold2'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['threshold2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Samples'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['min_samples']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($reportItem['ReportItem']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Report Item'), array('action' => 'edit', $reportItem['ReportItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Report Item'), array('action' => 'delete', $reportItem['ReportItem']['id']), array(), __('Are you sure you want to delete # %s?', $reportItem['ReportItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Report Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
