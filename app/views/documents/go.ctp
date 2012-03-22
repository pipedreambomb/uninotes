<div id="home">
	
<div id="gdocs_preview">
<h1>Preview:</h1>
<iframe src="http://docs.google.com/viewer?url=<? echo urlencode($document['Document']['url_pdf']); ?>&embedded=true" width="500" height="300"></iframe>
</div>	
	<h1>External document: <? echo $document['Document']['text']; ?></h1>
	
	<p>Continue to Google Docs to view <? if($user['google_id'] != null) echo "and edit "; ?><strong>"<? echo $document['Document']['text']; ?>"</strong><? if($user['google_id'] != null) echo "(" . $this->Html->link("edit title", array('action' => 'edit', $document['Document']['id'])). ")"; ?>.</p>
<div>
<? 	if($user['google_id'] == null) :
?><p>
	Please note that <strong>in order to make changes</strong> to the document, you must have a Google account associated with your UniNot.es account. Click here to <? e($this->Html->Link('register', array('controller' => 'users', 'action' => 'add')));?>, or if you have already registered, change your <? e($this->Html->Link('settings', array('controller' => 'users', 'action' => 'dashboard')));?> to add a Google profile.
</p>
<p><?
	echo $this->Html->link(
			"View read only",
			$document['Document']['url'],
			array('class' => 'btn',
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
			array('class' => 'btn',
				'target' => '_blank')
		); ?>
</p><?
	endif;
?>
</p></div>
	<p>Please be aware that you are now leaving this site and that UniNot.es accepts no responsibility for external websites and their content.</p>

</div>
