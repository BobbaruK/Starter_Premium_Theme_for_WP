<?php
/**
 * @package CSSecoThemes
 * includes/front/template-parts/content-gallery.php
 *
 * Gallery Post Format
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'csseco-format-gallery' ); ?>>
    <header class="entry-header">
	    <?php
	        if ( csseco_get_post_attachment() ) {
		        $attachments = csseco_get_post_attachment(10);
	            //var_dump($attachments);
        ?>
            
            <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                        $i = 0;
                        foreach ($attachments as $attachment) {
	                        $active = ($i == 0 ? 'active' : '');
                    ?>
                        <li data-target="#post-gallery-<?php the_ID(); ?>" class="<?php echo $active; ?>" data-slide-to="<?php echo $i; ?>"></li>
                    <?php
                            $i++;
                        }
                    ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                        /* Ca sa vezi preview de la urmatoare si anterioara imagine: https://youtu.be/w0ViEuTgUDI?t=32m43s */
                        for ( $i = 0; $i < count($attachments); $i++ ) {
                            $active = ($i == 0 ? 'active' : '');
                    ?>
                        <div class="item <?php echo $active; ?> csseco_slides bg-img-el" style="background-image: url(<?php echo wp_get_attachment_url( $attachments[$i]->ID ); ?>)">
                        </div><!-- /.item -->
                    <?php
                        }
                    ?>
                </div><!-- /.carousel-inner -->
                <!-- Controls -->
                <a class="left carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
                    <div class="table">
                        <div class="table-cell">
                            <div class="control-wrapper">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                <span class="preview-thumb preview-thumb-prev bg-img-el"></span>
                                <span class="sr-only">Previous</span>
                            </div><!-- /.control-wrapper -->
                        </div><!-- /.table-cell -->
                    </div><!-- /.table -->
                </a>
                <a class="right carousel-control" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
                    <div class="table">
                        <div class="table-cell">
                            <div class="control-wrapper">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                <span class="preview-thumb preview-thumb-next bg-img-el"></span>
                                <span class="sr-only">Next</span>
                            </div><!-- /.control-wrapper -->
                        </div><!-- /.table-cell -->
                    </div><!-- /.table -->
                </a>
            </div><!-- /.carousel -->
                
	    <?php } ?>
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