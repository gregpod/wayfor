<div class="legislatorsUsers form">
<?php echo $this->Form->create('LegislatorsUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Legislators User'); ?></legend>
	<?php
		echo $this->Form->input('legislator_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Legislators Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Legislators'), array('controller' => 'legislators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Legislator'), array('controller' => 'legislators', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
