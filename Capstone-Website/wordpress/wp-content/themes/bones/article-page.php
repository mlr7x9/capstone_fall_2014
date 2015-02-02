<?php
/*
 Template Name: Article Page
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

<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
						<div id="submit_article"><a href="https://babbage.cs.missouri.edu/~cs4970s14grp4/wordpress/publish-article/">Publish article</a></div>
							<?php $myposts = get_posts('');
		foreach($myposts as $post) :
		setup_postdata($post);
		?>
  <div class="post-item">
    <div class="post-info">
      <h2 class="post-title">
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
      </a>
      </h2>
      <p class="post-meta">Posted by <?php the_author(); ?></p>
    </div>
    <div class="post-content">
    <hr></hr>
    <?php the_content(); ?>
    </div>
  </div>

<?php endforeach; wp_reset_postdata(); ?>


						</div>

						<?php get_sidebar(); ?>

				</div>
			</div>


<?php get_footer(); ?>
