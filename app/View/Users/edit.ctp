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
						<?php echo $this->Form->create('User', array('id' => 'User','role' => 'form')); ?>
							<div class="col-xs-12 form-group text-right" style="padding-right:30px">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('class' => 'btn btn-flat btn-success','type'=>'button','onclick'=>'javascript:checkValidUser();')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/Users/index',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
								<?php echo $this->Html->input('id', array('type' => 'hidden', 'value' => $this->request->data['User']['id'])) ?>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Name <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name','label' => false));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Full name <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('fullname', array('class' => 'form-control', 'placeholder' => 'Fullname'));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>User name <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username'));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Pass word <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Pass word <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'Phone'));?></div>
							</div>
							<div class="col-xs-12 form-group">
								<div class="col-xs-3 text-light-blue text-bold text-right"><label>Email <i class="fa fa-asterisk fa-lg"></i></label></div>
								<div class="col-xs-9 text-left"><?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?></div>
							</div>
							<div class="col-xs-12 form-group text-right">
								<?php echo $this->Form->button('<span class="fa fa-check"></span> Submit', array('class' => 'btn btn-flat btn-success','type'=>'button','onclick'=>'javascript:checkValidUser();')); ?>
								<?php echo $this->Html->link('<span class="fa fa-times"></span> Cancel','/users/',array('class' => 'btn btn-flat btn-danger','style' => 'margin-left:5px', 'escape'=>false)); ?>
							</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
		
	
		