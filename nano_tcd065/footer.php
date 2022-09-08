<?php
$dp_options = get_design_plus_options();

$args = array(
  'container' => 'false',
  'menu_class' => 'p-footer-nav',
  'depth' => 1,
  'theme_location' => 'footer'
);

$sidebar = is_mobile() ? 'footer_widget_sp' : 'footer_widget';
?>
  </main>
  <footer class="l-footer">

    <?php if ( $dp_options['display_footer_banners'] ) : ?>
    <div class="p-footer-banners">
      <ul class="p-footer-banners__list l-inner">

        <?php
        for ( $i = 1; $i <= 3; $i++ ) {

          if ( ! $dp_options['footer_banners_banner_img' . $i] ) continue;

          echo '<li class="p-footer-banners__list-item p-banner p-banner--lg">';

          echo $dp_options['footer_banners_banner_target' . $i]
            ? '<a href="' . esc_url( $dp_options['footer_banners_banner_url' . $i] ) . '" target="_blank">'
            : '<a href="' . esc_url( $dp_options['footer_banners_banner_url' . $i] ) . '">';

          echo $dp_options['footer_banners_banner_display_gradation_overlay' . $i]
            ? '<div class="p-banner__content" style="background: linear-gradient(to right, rgba(' . implode( ',', hex2rgb( $dp_options['footer_banners_banner_gradation_overlay' . $i] ) ) . ', 0.75) 0%, transparent 75%);">'
            : '<div class="p-banner__content">';

          echo '<p>' . nl2br( esc_html( $dp_options['footer_banners_banner_title' . $i] ) ) . '</p>';

          echo '</div>';

          echo wp_get_attachment_image( $dp_options['footer_banners_banner_img' . $i], 'size5' );

          echo '</a></li>';
        }
        ?>

      </ul>
    </div>
    <?php endif; ?>

    <div class="p-info">
      <div class="p-info__inner l-inner">

        <?php get_template_part( 'template-parts/footer-logo' ); ?>

        <p class="p-info__desc"><?php echo esc_html( $dp_options['footer_catch'] ); ?></p>

	      <ul class="p-social-nav">
          <?php if ( $dp_options['facebook_url'] ) : ?>
          <li class="p-social-nav__item p-social-nav__item--facebook"><a href="<?php echo esc_url( $dp_options['facebook_url'] ); ?>"></a></li>
          <?php endif; ?>
          <?php if ( $dp_options['twitter_url'] ) : ?>
          <li class="p-social-nav__item p-social-nav__item--twitter"><a href="<?php echo esc_url( $dp_options['twitter_url'] ); ?>"></a></li>
          <?php endif; ?>
          <?php if ( $dp_options['insta_url'] ) : ?>
          <li class="p-social-nav__item p-social-nav__item--instagram"><a href="<?php echo esc_url( $dp_options['insta_url'] ); ?>"></a></li>
          <?php endif; ?>
          <?php if ( $dp_options['pinterest_url'] ) : ?>
          <li class="p-social-nav__item p-social-nav__item--pinterest"><a href="<?php echo esc_url( $dp_options['pinterest_url'] ); ?>"></a></li>
          <?php endif; ?>
          <?php if ( $dp_options['mail_url'] ) : ?>
          <li class="p-social-nav__item p-social-nav__item--mail"><a href="<?php echo 'mailto:'.esc_attr( $dp_options['mail_url'] ); ?>"></a></li>
          <?php endif; ?>
          <?php if ( $dp_options['show_rss'] ) : ?>
            <li class="p-social-nav__item p-social-nav__item--rss"><a href="<?php bloginfo( 'rss2_url' ); ?>"></a></li>
          <?php endif; ?>
	      </ul>
      </div>
    </div>
    <?php if ( is_active_sidebar( $sidebar ) ) : ?>
    <div class="p-footer-widgets">
      <div class="p-footer-widgets__inner l-inner">
        <?php dynamic_sidebar( $sidebar ); ?>
      </div>
    </div><!-- /.p-footer-widgets -->
    <?php endif; ?>
    <?php wp_nav_menu( $args ); ?>
    <p class="p-copyright">
      <small>Copyright &copy; OKUNO & PARTNERS. All Rights Reserved.</small>
    </p>
    <div id="js-pagetop" class="p-pagetop"><a href="#"></a></div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
