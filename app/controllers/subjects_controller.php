<?php
class SubjectsController extends AppController {

	var $name = 'Subjects';
	var $scaffold;
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index', 'view');
        }

}
