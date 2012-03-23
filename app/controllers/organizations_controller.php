<?php
class OrganizationsController extends AppController {

	var $name = 'Organizations';
	var $helpers = array('lists');
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index', 'view');
        }

	function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid organization', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('organization', $this->Organization->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
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
			if ($this->Organization->saveAll($this->data)) {
				$this->Session->setFlash(__('The organization has been saved', true));
				$this->redirect(array('action' => 'view', $this->data['Organization']['id']));
			} else {
				$this->Session->setFlash(__('The organization could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Organization->read(null, $id);
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

}
