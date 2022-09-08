<?php
$dp_options = get_design_plus_options();

$args = array(
  'prev_next' => false,
  'type' => 'array'
);

$category = get_the_category();
$cat_id   = $category[0]->cat_ID;
$cat_name = $category[0]->cat_name;
$cat_slug = $category[0]->category_nicename;

?>

<?php get_header(); ?>

<div class="l-contents l-contents--no-border">

  <?php get_template_part( 'template-parts/cover' ); ?>

  <div class="l-contents__inner l-inner">
    <div class="l-primary">
      <a class="block" id="block_01"></a>
      <div class="p-works-list first-area">
      <h2 class="category_tit"><span>パートナー弁護士</span></h2>
      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-01/"><span class="name-jp">奧野 善彦</span>Yoshihiko OKUNO</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-03/"><span class="name-jp">藤田 浩司</span>Koji FUJITA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-02/"><span class="name-jp">野村 茂樹</span>Shigeki NOMURA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-04/"><span class="name-jp">遠藤 由紀子</span>Yukiko ENDO</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-05/"><span class="name-jp">城處 琢也</span>Takuya KIDOKORO</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-06/"><span class="name-jp">小池 良輔</span>Ryosuke KOIKE</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-07/"><span class="name-jp">増江 亜佐緒</span>Asao MASUE</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-08/"><span class="name-jp">櫻庭 広樹</span> Hiroki SAKURABA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-09/"><span class="name-jp">鹿田 順平</span>Junpei SHIKADA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-10/"><span class="name-jp">今村 憲</span>Ken IMAMURA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-11/"><span class="name-jp">仲野 裕美</span>Yumi NAKANO</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-12/"><span class="name-jp">坂野 維子</span>Masako BANNO</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>

      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-14/"><span class="name-jp">小正 寛隆</span>Hirotaka KOMASA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士             </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-17/"><span class="name-jp">大水 英智</span>Hidetomo OMIZU</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士             </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-15/"><span class="name-jp">吉岡 剛</span>Tsuyoshi YOSHIOKA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士             </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-16/"><span class="name-jp">田中 公悟</span>Kiminori TANAKA</a>
      </h3>
      <p class="p-article06__cat">
      パートナー弁護士            </p>
      </div>
      </article>
      </div>
      <!-- /パートナー弁護士  ------------------------------------------------------------------------------>

      <a class="block" id="block_02"></a>
      <div class="p-works-list">
        <h2 class="category_tit"><span>外国法パートナー</span></h2>
      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-13/"><span class="name-jp">ミハエル ムロチェク</span>Michael MROCZEK</a>
      </h3>
      <p class="p-article06__cat">
      外国法パートナー            </p>
      </div>
      </article>
      </div>
      <!-- /外国法パートナー  ------------------------------------------------------------------------------>

      <!-- <a class="block" id="block_03"></a>
      <div class="p-works-list">
        <h2 class="category_tit"><span>カウンセル弁護士</span></h2>

      </div> -->
      <!-- /カウンセル弁護士  ------------------------------------------------------------------------------>

      <a class="block" id="block_04"></a>
      <div class="p-works-list">
        <h2 class="category_tit"><span>アソシエイト弁護士</span></h2>


      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-18/"><span class="name-jp">清水 健介</span>Kensuke SHIMIZU</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-19/"><span class="name-jp">原田 拓歩</span>Takuho HARADA</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-20/"><span class="name-jp">生田 和也</span>Kazuya IKUTA</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>
      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">

      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-21/"><span class="name-jp">小林 明日香</span>Asuka KOBAYASHI</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-35/"><span class="name-jp">髙橋 梨紗</span>Risa TAKAHASHI</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-24/"><span class="name-jp">岡田 恭平</span>Kyohei OKADA</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-25/"><span class="name-jp">大野 真央</span>Mao OHNO</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-34/"><span class="name-jp">山下 哲平</span>Teppei YAMASHITA</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-31/"><span class="name-jp">井垣 龍太</span>Ryuta IGAKI</a>
      </h3>
      <p class="p-article06__cat">
      アソシエイト弁護士            </p>
      </div>
      </article>

      </div>
      <!-- /アソシエイト弁護士  ------------------------------------------------------------------------------>

      <a class="block" id="block_05"></a>
      <div class="p-works-list">
      <h2 class="category_tit row02"><span>客員弁護士</span></h2>
      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-26/"><span class="name-jp">飯田 英男</span>Hideo IIDA</a>
      </h3>
      <p class="p-article06__cat">
      客員弁護士</p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-33/"><span class="name-jp">垣内 正</span>Tadashi KAKIUCHI</a>
      </h3>
      <p class="p-article06__cat">
      客員弁護士</p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-36/"><span class="name-jp">岡田 秀一</span>Hideichi OKADA</a>
      </h3>
      <p class="p-article06__cat">
      客員弁護士</p>
      </div>
      </article>
      </div>
      <!-- /客員弁護士  --------------------------------------------------------------------->

      <a class="block" id="block_06"></a>
      <div class="p-works-list">
      <h2 class="category_tit row02"><span>シニアカウンセル弁護士</span></h2>
      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-28/"><span class="name-jp">滝 久男</span>Hisao TAKI</a>
      </h3>
      <p class="p-article06__cat">
      シニアカウンセル弁護士</p>
      </div>
      </article>

      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-29/"><span class="name-jp">大西 正一郎</span>Shoichiro ONISHI</a>
      </h3>
      <p class="p-article06__cat">
      シニアカウンセル弁護士</p>
      </div>
      </article>
      </div>
      <!-- /シニアカウンセル弁護士  --------------------------------------------------------------------->

      <a class="block" id="block_07"></a>
      <div class="p-works-list">
        <h2 class="category_tit"><span>特別顧問</span></h2>
      <article class="p-works-list__item p-article06 aos-init aos-animate" data-aos="custom-fade">
      <div class="p-article06__content">
      <h3 class="p-article06__title">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>attorneys/attorneys-30/"><span class="name-jp">山口 寛治</span>Kanji YAMAGUCHI</a>
      </h3>
      <p class="p-article06__cat">
      特別顧問            </p>
      </div>
      </article>		  
      </div>
      <!-- /特別顧問  ------------------------------------------------------------------------------------------>



    </div><!-- /.l-primary -->
  </div>
</div>

<?php get_footer(); ?>
