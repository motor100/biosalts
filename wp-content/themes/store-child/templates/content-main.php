<div class="main-section">
  <div class="container">
    <div class="flex-container">
      <div class="main-section-about">
        <div class="title-wrapper">
          <div class="title">СОЛИ ШЮССЛЕРА</div>
          <!-- <div class="subtitle">Тканевая биохимическая терапия</div> -->
          <div class="subtitle">Since 1873</div>
        </div>
        <div class="about-bg">
          <img src="/wp-content/themes/store-child/includes/images/about-bg.jpg" alt="">
        </div>
      </div>

      <div class="main-section-slider">
        <div class="main-slider swiper">
          <div class="swiper-wrapper">

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
            <a href="/catalog/product-category/soli-schuesslera/salts1_12/" class="category-item__link">
              <img src="/wp-content/themes/store-child/includes/images/category-soli-1-12.jpg" alt="">
            </a>
          </div>
          <div class="category-item__title">
            <a href="/catalog/product-category/soli-schuesslera/salts1_12/" class="text">Соли Шюсслера 1-12</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <a href="/catalog/product-category/soli-schuesslera/salts13_27/" class="category-item__link">
              <img src="/wp-content/themes/store-child/includes/images/category-soli-13-27.jpg" alt="">
            </a>
          </div>
          <div class="category-item__title">
            <a href="/catalog/product-category/soli-schuesslera/salts13_27/" class="text">Соли Шюсслера 13-27</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <a href="/catalog/product-category/soli-schuesslera/salts_complexes/" class="category-item__link">
              <img src="/wp-content/themes/store-child/includes/images/category-complexy.jpg" alt="">
            </a>
          </div>
          <div class="category-item__title">
            <a href="/catalog/product-category/soli-schuesslera/salts_complexes/" class="text">Комплексы</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <a href="/catalog/product-category/detskie-soli/" class="category-item__link">
              <img src="/wp-content/themes/store-child/includes/images/category-nabory.jpg" alt="">
            </a>
          </div>
          <div class="category-item__title">
            <a href="/catalog/product-category/detskie-soli/" class="text">Детские соли</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <a href="/catalog/product-category/sprei/" class="category-item__link">
              <img src="/wp-content/themes/store-child/includes/images/category-sprei.jpg" alt="">
            </a>
          </div>
          <div class="category-item__title">
            <a href="/catalog/product-category/sprei/" class="text">Спреи</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <div class="category-item">
          <div class="category-item__image">
            <a href="/catalog/product-category/kosmeczevtika" class="category-item__link">
              <img src="/wp-content/themes/store-child/includes/images/category-kosmecevtika.jpg" alt="">
            </a>
          </div>
          <div class="category-item__title">
            <a href="/catalog/product-category/kosmeczevtika" class="text">Космецевтика</a>
          </div>
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
          <a href="/expert-system" class="full-link"></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="select-item select-item-burgundy">
          <div class="select-item__text">Экспертная система подбора солей Шюсслера для тканевой биохимической терапии. Медицинский ассистент  для диагностики дефицитов минералов в организме человека, подбора персонифицированной комбинации  с проверкой совместимости и указанием оптимального времени приема для проведения тканевой биохимической терапии солями Шюсслера.</div>
          <div class="flex-container">
            <a href="/wp-content/themes/store-child/includes/pdf/test.pdf" class="select-item-burgundy-btn example-btn" target="_blank">Пример заключения</a>
            <a href="/expert-system" class="select-item-burgundy-btn view-more-btn">Подробнее</a>
          </div>
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
            <div class="text">год тканевой<br>биохимической<br>терапии</div>
          </div>
          <div class="description">
            <p class="text">Тканевая биохимическая терапия разработана доктором Шюсслером в середине 19 века.</p>
            <p class="text text-last">Основана на доказанной потребности организма в небольших дозах минеральных веществ, которые используются в качестве катализаторов химических реакций в клетках, строительного неорганического матрикса организма. Различные жизненные ситуации, эмоциональные переживания, нагрузки, заболевания приводят к дефициту отдельных минералов, в результате чего нарушаются биохимические процессы и развивается гипоксия тканей.</p>
          </div>
          <a href="/about-salts" class="view-more-btn">подробнее</a>
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
          <video controls poster="/wp-content/themes/store-child/includes/video/poster.jpg">
            <source src="/wp-content/themes/store-child/includes/video/video.mp4" type="video/mp4">
            Ваш браузер не поддерживает встроенные видео.
          </video>
        </div>

        <div class="content">
          <div class="description">
            <p class="text">Тканевая биохимическая терапия разработана доктором Шюсслером в середине 19 века.</p>
            <p class="text text-last">Основана на доказанной потребности организма в небольших дозах минеральных веществ, которые используются в качестве катализаторов химических реакций в клетках, строительного неорганического матрикса организма. Различные жизненные ситуации, эмоциональные переживания, нагрузки, заболевания приводят к дефициту отдельных минералов, в результате чего нарушаются биохимические процессы и развивается гипоксия тканей.</p>
          </div>
          <a href="/about-salts" class="view-more-btn">подробнее</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="image-section">
  <div class="container">
    <div class="grid-container">
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/image1.jpg" alt="">
      </div>
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/image2.jpg" alt="">
      </div>
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/image3.jpg" alt="">
      </div>
      <div class="image">
        <img src="/wp-content/themes/store-child/includes/images/image4.jpg" alt="">
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
            <div class="ball">
              <img src="/wp-content/themes/store-child/includes/images/ball-darkblue.png" alt="">
            </div>
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
            <div class="ball">
              <img src="/wp-content/themes/store-child/includes/images/ball-burgundy.png" alt="">
            </div>
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
            <div class="ball">
              <img src="/wp-content/themes/store-child/includes/images/ball-yellow.png" alt="">
            </div>
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
            <div class="ball">
              <img src="/wp-content/themes/store-child/includes/images/ball-green.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="club-form">
    <div class="container">
      <form id="club-form" class="form" method="post">
        <div class="flex-container">
          <div class="form-group">
            <input type="text" name="name" id="club-name" class="input-field js-required-name" autocomplete="on">
            <label for="club-name" class="label">имя<span class="terracota-color">*</span></label>
          </div>
          <div class="form-group">
            <input type="text" id="club-surname" name="surname" class="input-field js-required-surname" autocomplete="on">
            <label for="club-surname" class="label">фамилия<span class="terracota-color">*</span></label>
          </div>
          <div class="form-group">
            <input type="text" id="club-phone" name="phone" class="input-field js-required-phone js-input-phone-mask" autocomplete="on">
            <label for="club-phone" class="label">телефон<span class="terracota-color">*</span></label>
          </div>
          <div class="form-group">
            <input type="email" id="club-email" name="email" class="input-field js-required-email" autocomplete="on">
            <label for="club-email" class="label">эл. почта<span class="terracota-color">*</span></label>
          </div>
          <input type="hidden" name="message" value="Вступить в клуб">
          <button id="club-submit-btn" type="button" class="club-submit-btn">вступить в клуб</button>
        </div>
        <div class="agreement-text">
          <input type="checkbox" id="club-checkbox" name="checkbox" class="custom-checkbox js-required-checkbox" checked onchange="document.getElementById('club-submit-btn').disabled = !this.checked;">
          <label for="club-checkbox" class="custom-checkbox-label"></label>
          <span>Нажимая кнопку вы соглашаетесь с <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh">политикой обработки данных</a></span>
        </div>
      </form>
    </div>
  </div>
</div>