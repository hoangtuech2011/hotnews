
<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Pages/"><small> Pages > </small></a>
			<small>View</small>
		</h1>
    </section>
    <section class="content">
		<div class="box box-solid box-info flat">
			<div class="box-header">
			   <h3 class="box-title">Page Detail</h3>					
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row row-center">
					<div class="col-xs-10 col-center">
						
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Id'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($page['Page']['id']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Name'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($page['Page']['name']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Logo'); ?></div>
							<div class="col-xs-9 right-box">
								<img src="<?php echo h($page['Page']['logo']); ?>" width="200px" height="200px" />
							</div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('User'); ?></div>
							<div class="col-xs-9 right-box"><?php echo $this->Html->link($page['User']['username'], array('controller' => 'users', 'action' => 'view', $page['User']['id'])); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Created'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($page['Page']['created']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Modifier'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($page['Page']['modified']); ?></div>
						</div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->	
	</section>
</aside>


