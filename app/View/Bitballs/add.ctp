<div class="bitballs form">
<?php echo $this->Form->create('Bitball'); ?>
	<fieldset>
		<legend><?php echo __('Add Bitball'); ?></legend>
	<?php
		echo $this->Form->input('ballcolor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bitballs'), array('action' => 'index')); ?></li>
	</ul>
</div>
