$(document).ready(function() {
  var tabsItem = $('.recommendation-list__item');
  var contentItem = $('.main-left');
  var bookmark = $('.publications-main__bookmark');
  tabsItem.on('click', function(e){
    e.preventDefault();
    var activeContent= $(this).attr('data-target');
    tabsItem.removeClass('recommendation-list__item-active');
    contentItem.removeClass("main-left-active");
    $(activeContent).addClass('main-left-active');
    $(this).addClass('recommendation-list__item-active');
  });
  bookmark.on('click', function(e){
    e.preventDefault();
    $(this).toggleClass("publications-main__bookmark-active");
  });

  const swiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 5000,
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
  
});
});
