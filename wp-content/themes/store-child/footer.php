<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div>

<footer class="footer">
  <div class="container">
    <div class="footer-logo">
      <img src="/wp-content/themes/store-child/includes/images/logo_footer.png" alt="logo">
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="company-info">© Общество с ограниченной <br> ответственностью «Здоровье»</div>
        <div class="company-info company-info-last">ИНН 7724488603</div>
        <div class="footer-bottom-mobile-menu">
          <ul class="menu">
            <li class="menu-item">
              <a href="#">О солях</a>
            </li>
            <li class="menu-item">
              <a href="#">Каталог</a>
            </li>
            <li class="menu-item">
              <a href="#">Сервис подбора</a>
            </li>
            <li class="menu-item">
              <a href="#">Обучение</a>
            </li>
          </ul>
          <?php //echo custom_nav_menu(0, 4); ?>
          <ul class="menu">
            <li class="menu-item">
              <a href="#">Специалисты</a>
            </li>
            <li class="menu-item">
              <a href="#">Болезни от А до Я</a>
            </li>
            <li class="menu-item">
              <a href="#">Где купить</a>
            </li>
            <li class="menu-item">
              <a href="#">Сервис</a>
            </li>
          </ul>
          <?php //echo custom_nav_menu(5); ?>
        </div>
        <div class="footer-phone footer-pe">
          <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="footer-phone-image footer-pe-image" alt="phone call">
          <a class="footer-phone-link footer-pe-link" href="tel:+74959274928">+7 (495) 927-4-928</a>
        </div>
        <div class="working-time">Пн, Вт, Ср, Чт, Пт: С 10:00 до 20:00<br>Сб, Вс: выходной</div>
        <div class="footer-email footer-pe">
          <img src="/wp-content/themes/store-child/includes/images/svg/circle-email.svg" class="footer-phone-image footer-pe-image" alt="phone call">
          <a class="footer-email-link footer-pe-link" href="mailto:info@naturapharma.ru">info@naturapharma.ru</a>
        </div>
        <div class="footer-address">Московская область, совхоз им. Ленина, Техцентр</div>
        <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh" class="privacy-policy footer-pa">Политика конфиденциальности</a>
        <a href="/soglasie-posetitelya-sajta-na-obrabotku-personalnyh-dannyh" class="agreement footer-pa">Согласие на обработку персональных данных</a>
        <div class="copyright">© <?php echo date("Y"); ?> Все права защищены и принадлежат доктору Трушкиной И.В.</div>
        <div class="copyright">Копирование материалов сайта без письменного разрешения запрещено</div>

        <div class="developer">
          <div class="author">
            <a href="https://nhfuture.ru/" target="_blank">Дизайн Andrewwebnh</a>
          </div>
          <div class="author">
            <a href="https://mybutton.ru/" target="_blank">Поддержка Button</a>
          </div>
        </div>

      </div>
      <div class="col-lg-2 d-lg-block d-none">
        <ul class="menu">
          <li class="menu-item">
            <a href="#">О солях</a>
          </li>
          <li class="menu-item">
            <a href="#">Каталог</a>
          </li>
          <li class="menu-item">
            <a href="#">Сервис подбора</a>
          </li>
          <li class="menu-item">
            <a href="#">Обучение</a>
          </li>
        </ul>
        <?php //echo custom_nav_menu(0, 4); ?>
          
        </div>
      <div class="col-lg-3 d-lg-block d-none">
        <ul class="menu">
          <li class="menu-item">
            <a href="#">Специалисты</a>
          </li>
          <li class="menu-item">
            <a href="#">Болезни от А до Я</a>
          </li>
          <li class="menu-item">
            <a href="#">Где купить</a>
          </li>
          <li class="menu-item">
            <a href="#">Сервис</a>
          </li>
        </ul>
        <?php //echo custom_nav_menu(5); ?>
          
        </div>
      <div class="col-lg-3">
        <div class="flex-container">
          <div class="footer-buttons">
            <div class="callback-form-btn">
              <img src="/wp-content/themes/store-child/includes/images/svg/circle-call-white.svg" class="callback-form-btn__image" alt="">
              <span class="callback-form-btn__text">Заказать звонок</span>
            </div>
            <div class="search-btn" onclick="window.scrollTo(0,0)">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="search-btn__image" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
              <span class="search-btn__text">Поиск препаратов</span>
            </div>
          </div>
          <div class="payment-system">
            <img src="/wp-content/themes/store-child/includes/images/visa.png" class="payment-system__icon icon-visa" alt="visa">
            <img src="/wp-content/themes/store-child/includes/images/mastercard.png" class="payment-system__icon icon-mastercard" alt="mastercard">
            <img src="/wp-content/themes/store-child/includes/images/mir.png" class="payment-system__icon icon-mir" alt="mir">
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>


<div class="have-contraindications">
  <div class="have-contraindications__text">ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ. НЕОБХОДИМО ПРОКОНСУЛЬТИРОВАТЬСЯ СО СПЕЦИАЛИСТОМ</div>
</div>

<div id="cookie_note" class="we-use-cookie">
  <div class="we-use-cookie-wrapper">
    <div class="we-use-cookie-text">Этот сайт использует cookie-файлы и другие технологии для улучшения его работы. Продолжая работу с сайтом, вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</div>
    <button id="cookie_accept" class="we-use-cookie-close">ОК</button>
  </div>
</div>


</div>

<?php wp_footer(); ?>

<script type="text/javascript">
! function() {
  var t = document.createElement("script");
  t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
    VK.Retargeting.Init("VK-RTRG-1527673-1t4wP"), VK.Retargeting.Hit()
  }, document.head.appendChild(t)
}();
</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1527673-1t4wP" style="position:fixed; left:-999px;" alt="" /></noscript>


</body>

</html>