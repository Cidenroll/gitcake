<div class="bitballs view">
<h2><?php echo __('Bitball'); ?></h2>
	<dl>
		<dt><?php echo __('Ballid'); ?></dt>
		<dd>
			<?php echo h($bitball['Bitball']['ballid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ballcolor'); ?></dt>
		<dd>
			<?php echo h($bitball['Bitball']['ballcolor']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bitball'), array('action' => 'edit', $bitball['Bitball']['ballid'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bitball'), array('action' => 'delete', $bitball['Bitball']['ballid']), array('confirm' => __('Are you sure you want to delete # %s?', $bitball['Bitball']['ballid']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Bitballs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bitball'), array('action' => 'add')); ?> </li>
	</ul>
</div>
