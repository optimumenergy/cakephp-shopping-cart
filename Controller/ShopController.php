<?php
App::uses('AppController', 'Controller');
class ShopController extends AppController {

//////////////////////////////////////////////////

	public $components = array('Cart', 'Paypal');

//////////////////////////////////////////////////

	public $uses = 'Product';

//////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->disableCache();
		//$this->Security->validatePost = false;
	}

//////////////////////////////////////////////////

	public function clear() {
		$this->Session->delete('Shop');
		$this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
		$this->redirect('/');
	}

//////////////////////////////////////////////////

	public function add() {
		if ($this->request->is('post')) {
			$id = $this->request->data['Product']['id'];
			$product = $this->Cart->add($id, 1);
		}
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was added to your shopping cart.', 'flash_success');
		}
		$this->redirect($this->referer());
	}

//////////////////////////////////////////////////

	public function itemupdate() {
		if ($this->request->is('ajax')) {
			$this->Cart->add($this->request->data['id'], $this->request->data['quantity']);
		}
		$cart = $this->Session->read('Shop');
		echo json_encode($cart);
		$this->autoRender = false;
	}

//////////////////////////////////////////////////

	public function update() {
		$this->Cart->update($this->request->data['Product']['id'], 1);
	}

//////////////////////////////////////////////////

	public function remove($id = null) {
		$product = $this->Cart->remove($id);
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was removed from your shopping cart', 'flash_error');
		}
		$this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cartupdate() {
		if ($this->request->is('post')) {
			foreach($this->request->data['Product'] as $key => $value) {
				$p = explode('-', $key);
				$this->Cart->add($p[1], $value);
			}
			$this->Session->setFlash('Shooping Cart is updated.', 'flash_success');
		}
		$this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cart() {
		$this->helpers[] = 'Google';
		$shop = $this->Session->read('Shop');
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

	public function address() {

		$shop = $this->Session->read('Shop');
		if(!$shop['Order']['total']) {
			$this->redirect('/');
		}

		if ($this->request->is('post')) {
			$this->loadModel('Order');
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				$order = $this->request->data['Order'];
				$order['order_type'] = 'creditcard';
				$this->Session->write('Shop.Order', $order + $shop['Order']);
				$this->redirect(array('action' => 'review'));
			} else {
				$this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error');
			}
		}
		if(!empty($shop['Order'])) {
			$this->request->data['Order'] = $shop['Order'];
		}

	}

//////////////////////////////////////////////////

	public function step1() {
		$paymentAmount = $this->Session->read('Shop.Order.total');
		if(!$paymentAmount) {
			$this->redirect('/');
		}
		$this->Paypal->step1($paymentAmount);
	}

//////////////////////////////////////////////////

	public function step2() {

		$token = $this->request->query['token'];
		$paypal = $this->Paypal->GetShippingDetails($token);

		$ack = strtoupper($paypal["ACK"]);
		if($ack == "SUCCESS" || $ack == "SUCESSWITHWARNING") {
			$this->Session->write('Shop.Paypal.Details', $paypal);
			$this->redirect(array('action' => 'review'));
		} else {
			$ErrorCode = urldecode($paypal["L_ERRORCODE0"]);
			$ErrorShortMsg = urldecode($paypal["L_SHORTMESSAGE0"]);
			$ErrorLongMsg = urldecode($paypal["L_LONGMESSAGE0"]);
			$ErrorSeverityCode = urldecode($paypal["L_SEVERITYCODE0"]);
			echo "GetExpressCheckoutDetails API call failed. ";
			echo "Detailed Error Message: " . $ErrorLongMsg;
			echo "Short Error Message: " . $ErrorShortMsg;
			echo "Error Code: " . $ErrorCode;
			echo "Error Severity Code: " . $ErrorSeverityCode;
			die();
		}

	}

//////////////////////////////////////////////////

	public function review() {

		$shop = $this->Session->read('Shop');

		if(empty($shop)) {
			$this->redirect('/');
		}

		if ($this->request->is('post')) {

			$this->loadModel('Order');

			$order = $shop;
			$order['Order']['status'] = 1;

			if($shop['Order']['order_type'] == 'paypal') {
				$resArray = $this->Paypal->ConfirmPayment($o['Order']['total']);
				// debug($resArray);
				$ack = strtoupper($resArray['ACK']);
				if($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
					$order['Order']['status'] = 2;
				}
			}
			$save = $this->Order->saveAll($order, array('validate' => 'first'));
			if($save) {

				$this->set(compact('shop'));

				App::uses('CakeEmail', 'Network/Email');
				$email = new CakeEmail();
				$email->from(ADMIN_EMAIL)
						->cc(ADMIN_EMAIL)
						->to($shop['Order']['email'])
						->subject('Shop Order')
						->template('order')
						->emailFormat('text')
						->viewVars(array('shop' => $shop))
						->send();
				$this->redirect(array('action' => 'success'));
			}
		}

		if(empty($shop['Order']) && !empty($shop['Paypal']['Details'])) {
			$shop['Order']['name'] = $shop['Paypal']['Details']['FIRSTNAME'] . ' ' . $shop['Paypal']['Details']['LASTNAME'];
			$shop['Order']['email'] = $shop['Paypal']['Details']['EMAIL'];
			$shop['Order']['phone'] = '';
			$shop['Order']['billing_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
			$shop['Order']['billing_address2'] = '';
			$shop['Order']['billing_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
			$shop['Order']['billing_zipcode'] = $shop['Paypal']['Details']['SHIPTOZIP'];
			$shop['Order']['billing_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];

			$shop['Order']['shipping_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
			$shop['Order']['shipping_address2'] = '';
			$shop['Order']['shipping_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
			$shop['Order']['shipping_zipcode'] = $shop['Paypal']['Details']['SHIPTOZIP'];
			$shop['Order']['shipping_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];

			$shop['Order']['order_type'] = 'paypal';

			$this->Session->write('Shop.Order', $shop['Order']);
		}

		$this->set(compact('shop'));

	}

//////////////////////////////////////////////////

	public function success() {
		$shop = $this->Session->read('Shop');
		$this->Session->delete('Shop');
		if(empty($shop)) {
			$this->redirect('/');
		}
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

}
