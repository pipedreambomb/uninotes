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
<div class="hero-unit span6 offset4">
<div style="overflow:auto">
<?php

echo $this->Form->create();
echo $this->Form->inputs(array(
    'legend' => 'Signup',
    'email',
    'username',
    'password'
));
echo $this->Form->label("recaptcha_response_field", "Human verification");
echo $captchaTool->show();
echo $this->general->formButtons();
?>
</div>
<div>
<p class="small_font gap_above">Please be aware that this site is an early prototype, and is provided on a <strong>test-only basis</strong> at this time. By registering with UniNotes you accept that any information you enter on this site may be owned, made public, and possibly lost or altered by the webmaster, and that UniNotes cannot be held responsible for such circumstances.</p>
<p class="small_font">In the future when the site becomes more stable, this agreement will be subject to change, guaranteeing better stability and privacy, and we will inform you of this and any other changes to data policies.</p>
</div>
</div>
