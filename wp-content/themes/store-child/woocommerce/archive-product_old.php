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
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
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

<section class="single__prod">
	<div class="catalog inside">
		<div class="title">Каталог</div>
		<div class="curved violet v2">
			<div class="one"></div>
			<div class="two"></div>
			<div class="three"></div>
		</div>
		<div class="catalog_inside title">
			<? echo woocommerce_page_title();?>
		</div>
		<div class="catalog_inside desc">
			<? do_action( 'woocommerce_archive_description' );?>
		</div>
	</div>
	<div class="container">
		<div class="row">

<?
if (is_shop()) {
  get_template_part( 'templates/content', 'catalog' );
} else { ?>
    <div class="m-select">
      <?php //echo do_shortcode("[products_dropdown product_id='27515']");//echo do_shortcode("[product_categories_dropdown orderby='name' hierarchical='1']"); ?>
	  <? 
		$current_category_object = get_queried_object();
		//echo $current_category_object->term_id;
	  $args = array(
				'post_type' => 'product', 
				'orderby' => 'name',
				'order' => 'ASC',
				'numberposts' => -1
			);
		$product_cat = "Products";
		$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'id',
					'terms'    => $current_category_object->term_id,
				),
			);
			$product_cat = get_cat_name($current_category_object->term_id);
		
		$posts = get_posts($args);
		
		if ($posts) {
			echo '<div class="">';
			echo '<select class="category-posts-dropdown" onchange="location = this.value;">';
			echo '<option value="">Быстрый переход '. $product_cat . '</option>';
			
			foreach ($posts as $post) {
			?>
				<option value="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></option>
			<?php }
				
			echo '</select>';
		}
		echo '</div>';
	  ?>
	  
    </div>
    <div class="col-3" style="display:none;">
        <div class="aside-menu">
          <?php
          $taxonomy     = 'product_cat';
          $orderby      = 'ID';
          $show_count   = 0;
          $pad_counts   = 0;
          $hierarchical = 1;
          $title        = '';
          $empty        = 0;
          $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'exclude'      => '15',
            'hide_empty'   => $empty
          );
          ?>
          <?php $all_categories = get_categories( $args );
          // print_r($all_categories);
          foreach ($all_categories as $cat) {
            // print_r($cat);
            if($cat->category_parent == 0) {
              $category_id = $cat->term_id;

              ?>

              <?php
              echo '<div class="cat_item">';
              echo '<a class="cat_name" href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>'; ?>


              <?php
              $args2 = array(
                'taxonomy'     => $taxonomy,
                'child_of'     => 0,
                'parent'       => $category_id,
                'order'      => 'DESC',
                'orderby'      => 'ID',
                'show_count'   => $show_count,
                'pad_counts'   => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li'     => $title,
                'hide_empty'   => $empty
              );
              $sub_cats = get_categories( $args2 );
              if($sub_cats) {
                echo '<ul>';
                foreach($sub_cats as $sub_category) {
                  // print_r($sub_category);
                  echo '<li><a href="' . get_term_link($sub_category) . '">' . $sub_category->name . '</a></li>';

                }
                echo '</ul>';
              } ?>
              <?php echo '</div>' ?>
            <?php }
          }
          ?>
        </div>
    </div>
    <div class="col-12">
        <!--<header class="woocommerce-products-header">-->
          <?php // if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
              <!--<h1 class="woocommerce-products-header__title page-title"><?php //woocommerce_page_title(); ?></h1>-->
          <?php //endif; ?>

          <?php
          /**
           * Hook: woocommerce_archive_description.
           *
           * @hooked woocommerce_taxonomy_archive_description - 10
           * @hooked woocommerce_product_archive_description - 10
           */
         // do_action( 'woocommerce_archive_description' );
          ?>
        <!--</header>-->
		<?php 
			$cat=get_queried_object();
			if ($cat->term_id == 18): ?>
				<div class="filter-but">
					<div class="button-group filters-button-group">
						<div class="eng-letters">
							<button class="filtered-button is-checked" data-filter="*">Все</button>
							<button class="filtered-button" data-filter=".a">A</button>
							<button class="filtered-button" data-filter=".b">B</button>
							<button class="filtered-button" data-filter=".c">C</button>
							<button class="filtered-button" data-filter=".d">D</button>
							<button class="filtered-button" data-filter=".e">E</button>
							<button class="filtered-button" data-filter=".f">F</button>
							<button class="filtered-button" data-filter=".g">G</button>
							<button class="filtered-button" data-filter=".h">H</button>
							<button class="filtered-button" data-filter=".i">I</button>
							<button class="filtered-button" data-filter=".j">J</button>
							<button class="filtered-button" data-filter=".k">K</button>
							<button class="filtered-button" data-filter=".l">L</button>
							<button class="filtered-button" data-filter=".m">M</button>
							<button class="filtered-button" data-filter=".n">N</button>
							<button class="filtered-button" data-filter=".o">O</button>
							<button class="filtered-button" data-filter=".p">P</button>
							<button class="filtered-button" data-filter=".q">Q</button>
							<button class="filtered-button" data-filter=".r">R</button>
							<button class="filtered-button" data-filter=".s">S</button>
							<button class="filtered-button" data-filter=".t">T</button>
							<button class="filtered-button" data-filter=".u">U</button>
							<button class="filtered-button" data-filter=".v">V</button>
							<button class="filtered-button" data-filter=".w">W</button>
							<button class="filtered-button" data-filter=".x">X</button>
							<button class="filtered-button" data-filter=".y">Y</button>
							<button class="filtered-button" data-filter=".z">Z</button>
						</div>
						<div class="ru-letters">
							<button class="filtered-button" data-filter=".а">А</button>
							<button class="filtered-button" data-filter=".б">Б</button>
							<button class="filtered-button" data-filter=".в">В</button>
							<button class="filtered-button" data-filter=".г">Г</button>
							<button class="filtered-button" data-filter=".д">Д</button>
							<button class="filtered-button" data-filter=".е">Е</button>
							<button class="filtered-button" data-filter=".ж">Ж</button>
							<button class="filtered-button" data-filter=".з">З</button>
							<button class="filtered-button" data-filter=".и">И</button>
							<button class="filtered-button" data-filter=".к">К</button>
							<button class="filtered-button" data-filter=".л">Л</button>
							<button class="filtered-button" data-filter=".м">М</button>
							<button class="filtered-button" data-filter=".н">Н</button>
							<button class="filtered-button" data-filter=".о">О</button>
							<button class="filtered-button" data-filter=".п">П</button>
							<button class="filtered-button" data-filter=".р">Р</button>
							<button class="filtered-button" data-filter=".с">С</button>
							<button class="filtered-button" data-filter=".т">Т</button>
							<button class="filtered-button" data-filter=".у">У</button>
							<button class="filtered-button" data-filter=".ф">Ф</button>
							<button class="filtered-button" data-filter=".х">Х</button>
							<button class="filtered-button" data-filter=".ц">Ц</button>
							<button class="filtered-button" data-filter=".ч">Ч</button>
							<button class="filtered-button" data-filter=".ш">Ш</button>
							<button class="filtered-button" data-filter=".щ">Щ</button>
							<button class="filtered-button" data-filter=".э">Э</button>
							<button class="filtered-button" data-filter=".ю">Ю</button>
							<button class="filtered-button" data-filter=".я">Я</button>
						</div>
					</div>
				</div>
			<?php endif; ?>
		
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
<?php } ?>

			</div>
		</div>
	</div>
</section>

<?
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
