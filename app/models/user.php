<?php

class User extends AppModel {

	var $name = 'User';
	var $displayField = 'username';
	var $actsAs = array('Logable', 'ExtendAssociations');
	var $validate = array(
		'username' => array(
			'maxlength' => array(
				'rule' => array('maxlength', 30),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', 4),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Event' => array(
			'className' => 'Event',
			'joinTable' => 'users_events',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'event_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Organization' => array(
			'className' => 'Organization',
			'joinTable' => 'users_organizations',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'organization_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Subject' => array(
			'className' => 'Subject',
			'joinTable' => 'users_subjects',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'subject_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	// Have decided to hard code this - there will be one folder for all documents belonging to uninot.es, and will add/remove editors on this and it will cascade to each document in turn.
	//var $aclUrl = 'https://docs.google.com/feeds/default/private/full/folder:163/acl';
	var $aclUrl = 'https://docs.google.com/feeds/acl/private/full/folder%3A0B25v3SJqlcqXZmJkYWRhYjgtNzNhNy00N2FmLWFmZTYtMGY3M2FhYjFlYWE5';
	var $gDocsUsername = 'westcliffeproductions@gmail.com';
	var $gDocsPassword = '6Bc4fDAt';

	public function follow($modelName, $userId, $targetId) {
		return $this->habtmAdd($modelName, $userId, $targetId);
	}

	public function addGoogleId($userId, $googleId) {
		$existingMatches = $this->_countMatchingGIds($googleId); 
		$this->_saveGoogleIdToUser($userId, $googleId);
		//check googleId has not already been added (probably to a separate user account on my site sharing the same Google account)
		if($existingMatches  == 0) {
			$this->_addGDocsEditor($googleId);
		}
	}

	private function _saveGoogleIdToUser($userId, $googleId) {

		$user = $this->read(null, $userId);
		if ($user['User']['google_id'] != null) {
			throw new Exception('User already has a Google id: ' . $user['User']['google_id']);
		} 
		$user['User']['google_id'] = $googleId;
		$this->save($user);
	}

	public function rmGoogleId($userId) {
		$user = $this->read(null, $userId);
		$googleId = $user['User']['google_id'];
		if ($googleId == null) {
			throw new Exception('User does not have a Google id.');
		} 
		$user['User']['google_id'] = null;
		$this->save($user);

		//check there are no more users with same google id before removing
		if($this->_countMatchingGIds($googleId) == 0) {
			$this->_rmGDocsEditor($googleId);
		}
	}

	private function _countMatchingGIds($googleId) { 
		return $this->find('count', array(
			'conditions' => array('User.google_id' => $googleId)
		));
	}

	// @returns Zend_Gdata_Docs client for sending requests to Google
	private function _makeGDocsClient() {

		App::import('Vendor', 'zend_include_path');
		App::import('Vendor', 'Zend_Gdata', true, false, 'Zend/Gdata.php');

		Zend_Loader::loadClass('Zend_Http_Client');
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_Docs');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');

		$service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
		$client = Zend_Gdata_ClientLogin::getHttpClient($this->gDocsUsername, $this->gDocsPassword, $service);
		return new Zend_Gdata_Docs($client);
	}

	private function _addGDocsEditor($googleId) {

		$docs = $this->_makeGDocsClient();
		//debug(Zend_Gdata_Docs::DOCUMENTS_FOLDER_FEED_URI);
		//debug($docs->getFeed(Zend_Gdata_Docs::DOCUMENTS_FOLDER_FEED_URI));
		$addUserXml = $this->_makeAddUserXml($googleId);
		$docs->post($addUserXml, $this->aclUrl);
	}

	private function _makeAddUserXml($googleId) { 
		return  "<entry xmlns=\"http://www.w3.org/2005/Atom\" xmlns:gAcl='http://schemas.google.com/acl/2007'>
			<category scheme='http://schemas.google.com/g/2005#kind'
			term='http://schemas.google.com/acl/2007#accessRule'/>
			<gAcl:role value='writer'/>
			<gAcl:scope type='user' value='" . $googleId . "'/>
			</entry>";
	}

	private function _rmGDocsEditor($googleId) {
		$docs = $this->_makeGDocsClient();
		$reqUrl = $this->aclUrl . "/user%3A" . urlencode($googleId);
		debug($reqUrl);
		$docs->delete($reqUrl);
		
	}
}
