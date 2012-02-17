<?php

class UsersController extends AppController {

    var $name = 'Users';
    var $components = array('Recaptcha.Captcha' => array(
            'private_key' => '6LeewcsSAAAAAI2idDck79tLkRomGdTcyyiEaSUQ',
            'public_key' => '6LeewcsSAAAAALlyb2fjylNG-7Yl-_16aXXL3OPC'));
    var $helpers = array('Glink', 'Recaptcha.CaptchaTool');

    public function beforeFilter() {

        parent::beforeFilter();

        $this->Auth->allow('index', 'add', 'view');
    }

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

    public function add() {

        if (!empty($this->data)) {

            if (!$this->Captcha->validate()) {
                $this->Session->setFlash('CAPTCHA failed, please try again.');
            } else {
                $this->User->create();

                if ($this->User->save($this->data)) {

                    $this->Session->setFlash('User created!');

                    $this->redirect(array('action' => 'login'));
                } else {

                    $this->Session->setFlash('Please correct the errors');
                }
            }
        }
    }

    public function login() {
        if (
                !empty($this->data) &&
                !empty($this->Auth->data['User']['username']) &&
                !empty($this->Auth->data['User']['password'])
        ) {

            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $this->Auth->data['User']['username'],
                    'User.password' => $this->Auth->data['User']['password']
                ),
                'recursive' => -1
                    ));

            if (!empty($user) && $this->Auth->login($user)) {

                if ($this->Auth->autoRedirect) {

                    $this->redirect($this->Auth->redirect());
                }
            } else {

                $this->Session->setFlash($this->Auth->loginError, $this->Auth->flashElement, array(), 'auth');
            }
        }

        if (!empty($this->data)) {
            $userId = $this->Auth->user('id');
            if (!empty($userId)) {
                if (!empty($this->data['User']['remember'])) {
                    $user = $this->User->find('first', array(
                        'conditions' => array('id' => $userId),
                        'recursive' => -1,
                        'fields' => array('username', 'password')
                            ));
                    $this->Cookie->write('User', array_intersect_key(
                                    $user[$this->Auth->userModel], array('username' => null, 'password' => null)
                            ));
                } elseif ($this->Cookie->read('User') != null) {
                    $this->Cookie->delete('User');
                }
                $this->redirect($this->Auth->redirect());
            }
        }
    }

    function logout() {
        if ($this->Cookie->read('User') != null) {

            $this->Cookie->delete('User');
        }

        $this->redirect($this->Auth->logout());
    }

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->goHome();
		}
		$this->set('userProfile', $this->User->read(null, $id));
	}

    function dashboard(){
    }

    // Connect user's account to their Google account
    // TODO: unlink?
    public function glink() {
    //TODO: validate user hasn't done this already.
	if(!isset($_GET['token'])) {
		$this->Session->setFlash(__('Invalid Google token', true));
		$this->goHome();
	}
	$token = $_GET['token'];
		App::import('Vendor', 'zend_include_path');
		App::import('Vendor', 'Zend_Gdata', true, false, 'Zend/Gdata.php');

		Zend_Loader::loadClass('Zend_Http_Client');
		Zend_Loader::loadClass('Zend_Gdata');
		Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
		Zend_Loader::loadClass('Zend_Gdata_AuthSub');
			$client = Zend_Gdata_AuthSub::getHttpClient($token);
		    $gdata = new Zend_Gdata($client);
				$feed = $gdata->get('https://www.googleapis.com/oauth2/v1/userinfo');
			debug(json_decode($feed->getBody())->email);
    }
}
