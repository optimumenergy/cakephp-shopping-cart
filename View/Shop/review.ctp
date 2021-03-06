<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<h1>Order Review</h1>

<hr>

<div class="row">
<div class="span4">

Name: <?php echo $shop['Order']['name'];?><br />
Email: <?php echo $shop['Order']['email'];?><br />
Phone: <?php echo $shop['Order']['phone'];?><br />

<br />

</div>
<div class="span4">

Billing Address: <?php echo $shop['Order']['billing_address'];?><br />
Billing Address 2: <?php echo $shop['Order']['billing_address2'];?><br />
Billing City: <?php echo $shop['Order']['billing_city'];?><br />
Billing State: <?php echo $shop['Order']['billing_state'];?><br />
Billing Country: <?php echo $shop['Order']['billing_country'];?><br />

<br />

</div>
<div class="span4">

Shipping Address: <?php echo $shop['Order']['shipping_address'];?><br />
Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?><br />
Shipping City: <?php echo $shop['Order']['shipping_city'];?><br />
Shipping State: <?php echo $shop['Order']['shipping_state'];?><br />
Shipping Country: <?php echo $shop['Order']['shipping_country'];?><br />

<br />

</div>
</div>

<hr>

<div class="row">
<div class="span1">#</div>
<div class="span6">ITEM</div>
<div class="span1">WEIGHT</div>
<div class="span1">WEIGHT</div>
<div class="span1">PRICE</div>
<div class="span1" style="text-align: right;">QUANTITY</div>
<div class="span1" style="text-align: right;">SUBTOTAL</div>
</div>

<br />
<br />

<?php foreach ($shop['OrderItem'] as $item): ?>
<div class="row">
<div class="span1"><?php echo $this->Html->image('/images/' . $item['Product']['image'], array('height' => 60, 'class' => 'px60')); ?></div>
<div class="span6"><?php echo $item['Product']['name']; ?></div>
<div class="span1"><?php echo $item['Product']['weight']; ?></div>
<div class="span1"><?php echo $item['totalweight']; ?></div>
<div class="span1">$<?php echo $item['Product']['price']; ?></div>
<div class="span1" style="text-align: right;"><?php echo $item['quantity']; ?></div>
<div class="span1" style="text-align: right;">$<?php echo $item['subtotal']; ?></div>
</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="span10">Products: <?php echo $shop['Order']['order_item_count']; ?></div>
	<div class="span1" style="text-align: right;">Items: <?php echo $shop['Order']['quantity']; ?></div>
	<div class="span1" style="text-align: right;">Total<br /><strong>$<?php echo $shop['Order']['total']; ?></strong></div>
</div>

<hr>

<?php echo $this->Form->create('Order'); ?>

<?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Submit Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?>

<?php echo $this->Form->end(); ?>

<br />
<br />

