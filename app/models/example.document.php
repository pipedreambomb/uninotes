<?php
class Document extends AppModel {
	var $name = 'Document';
	var $validate = array(
		'google_doc_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
	var $actsAs = array("Logable"); 
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Event' => array(
			'className' => 'Event',
			'joinTable' => 'documents_events',
			'foreignKey' => 'document_id',
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
			'joinTable' => 'documents_organizations',
			'foreignKey' => 'document_id',
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
			'joinTable' => 'documents_subjects',
			'foreignKey' => 'document_id',
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
	    var $virtualFields = array(
		        'url' => 'CONCAT("https://docs.google.com/document/d/", Document.google_doc_id, "/edit")',
		        'url_pdf' => 'CONCAT("https://docs.google.com/document/d/", Document.google_doc_id, "/export?format=pdf")'
	    );
	
	// You will need to customize this with your own Google user details, including a public folder (see README.md)
	// Sorry this isn't separated into a config file btw, I didn't get a chance to refactor.
	var $folderUrl = 'https://docs.google.com/feeds/folders/private/full/folder%FOLDER_ID';
	var $gDocsUsername = 'GOOGLE_USER@GMAIL.COM';
	var $gDocsPassword = 'PASS_WORD';

	public function toURL() {
		return 'https://docs.google.com/document/d/'. $this->data['Document']['id'];
	}

	//Callback function automatically called when model is saved
	function beforeSave($options) {
		// Will fail to save record if return false
		$success = true;
		try {
			//if doc hasn't already been created before, (try to) create it.
			if(!isset($this->data['Document']['google_doc_id'])) {
				$success = $this->_createGoogleDoc();
			}
		} catch(Zend_Gdata_App_HttpException $exception) {  
		        echo "Error: " . $exception->getResponse()->getRawBody();  
		} 
		return $success;
	}

	private function _createGoogleDoc() {
		$docs = $this->_makeGDocsClient();	
		if ($this->data['Document']['text'] == null) {
			$this->data['Document']['text']	= "New Notes";
		}
		$docTitle = $this->data['Document']['text']; 
		$postXml = "<?xml version='1.0' encoding='UTF-8'?>
			<atom:entry xmlns:atom=\"http://www.w3.org/2005/Atom\" xmlns:docs=\"http://schemas.google.com/docs/2007\">
			  <atom:category scheme=\"http://schemas.google.com/g/2005#kind\"
			        term=\"http://schemas.google.com/docs/2007#document\" label=\"document\"/>
				  <atom:title>" . $docTitle . "</atom:title>
				    <docs:writersCanInvite value=\"false\" />
				    </atom:entry>";
		// Send above to Google
		$response = $docs->post($postXml, $this->folderUrl);
		$success = $response->getStatus() == 201;
		if ($success) {
			$location = $response->getHeader("Location");
			// Fiddly to get Id out of response, example: 
			// https://docs.google.com/feeds/folders/private/full/folder%3A0B25v3SJqlcqXZmJkYWRhYjgtNzNhNy00N2FmLWFmZTYtMGY3M2FhYjFlYWE5/document%3A1olnIH4ETXpe4uSQzsy9s_fkUScQ8Nvw4CK61PHhhAnE/gyt6wt1c
			// and we want the bit from "document%3A to the following "/".
			$location = explode("document%3A", $location);
			$location = explode("/", $location[1]);
			$gDocId = $location[0];
			$this->data['Document']['google_doc_id'] = $gDocId;
		}
		return $success;
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

	// Retrieve the item to which the document is to be associated, e.g. a document about Event #44
	function getDocumentTarget($type, $id) {
		switch ($type) {
		case "Event":
			$target = $this->Event->findById($id);
			break;
		case "Organization":
			$target = $this->Organization->findById($id);
			break;
		case "Subject":
			$target = $this->Subject->findById($id);
			break;
		default:
			$this->Session->setFlash("Unexpected target type");
			break;
		}
		$target = $target[$type];
		$target['type'] = $type;
		return $target;
	}

	// For an existing document, get details about the 
	// entity it is linked to: type, name & id, eg 'Subject', 'DB Mgmt', 1
	function getExistingTarget($id) {

		$doc = $this->findById($id);
		$res = array('type' => "", 'id' => -1);


		if(isset($doc['Subject'][0])) {
			$res = array('type' => 'Subject', 'id' => $doc['Subject'][0]['id'], 'name' => $doc['Subject'][0]['name']);
		}
		if(isset($doc['Organization'][0])) {
			$res = array('type' => 'Organization', 'id' => $doc['Organization'][0]['id'], 'name' => $doc['Organization'][0]['name']);
		}
		if(isset($doc['Event'][0])) {
			$res = array('type' => 'Event', 'id' => $doc['Event'][0]['id'], 'name' => $doc['Event'][0]['name']);
		}
		return $res;

	}
}
