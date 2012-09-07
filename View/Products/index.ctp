<?php echo $this->set('title_for_layout', 'Online Shop'); ?>


<h1>Online Shop</h1>

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
<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary', 'escape' => false));?>
<?php echo $this->Form->end();?>
<br />
<br />
</div>
<?php
if (($i % 4) == 0) { echo "\n</div>\n\n";}
endforeach;
?>

<br />
<br />

</div>

<div class="row">
	<div class="span12">
		<?php echo $this->Paginator->counter(array('format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')); ?>
		<br />
		<?php echo $this->Paginator->prev('< previous', array(), null, array('class' => 'prev disabled')); ?>&nbsp;
		<?php echo $this->Paginator->numbers(array('separator' => ' | ')); ?>&nbsp;
		<?php echo $this->Paginator->next('next >', array(), null, array('class' => 'next disabled')); ?>&nbsp;
	</div>
</div>
