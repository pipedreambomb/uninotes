<?php

class SubjectsController extends AppController {

   	var $name = 'Subjects';
	var $helpers = array('lists');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

	//No longer need an index page for subjects, should only access
	//them through their parent organization
    function index() {
	    $this->goHome();
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid subject', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('subject', $this->Subject->read(null, $id));
    }

    function add($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid organization', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $this->Subject->create();
            if ($this->Subject->save($this->data)) {
                $this->Session->setFlash(__('The subject has been saved', true));
                $this->redirect(array('controller' => 'organizations', 'action' => 'view', $this->data['Organization']['id']));
            } else {
                $this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
            }
        }
	if (isset($id)) {
		$org = $this->Subject->Organization->findById($id);
		if ($org != null) {
			$this->set('organization', $org);
		} else {
		    $this->Session->setFlash(__('Invalid organization', true));
		    $this->redirect(array('action' => 'index'));
		}
	}
		
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid subject', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Subject->saveAll($this->data)) {
                $this->Session->setFlash(__('The subject has been saved', true));
                $this->redirect(array('action' => 'view', $this->data['Subject']['id']));
            } else {
                $this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Subject->read(null, $id);
        }
        $organizations = $this->Subject->Organization->find('list');
        $links = $this->Subject->Link->find('list');
        $users = $this->Subject->User->find('list');
        $this->set(compact('organizations', 'links', 'users'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for subject', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Subject->delete($id)) {
            $this->Session->setFlash(__('Subject deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Subject was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function follow($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for subject', true));
            $this->redirect(array('action' => 'index'));
        }
        $userId = $this->Auth->user('id');
        if ($this->Subject->User->follow('Subject', $userId, $id)) {
            $this->Session->setFlash(__('Subject followed', true));
            $this->redirect(array('action' => 'view', $id));
        }
        $this->Session->setFlash(__('Subject was not followed', true));
        $this->redirect(array('action' => 'index'));
    }

}
