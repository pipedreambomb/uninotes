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
<div class="container">
<div class="row-fluid">
<div class="span6">
	
	<h1>External document: <? echo $document['Document']['text']; ?></h1>
	<br />	
	<p>Continue to Google Docs to view <? if($user['google_id'] != null) echo "and edit "; ?><strong>"<? echo $document['Document']['text']; ?>"</strong>
	<? echo $this->Html->link("Edit Title", array('action' => 'edit', $document['Document']['id']), array('class' => 'btn btn-primary')); ?>
	</p>
<div>
<? 	if($user['google_id'] == null) :
?><p>
	Please note that <strong>in order to make changes</strong> to the document, you must have a Google account associated with your UniNotes account. Click here to <? e($this->Html->Link('register', array('controller' => 'users', 'action' => 'add')));?>, or if you have already registered, change your <? e($this->Html->Link('settings', array('controller' => 'users', 'action' => 'dashboard')));?> to add a Google profile.
</p>
<p><?
	echo $this->Html->link(
			"View read only",
			$document['Document']['url'],
			array('class' => 'btn btn-primary',
				'target' => '_blank')
		); ?>
</p><?
	else :
?><p>
As you have associated the Google account <strong>"<? echo $user['google_id'] ?>"</strong>, you can view and edit this document. Please ensure that you are <strong>logged into Google with the above account</strong>, or else the document may only be available as "read only".
</p>
<p><?		
	echo $this->Html->link(
			"View and Edit document",
			$document['Document']['url'],
			array('class' => 'btn btn-primary',
				'target' => '_blank')
		); ?>
</p><?
	endif;
?>
</p></div>
	<p>Please be aware that you are now leaving this site and that UniNotes accepts no responsibility for external websites and their content.</p>

</div>
<div id="gdocs_preview" class="span6">
<h2>Preview:</h2>
<iframe class="doc_preview" src="http://docs.google.com/viewer?url=<? echo urlencode($document['Document']['url_pdf']); ?>&embedded=true"></iframe>
</div>	
</div>
