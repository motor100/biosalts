<?php
/**
 * Specialisty page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="specialisty-page sw-page custom-page">

  <div class="container">
    <div class="page-title">Специалисты</div>
  </div>

  <?php $specialisty_cat_id = 408; // ID категории Специалисты local = 408 ?>

  <?php

  $args1 = array(
    'cat' => $specialisty_cat_id,
    'posts_per_page' => -1,
  );
  
  $query1 = new WP_Query( $args1 );

  $cat_array = [];
  ?>

  <div class="cities">
    <div class="container">
      <div class="flex-container">
        <a href="/specialisty" class="cities-item active">Все города</a>

        <?php
        /**
         * Вывод городов
         * Города это названия дочерних категорий для родительской категории $specialisty_cat_id
        */
        while( $query1->have_posts() ) :
          $query1->the_post();

          // Создание массива с id и названиями дочерних категорий
          $cats = get_the_category();

          foreach ($cats as $ct) :
            if ($ct->term_id != $specialisty_cat_id) :
              if (!in_array($ct->term_id, $cat_array)) : ?>
                <div class="cities-item js-city-btn" data-term-id="<?php echo $ct->term_id; ?>"><?php echo $ct->name; ?></div>
                <?php $cat_array[] = $ct->term_id;
              endif;
            endif;
          endforeach;
        endwhile; ?>

      </div>
    </div>
  </div>

  <div class="specialists">
    <div class="container">
      <div class="row js-insert-specialists">
        <?php

        // Номер страницы пагинации
        // $current = absint( max( 1, get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' ) ) );
        $args2 = array(
          'cat' => $specialisty_cat_id,
          'posts_per_page' => -1,
          // 'paged' => $current,
        );
        
        $query2 = new WP_Query( $args2 );
        $cat_array = [];

        if ( $query2->have_posts() ) :
          while( $query2->have_posts() ) :
            $query2->the_post(); ?>

            <div class="col-lg-4 col-md-6">
              <div class="specialists-item">
                <div class="specialists-item__image">
                  <a href="<?php the_permalink(); ?>" class="item-link">
                    <?php the_post_thumbnail(); ?>
                  </a>
                </div>
                <div class="specialists-item__content">
                  <div class="specialists-item__title"><?php the_title(); ?></div>
                  <div class="specialists-item__excerpt"><?php echo the_text_max_charlength(get_the_excerpt(), 100); ?></div>
                  <a href="<?php the_permalink(); ?>" class="specialists-item__link">Подробнее</a>
                </div>
              </div>
            </div>
          
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>Записей нет.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>