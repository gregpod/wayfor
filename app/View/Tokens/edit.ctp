<div class="tokens form">
<?php echo $this->Form->create('Token'); ?>
	<fieldset>
		<legend><?php echo __('Edit Token'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('token');
		echo $this->Form->input('data');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Token.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Token.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tokens'), array('action' => 'index')); ?></li>
	</ul>
</div>
