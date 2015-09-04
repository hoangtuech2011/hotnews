		<aside class="right-side">
				<section class="content-header">
                    <h1>
                        Home
                        <small>Control panel</small>
                    </h1>
                </section>
                <section class="content">

			<?php echo $this->Form->create('Type', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name_no_unicode', array('class' => 'form-control', 'placeholder' => 'Name No Unicode'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('position', array('class' => 'form-control', 'placeholder' => 'Position'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('show', array('class' => 'form-control', 'placeholder' => 'Show'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('category_id', array('class' => 'form-control', 'placeholder' => 'Category Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</section>
		</aside>
	
