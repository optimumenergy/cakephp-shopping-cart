<?php
App::uses('AppController', 'Controller');
class ProductsController extends AppController {

//////////////////////////////////////////////////

	public $components = array('RequestHandler');

//////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
	}

//////////////////////////////////////////////////

	public function index() {
		$this->paginate = array(
			'recursive' => -1,
			'limit' => 5,
			'order' => 'RAND()',
			'paramType' => 'querystring',
		);
		$products = $this->paginate('Product');

		$this->set(compact('products'));
	}

//////////////////////////////////////////////////

	public function view($id = null) {

		$product = $this->Product->find('first', array(
			'recursive' => -1,
			'conditions' => array('Product.slug' => $id)
		));
		if (empty($product)) {
			$this->redirect(array('action' => 'index'), 301);
		}
		$this->set(compact('product'));

	}

//////////////////////////////////////////////////

	public function search() {

		$search = null;
		if(!empty($this->request->query['search']) || !empty($this->request->data['name'])) {
			$search = empty($this->request->query['search']) ? $this->request->data['name'] : $this->request->query['search'] ;
			$search = preg_replace('/[^a-zA-Z0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array();
			foreach($terms as $term) {
				$terms1[] = preg_replace('/[^a-zA-Z0-9]/', '', $term);
				$conditions[] = array('Product.name LIKE' => '%' . $term . '%');
			}
			$products = $this->Product->find('all', array(
				'conditions' => $conditions,
				'limit' => 200,
				'recursive' => -1
			));
			if(count($products) == 1) {
				$this->redirect(array('controller' => 'products', 'action' => 'view', 'slug' => $products[0]['Product']['slug']));
			}
			$terms1 = array_diff($terms1, array(''));
			$this->set(compact('products', 'terms1'));
		}
		$this->set(compact('search'));

		if ($this->request->is('ajax')) {
			$this->layout = false;
			$this->set('ajax', 1);
		} else {
			$this->set('ajax', 0);
		}

		$this->set('title_for_layout', 'Search');

		$description = 'Search';
		$this->set(compact('description'));

		$keywords = 'search';
		$this->set(compact('keywords'));
	}

//////////////////////////////////////////////////

	public function searchjson() {

		$search = null;
		if(!empty($this->request->query['term'])) {
			$search = $this->request->query['term'];
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array();
			foreach($terms as $term) {
				$conditions[] = array('Product.name LIKE' => '%' . $term . '%');
			}
			$products = $this->Product->find('all', array(
				'conditions' => $conditions,
				'limit' => 200,
				'recursive' => -1
			));
			foreach($products as $product) {
				$products1[] = $product['Product']['name'];
			}
			$this->set(compact('products1'));
		}
	}

//////////////////////////////////////////////////

	public function sitemap() {
		$products = $this->Product->find('all', array(
			'fields' => array('Product.slug'),
			'recursive' => -1,
			'order' => array('Product.created' => 'DESC'),
		));
		$this->set(compact('products'));
		$this->layout = 'xml';
		$this->response->type('xml');
	}

//////////////////////////////////////////////////

}
