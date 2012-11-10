<h2>Orders</h2>

<table class="table table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('email');?></th>
		<th><?php echo $this->Paginator->sort('subtotal');?></th>
		<th><?php echo $this->Paginator->sort('tax');?></th>
		<th><?php echo $this->Paginator->sort('shipping');?></th>
		<th><?php echo $this->Paginator->sort('total');?></th>
		<th><?php echo $this->Paginator->sort('status');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php foreach ($orders as $order): ?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?></td>
		<td><?php echo h($order['Order']['name']); ?></td>
		<td><?php echo h($order['Order']['email']); ?></td>
		<td><?php echo h($order['Order']['subtotal']); ?></td>
		<td><?php echo h($order['Order']['tax']); ?></td>
		<td><?php echo h($order['Order']['shipping']); ?></td>
		<td><?php echo h($order['Order']['total']); ?></td>
		<td><?php echo h($order['Order']['status']); ?></td>
		<td><?php echo h($order['Order']['created']); ?></td>
		<td><?php echo h($order['Order']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $order['Order']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<p><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></p>

<div class="paging">
<?php echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled')); ?>
<?php echo $this->Paginator->numbers(array('separator' => '')); ?>
<?php echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); ?>
</div>

<br />
<br />

