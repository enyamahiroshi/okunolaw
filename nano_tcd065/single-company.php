<?php $dp_options = get_design_plus_options(); ?>

<?php get_header(); ?>

<?php //get_template_part( 'template-parts/breadcrumb' ); ?>

<ol class="p-breadcrumb c-breadcrumb l-inner" itemscope="" itemtype="http://schema.org/BreadcrumbList">
<li class="p-breadcrumb__item c-breadcrumb__item c-breadcrumb__item--home" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
<span itemprop="name">HOME</span>
</a>
<meta itemprop="position" content="1">
<li class="p-breadcrumb__item c-breadcrumb__item">事務所概要</li>
</ol>

<div class="l-contents l-contents--grid<?php if ( 'type2' === $dp_options['sidebar'] ) { echo '-rev'; } ?>">

  <div class="l-contents__inner l-inner">

    <?php get_template_part( 'template-parts/page-header' ); ?>

    <div class="l-primary">

      <?php
      if ( have_posts() ) :
        while ( have_posts() ) :
          the_post();
      ?>
      <article>

        <header class="p-company-header">
          <div class="p-company-header__content">
            <h1 class="p-company-header__title"><?php echo esc_html( $post->content_header_title ); ?></h1>
            <p class="p-company-header__sub"><?php echo esc_html( $post->content_header_sub ); ?></p>
          </div>
          <?php if ( has_post_thumbnail() ) : ?>
          <div class="p-company-header__img">
            <?php the_post_thumbnail( 'size9' ); ?>
          </div>
          <?php endif; ?>
        </header>

        <div class="p-entry__body">
        <?php
        the_content();
        if ( ! post_password_required() ) {
          wp_link_pages( array(
            'before' => '<div class="p-page-links">',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>'
          ) );
        }
        ?>
        </div>

      </article>
      <?php
        endwhile;
      endif;
      ?>

          <?php get_sidebar('company'); ?>
    </div><!-- /.l-primary -->


  </div>
</div>

<?php get_footer(); ?>
