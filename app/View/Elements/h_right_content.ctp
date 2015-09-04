<aside class="right_content">
            <div class="single_sidebar">
              <h2><span><?php echo POPULAR_POST; ?></span></h2>
              <ul id="popular_post" class="spost_nav">
              <?php foreach ($most_view_news as $most_view_new){ 
              		$new_nav_detail = "tin-tuc/".$most_view_new['Category']['name_no_unicode'].'/'.$most_view_new['New']['title_no_unicode'].".html";
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
            <!-- start tab section -->
            <div class="single_sidebar">
               <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>               
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="category">
                  <ul>
                    <li class="cat-item"><a href="#">Sports</a></li>
                    <li class="cat-item"><a href="#">Fashion</a></li>
                    <li class="cat-item"><a href="#">Business</a></li>
                    <li class="cat-item"><a href="#">Technology</a></li>
                    <li class="cat-item"><a href="#">Games</a></li>
                    <li class="cat-item"><a href="#">Life & Style</a></li>
                    <li class="cat-item"><a href="#">Photography</a></li>
                  </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="video">
                  <div class="vide_area">                   
                    <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="comments">
                  <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown">
                    <a href="single_page.html" class="media-left">
                      <img alt="img" src="">
                    </a>
                    <div class="media-body">
                      <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a>                        
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown">
                    <a href="single_page.html" class="media-left">
                      <img alt="img" src="">
                    </a>
                    <div class="media-body">
                      <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a>                        
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown">
                    <a href="single_page.html" class="media-left">
                      <img alt="img" src="">
                    </a>
                    <div class="media-body">
                      <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a>                        
                    </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown">
                    <a href="single_page.html" class="media-left">
                      <img alt="img" src="">
                    </a>
                    <div class="media-body">
                      <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a>                       
                    </div>
                  </div>
                </li>
              </ul>
                </div>
              </div>            
            </div>
            <!-- End tab section -->
            <!-- sponsor add -->
            <div class="single_sidebar wow fadeInDown">
              <h2><span>Sponsor</span></h2>
              <a class="sideAdd" href="#"><img src="img/add_img.jpg" alt="img"></a>
            </div>
            <!-- End sponsor add -->
             <!-- Category Archive -->
            <div class="single_sidebar wow fadeInDown">
              <h2><span>Category Archive</span></h2>
              <select class="catgArchive">
                <option>Select Category</option>
                <option>Life styles</option>
                <option>Sports</option>
                <option>Technology</option>
                <option>Treads</option>
              </select>
            </div>
            <!-- End category Archive -->
              <!-- sponsor add -->
            <div class="single_sidebar wow fadeInDown">
              <h2><span>Links</span></h2>
              <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Rss Feed</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Life & Style</a></li>
              </ul>
            </div>
            <!-- End sponsor add -->
          </aside>