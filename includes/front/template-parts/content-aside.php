<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/content-aside.php
 *
 * Aside Post Format
 */
//$class = get_query_var('post-class');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'csseco-format-aside' ) ); ?>>

	<div class="row">
	    <div class="col-xs-12 col-sm-4 col-md-3 text-center">
		    <?php
		    if ( csseco_get_post_attachment() ) {
			    ?>
				    <div class="aside-featured bg-img-el" style="background-image: url(<?php echo csseco_get_post_attachment(); ?>)"></div>
		    <?php } ?>
	    </div><!-- /.col-md-3 -->
		<div class="col-xs-12 col-sm-8 col-md-9">
			<header class="entry-header">
				<div class="entry-meta">
					<?php echo csseco_posted_meta(); ?>
				</div><!-- /.entry-meta -->
			</header><!--/.entry-header-->
			<div class="entry-content">
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
				</div><!-- /.entry-excerpt -->
			</div><!-- /.entry-content -->
		</div><!-- /.col-md-9 -->
	</div><!-- /.row -->
	<footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>