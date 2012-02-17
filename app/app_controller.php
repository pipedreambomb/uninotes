<?php

class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Session', 'Breadcrumbs');
    public $components = array(
        'Auth' => array(
            'authorize' => 'controller',
            'autoRedirect' => true,
            'loginError' => 'Invalid account specified',
	    'authError' => 'You must be logged in to access this area',
	    'logoutRedirect' => array(
		'admin' => false,
		'controller' => 'users',
		'action' => 'dashboard'
	    )
        ),
        'Cookie',
        'Session'
    );

    public function beforeFilter() {


        $user = $this->Auth->user();
        if (!empty($user)) {
            Configure::write('User', $user[$this->Auth->getModel()->alias]);
        }


        if ($this->Auth->getModel()->hasField('active')) {
            $this->Auth->userScope = array('active' => 1);
        }

        if ($this->Auth->user() == null) {
            $user = $this->Cookie->read('User');
            if (!empty($user)) {
                $user = $this->Auth->getModel()->find('first', array(
                    'conditions' => array(
                        $this->Auth->fields['username'] =>
                        $user[$this->Auth->fields['username']],
                        $this->Auth->fields['password'] =>
                        $user[$this->Auth->fields['password']]
                    ),
                    'recursive' => -1
                        ));
                if (!empty($user) && $this->Auth->login($user)) {
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
    }

    public function beforeRender() {

        $user = $this->Auth->user();

        if (!empty($user)) {

            $user = $user[$this->Auth->getModel()->alias];
        }

        $this->set(compact('user'));
    }

    public function isAuthorized() {

        return true;
    }

	public function go404() {
		$this->redirect(array('controller' => 'pages', 'action' => 'display', '404'));
	}

	public function goHome() {
		$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
	}

}
?>

