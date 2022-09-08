<div class="p-page-header">
    <h1 class="p-page-header__title">検索結果</h1>
    <p class="p-page-header__sub">search</p>
  </div>

<div class="l-secondary">
<?php
if ( is_active_sidebar( $sidebar ) ) {
  dynamic_sidebar( $sidebar );
} elseif ( is_active_sidebar( 'common_widget' ) ) {
  dynamic_sidebar( 'common_widget' );
}
?>
</div><!-- /.l-secondary -->

<!-- /.l-secondary -->
