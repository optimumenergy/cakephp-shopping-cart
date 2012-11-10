<?php
class CartComponent extends Component {

//////////////////////////////////////////////////

	public $components = array('Session');

//////////////////////////////////////////////////

	public $controller = null;

//////////////////////////////////////////////////

	public function startup(&$controller) {
		$this->controller =& $controller;
	}

//////////////////////////////////////////////////

	public $maxQuantity = 99;

//////////////////////////////////////////////////

	public function add($id, $quantity = 1) {

		if(!is_numeric($quantity)) {
			$quantity = 1;
		}
		$quantity = abs($quantity);
		if($quantity > $this->maxQuantity) {
			$quantity = $this->maxQuantity;
		}
		if($quantity == 0) {
			$this->remove($id);
			return;
		}

		$product = $this->controller->Product->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Product.id' => $id
			)
		));
		if(empty($product)) {
			return false;
		}
		$data['price'] = $product['Product']['price'];
		$data['weight'] = $product['Product']['weight'];
		$data['quantity'] = $quantity;
		$data['subtotal'] = sprintf('%01.2f', $product['Product']['price'] * $quantity);
		$data['totalweight'] = sprintf('%01.2f', $product['Product']['weight'] * $quantity);

		$data['Product'] = $product['Product'];
		$this->Session->write('Shop.Cart.OrderItem.' . $id, $data);

		$this->cart();

		return $product;
	}

//////////////////////////////////////////////////

	public function remove($id) {
		if($this->Session->check('Shop.Cart.OrderItem.' . $id)) {
			$product = $this->Session->read('Shop.Cart.OrderItem.' . $id);
			$this->Session->delete('Shop.Cart.OrderItem.' . $id);
			$this->cart();
			return $product;
		}
		return false;
	}

//////////////////////////////////////////////////

	public function cart() {
		$cart = $this->Session->read('Shop.Cart');
		$cartTotal = 0;
		$cartQuantity = 0;
		$cartWeight = 0;

		if (count($cart['OrderItem']) > 0) {
			foreach ($cart['OrderItem'] as $item) {
				$cartTotal += $item['subtotal'];
				$cartQuantity += $item['quantity'];
				$cartWeight += $item['totalweight'];
			}
			$d['cartTotal'] = sprintf('%01.2f', $cartTotal);
			$d['cartQuantity'] = $cartQuantity;
			$d['cartWeight'] = $cartWeight;
			$this->Session->write('Shop.Cart.Property', $d);
			return true;
		}
		else {
			$d['cartTotal'] = 0;
			$d['cartQuantity'] = 0;
			$d['cartWeight'] = 0;
			$this->Session->write('Shop.Cart.Property', $d);
			return false;
		}
	}

//////////////////////////////////////////////////

}
