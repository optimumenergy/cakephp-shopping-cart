<h2>Product</h2>

<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($product['Product']['id']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Name'); ?></dt>
	<dd>
		<?php echo h($product['Product']['name']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Slug'); ?></dt>
	<dd>
		<?php echo h($product['Product']['slug']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Description'); ?></dt>
	<dd>
		<?php echo h($product['Product']['description']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Image'); ?></dt>
	<dd>
		<?php echo h($product['Product']['image']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Price'); ?></dt>
	<dd>
		<?php echo h($product['Product']['price']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Weight'); ?></dt>
	<dd>
		<?php echo h($product['Product']['weight']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Active'); ?></dt>
	<dd>
		<?php echo h($product['Product']['active']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Created'); ?></dt>
	<dd>
		<?php echo h($product['Product']['created']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Modified'); ?></dt>
	<dd>
		<?php echo h($product['Product']['modified']); ?>
		&nbsp;
	</dd>
</dl>

<?php echo $this->Html->Image('/images/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['name'], 'class' => 'image')); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>

<br />
<br />

