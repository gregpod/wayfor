<div class="tokens index">
	<h2><?php echo __('Tokens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('token'); ?></th>
			<th><?php echo $this->Paginator->sort('data'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tokens as $token): ?>
	<tr>
		<td><?php echo h($token['Token']['id']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['created']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['modified']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['token']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['data']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $token['Token']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $token['Token']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $token['Token']['id']), null, __('Are you sure you want to delete # %s?', $token['Token']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Token'), array('action' => 'add')); ?></li>
	</ul>
</div>
