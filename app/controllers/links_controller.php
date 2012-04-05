<?php
class LinksController extends AppController {

	var $name = 'Links';

    	var $helpers = array('Js' => array('Jquery'));

        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index', 'view', 'go');
        }

	private function _checkExists($id) {
		if (!$id || !$this->Link->exists($id)) {
			$this->Session->setFlash(__('Invalid link', true));
			$this->go404();
		}
	}

	function view($id = null) {
		$this->_checkExists($id);
		$this->set('link', $this->Link->read(null, $id));
	}

	function add($type = null, $id = null) {
		if (!empty($this->data)) {
			$this->Link->create();
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('The link has been saved', true));
				$this->goHome();	
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.', true));
			}
		}
		if (!isset($type) || !isset($id)) {
			$type = $this->data['Link']['type'];
			$id = $this->data[$type]['id'];
		}
		$this->set('target', $this->Link->getLinkTarget($type, $id));
	}

	function edit($id = null) {
		$this->_checkExists($id);

		if (!empty($this->data)) {
			if ($this->Link->save($this->data)) {
				$this->Session->setFlash(__('The link has been saved', true));
				$this->goHome();
			} else {
				$this->Session->setFlash(__('The link could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Link->read(null, $id);
		}
		$events = $this->Link->Event->find('list');
		$organizations = $this->Link->Organization->find('list');
		$subjects = $this->Link->Subject->find('list');
		$users = $this->Link->User->find('list');
		$this->set(compact('events', 'organizations', 'subjects', 'users'));
	}

	function delete($id = null) {
		$this->_checkExists($id);
		if ($this->Link->delete($id)) {
			$this->Session->setFlash(__('Link deleted', true));
			$this->goHome();
		}
		$this->Session->setFlash(__('Link was not deleted', true));
		$this->goHome();
	}
	
	function go($id = null) {
		$this->_checkExists($id);
		$this->set('link', $this->Link->read(null, $id));
	}

}
