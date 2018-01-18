<?php
/**
 * @package CSSecoThemes
 * page.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main col-xs-12 col-md-<?php echo $contentWidth; ?>" role="main">

		<div class="csseco-posts-container">
			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {
					the_post();
					get_template_part( 'includes/front/template-parts/content', 'page' );
				}

			}
			?>
		</div><!-- /.csseco-posts-container -->

	</main><!-- /.site-main -->
<?php get_sidebar(); ?>
<?php get_footer();