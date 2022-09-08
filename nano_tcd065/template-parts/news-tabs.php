<?php
$dp_options = get_design_plus_options();
$prefix = is_front_page() ? 'index_' : ''; //トップページへの出力
?>

<?php //if ( $dp_options[$prefix . 'news_tab_cat1'] || $dp_options[$prefix . 'news_tab_cat2'] || $dp_options[$prefix . 'news_tab_cat3'] || $dp_options[$prefix . 'news_tab_cat4'] ) : ?>
<?php if ( $dp_options[$prefix . 'news_tab_cat1'] || $dp_options[$prefix . 'news_tab_cat2'] ) : ?>
<div class="p-news-tab-list__tabs-wrapper">
  <ul class="p-news-tab-list__tabs">

    <li class="p-news-tab-list__tabs-item is-active">
      <a href="#news-tab-list__panel--all"><?php _e( 'Latest info', 'tcd-w' ); ?></a>
    </li>
    <?php
    for ( $i = 1; $i <= 4; $i++ ) {

      if ( ! $dp_options[$prefix . 'news_tab_cat' . $i] ) continue;

      $news_cat = get_term_by( 'id', $dp_options[$prefix . 'news_tab_cat' . $i], 'news_category');

      echo '<li class="p-news-tab-list__tabs-item">';
      echo '<a href="#news-tab-list__panel--' . $i . '">';
      echo esc_html( $news_cat->name );
      echo '</a></li>';

    }
    ?>

  </ul>
</div>
<?php endif; ?>
