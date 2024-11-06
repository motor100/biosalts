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

<div class="category-section">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Соли Шюсслера 1-12</span>
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Соли Шюсслера 13-27</span>
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Комплексы</span>
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Детские соли</span>
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Спреи</span>
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Космецевтика</span>
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="personal-select-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="select-item select-item-darkblue">
          <div class="select-item__title">Персональный подбор<br>солей Шюсслера</div>
          <div class="select-item__text">online</div>
          <div class="select-item__image">
            <img src="/wp-content/themes/store-child/includes/images/personal-select.png" alt="">
          </div>
          <a href="#" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="select-item select-item-burgundy">
          <div class="select-item__text">Текст про персональный подбор</div>
          <div class="example-btn">Посмотреть пример заключения</div>
        </div>
      </div>
    </div>
  </div>
</div>