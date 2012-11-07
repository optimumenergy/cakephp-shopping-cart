<?php echo $this->Html->script('addtocart.js', array('inline' => false)); ?>

<?php if($ajax != 1): ?>
<h1>Search</h1>

<br />
<br />

<?php echo $this->Form->create('Product', array('type' => 'GET')); ?>

<div class="row">
<div class="span3">
<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'span3', 'autocomplete' => 'off', 'value' => $search)); ?>
</div>
<div class="span2">
<?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-primary')); ?>
</div>
</div>

<?php echo $this->Form->end(); ?>

<br />

<?php endif; ?>

<?php // echo $this->Html->script('search.js', array('inline' => false)); ?>

<?php if(!empty($search)) : ?>
<?php if(!empty($products)) : ?>
<div class="row">
<?php
$i = 0;
foreach ($products as $product):
$i++;
if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
?>
<div class="span3">
<?php echo $this->Html->image('/images/' . $product['Product']['image'], array('url' => array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'width' => 150, 'height' => 150, 'class' => 'image')); ?>
<br />
<?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug'])); ?>
<br />
$<?php echo $product['Product']['price']; ?>
<br />
<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary addtocart', 'id' => $product['Product']['id'], 'escape' => false));?>
<?php echo $this->Form->end();?>
<br />
<br />
</div>
<?php
if (($i % 4) == 0) { echo "\n</div>\n\n";}
endforeach;
?>
</div>

<br />
<br />
<br />

<?php else: ?>

<h3>No Results</h3>

<?php endif; ?>
<?php endif; ?>

