<div class="gameRules view">
<h2><?php echo __('Game Rule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gameRule['GameRule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameRule['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameRule['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameRule['Rule']['name'], array('controller' => 'rules', 'action' => 'view', $gameRule['Rule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($gameRule['GameRule']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gameRule['GameRule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($gameRule['GameRule']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game Rule'), array('action' => 'edit', $gameRule['GameRule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game Rule'), array('action' => 'delete', $gameRule['GameRule']['id']), array(), __('Are you sure you want to delete # %s?', $gameRule['GameRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Game Rules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game Rule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
