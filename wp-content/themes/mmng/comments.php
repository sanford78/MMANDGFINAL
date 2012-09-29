<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php return;
		}
	}
	$oddcomment = 'class="alt" '; // alternating comments
?>
<?php if ($comments) : // there are comments ?>
	<div id="comments">
		<?php foreach ($comments as $comment) : ?>
			<div class="comment" <?php echo $oddcomment; ?>id="comment-<?php comment_ID(); ?>">
				<h4 class="comment_author"><?php comment_author_link(); ?></h4>
				<div class="comment_date"><?php comment_date('F jS, Y'); ?> at <?php comment_time(); ?></div>
				<div class="comment_text"><?php comment_text(); ?></div>
			</div>
			<?php $oddcomment = (empty($oddcomment)) ? 'class="alt" ' : ''; // alternating comments ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
		<div id="comment_add">
			<h3 class="comments_title">Leave a Reply</h3>
			<?php if (get_option('comment_registration') && !$user_ID) : ?>
				<div class="comment_add_login">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</div>
			<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
					<?php if ($user_ID) : ?>
					<div class="comment_add_login">
						Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
						<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a>
					</div>					
					<?php else : ?>
					<input class="form-text" type="text" placeholder="Name" name="author" id="author" value="<?php echo $comment_author; ?>" size="55" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
					<input class="form-text" type="text" placeholder="Email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="55" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
					<?php endif; ?>
					<textarea class="form-text" name="comment" placeholder="Comment" id="comment" cols="55" rows="10" tabindex="4"></textarea>
					<input class="form_submit" name="submit" type="submit" id="submit" tabindex="5" value="Send">
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			<?php endif; ?>
		</div> 
<?php endif; ?>