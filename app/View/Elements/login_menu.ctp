<?php if(!$this->session->check('Auth.User')): ?>
	<li class="pull-right">
		<?php echo $this->html->link('Login',array('controller'=>'users','action'=>'login')); ?>
	</li>
<?php else: ?>
	<?php  
		$username = $this->Session->read('Auth.User.User.username');
	?>
	<li class="dropdown pull-right">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
	   		<?php echo $username; ?>
	   		<b class="caret"></b>
	  	</a>
		<ul class="dropdown-menu pull-right">
			<li>
				<?php echo $this->html->link("settings", "/profiles/view/".$user['Profile']['id'], array(), null, false); ?>
			</li>
	  		<li>
	  			<?php echo $this->html->link("logout", "/users/logout", array(), null, false); ?>
	  		</li>
		</ul>
	</li>
<?php endif; ?>