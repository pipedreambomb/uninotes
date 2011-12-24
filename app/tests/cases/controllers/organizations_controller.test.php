<?php
/* Organizations Test cases generated on: 2011-12-24 23:15:53 : 1324768553*/
App::import('Controller', 'Organizations');

class TestOrganizationsController extends OrganizationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class OrganizationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.organization', 'app.subject', 'app.event');

	function startTest() {
		$this->Organizations =& new TestOrganizationsController();
		$this->Organizations->constructClasses();
	}

	function endTest() {
		unset($this->Organizations);
		ClassRegistry::flush();
	}

}
