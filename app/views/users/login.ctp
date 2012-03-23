<div class="container">
<div class="hero-unit">
<?php

echo $this->Form->create(array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => 'Login',
    'username' => array('label' => 'Username / Email'),
    'password',
    'remember' => array('type' => 'checkbox', 'label' => 'Remember me')
));
echo $this->Form->end('Login');
?>
</div>
</div>
