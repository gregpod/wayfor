<div class="legislatorsUsers view">
<h2><?php  echo __('Legislators User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($legislatorsUser['LegislatorsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Legislator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($legislatorsUser['Legislator']['title'], array('controller' => 'legislators', 'action' => 'view', $legislatorsUser['Legislator']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($legislatorsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $legislatorsUser['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Legislators User'), array('action' => 'edit', $legislatorsUser['LegislatorsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Legislators User'), array('action' => 'delete', $legislatorsUser['LegislatorsUser']['id']), null, __('Are you sure you want to delete # %s?', $legislatorsUser['LegislatorsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Legislators Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Legislators User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Legislators'), array('controller' => 'legislators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Legislator'), array('controller' => 'legislators', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
