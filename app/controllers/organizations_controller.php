<?php
class OrganizationsController extends AppController {

	var $name = 'Organizations';
	var $scaffold;
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index', 'view');
        }

}
