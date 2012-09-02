<?php
global $siteurl,$sitename,$sitedesc,$themeurl;
$postid    = $post->ID;
$postitle  = $post->post_title;
$permalink = get_permalink($post->post_parent);
	echo ''.'<!DOCTYPE html>'.
	'<html xmlns:og="http://opengraphprotocol.org/schema/" prefix="og: http://ogp.me/ns/website#" xmlns:x2="http://www.w3.org/2002/06/xhtml2" xmlns="http://www.w3.org/1999/xhtml" itemscope dir="ltr" lang="en-US" >'.
	'<head profile="http://gmpg.org/xfn/11">'.
	'<meta name="distribution" content="global" />'.
	'<meta name="language" content="en" />
	<link rel="stylesheet" href="'.$themeurl.'/danker.css" type="text/css" media="screen, projection" />
	<link rel="shortcut icon" href="'.$themeurl.'/images/favicon.ico" type="image/x-icon" />';

?>
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>
<body>

<div id="hw">
	<div class="w">
		<div id="h" class="l">
		<div id="lg">
		<?php echo '<h1 class="lo">'.$sitename.': '.$sitedesc.'<a href="'.$siteurl.'" title="'.$sitename.': '.$sitedesc.'">'.$sitename.' Home </a></h1>';?>
		<div class="adsh">
		<img src="<?php echo $themeurl.'/images/adsh.jpg';?>"/><!--iklan disini -->
		</div>
		</div>
		</div>
		
		<div id="nav">
			<div class="nw">
			<div class="nav l">

				<?php wp_nav_menu(); ?>
			</div>
			
			</div>
			<div class="searchbox mt r"><form id="searchform" action="<?php echo $siteurl.'/';?>" method="get"><fieldset><input type="text" value="Search" onblur="if(this.value=='') this.value='Search';" onfocus="if(this.value=='Search') this.value='';" name="s"><button type="submit"></button></fieldset></form></div>
		</div>
		
	</div>
</div>