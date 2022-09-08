<?php
/**
* Template Name: フォーム用テンプレート
* Description: eureka 211104 [仕様変更]#0005 フォーム用画面カバー対応
*/
$ph_title = $post->ph_title;
$ph_sub = $post->ph_sub;
$catch = $post->catch_and_desc_catch;
?>

<?php get_header(); ?>

<div class="l-contents l-contents--no-border fm-template">

  <header class="fm-cover l-inner">
    <div class="fm-cover__inner">
      <h1 class="fm-cover__title"><?php echo esc_html($ph_title); ?></h1>
    </div>
  </header>

  <div class="l-contents__inner l-inner<?php if (! $catch) { echo ' mt50'; } ?>">

    <div class="l-primary">

      <?php if ($catch) { get_template_part('template-parts/archive-header'); } ?>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="p-entry__body">
        <?php remove_filter('the_content', 'wpautop'); ?>
        <?php the_content(); ?>
      </div>
      <?php endwhile; endif; ?>

    </div><!-- /.l-primary -->
  </div>
</div>

<?php get_footer(); ?>