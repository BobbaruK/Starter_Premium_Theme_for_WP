<?php
/**
 * @package CSSecoThemes
 * 404.php
 *
 */
get_header(); ?>
	<main id="main" class="site-main col-xs-12" role="main">
		<div class="csseco-posts-container">
			<div id="fof">
				<div class="fof-inner">
					<h1 class="csseco-404-title"><?php _e( '404 Error !', 'cssecotheme' ); ?></h1>
					<p><?php _e( 'For Some Reason The Page You Requested Could Not Be Found On Our Server', 'cssecotheme' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- /.fof-inner -->
                <a class="go-back" href="javascript:history.go(-1)">
                    <span>Back</span>&laquo;
                </a>
                <a class="go-home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <span>Home</span>&raquo;
                </a>
			</div><!-- /.fof -->
		</div><!-- /.csseco-posts-container -->
	</main><!-- /.site-main -->
<?php get_footer();