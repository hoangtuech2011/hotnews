<?php App::import('Controller', 'Home'); ?>
<aside class="right_content">
           <?php echo $this->Element('h_popular_post_news'); ?>
            <?php if($_SERVER['REQUEST_URI']!=="/"){
            	$param = $this->request->params['pass'];
            	$str_param =  implode("/",$param);
?>
            <?php foreach ($child_categories as $child_category){ 
		              		$home = New HomeController();
		                  	$category_id = $child_category['Category']['id'];
		                  	$hnews = $home->getNews($category_id,0,1);
		                  	$news = $home->getNews($category_id,0,3);
		                  	$url = $str_param.'/'.$child_category['Category']['name_no_unicode'];
		                   
		              	?>
            <div class="child_category single_sidebar">
                 <h2><span><a href="<?php echo $url; ?>"><?php echo $child_category['Category']['name'] ?></a></span></h2>
            	 	<?php foreach ($hnews as $hnew){
            	 		$new_nav_detail = $url.'/'.$hnew['New']['title_no_unicode'].".html";
            	 		?>
            	 	  <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="catg_title"> <?php echo $hnew['New']['title'] ?></a>
		              <ul id="popular_post" class="spost_nav">
		                <li>
		                  <div class="div_sub_category boder_bottom media wow fadeInDown">
		                    <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="media-left">
		                      <img alt="<?php echo $hnew['New']['title'] ?>" src="<?php echo $hnew['New']['url_image'] ?>">
		                    </a>
		                    <div class="media-body">
		                      <p><?php echo $hnew['New']['description'];//echo substr($hnew['New']['description'], 0, 150)."....."; ?></p>                        
		                    </div>
		                  </div>
		                  
		                </li>
		              </ul>
		              <?php } ?>
		              <ul class="sub_category">
		              <?php foreach ($news as $new){ 
		              	$new_nav_detail = $url.'/'.$new['New']['title_no_unicode'].".html";
		              	?>
            	 	  		<li><a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="catg_title"> <?php echo $new['New']['title'] ?></a></li>
		              <?php } ?>
		                </ul>
            	</div>
            	  <?php } ?>
            	 <?php } ?>
          </aside>
