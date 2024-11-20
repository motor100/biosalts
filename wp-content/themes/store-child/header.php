<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>

  <?php wp_body_open(); ?>

  <?php do_action('storefront_before_site'); ?>

  <div id="page" class="hfeed site">
    <?php do_action('storefront_before_header'); ?>

    <header class="header">
      <div class="header-desktop hidden-mobile">
        <div class="header-top">
          <div class="container">
            <div class="flex-container">
              <div class="header-top__address">
                <img src="/wp-content/themes/store-child/includes/images/svg/geolocation.svg" class="geolocation" alt="геометка">
                <span class="address-text">Московская область, совхоз им Ленина, Техцентр | Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной</span>
              </div>
              <div class="socials-icons">
                <a href="https://t.me/biosalts" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-tg.svg" class="social-icons__image social-icons__tg" alt="телеграм">
                </a>
                <!-- <a href="https://vk.com/natura.pharma" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-vk.svg" class="social-icons__image social-icons__vk" alt="вконтакте">
                </a> -->
              </div>
              <div class="phone-wrapper">
                <a href="https://wa.me/79629880861" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-wa.svg" class="social-icons__image social-icons__wa" alt="ватсап">
                </a>
                <a href="tel:+74959274928" class="social-icons__link" rel="nofollow noopener" target="_blank">
                  <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="social-icons__image social-icons__call" alt="звонок">
                </a>
                <a href="tel:+74959274928" class="phone-text">+7 (495) 927-4-928</a>
              </div>
            </div>
          </div>
        </div>
        <div class="header-content">
          <div class="container">
            <div class="flex-container">
              <div class="header-logo">
                <a href="/" class="header-logo__link">
                  <img src="/wp-content/themes/store-child/includes/images/logo_header.png" alt="лого">
                  <div class="underlogo-text">since 1873</div>
                </a>
              </div>
              <a href="/catalog/product-category/soli-schuesslera/" class="catalog-btn header-content-btn">
                <img src="/wp-content/themes/store-child/includes/images/svg/catalog-rectangle.svg" class="catalog-btn__image" alt="">
                <span class="catalog-btn__text">Каталог</span>
              </a>
              <a href="/expert-system" class="select-salt-btn header-content-btn">
                <img src="/wp-content/themes/store-child/includes/images/svg/magic-wand.svg" class="catalog-btn__image" alt="">
                <span class="catalog-btn__text">Подбор солей</span>
              </a>
              <div class="header-search">
                <?php echo do_shortcode('[fibosearch]'); ?>
              </div>
              <div class="header-cart">
                <img src="/wp-content/themes/store-child/includes/images/svg/basket.svg" class="header-cart__basket" alt="корзина">
                <span class="header-cart__counter"><?php global $woocommerce; echo $woocommerce->cart->get_cart_contents_count(); ?></span>
                <a href="/cart" class="full-link"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="header-nav">
          <div class="container">
            <?php
            wp_nav_menu(
              array(
                'menu' => 'header_menu',
                'menu_id' => 'header_menu',
              )
            );
            ?>
          </div>
        </div>
        <div class="header-horizontal-line">
          <div class="container">
            <div class="horizontal-line"></div>
          </div>
        </div>
      </div>
      <div class="header-mobile hidden-desktop">
        <div class="header-top">
          <div class="container">
            <div class="address-text">Московская область, совхоз им Ленина, Техцентр <br> Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной</div>
          </div>
        </div>
        <div class="header-logo">
          <div class="container">
            <div class="logo">
              <img src="/wp-content/themes/store-child/includes/images/logo_header.png" class="header-logo__image" alt="лого">
              <div class="underlogo-text">since 1873</div>
            </div>
          </div>
        </div>
        <div class="header-search">
          <div class="container">
            <?php echo do_shortcode('[fibosearch]'); ?>
          </div>
        </div>
      </div>

    </header>

    <div id="content" class="site-content" tabindex="-1">

      <?php if (!is_front_page()) { ?>
        <div class="breadcrumbs-wrapper">
          <div class="container">
            <?php
            /**
             * Functions hooked in to storefront_before_content
             *
             * @hooked storefront_header_widget_region - 10
             * @hooked woocommerce_breadcrumb - 10
             */
            do_action('storefront_before_content');
            ?>
          </div>
        </div>
      <?php } ?>

      <?php //do_action('storefront_content_top');
