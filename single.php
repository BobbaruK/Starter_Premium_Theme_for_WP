<?php
/**
 * @package CSSecoThemes
 * single.php
 *
 */
get_header(); ?>
    <main id="main" class="site-main col-xs-12 col-md-<?php echo $contentWidth; ?>" role="main">

		<div class="csseco-post-container">
			<?php

				if ( have_posts() ) {

					while ( have_posts() ) {

						the_post();

						csseco_save_post_views( get_the_ID() );

						get_template_part( 'includes/front/template-parts/single', get_post_format() );

						echo csseco_post_navigation();

						if ( comments_open() ) {

							comments_template();

						}

					}
				}
			?>
		</div><!-- /.csseco-post-container -->

    </main><!-- /.site-main -->
    <?php get_sidebar(); ?>
<?php get_footer();