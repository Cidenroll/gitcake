<div class="bitballs form">
<?php echo $this->Form->create('Bitball'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bitball'); ?></legend>
	<?php
		echo $this->Form->input('ballid');
		echo $this->Form->input('ballcolor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bitball.ballid')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Bitball.ballid')))); ?></li>
		<li><?php echo $this->Html->link(__('List Bitballs'), array('action' => 'index')); ?></li>
	</ul>
</div>
