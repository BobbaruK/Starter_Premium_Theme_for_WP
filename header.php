<?php
/**
 * @package CSSecoThemes
 * header.php
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right'); ?><?php bloginfo( 'name' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php if( is_singular() && pings_open( get_queried_object() ) ) { ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php } ?>

        <?php wp_head(); ?>

        <?php
            $csseco_front_customcss = esc_attr( get_option( 'css_customcss' ) );
            if( !empty($csseco_front_customcss) ) {
                echo '<style type="text/css" media="all">' . $csseco_front_customcss . '</style>';
            }
        ?>
    </head>
    <body <?php body_class(); ?>>
        <header id="cssecoHeader" class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Header</p>
                        <?php
                            wp_nav_menu(array(
                                'theme_location'        =>      'primary',
                                'container'             =>      'nav',
                                'container_class'       =>      'header_menu',
                                'container_id'          =>      'cssecoMenu' //
                            ));
                        ?>
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </header>
        <hr>
        <hr>
        <hr>
        <div id="cssecoContent" class="site-content">