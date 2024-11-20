<div class="archive-product single__prod">
    <div class="catalog-inside">
      <div class="catalog-section-title">Магазин</div>
    </div>
    
    <div class="container">

      <?php
      $parentid = 25; // id родительской категории
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
      // Запрос
      $query = new WP_Query( array (
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
        'tax_query' => array( array (
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $parentid,
        ) ),
      ) );

      // Вывод записей
      if ( $query->have_posts() ) {

        // Подключение шаблона product loop start
        require ( get_stylesheet_directory() . '/woocommerce/loop/loop-start.php' );

        while ( $query->have_posts() ) {
          $query->the_post();

          // Подключение шаблона product loop
          require ( get_stylesheet_directory() . '/woocommerce/content-product.php' );
        }

        // Подключение шаблона product loop end
        require ( get_stylesheet_directory() . '/woocommerce/loop/loop-end.php' );

        wp_reset_postdata();

      }
      ?>
    
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