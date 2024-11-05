<div class="main-section">
  <div class="container">
    <div class="flex-container">
      <div class="main-section-about">
        <div class="title-wrapper">
          <div class="title">СОЛИ ШЮССЛЕРА</div>
          <div class="subtitle">Тканевая биохимическая терапия</div>
          <div class="subtitle">Since 1873</div>
        </div>
        <div class="about-bg">
          <img src="/wp-content/themes/store-child/includes/images/about-bg.jpg" alt="">
        </div>
      </div>

      <div class="main-section-slider">
        <div class="main-slider swiper">
          <div class="swiper-wrapper">

            <div class="main-slider-item swiper-slide">
              <div class="slider-item-image">
                <a href="#">
                  <img src="/wp-content/themes/store-child/includes/images/slider1.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="main-slider-item swiper-slide">
              <div class="slider-item-image">
                <a href="#">
                  <img src="/wp-content/themes/store-child/includes/images/slider1.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="main-slider-item swiper-slide">
              <div class="slider-item-image">
                <a href="#">
                  <img src="/wp-content/themes/store-child/includes/images/slider1.jpg" alt="">
                </a>
              </div>
            </div>

            <?php
            $args = array(
              'post_type' => 'home_page_slider',
              'posts_per_page' => 5,
              'nopaging' => false,
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ) :
              while( $query->have_posts() ) :
                $query->the_post();
                $product_link = get_post_meta( $post->ID, 'product_link', true ); ?>

                <div class="main-slider-item swiper-slide">
                  <div class="slider-item-image">
                    <a href="<?php echo $product_link ? $product_link : "#"; ?>">
                      <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="">
                    </a>
                  </div>
                </div>

              <?php
              endwhile;
              wp_reset_postdata();
            else :
              // echo 'Записей нет.';
            endif;
            ?>
            
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</div>
