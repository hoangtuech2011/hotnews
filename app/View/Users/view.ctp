


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
							<div class="col-xs-9 right-box"><?php echo h($user['User']['id']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('User name'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($user['User']['username']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Fullname'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($user['User']['fullname']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Phone'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($user['User']['phone']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Email'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($user['User']['email']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Active'); ?></div>
							<div class="col-xs-9 right-box"><div class="col-xs-9 right-box"><?php echo h($user['User']['active']) ? '<span class="label label-success flat">Active</span>' : '<span class="label label-default text-white flat">Deactive</span>';?></div></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Created'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($user['User']['created']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Modifier'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($user['User']['modified']); ?></div>
						</div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->	
	</section>
</aside>



