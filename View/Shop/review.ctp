<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<h1>Order Review</h1>

<hr>

<div class="row">
<div class="span4">

Name: <?php echo $shop['Data']['name'];?><br />
Email: <?php echo $shop['Data']['email'];?><br />
Phone: <?php echo $shop['Data']['phone'];?><br />

<br />

</div>
<div class="span4">

Billing Address: <?php echo $shop['Data']['billing_address'];?><br />
Billing Address 2: <?php echo $shop['Data']['billing_address2'];?><br />
Billing City: <?php echo $shop['Data']['billing_city'];?><br />
Billing State: <?php echo $shop['Data']['billing_state'];?><br />

<br />

</div>
<div class="span4">

Shipping Address: <?php echo $shop['Data']['shipping_address'];?><br />
Shipping Address 2: <?php echo $shop['Data']['shipping_address2'];?><br />
Shipping City: <?php echo $shop['Data']['shipping_city'];?><br />
Shipping State: <?php echo $shop['Data']['shipping_state'];?><br />

<br />

</div>
</div>

<hr>

<div class="row">
<div class="span1">#</div>
<div class="span8">ITEM</div>
<div class="span1">PRICE</div>
<div class="span1">QUANTITY</div>
<div class="span1">SUBTOTAL</div>
</div>

<br />
<br />

<?php foreach ($shop['Cart']['Items'] as $item): ?>
<div class="row">
<div class="span1"><?php echo $this->Html->image('/images/' . $item['Product']['image'], array('height' => 60, 'class' => 'px60')); ?></div>
<div class="span8"><?php echo $item['Product']['name']; ?></div>
<div class="span1">$<?php echo $item['Product']['price']; ?></div>
<div class="span1"><?php echo $item['quantity']; ?></div>
<div class="span1">$<?php echo $item['subtotal']; ?></div>
</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="span2 offset8">Items: <?php echo $shop['Cart']['Property']['cartQuantity']; ?></div>
	<div class="span2">Order Total: <span class="bold red">$<?php echo $shop['Cart']['Property']['cartTotal']; ?></span></div>
</div>

<hr>

<?php echo $this->Form->create('Order'); ?>

<?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Submit Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?>

<?php echo $this->Form->end(); ?>

<br />
<br />

