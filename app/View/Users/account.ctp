<!--views/users/account.ctp:-->
<h2>Account Page</h2>
<h3>Change your password</h3>
<p>You are <?php echo $current_user['User']['name']; ?> who last logged in <?php echo $current_user['User']['lastlogin']; ?>.</p>
 
<?php
echo $this->Form->create(array('action' => 'account'));
echo $this->Form->input('password_old',     array('label' => 'Old password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->input('password_confirm', array('label' => 'New password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->input('password',         array('label' => 'Re-enter new password', 'type' => 'password', 'autocomplete' => 'off'));
echo $this->Form->end('Update Password');
?>