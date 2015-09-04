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
									<th class="actions">Actions</th>
									<th><?php echo $this->Paginator->sort('name'); ?></th>
									<th><?php echo $this->Paginator->sort('name_no_unicode'); ?></th>
									<th><?php echo $this->Paginator->sort('position'); ?></th>
									<th><?php echo $this->Paginator->sort('show'); ?></th>
									<th><?php echo $this->Paginator->sort('active'); ?></th>
								</tr>
						</thead>
						<tbody>
							<?php foreach ($categories as $category): ?>
								<tr>
									<td class="actions">
										<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $category['Category']['id']), array('escape' => false)); ?>
										<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
										<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
									</td>
									<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
									<td><?php echo h($category['Category']['name_no_unicode']); ?>&nbsp;</td>
									<td><?php echo h($category['Category']['position']); ?>&nbsp;</td>
									<td><?php echo h($category['Category']['show']) ? '<span class="label label-success flat">Show</span>' : '<span class="label label-default text-white flat">Hidden</span>';?>
									<td><?php echo h($category['Category']['active']) ? '<span class="label label-success flat">Active</span>' : '<span class="label label-default text-white flat">Deactive</span>';?>
								</tr>
							<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</aside><!-- /.right-side -->
		