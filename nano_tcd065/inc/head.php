<?php
function nano_inline_styles() {
	global $post;

	$dp_options = get_design_plus_options();

	$primary_color = $dp_options['primary_color'];
	$secondary_color = $dp_options['secondary_color'];

  $font_families = array(
    'type1' => 'Verdana, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "メイリオ", Meiryo, sans-serif',
    'type2' => '"Segoe UI", Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif',
    'type3' => '"Times New Roman", "游明朝", "Yu Mincho", "游明朝体", "YuMincho", "ヒラギノ明朝 Pro W3", "Hiragino Mincho Pro", "HiraMinProN-W3", "HGS明朝E", "ＭＳ Ｐ明朝", "MS PMincho", serif; font-weight: 500'
  );

  $prefix = is_mobile() ? 'sp_' : '';

  $categories = get_categories();
  $news_categories = get_terms( 'news_category' );

  $inline_styles = array();
  $responsive_styles = array();

  $inline_styles[] = array(
    'selectors' => array(
      '.c-comment__form-submit:hover',
      '.p-cb__item-btn a',
      '.c-pw__btn',
      '.p-readmore__btn:hover',
      '.p-page-links a:hover span',
      '.p-page-links > span',
      '.p-pager a:hover',
      '.p-pager span',
      '.p-pagetop:focus',
      '.p-pagetop:hover',
      '.p-widget__title'
    ),
    'properties' => sprintf( 'background: %s', esc_html( $primary_color ) )
  );

  $inline_styles[] = array(
    'selectors' => '.p-breadcrumb__item',
    'properties' => sprintf( 'color: %s', esc_html( $primary_color ) )
  );

  $inline_styles[] = array(
    'selectors' => array(
      '.widget_nav_menu a:hover',
      '.p-article02 a:hover .p-article02__title'
    ),
    'properties' => sprintf( 'color: %s', esc_html( $secondary_color ) )
  );

  // Content link color
  $inline_styles[] = array(
    'selectors' => '.p-entry__body a',
    'properties' => sprintf( 'color: %s', esc_html( $dp_options['content_link_color'] ) )
  );

  // Font type
  $inline_styles[] = array(
    'selectors' => array( 'body' ),
    'properties' => sprintf( 'font-family: %s', $font_families[$dp_options['font_type']] )
  );

  // Headline font type
  $inline_styles[] = array(
    'selectors' => array(
      '.c-logo',
      '.p-page-header__title',
      '.p-banner__title',
      '.p-cover__title',
      '.p-archive-header__title',
      '.p-article05__title',
      '.p-article09__title',
      '.p-cb__item-title',
      '.p-article11__title',
      '.p-article12__title',
      '.p-index-content01__title',
      '.p-header-content__title',
      '.p-megamenu01__item-list > li > a',
      '.p-article13__title',
      '.p-megamenu02__title',
      '.p-cover__header-title'
    ),
    'properties' => sprintf( 'font-family: %s', $font_families[$dp_options['headline_font_type']] )
  );

  // Hover effect
  switch ( $dp_options['hover_type'] ) {

    case 'type1' :
      $inline_styles[] = array(
        'selectors' => '.p-hover-effect--type1:hover img',
        'properties' => array(
          sprintf( '-webkit-transform: scale(%s)', esc_html( $dp_options['hover1_zoom'] ) ),
          sprintf( 'transform: scale(%s)', esc_html( $dp_options['hover1_zoom'] ) )
        )
      );
      break;

    case 'type2' :
      $inline_styles[] = array(
        'selectors' => '.p-hover-effect--type2:hover img',
        'properties' => sprintf( 'opacity:%s', esc_html( $dp_options['hover2_opacity'] ) )
      );
      $inline_styles[] = array(
        'selectors' => '.p-hover-effect--type2 img',
        'properties' => 'type1' === $dp_options['hover2_direct']
          ? array( 'margin-left: 15px', '-webkit-transform: scale(1.3) translate3d(-15px, 0, 0)', 'transform: scale(1.3) translate3d(-15px, 0, 0)' )
          : array( 'margin-left: -15px', '-webkit-transform: scale(1.3) translate3d(15px, 0, 0)', 'transform: scale(1.3) translate3d(15px, 0, 0)' )
      );
      break;

    case 'type3' :
      $inline_styles[] = array(
        'selectors' => '.p-hover-effect--type3',
        'properties' => sprintf( 'background: %s', esc_html( $dp_options['hover3_bgcolor'] ) )
      );
      $inline_styles[] = array(
        'selectors' => '.p-hover-effect--type3:hover img',
        'properties' => sprintf( 'opacity: %s', esc_html( $dp_options['hover3_opacity'] ) )
      );
      break;
  }

  // Logo
  if ( 'type1' === $dp_options[$prefix . 'header_use_logo_image'] ) {
    $inline_styles[] = array(
      'selectors' => '.l-header__logo a',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options[$prefix . 'header_logo_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options[$prefix . 'header_logo_font_size'] ) )
      )
    );
  }

  // Blog
  $inline_styles[] = array(
    'selectors' => '.p-blog__title',
    'properties' => array(
      sprintf( 'color: %s', esc_html( $dp_options['archive_catch_color'] ) ),
      sprintf( 'font-size: %dpx', esc_html( $dp_options['archive_catch_font_size'] ) )
    )
  );
  $responsive_styles['max-width: 767px'][] = array(
    'selectors' => '.p-blog__title',
    'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['archive_catch_font_size_sp'] ) )
  );

  foreach ( array_merge( $categories, $news_categories ) as $cat ) {
    $cat_color = get_term_meta( $cat->term_id, 'color', true );

    $inline_styles[] = array(
      'selectors' => '.p-cat--' . $cat->term_id,
      'properties' => array(
        sprintf( 'color: %s', esc_html( $cat_color ) ),
        sprintf( 'border: 1px solid %s', esc_html( $cat_color ) )
      )
    );
  }

  // News
  $inline_styles[] = array(
    'selectors' => '.p-article04:hover a .p-article04__title',
    'properties' => sprintf( 'color: %s', esc_html( $dp_options['news_key_color'] ) )
  );

  // Works
  $inline_styles[] = array(
    'selectors' => '.p-article06__content',
    'properties' => sprintf( 'border-left: 4px solid %s', esc_html( $dp_options['works_key_color'] ) )
  );
  $inline_styles[] = array(
    'selectors' => '.p-article06__title a:hover',
    'properties' => sprintf( 'color: %s', esc_html( $dp_options['works_key_color'] ) )
  );
  $inline_styles[] = array(
    'selectors' => '.p-article06__cat:hover',
    'properties' => sprintf( 'background: %s', esc_html( $dp_options['works_key_color'] ) )
  );

  // Header
  $inline_styles[] = array(
    'selectors' => '.l-header',
    'properties' => sprintf( 'background: %s', $dp_options['header_bg'] )
  );
  $inline_styles[] = array(
    'selectors' => '.l-header--fixed.is-active',
    'properties' => sprintf( 'background: %s', $dp_options['header_bg_fixed'] )
  );
  $inline_styles[] = array(
    'selectors' => '.l-header__desc',
    'properties' => array(
      sprintf( 'color: %s', $dp_options['header_catch_color'] ),
      sprintf( 'font-size: %dpx', $dp_options['header_catch_font_size'] )
    )
  );

  // Global navigation
  $inline_styles[] = array(
    'selectors' => '.l-header__nav',
    'properties' => sprintf( 'background: %s', $dp_options['gnav_bg'] )
  );
  $inline_styles[] = array(
    'selectors' => array(
      '.p-global-nav > li > a',
      '.p-menu-btn'
    ),
    'properties' => sprintf( 'color: %s', $dp_options['gnav_color'] )
  );
  $inline_styles[] = array(
    'selectors' => array(
      '.p-global-nav > li > a:hover',
      '.p-global-nav > .current-menu-item > a'
    ),
    'properties' => array(
      sprintf( 'background: %s', $dp_options['gnav_bg_hover'] ),
      sprintf( 'color: %s', $dp_options['gnav_color_hover'] )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-global-nav .sub-menu a',
    'properties' => array(
      sprintf( 'background: %s', esc_html( $dp_options['gnav_sub_bg'] ) ),
      sprintf( 'color: %s', esc_html( $dp_options['gnav_sub_color'] ) )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-global-nav .sub-menu a:hover',
    'properties' => array(
      sprintf( 'background: %s', esc_html( $dp_options['gnav_sub_bg_hover'] ) ),
      sprintf( 'color: %s', esc_html( $dp_options['gnav_sub_color_hover'] ) )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-global-nav .menu-item-has-children > a > .p-global-nav__toggle::before',
    'properties' => sprintf( 'border-color: %s', esc_html( $dp_options['gnav_color'] ) )
  );
  $responsive_styles['max-width: 1199px'][] = array(
    'selectors' => array(
      '.p-global-nav > li > a',
      '.p-global-nav > li > a:hover'
    ),
    'properties' => array(
      sprintf( 'background: %s', esc_html( $dp_options['gnav_bg_sp'] ) ),
      sprintf( 'color: %s', esc_html( $dp_options['gnav_color_sp'] ) )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-megamenu02::before',
    'properties' => sprintf( 'background: %s', esc_html( $dp_options['company_key_color'] ) )
  );
  $inline_styles[] = array(
    'selectors' => '.p-megamenu02__list a:hover .p-article13__title',
    'properties' => sprintf( 'color: %s', esc_html( $dp_options['company_key_color'] ) )
  );

  // Footer
  $inline_styles[] = array(
    'selectors' => '.p-footer-banners',
    'properties' => sprintf( 'background: %s', esc_html( $dp_options['footer_banners_bg'] ) )
  );

  $inline_styles[] = array(
    'selectors' => '.p-info',
    'properties' => array(
      sprintf( 'background: %s', esc_html( $dp_options['company_info_bg'] ) ),
      sprintf( 'color: %s', esc_html( $dp_options['company_info_color'] ) )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-info__logo',
    'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options[$prefix . 'footer_logo_font_size'] ) )
  );
  $inline_styles[] = array(
    'selectors' => '.p-info__desc',
    'properties' => array(
      sprintf( 'color: %s', $dp_options['footer_catch_color'] ),
      sprintf( 'font-size: %dpx', $dp_options['footer_catch_font_size'] )
    )
  );

  $inline_styles[] = array(
    'selectors' => '.p-footer-widgets',
    'properties' => array(
      sprintf( 'background: %s', $dp_options['footer_widgets_bg'] ),
      sprintf( 'color: %s', $dp_options['footer_widgets_color'] )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-footer-widget__title',
    'properties' => sprintf( 'color: %s', $dp_options['footer_widgets_headline_color'] )
  );

  $inline_styles[] = array(
    'selectors' => '.p-footer-nav',
    'properties' => array(
      sprintf( 'background: %s', esc_html( $dp_options['footer_menu_bg'] ) ),
      sprintf( 'color: %s', esc_html( $dp_options['footer_menu_color'] ) )
    )
  );
  $inline_styles[] = array(
    'selectors' => '.p-footer-nav a',
    'properties' => sprintf( 'color: %s', esc_html( $dp_options['footer_menu_color'] ) )
  );
  $inline_styles[] = array(
    'selectors' => '.p-footer-nav a:hover',
    'properties' => sprintf( 'color: %s', esc_html( $dp_options['footer_menu_color_hover'] ) )
  );

  $inline_styles[] = array(
    'selectors' => '.p-copyright',
    'properties' => sprintf( 'background: %s', esc_html( $dp_options['copyright_bg'] ) )
  );

  // Key color
  if ( is_post_type_archive() ) {
    $queried_object = get_queried_object();
    $post_type = $queried_object->name;
  } elseif ( is_tax() ) {
    $queried_object = get_queried_object();
    $taxonomy = get_taxonomy( $queried_object->taxonomy );
    $post_types = $taxonomy->object_type;
    $post_type = $post_types[0];
  } elseif ( is_single() && ! is_singular( 'post' ) ) {
    $queried_object = get_queried_object();
    $post_type = $queried_object->post_type;
  } else {
    $post_type = 'blog';
  }

  $key_color = $dp_options[$post_type . '_key_color'];

  $inline_styles[] = array(
    'selectors' => array(
      '.p-blog__title',
      '.p-entry',
      '.p-headline',
      '.p-cat-list__title'
    ),
    'properties' => sprintf( 'border-top: 3px solid %s', esc_html( $key_color ) )
  );
  $inline_styles[] = array(
    'selectors' => '.p-works-entry__header',
    'properties' => sprintf( 'border-bottom: 3px solid %s', esc_html( $key_color ) )
  );
  $inline_styles[] = array(
    'selectors' => array(
      '.p-article01 a:hover .p-article01__title',
      '.p-article03 a:hover .p-article03__title',
      '.p-article05__link',
      '.p-article08__title a:hover',
      '.p-article09__link',
      '.p-article07 a:hover .p-article07__title',
      '.p-article10 a:hover .p-article10__title'
    ),
    'properties' => sprintf( 'color: %s', esc_html( $key_color ) )
  );
  $inline_styles[] = array(
    'selectors' => array(
      '.p-page-header',
      '.p-list__item a::before',
      '.p-cover__header',
      '.p-works-entry__cat:hover',
      '.p-service-cat-header'
    ),
    'properties' => sprintf( 'background: %s', esc_html( $key_color ) )
  );
  $responsive_styles['max-width: 767px'][] = array(
    'selectors' => array(
      '.p-list .is-current > a'
    ),
    'properties' => sprintf( 'color: %s', esc_html( $key_color ) )
  );

  // Page header
  $inline_styles[] = array(
    'selectors' => array(
      '.p-page-header__title',
      '.p-cover__header-title'
    ),
    'properties' => array(
      sprintf( 'color: %s', esc_html( $dp_options[$post_type . '_title_color'] ) ),
      sprintf( 'font-size: %dpx', esc_html( $dp_options[$post_type . '_title_font_size'] ) )
    )
  );
  $inline_styles[] = array(
    'selectors' => array(
      '.p-page-header__sub',
      '.p-cover__header-sub'
    ),
    'properties' => array(
      sprintf( 'color: %s', esc_html( $dp_options[$post_type . '_sub_color'] ) ),
      sprintf( 'font-size: %dpx', esc_html( $dp_options[$post_type . '_sub_font_size'] ) )
    )
  );
  $responsive_styles['max-width: 991px'][] = array(
    'selectors' => array(
      '.p-page-header__title',
      '.p-cover__header-title'
    ),
    'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options[$post_type . '_title_font_size_sp'] ) )
  );
  $responsive_styles['max-width: 991px'][] = array(
    'selectors' => array(
      '.p-page-header__sub',
      '.p-cover__header-sub'
    ),
    'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options[$post_type . '_sub_font_size_sp'] ) )
  );

  // Cover
  if ( is_page() || is_404() || ( is_post_type_archive() && ! is_post_type_archive( 'news' ) ) ) {

    if ( is_page() ) {
      $ph_img = $post->ph_img;
      $ph_overlay = $post->ph_overlay;
      $ph_overlay_opacity = $post->ph_overlay_opacity;
      $ph_title_color = $post->ph_title_color;
      $ph_title_font_size = $post->ph_title_font_size;
      $ph_title_font_size_sp = $post->ph_title_font_size_sp;
      $ph_sub_color = $post->ph_sub_color;
    } elseif ( is_404() ) {
      $ph_img = $dp_options['404_ph_img'];
      $ph_overlay = $dp_options['404_ph_overlay'];
      $ph_overlay_opacity = $dp_options['404_ph_overlay_opacity'];
      $ph_title_color = $dp_options['404_ph_title_color'];
      $ph_title_font_size = $dp_options['404_ph_title_font_size'];
      $ph_title_font_size_sp = $dp_options['404_ph_title_font_size_sp'];
      $ph_sub_color = $dp_options['404_ph_sub_color'];
    } elseif ( is_post_type_archive() && ! is_post_type_archive( 'news' ) ) {
      $queried_object = get_queried_object();
      $post_type = $queried_object->name;

      $ph_img = $dp_options[$post_type . '_ph_img'];
      $ph_overlay = $dp_options[$post_type . '_ph_overlay'];
      $ph_overlay_opacity = $dp_options[$post_type . '_ph_overlay_opacity'];
      $ph_title_color = $dp_options[$post_type . '_ph_title_color'];
      $ph_title_font_size = $dp_options[$post_type . '_ph_title_font_size'];
      $ph_title_font_size_sp = $dp_options[$post_type . '_ph_title_font_size_sp'];
      $ph_sub_color = $dp_options[$post_type . '_ph_sub_color'];
    }

    $inline_styles[] = array(
      'selectors' => '.p-cover',
      'properties' => sprintf( 'background-image: url(%s)', wp_get_attachment_url( $ph_img ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-cover::before',
      'properties' => sprintf( 'background: rgba(%s, %s)', implode( ', ', hex2rgb( $ph_overlay ) ), $ph_overlay_opacity )
    );
    $inline_styles[] = array(
      'selectors' => '.p-cover__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $ph_title_color ) ),
        sprintf( 'font-size: %dpx', esc_html( $ph_title_font_size ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-cover__sub',
      'properties' => sprintf( 'color: %s', esc_html( $ph_sub_color ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-cover__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $ph_title_font_size_sp ) )
    );
  }

  // Archive header
  if ( ( is_post_type_archive() && ! is_post_type_archive( 'news' ) ) || is_tax( 'service_category' ) || is_page() ) {

    if ( is_page() ) {

      $catch_color = $post->catch_and_desc_catch_color;
      $catch_font_size = $post->catch_and_desc_catch_font_size;
      $catch_font_size_sp = $post->catch_and_desc_catch_font_size_sp;
      $desc_color = $post->catch_and_desc_desc_color;
      $desc_font_size = $post->catch_and_desc_desc_font_size;
      $desc_font_size_sp = $post->catch_and_desc_desc_font_size_sp;

    } else {

      if ( is_post_type_archive() ) {
        $queried_object = get_queried_object();
        $post_type = $queried_object->name;
      } elseif ( is_tax( 'service_category' ) ) {
        $post_type = 'service';
      }

      $catch_color = $dp_options[$post_type . '_archive_catch_color'];
      $catch_font_size = $dp_options[$post_type . '_archive_catch_font_size'];
      $catch_font_size_sp = $dp_options[$post_type . '_archive_catch_font_size_sp'];
      $desc_color = $dp_options[$post_type . '_archive_desc_color'];
      $desc_font_size = $dp_options[$post_type . '_archive_desc_font_size'];
      $desc_font_size_sp = $dp_options[$post_type . '_archive_desc_font_size_sp'];
    }

    $inline_styles[] = array(
      'selectors' => '.p-archive-header__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $catch_color ) ),
        sprintf( 'font-size: %dpx', esc_html( $catch_font_size ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-archive-header__desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $desc_color ) ),
        sprintf( 'font-size: %dpx', esc_html( $desc_font_size ) )
      )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-archive-header__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $catch_font_size_sp ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-archive-header__desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $desc_font_size_sp ) )
    );
  }

  if ( is_front_page() ) {

    if ( 'type1' === $dp_options['header_content_type'] ) { // Image

      for ( $i = 1; $i <= 5; $i++ ) {

        if ( ! $dp_options['header_slider_img' . $i] ) continue;

        $header_slider_img = $dp_options['header_slider_img' . $i];
        $header_slider_overlay = $dp_options['header_slider_overlay' . $i];
        $header_slider_overlay_opacity = $dp_options['header_slider_overlay_opacity' . $i];
        $header_slider_catch_color_sp = $dp_options['header_slider_catch_color' . $i];
        $header_slider_catch_font_size_sp = $dp_options['header_slider_catch_font_size_sp' . $i];

        if ( is_mobile() ) {
          $header_slider_img = $dp_options['header_slider_img_sp' . $i] ? $dp_options['header_slider_img_sp' . $i] : $header_slider_img ;

          if ( 'type1' !== $dp_options['header_slider_content_type_mobile'] ) {
            $header_slider_catch_color_sp = $dp_options['header_slider_catch_color_sp'];
            $header_slider_catch_font_size_sp = $dp_options['header_slider_catch_font_size_sp'];
            $header_slider_overlay = $dp_options['header_slider_overlay_sp' . $i];
            $header_slider_overlay_opacity = $dp_options['header_slider_overlay_opacity_sp' . $i];
          }
        }

        $inline_styles[] = array(
          'selectors' => ".p-header-slider__item--${i} .p-header-slider__item-img",
          'properties' => array(
            sprintf( 'background-image: url(%s)', esc_html( wp_get_attachment_url( $header_slider_img ) ) ),
            sprintf( 'animation-duration: %ds', esc_html( $dp_options['header_slider_animation_time'] + 1 ) )
          )
        );
        $inline_styles[] = array(
          'selectors' => ".p-header-slider__item--${i} .p-header-slider__item-img::before",
          'properties' => sprintf( 'background: rgba(%s, %s)', implode( ',', hex2rgb( $header_slider_overlay ) ), esc_html( $header_slider_overlay_opacity ) )
        );
        $inline_styles[] = array(
          'selectors' => ".p-header-slider__item--${i} .p-header-content__title",
          'properties' => array(
            sprintf( 'color: %s', esc_html( $dp_options['header_slider_catch_color' . $i] ) ),
            sprintf( 'font-size: %dpx', esc_html( $dp_options['header_slider_catch_font_size' . $i] ) )
          )
        );
        $inline_styles[] = array(
          'selectors' => ".p-header-slider__item--${i} .p-btn a",
          'properties' => array(
            sprintf( 'background: %s', esc_html( $dp_options['header_slider_btn_bg' . $i] ) ),
            sprintf( 'color: %s', esc_html( $dp_options['header_slider_btn_color' . $i] ) )
          )
        );
        $inline_styles[] = array(
          'selectors' => ".p-header-slider__item--${i} .p-btn a:hover",
          'properties' => array(
            sprintf( 'background: %s', esc_html( $dp_options['header_slider_btn_bg_hover' . $i] ) ),
            sprintf( 'color: %s', esc_html( $dp_options['header_slider_btn_color_hover' . $i] ) )
          )
        );
        $responsive_styles['max-width: 767px'][] = array(
          'selectors' => ".p-header-slider__item--${i} .p-header-content__title",
          'properties' => array(
            sprintf( 'color: %s', esc_html( $header_slider_catch_color_sp ) ),
            sprintf( 'font-size: %dpx', esc_html( $header_slider_catch_font_size_sp ) )
          )
        );

      }

    } else { // Video, YouTube

      $catch_color = $dp_options['header_video_catch_color'];
      $catch_font_size_sp = $dp_options['header_video_catch_font_size_sp_type1'];
      $overlay = $dp_options['header_video_overlay'];
      $overlay_opacity = $dp_options['header_video_overlay_opacity'];

      if ( is_mobile() ) {
        if ( 'type2' === $dp_options['header_video_content_type_mobile'] ) {
          $overlay = $dp_options['header_video_overlay_sp'];
          $overlay_opacity = $dp_options['header_video_overlay_opacity_sp'];
        } elseif ( 'type3' === $dp_options['header_video_content_type_mobile'] ) {
          $catch_color = $dp_options['header_video_catch_color_sp'];
          $catch_font_size_sp = $dp_options['header_video_catch_font_size_sp_type3'];
          $overlay = $dp_options['header_video_overlay_sp'];
          $overlay_opacity = $dp_options['header_video_overlay_opacity_sp'];
        }
      }

      $inline_styles[] = array(
        'selectors' => '.p-header-content::before',
        'properties' => sprintf( 'background: rgba(%s, %s)', esc_html( implode( ',', hex2rgb( $overlay ) ) ), esc_html( $overlay_opacity ) )
      );
      $inline_styles[] = array(
        'selectors' => '.p-header-content__title',
        'properties' => array(
          sprintf( 'color: %s', esc_html( $catch_color ) ),
          sprintf( 'font-size: %dpx', esc_html( $dp_options['header_video_catch_font_size'] ) )
        )
      );
      $responsive_styles['max-width: 767px'][] = array(
        'selectors' => '.p-header-content__title',
        'properties' => sprintf( 'font-size: %dpx', esc_html( $catch_font_size_sp ) )
      );
      $inline_styles[] = array(
        'selectors' => '.p-header-content .p-btn a',
        'properties' => array(
          sprintf( 'background: %s', esc_html( $dp_options['header_video_btn_bg'] ) ),
          sprintf( 'color: %s', esc_html( $dp_options['header_video_btn_color'] ) )
        )
      );
      $inline_styles[] = array(
        'selectors' => '.p-header-content .p-btn a:hover',
        'properties' => array(
          sprintf( 'background: %s', esc_html( $dp_options['header_video_btn_bg_hover'] ) ),
          sprintf( 'color: %s', esc_html( $dp_options['header_video_btn_color_hover'] ) )
        )
      );

      if ( wp_is_mobile() ) {

        $inline_styles[] = array(
          'selectors' => array(
            '.p-header-video',
            '.p-header-youtube',
          ),
          'properties' => sprintf( 'background-image: url(%s)', esc_html( wp_get_attachment_url( $dp_options['header_video_img'] ) ) )
        );
      }
    }

    // Contents after the header contents
    $inline_styles[] = array(
      'selectors' => '.p-index-content01__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_content01_catch_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_content01_catch_font_size'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content01__desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_content01_desc_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_content01_desc_font_size'] ) ),
      )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content01__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_content01_catch_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content01__desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_content01_desc_font_size_sp'] ) )
    );

    for ( $i = 1; $i <= 3; $i++ ) {
      $inline_styles[] = array(
        'selectors' => sprintf( '.p-index-content02 .p-article12:nth-child(%d) a:hover .p-article12__img::before', $i ),
        'properties' => sprintf( 'background: rgba(%s, %s)', implode( ', ', hex2rgb( $dp_options['index_content01_box_overlay' . $i] ) ), esc_html( $dp_options['index_content01_box_overlay_opacity' . $i] ) )
      );
    }

    $inline_styles[] = array(
      'selectors' => '.p-index-content02 .p-article12__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_content01_box_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_content01_box_title_font_size'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content02 .p-article12__sub',
      'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_content01_box_sub_color'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content02 .p-article12__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_content01_box_title_font_size_sp'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content02 .p-btn a',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_content01_btn_color'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_content01_btn_bg'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content02 .p-btn a:hover',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_content01_btn_color_hover'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_content01_btn_bg_hover'] ) ),
      )
    );

    // News
    $inline_styles[] = array(
      'selectors' => '.p-index-content03 .p-cb__item-title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_news_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_news_title_font_size'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content03 .p-cb__item-sub',
      'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_news_sub_color'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content03 .p-cb__item-desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_news_desc_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_news_desc_font_size'] ) ),
      )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content03 .p-cb__item-title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_news_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content03 .p-cb__item-desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_news_desc_font_size_sp'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content03 .p-btn a',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_news_btn_color'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_news_btn_bg'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content03 .p-btn a:hover',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_news_btn_color_hover'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_news_btn_bg_hover'] ) ),
      )
    );

    // Service
    $inline_styles[] = array(
      'selectors' => '.p-index-content04',
      'properties' => sprintf( 'background: %s', esc_html( $dp_options['index_service_bg'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-cb__item-title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_service_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_service_title_font_size'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-cb__item-sub',
      'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_service_sub_color'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-cb__item-desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_service_desc_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_service_desc_font_size'] ) ),
      )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content04 .p-cb__item-title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_service_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content04 .p-cb__item-desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_service_desc_font_size_sp'] ) )
    );

    for ( $i = 1; $i <= 3; $i++ ) {
      $inline_styles[] = array(
        'selectors' => sprintf( '.p-index-content04 .p-article12:nth-child(%d) a:hover .p-article12__img::before', $i ),
        'properties' => sprintf( 'background: rgba(%s, %s)', implode( ', ', hex2rgb( $dp_options['index_service_box_overlay' . $i] ) ), esc_html( $dp_options['index_service_box_overlay_opacity' . $i] ) )
      );
    }

    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-article12__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_service_box_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_service_box_title_font_size'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-article12__sub',
      'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_service_box_sub_color'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content04 .p-article12__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_service_box_title_font_size_sp'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-btn a',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_service_btn_color'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_service_btn_bg'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content04 .p-btn a:hover',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_service_btn_color_hover'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_service_btn_bg_hover'] ) ),
      )
    );

    // Banner
    for ( $i = 1; $i <= 6; $i++ ) {

      $inline_styles[] = array(
        'selectors' => sprintf( '.p-index-content05__item--%d .p-article11__title', $i ),
        'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_banner_title_color' . $i] ) )
      );
      $inline_styles[] = array(
        'selectors' => sprintf( '.p-index-content05__item--%d .p-article11__sub', $i ),
        'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_banner_sub_color' . $i] ) )
      );
      $inline_styles[] = array(
        'selectors' => sprintf( '.p-index-content05__item--%d .p-article11__desc', $i ),
        'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_banner_desc_color' . $i] ) )
      );

      if ( $dp_options['index_banner_display_overlay' . $i] ) {

        $overlay = $dp_options['index_banner_overlay' . $i];

        $inline_styles[] = array(
          'selectors' => sprintf( '.p-index-content05__item--%d .p-article11__content', $i ),
          'properties' => sprintf( 'background: linear-gradient(to right, rgba(%s, 1), rgba(%s, 0) 50%%)', implode( ', ', hex2rgb( $overlay ) ), implode( ', ', hex2rgb( $overlay ) ) )
        );
      }
    }

    // Works
    $inline_styles[] = array(
      'selectors' => '.p-index-content06 .p-cb__item-title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_works_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_works_title_font_size'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content06 .p-cb__item-sub',
      'properties' => sprintf( 'color: %s', esc_html( $dp_options['index_works_sub_color'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content06 .p-cb__item-desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_works_desc_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['index_works_desc_font_size'] ) ),
      )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content06 .p-cb__item-title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_works_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-index-content06 .p-cb__item-desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['index_works_desc_font_size_sp'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content06 .p-btn a',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_works_btn_color'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_works_btn_bg'] ) ),
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-index-content06 .p-btn a:hover',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['index_works_btn_color_hover'] ) ),
        sprintf( 'background: %s', esc_html( $dp_options['index_works_btn_bg_hover'] ) ),
      )
    );

  } elseif ( is_singular( 'post' ) || is_page() ) {

    $inline_styles[] = array(
      'selectors' => '.p-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['title_font_size'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['content_font_size'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['content_font_size_sp'] ) )
    );

  } elseif ( is_singular( 'news' ) ) {

    $inline_styles[] = array(
      'selectors' => '.p-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['news_single_title_font_size'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['news_content_font_size'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['news_single_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['news_content_font_size_sp'] ) )
    );

  } elseif ( is_singular( 'company' ) ) {

    $inline_styles[] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['company_content_font_size'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['company_content_font_size_sp'] ) )
    );

    $inline_styles[] = array(
      'selectors' => '.p-company-header__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $post->content_header_title_color ) ),
        sprintf( 'font-size: %dpx', esc_html( $post->content_header_title_font_size ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-company-header__sub',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $post->content_header_sub_color ) ),
        sprintf( 'font-size: %dpx', esc_html( $post->content_header_sub_font_size ) )
      )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-company-header__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $post->content_header_title_font_size_sp ) )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-company-header__sub',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $post->content_header_sub_font_size_sp ) )
    );

  } elseif ( is_singular( 'service' ) ) {

    $inline_styles[] = array(
      'selectors' => '.p-service-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_single_title_font_size'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_content_font_size'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-service-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_single_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_content_font_size_sp'] ) )
    );

  } elseif ( is_singular( 'works' ) ) {

    $inline_styles[] = array(
      'selectors' => '.p-works-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['works_single_title_font_size'] ) )
    );
    $inline_styles[] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['works_content_font_size'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-works-entry__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['works_single_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 767px'][] = array(
      'selectors' => '.p-entry__body',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['works_content_font_size_sp'] ) )
    );

  } elseif ( is_post_type_archive( 'company' ) ) {

    $inline_styles[] = array(
      'selectors' => '.p-article05__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['company_post_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['company_post_title_font_size'] ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-article05__sub',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['company_post_sub_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['company_post_sub_font_size'] ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-article05__desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['company_post_desc_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['company_post_desc_font_size'] ) )
      )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-article05__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['company_post_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-article05__sub',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['company_post_sub_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-article05__desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['company_post_desc_font_size_sp'] ) )
    );

  } elseif ( is_post_type_archive( 'service' ) ) {

    $inline_styles[] = array(
      'selectors' => '.p-article09__title',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['service_post_title_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['service_post_title_font_size'] ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-article09__sub',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['service_post_sub_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['service_post_sub_font_size'] ) )
      )
    );
    $inline_styles[] = array(
      'selectors' => '.p-article09__desc',
      'properties' => array(
        sprintf( 'color: %s', esc_html( $dp_options['service_post_desc_color'] ) ),
        sprintf( 'font-size: %dpx', esc_html( $dp_options['service_post_desc_font_size'] ) )
      )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-article09__title',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_post_title_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-article09__sub',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_post_sub_font_size_sp'] ) )
    );
    $responsive_styles['max-width: 991px'][] = array(
      'selectors' => '.p-article09__desc',
      'properties' => sprintf( 'font-size: %dpx', esc_html( $dp_options['service_post_desc_font_size_sp'] ) )
    );

  }

  // You can add styles with 'tcd_inline_styles' filter
  $inline_styles = apply_filters( 'tcd_inline_styles', $inline_styles, $dp_options );

  // You can add responsive styles with 'tcd_responsive_styles' filter
  $responsive_styles = apply_filters( 'tcd_responsive_styles', $responsive_styles, $dp_options );

  echo '<style>' . "\n";

  $output = '';

  // Add $inline_styles to $output
  foreach ( $inline_styles as $style ) {
    $selectors = is_array( $style['selectors'] ) ? implode( ',', $style['selectors'] ) : $style['selectors'];
    $properties = is_array( $style['properties'] ) ? implode( ';', $style['properties'] ) : $style['properties'];
    $output .= sprintf( '%s{%s}', $selectors, $properties );
  }

  // Add $responsive_styles to $output
  foreach ( $responsive_styles as $media_query => $styles ) {

    $output .= sprintf( '@media screen and (%s) {', $media_query );

    foreach ( $styles as $style ) {
      $selectors = is_array( $style['selectors'] ) ? implode( ',', $style['selectors'] ) : $style['selectors'];
      $properties = is_array( $style['properties'] ) ? implode( ';', $style['properties'] ) : $style['properties'];
      $output .= sprintf( '%s{%s}', $selectors, $properties );
    }

    $output .= '}';
  }

  if ( $output ) { echo $output; }

  do_action( 'tcd_head', $dp_options );

  // Custom CSS
  if ( $dp_options['css_code'] ) { echo $dp_options['css_code']; }

  echo '</style>' . "\n";

}
add_action( 'wp_head', 'nano_inline_styles' );
