<?
// General purpose class to supplement built-in Html helpers with 
// Bootstrap versions

class BootstrapHelper extends AppHelper {

	var $helpers = array('Html');

	function linkWithIcon( $title, $url = NULL, $options = array ( ), $confirmMessage = false ) {
		$link = $this->Html->link($title, $url, $options, $confirmMessage);
		if($options['icon'] != null) {
			// inserts <i ..> after first <a ...>
			$iconStr = "<i class='" . $options['icon']  . "'></i>"; 
			$bracketPos = strpos($link, '>') + 1;
			$firstHalf = substr($link, 0, $bracketPos);
			$secondHalf = substr($link, $bracketPos); 
			$link = $firstHalf . $iconStr . $secondHalf;
		}
		return $link;
	}
}
