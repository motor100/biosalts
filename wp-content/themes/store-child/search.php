<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>

<div class="search-page custom-page">

  <div class="container">
    <div class="page-title">Поиск</div>
  </div>

  <div class="search-rezults">
    <div class="container">
      <?php
      $s = get_search_query();
      $args = array(
                's' =>$s,
                'posts_per_page' => -1
              );
      ?>
      <?php $query = new WP_Query( $args ); ?>
      <?php if ( $query->have_posts() ) { ?>

          <div class="search-rezult-text">Результаты поиска для: <?php get_query_var('s'); ?></div>
          <ul class="list">
            <?php while ( $query->have_posts() ) { ?>
              <?php $query->the_post(); ?>
              <li class="list-item">
                <a href="<?php the_permalink(); ?>" class="list-item__link"><?php the_title(); ?></a>
              </li>
            <?php } ?>
          </ul>

      <?php } else { ?>

        <div class="search-rezult-text no-found">Ничего не найдено</div>

      <?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>