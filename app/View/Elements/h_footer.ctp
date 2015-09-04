<footer id="footer">
<div class="footer_top">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4">
<div class="footer_widget wow fadeInLeftBig">
<h2>About</h2>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
<div class="footer_widget wow fadeInDown">
<h2>Tag</h2>
<ul class="tag_nav">
<?php
	foreach ($categories as $category){ ?>
		<li><a onclick="window.open('/tin-tuc/<?php echo $category['Category']['name_no_unicode'] ?>')" href="../tin-tuc/<?php echo $category['Category']['name_no_unicode'] ?>"><?php echo $category['Category']['name']?></a><li>
<? } ?>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4">
<div class="footer_widget wow fadeInRightBig">
<h2>Contact</h2>
<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
<!-- <address> -->
<!-- Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567 -->
<!-- </address> -->
</div>
</div>
</div>
</div>
<div class="footer_bottom">
<p class="copyright">
<!-- All Rights Reserved <a href="home.html">NewsFeed</a> -->
</p>
<p class="developer">Developed By <a href="#" rel="nofollow">lvdoanhkhtn@gmail.com</a></p>
</div>
</footer>