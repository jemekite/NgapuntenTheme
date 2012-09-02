<?php get_header(); ?>

<div id="ctt" class="w">

<div class="content">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
$date = get_the_date();
	$date = str_replace(array('<p>','</p>'),'',$date);
	$category = get_the_category(' ');
	$cats  = $category[0]->cat_name;
	$postid    = $post->ID;
	$postitle  = $post->post_title;
	$content = get_the_content($postid);
	$attid     = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = $postid AND post_type = 'attachment' AND post_mime_type LIKE 'image/%%' LIMIT 1 ;" ));
	//Images
	
	$imgs   = wp_get_attachment_image_src($attid, 'large');
	$imgsrc    = $imgs[0];
	$imgsw    = $imgs[1];
	$imgsh    = $imgs[2];
	$atturl    = get_attachment_link($attid);
	//KONSTRUKSI ALT
	$attitle   = get_the_title($attid);
	$attitle   = str_replace(array('-','_'),' ',$attitle);
	$permalink = get_permalink($post->post_parent);
	$singkatan = danker_ctts($post->post_content,60);
	?>
	<h2 class="entry-title"> <a href="<?php echo $permalink .'">'.$postitle;?></a> </h2>
	<div class="c mb10"></div>
	<?php echo '<a href="'.$permalink.'" title="'.$postitle.'"><img width="620" height="'.$imgsh.'" src="'.$imgsrc.'" /></a>';?>
	<div class="c mb5"></div>
	<p><?php echo $singkatan;?>...</p>
	
	<?php danker_gambar_banyak(7);?>
	<div class="c mb10"></div>
	<hr class="c fhrtop"/><hr class="fhrbot"/>
<?php
endwhile; 
else: 
echo ''.'<p>Sorry, no posts matched your criteria.</p>';
endif; 
?>
</div>

<?php get_sidebar();?>
<?php get_footer(); ?>
