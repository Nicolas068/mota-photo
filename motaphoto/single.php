<?php
/**
 * Template pour un article (single post)
 * @package motaphoto
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Sécurité
}

get_header();
?>

<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <p class="entry-meta">
                        <?php
                        printf(
                            __( 'Publié le %1$s par %2$s', 'motaphoto' ),
                            esc_html( get_the_date() ),
                            esc_html( get_the_author() )
                        );
                        ?>
                    </p>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php the_tags( '<span class="tag-links">', '', '</span>' ); ?>
                </footer>
            </article>

            <?php
            // Navigation article précédent/suivant
            the_post_navigation( [
                'prev_text' => __( '← Article précédent', 'motaphoto' ),
                'next_text' => __( 'Article suivant →', 'motaphoto' ),
            ] );

            // Commentaires
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
