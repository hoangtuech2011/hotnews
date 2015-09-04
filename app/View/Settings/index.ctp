
<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Settings/">Settings</a>
			<small><?php echo __('Settings'); ?></small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-primary flat">
			<div class="box-header">
				<h3 class="box-title">Settings Management</h3>
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
								<th width="120px" class="actions">Actions</th>	
								<th width="30px"><?php echo $this->Paginator->sort('id'); ?></th>
								<th><?php echo $this->Paginator->sort('name'); ?></th>
								<th><?php echo $this->Paginator->sort('link'); ?></th>
								<th><?php echo $this->Paginator->sort('page_id'); ?></th>
								<th><?php echo $this->Paginator->sort('category_id'); ?></th>
								<th><?php echo $this->Paginator->sort('active'); ?></th>
								<th><?php echo $this->Paginator->sort('hot'); ?></th>
								<th>Test link</th>
							</tr>
					</thead>
							<tbody>
								<?php foreach ($settings as $setting): ?>
									<tr>
										<td class="actions">
											<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $setting['Setting']['id']), array('escape' => false)); ?>
											<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $setting['Setting']['id']), array('escape' => false)); ?>
											<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $setting['Setting']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $setting['Setting']['id'])); ?>
											<?php echo $this->Html->link('<span class="fa fa-copy" data-toggle="tooltip" data-original-title="Duplicate"></span>', array('action' => 'copy', $setting['Setting']['id']), array('escape' => false)); ?>
										</td>
										<td><?php echo h($setting['Setting']['id']); ?>&nbsp;</td>
										<td><?php echo h($setting['Setting']['name']); ?></td>
										<td><?php echo h($setting['Setting']['link']); ?>&nbsp;</td>
										<td><?php echo $this->Html->link($setting['Page']['name'], array('controller' => 'pages', 'action' => 'view', $setting['Page']['id'])); ?></td>
										<td><?php echo $this->Html->link($setting['Category']['name'], array('controller' => 'categories', 'action' => 'view', $setting['Category']['id'])); ?></td>
										<td class="text-center"> <?php echo h($setting['Setting']['active']) ? '<span class="label label-success flat">Active</span>' : '<span class="label label-default text-white flat">Deactive</span>';?>
										<td><?php echo ($setting['Setting']['hot']) ? "Hot":""; ?>&nbsp;</td>
										<td><?php echo $this->Html->link('Test link', array('action' => 'getNews', $setting['Setting']['id']), array('escape' => false)); ?></td>
									</tr>
							<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</aside><!-- /.right-side -->

