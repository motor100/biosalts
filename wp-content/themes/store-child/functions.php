<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

add_action( 'wp_enqueue_scripts', 'my_dequeue_style', 99 );

function my_dequeue_style(){
    wp_dequeue_style( 'storefront-child-style' ); // отключение файла /store-child/style.css
}

// Добавление версии в css и js
/*
* $temp_debug = true добавляется версия на основе даты и времени
* $temp_debug = false добавляется версия wp
*/

$temp_debug = true;
$ver = '';
if ($temp_debug) {
  $ver = date('dis');
}

// Scripts
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_scripts() {
    global $ver;
	wp_enqueue_script( 'fancy', get_stylesheet_directory_uri() . '/includes/js/fancy.js' );
	wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/includes/js/isotope.js' );
  	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/includes/js/app.min.js' );
    wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/includes/js/jquery-ui.min.js' );
	wp_enqueue_script( 'iso', get_stylesheet_directory_uri() . '/includes/js/iso.js' );

    if ( is_front_page() ) {
        wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/includes/js/swiper-bundle.min.js' );
    }

    wp_enqueue_script( 'imask', get_stylesheet_directory_uri() . '/includes/js/imask.min.js' );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/includes/js/main.js','',$ver);
	
    // Подключение скрипта для страницы Анкета по подбору солей Шюсслера
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/includes/js/_custom.js');

    // включение файла admin-ajax.php для front
    wp_localize_script('custom-script', 'my_ajax_obj', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    // включение файла admin-ajax.php для front
    wp_localize_script('main', 'Myscrt', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'dequeue_storefront_child_theme_style', 9999);
function dequeue_storefront_child_theme_style() {
    wp_dequeue_style('storefront-child-style');
}


// Styles
add_action('wp_print_styles', 'add_styles');

function add_styles() {
    global $ver;
    wp_enqueue_style( 'bootstrap-icons', get_stylesheet_directory_uri() . '/includes/css/bootstrap-icons.css' );
    wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/includes/css/fancybox.css' );
    wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/includes/css/bootstrap-grid.min.css' );
    if ( is_front_page() ) {
        wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/includes/css/swiper-bundle.min.css' );
    }
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/includes/css/style.css','',$ver );
}


// Вывод кастомного нижнего меню. Разделение на части
function custom_nav_menu($start = 0, $end = NULL) {

    $menu_name = 'secondary'; // поставить галочку Дополнительное меню для footer_menu
    $locations = get_nav_menu_locations();

    if ( $locations && isset( $locations[ $menu_name ] ) ) {

        // получаю элементы меню
        $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

        // создаю список
        $menu_list = '<ul class="menu">';

        if (!$end) {
          $end = count($menu_items);
        }

        foreach ( $menu_items as $key => $menu_item ){
          
          if ($key >= $start && $key <= $end) {
            $menu_list .= '<li class="menu-item"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
          }
        }

        $menu_list .= '</ul>';
    
    } else {
        $menu_list = '<p>Меню "' . $menu_name . '" не определено.</p>';
    }

    return $menu_list;
}


// Удалить атрибут type у scripts
function clean_script_tag($src) {
  return str_replace("type='text/javascript'", '', $src);
}
add_filter('script_loader_tag', 'clean_script_tag');

// Удалить атрибут type у style
function clean_css_tag($tag, $handle) {
  return preg_replace( "/type=['\"]text\/(css)['\"]/", '', $tag );
}
add_filter('style_loader_tag', 'clean_css_tag', 10, 2);

// Disable the emoji's
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}


//Каталог продукции
function render_parents_catalog() {
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
  $all_categories = get_categories( $args );
  foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) { ?>
      <div class="tax__item term-<?php echo $cat->term_id; ?>">
        <div class="catalog__item">
          <?php
          $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
          $image = wp_get_attachment_url( $thumbnail_id );
          ?>
			<div class="item__image">
				<a href="<?php echo get_term_link($cat->term_id); ?>">
					<img src="<?php echo $image ?>" alt="catImage">
				</a>
			</div>
			<div class="item__info">
				<div class="item__border">
					<a href="<?php echo get_term_link($cat->term_id); ?>" class="item__title"><?php echo $cat->name ?></a>
				</div>
			</div>
        </div>
      </div>
    <?php }
  }
}

//Каталог подкатегорий
function render_catalog() {
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
  $all_categories = get_categories( $args );
    
  foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
      $category_id = $cat->term_id;
      
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
        foreach($sub_cats as $sub_category) { ?>
          <?php
          $thumbnail_id = get_term_meta($sub_category->term_id, 'thumbnail_id', true);
          $image = wp_get_attachment_url($thumbnail_id);
          ?>
            <div class="children__item">
                <div class="children__image">
                    <a href="<?php echo get_term_link($sub_category); ?>">
                        <img src="<?php echo $image ?>" alt="catImage">
                    </a>
                </div>
                <a class="subcat__link" href="<?php echo get_term_link($sub_category); ?>"><?php echo $sub_category->name ?></a>
            </div>

        <?php }
      } ?>
    <?php }
  }
}

// Каталог продукции
function render__catalog($id_gr) {
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
        'parent'       => $id_gr,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'exclude'      => '15',
        'hide_empty'   => $empty
    );

    $all_categories = get_categories( $args );

    $html = '';

    foreach ($all_categories as $cat) {
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        if ($id_gr == '96') {
            $css_w = 'w110px';
        } else {
            $css_w = 'img';
        }
        $image = wp_get_attachment_url( $thumbnail_id );
        $img = $image ? $image : 'http://biosalts.loc/wp-content/uploads/woocommerce-placeholder.png';
        $html .= '<div class="children__item">';
        $html .= '<div class="children__image">';
        $html .= '<a href="' . get_term_link($cat->term_id) . '">';
        $html .= '<img class="' . $css_w . '" src="' . $img . '" alt="' . $cat->name . '">';
        $html .= '</a>';
        $html .= '</div>';
        $html .= '<a class="children__title" href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a>';
        $html .= '</div>';
    }

    return $html;
}


// Регистрация нового типа поста home_page_slider для слайдера на главной странице
function slider_register_cpt() {
    $args = array(
        'labels' => array(
            'menu_name' => 'Слайдер'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-airplane',
        'publicly_queryable' => false,
        'supports' => ['title', 'thumbnail', 'custom-fields'],
    );
    register_post_type( 'home_page_slider', $args );
}

add_action( 'init', 'slider_register_cpt' );

// Добавление метабокса product_link на кастомный тип постов home_page_slider
function home_page_slider_add_metabox() {
    add_meta_box(
        'product_link', // ID нашего метабокса
        'Ссылка на препараты', // заголовок
        'home_page_slider_metabox_callback', // функция, которая будет выводить поля в мета боксе
        'home_page_slider', // типы постов, для которых его подключим
        'normal', // расположение (normal, side, advanced)
        'default' // приоритет (default, low, high, core)
    );
}

add_action( 'add_meta_boxes', 'home_page_slider_add_metabox' );
 
function home_page_slider_metabox_callback( $post ) {
    // сначала получаем значения этих полей
    // ссылка на товар
    $product_link = get_post_meta( $post->ID, 'product_link', true );
 
    // одноразовые числа, кстати тут нет супер-большой необходимости их использовать
    wp_nonce_field( 'seopostsettingsupdate-' . $post->ID, '_truenonce' );
 
    echo '<table class="form-table">
        <tbody>
            <tr>
                <th><label for="seo_title">Ссылка</label></th>
                <td><input type="text" id="product_link" name="product_link" value="' . esc_attr( $product_link ) . '" class="regular-text"></td>
            </tr>
        </tbody>
    </table>';
}

// Сохранение кастомного типа постов home_page_slider
function home_page_slider_save_metabox( $post_id, $post ) {
 
    // проверка одноразовых полей
    if ( ! isset( $_POST[ '_truenonce' ] ) || ! wp_verify_nonce( $_POST[ '_truenonce' ], 'seopostsettingsupdate-' . $post->ID ) ) {
        return $post_id;
    }
 
    // проверяем, может ли текущий юзер редактировать пост
    $post_type = get_post_type_object( $post->post_type );
 
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }
 
    // ничего не делаем для автосохранений
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return $post_id;
    }
 
    // проверяем тип записи
    if( 'home_page_slider' !== $post->post_type ) {
        return $post_id;
    }
 
    if( isset( $_POST[ 'product_link' ] ) ) {

        // Создание относительной ссылки
        $link = $_POST[ 'product_link' ];
        if( strpos($link,'//') === false ) {
            $link='//'.$link;
        }
        $n_link = parse_url($link, PHP_URL_PATH);

        update_post_meta( $post_id, 'product_link', sanitize_text_field( $n_link ) );
    } else {
        delete_post_meta( $post_id, 'product_link' );
    }
 
    return $post_id;
}

add_action( 'save_post', 'home_page_slider_save_metabox', 10, 2 );


/**
 * Вывод записей по буквам на странице Болезни от А до Я
 *
 * @param
 * @return string
 */
function get_posts_per_letter() {

    $html = "";

    $query = new WP_Query(array(
        'cat' => 425, // ID категории Болезни от А до Я
        'orderby' => 'title', // Сортировка по названию 
        'order' => 'ASC', // Сортировка в алфавитном порядке
        'posts_per_page' => -1, // Вывод всех постов
    ));

    if ( $query->have_posts() ) { 
        $prev_letter = ''; // Первая буква предыдущего заголовка поста

        $index = 0;
        while ($query->have_posts()) { 
            global $prev_letter;

            $query->the_post();
            $content1 = "";
            $first_letter = mb_substr(get_the_title(), 0, 1); // Получение первой буквы заголовка поста

            // Вывод первой буквы заголовка поста
            if ($prev_letter != $first_letter) {
                if ($index > 0) {
                    $content1 .= "</div>";
                }
                $content1 .= "<div class=\"letter\">" . $first_letter . "</div>";
                $content1 .= "<div class=\"flex-container\">";
            }
            
            $content1 .= "<a href=\"" . get_permalink() . "\" class=\"title\">";
            $content1 .= esc_html( get_the_title() );
            $content1 .= "</a>";
              
            $html .= $content1;
            $prev_letter = $first_letter;

            $index++;
        }

        wp_reset_postdata();

    } else {
        $content = "Записей нет.";
    }

  return $html;
}

// обертка для категорий
// add_action('woocommerce_before_main_content', 'add_wrapper_to_product', 30);
// add_action('woocommerce_after_main_content', 'add_close_wrapper_to_product', 20);

// function add_wrapper_to_product() {

// }
// function add_close_wrapper_to_product() {

// }

// Добавление post_type post в результаты поска 
add_filter( 'dgwt/wcas/search_query/args', function ( $args ) {
    if ( current_user_can( 'manage_options' ) ) {
        $args['post_status'] = [ 'publish' ];
        $args['post_type'] = [ 'product', 'post' ];
    }
   
   return $args;
} );


// Добавление post_type product в результаты поска
add_filter( 'pre_get_posts', 'modified_pre_get_posts'); 
function modified_pre_get_posts( $query ) { 
  if ( $query->is_search() ) { 
    $query->set( 'post_type', 'product' ); 
  }
  return $query;
}


/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function tg_include_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'products' ) );
    }
}
add_action( 'pre_get_posts', 'tg_include_custom_post_types_in_search_results' );


// откл сортировку
// add_action( 'wp', 'bbloomer_remove_default_sorting_storefront' );

// function bbloomer_remove_default_sorting_storefront() {
//   remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
//   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
// }

/**
 *
 * Register a shortcode that creates a product categories dropdown list
 *
 * Use: [product_categories_dropdown orderby="title" count="0" hierarchical="0"]
 */
add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
function woo_product_categories_dropdown( $atts ) {
  // Attributes
  $atts = shortcode_atts( array(
    'hierarchical' => '1', // or '1'
    'hide_empty'   => '0', // or '1'
    'show_count'   => '0', // or '1'
    'depth'        => '0', // or Any integer number to define depth
    'orderby'      => 'order', // or 'name'
    'exclude'      => '15',
  ), $atts, 'product_categories_dropdown' );

  ob_start();

  wc_product_dropdown_categories( apply_filters( 'woocommerce_product_categories_shortcode_dropdown_args', array(
    'depth'              => $atts['depth'],
    'hierarchical'       => $atts['hierarchical'],
    'hide_empty'         => $atts['hide_empty'],
    'orderby'            => $atts['orderby'],
    'show_uncategorized' => 0,
    'show_count'         => $atts['show_count'],
    'exclude'         => $atts['exclude'],
  ) ) );

  ?>
    <script type='text/javascript'>
        jQuery(function($){
            var product_cat_dropdown = $(".dropdown_product_cat");
            function onProductCatChange() {
                if ( product_cat_dropdown.val() !=='' ) {
                    location.href = "<?php echo esc_url( home_url() ); ?>/?product_cat=" +product_cat_dropdown.val();
                }
            }
            product_cat_dropdown.change( onProductCatChange );
        });
    </script>
  <?php

  return ob_get_clean();
}

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['postcode']['placeholder'] = 'Почтовый индекс';
	$address_fields['city']['placeholder'] = 'Город';
	$address_fields['state']['placeholder'] = 'Область/Регион';
    return $address_fields;
}

add_filter('category_link', function($a){
	return str_replace( 'category/', '', $a );
}, 99 );

add_filter( 'the_excerpt', 'filter_the_excerpt', 10, 2 );
    function filter_the_excerpt( ) {
    return ' ';
 }
 
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_product_tabs', 'rk_remove_product_tabs', 25 );
 
function rk_remove_product_tabs( $tabs ) {
 
	unset( $tabs[ 'reviews' ] ); // вкладка Отзывы
	unset( $tabs[ 'additional_information' ] ); // вкладка Детали
 
	return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'ql_reorder_product_tabs', 98 );

function ql_reorder_product_tabs( $tabs ) {
    $tabs['description']['priority'] = 0; // Description first
    return $tabs;
}


add_filter('woocommerce_product_tabs', 'rk_new_product_tab', 1);
function rk_new_product_tab( $tabs ) {
	if ( get_field('sostavnoj_tovar') ) {
		$tabs['sostav_tab'] = array(
			'title' =>  'Состав комплекса',
			'priority' => 1,
			'callback' => 'rk_new_tab_content',
			'content' => get_field('sostav_kompleksa'),
		);
	} else unset( $tabs['sostav_tab'] );
	return $tabs;
}
function rk_new_tab_content($tab_name, $tab) {
    echo $tab['content'];
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_2', 2);
function rk_new_product_tab_2( $tabs ) {
	if ( get_field('sostavnoj_tovar') ) {
		$tabs['pokazakia_tab'] = array(
			'title' =>  'Показания и противопоказания',
			'priority' => 2,
			'callback' => 'rk_new_tab_content_2',
			'content' => get_field('pokazaniya_i_protivopokazaniya'),
		);
	} else unset( $tabs['pokazakia_tab'] );
	return $tabs;
}

function rk_new_tab_content_2($tab_name, $tab) {
    echo $tab['content'];
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_4', 4);
function rk_new_product_tab_4( $tabs ) {
	if ( get_field('sostavnoj_tovar') ) {
		$tabs['fiz_tab'] = array(
			'title' =>  'Физиология и психосоматика',
			'priority' => 4,
			'callback' => 'rk_new_tab_content_4',
			'content' => get_field('fiziologiya_i_psihosomatika'),
		);
	} else unset( $tabs['fiz_tab'] );
	return $tabs;
}
function rk_new_tab_content_4($tab_name, $tab) {
        echo $tab['content'];
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_5', 5);
function rk_new_product_tab_5( $tabs ) {
	$tabs[ 'doz_tab' ] = array(
		'title' 	=> 'Дозирование',
		'priority' 	=> 5,
		'callback' 	=> 'rk_new_tab_content_5'
	);
	return $tabs;
}

function rk_new_tab_content_5() {
	if(get_field('dozirovanie')) { 
		echo '<div class="">';
		the_field('dozirovanie');
		echo '</div>';
	}
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_6', 6);
function rk_new_product_tab_6( $tabs ) {
	if ( !get_field('sostavnoj_tovar') ) {
		$tabs['pok_tab'] = array(
			'title' =>  'Показания',
			'priority' => 4,
			'callback' => 'rk_new_tab_content_6',
			'content' => get_field('pokazaniya'),
		);
	} else unset( $tabs['pok_tab'] );
	return $tabs;
}

function rk_new_tab_content_6($tab_name, $tab) {
    echo $tab['content'];
}

add_action( 'woocommerce_before_quantity_input_field', 'truemisha_quantity_plus', 25 );
add_action( 'woocommerce_after_quantity_input_field', 'truemisha_quantity_minus', 25 );
 
function truemisha_quantity_plus() {
	echo '<button type="button" class="minus">-</button>';
}
 
function truemisha_quantity_minus() {
	echo '<button type="button" class="plus">+</button>';
}

add_action( 'wp_footer', 'my_quantity_plus_minus' );
 
function my_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
   ?>
      <script type="text/javascript">
 
      jQuery( function( $ ) {   
 
         $(document).on( 'click', 'button.plus, button.minus', function() {
 
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
       });
 });
       </script>
   <?php
}

/*
// Функция для удаления пустых табов в карточке товара WooCommerce
function remove_empty_product_tabs( $tabs ) {
    foreach ( $tabs as $key => $tab ) {
        ob_start();
        if ( isset( $tab['callback'] ) ) {
            call_user_func( $tab['callback'], $key, $tab );
        }
        $content = ob_get_clean();
        if ( empty( trim( $content ) ) ) {
            unset( $tabs[ $key ] );
        }
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'remove_empty_product_tabs', 98 );
*/


add_shortcode( 'products_dropdown', 'wc_products_from_cat_dropdown' );
function wc_products_from_cat_dropdown( $atts ) {
        // Shortcode Attributes
        $atts = shortcode_atts( array(
            'product_id' => '', 
        ), $atts, 'products_dropdown' );
        
    $product_id = is_product() ? get_the_id() : $atts['product_id'];
    
    if ( empty($product_id) )
        return;

    ob_start();

    $query = new WP_Query( array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
        'post__not_in'     => array( $product_id ),
        'tax_query' => array( array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'ids' ) ) ,
        ) ),
    ) );

    if ( $query->have_posts() ) :

    echo '<div class="products-dropdown"><select name="products-select" id="products-select">
    <option value="">'.__('Choose a related product').'</option>';

    while ( $query->have_posts() ) : $query->the_post();

    echo '<option value="'.get_permalink().'">'.get_the_title().'</option>';

    endwhile;

    echo '</select> <button type="button" style="padding:2px 10px; margin-left:10px;">'._("Go").'</button></div>';

    wp_reset_postdata();

    endif;

    ?>
    <script type='text/javascript'>
        jQuery(function($){
            var a = '.products-dropdown', b = a+' button', c = a+' select', s = '';
            $(c).change(function(){
                s = $(this).val();
            });
             $(b).click(function(){
                if( s != '' ) location.href = s;
            });

        });
    </script>
    <?php

    return ob_get_clean();
}

function change_relatedproducts_text($new_text, $related_text, $source) {
    if ($related_text === 'Related products' && $source === 'woocommerce') {
        $new_text = esc_html__('Дополнительные препараты', $source);
    }
    return $new_text;
}
add_filter('gettext', 'change_relatedproducts_text', 10, 3);


// Таблица для хранения данных о прохождениях анкет
function create_custom_payment_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'custom_payments';

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            payment_id varchar(255) NOT NULL,
            completion boolean DEFAULT false NOT NULL,
            summ varchar(255) NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        add_option('custom_payment_table_created', true);
    }
}

// function delete_all_custom_payment_records() {
//     global $wpdb;

//     // Название таблицы
//     $table_name = $wpdb->prefix . 'custom_payments';

//     // Удаление всех записей из таблицы
//     $wpdb->query("DELETE FROM $table_name");
// }
// delete_all_custom_payment_records();


/*
 * Ниже описаны функции для взаимодействия с таблицей custom_payments,
 * отвечающей за хранение данных, которые необходимы для фиксации оплат
 * за прохождение анкет и для получения статуса прохождения данных анкет
 * Если возникнет необходимость что-то уточнить - тг @dmalfed
*/

// Вспомогательный код - удалить
function check_table_exists() {
    global $wpdb;

    // Название таблицы
    $table_name = $wpdb->prefix . 'custom_payments';

    // Проверяем, существует ли таблица
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        wp_send_json_error(array('message' => 'Таблица не существует.'));
        return;
    }

    // Выполняем запрос для получения данных
    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    // Возвращаем данные в формате JSON
    wp_send_json_success($results);
}
add_action('wp_ajax_check_table_exists', 'check_table_exists');
add_action('wp_ajax_nopriv_check_table_exists', 'check_table_exists');


// Обработчик AJAX-запроса для обновления значения completion в требуемой записи
function update_completion_flag() {
    global $wpdb;

    // Название таблицы
    $table_name = $wpdb->prefix . 'custom_payments';

    // Получаем значения из AJAX-запроса
    $payment_id = isset($_POST['payment_id']) ? sanitize_text_field($_POST['payment_id']) : '';
    $completion = isset($_POST['completion']) ? intval($_POST['completion']) : null;

    // Проверяем, что payment_id не пустой и completion передан
    if (empty($payment_id) || is_null($completion)) {
        wp_send_json_error(array('message' => 'Payment ID and completion value are required.'));
        return;
    }

    // Обновляем запись в таблице
    $result = $wpdb->update(
        $table_name,
        array('completion' => $completion), // Новое значение completion
        array('payment_id' => $payment_id), // Условие для обновления
        array('%d'), // Формат для completion
        array('%s')  // Формат для payment_id
    );

    // Проверяем результат и отправляем ответ
    if ($result !== false) {
        wp_send_json_success(array('message' => 'Completion flag updated successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Error updating completion flag.'));
    }
}
add_action('wp_ajax_update_completion_flag', 'update_completion_flag');
add_action('wp_ajax_nopriv_update_completion_flag', 'update_completion_flag');


// Обработчик AJAX-запроса для проверки наличия записи
function check_payment_record() {
    global $wpdb;

    // Название таблицы
    $table_name = $wpdb->prefix . 'custom_payments';

    // Получаем значение payment_id из AJAX-запроса
    $payment_id = isset($_POST['payment_id']) ? sanitize_text_field($_POST['payment_id']) : '';

    // Проверяем, что payment_id не пустой
    if (empty($payment_id)) {
        wp_send_json_error(array('message' => 'Payment ID is required.'));
        return;
    }

    // Выполняем запрос для получения данных
    $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE payment_id = %s", $payment_id), ARRAY_A);

    // Проверяем результат и отправляем ответ
    if ($result) {
        wp_send_json_success($result);
    } else {
        wp_send_json_error(array('message' => 'No record found for this Payment ID.'));
    }
}
add_action('wp_ajax_check_payment_record', 'check_payment_record');
add_action('wp_ajax_nopriv_check_payment_record', 'check_payment_record');

// Функция получает запись из таблицы custom_payments по полю payment_id
function get_payment_record($payment_id) {
    global $wpdb;

    // Название таблицы
    $table_name = $wpdb->prefix . 'custom_payments';

    // Если нет payment_id, то вывожу ошибку
    if (!$payment_id) {
        return ['message' => 'Payment ID is required.'];
    }

    // Выполняем запрос для получения данных
    $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE payment_id = %s", $payment_id), ARRAY_A);

    // Проверяем результат и отправляем ответ
    if ($result) {
        return $result;
    } else {
        return ['message' => 'No record found for this Payment ID.'];
    }
}


// Генерация платежа yooKassa
function start_payment() {
    global $wpdb;

    // Получение суммы из запроса
    $summ = ! empty( $_POST['summ'] ) ? esc_attr( $_POST['summ'] ) : 0;
    
    // Подключение файла с ключами
    // Файл добавлен в .gitignore
    include_once 'yookassa-config.php';
    
    $url = 'https://api.yookassa.ru/v3/payments';
    $data = array(
        'amount' => array(
            'value' => $summ,
            'currency' => 'RUB'
        ),
        'confirmation' => array(
            'type' => 'embedded'
        ),
        'description' => 'Оплата за доступ к анкете',
        'receipt' => array(
            'customer' => array(
                'email' => 'info@naturapharma.ru',
            ),
            'items' => array(
                array(
                    'description' => 'Оплата за доступ к анкете',
                    'quantity' => '1.00',
                    'amount' => array(
                        'value' => $summ,
                        'currency' => 'RUB'
                    ),
                    'tax_system_code' => '1',
                    'vat_code' => '1',
                    'payment_mode' => 'full_payment',
                    'payment_subject' => 'service'
                )
            )
        )
    );
    
    $idempotenceKey = uniqid('', true);

    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'body' => json_encode($data),
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($shopId . ':' . $secretKey),
            // Тестовый режим
            // 'Authorization' => 'Basic ' . base64_encode($shopIdTest . ':' . $secretKeyTest),
            'Content-Type' => 'application/json',
            'Idempotence-Key' => $idempotenceKey
        )
    ));

    if (is_wp_error($response)) {
        wp_send_json_error(array('message' => 'Ошибка при создании платежа'));
    }
    
    if (isset($response->data) && isset($response->data['type']) && $response->data['type'] === 'error') {
        wp_send_json_error(array('data' => $response_data));
    }


    $response_data = json_decode(wp_remote_retrieve_body($response), true);
    $payment_id = $response_data['id'];
    $payment_url = $response_data['confirmation']['confirmation_url'];

    // Сохранение payment_id в базе данных
    $table_name = $wpdb->prefix . 'custom_payments';
    $wpdb->insert(
        $table_name,
        array(
            'payment_id' => $payment_id,
            'completion' => 0,
            'summ' => $summ
        ),
        array('%s', '%d')
    );
    
    wp_send_json_success(array('data' => $response_data));
}


// AJAX получить специалистов по городу на странице Специалисты
add_action( 'wp_ajax_get_specialists', 'get_specialists_from_city' ); // хук wp_ajax
add_action( 'wp_ajax_nopriv_get_specialists', 'get_specialists_from_city' ); // хук wp_ajax для незалогиненных пользователей

function get_specialists_from_city() {
    
    // Получение id подкатегории из запроса
    $cat_id = ! empty( $_POST['cat_id'] ) ? esc_attr( $_POST['cat_id'] ) : false;
    
    // Получение подкатегории
    $cat = get_term_by( 'id', $cat_id, 'category' );

    // Если нет категории, то return false
    if ( ! $cat ) {
        return false;
    }

    // Запрос
    $query = new WP_Query( array (
        'cat' => $cat_id,
        'post_status'    => 'publish',
        'nopaging' => true,
        'posts_per_page' => '-1',
    ) );

    // Вывод записей
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            // Подключение шаблона content-specialists
            require ( get_stylesheet_directory() . '/templates/content-specialists.php' );
        }

        wp_reset_postdata();

    }
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


add_action('wp_ajax_start_payment', 'start_payment');
add_action('wp_ajax_nopriv_start_payment', 'start_payment');


// AJAX обновление количество товара у значка корзины в хэдере и нижнем мобильном меню add to cart
add_action( 'wp_ajax_set_cart_counters', 'set_counters' ); // хук wp_ajax
add_action( 'wp_ajax_nopriv_set_cart_counters', 'set_counters' ); // хук wp_ajax для незалогиненных пользователей

// Функция получения данных из корзины
function set_counters() {
    echo json_encode([
        'count' => WC()->cart->get_cart_contents_count(),
        'total' => WC()->cart->get_cart_contents_total()
    ]);
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


// Работа с купонами из woo_commerce
function create_discount_coupon($user_email) {
    $coupon_code = 'DISCOUNT_' . strtoupper(wp_generate_password(8, false)); // Уникальный код купона
    $discount_amount = '10';
    $coupon = array(
        'post_title' => $coupon_code,
        'post_content' => '10% discount coupon',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'shop_coupon',
    );
    
    // Вставляем купон в базу данных
    $coupon_id = wp_insert_post($coupon);
    
    // Устанавливаем мета-данные для купона
    update_post_meta($coupon_id, 'discount_type', 'percent');
    update_post_meta($coupon_id, 'coupon_amount', $discount_amount);
    update_post_meta($coupon_id, 'usage_limit', '1');
    update_post_meta($coupon_id, 'expiry_date', date('Y-m-d', strtotime('+1 month')));
    update_post_meta($coupon_id, 'apply_before_tax', 'yes');
    update_post_meta($coupon_id, 'exclude_sale_items', 'no');
    
    // Привязываем купон к пользователю // FIXME?
    update_post_meta($coupon_id, 'customer_email', $user_email->user_email);
    
    return $coupon_code;
}


// Функция для отправки письма с купоном
function send_coupon_email($user_email, $coupon_code, $results) {
    $to = $user_email;
    $admin_email = 'info@naturapharma.ru';

    // Преобразование массива с результатами
    $str = '';
    foreach($results as $value) {
        $tmp = '<p>';
        foreach($value['items'][0] as $item) {
            $tmp .= $item . '<br>';
        }
        $tmp .= '</p>';
        $str .= $tmp;
    }

    $subject = 'Ваш купон на скидку';
    $message = '
        <html>
        <head>
            <title>Ваш купон на скидку</title>
        </head>
        <body>
            <p>Здравствуйте!</p>
            <p>Спасибо за ваш запрос. Мы рады предоставить вам одноразовый купон на скидку 10% на любой заказ в нашем магазине. Используйте код купона при оформлении заказа:</p>
            <p><strong>' . $coupon_code . '</strong></p>
            <p>Купон действует в течение 1 месяца.</p>
            <p>Результаты</p>' . $str . '
            <p>С уважением,<br> Соли Шюсслера</p>
        </body>
        </html>
    ';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'Bcc: ' . $admin_email;
    
    wp_mail($to, $subject, $message, $headers);
}

// Отправка письма админу c данными пользователя, результатами теста и суммой платежа
function send_admin_email($user_email, $payment_id) {

    $custom_payment = get_payment_record($payment_id);

    $summ = isset($custom_payment['summ']) ? $custom_payment['summ'] : 'Summ is error.';

    $to = 'info@naturapharma.ru';

    $subject = 'Оплата анкеты biosalts.ru';
    $message = '
        <html>
        <head>
            <title>Ваш купон на скидку</title>
        </head>
        <body>
            <p>Здравствуйте!</p>
            <p>Email ' . $user_email . '</p>
            <p>Оплата ' . $summ . '</p>
        </body>
        </html>
    ';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    
    wp_mail($to, $subject, $message, $headers);
}

// Действия после прохождения анкеты
function handle_questionnaire_completion() {
	$user_email = $_POST['user_email'];
    $payment_id = $_POST['payment_id'];
    $results = json_decode(stripslashes($_POST['results']), true);
	
    $coupon_code = create_discount_coupon($user_email);
    
    // Отправка email пользователю
    send_coupon_email($user_email, $coupon_code, $results);

    // Отправка email админу
    send_admin_email($user_email, $payment_id);

    wp_die();
}

add_action('wp_ajax_handle_questionnaire_completion', 'handle_questionnaire_completion');
add_action('wp_ajax_nopriv_handle_questionnaire_completion', 'handle_questionnaire_completion');


// AJAX получение купона по коду
function get_coupon_amount() {
    global $wpdb;

    // Получение кода купона из запроса
    $coupon_code = ! empty( $_POST['coupon_code'] ) ? sanitize_text_field( $_POST['coupon_code'] ) : false;

    if ( ! $coupon_code ) {
        return;
    }

    $coupon_code = esc_sql($coupon_code);

    $args = array(
        'post_type' => 'shop_coupon',
        'post_status' => 'publish',
        'posts_per_page' => 1, // Одна запись
        'title' => $coupon_code
    );

    $query = new WP_Query($args);

    if ( $query->have_posts() ) { 

        $i = 0;
        while ($query->have_posts()) {
            // Одна запись
            if ($i == 0) {
                $query->the_post();

                // Объект купона
                $coupon = new WC_Coupon( get_the_id() );

                if ( $coupon == '' ) {
                    return;
                }

                // Счетчик количества использований купона
                $usage_count = $coupon->get_usage_count();
                // Лимит использования купона
                $usage_limit = $coupon->get_usage_limit();
                // Тип скидки
                $discount_type = $coupon->get_discount_type();
                // Срок действия
                $date_expires = $coupon->get_date_expires();

                // Проверка на количество использований купона
                if ($usage_limit > 0) {
                    if ($usage_count >= $usage_limit) {
                        return;
                    }
                }

                // Проверка на тип скидки купона
                if ($discount_type != 'percent') {
                    return;
                }

                // Проверка срока действия купона
                if ($date_expires != '') {
                    if ($date_expires < date("Y-m-d\TH:i:sP")) {
                        return;
                    }
                }

                // Название таблицы
                $table_name = $wpdb->prefix . 'postmeta';

                $result = '';

                if ($usage_count == 0) {
                    // Вставляем запись в таблице
                    $result = $wpdb->insert(
                        $table_name,
                        array(
                            'post_id' => get_the_id(),
                            'meta_key' => 'usage_count',
                            'meta_value' => intval($usage_count) + 1
                        ),
                        array('%d', '%s', '%s')
                    );
                } else {
                    // Обновляем запись в таблице
                    $result = $wpdb->update(
                        $table_name,
                        array('meta_value' => intval($usage_count) + 1), // Новое значение meta_value
                        array('post_id' => get_the_id(), 'meta_key' => 'usage_count'), // Условие where для обновления
                        array('%s'), // Формат для meta_value
                    );
                }

                // Проверяем результат и отправляем ответ
                if ($result !== false) {
                    echo $coupon->get_amount();
                } else {
                    return;
                }

            }
            $i++;
        }
        wp_reset_postdata();
    } else {
        return;
    }

    wp_die();
}

add_action( 'wp_ajax_get_coupon', 'get_coupon_amount' );
add_action( 'wp_ajax_nopriv_get_coupon', 'get_coupon_amount' );


// Замена символа рубля на букву Р
function woocommerce_change_rub_symbol( $valyuta_symbol, $valyuta_code ) {
    if( $valyuta_code === 'RUB' ) {
        return 'Р';
    }
    return $valyuta_symbol;
}

add_filter('woocommerce_currency_symbol', 'woocommerce_change_rub_symbol', 9999, 2);


// Ограничение количества выводимых символов в тексте на странице специалисты
function the_excerpt_max_charlength( $charlength ){
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            return mb_substr( $subex, 0, $excut );
        } else {
            return $subex;
        }
        return '...';
    } else {
        return $excerpt;
    }
}


// AJAX получить товары из подкатегории на странице Соли Щюсслера
add_action( 'wp_ajax_get_subcat', 'get_subcat_products' ); // хук wp_ajax
add_action( 'wp_ajax_nopriv_get_subcat', 'get_subcat_products' ); // хук wp_ajax для незалогиненных пользователей

function get_subcat_products() {

    // Получение id подкатегории из запроса
    $subcat_id = ! empty( $_POST['subcat_id'] ) ? esc_attr( $_POST['subcat_id'] ) : false;

    // Получение подкатегории
    $subcat = get_term_by( 'id', $subcat_id, 'product_cat' );

    // Если нет подкатегории, то return false
    if ( ! $subcat ) {
        return false;
    }

    // Запрос
    $query = new WP_Query( array (
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'tax_query' => array( array (
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $subcat_id,
        ) ),
    ) );

    // Вывод записей
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            // Подключение шаблона product loop
            require ( get_stylesheet_directory() . '/woocommerce/content-product.php' );
        }

        wp_reset_postdata();
    }
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


// Отключение скриптов и стилей плагина Contact Form 7
// На страницах Главная, Каталог, Карточка товара, Блог, Специалисты
add_action( 'wp_enqueue_scripts', 'disable_contact_form_css_and_js', 999 );
 
function disable_contact_form_css_and_js() {
 
    if( is_home() || 
        is_front_page() || 
        is_page( 'contacts' ) || 
        is_page( 'blog' ) || 
        is_page( 'specialisty' ) || 
        is_page( 'catalog' ) ) {
        
        wp_dequeue_style( 'contact-form-7' );
        wp_dequeue_script( 'contact-form-7' );
    }

    return; 
}


/*WooCommerce - убираем WooC Generator tag, стили, и скрипты для страниц, не относящихся к плагину*/
add_action( 'wp_enqueue_scripts', 'my_on_woocommerce_scripts', 999 );

function my_on_woocommerce_scripts() {
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) ); //убираем generator meta tag
    if ( function_exists( 'is_woocommerce' ) ) { //проверяем, активен ли WooCommerce - исключим ошибеи
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) { //отменяем загрузку скриптов/стилей
            wp_dequeue_style( 'woocommerce_frontend_styles' ); // стили
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            //wp_dequeue_script( 'wc-add-to-cart' ); //этот скрипт ДЛЯ отработки кнопки Добавить в корзину
            // подключаются: plugins/woocommerce/assets/js/frontend/add-to-cart.min.js И ещё: plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            //wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
}
/*оптимизируем работу Woocommerce*/


// Disable global styles
add_action( 'wp_enqueue_scripts', 'remove_global_styles', 999 );

function remove_global_styles(){
    wp_dequeue_style( 'global-styles' );
}


// Disable gutenberg frontend styles @ https://m0n.co/15
function disable_gutenberg_wp_enqueue_scripts() {
    
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');

    wp_dequeue_style('wc-block-style'); // disable woocommerce frontend block styles
    wp_dequeue_style('storefront-gutenberg-blocks'); // disable storefront frontend block styles
    
}
add_filter('wp_enqueue_scripts', 'disable_gutenberg_wp_enqueue_scripts', 999);


// Disable classic theme styles
add_action( 'wp_enqueue_scripts', 'disable_classic_theme_styles', 999);

function disable_classic_theme_styles() {
    wp_dequeue_style( 'classic-theme-styles' );
}


// Disable wp blocks
function disable_wp_blocks() {
    $wstyles = array(
        'wp-block-library',
        'wc-blocks-style',
        'wc-blocks-style-active-filters',
        'wc-blocks-style-add-to-cart-form',
        'wc-blocks-packages-style',
        'wc-blocks-style-all-products',
        'wc-blocks-style-all-reviews',
        'wc-blocks-style-attribute-filter',
        'wc-blocks-style-breadcrumbs',
        'wc-blocks-style-catalog-sorting',
        'wc-blocks-style-customer-account',
        'wc-blocks-style-featured-category',
        'wc-blocks-style-featured-product',
        'wc-blocks-style-mini-cart',
        'wc-blocks-style-price-filter',
        'wc-blocks-style-product-add-to-cart',
        'wc-blocks-style-product-button',
        'wc-blocks-style-product-categories',
        'wc-blocks-style-product-image',
        'wc-blocks-style-product-image-gallery',
        'wc-blocks-style-product-query',
        'wc-blocks-style-product-results-count',
        'wc-blocks-style-product-reviews',
        'wc-blocks-style-product-sale-badge',
        'wc-blocks-style-product-search',
        'wc-blocks-style-product-sku',
        'wc-blocks-style-product-stock-indicator',
        'wc-blocks-style-product-summary',
        'wc-blocks-style-product-title',
        'wc-blocks-style-rating-filter',
        'wc-blocks-style-reviews-by-category',
        'wc-blocks-style-reviews-by-product',
        'wc-blocks-style-product-details',
        'wc-blocks-style-single-product',
        'wc-blocks-style-stock-filter',
        'wc-blocks-style-cart',
        'wc-blocks-style-checkout',
        'wc-blocks-style-mini-cart-contents',
        'classic-theme-styles-inline'
    );

    if (!is_admin()) {
        foreach ( $wstyles as $wstyle ) {
            wp_deregister_style( $wstyle );
        }
    }

    $wscripts = array(
        'wc-blocks-middleware',
        'wc-blocks-data-store'
    );

    if (!is_admin()) {
        foreach ( $wscripts as $wscript ) {
            wp_deregister_script( $wscript );  
        }
    }
}

add_action( 'init', 'disable_wp_blocks', 100 );