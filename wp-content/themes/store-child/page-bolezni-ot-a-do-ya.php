<?php
/**
 * Bolezni ot a do ya page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="bolezni-ot-a-do-ya-page custom-page">

  <div class="container">
    <div class="page-title">Болезни от А до Я</div>
  </div>

<!-- 
  <div class="container">
    <?php //echo get_letters();

    $query = new WP_Query(array(

        'cat' => 425,
        'posts_per_page' => -1,

      ));
    echo "<pre>";
  if ( $query->have_posts() ) { 
    $letters_array = [];

    while ($query->have_posts()) { 
      global $prev_letter;

      $query->the_post();
      $content2 = "";
      $first_letter = mb_substr(get_the_title(), 0, 1);

      if (in_array($first_letter, $letters_array)) {
        

      } else {
        $letters_array[] = $first_letter;
      }

      print_r($letters_array);
    }
  }
echo "</pre>";

     ?>
  </div>
   -->

</div>

<?php get_footer(); ?>