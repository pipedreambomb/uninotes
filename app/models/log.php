<?php
class Log extends AppModel {

	var $name = 'Log';
	var $order = 'created DESC';
	var $virtualFields = array(
		//use MySQL directly to create a pseudo field, in this case representing
		//the date as a string
		'created_nice_str' => "DATE_FORMAT(Log.created, '%a %D %b %Y, %l:%i %p')"
	    );
}
?>
