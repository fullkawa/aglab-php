<div class="playData view">
<h2><?php echo __('Play Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playData['Play']['id'], array('controller' => 'plays', 'action' => 'view', $playData['Play']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item1'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['item1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item2'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['item2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item3'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['item3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item4'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['item4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item5'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['item5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($playData['PlayData']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Play Data'), array('action' => 'edit', $playData['PlayData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Play Data'), array('action' => 'delete', $playData['PlayData']['id']), array(), __('Are you sure you want to delete # %s?', $playData['PlayData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Play Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plays'), array('controller' => 'plays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Play'), array('controller' => 'plays', 'action' => 'add')); ?> </li>
	</ul>
</div>
