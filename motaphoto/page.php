<?php
/**
 * Template pour une page
 * @package motaphoto
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    // Pagination si la page est découpée avec <!--nextpage-->
                    wp_link_pages( [
                        'before' => '<div class="page-links">' . __( 'Pages:', 'motaphoto' ),
                        'after'  => '</div>',
                    ] );
                    ?>
                </div>
            </article>

            <?php
            // Commentaires sur les pages (optionnel, activé si nécessaire)
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
