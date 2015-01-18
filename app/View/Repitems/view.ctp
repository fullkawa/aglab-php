<div class="repitems view">
<h2><?php echo __('Repitem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item Name'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['item_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dimension1'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['dimension1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dimension2'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['dimension2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary Type'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['summary_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold Target'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['threshold_target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold1'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['threshold1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threshold2'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['threshold2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Samples'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['min_samples']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($repitem['Repitem']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Repitem'), array('action' => 'edit', $repitem['Repitem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Repitem'), array('action' => 'delete', $repitem['Repitem']['id']), array(), __('Are you sure you want to delete # %s?', $repitem['Repitem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Repitems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repitem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
