<h2>Create an Account</h2>
<?php
echo $this->form->create('User', array('action' => 'register'));
echo $this->form->input('username');
// Force the FormHelper to render a password field, and change the label.
echo $this->form->input('group_id', array('type' => 'hidden', 'value' => '3'));
echo $this->form->input('password', array('type' => 'password', 'label' => 'Password'));
echo $this->form->input('email', array('between' => 'We need to send you a confirmation email to check you are human.'));
echo $this->form->submit('Create Account');
echo $this->form->end();
?>
