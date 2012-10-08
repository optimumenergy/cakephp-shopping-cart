<?php
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {

//////////////////////////////////////////////////

	public function index() {
		$data = $this->Category->generateTreeList(null, null, null, '-');
		debug($data);
		die;
	}

//////////////////////////////////////////////////

}
