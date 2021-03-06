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
<div class="links form hero-unit span4 offset5">
<?php echo $this->Form->create('Link');?>
	<fieldset>
		<legend><?php __('Add Link'); ?></legend>
	<?php
		echo $this->Form->input($target['type'], array('type' => 'text', 'value' => $target['name'], 'disabled' => true));
		echo $this->Form->input('url', array('label' => 'Website address'));
		echo $this->Form->input('text', array('label' => 'Title (optional)'));
		echo $form->hidden($target['type']. '.id', array( 'value' => $target['id']));
		echo $form->hidden('type', array('value' => $target['type']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div>
