<?
	// map.php - This helper creates a map, based on a location

class MapHelper extends AppHelper {

	var $helpers = array('Html', 'Js');

	public function locationMap($location) {

		// Include Google's JS map api
		$res = $this->Html->script('http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyDDX3HTPPu1laUnT7jpdJXQr7T1WyLtO78');
		// include my map querying JS
		$res .= $this->Html->script('map.js');
		$this->_addCustomJs($location);
		// create <div> with no class and id=map_canvas
		// contents is $location but if Javascript is enabled
		// this will be overwritten with the interactive map
		$res .= $this->Html->div('', $location, array('id' => 'map_canvas'));
		return $res;
	}

	// create a custom JS script based on passed in location
	// to run when page loads
	private function _addCustomJs($location) {
		// flatten string by removing newlines
		$locationFormatted = str_replace("\r\n", " ", $location);
		$customLoadJs = "showAddress('" . $locationFormatted . "');";
		$this->Js->buffer($customLoadJs);
	}
}
