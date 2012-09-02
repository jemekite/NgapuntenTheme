<?php get_header(); ?>

<div id="ctt" class="w">

<div class="content">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
$date = get_the_date();
	$date = str_replace(array('<p>','</p>'),'',$date);
	$category = get_the_category(' ');
	$cats  = $category[0]->cat_name;
	$catid	= $category[0]->term_id;
	$catlink  = get_category_link($catid);
	$postid    = $post->ID;
	$postitle  = $post->post_title;
	$content = get_the_content($postid);
	$attid     = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = $postid AND post_type = 'attachment' AND post_mime_type LIKE 'image/%%' LIMIT 1 ;" ));
	//Images
	$content = get_the_content($postid);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
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
	<h1 class="entry-title"> <a href="<?php echo $permalink .'" title="Permanent Link to '.$postitle.'">'.$postitle;?></a> </h1>
	
	<div class="c mb10"></div>
	<?php echo '<div class="breadcrumbs rel" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.$siteurl.'" title=" Backto Home " class="l" itemprop="url" rel="nofollow"><i itemprop="title"> Home </i></a> &#187; <i itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.$catlink.'" itemprop="url" class="l" rel="nofollow"><i itemprop="title">'.$cats.'</i></a></i>'.$catnya.' &#187;<i itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.$permalink.'" itemprop="url" class="l curent" rel="nofollow"><i itemprop="title">'.$postitle.'</i></a></i> &#187;<i itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" itemprop="url" class="l curent" rel="nofollow"><i itemprop="title">Currrently Reading</i></a></i><div class="c"></div><i class="lbc"></i></div>';?>
	
	<div class="c mb5"></div>

	<hr class="fhrtop"/><hr class="fhrbot"/>
	<p><?php echo $content;?></p>
	
	<?php danker_gambar_banyak(7);?>
	
	<div class="c mb10"></div>
	
	Published on <?php echo  $date;?> :   Posted in <?php echo ' <a href="'.$catlink.'" title="View all post in '.ucfirst($cats).'">'.ucfirst($cats).'</a> Category ';?>
	<?php $tag_list = get_the_tag_list( '', __( ', ', 'dankerizer' ) ); 
	echo '<br/><div class="tags">Tags: '.$tag_list.'</div>';
	?>
				<div class="po" itemscope itemtype="http://data-vocabulary.org/Organization">
				<span  itemprop="image"><?php 
				$alt ='itemprop="image" alt=""';
				$avatar	= get_avatar( get_the_author_email(), '70','itemprop="image"' ); 
				
				//echo get_avatar( get_the_author_id() , 70 ); 
				echo $avatar;
				
				?></span>
				<p><?php $author = get_the_author(); 
				$aulink	= $audes = get_the_author_meta('user_url');
				if (empty($aulink)){
				$eaut = 'Author :  <span itemprop="name">'.$author.'</a></span>';
				}else{
				$eaut = 'Author : <a href="'.$aulink.'"/><span itemprop="name">'.$author.'</a></span>';}
				echo $eaut;?> </p>
				<?php the_author_description(); ?>
			</div>
	<hr class="c fhrtop"/><hr class="fhrbot"/>
	
	<?php comments_template(); ?>
<?php
endwhile; 
else: 
echo ''.'<p>Sorry, no posts matched your criteria.</p>';
endif; 
?>
</div>

<?php get_sidebar();?>
<?php get_footer(); ?>
