<h2>Login</h2>
<?php
echo $this->form->create('User', array('action' => 'login'));
echo $this->form->input('username');
echo $this->form->input('password', array('label' => 'Password', 'type' => 'password'));
echo $this->form->end('Login');
?>
<?php echo $this->html->link('Create Account', array('action'=>'register'));