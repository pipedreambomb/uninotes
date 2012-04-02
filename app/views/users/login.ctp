<div class="row">
<div class="hero-unit span4 offset5">
<?php

echo $this->Form->create(array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => 'Login',
    'username' => array('label' => 'Username / Email'),
    'password',
    'remember' => array('type' => 'checkbox', 'label' => 'Remember me')
));

echo $this->Form->submit(__('Login', true), array('name' => 'ok', 'class' => 'btn-primary btn-float', 'div' => false)); 
?>
</div>
</div>
