<?php $dp_options = get_design_plus_options(); ?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/header-contents' ); ?>

<div class="l-contents<?php if ( $dp_options['display_index_content01'] ) { echo ' l-contents--no-border'; } ?>">
  <div class="l-contents__inner">
    <div class="l-primary">
      <div id="js-cb" class="p-cb">

        <?php get_template_part( 'template-parts/contents-builder' ); ?>

        <div class="p-index-content03 p-cb__item p-cb__item__column l-inner ">
          <div class="p-cb__item-header">
            <h2 class="p-cb__item-title sq_ptn00">最新のコラム</h2>
            <p class="p-cb__item-sub">COLUMN</p>
          </div>
          <div id="js-news-tab-list" class="p-news-tab-list">
            <ul id="news-tab-list__panel--all" class="p-news-tab-list__panel p-news-list is-active">
              <?php
              $args = array( 'posts_per_page' => 5, );  //表示記事数
              $postslist = get_posts( $args );
              foreach ( $postslist as $post ) :  //ループ開始
              setup_postdata( $post ); ?>
                <div>
                  <li class="p-news-list__item p-article04">
                  <a href="<?php the_permalink(); ?>">
                  <time class="p-article04__date" datetime="<?php the_title(); ?>"><?php the_title(); ?></time>
                  <h3 class="p-article04__title"><?php the_excerpt(); ?></h3>
                  </a>
                  </li>
                </div>
              <?php
              endforeach; //ループ終了
              wp_reset_postdata(); //直前のクエリ復元
              ?>
            </ul>
          </div>
          <p class="p-btn">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>category/insights/">コラム一覧</a>
          </p>
        </div>

      </div><!-- /.p-cb -->
    </div><!-- /.l-primary -->
  </div>
</div>

<?php get_footer(); ?>
