<?
class GlinkHelper extends Helper {

	var $helpers = array('Html');

	function link() {
		App::import('Vendor', 'zend_include_path');
		App::import('Vendor', 'Zend_Gdata', true, false, 'Zend/Gdata.php');

		Zend_Loader::loadClass('Zend_Http_Client');
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_AuthSub');

		$next = 'http://localhost/uninot.es/users/glink/';
		$scope = 'https://www.googleapis.com/auth/userinfo.email';
		$secure = false;
		$session = true;
		$authUrl = (Zend_Gdata_AuthSub::getAuthSubTokenUri($next, $scope, $secure, $session));
		return $this->Html->link('Connect with Google Account', $authUrl);
	}
}
