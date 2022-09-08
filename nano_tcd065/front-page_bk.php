<?php $dp_options = get_design_plus_options(); ?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/header-contents' ); ?>

<div class="l-contents<?php if ( $dp_options['display_index_content01'] ) { echo ' l-contents--no-border'; } ?>">
  <div class="l-contents__inner">
    <div class="l-primary">
      <div id="js-cb" class="p-cb">

        <?php if ( $dp_options['display_index_content01'] ) : ?>
        <div class="p-index-content01 l-inner">
          <h2 class="p-index-content01__title"><?php echo nl2br( esc_html( $dp_options['index_content01_catch'] ) ); ?></h2>
          <p class="p-index-content01__desc"><?php echo nl2br( esc_html( $dp_options['index_content01_desc'] ) ); ?></p>
        </div>
        <div class="p-index-content02 p-cb__item l-inner">
          <ul class="p-index-content02__list p-three-box">
            <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
            <li class="p-three-box__item p-article12">
              <a href="<?php echo esc_attr( $dp_options['index_content01_box_url' . $i] ); ?>"<?php if ( $dp_options['index_content01_box_target' . $i] ) { echo ' target="_blank"'; } ?>>
                <div class="p-article12__header">
                  <h3 class="p-article12__title"><?php echo esc_html( $dp_options['index_content01_box_title' . $i] ); ?></h3>
                  <p class="p-article12__sub"><?php echo esc_html( $dp_options['index_content01_box_sub' . $i] ); ?></p>
                </div>
                <p class="p-article12__desc"><?php echo nl2br( esc_html( $dp_options['index_content01_box_desc' . $i] ) ); ?></p>
                <div class="p-article12__img">
                  <?php echo wp_get_attachment_image( $dp_options['index_content01_box_img' . $i], 'full' ); ?>
                </div>
              </a>
            </li>
            <?php endfor; ?>
          </ul>
          <p class="p-btn">
            <a href="<?php echo esc_attr( $dp_options['index_content01_btn_url'] ); ?>"<?php if ( $dp_options['index_content01_btn_target'] ) { echo ' target="_blank"'; } ?>><?php echo esc_html( $dp_options['index_content01_btn_label'] ); ?></a>
          </p>
        </div>
        <?php endif; ?>

        <?php get_template_part( 'template-parts/contents-builder' ); ?>

      </div><!-- /.p-cb -->
    </div><!-- /.l-primary -->
  </div>
</div>

<?php get_footer(); ?>
