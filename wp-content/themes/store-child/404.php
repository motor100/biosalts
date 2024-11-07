<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
    <div class="container">
      <div class="page-404">
        <div class="page-404-image">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/404-not-found.jpg" alt="">
        </div>
        <div class="page-404-text">Упс, что-то пошло не так. Такой страницы нет, попробуйте вернуться назад и найти другую страницу или товар!</div>
        <a href="/#catalog-section" class="to-catalog-btn green-b">Вернуться в каталог</a>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>