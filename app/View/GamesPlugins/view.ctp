<div class="gamesPlugins view">
<h2><?php echo __('Games Plugin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gamesPlugin['GamesPlugin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gamesPlugin['Game']['title'], array('controller' => 'games', 'action' => 'view', $gamesPlugin['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plugin'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gamesPlugin['Plugin']['name'], array('controller' => 'plugins', 'action' => 'view', $gamesPlugin['Plugin']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inherent'); ?></dt>
		<dd>
			<?php echo h($gamesPlugin['GamesPlugin']['inherent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gamesPlugin['GamesPlugin']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($gamesPlugin['GamesPlugin']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Games Plugin'), array('action' => 'edit', $gamesPlugin['GamesPlugin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Games Plugin'), array('action' => 'delete', $gamesPlugin['GamesPlugin']['id']), array(), __('Are you sure you want to delete # %s?', $gamesPlugin['GamesPlugin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Games Plugins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Games Plugin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plugins'), array('controller' => 'plugins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plugin'), array('controller' => 'plugins', 'action' => 'add')); ?> </li>
	</ul>
</div>
