
<aside class="right-side">
	<section class="content-header">
        <h1>Home<small>Control panel</small></h1>
    </section>
    <section class="content">
    	<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($type['Type']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name No Unicode'); ?></th>
		<td>
			<?php echo h($type['Type']['name_no_unicode']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Position'); ?></th>
		<td>
			<?php echo h($type['Type']['position']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Show'); ?></th>
		<td>
			<?php echo h($type['Type']['show']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($type['Category']['name'], array('controller' => 'categories', 'action' => 'view', $type['Category']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>	
	</section>
</aside>

