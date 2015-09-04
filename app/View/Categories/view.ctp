
<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Categories/"><small> Categories > </small></a>
			<small>View</small>
		</h1>
    </section>
    <section class="content">
		<div class="box box-solid box-info flat">
			<div class="box-header">
			   <h3 class="box-title">Category Detail</h3>					
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row row-center">
					<div class="col-xs-10 col-center">
						
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Id'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($category['Category']['id']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Name'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($category['Category']['name']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Name No Unicode'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($category['Category']['name_no_unicode']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Position'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($category['Category']['position']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Show'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($category['Category']['show']) ? '<span class="label label-success flat">Show</span>' : '<span class="label label-default text-white flat">Hidden</span>';?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Active'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($category['Category']['active']) ? '<span class="label label-success flat">Active</span>' : '<span class="label label-default text-white flat">Deactive</span>';?></div>
						</div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->	
	</section>
</aside>
