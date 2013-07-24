<div class="row-fluid" style="">	
	<div class="span-10 offset1">
		<h3 class="lead">Welcome to WAYFOR, <?php echo $user['User']['username']; ?></h3>
		<h4> To get you up and running, we need to know what state you live in</h4>
		<?php echo $this->Form->create('Profile', array('class' => 'form-horizontal, span6')); ?>
	    	<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
    		<div class="btn-group span6" style="float:right;margin-top: 24px;">
	    		<?php echo $this->Form->submit('Update', array(
	    			'div' 	=> false,
	    	    	'class' => 'btn btn-primary',
	    		)); 
	    		?>
	        	<button class="btn">Cancel</button>
        	</div>
        	<?php echo $this->Form->input('state', array(
            	'type' 		=> 'select',
            	'options' 	=> $states,
            	'class'		=> 'span6'
        		)); 
        	?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<?php 

?>
