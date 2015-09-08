<div class="latest_post">
            <h2><span><?php echo LAST_POST; ?></span></h2>
            <div id="lastest_post" class="latest_post_container">
              <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
              <ul class="latest_postnav">
                <?php 
                	  foreach ($last_news as $last_new){
                	  $new_nav_detail = ALIAS_CATEGORY.$last_new['Category']['name_no_unicode'].'/'.$last_new['New']['title_no_unicode'].".html";
                ?>
                <li>
                  <div class="media">
                    <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="media-left">
                      <img alt="<?php echo $last_new['New']['title']; ?>" src="<?php echo $last_new['New']['url_image']; ?>">
                    </a>
                    <div class="media-body">
                      <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="catg_title"> <?php echo $last_new['New']['title']; ?></a>                        
                    </div>
                  </div>
                </li>
                <li>
                <?php } ?>
              </ul>
             <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
            </div>
          </div>