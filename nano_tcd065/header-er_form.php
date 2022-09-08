<?php
$dp_options = get_design_plus_options();

$header_fix = is_mobile() ? $dp_options['sp_header_fix'] : $dp_options['header_fix'];

$args = array(
  'container' => '',
  'menu_class' => 'p-global-nav l-inner',
  'menu_id' => 'js-global-nav',
  'link_after' => '<span class="p-global-nav__toggle"></span>',
  'theme_location' => 'global'
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
  <meta name="description" content="<?php seo_description(); ?>">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&Oswald&Lato&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <link href="<?php echo get_stylesheet_directory_uri(); ?>/style-er_form.css" rel="stylesheet">

  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $(window).scroll(function() {
        $('.fadeinUp').each(function() {
          $(this).addClass('scrollin');
        });
        $('.fadeDown').each(function() {
          $(this).addClass('scrollin');
        });
      });
    });
  </script>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site no-sidebar">
	<div class="site-inner">

		<header id="masthead" class="site-header">
			<div class="site-header-main">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">奧野総合法律事務所</a></h1>
          <p class="site-description">外部通報フォーム</p>
				</div><!-- .site-branding -->
			</div><!-- .site-header-main -->

		</header><!-- .site-header -->

		<div id="content" class="site-content">
