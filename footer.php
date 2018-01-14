<?php
/**
 * @package CSSecoThemes
 * footer.php
 *
 */
?>
            </div><!-- /.container -->
        </div> <!-- END #cssecoContent & .site-content-->
        <footer id="cssecoFooter" class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
	                    <?php
                            wp_nav_menu(array(
                                'theme_location'        =>      'footer',
                                'container'             =>      'nav',
                                'container_class'       =>      'footer_menu',
                                'container_id'          =>      'cssecoMenu' //
                            ));
	                    ?>
                        <p>Footer</p>
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer>
    </div><!-- /#sitePage -->
    <?php wp_footer(); ?>
    </body>
</html>