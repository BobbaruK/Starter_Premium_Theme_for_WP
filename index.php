<?php
/**
 * @package CSSecoThemes
 * index.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main col-xs-12 col-md-<?php echo $contentWidth; ?>" role="main">
		<?php if ( is_paged() ) { echo csseco_pagination_top(); } ?>
		<div class="csseco-posts-container">
			<?php
				if ( have_posts() ) {

//				    echo '<div class="page-limit" data-page="/'.csseco_check_paged() .'">'; // Live Server
				    echo '<div class="page-limit" data-page="'.esc_url( home_url( '/' ) ).csseco_check_paged() .'">'; // LocalHost

					while ( have_posts() ) {
						the_post();
						//$class = 'reveal';
						//set_query_var( 'post-class', $class ); // un fel de global vezi content-aside in susul paginii($class = get_query_var('post-class');)
						get_template_part( 'includes/front/template-parts/content', get_post_format() );
					}

					echo '</div>';
				}
			?>
		</div><!-- /.csseco-posts-container -->
		<?php echo csseco_pagination_bottom(); ?>
	</main><!-- /.site-main -->
    <?php get_sidebar(); ?>
<?php get_footer();