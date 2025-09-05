<?php
/**
 * Footer du thème Motaphoto
 * @package motaphoto
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

</main><!-- #primary -->

<footer id="colophon" class="site-footer">
  <div class="site-info">
    <p>
      &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
      <?php bloginfo( 'name' ); ?> —
      <?php _e( 'Tous droits réservés.', 'motaphoto' ); ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
