<ul id="js-list" class="p-list">
<li class="p-list__item is-parent"><a href="#block_01">ご挨拶</a></li>
<li class="p-list__item is-parent"><a href="#block_02">沿革</a></li>
<li class="p-list__item is-parent"><a href="#block_03">アクセス</a></li>
</ul>

<?php
$sidebar = '';

if ( is_post_type_archive( 'news' ) || is_singular( 'news' ) ) {
  $sidebar = 'news_widget';
} elseif ( is_tax( 'company_category' ) || is_singular( 'company' ) ) {
  $sidebar = 'company_widget';
} elseif ( is_tax( 'service_category' ) || is_singular( 'service' ) ) {
  $sidebar = 'service_widget';
} elseif ( is_tax( 'works_category' ) || is_singular( 'works' ) ) {
  $sidebar = 'works_widget';
} else {
  $sidebar = 'blog_widget';
}

if ( is_mobile() ) {
  $sidebar .= '_sp';
}
?>

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
