
		<aside class="right-side">
				<section class="content-header">
                    <h1>
                        Home
                        <small><?php echo __('Types'); ?></small>
                    </h1>
                </section>
                <section class="content">
				<div class="box">
                     <div class="box-header">
                         <h3 class="box-title">Users Management</h3>
                             </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
																								<th><?php echo $this->Paginator->sort('name'); ?></th>
																								<th><?php echo $this->Paginator->sort('name_no_unicode'); ?></th>
																								<th><?php echo $this->Paginator->sort('position'); ?></th>
																								<th><?php echo $this->Paginator->sort('show'); ?></th>
																								<th><?php echo $this->Paginator->sort('category_id'); ?></th>
																								<th class="actions">Actions</th>
											</tr>
										</thead>
		<tbody>
				<?php foreach ($types as $type): ?>
					<tr>
						<td><?php echo h($type['Type']['name']); ?>&nbsp;</td>
						<td><?php echo h($type['Type']['name_no_unicode']); ?>&nbsp;</td>
						<td><?php echo h($type['Type']['position']); ?>&nbsp;</td>
						<td><?php echo h($type['Type']['show']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($type['Category']['name'], array('controller' => 'categories', 'action' => 'view', $type['Category']['id'])); ?>
		</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $type['Type']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $type['Type']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $type['Type']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $type['Type']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
		</tbody>
	</section>
</aside><!-- /.right-side -->