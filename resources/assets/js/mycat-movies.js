//$(function() {
//  $('#hoge').popover({
//    trigger: 'hover', // click,hover,focus,manualを選択出来る
//  });
//});

//var today = new Date();
//var month = today.getMonth() + 1;
//var day = today.getDate();
//document.write("今日は" + month + "月"+ day + "日です。");

var mySwiper = new Swiper('.swiper-container', {
  loop: false,
  slidesPerView: 4,
  spaceBetween: 2,
  centeredSlides: false,
  pagination: '.swiper-pagination',
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev'
});

jQuery.noConflict();
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
