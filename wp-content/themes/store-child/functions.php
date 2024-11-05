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
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

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

// Добавление версии в css и js
/*
* $temp_debug = true добавляется версия на основе даты и времени
* $temp_debug = false добавляется версия wp
*/

$temp_debug = false;
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
	
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/includes/js/_custom.js');
    wp_localize_script('custom-script', 'my_ajax_obj', array(
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

//Каталог продукции r.kolobaev
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
  foreach ($all_categories as $cat) { ?>
          <?php
          $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
          if ($id_gr == '96') {
			$css_w = 'w110px';
			}
			else {
			$css_w = 'ww100';
		 }
		 $image = wp_get_attachment_url( $thumbnail_id ); 
          ?>
			<div class="children__item">
                <div class="children__image">
                    <a href="<?php echo get_term_link($cat->term_id); ?>">
                        <img class="<?echo $css_w?>" src="<?php echo $image ?>" alt="<?php echo $cat->name ?>">
                    </a>
                </div>
                <a class="subcat__link" href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name ?></a>
            </div>
    <?php
  }
}

// обертка для категорий
add_action('woocommerce_before_main_content', 'add_wrapper_to_product', 30);
add_action('woocommerce_after_main_content', 'add_close_wrapper_to_product', 20);

function add_wrapper_to_product() {

}
function add_close_wrapper_to_product() {

}


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
//print_r($query);
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
 * Ниже описаны функции для взаимодейтсвия с таблицей custom_payments,
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


// Генерация платежа yooKassa
function start_payment() {
    global $wpdb;
    
    // Файл с ключами 
    include_once 'yookassa-config.php';

    // $shopIdTest = '';
    // $secretKeyTest = '';
    
    // $shopId = '';
    // $secretKey = '';
    
    $url = 'https://api.yookassa.ru/v3/payments';
    $data = array(
        'amount' => array(
            'value' => '1', // FIXME
            'currency' => 'RUB'
        ),
        'confirmation' => array(
            'type' => 'embedded'
        ),
        'description' => 'Оплата за доступ к анкете - TEST'
    );
	
	$idempotenceKey = uniqid('', true);

    $response = wp_remote_post($url, array(
        'method' => 'POST',
        'body' => json_encode($data),
        'headers' => array(
            'Authorization' => 'Basic ' . base64_encode($shopId . ':' . $secretKey),
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
            'completion' => 0
        ),
        array('%s', '%d')
    );
	
    wp_send_json_success(array('data' => $response_data));
}
add_action('wp_ajax_start_payment', 'start_payment');
add_action('wp_ajax_nopriv_start_payment', 'start_payment');


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


// Функция для отправки письма с купоном // FIXME Дослать результаты прохождения анкеты
function send_coupon_email($user_email, $coupon_code, $results) {
    $to = $user_email;
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
            <p>С уважением,<br> Ваша команда</p>
        </body>
        </html>
    ';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    
    wp_mail($to, $subject, $message, $headers);
}


// Ф-ия, которую дергаем после прохождения анкеты
function handle_questionnaire_completion() {
	$user_email = $_POST['user_email'];
    $results = json_decode(stripslashes($_POST['results']), true);
	
    $coupon_code = create_discount_coupon($user_email);
    
    send_coupon_email($user_email, $coupon_code, $results);
}
add_action('wp_ajax_handle_questionnaire_completion', 'handle_questionnaire_completion');
add_action('wp_ajax_nopriv_handle_questionnaire_completion', 'handle_questionnaire_completion');


