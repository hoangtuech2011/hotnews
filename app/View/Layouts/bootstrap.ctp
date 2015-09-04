<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo $title_for_layout; ?>
		</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta name="description" content="">
		<meta name="author" content="">

		<?php if ($this->Session->read('Auth.User')){
			echo $this->Html->meta('icon');
			echo $this->Html->css(array('bootstrap.min','multi-select.css','ionicons.min','font-awesome','AdminLTE','datatables','dataTables.bootstrap'));
			echo $this->Html->css(array('jquery-ui-1.10.3.custom','skins/_all-skins.min','bootstrap-plugin/iCheck/all','bootstrap-plugin/bootstrap-notify'));
			echo $this->Html->css(array('fullcalendar','datepicker3','bootstrap-timepicker','bootstrap-plugin/dataTables.tableTools'));
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->Html->css('alertify/alertify.min');
			echo $this->Html->css('alertify/themes/bootstrap.min');
			echo $this->Html->script('alertify/alertify.min');
		}
		else
		{ 
			echo $this->Html->css(array('bootstrap.min'));
			echo $this->Session->flash();
		}
		?>
		<!-- Latest compiled and minified CSS -->
		<!-- Latest compiled and minified JavaScript -->
		<?php 
			echo $this->Html->script(array('jquery.min','bootstrap.min','dev'));
		?>
		<!--[if lte IE 8]><script src="js/libs/selectivizr.js"></script><![endif]-->
		<!--[if lt IE 7 ]> <html class="ie6" lang="en"> <![endif]-->
		<!--[if IE 7 ]> <html class="ie7" lang="en"> <![endif]--> 
		<!--[if IE 8 ]> <html class="ie8" lang="en"> <![endif]-->
		<!--[if IE 9 ]> <html class="ie9" lang="en"> <![endif]-->
		<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		
	</head>
	<?php if ($this->Session->read('Auth.User')){?>
	<body class="skin-green sidebar-collapse sidebar-mini">
		<div class="wrapper">
			<?php echo $this->Element('navigation'); ?>
			<?php echo $this->Element('sidebar'); ?>
			<?php echo $this->Session->flash(); ?>
	<?php }?>
			<?php echo $this->fetch('content'); ?>
	<?php if ($this->Session->read('Auth.User')){?>
			<?php echo $this->Element('footer'); ?>
	<?php }?>
			<!-- 
				Script for load Datatables
			-->
	<?php if($this->Session->read('Auth.User')){ ?>			
			<script type="text/javascript">
				$(function() {
					$(".table-export").dataTable({
						"sScrollX": "100%",
						"sScrollY": "auto",
						"aoColumnDefs": [ { 'bSortable' : false, 'aTargets' : [ 0 ] } ],
						"sDom": 'T<"clear">lfrtip',
						"oTableTools": {
							"sSwfPath": "/swf/copy_csv_xls_pdf.swf",
							"aButtons": [								
								{
									"sExtends":    "collection",
									"sButtonText": "Export",
									"aButtons":    [ "csv", "xls", "pdf" ]
								}
							]
						}
					});
					
					var oTable = $("#example1").dataTable({
						//"aaSorting": [[ 1, "desc" ]],
						"sScrollX": "100%",
						"sScrollY": "auto",
						"aoColumnDefs": [ { 'bSortable' : false, 'aTargets' : [ 0 ] } ]
					});
					
					$(window).bind('resize', function () {
						oTable.fnAdjustColumnSizing();
					});
					
					$("#example-acl").dataTable({ 
						"sScrollX": "100%",
						"bPaginate": false,
						"bFilter": false,
						"bInfo": false,
						"bSort": false
					});	
					
					// Check all
					oTable.on('draw.dt', function () {
						// fix tooltip always active with pagination datatable
						oTable.$("[data-toggle='tooltip']").tooltip(function(e) {e.preventDefault();});
						
						$('input[type=checkbox]').iCheck({
							checkboxClass: 'icheckbox_minimal'
						});
						
						//icheck in datatable
						// get all row in dataTable
						var allNodes = oTable.fnGetNodes();
						var checkAll = $('input.checkall');
						// get index checkbox in dataTable (not include checkbox in thead)
						var checkboxes = $(allNodes).find("input.check");
						
						checkAll.on('ifChecked ifUnchecked', function(event) { 
										
							if (event.type == 'ifChecked') {
								checkboxes.iCheck('check');
								
							} else {
								checkboxes.iCheck('uncheck');
							}
						});
					});	
					// Multiselect for Assign Organizations
					$('#pre-selected-options').multiSelect({
						selectableHeader: "<div class='header-multi'>List Organizations</div>",
						selectionHeader: "<div class='header-multi'>Assign Organizations</div>"
					});
					//active menu
					var controller = '<?php echo $this->params['controller']?>';
					var action = '<?php echo $this->params['action']?>';
					if(action=='home'){
						action = action;
					}else{
						action = 'index';
					}
					$('.sidebar-menu a[href="/'+controller+'/'+action+'"]').parents().addClass('active');
					$('.sidebar-menu a[href="/'+controller+'/'+action+'"]').closest('.menu-tree').addClass('active');
					$('.sidebar-menu a[href="/'+controller+'/'+action+'"]').closest('.treeview-menu').css('display','block');
				});
			</script>
		</div><!-- /.container -->
	<?php }else{  ?>
		<script type="text/javascript">
			
			</script>
	<?php } ?>
	<?php 
		//echo $this->Html->script(array('app','jquery.multi-select','dev','jquery-ui-1.10.3.min'));
		if ($this->Session->read('Auth.User')){
			echo $this->Html->script(array('app','jquery-ui-1.10.3.min','jquery.multi-select','dev'));
			echo $this->fetch('script');			
			echo $this->Html->script(array('bootstrap-timepicker','bootstrap-datepicker'));
		}
		echo $this->Html->script(array('icheck.min','jquery.dataTables','dataTables.bootstrap','bootstrap-plugin/bootstrap-notify','bootstrap-plugin/dataTables.tableTools.min'));
	?>
	<?php if ($this->Session->read('Auth.User')){ ?>
	</body>
	<script type="text/javascript">
		//$('#reservation').daterangepicker({timePicker: true,singlePicker:true});
		$('input[type="checkbox"], input[type="radio"]').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass: 'iradio_minimal-blue',
		});
		function addImageCk(url){
			var html = "<img src='"+url+"' />";
			var current_active = $("#eng_tab").attr("class");
			if(current_active=="active"){
				CKEDITOR.instances['english'].insertHtml(html);
			}else{
				CKEDITOR.instances['vietnam'].insertHtml(html);
			}
			$("#list_image_PB").modal("hide");
		}
	</script>
	<?php } ?>
</html>
<!-- dialog show list image photobucket -->
