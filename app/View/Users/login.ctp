<?php echo $this->Session->flash('auth'); ?>

<div class="Users form">
	<div class="row">
		<div class="col-md-12">
				<h2><?php echo __(''); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6">
			<?php echo $this->Form->create('User', array('id' => 'UserForm', 'class' => 'form-horizontal' , 'novalidate' => true, 'User' => 'form')); ?>
				
				<div class="form-group">
					<?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => 'Username'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => 'Password'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Access'), 
								array('id' => 'UserSubmit', 'class' => 'btn btn-default', 'label' => false, 'div' => false)); ?>
				</div>
			<?php echo $this->Form->end() ?>
		</div>
	</div>
</div>
