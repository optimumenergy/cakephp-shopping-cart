<?php echo $this->set('title_for_layout', $product['Product']['name']); ?>

<div class="grid_24">

<h1><?php echo $product['Product']['name']; ?></h1>

<?php echo $this->Html->Image('/images/' . $product['Product']['image'], array('width' => 150, 'height' => 150, 'alt' => $product['Product']['name'], 'class' => 'image')); ?>

<br />

$ <?php echo $product['Product']['price']; ?>

<br />
<br />

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary', 'escape' => false));?>
<?php echo $this->Form->end(); ?>

<br />

<?php echo $product['Product']['description']; ?>

<br />
<br />
<br />

</div>
<div class="clear"></div>
