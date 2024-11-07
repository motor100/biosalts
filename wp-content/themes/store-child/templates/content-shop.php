<div class="catalog-page">
  <div class="catalog-section">

    <div class="catalog-section-title"><?php echo woocommerce_page_title(); ?></div>
    <div class="curved violet v2">
      <div class="one"></div>
      <div class="two"></div>
      <div class="three"></div>
    </div>

    <div class="catalog-tabs">
      <div class="catalog-tabs-buttons">
        <div class="container">
          <div class="flex-container">
            <div class="catalog-tabs-button active" data-id="1">
              <div class="catalog-tabs-button__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/1.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">По сериям</div>
            </div>
            <div class="catalog-tabs-button" data-id="2">
              <div class="catalog-tabs-item__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/2.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">По<br>направлениям</div>
            </div>
            <div class="catalog-tabs-button" data-id="3">
              <div class="catalog-tabs-item__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/3.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">Подбор</div>
            </div>
            <div class="catalog-tabs-button" data-id="4">
              <div class="catalog-tabs-button__image">
                <img src="/wp-content/themes/store-child/includes/images/catalog-groups/4.png" alt="">
              </div>
              <div class="catalog-tabs-button__title">Обучение</div>
            </div>
          </div>
        </div>
      </div>
      <div class="curved green v2">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <div class="catalog-tabs-contents">
        <div class="container">
          <div class="catalog-tabs-content active" data-id="1">
            <div class="cat-wrapper">
              <?php render__catalog('183'); ?>
            </div>
          </div>
          <div class="catalog-tabs-content" data-id="2">
            <div class="cat-wrapper"></div>
          </div>
          <div class="catalog-tabs-content" data-id="3">
            <div class="cat-wrapper"></div>
          </div>
          <div class="catalog-tabs-content" data-id="4">
            <div class="cat-wrapper"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>