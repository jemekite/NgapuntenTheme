<?php // URL to share
global $post;
	$url = get_permalink();
	$text = the_title('', '', false);
	$postid    = $post->ID;
	$attid     = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = $postid AND post_type = 'attachment' AND post_mime_type LIKE 'image/%%' LIMIT 1 ;" ));
	$imgs   = wp_get_attachment_image_src($attid, 'large');
	$imgsrc    = $imgs[0];
if (is_single()){
?>
<div id="social-float"> <div class="sf-twitter"> <a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="newcarmodels" data-url="<?php echo $url; ?>" data-text="<?php echo $text; ?>">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> </div> <div class="sf-facebook"> <iframe src="http://www.facebook.com/plugins/like.php?app_id=186708408052490&amp;href=<?php echo urlencode($url); ?>&amp;send=false&amp;layout=box_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:62px;" allowTransparency="true"></iframe> </div> <div class="pinterest"><?php echo '<a href="http://pinterest.com/pin/create/button/?url='.urlencode($url).'&media='.urlencode($url).'='.$text.'" class="pin-it-button" count-layout="vertical"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>'; ?> </div> <div class="sf-digg"> <script src="http://widgets.digg.com/buttons.js" type="text/javascript"></script> <a class="DiggThisButton DiggMedium"></a> </div> <div class="sf-plusone"> <!-- Place this tag where you want the +1 button to render --> <g:plusone size="tall" href="<?php echo $url; ?>"></g:plusone> </div> </div> 
<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Show social voter only if the browser is wide enough.
		if( $(window).width() >= 1030 )
			$('#social-float').show();
 
		// Update when user resizes browser.
		$(window).resize(function() {
			if( $(window).width() < 1030 ) {
				$('#social-float').hide();
			} else {
				$('#social-float').show();
			}
		});
	});
</script>
<!--akhir floating share -->
<?php }else{}	?>
</div>
<div class="c"></div>
<div id="ftw">
<div class="w">
<div class="copyright l">
<?php echo 'Copyright &#169; 2012  <a href="'.$siteurl.'">'.$sitename.'</a> : ';?> 
<a href="/privacy-policy/">DMCA</a> &minus;
<a href="/dmca/">Contact</a> &minus;
<a href="/Sitemap/">Sitemap</a>
</div><br/>
<span class=r">Wordpress theme By <a href="http://nganggur.org" title="nganggur">Nganggur.org</a></span>
</div>
</div>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
</body>
</html>