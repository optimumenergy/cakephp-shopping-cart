<?php
App::uses('AppController', 'Controller');
class CategoriesController extends AppController {

////////////////////////////////////////////////////////////

	public function index($id = null) {

		$data = $this->Category->generateTreeList();
		debug($data);

		$product = $this->Category->Product->find('first', array(
			'conditions' => array('Product.id' => $id)
		));
		debug($product);

		$category = $this->Category->find('first', array(
			'conditions' => array('Category.id' => $product['Product']['category_id'])
		));
		debug($category);

		$allChildren = $this->Category->children($product['Product']['category_id']);
		debug($allChildren);

		$path = $this->Category->getPath($product['Product']['category_id']);
		debug($path);

		$parent = $this->Category->getParentNode($product['Product']['category_id']);
		debug($parent);

		$test = $this->Category->find('threaded', array(
			'conditions' => array(
				'Category.lft >=' => $category['Category']['lft'],
				'Category.rght <=' => $category['Category']['rght'],
			),
			'contain' => array(
				'Product' => array(
					'conditions' => array('Product.name >' => '')
				)
			)
		));
		debug($test);

		$all = $this->Category->Product->find('threaded', array(
			'conditions' => array('Product.category_id !=' => 0),
			'contain' => array(
				'Category' => array(
//					'conditions' => array('Product.name >' => '')
				)
			)
		));
		debug($all);

		die();
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$parentCategories = $this->Category->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
