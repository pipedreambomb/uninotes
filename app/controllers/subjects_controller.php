<?php

class SubjectsController extends AppController {

    var $name = 'Subjects';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    function index() {
        $this->Subject->recursive = 0;
        $this->set('subjects', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid subject', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('subject', $this->Subject->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->Subject->create();
            if ($this->Subject->save($this->data)) {
                $this->Session->setFlash(__('The subject has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
            }
        }
        $organizations = $this->Subject->Organization->find('list');
        $links = $this->Subject->Link->find('list');
        $users = $this->Subject->User->find('list');
        $this->set(compact('organizations', 'links', 'users'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid subject', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Subject->save($this->data)) {
                $this->Session->setFlash(__('The subject has been saved', true));
                $this->redirect(array('action' => 'index'));
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
