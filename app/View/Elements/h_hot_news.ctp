<section id="sliderSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <!-- Set up your HTML -->
          <div class="slick_slider">
          <?php foreach ($hot_news  as $hot_new){ 
          	$new_nav_detail = "tin-tuc/".$hot_new['Category']['name_no_unicode'].'/'.$hot_new['New']['title_no_unicode'].".html";
          	?>
            <div class="single_iteam">
              <a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>"> <img src="<?php echo $hot_new['New']['url_image']; ?>" alt="<?php echo $hot_new['New']['title']; ?>"></a>
              <div class="slider_article">
                <h2><a onclick="window.open('<?php echo $new_nav_detail; ?>')" href="<?php echo $new_nav_detail; ?>" class="slider_tittle" ><?php echo $hot_new['New']['title'] ?></a></h2>
                <p><?php echo $hot_new['New']['description']; ?></p>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="latest_post">
            <h2><span><?php echo LAST_POST; ?></span></h2>
            <div id="lastest_post" class="latest_post_container">
              <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
              <ul class="latest_postnav">
                <?php foreach ($last_news as $last_new){
                	  $new_nav_detail = "tin-tuc/".$last_new['Category']['name_no_unicode'].'/'.$last_new['New']['title_no_unicode'].".html";
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
        </div>
      </div>
    </section>