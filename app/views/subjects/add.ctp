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
<div class="subjects form hero-unit span4 offset5">
<?php echo $this->Form->create('Subject');?>
	<fieldset>
		<legend><?php __('Add Subject'); ?></legend>
	<?php
		echo $this->Form->input('Org', array('type' => 'text', 'default' => $organization['Organization']['name'], 'disabled' => true, "label" => "Organization"));
		echo $this->Form->input('name');
		echo $this->Form->input('description', array("label"=>"Description (optional)", "type" => "textarea"));
		echo $form->hidden('organization_id', array( 'value' => $organization['Organization']['id']));
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
