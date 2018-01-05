<?php
/**
 * @package CSSecoThemes
 * index.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main">
		<div class="container csseco-posts-container">
			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						//$class = 'reveal';
						//set_query_var( 'post-class', $class ); // un fel de global vezi content-aside in susul paginii($class = get_query_var('post-class');)
						get_template_part( 'includes/front/template-parts/content', get_post_format() );
					}
				}
			?>
		</div><!-- /.container -->
        <div class="container text-center">
            <a class="csseco_load_more btn btn-lg btn-default" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                <i class="fa fa-refresh" aria-hidden="true"></i>
                <span class="text">Load More</span>
            </a>
        </div><!-- /.container -->
	</main><!-- /.site-main -->
<?php get_footer();