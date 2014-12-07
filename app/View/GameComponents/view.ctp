<div class="gameComponents view">
<h2><?php echo __('Game Component'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameComponent['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameComponent['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Component Type'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['component_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shortened Name'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['shortened_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Properties'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['properties']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($gameComponent['GameComponent']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game Component'), array('action' => 'edit', $gameComponent['GameComponent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game Component'), array('action' => 'delete', $gameComponent['GameComponent']['id']), array(), __('Are you sure you want to delete # %s?', $gameComponent['GameComponent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Game Components'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game Component'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
