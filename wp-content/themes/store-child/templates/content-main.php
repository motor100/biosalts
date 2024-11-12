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
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Соли Шюсслера 1-12</span>
          </div>
          <a href="/catalog/product-category/soli-schuesslera/salts1_12/" class="full-link"></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Соли Шюсслера 13-27</span>
          </div>
          <a href="/catalog/product-category/soli-schuesslera/salts13_27/" class="full-link"></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-image-test.jpg" alt="">
          </div>
          <div class="category-item__title">
            <span class="text">Комплексы</span>
          </div>
          <a href="/catalog/product-category/soli-schuesslera/salts_complexes/" class="full-link"></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
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
      <div class="col-lg-2 col-md-4 col-6">
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
      <div class="col-lg-2 col-md-4 col-6">
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

<div class="description-section">
  <div class="container">
    <div class="row">
      <div class="col-xxl-3 col-md-4">
        <div class="description-image">
          <img src="/wp-content/themes/store-child/includes/images/shyussler.jpg" alt="">
        </div>
      </div>
      <div class="col-xxl-9 col-md-8">
        <div class="description-content">
          <div class="title-wrapper">
            <img src="/wp-content/themes/store-child/includes/images/ball-blue.png" class="image" alt="">
            <div class="number">151</div>
            <div class="text">год сканевой<br>биохимической<br>терапии</div>
          </div>
          <div class="description">
            <p class="text">Тканевая биохимическая терапия разработана доктором Шюсслером в середине 19 века.</p>
            <p class="text text-last">Основана на доказанной потребности организма в небольших дозах минеральных веществ, которые используются в качестве катализаторов химических реакций в клетках, строительного неорганического матрикса организма. Различные жизненные ситуации, эмоциональные переживания, нагрузки, заболевания приводят к дефициту отдельных минералов, в результате чего нарушаются биохимические процессы и развивается гипоксия тканей.</p>
          </div>
          <div class="view-more-btn">подробнее</div>
        </div>
      </div>
    </div>    
  </div>
</div>

<div class="manufacture-section">
  <div class="manufacture-title">
    <div class="container">
      <div class="title">Производство</div>
      <div class="subtitle">made and owned</div>
    </div>
  </div>
  <div class="manufacture-content">
    <div class="container">
      <div class="flex-container">
        <div class="video">
          <img src="/wp-content/themes/store-child/includes/images/video-test.jpg" alt="">
        </div>
        <div class="content">
          <div class="description">
            <p class="text">Тканевая биохимическая терапия разработана доктором Шюсслером в середине 19 века.</p>
            <p class="text text-last">Основана на доказанной потребности организма в небольших дозах минеральных веществ, которые используются в качестве катализаторов химических реакций в клетках, строительного неорганического матрикса организма. Различные жизненные ситуации, эмоциональные переживания, нагрузки, заболевания приводят к дефициту отдельных минералов, в результате чего нарушаются биохимические процессы и развивается гипоксия тканей.</p>
          </div>
          <div class="view-more-btn">подробнее</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="image-section">
  <div class="container">
    <div class="grid-container">
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/hz-1.jpg" alt="">
      </div>
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/hz-2.jpg" alt="">
      </div>
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/hz-3.jpg" alt="">
      </div>
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/hz-4.jpg" alt="">
      </div>
    </div>
  </div>
</div>

<div class="club-section">
  <div class="club-title">
    <div class="container">
      <div class="title">Станьте участниками</div>
      <div class="name">NaturaClub</div>
      <div class="text">и пользуйтесь привилегиями</div>
    </div>
  </div>
  <div class="club-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="club-item">
            <div class="flex-container">
              <div class="image">
                <img src="/wp-content/themes/store-child/includes/images/percent-sale.png" alt="">
              </div>
              <div class="title">Скидки</div>
            </div>
            <div class="club-item__text">Участники получают до 20% скидки на предложения недели</div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="club-item">
            <div class="flex-container">
              <div class="image">
                <img src="/wp-content/themes/store-child/includes/images/car-delivery.png" alt="">
              </div>
              <div class="title">Бесплатные<br>доставки</div>
            </div>
            <div class="club-item__text">Вы получаете бесплатную доставку по России при использовании сервиса подбора или покупке на сумму больше 10 000 руб.</div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="club-item">
            <div class="flex-container">
              <div class="image">
                <img src="/wp-content/themes/store-child/includes/images/free-select.png" alt="">
              </div>
              <div class="title">Бесплатный<br>подбор</div>
            </div>
            <div class="club-item__text">Вы получаете бесплатный подбор персонального курса при покупке набора солей Шюсслера в деревянной коробке по 200 таб.</div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="club-item">
            <div class="flex-container">
              <div class="image">
                <img src="/wp-content/themes/store-child/includes/images/chemicals.png" alt="">
              </div>
              <div class="title">Скидки на<br>персональные<br>лекарства</div>
            </div>
            <div class="club-item__text">Вы получаете купон на скидку для обслуживания в производственной аптеке NaturaPharma в каждом заказе</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>