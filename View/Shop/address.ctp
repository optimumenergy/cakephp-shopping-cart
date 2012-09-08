<?php echo $this->set('title_for_layout', 'Address'); ?>


<h1>Address</h1>

<?php echo $this->Form->create('Order'); ?>

<hr>

<div class="row">
<div class="span4">

<?php echo $this->Form->input('name', array('class' => 'span3')); ?>

<?php echo $this->Form->input('email', array('class' => 'span3')); ?>

<?php echo $this->Form->input('phone', array('class' => 'span3')); ?>

<br />

</div>
<div class="span4">

<?php echo $this->Form->input('billing_address', array('class' => 'span3')); ?>

<?php echo $this->Form->input('billing_address2', array('class' => 'span3')); ?>

<?php echo $this->Form->input('billing_city', array('class' => 'span3')); ?>

<?php echo $this->Form->input('billing_state', array('class' => 'span3')); ?>

<br />

</div>
<div class="span4">

<?php echo $this->Form->input('shipping_address', array('class' => 'span3')); ?>

<?php echo $this->Form->input('shipping_address2', array('class' => 'span3')); ?>

<?php echo $this->Form->input('shipping_city', array('class' => 'span3')); ?>

<?php echo $this->Form->input('shipping_state', array('class' => 'span3')); ?>

<br />

</div>
</div>

<br />

<?php echo $this->Form->button('<i class="icon-arrow-right icon-white"></i> Continue', array('class' => 'btn btn-primary', 'escape' => false));?>
<?php echo $this->Form->end(); ?>

