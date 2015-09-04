<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Users/">Users</a>
			<small><?php echo __('Users'); ?></small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-primary flat">
			<div class="box-header">
				<h3 class="box-title">Users Management</h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">
				<div class="form-group col-xs-12 no-padding text-right">
					<?php
						echo $this->Html->link('<span class="fa fa-plus"></span> Add new', '/Settings/add',array('class' => 'btn btn-flat btn-info', 'escape'=>false));
					?>
				</div>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
                                             <tr>
													<th class="actions">Actions</th>	
													<th><?php echo $this->Paginator->sort('username'); ?></th>
													<th><?php echo $this->Paginator->sort('fullname'); ?></th>
													<th><?php echo $this->Paginator->sort('phone'); ?></th>
													<th><?php echo $this->Paginator->sort('email'); ?></th>
													<th><?php echo $this->Paginator->sort('active'); ?></th>
													<th><?php echo $this->Paginator->sort('created'); ?></th>
													<th><?php echo $this->Paginator->sort('modified'); ?></th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($users as $user): ?>
											<tr>
													<td class="actions">
														<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
														<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
														<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
													</td>
													<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
													<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
													<td><?php echo h($user['User']['fullname']); ?>&nbsp;</td>
													<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
													<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
													<td><?php echo h($user['User']['active']) ? '<span class="label label-success flat">Active</span>' : '<span class="label label-default text-white flat">Deactive</span>';?></td>
													<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
													<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
											</tr>
										<?php endforeach; ?>
						</tbody>
				</table>
			</div>
		</div>
	</section>
</aside><!-- /.right-side -->

	
	