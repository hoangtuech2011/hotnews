 <div class="single_sidebar">
              <h2><span><?php echo POPULAR_POST; ?></span></h2>
              <ul id="popular_post" class="spost_nav">
              <?php 
              		foreach ($most_view_news as $most_view_new){ 
              		$new_nav_detail = ALIAS_CATEGORY.$most_view_new['Category']['name_no_unicode'].'/'.$most_view_new['New']['title_no_unicode'].".html";
              	?>
                <li>
                  <div class="media wow fadeInDown">
                    <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="media-left">
                      <img alt="<?php echo $most_view_new['New']['title'] ?>" src="<?php echo $most_view_new['New']['url_image'] ?>">
                    </a>
                    <div class="media-body">
                      <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="catg_title"> <?php echo $most_view_new['New']['title'] ?></a>                        
                    </div>
                  </div>
                </li>
               <?php } ?>
              </ul>
            </div>