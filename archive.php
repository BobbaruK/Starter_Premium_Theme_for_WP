<?php
/**
 * @package CSSecoThemes
 * archive.php
 *
 */
get_header(); ?>
    <main id="main" class="site-main col-xs-12 col-md-<?php echo $contentWidth; ?>" role="main">
		<?php
			if ( is_paged() ) {
		?>
			<div class="csseco-load-prev text-center">
				<a class="csseco_load_more btn btn-lg btn-default"
				   data-prev="1"
				   data-page="<?php echo csseco_check_paged(1); ?>"
                   data-archive="<?php echo csseco_grab_current_uri(); ?>"
				   data-url="<?php echo admin_url('admin-ajax.php'); ?>"
				   style="margin-bottom: 40px;">
					<i class="fa fa-refresh" aria-hidden="true"></i>
					<span class="text">Load Previous</span>
				</a>
			</div><!-- /.container -->
		<?php
			}
		?>
		<header class="archive-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header>
		<div class="csseco-posts-container">
			<?php
				if ( have_posts() ) {

				echo '<div class="page-limit" data-page="'.$_SERVER["REQUEST_URI"].'">';

				while ( have_posts() ) {
					the_post();
					//$class = 'reveal';
					//set_query_var( 'post-class', $class ); // un fel de global vezi content-aside in susul paginii($class = get_query_var('post-class');)
					get_template_part( 'includes/front/template-parts/content', get_post_format() );
				}

				echo '</div>';

			}
			?>
		</div><!-- /.container -->
		<div class="csseco-load-next text-center">
			<a class="csseco_load_more btn btn-lg btn-default"
			   data-page="<?php echo csseco_check_paged(1); ?>"
			   data-archive="<?php echo csseco_grab_current_uri(); ?>"
			   data-url="<?php echo admin_url('admin-ajax.php'); ?>">
				<i class="fa fa-refresh" aria-hidden="true"></i>
				<span class="text">Load More</span>
			</a>
		</div><!-- /.container -->
	</main><!-- /.site-main -->
    <?php get_sidebar(); ?>
<?php get_footer();