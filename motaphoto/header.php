<?php
/**
 * Header du thème Motaphoto
 * @package motaphoto
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
// Hook pour injections (accessibilité, analytics, etc.)
wp_body_open();
?>

<a class="screen-reader-text" href="#primary"><?php _e( 'Aller au contenu', 'motaphoto' ); ?></a>

<header id="masthead" class="site-header">
  <div class="site-branding">
    <?php
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();
    }
    $blog_info = get_bloginfo( 'name' );
    if ( ! empty( $blog_info ) ) :
        if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p>
        <?php endif;
    endif;

    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo esc_html( $description ); ?></p>
    <?php endif; ?>
  </div>

  <nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Menu principal', 'motaphoto' ); ?>">
    <?php
    wp_nav_menu( [
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'primary-menu',
      'fallback_cb'    => '__return_empty_string', // évite le menu par défaut WP
    ] );
    ?>
  </nav>
</header>

<main id="primary" class="site-main">
