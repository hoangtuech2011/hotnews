<section id="sliderSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <!-- Set up your HTML -->
          <div class="slick_slider">
          <?php foreach ($hot_news  as $hot_new){
          	$new_nav_detail = ALIAS_CATEGORY.$hot_new['Category']['name_no_unicode'].'/'.$hot_new['New']['title_no_unicode'].".html";
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
          	<?php echo $this->Element('h_last_post_news'); ?>
        </div>
      </div>
    </section>