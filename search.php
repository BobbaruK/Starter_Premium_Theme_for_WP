<?php
/**
 * @package CSSecoThemes
 * search.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main col-xs-12 col-md-<?php echo $contentWidth; ?>" role="main">
        <header class="search-header">
			<h1>You are searching for: <?php echo get_search_query(); ?></h1>
        </header>
		<?php if ( is_paged() ) { echo csseco_pagination_top(); } ?>
		<div class="csseco-posts-container">
			<?php
			if ( have_posts() ) {
//				echo '<div class="page-limit" data-page="/'.csseco_check_paged() .'?s='.get_search_query().'">'; // Live Server
				echo '<div class="page-limit" data-page="'.esc_url( home_url( '/' ) ).csseco_check_paged() .'?s='.get_search_query().'">'; // LocalHost

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