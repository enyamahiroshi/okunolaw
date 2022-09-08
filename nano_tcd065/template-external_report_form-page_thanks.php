<?php
/**
* Template Name: 外部通報フォーム用テンプレート［完了］
* Description: eureka 220724 外部通報フォーム用
*/
?>
<?php get_header("er_form"); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php while ( have_posts() ): the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </header><!-- .entry-header -->
      <div class="entry-content">
        <?php the_content(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->
    <?php endwhile; ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer("er_form"); ?>