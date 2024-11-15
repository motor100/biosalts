<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' ); ?>

<?php
if (is_shop()) {
  get_template_part( 'templates/content', 'shop' );
} else { ?>

  <div class="archive-product single__prod">
    <div class="catalog-inside">
      <div class="catalog-section-title">Каталог</div>
    </div>
    
    <div class="container">

      <?php
      $parentid = get_queried_object_id(); // id родительской категории
      $term_childs = get_term_children( $parentid, 'product_cat' ); // получить массив с id вложенных подкатегорий
      ?>

      <?php if ($term_childs) {  ?>

        <?php
        // Вывод подкатегорий
        $args = array(
          'parent' => $parentid, // id родительской категории
          'hide_empty' => true, // скрывать категории без товаров
          'order' => 'ASC'
        );
        ?>

        <?php $subcats = get_terms( 'product_cat', $args ); ?>

        <div class="subcategories">
          <div class="subcategories-item" onclick="location.reload()">
            <div class="subcategories-item__title">Все</div>
          </div>
          <?php foreach($subcats as $subcat) { ?>
            <div class="subcategories-item filter-btn" data-term-id="<?php echo $subcat->term_id; ?>">
              <div class="subcategories-item__title"><?php echo $subcat->name; ?></div>
            </div>
          <?php } ?>
        </div>

      <?php } ?>
        
      <?php
      if ( woocommerce_product_loop() ) {

        /**
         * Hook: woocommerce_before_shop_loop.
         *
         * @hooked woocommerce_output_all_notices - 10
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        do_action( 'woocommerce_before_shop_loop' );

        woocommerce_product_loop_start();

        if ( wc_get_loop_prop( 'total' ) ) {
          while ( have_posts() ) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action( 'woocommerce_shop_loop' );

            wc_get_template_part( 'content', 'product' );
          }
        }

        woocommerce_product_loop_end();

        /**
         * Hook: woocommerce_after_shop_loop.
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action( 'woocommerce_after_shop_loop' );
      } else {
        /**
         * Hook: woocommerce_no_products_found.
         *
         * @hooked wc_no_products_found - 10
         */
        do_action( 'woocommerce_no_products_found' );
      } ?>
    
    </div>

    <div class="about-pharmacy-section text-section">
      <div class="container">
        <div class="about-pharmacy-section-subtitle">Аптека натуральных лекарств</div>
        <p class="p">Аптека натуральных лекарств NaturaPharma единственная в своем роде, потому что предлагает лекарства не просто от болезней, а для повышения уровня здравья. Увеличения ресурса, трансформации негативных и ограничивающих убеждений, бессознательных программ. Аптека натуральных лекарств NaturaPharma – это аптека для людей, которые стремятся к здоровой и осознанной жизни. Мы верим, что только живые лекарства, наполненные природной энергией, способны помогать человеку на самом глубоком уровне.</p>
        <p class="p">В каталоге NaturaPharma вы найдете большой выбор натуропатических комплексов и индивидуальных лекарств, которые можно использовать в тех или иных случаях. Цель наших лекарств - регуляция энергетических и биохимических процессов без замещения или подавления. Мы предлагаем лекарства в виде капель, таблеток, порошков (тритураций), глицериновых экстрактов, созданных из высококачественного сырья, собранного нами самостоятельно, или купленных в экологически чистых уголках нашей планеты, в соответствии со знанием природных циклов, планетарных ритмов, с большим уважением к природе и всему тому, что она даёт человеку.</p>
        <p class="p">Наши продукты – это результат многолетних исследований и личного опыта врачей и фармацевтов в области натуропатии и психосоматики. Мы создаем культуру здоровой и осознанной жизни. В аптеке натуральных лекарств NaturaPharma каждый найдет именно то, что нужно лично ему для повышения уровня здоровья и ресурсности организма.</p>
        <p class="p p-last"><span class="text-bold">Позвоните нам сегодня по телефону +7 (495) 927-49-28</span>, чтобы узнать больше о наших продуктах и сделать шаг навстречу своему здоровью. Купите натуральные лекарства в NaturaPharma и откройте новую страницу в своей жизни.</p>
        <div class="callback-form-btn">
          <img src="/wp-content/themes/store-child/includes/images/svg/circle-call-black.svg" class="callback-form-btn__image" alt="">
          <span class="callback-form-btn__text">заказать звонок</span>
        </div>
      </div>
    </div>

    <div id="to-top" class="to-top hidden-mobile">
      <div class="container">
        <div class="circle">
          <div class="image">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/svg/arrow-top.svg" class="arrow-top" alt="">
          </div>
        </div>
      </div>
    </div>

  </div>
<?php } ?>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
