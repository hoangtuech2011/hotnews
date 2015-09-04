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
    
    <section id="contentSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">
          <?php foreach($categories as $category){
          	$location = $category['Category']['location'];
          	$name_no_unicode = $category['Category']['name_no_unicode'];
          	$category_detail = "tin-tuc/".$name_no_unicode;
          	if($location==="0"){
          ?>
            <div class="single_post_content">
              <h2><span><a onclick="window.open('tin-tuc/<?php echo $name_no_unicode ?>')" href="tin-tuc/<?php echo $name_no_unicode ?>"><?php echo $category['Category']['name'] ?></a></span></h2>
              <div class="single_post_content_left">
                <ul id="news_<?php echo $name_no_unicode ?>" class="news business_catgnav  wow fadeInDown">
                  <li>
                  <?php
                  	$home = New HomeController();
                  	$category_id = $category['Category']['id'];
                  	$hnews = $home->getNews($category_id,1,1);
                  	foreach($hnews as $h_new){ 
                  		$new_detail = "tin-tuc/".$name_no_unicode.'/'.$h_new['New']['title_no_unicode'].".html";
                  	?>
                    <figure class="bsbig_fig">
                      <a onclick="window.open('<?php echo $new_detail ?>')" href="<?php echo $new_detail; ?>" class="featured_img">
                          <img alt="<?php echo $h_new['New']['title']?>" src="<?php echo $h_new['New']['url_image']?>">
                          <span class="overlay"></span>
                      </a>
                      <figcaption>
                        <a onclick="window.open('<?php echo $new_detail ?>')" href="<?php echo $new_detail; ?>"><?php echo $h_new['New']['title']?></a>
                      </figcaption>
                        <p><?php echo $h_new['New']['description']?></p>
                    </figure>
                    <?php } ?>
                  </li>
                </ul>
              </div>
              <div class="single_post_content_right">
                <ul id="newsNav_<?php echo $name_no_unicode ?>" class="news_nav spost_nav">
                	<?php
                		$category_id = $category['Category']['id'];
                		$news = $home->getNews($category_id,0,5); 
                		foreach($news as $new){
                			$new_nav_detail = "tin-tuc/".$name_no_unicode.'/'.$new['New']['title_no_unicode'].".html";
                		?>
                  <li>
                    <div class="media wow fadeInDown">
                      <a href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')" class="media-left">
                        <img alt="<?php echo $new['New']['title']; ?>" src="<?php echo $new['New']['url_image']; ?>">
                      </a>
                      <div class="media-body">
                        <a href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')" class="catg_title"> <?php echo $new['New']['title']; ?></a>                        
                      </div>
                    </div>
                  </li>
                  <?php }
                  ?>
                </ul>
              </div>
            </div>
          
           <?php } ?> 
            <!-- start 2 style category design -->
           	<?php if($location==="1"){ ?>
              <div class="fashion">
                <div class="single_post_content">
                   <h2><span><a onclick="window.open('tin-tuc/<?php echo $name_no_unicode ?>')"><?php echo $category['Category']['name'] ?></a></span></h2>
                   <ul id="newSub1_<?php echo $name_no_unicode ?>" class="news_sub1 business_catgnav wow fadeInDown">
                 	<?php 
                 	$category_id = $category['Category']['id'];
                  	$hnews = $home->getNews($category_id,1,1);
                 	foreach($hnews as $hnew){ 
                 		$new_sub_detail = "tin-tuc/".$name_no_unicode.'/'.$hnew['New']['title_no_unicode'].".html";
                 	?>
                    <li>
                      <figure class="bsbig_fig">
                        <a href="<?php echo $new_sub_detail; ?>" onclick="window.open('<?php echo $new_sub_detail; ?>')" class="featured_img">
                            <img alt="<?php echo $hnew['New']['title']; ?>" src="<?php echo $hnew['New']['url_image']; ?>">
                            <span class="overlay"></span>
                        </a>
                        <figcaption>
                          <a href="<?php echo $new_sub_detail; ?>" onclick="window.open('<?php echo $new_sub_detail; ?>')" ><?php echo $hnew['New']['title']; ?></a>
                        </figcaption>
                          <p><?php echo $hnew['New']['description']; ?>.</p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                  <ul id="newsSubNav1_<?php echo $name_no_unicode ?>" class="news_sub_nav1 spost_nav">
                  <?php
                  $category_id = $category['Category']['id'];
                  $news = $home->getNews($category_id,0,5);
                  foreach($news as $new){ 
                  	$new_sub_nav_detail = "tin-tuc/".$name_no_unicode.'/'.$new['New']['title_no_unicode'].".html";
                  ?>
                  <li>
                    <div class="media wow fadeInDown">
                      <a href="<?php echo $new_sub_nav_detail; ?>" onclick="window.open('<?php echo $new_sub_nav_detail; ?>')" class="media-left">
                            <img width="72" height="72" alt="<?php echo $new['New']['title']; ?>" src="<?php echo $new['New']['url_image']; ?>">
                            <span class="overlay"></span>
                        </a>
                      <div class="media-body">
                      	<a class="catg_title" ><?php echo $new['New']['title']; ?></a>
                      </div>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
                </div>
              </div>
              <?php }else if($location==="2"){?>
              <div class="technology">
                <div class="single_post_content">
                   <h2><span><a onclick="window.open('tin-tuc/<?php echo $name_no_unicode ?>')" href="/<?php echo $name_no_unicode ?>"><?php echo $category['Category']['name'] ?></a></span></h2>
                              
                  <ul id="newsSub2_<?php echo $name_no_unicode ?>" class="news_sub_2 business_catgnav wow fadeInDown">
                 	<?php 
                 	$category_id = $category['Category']['id'];
                  	$hnews = $home->getNews($category_id,1,1);
                 	foreach($hnews as $hnew){ 
                 		$new_nav_detail = "tin-tuc/".$name_no_unicode.'/'.$hnew['New']['title_no_unicode'].".html";
                 	?>
                    <li>
                      <figure class="bsbig_fig">
                        <a href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')" class="featured_img">
                            <img alt="<?php echo $hnew['New']['title']; ?>" src="<?php echo $hnew['New']['url_image']; ?>">
                            <span class="overlay"></span>
                        </a>
                        <figcaption>
                          <a href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')" ><?php echo $hnew['New']['title']; ?></a>
                        </figcaption>
                          <p><?php echo $hnew['New']['description']; ?>.</p>
                      </figure>
                    </li>
                    <?php } ?>
                  </ul>
                  <ul id="newsSubNav2_<?php echo $name_no_unicode ?>" class="news_sub_nav2 spost_nav">
                  <?php
                  $category_id = $category['Category']['id'];
                  $news = $home->getNews($category_id,0,5);
                  foreach($news as $new){
                  	$new_nav_detail = "tin-tuc/".$name_no_unicode.'/'.$new['New']['title_no_unicode'].".html";
                  ?>
                  <li>
                    <div class="media wow fadeInDown">
                      <a href="<?php echo $new_nav_detail; ?>" onclick="window.open('<?php echo $new_nav_detail; ?>')" class="media-left">
                            <img width="72" height="72" alt="<?php echo $new['New']['title']; ?>" src="<?php echo $new['New']['url_image']; ?>">
                            <span class="overlay"></span>
                        </a>
                      <div class="media-body">
                      	<a class="catg_title" ><?php echo $new['New']['title']; ?></a>
                      </div>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
                </div>
              </div>
               <?php } ?>
			 <?php } 
          ?>              
            <!-- End 2 style category design -->
            <!-- start photography stye design -->
           
            <!-- End photography stye design -->
            <!-- start games category design -->
            
            <!-- End games category design -->            
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          	<?php echo $this->Element('h_right_content'); ?>
        </div>
      </div>  
    </section>
    <!-- ==================End content body section=============== -->    
    <?php echo $this->Element('h_footer'); ?>
  </div> <!-- /.container -->
      
  </body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		var callAjax = function(){
			$(".news_nav, .news_sub_nav1, .news_sub_nav2").each(function () {
				var getId = (this.id).split('_');
				var category_name = getId[1];
				var hot = 5;
				var id = "#"+this.id;
				checkNew(category_name, hot,id);
	  		});
			$(".news, .news_sub1, .news_sub2").each(function () {
				var getId = (this.id).split('_');
				var category_name = getId[1];
				var hot = 1;
				var id = "#"+this.id;
				checkNew(category_name, hot,id);
	  		});
		};
        //setInterval(callAjax,300000);
		setInterval(callAjax,30000);
	});
</script>
