<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Pages/">Home</a>
			<small><?php echo __('Pages'); ?></small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-primary flat">
			<div class="box-header">
				<h3 class="box-title">Pages Management</h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">
				<div class="form-group col-xs-12 no-padding text-right">
					<?php
						echo $this->Html->link('<span class="fa fa-plus"></span> Add new', '/Pages/add',array('class' => 'btn btn-flat btn-info', 'escape'=>false));
					?>
				</div>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Action</th>
							<th style="min-width: 100px" class="actions text-light-blue text-center"><span>Name</span></th>
							<th style="min-width: 120px" class="text-light-blue text-center"><span>Logo</span></th>
							<th style="min-width: 120px" class="text-light-blue text-center"><span>User</span></th>
							<th style="min-width: 120px" class="text-light-blue text-center"><span>Active</span></th>
							<th style="min-width: 100px" class="text-light-blue text-center"><span>Created</span></th>
							<th style="min-width: 150px" class="text-light-blue text-center"><span>Modified</span></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($pages as $page):?>
							<tr>
								<td class="actions">
									<?php echo $this->Html->link('<span class="fa fa-eye" data-toggle="tooltip" data-original-title="View"></span>', array('action' => 'view', $page['Page']['id']), array('escape' => false)); ?>
									<?php echo $this->Html->link('<span class="fa fa-edit" data-toggle="tooltip" data-original-title="Edit"></span>', array('action' => 'edit', $page['Page']['id']), array('escape' => false)); ?> 
									<?php echo $this->Form->postLink('<span class="fa fa-times" data-toggle="tooltip" data-original-title="InActive"></span>', array('action' => 'delete', $page['Page']['id']), array('escape' => false), __('Are you sure you want to inactive # %s?', $page['Page']['id']));?> 
								</td>
								<td><?php echo $page['Page']['name'];?></td>
								<td><?php echo ($page['Page']['logo']!="") ? $this->Html->image($page['Page']['logo'], array('alt' => 'Image of page'.$page['Page']['name'])) : ""; ?></td>
								<td><?php echo $this->Html->link($page['User']['username'],array('action' => 'view', 'controller' => 'users', $page['User']['id']),array('escape' => false));?></td>
								<td><?php echo h($page['Page']['active']) ? '<span class="label label-success flat">Active</span>' : '<span class="label label-default text-white flat">Deactive</span>';?>
								<td><?php echo $page['Page']['created'];?></td>
								<td><?php echo $page['Page']['modified'];?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</aside><!-- /.right-side -->
		