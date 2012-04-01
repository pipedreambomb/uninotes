<?php
class DocumentsController extends AppController {

	var $name = 'Documents';
    	var $helpers = array('Js' => array('Jquery'));
	
	public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('view', 'go');
        }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid document', true));
			$this->go404();
		}
		$this->set('document', $this->Document->read(null, $id));
	}

	function add($type = null, $id = null) {
		if (!empty($this->data)) {
		    if (isset( $this->params['form']['cancel'])) {
			 $targetType = $this->data['Document']['targetType'];
			 $controller = Inflector::pluralize($targetType);
			 $this->redirect( array('controller' => $controller, 'action' => 'view', $this->data[$targetType]['id']));
		     }
			$this->Document->create();
			if ($this->Document->save($this->data)) {
				$this->Session->setFlash(__('The document has been saved', true));
				$this->redirect(array('action' => 'go', $this->Document->id));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.', true));
			}
		}
		if (isset($type) && isset($id)) {
			$this->set('target', $this->Document->getDocumentTarget($type, $id));
		} 
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid document', true));
			$this->go404();
		}
		if (!empty($this->data)) {
		    if (isset( $this->params['form']['cancel'])) {
			$this->redirect(array('action' => 'go', $this->Document->id));
		     }
			if ($this->Document->save($this->data)) {
				$this->Session->setFlash(__('The document has been saved', true));
				$this->redirect(array('action' => 'go', $this->Document->id));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Document->read(null, $id);
		}
		$target = $this->Document->getExistingTarget($id);
		$this->set(compact('target'));
	}

	private function _checkExists($id) {
		if (!$id || !$this->Document->exists($id)) {
			$this->Session->setFlash(__('Invalid document', true));
			$this->go404();
		}
	}
	function go($id = null) {
		$this->_checkExists($id);
		$this->set('document', $this->Document->read(null, $id));
	}

}
