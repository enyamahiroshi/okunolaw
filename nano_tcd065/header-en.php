<?php
$dp_options = get_design_plus_options();

$header_fix = is_mobile() ? $dp_options['sp_header_fix'] : $dp_options['header_fix'];

$args = array(
  'container' => '',
  'menu_class' => 'p-global-nav p-global-nav-en l-inner',
  'menu_id' => 'js-global-nav',
  'link_after' => '<span class="p-global-nav__toggle"></span>',
  'theme_location' => 'global-en'
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php seo_description(); ?>">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&Oswald&Lato&display=swap" rel="stylesheet">
  <?php wp_head(); ?>

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript">
  $(function(){
  $(window).scroll(function (){
      $('.fadeinUp').each(function(){
                  $(this).addClass('scrollin');
      });
      $('.fadeDown').each(function(){
                  $(this).addClass('scrollin');
      });
  });
});
  </script>
</head>
<body <?php body_class('home','home-en'); ?>>

  <?php do_action( 'tcd_before_header', $dp_options ); ?>

  <header id="js-header" class="jp-header l-header<?php if ( 'type2' === $header_fix ) { echo ' l-header--fixed'; } ?>">
    <div class="l-header__inner l-inner">

      <?php get_template_part( 'template-parts/logo' ); ?>

      <p class="l-header__desc"><?php echo esc_html( $dp_options['header_catch'] ); ?></p>

      <?php if ( $dp_options['header_display_search'] ) : ?>
      <form id="js-header__form" role="search" method="get" class="l-header__form" action="<?php echo esc_url( home_url( '/' ) ); ?>" _lpchecked="1">
		    <input id="js-header__form-input" class="l-header__form-input" type="text" value="" name="s" tabindex="-1">
        <button id="js-header__form-close" class="l-header__form-close p-close-btn" aria-hidden="true" type="button"><?php _e( 'Close', 'tcd-w' ); ?></button>
      </form>
      <button id="js-header__search" class="l-header__search" aria-hidden="true">&#xe915;</button>
      <?php endif; ?>
      <div class="global_change">
        <a href="#" class="b_jp">JP</a> / <a href="#" class="b_en">EN</a>
      </div>
    </div>
    <button id="js-menu-btn" class="p-menu-btn c-menu-btn"></button>
    <nav id="js-header__nav" class="l-header__nav">
      <?php wp_nav_menu( $args ); ?>
      <button id="js-header__nav-close" class="l-header__nav-close p-close-btn"><?php _e( 'Close', 'tcd-w' ); ?></button>
    </nav>

    <?php get_template_part( 'template-parts/megamenu' ); ?>

  </header>
  <main class="l-main">
