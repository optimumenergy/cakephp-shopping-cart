<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>


<h1>Shopping Cart</h1>

<?php if(empty($items)) : ?>

Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>

<hr>

<div class="row">
	<div class="span1">#</div>
	<div class="span7">ITEM</div>
	<div class="span1">PRICE</div>
	<div class="span1">QUANTITY</div>
	<div class="span1">SUBTOTAL</div>
	<div class="span1">REMOVE</div>
</div>

<?php foreach ($items as $item): ?>
	<div class="row">
		<div class="span1"><?php echo $this->Html->image('/images/' . $item['Product']['image'], array('class' => 'px60')); ?></div>
		<div class="span7"><strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $item['Product']['slug'])); ?></strong></div>
		<div class="span1">$<?php echo $item['Product']['price']; ?></div>
		<div class="span1"><?php echo $this->Form->input('quantity-' . $item['Product']['id'], array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'value' => $item['quantity'])); ?></div>
		<div class="span1">$<?php echo $item['subtotal']; ?></div>
		<div class="span1"><span class="remove" id="<?php echo $item['Product']['id']; ?>"></span></div>
	</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="span2 offset8">
		<?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'btn', 'escape' => false)); ?>
	</div>
	<div class="span2">
		<?php echo $this->Form->button('<i class="icon-refresh icon"></i> Recalculate', array('class' => 'btn', 'escape' => false));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<hr>

<div class="row">
	<div class="span2 offset10">
		Subtotal: <span class="normal">$<?php echo $cartTotal; ?></span>
		<br />
		<br />
		Sales Tax: <span class="normal">N/A</span>
		<br />
		<br />
		Shipping: <span class="normal">N/A</span>
		<br />
		<br />
		Order Total: <span class="red">$<?php echo $cartTotal; ?></span>
		<br />
		<br />

		<?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Checkout', array('controller' => 'shop', 'action' => 'address'), array('class' => 'btn btn-primary', 'escape' => false)); ?>

		<br />
		<br />

		<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
		<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" />
		<?php echo $this->Form->end(); ?>

		<form method="POST" action="https://sandbox.google.com/checkout/api/checkout/v2/checkout/Merchant/729483054915369" accept-charset="utf-8">
		<input type="hidden" name="cart" value="<?php echo $this->Google->cart($items); ?>">
		<input type="hidden" name="signature" value="<?php echo $this->Google->signature($items); ?>">
		<input type="image" name="Google Checkout" alt="Fast checkout through Google" src="http://checkout.google.com/buttons/checkout.gif?merchant_id=729483054915369&w=160&h=43&style=white&variant=text&loc=en_US" height="43" width="160"/>
		</form>
	</div>
</div>

<br />
<br />

<?php endif; ?>
