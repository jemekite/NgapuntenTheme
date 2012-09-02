<?php global $themeurl; ?>
<div id="sb">
<div class="sidebar">
<div class="jds">Iklane</div>
<?php echo '<a href="http://goo.gl/FdFH2" target="_blank"><img src="'.$themeurl.'/images/300.png"/></a>';?> <!-- silahkan ganti baris ini untuk mengganti iklan anda -->

</div>
<div class="bayang"></div>
<?php

if ( ! dynamic_sidebar( 'sidebar-gede' ) ){

	echo '<div class="sidebar"><div class="jds">Latest Post</div>';
	$poste = array(
			'type'            => 'postbypost',
			'limit'           => 5,
			'format'          => 'custom', 
			'before'          => '<li><h3>',
			'after'           => '</h3></li>',
			'show_post_count' => false,
			'echo'            => 0
			); 
			$lastpost = wp_get_archives( $poste,false );
			$lastpost = str_replace(array("\n","\r\n","\r","\t",'		',"\d", "\w","\s"),'',$lastpost);
			//shuffle ($lastpost);
			echo ''.$lastpost;
			echo '</div><div class="bayang"></div>';

	echo '<div class="sidebar"><div class="jds">Latest Post</div>';
	$randompost = array( 'numberposts' => 5, 'orderby' => 'name' );
	$rand_posts = get_posts( $randompost );
	shuffle ($rand_posts);
	foreach( $rand_posts as $post ) {
		$shorandlink	 = get_permalink($post);
		$shorandtitle	 = get_the_title($post);
		$ctt				= get_the_content($post);
		$category		 = get_the_category(' ');
		$cats  				= $category[0]->cat_name;
		$cats2  			= $category[1]->cat_name;
		$cats3				= $category[2]->cat_name;
		$isirandomnya	= '<li><h3><a href="'.$shorandlink .'" >'.$shorandtitle.'</a><h3></li>';
		$isirandomnya = str_replace(array("\n","\r\n","\r","\t",'		',"\d", "\w","\s"),'',$isirandomnya);
		echo ''.$isirandomnya;
		
	//akhir random post
	}
echo '</div><div class="bayang"></div>';
}
?>


</div>