<?php
/**
 * Index.php
 * Fichier principal du thème WordPress
 * Sert de fallback si aucun autre template n’existe
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sécurité : empêche l’accès direct
}

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    else :
        echo '<p>' . __( 'Aucun contenu trouvé.', 'mon-theme' ) . '</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
