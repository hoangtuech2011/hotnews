<aside class="content-wrapper">
	<section class="content-header">
		<h1>
			<a href="/Pages/">Home</a>
			<small><?php echo __('Pages'); ?></small>
		</h1>
	</section>
	<section class="content">
		<div class="box box-solid box-primary flat">
			<div class="box-header">
				<h3 class="box-title">Pages Management</h3>
			</div><!-- /.box-header -->
			<div class="box-body table-responsive">
				<div class="form-group col-xs-12 no-padding text-right">
					<?php
						echo $this->Html->link('<span class="fa fa-plus"></span> Add new', '/Pages/add',array('class' => 'btn btn-flat btn-info', 'escape'=>false));
					?>
				</div>
				<div class="col-xs-3 no-padding-left">
							<?php echo $this->Form->input('page', array('type' => 'select', 'class' => 'form-control', 'options' => $pages,'label' => 'Select page','empty' => '--Select page--')); ?>
							<?php echo $this->Form->input('category', array('type' => 'select', 'class' => 'form-control', 'options' => $categories,'label' => 'Select category','empty' => '--Select category--')); ?>
							
				</div>
				<table id="tableNew" class="table table-bordered table-striped">
					<thead>
							<tr>
								<th width="50px" class="actions">Actions</th>
								<th width="50px">ID</th>	
								<th width="100px">Title</th>
								<th width="120px">Image</th>
								<th width="50px">Page</th>
								<th width="50px">Category</th>
								<th width="50px">Views</th>
							</tr>
					</thead>

				</table>
			</div>
		</div>
	</section>
</aside><!-- /.right-side -->

<script>
	$(document).ready(function() {
		var page_id = "";
		var category_id = "";
		var key_word = "";
		loadDatatable(page_id,category_id,key_word);
		$("#page option[value='']").attr('selected', 'selected');
		$("#category option[value='']").attr('selected', 'selected');
	} );
	function loadDatatable(page_id, category_id, key_word){
		var count_th = $("#tableNew tr th" ).length;
		var resp = []; 
		for(var i = 0; i<count_th; i++)
		{
			if(i<6)
				resp.push({bVisible:true});
			else
				resp.push({bVisible:false});
		}
		var oTable = $('#tableNew').dataTable( {
			"sScrollX": "100%",
			"sScrollY": "auto",
			"bProcessing": true,
			"bServerSide": true,
			"bPaginate": true,
			"bInfo" : true,
			"bFilter": true,
			//"bStateSave": true,
			"aLengthMenu": [[10, 150, 250, 350, 500, 1000, -1], [10, 150, 250, 350, 500, 1000, "All"]],
			"sAjaxSource": "/news/ajaxLoadDataNew?page_id="+page_id+"&category_id="+category_id+"&key_word="+key_word,
			"aoColumns": resp,
			// Fix click input checkbox in Row - Render input type checkbox
			"aoColumnDefs": [ {
					// Column contains checkbox
					"aTargets": [ 1 ],
					// Render with html
					/* "mRender": function ( data, type, full ) {
						return '<input type="checkbox" class="check" >';
					}, */
					// set class
					"sClass": "text-center"
				}
			],
			"sDom": 'RC<"clear">lfrtip',
			"oColVis": {
				"aiExclude": [ 0, 1 ]
			}
		});
		$(window).bind('resize', function () {
			oTable.fnAdjustColumnSizing();
		});
		$("#searchcontact").removeAttr('disabled');
	}
</script>
		