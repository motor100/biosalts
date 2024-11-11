<?php
/**
 * Where buy page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="wherebuy-page sw-page custom-page">

  <div class="container">
    <div class="page-title">Где купить</div>
  </div>

  <div class="cities">
    <div class="container">
      <div class="flex-container">
        <a href="/wherebuy" class="cities-item active">Все города</a>
        <div class="cities-item js-city-btn" data-name="moskva">Москва</div>
        <div class="cities-item js-city-btn" data-name="bryansk">Брянск</div>
        <div class="cities-item js-city-btn" data-name="simferopol">Симферополь</div>
        <div class="cities-item js-city-btn" data-name="sochi">Сочи</div>
        <div class="cities-item js-city-btn" data-name="cheboksary">Чебоксары</div>
        <div class="cities-item js-city-btn" data-name="kazan">Казань</div>
      </div>
    </div>
  </div>

  <div class="addresses">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="moskva">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-almaatinskaya.jpg" alt="">
            </div>
            <div class="addresses-item__title">Москва, Алма-Атинская</div>
            <div class="addresses-item__description">
              <p class="p">Аптека «NaturaPharma»</p>
              <p class="p">Алма-Атинская улица, дом 9, корпус 2</p>
              <p class="p">+7 (495) 927-4-928</p>
              <p class="p">пн.-пт. с 10.00 до 20.00</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="moskva">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Москва, Боровское шоссе</div>
            <div class="addresses-item__description">
              <p class="p">Аптека при медицинском центре «ЗдравиеPro»</p>
              <p class="p">Боровское шоссе, дом 56</p>
              <p class="p">+7 (495) 732-41-61</p>
              <p class="p">+7 (903) 011-24-49</p>
              <p class="p">пн.-пт. с 09.00 до 21.00</p>
              <p class="p">сб.-вс. с 10.00 до 20.00</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="bryansk">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Брянск, Литейная</div>
            <div class="addresses-item__description">
              <p class="p">Аптека «Северьянова А.М.»</p>
              <p class="p">Литейная улица, дом 34</p>
              <p class="p">+7 (483) 252-20-26</p>
              <p class="p">+7 (961) 001-55-01</p>
              <p class="p">пн.-пт. с 08.00 до 21.00</p>
              <p class="p">сб.-вс. с 09.00 до 20.00</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="simferopol">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Симферополь, Крымской весны</div>
            <div class="addresses-item__description">
              <p class="p">Медицинский центр "Аврора"</p>
              <p class="p">улица Крымской весны, дом 1, корпус 7</p>
              <p class="p">https://da-zdorov.ru</p>
              <p class="p">+7 (978) 023-05-05</p>
              <p class="p">пн.-сб. с 11.00 до 19.00</p>
              <p class="p"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="sochi">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Сочи, Курортный</div>
            <div class="addresses-item__description">
              <p class="p">Аптека "Ideal Farm"</p>
              <p class="p">улица Курортный проспект, 92/5 (мкр. Бытха, ЖК “Идеал Хаус”, 1 этаж)</p>
              <p class="p">+7 (862) 225-55-50</p>
              <p class="p">+7 (988) 502-88-50</p>
              <p class="p">пн.-сб. с 09.00 до 19.00</p>
              <p class="p">вс. с 10:00 до 18:00</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="cheboksary">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Чебоксары, Мира</div>
            <div class="addresses-item__description">
              <p class="p">Центр Новой Медицины "Здоровье"</p>
              <p class="p">проспект Мира, дом 90</p>
              <p class="p">+7 (8352) 22-61-22</p>
              <p class="p">+7 (917) 653-38-45</p>
              <p class="p">пн.-сб. с 09.00 до 19.00</p>
              <p class="p"></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 js-a-item" data-name="kazan">
          <div class="addresses-item">
            <div class="addresses-item__image">
              <img src="/wp-content/themes/store-child/includes/images/moskva-borovskoe.jpg" alt="">
            </div>
            <div class="addresses-item__title">Казань, Победы</div>
            <div class="addresses-item__description">
              <p class="p">Центр Гомеопатии "Эхинацея"</p>
              <p class="p">Проспект Победы, дом 139, корпус 3</p>
              <p class="p">8(843)590-01-45</p>
              <p class="p">+7(939)376-58-35</p>
              <p class="p">пн.-пт. с 08.00 до 19.00</p>
              <p class="p">сб. с 09.00 до 16.00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</div>

<?php get_footer(); ?>