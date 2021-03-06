<?php
class EventsController extends AppController {

	var $name = 'Events';
	var $helpers = array('map', 'lists');

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index', 'view');
        }

	// deprecated index for Events, go through its parent Subject instead
	function index() {
		$this->goHome();
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		$event = $this->Event->read(null, $id);
		$org = $this->Event->Subject->Organization->findById($event['Subject']['organization_id']);
		$activity = $this->Event->findLinkedLog($id, $event, array('Link', 'Document'));
		$isFollowing = $this->Event->User->isFollowing('Event', $this->Auth->user('id'), $id);
		$this->set(compact('isFollowing', 'activity', 'event', 'org'));
	}

	function add($id = null) {
		if (!$id && empty($this->data)) {
		    $this->Session->setFlash(__('Invalid event', true));
		    $this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		    if (isset( $this->params['form']['cancel'])) {
			 $this->redirect( array('controller' => 'subjects', 'action' => 'view', $this->data['Event']['subject_id']));
		     }
		    $this->Event->create();
		    if ($this->Event->saveAll($this->data)) {
			$this->Session->setFlash(__('The event has been saved', true));
			$this->redirect(array('controller' => 'subjects', 'action' => 'view', $this->data['Event']['subject_id']));
		    } else {
			$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
		    }
		}
		if (isset($id)) {
			$subj = $this->Event->Subject->findById($id);
			if ($subj != null) {
				$this->set('subject', $subj);
			} else {
			    $this->Session->setFlash(__('Invalid subject', true));
			    $this->redirect(array('action' => 'index'));
			}
		} elseif(isset($this->data['Event']['subject_id'])) {
			$this->set('subject', $this->Event->Subject->findById($this->data['Event']['subject_id']));
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}

		$defaultDate = "";
		if (!empty($this->data)) {
		    if (isset( $this->params['form']['cancel'])) {
			 $this->redirect( array( 'action' => 'view', $this->data['Event']['id']));
		     }
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'view', $this->data['Event']['id']));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		} else {
			$this->data = $this->Event->read(null, $id);
			$defaultDate = $this->data['Event']['datestr'];
		}

		$subjects = $this->Event->Subject->find('list');
		$links = $this->Event->Link->find('list');
		$users = $this->Event->User->find('list');
		$this->set(compact('subjects', 'links', 'users', 'defaultDate'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

    function follow($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for event', true));
            $this->redirect(array('action' => 'index'));
        }
        $userId = $this->Auth->user('id');
        if ($this->Event->User->follow('Event', $userId, $id)) {
            $this->Session->setFlash(__('Event followed', true));
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Event was not followed', true));
        $this->redirect(array('action' => 'index'));
    }

    function unfollow($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for event', true));
            $this->redirect(array('action' => 'index'));
        }
        $userId = $this->Auth->user('id');
        if ($this->Event->User->unfollow('Event', $userId, $id)) {
            $this->Session->setFlash(__('Event unfollowed', true));
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Event was not unfollowed', true));
        $this->redirect(array('action' => 'index'));
    }
}
