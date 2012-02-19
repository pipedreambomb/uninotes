<div id="home">
	
	<h1>External document</h1>
	
	<p>Continue to Google Docs to view <strong>"<? echo $document['Document']['text']; ?>"</strong>.</p>
<div>
<? 	if($user['google_id'] == null) :
?><p>
	Please note that <strong>in order to make changes</strong> to the document, you must be logged in and have an associated Google account. Click here to <? e($this->Html->Link('register', array('controller' => 'users', 'action' => 'add')));?>, <? e($this->Html->Link('log in', array('controller' => 'users', 'action' => 'login')));?> or change your <? e($this->Html->Link('settings', array('controller' => 'users', 'action' => 'dashboard')));?> to add a Google profile.
</p>
<p><?
	echo $this->Html->link(
			"View read only",
			$document['Document']['url'],
			array('class' => 'link_button')
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
			array('class' => 'link_button')
		); ?>
</p><?
	endif;
?>
</p></div>

	
	<p>Please be aware that you are now leaving this site and that UniNot.es accepts no responsibility for external websites and their content.</p>

</div>
