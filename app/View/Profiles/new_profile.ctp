<div class="row-fluid" style="border: 1px solid #333;">	
	<div class="span-10 offset1">
		<h3 class="lead">Welcome to WAYFOR, <?php echo $user['User']['username']; ?></h3>
		<h4> To get you up and running, we need to know what state you live in</h4>
		<?php echo $this->Form->create('Profile', array('class' => 'form-horizontal')); ?>
		    <fieldset>
		        <?php echo $this->Form->input('field5', array(
		            'type' => 'select',
		            'multiple' => 'checkbox inline',
		            'options' => $states,
		        )); ?>
		        <div class="form-actions">
		            <?php echo $this->Form->submit('Save changes', array(
		                'div' => false,
		                'class' => 'btn btn-primary',
		            )); ?>
		            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		            <button class="btn">Cancel</button>
		        </div>
		    </fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>