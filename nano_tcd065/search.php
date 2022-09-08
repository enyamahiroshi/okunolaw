<?php
/*
Template Name: 検索結果ページ
*/
 ?>

<?php $catch = $post->catch_and_desc_catch; ?>

<?php get_header(); ?>

<div class="l-contents l-contents--grid">



  <div class="l-contents__inner l-inner<?php if ( ! $catch ) { echo ' mt50'; } ?>">


    <div class="l-primary">

      <?php if ( $catch ) { get_template_part( 'template-parts/archive-header' ); } ?>


      <div class="p-entry__body">
        <h2><?php the_search_query(); ?>の検索結果 : <?php echo $wp_query->found_posts; ?>件</h2>
        <!-- 投稿情報 loop -->
        <?php if(have_posts()) : ?>
            <?php while(have_posts()):the_post() ?>
            <ul>
              <li><div class="list_box">
                <h3><a href="<?php the_permalink( $post ); ?>"><?php the_title(); ?></a></h3>
                <div class="post">
                            <p><a href="<?php the_permalink( $post ); ?>"><?php if(mb_strlen($post->post_content, 'UTF-8')>200){
	$content= mb_substr($post->post_content, 0, 200, 'UTF-8');
	echo $content.'……';
}else{
	echo $post->post_content;
} ?></a></p>
                        </div><!-- /post -->
              </div></a></li>
            </ul>
                <?php endwhile; ?>
        <?php else: ?>
            <div class="post">
                <p>申し訳ございません。<br />該当する記事がございません。</p>
            </div>
        <?php endif; ?>

      </div>


    </div><!-- /.l-primary -->
    <?php get_sidebar('search' ); ?>
  </div>
</div>

<?php get_footer(); ?>
