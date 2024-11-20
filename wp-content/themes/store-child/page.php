<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

<?php
while ( have_posts() ) :
  the_post();

  if(get_the_ID() == 2):
    get_template_part( 'templates/content', 'main' );
	elseif(get_the_ID() == 39):
	  get_template_part( 'templates/content', 'medicine' );
	elseif(get_the_ID() == 9333):
	  get_template_part( 'templates/content', 'blog' );
	elseif(get_the_ID() == 579):
	  get_template_part( 'templates/content', 'contacts' );
  elseif(get_the_ID() == 7):
		get_template_part( 'templates/content', 'cart' );
	elseif(get_the_ID() == 8):
		get_template_part( 'templates/content', 'checkout' );
	else:
    get_template_part( 'templates/content', 'catalog' );
  endif;
endwhile;
?>

<?php get_footer(); ?>
