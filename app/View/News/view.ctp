
<aside class="right-side">
	<section class="content-header">
        <h1>Home<small>Control panel</small></h1>
    </section>
    <section class="content">
    	<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($news['News']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Title No Unicode'); ?></th>
		<td>
			<?php echo h($news['News']['title_no_unicode']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Url Image'); ?></th>
		<td>
			<?php echo h($news['News']['url_image']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($news['News']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Page'); ?></th>
		<td>
			<?php echo $this->Html->link($news['Page']['name'], array('controller' => 'pages', 'action' => 'view', $news['Page']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo $this->Html->link($news['Type']['name'], array('controller' => 'types', 'action' => 'view', $news['Type']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($news['Category']['name'], array('controller' => 'categories', 'action' => 'view', $news['Category']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Views'); ?></th>
		<td>
			<?php echo h($news['News']['views']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Hot'); ?></th>
		<td>
			<?php echo h($news['News']['hot']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Show'); ?></th>
		<td>
			<?php echo h($news['News']['show']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>	
	</section>
</aside>

