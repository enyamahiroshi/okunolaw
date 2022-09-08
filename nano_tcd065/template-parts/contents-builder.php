<?php
$dp_options = get_design_plus_options();

$news_label = $dp_options['news_breadcrumb'] ? $dp_options['news_breadcrumb'] : __( 'News', 'tcd-w' );
$works_label = $dp_options['works_breadcrumb'] ? $dp_options['works_breadcrumb'] : __( 'Works', 'tcd-w' );

$args = array(
  'post_type' => 'works',
  'post_status' => 'publish',
  'posts_per_page' => $dp_options['index_works_num']
);

$the_query = new WP_Query( $args );
?>

<?php foreach ( $dp_options['index_contents_order'] as $order ) : ?>

  <?php if ( 'news' === $order && $dp_options['display_index_news'] ) : ?>
  <div class="p-index-content03 p-cb__item l-inner">
    <div class="p-cb__item-header">
      <h2 class="p-cb__item-title sq_ptn00"><?php echo esc_html( $dp_options['index_news_title'] ); ?></h2>
      <p class="p-cb__item-sub"><?php echo esc_html( $dp_options['index_news_sub'] ); ?></p>
      <?php if ( $dp_options['index_news_desc'] ) : ?>
      <p class="p-cb__item-desc"><?php echo nl2br( esc_html( $dp_options['index_news_desc'] ) ); ?></p>
      <?php endif; ?>
    </div>
    <div id="js-news-tab-list" class="p-news-tab-list">
      <?php get_template_part( 'template-parts/news-tabs' ); ?>
      <?php get_template_part( 'template-parts/news-panels' ); ?>
    </div>
    <p class="p-btn">
      <a href="<?php echo get_post_type_archive_link( 'news' ); ?>">お知らせ一覧</a>
    </p>
  </div>

  <?php elseif ( 'service' === $order && $dp_options['display_index_service'] ) : ?>
  <div class="p-index-content04 p-cb__item">
    <div class="p-index-content04__inner l-inner">
      <div class="p-cb__item-header">
        <h2 class="p-cb__item-title sq_ptn01"><span><?php echo esc_html( $dp_options['index_service_title'] ); ?></span></h2>
        <p class="p-cb__item-sub"><?php echo esc_html( $dp_options['index_service_sub'] ); ?></p>
        <?php if ( $dp_options['index_service_desc'] ) : ?>
        <p class="p-cb__item-desc"><?php echo nl2br( esc_html( $dp_options['index_service_desc'] ) ); ?></p>
        <?php endif; ?>
      </div>
      <ul class="p-index-content04__list p-three-box">
        <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
        <li class="p-three-box__item p-article12">
          <a href="<?php echo esc_attr( $dp_options['index_service_box_url' . $i] ); ?>"<?php if ( $dp_options['index_service_box_target' . $i] ) { echo ' target="_blank"'; } ?>>
            <div class="p-article12__header">
              <h3 class="p-article12__title"><?php echo esc_html( $dp_options['index_service_box_title' . $i] ); ?></h3>
              <p class="p-article12__sub"><?php echo esc_html( $dp_options['index_service_box_sub' . $i] ); ?></p>
            </div>
            <p class="p-article12__desc"><?php echo nl2br( esc_html( $dp_options['index_service_box_desc' . $i] ) ); ?></p>
            <div class="p-article12__img">
              <?php echo wp_get_attachment_image( $dp_options['index_service_box_img' . $i], 'full' ); ?>
            </div>
          </a>
        </li>
        <?php endfor; ?>
      </ul>
      <p class="p-btn">
        <a href="<?php echo esc_attr( $dp_options['index_service_btn_url'] ); ?>"<?php if ( $dp_options['index_service_btn_target'] ) { echo ' target="_blank"'; } ?>><?php echo esc_html( $dp_options['index_service_btn_label'] ); ?></a>
      </p>
    </div>
  </div>

  <?php elseif ( 'banner' === $order && $dp_options['display_index_banner'] ) : ?>

  <div class="p-index-content05 p-cb__item l-inner">
    <?php
    for ( $i = 1; $i <= 6; $i++ ) :
      if ( ! $dp_options['index_banner_img' . $i] ) continue;
    ?>
    <div class="p-index-content05__item <?php echo 'p-index-content05__item--' . $i; ?>">
      <div class="p-index-content05__item-banner p-article11">
        <a href="<?php echo esc_attr( $dp_options['index_banner_url' . $i] ); ?>"<?php if ( $dp_options['index_banner_target' . $i] ) { echo ' target="_blank"'; } ?>>
          <div class="p-article11__content">
            <p class="p-article11__title"><?php echo esc_html( $dp_options['index_banner_title' . $i] ); ?></p>
            <p class="p-article11__sub"><?php echo esc_html( $dp_options['index_banner_sub' . $i] ); ?></p>
          </div>
          <?php echo wp_get_attachment_image( $dp_options['index_banner_img' . $i], 'size12', false, array( 'class' => 'p-article11__img' ) ); ?>
        </a>
      </div>
      <p class="p-index-content05__item-desc"><?php echo nl2br( esc_html( $dp_options['index_banner_desc' . $i] ) ); ?></p>
    </div>
    <?php endfor; ?>
  </div>

  <?php elseif ( 'works' === $order && $dp_options['display_index_works'] ) : ?>
  <div class="p-index-content06 p-cb__item l-inner">
    <div class="p-cb__item-header">
      <h2 class="p-cb__item-title sq_ptn02"><span><?php echo esc_html( $dp_options['index_works_title'] ); ?></span></h2>
      <p class="p-cb__item-sub"><?php echo esc_html( $dp_options['index_works_sub'] ); ?></p>
      <?php if ( $dp_options['index_works_desc'] ) : ?>
      <p class="p-cb__item-desc"><?php echo nl2br( esc_html( $dp_options['index_works_desc'] ) ); ?></p>
      <?php endif; ?>
    </div>

    <div class="p-works-list mb0">
      <?php
      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) :
          $the_query->the_post();
          $categories = get_the_terms( $post->ID, 'works_category' );
      ?>
      <article class="p-works-list__item p-article06">
      <a href="<?php the_permalink(); ?>" class="p-works-list__card">
        <div class="p-article06__content">
          <h3 class="p-article06__title">
          <?php echo wp_trim_words( get_the_title(), 29, '...' ); ?>
          </h3>
          <!-- <p class="p-article06__excerpt"><?php //echo wp_trim_words( get_the_excerpt(), 63, '...' ); ?></p> -->

        </div>
        </a>
        <?php if ( $dp_options['works_show_category'] && $categories ) : ?>
        <a class="p-article06__cat" href="<?php echo get_category_link( $categories[0]->term_id ); ?>">
          <?php echo esc_html( $categories[0]->name ); ?>
        </a>
        <?php endif; ?>
      </article>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>

    <p class="p-btn">
      <a href="<?php echo get_post_type_archive_link( 'works' ); ?>"><?php echo esc_html( $works_label ); ?></span></a>
    </p>
  </div><!-- /.p-cb__item -->

  <?php
  elseif ( 'wysiwyg1' === $order || 'wysiwyg2' === $order || 'wysiwyg3' === $order ) :

    $key = mb_substr( $order, -1 );
    if ( ! $dp_options['display_index_wysiwyg' . $key] ) continue;
  ?>
  <div class="p-index-content07 p-cb__item l-inner">
    <?php echo apply_filters( 'the_content', $dp_options['index_wysiwyg_editor' . $key] ); ?>
  </div><!-- /.p-cb__item -->

  <?php endif; ?>

<?php endforeach; ?>
