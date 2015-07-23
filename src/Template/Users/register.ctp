<?php $this->layout = 'admin'; ?>
<h1>Register a new user</h1>
<?php
echo $this->Form->create($usersEntity, [
    'novalidate' => 'novalidate',
    'context' => array(
        'table' => 'users'
    )
]);
echo $this->Form->input('username', array(
    'label' => __d('user_tools', 'Username')
));
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('confirm_password', array(
    'type' => 'password',
));
echo $this->Form->submit(__d('user_tools', 'Sign up'));
echo $this->Form->end();