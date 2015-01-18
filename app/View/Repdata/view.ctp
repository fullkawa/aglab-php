<div class="repdata view">
<h2><?php echo __('Repdata'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Testplay Id'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['testplay_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play'); ?></dt>
		<dd>
			<?php echo $this->Html->link($repdata['Play']['id'], array('controller' => 'plays', 'action' => 'view', $repdata['Play']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item1'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['item1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item2'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['item2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item3'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['item3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item4'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['item4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item5'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['item5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Label'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($repdata['Repdata']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Repdata'), array('action' => 'edit', $repdata['Repdata']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Repdata'), array('action' => 'delete', $repdata['Repdata']['id']), array(), __('Are you sure you want to delete # %s?', $repdata['Repdata']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Repdata'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repdata'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
