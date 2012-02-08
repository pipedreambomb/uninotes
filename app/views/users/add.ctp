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
<p>Please be aware that this site is an early prototype, and is provided on a <strong>test-only basis</strong> at this time. By registering with UniNot.es you accept that any information you enter on this site may be owned, made public, and possibly lost or altered by the webmaster, and that UniNot.es cannot be held responsible for such circumstances. In the future when the site becomes more stable, this agreement will be subject to change, guaranteeing better stability and privacy, and we will inform you of this and any other changes to data policies.</p>
