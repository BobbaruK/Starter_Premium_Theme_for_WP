<?php
/**
 * @package CSSecoThemes
 * index.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main">
		<div class="container">
			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'includes/front/template-parts/content', get_post_format() );
					}
				}
			?>
		</div><!-- /.container -->
	</main><!-- /.site-main -->
<?php get_footer();