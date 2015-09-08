<?php
	echo $this->Html->css(array('bootstrap.min', 'font-awesome.min', 'animate','li-scroller', 'slick', 'jquery.fancybox','theme-red', 'theme','style'));
	echo $this->Html->script(array('wow.min','slick.min','jquery.li-scroller.1.0','jquery.newsTicker.min','jquery.fancybox.pack','custom','ckeditor/ckeditor','bootstrap-plugin/jquery.bootstrap.wizard.min','fileinput.min'));
	App::import('Controller', 'Home');

?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- End Preloader -->
   
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  
  <div id="index" class="container">
    <?php echo $this->Element('h_header'); ?>
 	<?php echo $this->Element('h_nav'); ?> 
    <?php echo $this->Element('h_high_light_news'); ?>
    <?php echo $this->Element('h_hot_news'); ?>
    <!-- start slider section -->
    <?php 
      		if($error)
      			echo $this->Element('h_error');
      		else{ 
     ?>
    <?php //echo $this->Element('h_right_news'); ?>
    <section id="contentSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">
            <div class="single_post_content">
              <table  id="example" class="table table-striped">
              			<thead>
              				<tr>
              					<th></th>
              				</tr>
              			</thead>
						<tbody>
							<?php 
								$param = $this->request->params['pass'];
								$str_param =  implode("/",$param);
								foreach ($news as $new):
								$new_nav_detail = $str_param.'/'.$new['New']['title_no_unicode'].".html";
							?>
								<tr>
									<td> 
										<div style="display: block; padding-top: 5px;text-align: left; padding-bottom: 5px; font-weight: bold;">
											<a href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')"><?php echo $new['New']['title']; ?></a>
										</div>
										<a style="margin-right: 20px" href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')" class="media-new">
                       				 		<img alt="<?php echo $new['New']['title'] ?>" src="<?php echo $new['New']['url_image'] ?>" >
                     				 	</a>
										<p style="text-align: left"><?php echo $new['New']['description']; ?></p>
                       	 			</td>
								</tr>
							<?php endforeach; ?>
					</tbody>
				</table>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
        	<?php //echo $this->Element('h_last_post_news'); ?>
          	<?php echo $this->Element('h_right_content'); ?>
        </div>
      </div>  
    </section>
    <?php } ?>
    <!-- ==================End content body section=============== -->    
    <?php echo $this->Element('h_footer'); ?>
  </div> <!-- /.container -->
  
 

  <!-- =========================
        //////////////This Theme Design and Developed //////////////////////
        //////////// by www.wpfreeware.com======================-->
    
      
  </body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#example').DataTable( {
	    	"oLanguage": {
	            "sZeroRecords": "No records to display"
	        },
	        "bSearch": false,
	        "bFilter" : false,               
	        "bLengthChange": false,
	        "bInfo": false,
	        "bSort": false,
	        "bPaginate": true,
	        "dom": '<"top"i>rt<"bottom"flp><"clear">'
	    } );

		$("div#example_wrapper").find("div.dataTables_paginate").parent().attr('class','col-xs-12');
	});
</script>
