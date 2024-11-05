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



});