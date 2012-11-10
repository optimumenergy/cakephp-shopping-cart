<h2>Admin Edit Product</h2>

<br />

<?php echo $this->Form->create('Product'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('description'); ?>
<?php echo $this->Form->input('image'); ?>
<?php echo $this->Form->input('price'); ?>
<?php echo $this->Form->input('weight'); ?>
<?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Product.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?>

<br />
<br />

