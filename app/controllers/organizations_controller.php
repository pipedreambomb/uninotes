<?php
class OrganizationsController extends AppController {

	var $name = 'Organizations';
	var $helpers = array('map', 'lists', 'bootstrap');
        var $EMPTY_URL = "http://uninot.es/empty_url";

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('view');
        }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid organization', true));
			$this->redirect(array('action' => 'index'));
		}
		$organization = $this->Organization->read(null, $id);
		if($organization['Link']['url'] == $this->EMPTY_URL) {
			$organization['Link']['url'] = "";
		}
		$activity = $this->Organization->findLinkedLog($id, $organization, array('Subject'));
		$isFollowing = $this->Organization->User->isFollowing('Organization', $this->Auth->user('id'), $id);
		$this->set(compact('isFollowing', 'organization', 'activity'));
	}

	function add() {
		if (!empty($this->data)) {
			 if (isset( $this->params['form']['cancel'])) {
				 $this->redirect( array('controller' => 'organizations', 'action' => 'index'));
			     }
			$this->Organization->create();
			if ($this->Organization->saveAll($this->data)) {
				$this->Session->setFlash(__('The organization has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid organization', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			 if (isset( $this->params['form']['cancel'])) {
				 $this->redirect( array( 'action' => 'view', $this->data['Organization']['id']));
			     }
			 // Validation of Link model means url can't be empty.
			 // This is a hack, sets it to this special url which we will
			 // screen for before passing to views, and pass an empty string instead
			 if($this->data['Link']['url'] == "") {
				 $this->Organization->set( $this->data );
				 //only do so if form passes validation, i.e. we are about to save data
				if($this->Organization->validates()) {
					$this->data['Link']['url'] = $this->EMPTY_URL;
				}
			 }
			if ($this->Organization->saveAll($this->data)) {
				$this->Session->setFlash(__('The organization has been saved', true));
				$this->redirect(array('action' => 'view', $this->data['Organization']['id']));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$organization = $this->Organization->read(null, $id);
			if($organization['Link']['url'] == $this->EMPTY_URL) {
				$organization['Link']['url'] = "";
			}
			$this->data = $organization;
		}
		$links = $this->Organization->Link->find('list');
		$users = $this->Organization->User->find('list');
		$this->set(compact('links', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for organization', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Organization->delete($id)) {
			$this->Session->setFlash(__('Organization deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Organization was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
        
    function follow($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for organization', true));
            $this->redirect(array('action' => 'index'));
        }
        $userId = $this->Auth->user('id');
        if ($this->Organization->User->follow('Organization', $userId, $id)) {
            $this->Session->setFlash(__('Organization followed', true));
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Organization was not followed', true));
        $this->redirect(array('action' => 'index'));
    }

    function unfollow($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for organization', true));
            $this->redirect(array('action' => 'index'));
        }
        $userId = $this->Auth->user('id');
        if ($this->Organization->User->unfollow('Organization', $userId, $id)) {
            $this->Session->setFlash(__('Organization unfollowed', true));
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Organization was not unfollowed', true));
        $this->redirect(array('action' => 'index'));
    }
}
