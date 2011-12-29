<?php

echo $this->Form->create();
echo $this->Form->inputs(array(
    'legend' => 'Signup',
    'email',
    'username',
    'password'
));
echo $captchaTool->show();
echo $this->Form->end('Submit');
?>
