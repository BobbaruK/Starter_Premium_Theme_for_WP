<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/content.php
 *
 * Standard Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'csseco-format-standard' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ) ?>
		<div class="entry-meta">
			<?php echo csseco_posted_meta(); ?>
		</div><!-- /.entry-meta -->
	</header><!--/.entry-header-->
	<div class="entry-content">
	    <?php if ( has_post_thumbnail() ) { ?>
			<div class="standard-featured">
                <a class="standard-featured-link" href="<?php the_permalink(); ?>">
			        <?php the_post_thumbnail(); ?>
                </a>
			</div><!-- /.standard-featured -->
		<?php } ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div><!-- /.entry-excerpt -->
		<div class="button-container">
			<a href="<?php the_permalink(); ?>" class="btn btn-default">
				<?php _e( 'Read More', 'cssecotheme' ); ?>
			</a>
		</div><!-- /.button-container -->
	</div><!-- /.entry-content -->
	<footer class="entry-footer">
	    <?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>