<div class="compos view">
<h2><?php echo __('Compo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Component Type'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['component_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shortened Name'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['shortened_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Properties'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['properties']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($compo['Compo']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Compo'), array('action' => 'edit', $compo['Compo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Compo'), array('action' => 'delete', $compo['Compo']['id']), array(), __('Are you sure you want to delete # %s?', $compo['Compo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Compos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
