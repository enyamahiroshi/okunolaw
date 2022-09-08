<ul id="js-list" class="p-list">
<li class="p-list__item is-parent"><a href="#block_01">事業再生・倒産</a></li>
<li class="p-list__item is-parent"><a href="#block_02">コーポレート</a></li>
<li class="p-list__item is-parent"><a href="#block_03">M&A</a></li>
<li class="p-list__item is-parent"><a href="#block_04">労働法</a></li>
<li class="p-list__item is-parent"><a href="#block_05">IT・知的財産権</a></li>
<li class="p-list__item is-parent"><a href="#block_06">競争法</a></li>
<li class="p-list__item is-parent"><a href="#block_07">ファイナンス</a></li>
<li class="p-list__item is-parent"><a href="#block_08">国際法務</a></li>
<li class="p-list__item is-parent"><a href="#block_09">中小企業・同族企業からのご相談</a></li>
<li class="p-list__item is-parent"><a href="#block_10">個人の皆様からのご相談</a></li>
<li class="p-list__item is-parent"><a href="#block_11">高齢化社会に向けて</a></li>
<li class="p-list__item is-parent"><a href="#block_12">教育・社会貢献活動等</a></li>
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
