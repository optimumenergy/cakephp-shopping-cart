Shop Order:

Name: <?php echo $shop['Order']['name'];?>

Email: <?php echo $shop['Order']['email'];?>

Phone: <?php echo $shop['Order']['phone'];?>


Billing Address: <?php echo $shop['Order']['billing_address'];?>

Billing Address 2: <?php echo $shop['Order']['billing_address2'];?>

Billing City: <?php echo $shop['Order']['billing_city'];?>

Billing State: <?php echo $shop['Order']['billing_state'];?>

Billing Country: <?php echo $shop['Order']['billing_country'];?>


Shipping Address: <?php echo $shop['Order']['shipping_address'];?>

Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?>

Shipping City: <?php echo $shop['Order']['shipping_city'];?>

Shipping State: <?php echo $shop['Order']['shipping_state'];?>

Shipping Country: <?php echo $shop['Order']['shipping_country'];?>



Description			Item Price			Quantity			Extended Price
<?php foreach ($shop['Items'] as $item): ?>
<?php echo $item['Product']['name']; ?>			$<?php echo $item['Product']['price']; ?>			<?php echo $item['quantity']; ?>			$<?php echo $item['subtotal']; ?>

<?php endforeach; ?>

Items:	<?php echo $shop['Property']['cartQuantity'];?>

Total:	$<?php echo $shop['Property']['cartTotal'];?>


////////////////////////////////////////////////////////////

<?php print_r($shop); ?>

////////////////////////////////////////////////////////////

