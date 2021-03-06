<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
// Start the loop.
while (have_posts()) : the_post();

	// Include the single post content template.
	get_template_part('template-parts/content', 'single');

	// If comments are open or we have at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) {
		comments_template();
	}

	if (is_singular('attachment')) {
		// Parent post navigation.
		the_post_navigation(array(
			'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>',
				'Parent post link', 'twentysixteen'),
		));
	} elseif (is_singular('post')) {
		// Previous/next post navigation.
		get_template_part('layouts/post-nextprev');
	}

	// End of the loop.
endwhile;
?>

</main><!-- .site-main -->

<?php if (is_active_sidebar('related-post')) : ?>
	<aside id="related-post" role="complementary">
		<?php dynamic_sidebar('related-post'); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>

</div><!-- .content-area -->

<?php $layout = get_post_meta(  get_the_ID(), 'opciones_de_layout_post-layout', true ); ?>
<?php if( $layout == 'content-area') {?>
<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>
