	
<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/categories/">News</a>
			<small>Add</small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-warning flat">
			<div class="box-header">
				<h3 class="box-title">Categories</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row row-center">
					<div class="col-xs-10 col-center">
						<?php echo $this->Form->create('News', array('role' => 'form')); ?>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('class' => 'btn btn-flat btn-success','type'=>'button','onclick'=>'javascript:checkValidAddList();')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/News/index',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
							
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Title <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Title no unicode <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('title_no_unicode', array('class' => 'form-control', 'placeholder' => 'Title No Unicode','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Image <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('url_image', array('class' => 'form-control', 'placeholder' => 'Url Image','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
									<div class="col-xs-3 text-light-blue text-bold text-right"><label>Page <i class="fa fa-asterisk fa-lg"></i></label></div>
									<div class="col-xs-9 text-left"><?php echo $this->Form->input('page_id', array('class' => 'form-control', 'placeholder' => 'Page Id','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Type <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('type_id', array('class' => 'form-control', 'placeholder' => 'Type Id','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Categories <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('category_id', array('class' => 'form-control', 'placeholder' => 'Category Id','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>View <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('views', array('class' => 'form-control', 'placeholder' => 'Views','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Hot <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('hot', array('class' => 'form-control', 'placeholder' => 'Hot','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Show <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('show', array('class' => 'form-control', 'placeholder' => 'Show','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('class' => 'btn btn-flat btn-success','type'=>'button')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/News/',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
	