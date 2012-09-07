<?php echo $this->Html->script('flash.js', array('inline' => true)); ?>
<div class="alert alert-success" id="flash_msg">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?php echo $message; ?>
</div>
