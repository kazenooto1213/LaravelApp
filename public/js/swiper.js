const mySwiper_sub = new Swiper('.flow01 .swiper-sub', {
  spaceBetween: 24,
  grabCursor: true,
  nested: true,
  pagination: {
    el: '.flow01 .swiper-pagination-sub',
    clickable: true,
  },
});

const mySwiper_main = new Swiper('.flow01 .swiper-main', {
  spaceBetween: 24,
  centeredSlides: true,
  grabCursor: true,
  pagination: {
    el: '.flow01 .swiper-pagination-main',
    clickable: true,
    renderBullet: (index, className) => {
      let num = ('00' + (index + 1)).slice(-2);
      return '<span class="' + className + '"><span class="step">STEP.</span>' + num + '</span>';
    },
  },
  navigation: {
    nextEl: '.flow01 .swiper-button-next',
    prevEl: '.flow01 .swiper-button-prev',
  },
  breakpoints: {
    1025: {
      spaceBetween: 80,
    }
  },
});
