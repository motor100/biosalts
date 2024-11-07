document.addEventListener("DOMContentLoaded", () => {

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

});