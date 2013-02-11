<?php /*
* Copyright 2013 George Nixon
* 
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
* 
*   http://www.apache.org/licenses/LICENSE-2.0
* 
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/ ?>
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
