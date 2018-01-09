<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/single.php
 *
 * Single Post Tempalte
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'csseco-single-post', 'reveal' ) ); ?>>
	<header class="entry-header">
		<?php
		the_title(
			'<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
			'</a></h1>'
		);
		?>
		<div class="entry-meta">
			<?php echo csseco_posted_meta(); ?>
		</div><!-- /.entry-meta -->
	</header><!--/.entry-header-->
	<div class="entry-content">
		<?php
			if ( has_post_thumbnail() ) {
		?>
			<img class="single-featured" src="<?php echo csseco_get_post_attachment(); ?>">

		<?php } ?>
		<?php the_content(); ?>
	</div><!-- /.entry-content -->
	<footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>
