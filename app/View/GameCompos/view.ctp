<div class="gameCompos view">
<h2><?php echo __('Game Compo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gameCompo['GameCompo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameCompo['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameCompo['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameCompo['Compo']['name'], array('controller' => 'compos', 'action' => 'view', $gameCompo['Compo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gameCompo['GameCompo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($gameCompo['GameCompo']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game Compo'), array('action' => 'edit', $gameCompo['GameCompo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game Compo'), array('action' => 'delete', $gameCompo['GameCompo']['id']), array(), __('Are you sure you want to delete # %s?', $gameCompo['GameCompo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Game Compos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game Compo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compos'), array('controller' => 'compos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compo'), array('controller' => 'compos', 'action' => 'add')); ?> </li>
	</ul>
</div>
