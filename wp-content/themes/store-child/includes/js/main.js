document.addEventListener("DOMContentLoaded", () => {

  // To top кнопка вверх
  const toTop = document.getElementById("to-top");

  if (toTop) {

    const image = toTop.querySelector('.image');
    
    image.onclick = () => {
      scroll(0, 0);
    }

    // Показать to-top при скролле
    window.onscroll = () => {
      
      let scrToTop = window.scrollY || document.documentElement.scrollTop;

      if (scrToTop > 400) {
        toTop.classList.add('active');
      } else {
        toTop.classList.remove('active');
      }

    }

  }


  // Swiper slider
  const mainSlider = document.querySelector('.main-slider')

  if (mainSlider) {
    const slider = new Swiper('.main-slider', {
      slidesPerView: 1,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      autoplay: {
        delay: 5000,
      },
    });
  }



  // Mobile menu
  const body = document.querySelector('body');
  const burgerMenuWrapper = document.querySelector('.burger-menu-wrapper');
  const mobileMenu = document.querySelector('.mobile-menu');

  function openMobileMenu() {
    body.classList.add('overflow-hidden');
    mobileMenu.classList.add('active');
    burgerMenuWrapper.classList.add('menu-is-open');
  }

  function closeMobileMenu() {
    body.classList.remove('overflow-hidden');
    burgerMenuWrapper.classList.remove('menu-is-open');
    mobileMenu.classList.remove('active');
  }

  burgerMenuWrapper.onclick = function() {
    if (burgerMenuWrapper.classList.contains('menu-is-open')) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  }

  const listParentClick = document.querySelectorAll('.mobile-menu li.menu-item a');

  for (let i=0; i < listParentClick.length; i++) {
    listParentClick[i].onclick = function (event) {
      event.preventDefault();
      closeMobileMenu();
      let hrefClick = this.href;
      setTimeout(function() {
        location.href = hrefClick
      }, 500);
    }
  }


  // Окна
  const modalWindows = document.querySelectorAll('.modal-window');
  const callbackFormBtns = document.querySelectorAll('.callback-form-btn');
  const callbackModal = document.querySelector('#callback-modal');
  const modalCloseBtns = document.querySelectorAll('.modal-window .modal-close');

  callbackFormBtns.forEach((item) => {
    item.onclick = function () {
      modalWindowOpen(callbackModal);
    }
  });
  
  function modalWindowOpen(win) {
    // Открытие окна
    body.classList.add('overflow-hidden');
    win.classList.add('active');
    setTimeout(function(){
      win.childNodes[1].classList.add('active');
    }, 200);
  }

  for (let i=0; i < modalCloseBtns.length; i++) {
    modalCloseBtns[i].onclick = function() {
      modalWindowClose(modalWindows[i]);
    }
  }

  for (let i = 0; i < modalWindows.length; i++) {
    modalWindows[i].onclick = function(event) {
      let classList = event.target.classList;
      for (let j = 0; j < classList.length; j++) {
        if (classList[j] == "modal" || classList[j] == "modal-wrapper" || classList[j] == "modal-window") {
          modalWindowClose(modalWindows[i])
        }
      }
    }
  }

  function modalWindowClose(win) {
    body.classList.remove('overflow-hidden');
    win.childNodes[1].classList.remove('active');
    setTimeout(() => {
      win.classList.remove('active');
    }, 300);
  }


  // Input phone mask
  function inputPhoneMask() {
    const elementPhone = document.querySelectorAll('.js-input-phone-mask');

    const maskOptionsPhone = {
      mask: '+{7} (000) 000 00 00'
    };

    elementPhone.forEach((item) => {
      const mask = IMask(item, maskOptionsPhone);
    });

    // Маска номера телефона на странице оформления заказа checkout billing billing_phone
    const billingPhone = document.getElementById('billing_phone');

    if (billingPhone) {
      const maskBillingPhone = IMask(billingPhone, maskOptionsPhone);
    }
  }

  inputPhoneMask();


  // Set cookie
  function setCookie(name, value, days) {
    let expires = "";
    if (days) {
      let date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/" + "; sameSite=Lax;";
  }

  function getCookie(name) {
    let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

  function checkCookies() {
    let cookieNote = document.querySelector('#cookie_note');
    let cookieBtnAccept = cookieNote.querySelector('#cookie_accept');

    // Если куки we-use-cookie нет или она просрочена, то показываем уведомление
    if (!getCookie('we-use-cookie')) {
      cookieNote.classList.add('active');
    }

    // При клике на кнопку устанавливаем куку we-use-cookie на один год
    cookieBtnAccept.addEventListener('click', function () {
      setCookie('we-use-cookie', 'true', 365);
      cookieNote.classList.remove('active');
    });
  }

  checkCookies();


  // AJAX фильтр товаров из подкатегорий на странице категории. На всех категориях кроме term-id=18 (Гомеопатические монопрепараты)
  const filterBtns = document.querySelectorAll('.filter-btn');

  filterBtns.forEach((item) => {
    item.onclick = function() {

      // удаление active у всех кнопок
      for (var i = 0; i < filterBtns.length; i++) {
        filterBtns[i].classList.remove('active');
      }

      // добавление active у текущей кнопки
      item.classList.add('active');

      // Отключение плагина Load more products
      // Со включенным плагином подгружаются другие товары кроме отфильтрованных
      the_lmp_js_data = '';

      const products = document.querySelector('ul.products');
      
      // лоадер. селекторы от плагина load more products
      products.innerHTML = '<span class="lmp_products_loading"><i class="fa fa-spinner lmp_rotate"></i></span>';

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=get_subcat&subcat_id=' + item.dataset.termId,
      })
      // вставка в ul.products
      .then((response) => response.text())
      .then((html) => {
        // если пришел html, то вставляю, иначе "Товаров не найдено"
        products.innerHTML = (html ? html : '<div class="no-found-product-text">Товаров не найдено</div>');
      })
      .catch((error) => {
        console.log(error);
      })
    }
  });


  // AJAX получение специалистов по городу
  const cityBtns = document.querySelectorAll('.js-city-btn');

  cityBtns.forEach((item) => {
    item.onclick = function() {

      // удаление active у всех кнопок
      const citiesItems = document.querySelectorAll('.cities-item');
      for (var i = 0; i < citiesItems.length; i++) {
        citiesItems[i].classList.remove('active');
      }

      // добавление active у текущей кнопки
      item.classList.add('active');

      // удаление пагинации
      const pagination = document.querySelector('.specialisty-page .pagination');
      if (pagination) {
        pagination.innerHTML = '';
      }

      const specialists = document.querySelector('.specialisty-page .js-insert-specialists');
      
      // лоадер. селекторы от плагина load more products
      specialists.innerHTML = '<span class="lmp_products_loading"><i class="fa fa-spinner lmp_rotate"></i></span>';    

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=get_specialists&cat_id=' + item.dataset.termId,
      })
      // вставка в specialists
      .then((response) => response.text())
      .then((html) => {
        // если пришел html, то вставляю, иначе "Товаров не найдено"
        specialists.innerHTML = (html ? html : '<div class="no-specialists-text">Специалистов не найдено</div>');
      })
      .catch((error) => {
        console.log(error);
      })
    }
  });


  // AJAX обновление количество товара у значка корзины в хэдере и нижнем мобильном меню add to cart
  jQuery(document).ready(function($) {
    /**
     * jquery событие 'added_to_cart' в контексте woocommerce
     * Все события в /wp-content/plugins/woocommerce/assets/js/frontend
     * Vanilla javascript нет этого события
     * Если добавить событие click на кнопку добавления в корзину, то оно сработает раньше. В корзине будут прошлые значения
     */ 
    $(document.body).on('added_to_cart', function(){

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=set_cart_counters',
      })
      .then((response) => response.json())
      .then((json) => {
        const headerCartCounter = document.querySelector('.header-cart__counter'); // счетчик товаров для значка корзины в хэдере
        const fixedBottomMenu = document.querySelector('.fixed-bottom-menu .badge-counter'); // счетчик товаров для значка корзины в нижнем меню
        headerCartCounter.innerText = json.count;
        fixedBottomMenu.innerText = json.count
      })
      .catch((error) => {
        console.log(error);
      })

    });
  });


  // AJAX получение скидки для купона на странице Подбор солей
  if (window.location.pathname === '/salts_questionnaire/' || 
    window.location.pathname === '/expert-system/') {

    const woocommerceFormCoupon = document.querySelector('.woocommerce-form-coupon');
    const FormCouponSubmitBtn = woocommerceFormCoupon.querySelector('.button');
    const couponCode = woocommerceFormCoupon.querySelector('#coupon_code');

    FormCouponSubmitBtn.onclick = function(event) {
      event.preventDefault();

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=get_coupon&coupon_code=' + couponCode.value,
      })
      .then((response) => response.text())
      .then((amount) => {
        // если пришла строка, то пересчет стоимости, иначе сообщение "Этот промокод больше не работает"
        const couponErrorNotice = document.getElementById('coupon-error-notice');

        function calcPrice(amount) {
          const startPaymentBtn = document.querySelectorAll('.js-start-payment-btn');
          const priceSumm = document.querySelectorAll('.price-summ');

          // Сумма оплаты 1200
          const calc1200 = 1200 - 1200 * amount/100
          startPaymentBtn[0].dataset.summ = calc1200;
          priceSumm[0].innerText = calc1200;

          // Сумма оплаты 6000
          const calc6000 = 6000 - 6000 * amount/100
          startPaymentBtn[1].dataset.summ = calc1200;
          priceSumm[1].innerText = 6000 - 6000 * amount/100;
        }

        let text = '';

        if (amount != '0') {
          text = 'Код купона успешно добавлен.';
          calcPrice(amount);
        } else {
          text = 'Этот промокод больше не работает';
        }

        // Вставка span
        if (!couponErrorNotice) {
          let span = document.createElement('span');
          span.textContent = text;
          span.classList = 'coupon-error-notice';
          span.id = 'coupon-error-notice';
          woocommerceFormCoupon.querySelector('.coupon').append(span);
        } else {
          couponErrorNotice.innerText = text;
        }
        
      })
      .catch((error) => {
        console.log(error);
      })
    }

  }


  const callbackForm = document.getElementById('callback-modal-form');
  const callbackSubmitBtn = document.getElementById('callback-modal-btn');
  const clubForm = document.getElementById('club-form');
  const clubSubmitBtn = document.getElementById('club-submit-btn');

  function ajaxCallback(form) {

    let arr = [];

    const inputName = form.querySelector('.js-required-name');
    if (inputName.value.length < 3 || inputName.value.length > 20) {
      inputName.classList.add('required');
      arr.push(false);
    } else {
      inputName.classList.remove('required');
    }

    const inputSurname = form.querySelector('.js-required-surname');
    if (inputSurname.value.length < 3 || inputSurname.value.length > 20) {
      inputSurname.classList.add('required');
      arr.push(false);
    } else {
      inputSurname.classList.remove('required');
    }

    const inputPhone = form.querySelector('.js-required-phone');
    if (inputPhone.value.length != 18) {
      inputPhone.classList.add('required');
      arr.push(false);
    } else {
      inputPhone.classList.remove('required');
    }

    const inputEmail = form.querySelector('.js-required-email');
    if (inputEmail.value.length < 3 || inputEmail.value.length > 30) {
      inputEmail.classList.add('required');
      arr.push(false);
    } else {
      inputEmail.classList.remove('required');
    }

    const inputCheckbox = form.querySelector('.js-required-checkbox');
    if (!inputCheckbox.checked) {
      arr.push(false);
    }

    if (arr.length == 0) {

      fetch('/wp-content/themes/store-child/phpmailer/mailer.php', {
        method: 'POST',
        cache: 'no-cache',
        body: new FormData(form)
      })
      .catch((error) => {
        console.log(error);
      })

      alert("Спасибо. Мы свяжемся с вами.");

      form.reset();

    }

    return false;
  }

  if (clubSubmitBtn) {
    clubSubmitBtn.onclick = function() {
      ajaxCallback(clubForm);
    }
  }

  if (callbackSubmitBtn) {
    callbackSubmitBtn.onclick = function() {
      ajaxCallback(callbackForm);
    }
  }

});