<ul id="js-list" class="p-list origin">
<li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_01">パートナー弁護士</a></li>
<li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_02">外国法パートナー</a></li>
<!-- <li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_03">カウンセル弁護士</a></li> -->
<li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_04">アソシエイト弁護士</a></li>
<li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_05">客員弁護士</a></li>
<li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_06">シニアカウンセル弁護士</a></li>
<li class="p-list__item is-current "><a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/#block_07">特別顧問</a></li>
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
  // $sidebar = 'works_widget';
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
