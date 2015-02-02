<?php
/*
 Template Name: Publish Article
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>
<?php
 
$postTitleError = '';
 
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
 
    if ( trim( $_POST['articleTitle'] ) === '' ) {
        $articleTitleError = 'Please enter a title.';
        $hasError = true;
    }
 
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['articleTitle'] ),
        'post_content' => $_POST['articleContent'],
        'post_type' => 'post',
        'post_status' => 'pending'
    );
 
   $post_id = wp_insert_post( $post_information );
  if ( $post_id ) {
    wp_redirect( home_url() );
    exit;
  }
}
?>

<?php get_header(); ?>

		<div id="insert-article-content">
    
    <button onclick="history.go(-1);" id="back-button">Back </button>
    <?php if (is_user_logged_in()){ ?>
			<form action="" id="primaryArticleForm" method="POST">
 			<?php if ( $articleTitleError != '' ) { ?>
  			  <span class="error"><?php echo $articleTitleError; ?></span>
   			 <div class="clearfix"></div>
				<?php } ?>
        <div class="article-div">
   		
    	   		<label for="articleTitle"><?php _e('Title:', 'framework') ?></label>
     				<input type="text" name="articleTitle" id="articleTitle" value="<?php if ( isset( $_POST['articleTitle'] ) ) echo $_POST['articleTitle']; ?>"class="required" />
   			
        </div>
        <div class="article-div">
   				
     				<label for="articleContent"><?php _e('Content:', 'framework') ?></label>
     				<textarea name="articleContent" id="articleContent" rows="8" cols="30" class="required"><?php if ( isset( $_POST['articleContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['articleContent'] ); } else { echo $_POST['articleContent']; } } ?></textarea>
   	
        </div>
  
   		    		<input type="hidden" name="submitted" id="submitted" value="true" />
 
   		    		<button type="submit" class="register-btn submit-article-button"><?php _e('Publish Article', 'framework') ?></button>
              <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
   	
 
			</form>
		</div>
<?php }else { ?>
<div id="not-logged-in">
  <p>Sorry, only logged in users can publish articles.</p>
</div>
<?php } ?>

<?php get_footer(); ?>
