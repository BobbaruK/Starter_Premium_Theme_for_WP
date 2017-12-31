<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/content-image.php
 *
 * Image Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'csseco-format-image' ); ?>>
    <header class="entry-header bg-img-el" style="background-image: url(<?php echo csseco_get_post_attachment(); ?>)">
	    <?php
            the_title(
                '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
                '</a></h1>'
            );
	    ?>
        <div class="entry-meta">
			<?php echo csseco_posted_meta(); ?>
        </div><!-- /.entry-meta -->
        <div class="entry-excerpt">
			<?php the_excerpt(); ?>
        </div><!-- /.entry-excerpt -->
    </header><!--/.entry-header-->
	<footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>