
<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/settings/">Settings</a>
			<small>Add</small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-warning flat">
			<div class="box-header">
				<h3 class="box-title">Settings</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row row-center">
					<div class="col-xs-10 col-center">
						<?php echo $this->Form->create('Setting', array('id' => 'Setting','role' => 'form')); ?>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('onclick' => 'checkValidSetting()','class' => 'btn btn-flat btn-success','type'=>'button')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Categories/',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Name <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Link <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('link', array('class' => 'form-control', 'placeholder' => 'Link','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Root <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('root', array('class' => 'form-control', 'placeholder' => 'Link','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Image <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('image', array('class' => 'form-control', 'placeholder' => 'Image','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Tile link <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('title_link', array('class' => 'form-control', 'placeholder' => 'Title and link','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Description <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Step <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('step', array('class' => 'form-control', 'placeholder' => 'Step','label' => false,'type' => 'number'));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Page<i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('page_id', array('class' => 'form-control', 'placeholder' => 'Page Id','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Category<i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('category_id', array('class' => 'form-control', 'placeholder' => 'Category Id','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Hot<i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('hot', array('type' => 'checkbox','class' => 'form-control', 'placeholder' => 'Category Id','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>High lights<i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('high_lights', array('type' => 'checkbox','class' => 'form-control', 'placeholder' => 'High lights','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group text-right">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('onclick' => 'checkValidSetting()','class' => 'btn btn-flat btn-success','type'=>'button')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Categories/',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
		
	
