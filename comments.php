<?php

 
?>
<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	 
	if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'danker' ); ?></p>
<?php return;	} ?>


<?php if ( have_comments() ) : ?>
 
	

	<ul class="comment-list">
	<?php wp_list_comments('type=comment&avatar_size=60&callback=mytheme_comment');?>
	</ul>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link( __('Previous Comments', 'danker')); ?></div>
		<div class="alignright"><?php next_comments_link( __('Next Comments', 'danker')); ?></div>
	</div>
	<?php endif; // check for comment navigation ?>
	
	<?php else : // this is displayed if there are no comments so far ?>


	<?php if ('open' == $post->comment_status) : ?><!-- If comments are open, but there are no comments. -->
	
		<div id="commentspost">
 			 
 		</div>
		
		
	<?php else : // comments are closed ?><!-- If comments are closed. -->
 
		<h3><?php _e('Comments are closed', 'danker'); ?></h3>

	<?php endif; ?>
	
	
<?php endif; ?>
 

<?php if ('open' == $post->comment_status) : ?>
 
	<div id="respond">

		<h3><?php comment_form_title( __('Leave a Reply for ', 'danker' ), __('Leave a Reply to %s', 'danker')); ?> <?php the_title(); ?></h3>
		
		<div class="cancel-comment-reply"><p><?php cancel_comment_reply_link(); ?></p></div>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			
			<p><?php _e('You must be', 'danker') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'danker') ?></a> <?php _e('to post a comment.', 'danker') ?></p>
 
			<?php else : ?>

			
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<textarea name="comment" id="comment" tabindex="1" rows="10" cols="140"></textarea><br />
			<?php if ( $user_ID ) : ?>
			
			<p><?php _e('Logged in as', 'danker') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log out of this account', 'danker') ?>"><?php _e('Logout', 'danker') ?> &raquo;</a></p>
			
 
			<?php else : ?>

				<div id="formLabels">
 
					<p><input type="text" onblur="if (this.value == '') {this.value = '<?php _e('Name (required)', 'danker') ?>';}" onfocus="if (this.value == '<?php _e('Name (required)', 'danker') ?>') {this.value = '';}" value="<?php _e('Name (required)', 'danker') ?>" name="author" id="author" value="<?php echo $comment_author; ?>" size="4" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

 					<p><input type="text" onblur="if (this.value == '') {this.value = '<?php _e('Email (will not be published)', 'danker') ?>';}" onfocus="if (this.value == '<?php _e('Email (will not be published)', 'danker') ?>') {this.value = '';}" value="<?php _e('Email (will not be published)', 'danker') ?>" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="4" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> /> </p>

 					<p class="last"><input type="text" onblur="if (this.value == '') {this.value = '<?php _e('Website', 'danker') ?>';}" onfocus="if (this.value == '<?php _e('Website', 'danker') ?>') {this.value = '';}" value="<?php _e('Website', 'danker') ?>" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="4" tabindex="4" /></p>
				
				</div>
				
				
			<?php endif; ?>
			
			<div id="formContent">
				 
				<input name="submit" type="submit" id="submit" class="comm-submit" value="<?php _e('Submit Comment', 'danker') ?>" />
			</div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		<div class="clear"></div>
		</form>
		
	<?php endif; // If registration required and not logged in ?>
	
	</div>
	
	<?php if ($danker_trackbacks == 'Show') { ?>
	<div id="trackbacks">
	<h3><?php _e('Trackbacks', 'danker'); ?></h3>
	<ol>
	   <?php //Displays trackbacks only
		foreach ($comments as $comment) : ?>
			 
			<?php $comment_type = get_comment_type(); ?>

			<?php if($comment_type != 'comment') { ?>
			<li><?php comment_author_link() ?></li>
		<?php }
		endforeach; ?>

	</ol>
	</div>
	
	<?php } ?>
		
	
<?php endif; // if you delete this the sky will fall on your head ?>