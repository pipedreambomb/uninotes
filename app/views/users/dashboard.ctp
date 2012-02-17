<p>Welcome!</p>
<? if($user['google_id'] != null) { ?>
<label>Google account linked with this account:</label><p><? echo $user['google_id']; ?></p>
<?
	echo $this->Html->link('Unlink Google account', array('action' => 'gunlink'));
} else { 
	echo $this->Glink->link();
} ?>
