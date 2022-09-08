<?php
$dp_options = get_design_plus_options();
$prefix = is_front_page() ? 'index_' : '';
?>

<ul id="news-tab-list__panel--all" class="p-news-tab-list__panel p-news-list is-active">
  <!-- 固定 コロナ 終了時消す -->
  <li class="p-news-list__item p-article04 important_art">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>news/%e6%96%b0%e5%9e%8b%e3%82%b3%e3%83%ad%e3%83%8a%e3%82%a6%e3%82%a4%e3%83%ab%e3%82%b9%e3%81%ae%e6%84%9f%e6%9f%93%e9%98%b2%e6%ad%a2%e7%ad%96%e3%81%ab%e3%81%a4%e3%81%84%e3%81%a6_2021-03-22/">
              <time class="p-article04__date" datetime="2020-06-16">2021.03.22</time>
                      <span class="p-article04__cat p-cat p-cat--sm p-cat--18">案内</span>
              <h3 class="p-article04__title">新型コロナウイルスの感染防止策について</h3>
      </a>
    </li>
    <!-- /固定 コロナ 終了時消す -->
  <?php
  if ( is_front_page() ) :
    $args = array(
      'post_type' => 'news',
      'post_status' => 'publish',
      'posts_per_page' => $dp_options['index_news_num']
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) :
        $the_query->the_post();
        $news_cats = get_the_terms( $post->ID, 'news_category' );
  ?>
  <li class="p-news-list__item p-article04">
    <a href="<?php the_permalink(); ?>">
      <?php if ( $dp_options['news_show_date'] ) : ?>
      <time class="p-article04__date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y.m.d' ); ?></time>
      <?php endif; ?>

      <?php if ( $dp_options['news_show_category'] && $news_cats ) : ?>
        <span class="p-article04__cat p-cat p-cat--sm p-cat--<?php echo esc_attr( $news_cats[0]->term_id ); ?>"><?php echo esc_html( $news_cats[0]->name ); ?></span>
      <?php endif; ?>
      <h3 class="p-article04__title"><?php echo wp_trim_words( get_the_title(), 73, '...' ); ?></h3>
    </a>
  </li>
  <?php
      endwhile;
      wp_reset_postdata();
    endif;

  else : // News archives

    if ( have_posts() ) :
      while ( have_posts() ) :
        the_post();
        $news_cats = get_the_terms( $post->ID, 'news_category' );
  ?>
  <li class="p-news-list__item p-article04">
    <a href="<?php the_permalink(); ?>">
      <?php if ( $dp_options['news_show_date'] ) : ?>
      <time class="p-article04__date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y.m.d' ); ?></time>
      <?php endif; ?>
      <?php if ( $dp_options['news_show_category'] && $news_cats ) : ?>
        <span class="p-article04__cat p-cat p-cat--sm p-cat--<?php echo esc_attr( $news_cats[0]->term_id ); ?>"><?php echo esc_html( $news_cats[0]->name ); ?></span>
      <?php endif; ?>
      <h3 class="p-article04__title"><?php echo wp_trim_words( get_the_title(), 73, '...' ); ?></h3>
    </a>
  </li>
  <?php
      endwhile;
    endif;

  endif;
  ?>

</ul>

<?php for ( $i = 1; $i <= 4; $i++ ) : ?>

  <?php if ( $dp_options[$prefix . 'news_tab_cat' . $i] ) : ?>
  <ul id="news-tab-list__panel--<?php echo $i; ?>" class="p-news-tab-list__panel p-news-list">
    <?php
    $tab_args = array(
      'post_type' => 'news',
      'post_status' => 'publish',
      'posts_per_page' => is_front_page() ? $dp_options['index_news_num'] : -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'news_category',
          'field' => 'term_id',
          'terms' => $dp_options[$prefix . 'news_tab_cat' . $i]
        )
      )
    );
    $tab_query = new WP_Query( $tab_args );

    if ( $tab_query->have_posts() ) :
      while ( $tab_query->have_posts() ) :
        $tab_query->the_post();
    ?>
    <li class="p-news-list__item p-article04">
      <a href="<?php the_permalink(); ?>">

        <?php if ( $dp_options['news_show_date'] ) : ?>
        <time class="p-article04__date" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y.m.d' ); ?></time>
        <?php endif; ?>

        <h3 class="p-article04__title"><?php echo wp_trim_words( get_the_title(), 43, '...' ); ?></h3>
      </a>
    </li>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </ul>
  <?php endif; ?>

<?php endfor; ?>
