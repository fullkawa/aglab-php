<div class="gameRepitems view">
<h2><?php echo __('Game Repitem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gameRepitem['GameRepitem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameRepitem['Game']['title'], array('controller' => 'games', 'action' => 'view', $gameRepitem['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Repitem'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gameRepitem['Repitem']['id'], array('controller' => 'repitems', 'action' => 'view', $gameRepitem['Repitem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disp Order'); ?></dt>
		<dd>
			<?php echo h($gameRepitem['GameRepitem']['disp_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gameRepitem['GameRepitem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($gameRepitem['GameRepitem']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Game Repitem'), array('action' => 'edit', $gameRepitem['GameRepitem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Game Repitem'), array('action' => 'delete', $gameRepitem['GameRepitem']['id']), array(), __('Are you sure you want to delete # %s?', $gameRepitem['GameRepitem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Game Repitems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game Repitem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Repitems'), array('controller' => 'repitems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repitem'), array('controller' => 'repitems', 'action' => 'add')); ?> </li>
	</ul>
</div>
