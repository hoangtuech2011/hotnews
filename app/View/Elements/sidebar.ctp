<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
	   <div class="user-panel">
			<div class="pull-left image">
				<img src="" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info" style="max-width:130px;"> 
				<p>Hello, <?php echo $this->Session->read('Auth.User.username');?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" id='frm_search' class="form-control typeahead" placeholder="Search..."/>
				<span class="input-group-btn">
					<p name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-times"></i></p>
				</span>
			</div>
		</form>
		
		<div style="margin: 0 auto">
			<div class="loading"></div>
			<div class="loading1"></div>
		</div>
		
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li><a href=""><i class="fa fa fa-home"></i><span>Home</span></a></li>
			<li><a href="/categories/"><i class="fa fa fa-home"></i><span>Categories</span></a></li>
			<li><a href="/news/"><i class="fa fa fa-home"></i><span>News</span></a></li>
			<li><a href="/pages/"><i class="fa fa fa-home"></i><span>Pages</span></a></li>
			<li><a href="/settings/"><i class="fa fa fa-home"></i><span>Settings</span></a></li>
			<li><a href="/users/"><i class="fa fa fa-home"></i><span>Users</span></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
			
<!--Message Error-->
<div class="modal fade" style="width: 20ppx;" id="msg_error" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-body">
			<div class="alert alert-danger alert-dismissable" >
				<i class="fa fa-ban"></i>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<b>Alert!</b>
				<p id="msg_content"></p>
			</div>
		</div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$( document ).ready(function() {
	$( ".sidebar-menu ul" ).each(function( index,item ) {
		  var total = $(this).text().length;  
			  if(total==0){
				  $(this).parents('li').hide();
			  }
		});
});
</script>