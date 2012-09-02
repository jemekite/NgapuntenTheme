<?php
$siteurl  = get_option('siteurl');
$sitename = get_option('blogname');
$sitedesc = get_option('blogdescription');
$themeurl = $siteurl.'/wp-content/themes/'.get_option('template');
 if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => __('Sidebar seng Gede','dankerizer'),
		'id' => 'sidebar-gede',
		'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div><div class="bayang"></div>',
        'before_title' => '<div class="jds"><u>',
        'after_title' => '</u></div>',
	));
}
// CUSTOM EXCERPT FUNCTION
function danker_ctts($text, $excerpt_length) {
	if ( !empty( $text ) ) {
		$text = strip_shortcodes( $text );
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
		if ( count($words) > $excerpt_length ) {
			array_pop($words);
			$text = implode(' ', $words);
			$text = $text . ' ';
		} else {
			$text = implode(' ', $words);
		}
	}
	return $text;
}
function danker_gambar_banyak($jumlah){
global $post;
$postid    = $post->ID;
	$args  = array(
	  'order'          => 'ASC',
	  'post_type'      => 'attachment',
	  'post_parent'    => $postid,
	  'post_mime_type' => 'image',
	  'post_status'    => null,
	  'numberposts'    => $jumlah,
	);
	$atts = get_posts($args);
	$i  = 1;
	echo '<div class="tu">';
	foreach($atts as $im) {
		if ($i>1) {break;} else{
		  //KONSTRUKSI IMG
		  $attid  = $im->ID;
		  $imgs   = wp_get_attachment_image_src($attid, 'thumbnail');
		  $imgrc  = $imgs[0];
		  $atturl = get_attachment_link($attid);
		  //KONSTRUKSI ALT
		  $attitle = get_the_title($attid);
		  $attitle   = str_replace(array('-','_'),' ',$attitle);
		  $alt     = $postitle.': '.$attitle;
		  echo ''.'<a href="'.$atturl.'"><img width="83" height="83" src="'.$imgrc.'" alt="'.$alt.'"/></a>';
		}
	  }
	  echo ''.'</div>';
}
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="commbody">
 		  <div class="comment-author vcard">
			 <?php echo get_avatar($comment,$size='60' ); ?>
 		  </div>
		
			
		  <div class="comment-meta commentmetadata">
		   <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s   %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
 
      <?php comment_text() ?>
		 <?php if ($comment->comment_approved == '0') : ?>
			 <em><?php _e('Your comment is awaiting moderation.', 'wpzoom') ?></em>
			 <br />
		  <?php endif; ?>
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
      <div class="clear"></div>
     </div>
<?php }

?>