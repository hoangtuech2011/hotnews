<section id="newsSection">
      <div class="row">
        <div class="col-lg-12 col-md-12">
           <!-- start news sticker -->
          <div class="latest_newsarea">      
            <span><?php echo LAST_NEWS; ?></span>
            <ul id="ticker01" class="high_light">
            <?php foreach($high_lights as $high_light){ 
            	$new_nav_detail = "tin-tuc/".$high_light['Category']['name_no_unicode'].'/'.$high_light['New']['title_no_unicode'].".html";
            	?>
              <li><a onclick="window.open('<?php echo $new_nav_detail ?>')" href="<?php echo $new_nav_detail ?>"><?php echo $high_light['New']['title'] ?></a></li>
             <?php } ?> 
            </ul>
            <div class="social_area">
              <ul class="social_nav">
                <li class="facebook"><a href="#"></a></li>
                <li class="twitter"><a href="#"></a></li>
                <li class="flickr"><a href="#"></a></li>
                <li class="pinterest"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="vimeo"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
                <li class="mail"><a href="mailto:lvdoanhkhtn@gmail.com"></a></li>
              </ul>
            </div>      
          </div><!-- End news sticker -->
        </div>
      </div>
    </section>