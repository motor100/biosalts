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
        <div class="company-info">© ИП Трушкина И.В.</div>
        <div class="company-info">ИНН 701703092246</div>
        <div class="company-info company-info-last">ОГРН 318502700032975</div>
        <div class="footer-bottom-mobile-menu">
          <?php echo custom_nav_menu(0, 3); ?>
          <?php echo custom_nav_menu(4); ?>
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
      <div class="col-lg-2 d-lg-block d-none"><?php echo custom_nav_menu(0, 3); ?></div>
      <div class="col-lg-3 d-lg-block d-none"><?php echo custom_nav_menu(4); ?></div>
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

<div class="burger-menu-wrapper">
  <div class="burger-menu">
    <span class="span"></span>
  </div>
</div>

<div class="mobile-menu">
  <div class="mobile-menu-logo">
    <img src="/wp-content/themes/store-child/includes/images/logo_header.png" alt="лого">
  </div>
  <div class="working-time">Пн-Пт: 10:00 до 20:00, Сб-Вс: выходной</div>
  <?php
  wp_nav_menu(
    array(
      'menu' => 'header_menu',
      'menu_id' => 'mobile_menu',
    )
  );
  ?>
  <div class="phone-wrapper">
    <a href="#" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-wa.svg" class="social-icons__image social-icons__wa" alt="ватсап">
    </a>
    <a href="tel:+74959274928" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-call.svg" class="social-icons__image social-icons__call" alt="звонок">
    </a>
    <a href="tel:+74959274928" class="phone-text">+7 (495) 927-4-928</a>
  </div>
  <div class="feedback-text">Напишите нам</div>
  <div class="socials-icons">
    <a href="https://t.me/naturaproff" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-tg.svg" class="social-icons__image social-icons__tg" alt="телеграм">
    </a>
    <a href="https://vk.com/natura.pharma" class="social-icons__link" rel="nofollow noopener" target="_blank">
      <img src="/wp-content/themes/store-child/includes/images/svg/circle-vk.svg" class="social-icons__image social-icons__vk" alt="вконтакте">
    </a>
  </div>
</div>

<div class="fixed-bottom-menu hidden-desktop ">
  <div class="menu-wrapper">
    <div class="menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/house.svg" alt="">
      </div>
      <div class="menu-item__title">Главная</div>
      <a href="/" class="full-link"></a>
    </div>
    <div class="menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/catalog-lens.svg" alt="">
      </div>
      <div class="menu-item__title">Каталог</div>
      <a href="/catalog" class="full-link"></a>
    </div>
    <div class="menu-item cart-menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/shopping-cart-white.svg" alt="">
      </div>
      <div class="menu-item__title">Корзина</div>
      <div id="mobile-cart-counter" class="badge-counter"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
      <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="full-link"></a>
    </div>
    <div class="menu-item favourite-menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/select-dark.svg" alt="">
      </div>
      <div class="menu-item__title">Подбор</div>
      <a href="/expert-system" class="full-link"></a>
    </div>
    <div class="menu-item">
      <div class="menu-item__image">
        <img src="/wp-content/themes/store-child/includes/images/svg/phone-call-black.svg" alt="">
      </div>
      <div class="menu-item__title">Звонок</div>
      <a href="tel:+74959274928" class="full-link"></a>
    </div>
  </div>
</div>

<div class="have-contraindications">
  <div class="have-contraindications__text">ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ. НЕОБХОДИМО ПРОКОНСУЛЬТИРОВАТЬСЯ СО СПЕЦИАЛИСТОМ</div>
</div>

<div id="cookie_note" class="we-use-cookie">
  <div class="we-use-cookie-wrapper">
    <div class="we-use-cookie-text">Этот сайт использует cookie-файлы и другие технологии для улучшения его работы. Продолжая работу с сайтом, вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</div>
    <button id="cookie_accept" class="we-use-cookie-close">ОК</button>
  </div>
</div>

<div id="callback-modal" class="modal-window callback-modal">
  <div class="modal-wrapper">
    <div class="modal-area">
      <div class="modal-close">
        <div class="close"></div>
      </div>
      <div class="modal-title">Заказать звонок</div>
      <form id="callback-modal-form" class="form" method="post">
        <label for="name-callback-modal" class="label">Имя<span class="terracota-color">*</span></label>
        <input type="text" id="name-callback-modal" class="input-field js-required-name" name="name" required minlength="3" maxlength="20" autocomplete="on" placeholder="">
        <label for="phone-callback-modal" class="label">Телефон<span class="terracota-color">*</span></label>
        <input type="text" id="phone-callback-modal" class="input-field js-required-phone js-input-phone-mask" name="phone" required maxlength="18" autocomplete="on">
        <input type="hidden" name="surname" class="js-required-surname" value="нет">
        <input type="hidden" name="email" class="js-required-email" value="нет">
        <input type="button" id="callback-modal-btn" class="submit-btn" value="Отправить">
        <div class="agreement-text">
          <input type="checkbox" id="cb-checkbox-input" name="checkbox" class="custom-checkbox js-required-checkbox" checked onchange="document.getElementById('callback-modal-btn').disabled = !this.checked;">
          <label for="cb-checkbox-input" class="custom-checkbox-label"></label>
          <span>Нажимая кнопку вы соглашаетесь с <a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh">политикой обработки данных</a></span>
        </div>
      </form>
    </div>
  </div>
</div>

</div>

<?php wp_footer(); ?>

<script>
! function() {
  var t = document.createElement("script");
  t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
    VK.Retargeting.Init("VK-RTRG-1527673-1t4wP"), VK.Retargeting.Hit()
  }, document.head.appendChild(t)
}();
</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1527673-1t4wP" style="position:fixed; left:-999px;" alt="" /></noscript>


</body>

</html>