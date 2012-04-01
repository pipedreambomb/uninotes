<?php
class Event extends AppModel {
	var $name = 'Event';
	var $displayField = 'name';
	var $actsAs = array("Logable"); 
	var $virtualFields = array(
		//use MySQL directly to create a pseudo field, in this case representing
		//the date as a string
		'datestr' => "DATE_FORMAT(Event.datetime, '%m/%d/%Y %H:%i')",
		'date_nice_str' => "DATE_FORMAT(Event.datetime, '%a %D %b %Y, %l:%i %p')"
	    );
	var $validate = array(
		'subject_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Document' => array(
			'className' => 'Document',
			'joinTable' => 'documents_events',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'document_id',
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
		'Link' => array(
			'className' => 'Link',
			'joinTable' => 'links_events',
			'foreignKey' => 'event_id',
			'associationForeignKey' => 'link_id',
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
			'joinTable' => 'users_events',
			'foreignKey' => 'event_id',
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

		$success = false;
		
		// Attempt to convert the date text field into a datetime for the database
		if ($newDateTime = $this->data['Event']['newDateTime']) {
			if ($timestamp = strtotime($this->data['Event']['newDateTime']))  {
				$this->data['Event']['datetime'] = date('Y-m-d H:i:s', $timestamp);
				debug($this->data);
				$success = true;
			}		
		}

		return $success;
	}
}
