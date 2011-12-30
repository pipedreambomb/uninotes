<?php
class EventsController extends AppController {

	var $name = 'Events';
	var $scaffold;

        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('index', 'view');
        }
}
