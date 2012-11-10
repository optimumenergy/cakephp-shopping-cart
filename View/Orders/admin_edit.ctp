<h2>Admin Edit Order</h2>

<br />

<?php echo $this->Form->create('Order');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('subtotal'); ?>
<?php echo $this->Form->input('tax'); ?>
<?php echo $this->Form->input('shipping'); ?>
<?php echo $this->Form->input('total'); ?>
<?php echo $this->Form->input('status'); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn'));?>
<?php echo $this->Form->end();?>

