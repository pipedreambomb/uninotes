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
<?php echo $this->Form->create('Document');?>
	<fieldset>
		<legend><?php __('Edit Document'); ?></legend>
	<?php
		echo $this->Form->input('targetName', array('label' => 'Pertaining to ' . $target['type'], 'disabled' => true, 'value' => $target['name']));
		echo $this->Form->input('id');
		echo $this->Form->input('text', array('label' => 'Document Title'));
		echo $this->Form->hidden('google_doc_id');
		echo $form->hidden('targetType', array( 'value' => $target['type']));
		echo $form->hidden('targetId', array( 'value' => $target['id']));
		echo $this->general->formButtons();
	?>
	</fieldset>
</div>
</div>
