<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/content-link.php
 *
 * Link Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'csseco-format-link' ) ); ?>>
	<header class="entry-header">
		<?php
		$link = csseco_grab_url();
			the_title(
				'<h1 class="entry-title"><a href="'.$link.'" target="_blank">',
				'<i class="fa fa-link" aria-hidden="true"></i></a></h1>'
			);
		?>
	</header><!--/.entry-header-->
	<footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>