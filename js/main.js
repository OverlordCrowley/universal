$(document).ready(function() {
  var tabsItem = $('.recommendation-list__item');
  tabsItem.on('click', function(event){
    event.preverntDefault();
    tabsItem.removeClass("recommendation-list__item-active");
    $(this).addClass("recommendation-list__item-active");
  });
});
