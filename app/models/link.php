<?php
class Link extends AppModel {
	var $name = 'Link';
	var $displayField = 'url';
	var $validate = array(
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Must be a valid URL (e.g. \'http://www.example.com\')',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
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
			'joinTable' => 'links_events',
			'foreignKey' => 'link_id',
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
			'joinTable' => 'links_organizations',
			'foreignKey' => 'link_id',
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
			'joinTable' => 'links_subjects',
			'foreignKey' => 'link_id',
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
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'links_users',
			'foreignKey' => 'link_id',
			'associationForeignKey' => 'user_id',
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
	function beforeSave($options) {

		$this->data['Link']['url'] = $this->_addHttpPrefix($this->data['Link']['url']);	
		debug($this->data);

		return true;
	}

	private function _addHttpPrefix($url) {
		$_httpPrefix = 'http://';
		$res = $url;
		// strstr means contains
		if (!strstr($res, $_httpPrefix)) {
			$res = $_httpPrefix . $res;
		}
		return $res;
	}

	function getLinkTarget($type, $id) {
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
		case "User": 
			$target = $this->User->findById($id);
			break;
		default:
			$this->Session->setFlash("Unexpected target type");
			break;
		}
		$target = $target[$type];
		$target['type'] = $type;
		return $target;
	}
}
