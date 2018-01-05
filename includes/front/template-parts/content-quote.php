<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/content-quote.php
 *
 * Quote Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'csseco-format-quote' ) ); ?>>
	<header class="entry-header text-center">
		<div class="row">
		    <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
			    <h1 class="qote-content">
				    <a href="<?php the_permalink(); ?>" rel="bookmark">
				        <?php echo get_the_content(); ?>
				    </a>
			    </h1>
			    <?php the_title('<h2 class="quote-author">','</h1>'); ?>
		    </div><!-- /.col-sm-10 -->
		</div><!-- /.row -->
	</header><!--/.entry-header-->
	<footer class="entry-footer">
		<?php echo csseco_posted_footer(); ?>
	</footer><!-- /.entry-footer -->
</article>