



<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Settings/"><small> Settings > </small></a>
			<small>View</small>
		</h1>
    </section>
    <section class="content">
		<div class="box box-solid box-info flat">
			<div class="box-header">
			   <h3 class="box-title">Setting Detail</h3>					
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row row-center">
					<div class="col-xs-10 col-center">
						
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Id'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($setting['Setting']['id']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Name'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($setting['Setting']['name']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Link'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($setting['Setting']['link']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Page'); ?></div>
							<div class="col-xs-9 right-box"><?php echo $this->Html->link($setting['Page']['name'], array('controller' => 'pages', 'action' => 'view', $setting['Page']['id'])); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Category'); ?></div>
							<div class="col-xs-9 right-box"><?php echo $this->Html->link($setting['Category']['name'], array('controller' => 'categories', 'action' => 'view', $setting['Category']['id'])); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Created'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($setting['Setting']['created']); ?></div>
						</div>
						<div class="col-xs-12 form-group">
							<div class="col-xs-3 left-box"><?php echo __('Modified'); ?></div>
							<div class="col-xs-9 right-box"><?php echo h($setting['Setting']['modified']); ?></div>
						</div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->	
	</section>
</aside>




