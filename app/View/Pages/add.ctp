<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/categories/">Pages</a>
			<small>Add</small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-warning flat">
			<div class="box-header">
				<h3 class="box-title">Pages</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="row row-center">
					<div class="col-xs-10 col-center">
						<?php echo $this->Form->create('Page', array('id' => 'Page','role' => 'form')); ?>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('onclick' => 'checkValidPage()','class' => 'btn btn-flat btn-success','type'=>'button')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Pages/index',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
							
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Name <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('name', array('label' => false,'class' => 'form-control', 'placeholder' => 'Name'));?></div>
								<?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.id'))) ?>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Logo <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('logo', array('label' => false,'class' => 'form-control', 'placeholder' => 'Logo'));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Link <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('link', array('label' => false,'class' => 'form-control', 'placeholder' => 'Link'));?></div>
							</div>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('onclick' => 'checkValidPage()','class' => 'btn btn-flat btn-success','type'=>'button')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Pages/',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
	
