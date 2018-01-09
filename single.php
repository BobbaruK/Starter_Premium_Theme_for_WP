<?php
/**
 * @package CSSecoThemes
 * single.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main">

		<div class="container">
			<?php
				if ( have_posts() ) {

					while ( have_posts() ) {

						the_post();

						get_template_part( 'includes/front/template-parts/single', get_post_format() );

						the_post_navigation();

						if ( comments_open() ) {

							comments_template();

						}

					}
				}
			?>
		</div><!-- /.container -->

	</main><!-- /.site-main -->
<?php get_footer();