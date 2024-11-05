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

    <div class="header" id="myHeader">
      <div class="main_menu">
        <div class="container">
          <div class="row">
            <div class="head-nav">
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
        </div>
      </div>
      <header class="main-header">
        <div class="container">
          <div class="row">
            <div class="main-top">
              <div class="align-self-center">
                <div class="logo">
                  <?php
                  if (is_front_page()) :
                  ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/logo_header.png" alt="NaturaPharma">
                  <?php
                  else :
                  ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                      <img src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/logo_header.png" alt="NaturaPharma">
                    </a>
                  <?php
                  endif;
                  ?>
                </div>
              </div>
              
              <div class="align-self-center with-links">
                <div class="header-links">
                  <a href="https://vk.com/natura.pharma" target="_blank" rel="nofollow noopener">
                    <div class="circle-blue vk"></div>
                  </a>
                  <a href="https://t.me/naturaproff" target="_blank" rel="nofollow noopener">
                    <div class="circle-blue tg"></div>
                  </a>
                  <a href="tel:+74959274928">
                    <div class="circle-blue phone"></div>
                  </a>
                  <div>
                    <a href="tel:+74959274928" style="font-size: 18px;">+7 (495) 927-4-928</a>
                  </div>
                </div>

                <?php echo do_shortcode('[fibosearch]'); ?>
              </div>
				
              <div class="align-self-center with-menu">
                <div class="header-navigation">
                  <?php global $woocommerce; ?>

                  <div class="woo-customs">
                    <div>
                        <a href="<?php echo $woocommerce->cart->get_cart_url() ?>">
                            <div class="basket"></div>
                            <div class="count">
                                <?php echo sprintf($woocommerce->cart->cart_contents_count); ?>
                            </div>
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>

    <div id="content" class="site-content" tabindex="-1">
      <script>
        if (window.innerWidth >= 991) {
          window.onscroll = function() {
            myFunction()
          };

          var header = document.getElementById("myHeader");
          var sticky = header.offsetTop;

          // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
          function myFunction() {
            if (window.pageYOffset > sticky) {
              header.classList.add("sticky");
            } else {
              header.classList.remove("sticky");
            }
		  }
        }
      </script>

      <? if (!is_front_page()) { ?>
        <div class="h_green_line">
        </div>
      <? } ?>
      <div class="container">
        <div class="row">
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

      <?php do_action('storefront_content_top');
