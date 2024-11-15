 <?
/**
 * @package WordPress
 * @subpackage Classic_Theme
 * Template Name: Шаблон блога
 */

?>

<?php get_header(); ?>

<div class="single-page custom-page">

  <div class="single-section">
    <div class="container">
      <div class="page-title"><?php the_title(); ?></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <div class="single-image">
            <?php the_post_thumbnail(''); ?>
          </div>
        </div>
      </div>
      <div class="single-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

</div>

<?php get_footer();?>