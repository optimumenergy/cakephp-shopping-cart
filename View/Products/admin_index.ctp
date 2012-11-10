<h2>Products</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('price'); ?></th>
		<th><?php echo $this->Paginator->sort('weight'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo $this->Html->Image('/images/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['name'], 'class' => 'image')); ?></td>
		<td><?php echo h($product['Product']['name']); ?></td>
		<td><?php echo h($product['Product']['slug']); ?></td>
		<td><?php echo h($product['Product']['description']); ?></td>
		<td><?php echo h($product['Product']['image']); ?></td>
		<td><?php echo h($product['Product']['price']); ?></td>
		<td><?php echo h($product['Product']['weight']); ?></td>
		<td><?php echo h($product['Product']['active']); ?></td>
		<td><?php echo h($product['Product']['created']); ?></td>
		<td><?php echo h($product['Product']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<p><?php echo $this->Paginator->counter(array( 'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></p>

<div class="paging">
<?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?>
<?php echo $this->Paginator->numbers(array('separator' => '')); ?>
<?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); ?>
</div>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link(__('New Product'), array('action' => 'add'), array('class' => 'btn btn-mini')); ?>

<br />
<br />
