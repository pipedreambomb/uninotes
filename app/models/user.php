<?php

class User extends AppModel {

    var $name = 'User';
    var $displayField = 'username';
    var $actsAs = 'ExtendAssociations';
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

    public function follow($modelName, $userId, $targetId) {
        return $this->habtmAdd($modelName, $userId, $targetId);
    }
    public function addGoogleId($userId, $googleId) {
	$user = $this->read(null, $userId);
	if ($user['User']['google_id'] != null) {
		throw new Exception('User already has a Google id: ' . $user['User']['google_id']);
	} 
	$user['User']['google_id'] = $googleId;
	$this->save($user);
    }

    public function rmGoogleId($userId) {
	$user = $this->read(null, $userId);
	if ($user['User']['google_id'] == null) {
		throw new Exception('User does not have a Google id.');
	} 
	$user['User']['google_id'] = null;
	$this->save($user);
    }
}
