<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/categories/">Categories</a>
			<small>Edit</small>
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
						<?php echo $this->Form->create('Category', array('id' => 'Category','role' => 'form')); ?>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('class' => 'btn btn-flat btn-success','type'=>'button','onclick'=>'javascript:checkValidCategory();')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Categories/index',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
								<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' =>  $this->request->data['Category']['id'])) ?>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Name <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Parent <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('parent_id', array('class' => 'form-control', 'type' => 'select','options' => $categories,'empty' => array(''=> 'Not parent'),'label' => false));?></div>
							</div>
							<div class="form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Show <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left" style="padding-left: 20px"><?php echo $this->Form->input('show', array('type' => 'checkbox', 'class' => 'form-control','label' => false)) ?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Location<i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('location', array('type' => 'select','class' => 'form-control', 'placeholder' => 'Location','label' => false,'options' => $location));?></div>
							</div>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('class' => 'btn btn-flat btn-success','type'=>'button','onclick'=>'javascript:checkValidCategory();')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Categories/',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
