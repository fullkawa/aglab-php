<div class="testplays view">
<h2><?php echo __('Testplay'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testplay['Game']['title'], array('controller' => 'games', 'action' => 'view', $testplay['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Plays'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['num_plays']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($testplay['Testplay']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Testplay'), array('action' => 'edit', $testplay['Testplay']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Testplay'), array('action' => 'delete', $testplay['Testplay']['id']), array(), __('Are you sure you want to delete # %s?', $testplay['Testplay']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Testplays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testplay'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Reports'); ?></h3>
	<?php if (!empty($testplay['Report'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Testplay Id'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['testplay_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Report'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['report']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
	<?php echo $testplay['Report']['updated']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Report'), array('controller' => 'reports', 'action' => 'edit', $testplay['Report']['id'])); ?></li>
			</ul>
		</div>
	</div>
	